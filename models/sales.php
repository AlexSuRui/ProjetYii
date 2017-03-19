<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "my_table".
 *
 * @property int $id
 * @property string $year
 * @property string $quarter
 * @property string $country
 * @property string $sales
 */
class sales extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'my_table';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['year', 'quarter', 'country', 'sales'], 'required'],
            [['year', 'quarter', 'country', 'sales'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Id',
            'year' => 'Year',
            'quarter' => 'Quarter',
            'country' => 'Country',
            'sales' => 'Sales',
        ];
    }
  
}
