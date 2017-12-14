<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\UserCars */

$this->title = 'Create User Cars';
$this->params['breadcrumbs'][] = ['label' => 'User Cars', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-cars-create">

    <!--<h1><?/*= Html::encode($this->title) */?></h1>-->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
