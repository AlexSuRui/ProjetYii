<?php

namespace app\controllers;

use Yii;
use app\models\esx;
use app\models\esxSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * EsxController implements the CRUD actions for esx model.
 */
class EsxController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {

        return [
             'access' => [
                'class' => AccessControl::className(),
                'only' => ['index','truncate'],
                'rules' => [
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['truncate'],
                        'allow' => true,
                        'roles' => ['admin'],
                    ]
                ],
//                'denyCallback' => function ($rule, $action) {
//                    throw new \Exception('You are not allowed to access this page');
//                 }
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }
    

    /**
     * Lists all esx models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new esxSearch();
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
        $searchModel = new esxSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
        return $this->render('indexcustmized', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single esx model.
     * @param string $inventory_date
     * @param string $FQDN
     * @return mixed
     */
    public function actionView($inventory_date, $FQDN)
    {
        return $this->render('view', [
            'model' => $this->findModel($inventory_date, $FQDN),
        ]);
    }

    /**
     * Creates a new esx model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new esx();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'inventory_date' => $model->inventory_date, 'FQDN' => $model->FQDN]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing esx model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $inventory_date
     * @param string $FQDN
     * @return mixed
     */
    public function actionUpdate($inventory_date, $FQDN)
    {
        $model = $this->findModel($inventory_date, $FQDN);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'inventory_date' => $model->inventory_date, 'FQDN' => $model->FQDN]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing esx model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $inventory_date
     * @param string $FQDN
     * @return mixed
     */
    public function actionDelete($inventory_date, $FQDN)
    {
        $this->findModel($inventory_date, $FQDN)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Truncate a table
     * If delete is successful, the browser will be redirected to the 'View'page.
     */
    public function actionTruncate()
    {
        Yii::$app->db->createCommand()->truncateTable('esx')->execute();
        
        return $this->redirect(['/esx/index']);
            
    }
    
    /**
     * Finds the esx model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $inventory_date
     * @param string $FQDN
     * @return esx the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($inventory_date, $FQDN)
    {
        if (($model = esx::findOne(['inventory_date' => $inventory_date, 'FQDN' => $FQDN])) !== null) {
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
        $model = new esx();
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

    }/**
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
                for ($row = 2; $row<=$highestRow; $row++)
                        {
                            $rowData = $sheet->rangeToArray('A'.$row.':'.$highestColomn.$row,NULL,TRUE,FALSE); 
                            $vm = new vm();
                            $vm->createVM($rowData[0]);
                        }
                return true;   
                }
            
    }/**
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
        $sheet = $objPHPExcel->getSheetByName('ESX Data');
        if($this->loaddata($sheet))
            {
                return $this->redirect(['/vm/index']);
            }
        }
         return $this->render('upload', ['model' => $model]);
    }
}
