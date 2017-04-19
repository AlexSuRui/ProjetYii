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
use yii\filters\AccessControl;
require dirname(dirname(__FILE__)).'/excel/PHPExcel.php';

/**
 * VmController implements the CRUD actions for vm model.
 */
class VmController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'upload', 'truncate'],
                'rules' => [
                    [
                        'actions' => ['index'],
//                        'controllers' => ['VmController'],
                        'allow' => true,
                        'roles' => ['@'],
//                        'ips' => ['192.168.*'],
                    ], [
                        'actions' => ['upload', 'truncate'],
                        'allow' => true,
                        'roles' => ['admin'],
                    ]
                ],
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
     * Lists all vm models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new vmSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        if (Yii::$app->request->isPjax) {
            return $this->renderPartial('index', [
                        'searchModel' => $searchModel,
                        'dataProvider' => $dataProvider,
            ]);
        } else {
            return $this->render('index', [
                        'searchModel' => $searchModel,
                        'dataProvider' => $dataProvider,
            ]);
        }
    }

    public function actionTransition() {
        return $this->render('transition');
    }

    /**
     * Custmized display
     */
    public function actionIndexcustmized() {
        $searchModel = new vmSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        if (Yii::$app->request->isPjax) {
            return $this->renderPartial('indexcustmized', [
                        'searchModel' => $searchModel,
                        'dataProvider' => $dataProvider,
            ]);
        } else {
            return $this->render('indexcustmized', [
                        'searchModel' => $searchModel,
                        'dataProvider' => $dataProvider,
            ]);
        }
    }

    /**
     * Displays a single vm model.
     * @param string $id
     * @return mixed
     */
    public function actionView($vm_name, $inventory_date) {

        $id = [
            'vm_name' => $vm_name,
            'inventory_date' => $inventory_date,
        ];
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new vm model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
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
    public function actionUpdate($id) {
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
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Truncate a table
     * If delete is successful, the browser will be redirected to the 'View'page.
     */
    public function actionTruncate() {
        Yii::$app->db->createCommand()->truncateTable('vm')->execute();

        return $this->redirect(['/vm/index']);
    }

    /**
     * Finds the vm model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return vm the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
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
    public function actionCustomize() {
        $cookies = Yii::$app->response->cookies;
        $cookies->remove('result');
        unset($cookies['result']);
        $model = new vm();
        $champs = $model->attributes();
        return $this->render('customize', ['model' => $model, 'champs' => $champs]);
    }

    /**
     * Save data from a inputfile(excel) to Database(MySQL)
     * @param string $importFile
     * @return return to the index page
     */
    protected function chargeFile($importFile) {

//       A emample file: $importFile = 'uploads/autofilter.xls';
        try {
            $inputFileType = \PHPExcel_IOFactory::identify($importFile);
            $objReader = \PHPExcel_IOFactory::createReader($inputFileType);
            $objPHPExcel = $objReader->load($importFile);
        } catch (Exception $e) {
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
    protected function loaddata($sheet) {

        if ($sheet) {
//                Yii::$app->db->createCommand()->truncateTable('{{table}}')->execute();
            $highestRow = $sheet->getHighestRow();
            $highestColomn = $sheet->getHighestColumn();
            //Use a loop to load data
            for ($row = 2; $row <= $highestRow; $row++) {
                $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColomn . $row, NULL, TRUE, FALSE);
//                $vm = new vm();
//                print_r($vm->attributes());
//                $vm->createVM($rowData[0]);
                Yii::$app->db->createCommand()->insert('vm', ['inventory_date'=>$rowData[0][0], 'region'=>$rowData[0][1], 'vcenter_server'=>$rowData[0][2], 'vm_name'=>$rowData[0][3], 'vm_host_name'=>$rowData[0][4], 'vm_state'=>$rowData[0][5], 'vm_ip'=>$rowData[0][6], 'vm_family'=>$rowData[0][7], 'vm_guest_full_name'=>$rowData[0][8], 'vm_guest_id'=>$rowData[0][9], 'vm_memory'=>$rowData[0][10], 'vm_esx_host'=>$rowData[0][11], 'vm_total_vcpu'=>$rowData[0][12], 'vm_num_cpus'=>$rowData[0][13], 'vm_num_cores_per_cpu'=>$rowData[0][14], 'vm_hardware_version'=>$rowData[0][15], 'vm_is_template'=>$rowData[0][16], 'vm_tools_status'=>$rowData[0][17], 'vm_tools_version'=>$rowData[0][18], 'vm_tools_version_status'=>$rowData[0][19], 'vm_name_check'=>$rowData[0][20], 'vm_provisionedspaceGB'=>$rowData[0][21], 'vm_usedspaceGB'=>$rowData[0][22], 'vm_compliance_check'=>$rowData[0][23], 'VMCountryCode'=>$rowData[0][24]])->execute();
            }
            return true;
        }
    }

    /**
     * Upload a excel file
     * @return null'
     */
    public function actionUpload() {
        $model = new UploadForm();
//        // 
        if (Yii::$app->request->isPost) {
            $model->file = UploadedFile::getInstance($model, 'file');
            $path = $model->upload();
            $objPHPExcel = $this->chargeFile($path);
            $sheet = $objPHPExcel->getSheetByName('VM Data');
            if ($this->loaddata($sheet)) {
                return $this->redirect(['/vm/index']);
            }
        }
        return $this->render('upload', ['model' => $model]);
    }

    public function actionEvolution() {

        $vmName = 'xxx00001';
        $dates = ['2016-06-28 20:23:37', '2016-07-28 23:31:49', '2017-01-06 09:25:56', '2017-02-22 18:20:07', '2017-03-17 17:59:38'];
        $memories = [22648, 11324, 33972, 28310, 16986];
//        $memories = vm::find()->where(['vm_name'=>$vmName])->select('vm_memory')->asArray()->all();
        return $this->render('evolution', ['vmName' => $vmName, 'dates' => $dates, 'memories' => $memories]);
    }

}
