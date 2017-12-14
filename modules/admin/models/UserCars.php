<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "user_cars".
 *
 * @property integer $id
 * @property integer $cars_id
 * @property integer $color
 * @property string $car_number
 * @property integer $user_id
 */
class UserCars extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_cars';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cars_id', 'color', 'car_number', 'user_id'], 'required'],
            [['cars_id', 'color', 'user_id'], 'integer'],
            [['car_number'], 'unique', 'message' => 'Car with number "{value}" already registered'],
            [['car_number'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cars_id' => 'Cars',
            'color' => 'Color',
            'car_number' => 'Car Number',
            'user_id' => 'User',
        ];
    }
}
