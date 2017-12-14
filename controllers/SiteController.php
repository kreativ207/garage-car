<?php

namespace app\controllers;

use app\models\RegisterForm;
use app\modules\admin\models\VUsers;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Registration action.
     *
     * @return string
     */
    public function actionRegistration()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $registerForm = new RegisterForm();
        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

            $registerForm->load(Yii::$app->request->post());
            return \yii\widgets\ActiveForm::validate($registerForm);

        } elseif ($registerForm->load(Yii::$app->request->post())){
            $model = new VUsers();
            $model->email = $registerForm->username;
            $model->role = Yii::$app->params['USER_ROLE'];
            $model->created_at = time();
            $model->updated_at = time();
            $model->registration_ip = $_SERVER["REMOTE_ADDR"];

            $hash = Yii::$app->getSecurity()->generatePasswordHash($registerForm->password);
            $model->password_hash = $hash;

            if($model->save()){
                Yii::$app->session->setFlash('userAdd', "User  \"$model->email\" added to database");
                return $this->redirect(['login']);
            }
        }
        return $this->render('registration', [
            'model' => $registerForm,
        ]);
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            $this->actionRedirect();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionRedirect()
    {
        if(Yii::$app->user->identity->role == 10){
            return $this->redirect("/admin/admin-cars");
        } elseif(Yii::$app->user->identity->role == 5){
            return $this->redirect("/admin/user-cars");
        } else {
            return $this->redirect("admin/user-cars/index");
        }
    }
}
