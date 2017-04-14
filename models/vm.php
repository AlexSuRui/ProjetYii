<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vm".
 *
 * @property string $inventory_date Description
 * @property string $region
 * @property string $vm_name
 * @property string $vm_host_name
 * @property string $vm_state
 * @property string $vm_ip
 * @property string $vm_family
 * @property string $vm_guest_full_name
 * @property string $vm_guest_id
 * @property int $vm_memory
 * @property string $vm_esx_host
 * @property int $vm_total_vcpu
 * @property int $vm_num_cpus
 * @property int $vm_num_cores_per_cpu
 * @property string $vm_hardware_version
 * @property int $vm_is_template
 * @property string $vm_tools_status
 * @property string $vm_tools_version_status
 * @property string $vm_name_check
 * @property int $vm_provisionedspaceGB
 * @property int $vm_usedspaceGB
 * @property string $vm_compliance_check
 * @property string $VMCountryCode
 */
class vm extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vm';
    }
    
    public static function primaryKey() {
        return [
           'inventory_date',
           'vm_name',
        ];
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['inventory_date', 'region', 'vcenter_server', 'vm_name', 'vm_host_name', 'vm_state', 'vm_ip', 'vm_family', 'vm_guest_full_name', 'vm_guest_id', 'vm_memory', 'vm_esx_host', 'vm_total_vcpu', 'vm_num_cpus', 'vm_num_cores_per_cpu', 'vm_hardware_version', 'vm_is_template', 'vm_tools_status', 'vm_tools_version', 'vm_tools_version_status', 'vm_name_check', 'vm_provisionedspaceGB', 'vm_usedspaceGB', 'vm_compliance_check', 'VMCountryCode'], 'required'],
            [['inventory_date'], 'safe'],
            [['vm_memory', 'vm_total_vcpu', 'vm_num_cpus', 'vm_num_cores_per_cpu', 'vm_is_template', 'vm_tools_version', 'vm_provisionedspaceGB', 'vm_usedspaceGB'], 'integer'],
            [['region', 'vcenter_server', 'vm_name', 'vm_host_name', 'vm_state', 'vm_ip', 'vm_family', 'vm_guest_full_name', 'vm_guest_id', 'vm_esx_host', 'vm_hardware_version', 'vm_tools_status', 'vm_tools_version_status', 'vm_name_check', 'vm_compliance_check', 'VMCountryCode'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'inventory_date'=> 'Inventory Date',
            'region'=> 'Region',
            'vcenter_server'=> 'Vcenter Server',
            'vm_name' => 'Vm Name',
            'vm_host_name' => 'Vm Host Name',
            'vm_state' => 'Vm State',
            'vm_ip' => 'Vm Ip',
            'vm_family' => 'Vm Family',
            'vm_guest_full_name' => 'Vm Guest Full Name',
            'vm_guest_id' => 'Vm Guest ID',
            'vm_memory' => 'Vm Memory',
            'vm_esx_host' => 'Vm Esx Host',
            'vm_total_vcpu' => 'Vm Total Vcpu',
            'vm_num_cpus' => 'Vm Num Cpus',
            'vm_num_cores_per_cpu' => 'Vm Num Cores Per Cpu',
            'vm_hardware_version' => 'Vm Hardware Version',
            'vm_is_template' => 'Vm Is Template',
            'vm_tools_status' => 'Vm Tools Status',
            'vm_tools_version'=> 'Vm Tools Version',
            'vm_tools_version_status' => 'Vm Tools Version Status',
            'vm_name_check' => 'Vm Name Check',
            'vm_provisionedspaceGB' => 'Vm Provisionedspace Gb',
            'vm_usedspaceGB' => 'Vm Usedspace Gb',
            'vm_compliance_check' => 'Vm Compliance Check',
            'VMCountryCode' => 'Vmcountry Code',
        ];
    }
    
    /**
     * Create and fill a model automatically
     * @param array $v, $v is a array generated by reading a table with phpExcel
     */
    public function createVM($v){
        $attributes = $this->attributes();
        Yii::warning($attributes);
        
        for($i=0;$i< count($v);$i++){
            $this->$attributes[$i] = $v[$i];
        }
        $this->save();
        if(!$this->save(TRUE)){
            Yii::error(print_r($this->getErrors()));
            return false;
        }
            
    }
    public function valueCallback($champ){
          return Html::a($champ, ['site/index']);
    }
}   
