<?php

namespace app\controllers;

use Yii;
use app\models\sales;
use app\models\salesSearch;
use app\models\UploadForm;
use yii\web\UploadedFile;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * SalesController implements the CRUD actions for sales model.
 */
class SalesController extends Controller
{
    
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all sales models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new salesSearch();
//        $filters = array('quarter','country','sales');
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    /**
     * Custmized display
     */
    public function actionIndexcustmized(){
         $searchModel = new salesSearch();
//        $filters = array('quarter','country','sales');
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('indexcustmized', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    /**
     * Displays a single sales model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new sales model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new sales();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }
    /**
     * Customize search page.
     */
    public function actionSearch()
    {
        $model = new Sales();
        $champs = $model->attributes();
        return $this->render('search', [
            'model' => $model,
            'champs' => $champs,
                ]);
    }
    /**
     * Custmize a display table
     * Transfer the model(sale) and the name of attributes to view
     */
    public function actionCustomize()
    {
        $model = new Sales();
        $champs = $model->attributes();
        return $this->render('customize', ['champs' => $champs]);
        
    }
    /**
     * Truncate a table
     * If delete is successful, the browser will be redirected to the 'View'page.
     */
    public function actionTruncate()
    {
        Yii::$app->db->createCommand()->truncateTable('my_table')->execute();
        
        return $this->redirect(['/sales/index']);
            
    }
    public function actionTest($sheets)
    {
        
        return $this->render('sheets',['sheets'=>$sheets]);
    }

    /**
     * Updates an existing sales model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing sales model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
    /**
     * Finds the sales model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return sales the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = sales::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    /**
     * Finds all the value on the name of colomn
     * @param String $colomn
     * @return distinct value 
     * @throws NotFoundException if the colomn is null
     */
    public function actionFindlist($name)
    {
        $items = ArrayHelper::map(sales::find()->groupBy($name)->all(), 'id', $name);
        return print_r($items);
    }
    
    /**
     * Upload a excel file
     * @return null
     */
    public function actionUpload()
    {
        $model = new UploadForm();

        if (Yii::$app->request->isPost) {
        $model->file = UploadedFile::getInstance($model, 'file');
        $path = $model->upload();
        $objPHPExcel = $this->chargeFile($path);
        $sheets = $objPHPExcel->getSheetNames();  
        foreach($sheets as $sheet){
            $this->loaddata($objPHPExcel, $sheet);
        }
//        return $this->render('sheets', ['sheets'=>$sheets]);
        }
        return $this->render('upload', ['model' => $model]);
    }
    
    /**
     * Save data from a inputfile(excel) to Database(MySQL)
     * @param string $importFile
     * @return return to the index page
     */
    protected function chargeFile($importFile)
    {

//        $importFile = 'uploads/autofilter.xls';
        try{
            // $inputFileType = \PHPExcel_IOFactory::indentify($inputFile);
            // $objReader = \PHPExcel_IOFactory::createReader($inputFileType);
            $objReader = \PHPExcel_IOFactory::createReader('Excel5');
            $objPHPExcel = $objReader->load($importFile);           
            }
        catch(Exception $e){
                die('Error');
             }
//            if($this->loadData($objPHPExcel,'test111')){
//                return $this->redirect(['/sales/index']);
//            }
        return $objPHPExcel;

    }
    // loaddata 需要两个参数，一个参数可以传过来，另一参数如何从一个action传到另一个action
    /**
     * Load data from sheet
     * @param type $objPHPExcel
     * @param type $sheetName 
     * @return boolean
     */
    protected function loaddata($objPHPExcel,$sheetName){
            $sheet = $objPHPExcel->getSheetByName($sheetName);
            if($sheet){
                Yii::$app->db->createCommand()->truncateTable('my_table')->execute();
                $highestRow = $sheet->getHighestRow();
                $highestColomn = $sheet->getHighestColumn();
                 for ($row = 2; $row<=$highestRow; $row++){
                        $rowData = $sheet->rangeToArray('A'.$row.':'.$highestColomn.$row,NULL,TRUE,FALSE); 
                        $sale = new Sales();
                        $sale->id = $row-1;
                        $sale->year = strval($rowData[0][0]);
                        $sale->quarter = $rowData[0][1];
                        $sale->country = $rowData[0][2];
                        $sale->sales = strval($rowData[0][3]);

                        if(!$sale->save()){
                            print_r($sale->getErrors());
                            return false;
                        }
                }
                return true;
            }else{
                return false;
            }
    }

    


}