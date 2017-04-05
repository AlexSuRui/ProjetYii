<?php
    namespace app\commands;

    use Yii;
    use yii\console\Controller;
    
    class RbacController extends Controller
    {
        public function actionInit()
        {
            $auth = Yii::$app->authManager;
            
            // add "uploadData" access
            $uploadData = $auth->createPermission('upload');
            $uploadData->description = 'upload a data file';
            $auth->add($uploadData);
            
             // add "turncate" access
            $truncateData = $auth->createPermission('truncate');
            $truncateData->description = 'truncate all data ';
            $auth->add($truncateData);

            // add "admin" role and add "uploadData" access
            $admin = $auth->createRole('admin');
            $spadmin = $auth->createRole('super admin');
            $auth->add($admin);
            $auth->add($spadmin);
            $auth->addChild($admin, $uploadData);
            $auth->addChild($admin, $truncateData);

            $auth->assign($admin, 100);
            $auth->assign($spadmin, 102);
        }
    }
?>

