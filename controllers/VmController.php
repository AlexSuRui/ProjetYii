<?php

namespace app\controllers;

use Yii;
use app\models\vm;
use app\models\vmSearch;
use app\models\UploadForm;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
/**
 * VmController implements the CRUD actions for vm model.
 */
class VmController extends Controller
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
     * Lists all vm models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new vmSearch();
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
        $searchModel = new vmSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
        return $this->render('indexcustmized', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    /**
     * Displays a single vm model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new vm model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new vm();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->vm_host_name]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing vm model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->vm_host_name]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing vm model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the vm model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return vm the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = vm::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    /**
     * Custmize a display table
     * Transfer the model(sale) and the name of attributes to view
     */
    public function actionCustomize()
    {
        $cookies = Yii::$app->response->cookies;
        $cookies->remove('result');
        unset($cookies['result']);
        $model = new vm();
        $champs = $model->attributes();
        return $this->render('customize', ['model' => $model,'champs' => $champs]);
        
    }    
    
    /**
     * Save data from a inputfile(excel) to Database(MySQL)
     * @param string $importFile
     * @return return to the index page
     */
    protected function chargeFile($importFile)
    {

//       A emample file: $importFile = 'uploads/autofilter.xls';
        try{
            $inputFileType = \PHPExcel_IOFactory::identify($importFile);
            $objReader = \PHPExcel_IOFactory::createReader($inputFileType);
            $objPHPExcel = $objReader->load($importFile);           
            }
        catch(Exception $e){
                die('Error');
             }

        return $objPHPExcel;

    }
    /**
     * Load data from sheet, return a sign (true of false) to ensure if the load successes
     * @param type $objPHPExcel
     * @param type $sheetName 
     * @return boolean 
     */
    protected function loaddata($sheet){
        
            if($sheet){
//                Yii::$app->db->createCommand()->truncateTable('{{table}}')->execute();
                $highestRow = $sheet->getHighestRow();
                $highestColomn = $sheet->getHighestColumn();
                //Use a loop to load data
                for ($row = 1; $row<=$highestRow; $row++){
                    $rowData = $sheet->rangeToArray('A'.$row.':'.$highestColomn.$row,NULL,TRUE,FALSE); 
                    $vm = new vm();
                    if($vm->createVM($rowData[0])){
                        return true;
                    }else{
                        return false;
                    }
                }
            }
    }
    /**
     * Upload a excel file
     * @return null
     */
    public function actionUpload(){
        $model = new UploadForm();
//        // 
        if (Yii::$app->request->isPost) {
        $model->file = UploadedFile::getInstance($model, 'file');
        $path = $model->upload();
        $objPHPExcel = $this->chargeFile($path);
        $sheet = $objPHPExcel->getSheetByName('VM Data');
        if($this->loaddata($sheet))
            {
                return $this->redirect(['/vm/index']);
            }
        }
         return $this->render('upload', ['model' => $model]);
    }
    
}
