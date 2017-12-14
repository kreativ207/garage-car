<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'User Cars';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-cars-index">

    <!--<h1><?/*= Html::encode($this->title) */?></h1>-->

    <p>
        <?= Html::a('Create User Cars', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'cars_id',
                'format' => 'raw',
                'value' => function ($model) {
                    $res = \app\modules\admin\models\Car::find()->select("car_name")->where(["id" => $model->cars_id])->asArray()->one();
                    if($res){
                        return $res["car_name"];
                    }
                },
            ],
            'car_number',
            [
                'attribute' => 'color',
                'format' => 'raw',
                'value' => function ($model) {
                    return \app\models\ColorCarsEnum::getLabelName($model->color);
                },
            ],
            [
                'attribute' => 'user_id',
                'format' => 'raw',
                'value' => function ($model) {
                    $res = \app\models\User::find()->select("email")->where(["id" => $model->user_id])->asArray()->one();
                    if($res){
                        return $res["email"];
                    }
                },
            ],
            //'user_id',

            ['class' => 'yii\grid\ActionColumn', 'template' => '{update} {delete}'],
        ],
    ]); ?>
</div>
