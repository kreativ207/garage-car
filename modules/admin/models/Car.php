<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "car".
 *
 * @property integer $id
 * @property string $car_name
 * @property integer $user_id
 */
class Car extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'car';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['car_name'], 'required'],
            [['user_id'], 'integer'],
            [['car_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'car_name' => 'My Car',
            'user_id' => 'User',
        ];
    }
}
