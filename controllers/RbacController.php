<?php
    use yii\console\Controllerl;
    
    class RbacController extends Controller
    {
        public function actionInit()
        {
            $auth = Yii::$app->authManager;

            $rule = new \app\rbac\AuthorRule;
            $auth->add($rule);
            
            // add "uploadData" access
            $uploadData = $auth->createPermission('truncate');
            $uploadData->description = 'upload a data file';
            $uploadData->ruleName = $rule->name;
            $auth->add($uploadData);

            // add "admin" role and add "uploadData" access
            $admin = $auth->createRole('admin');
            $auth->add($admin);
            $auth->addChild($admin, $uploadData);
            
            $auth->assign($admin, 100);
        }
    }
?>

