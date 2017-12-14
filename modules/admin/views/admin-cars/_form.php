<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\UserCars */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-cars-form">

    <?php $form = ActiveForm::begin([
        'enableAjaxValidation' => true,
    ]); ?>

    <?= $form->field($model, 'cars_id')->dropDownList(ArrayHelper::map(\app\modules\admin\models\Car::find()->all(), 'id', 'car_name')) ?>

    <?= $form->field($model, 'car_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'color')->dropDownList(\app\models\ColorCarsEnum::getAllArr()) ?>

    <?= $form->field($model, 'user_id')->dropDownList(ArrayHelper::map(\app\models\User::find()->where(["role" => 5])->orderBy("email")->all(), 'id', 'email')) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
