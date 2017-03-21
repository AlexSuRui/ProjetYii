<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Inventory_date".
 *
 * @property string $inventory_date
 * @property string $region
 * @property string $vcenter_server
 * @property string $vm_host_name
 *
 * @property Vm $vmHostName
 */
class inventoryDate extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Inventory_date';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['inventory_date', 'region', 'vcenter_server', 'vm_host_name'], 'required'],
            [['inventory_date'], 'safe'],
            [['region'], 'string', 'max' => 50],
            [['vcenter_server', 'vm_host_name'], 'string', 'max' => 100],
            [['vm_host_name'], 'exist', 'skipOnError' => true, 'targetClass' => Vm::className(), 'targetAttribute' => ['vm_host_name' => 'vm_host_name']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'inventory_date' => 'Inventory Date',
            'region' => 'Region',
            'vcenter_server' => 'Vcenter Server',
            'vm_host_name' => 'Vm Host Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVmHostName()
    {
        return $this->hasOne(Vm::className(), ['vm_host_name' => 'vm_host_name']);
    }
}
