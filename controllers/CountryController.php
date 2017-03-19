<?php

namespace app\controllers;

use Yii;
use app\models\Country;
use app\models\CountrySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CountryController implements the CRUD actions for Country model.
 */
class CountryController extends Controller
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
     * Lists all Country models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CountrySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Country model.
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
     * Creates a new Country model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Country();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->code]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Country model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->code]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Country model.
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
     * Finds the Country model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Country the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Country::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionImport()
    {

        $importFile = 'uploads/autofilter.xls';
        try{
            // $inputFileType = \PHPExcel_IOFactory::indentify($inputFile);
            // $objReader = \PHPExcel_IOFactory::createReader($inputFileType);
            $objReader = \PHPExcel_IOFactory::createReader('Excel5');
            $objPHPExcel = $objReader->load($importFile); 
            }
        catch(Exception $e){
                die('Error');
             }
        $sheet = $objPHPExcel->getActiveSheet();

        foreach($sheet->getRowIterator() as $row) {
            $rowData = array();
            foreach($row->getCellIterator() as $key => $cell) 
            {

            //first row, collect column names
                if(1 == $row->getRowIndex ()) {
                    $col_titles[$key] = $cell->getCalculatedValue();
  
                } else {
                //if the column name contains "date",
                //format the excel date to mysql date,
                //you can do similar things to other special types of fields
                        if(stristr($col_titles[$key], 'date')) 
                            {
                                $rowData[$col_titles[$key]] = PHPExcel_Style_NumberFormat::toFormattedString($cell->getCalculatedValue(), 'YYYY-MM-DD');
                            } else 
                            {
                                $rowData[$col_titles[$key]] = $cell->getCalculatedValue();
                            }

                        }
            }

              //$rowData now contains all the data from this row as key-value array,
              //you may use it differently if using ORM, PDO or something else.
              //I will just create a raw MySQL query for now.
            if(!empty($rowData)) 
            {

            //generate the query
            $keys = array();
            $values = array();

            foreach ($rowData as $key => $val) 
                {
                    $keys[] = '`' . $key . '`';

                //you should add you preferred way of escaping the data here
                    $values[] = "'" . addslashes($val) . "'";
                }

                $keys = implode(',', $keys);
                $values = implode(',', $values);

                $sql = "INSERT INTO `my_table` ($keys) VALUES($values);";

                //print or execute the query here
                echo $sql . "\n";
            }
        }

    }
}
