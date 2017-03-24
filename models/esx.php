<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "esx".
 *
 * @property string $inventory_date
 * @property string $region
 * @property string $vcenter_server
 * @property string $UUID
 * @property string $device_name
 * @property string $FQDN
 * @property string $connected_state
 * @property string $device_manufacturer
 * @property string $device_model
 * @property string $device_serial_number
 * @property string $operating_system
 * @property string $operating_system_name
 * @property string $operating_system_version
 * @property int $operating_system_build
 * @property string $ip_address
 * @property string $mac_address
 * @property int $ram
 * @property string $cpu_name
 * @property int $cpu_speed
 * @property int $cpu_chip_count
 * @property int $cpu_core_count
 * @property string $cluster_name
 * @property string $datacenter_name
 * @property string $import_device_type_id
 * @property string $esx_version_check
 * @property string $fqdn_check
 * @property string $domain_name_check
 * @property string $dns_check
 * @property string $dns_servers
 * @property string $search_suffix_check
 * @property string $vswitch_forged_transmits
 * @property string $promiscious_mode
 * @property string $mac_changes
 * @property string $nic_teaming_active
 * @property string $default_vm_portgroup
 * @property string $esx_mgmt_network_check
 * @property string $esx_nas_network_check
 * @property string $ad_authentication
 * @property string $ntp_check
 * @property string $ntp_service
 * @property string $ntp_services
 * @property string $DCUI
 * @property string $ESXi_Shell
 * @property string $SSH_Status
 * @property string $Lockdown_Mode
 * @property string $SysLog_Status
 * @property string $SSL_Cert
 * @property string $SSL_Cert_Issuer
 * @property string $NLB_check
 * @property string $TPS_check
 * @property string $Cut_and_Paste_check
 * @property string $ESXiCountryCode
 */
class esx extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'esx';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['inventory_date', 'region', 'vcenter_server', 'UUID', 'device_name', 'FQDN', 'connected_state', 'device_manufacturer', 'device_model', 'device_serial_number', 'operating_system', 'operating_system_name', 'operating_system_version', 'operating_system_build', 'ip_address', 'mac_address', 'ram', 'cpu_name', 'cpu_speed', 'cpu_chip_count', 'cpu_core_count', 'cluster_name', 'datacenter_name', 'import_device_type_id', 'esx_version_check', 'fqdn_check', 'domain_name_check', 'dns_check', 'dns_servers', 'search_suffix_check', 'vswitch_forged_transmits', 'promiscious_mode', 'mac_changes', 'nic_teaming_active', 'default_vm_portgroup', 'esx_mgmt_network_check', 'esx_nas_network_check', 'ad_authentication', 'ntp_check', 'ntp_service', 'ntp_services', 'DCUI', 'ESXi_Shell', 'SSH_Status', 'Lockdown_Mode', 'SysLog_Status', 'SSL_Cert', 'SSL_Cert_Issuer', 'NLB_check', 'TPS_check', 'Cut_and_Paste_check', 'ESXiCountryCode'], 'required'],
            [['inventory_date'], 'safe'],
            [['operating_system_build', 'ram', 'cpu_speed', 'cpu_chip_count', 'cpu_core_count'], 'integer'],
            [['region', 'vcenter_server', 'UUID', 'device_name', 'FQDN', 'connected_state', 'device_manufacturer', 'device_model', 'device_serial_number', 'operating_system', 'operating_system_name', 'operating_system_version', 'ip_address', 'mac_address', 'cpu_name', 'cluster_name', 'datacenter_name', 'import_device_type_id', 'esx_version_check', 'fqdn_check', 'domain_name_check', 'dns_check', 'dns_servers', 'search_suffix_check', 'vswitch_forged_transmits', 'promiscious_mode', 'mac_changes', 'nic_teaming_active', 'default_vm_portgroup', 'esx_mgmt_network_check', 'esx_nas_network_check', 'ad_authentication', 'ntp_check', 'ntp_service', 'ntp_services', 'DCUI', 'ESXi_Shell', 'SSH_Status', 'Lockdown_Mode', 'SysLog_Status', 'SSL_Cert', 'SSL_Cert_Issuer', 'NLB_check', 'TPS_check', 'Cut_and_Paste_check'], 'string', 'max' => 255],
            [['ESXiCountryCode'], 'string', 'max' => 50],
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
            'UUID' => 'UUID',
            'device_name' => 'Device Name',
            'FQDN' => 'FQDN',
            'connected_state' => 'Connected State',
            'device_manufacturer' => 'Device Manufacturer',
            'device_model' => 'Device Model',
            'device_serial_number' => 'Device Serial Number',
            'operating_system' => 'Operating System',
            'operating_system_name' => 'Operating System Name',
            'operating_system_version' => 'Operating System Version',
            'operating_system_build' => 'Operating System Build',
            'ip_address' => 'Ip Address',
            'mac_address' => 'Mac Address',
            'ram' => 'Ram',
            'cpu_name' => 'Cpu Name',
            'cpu_speed' => 'Cpu Speed',
            'cpu_chip_count' => 'Cpu Chip Count',
            'cpu_core_count' => 'Cpu Core Count',
            'cluster_name' => 'Cluster Name',
            'datacenter_name' => 'Datacenter Name',
            'import_device_type_id' => 'Import Device Type ID',
            'esx_version_check' => 'Esx Version Check',
            'fqdn_check' => 'Fqdn Check',
            'domain_name_check' => 'Domain Name Check',
            'dns_check' => 'Dns Check',
            'dns_servers' => 'Dns Servers',
            'search_suffix_check' => 'Search Suffix Check',
            'vswitch_forged_transmits' => 'Vswitch Forged Transmits',
            'promiscious_mode' => 'Promiscious Mode',
            'mac_changes' => 'Mac Changes',
            'nic_teaming_active' => 'Nic Teaming Active',
            'default_vm_portgroup' => 'Default Vm Portgroup',
            'esx_mgmt_network_check' => 'Esx Mgmt Network Check',
            'esx_nas_network_check' => 'Esx Nas Network Check',
            'ad_authentication' => 'Ad Authentication',
            'ntp_check' => 'Ntp Check',
            'ntp_service' => 'Ntp Service',
            'ntp_services' => 'Ntp Services',
            'DCUI' => 'DCUI',
            'ESXi_Shell' => 'ESXi Shell',
            'SSH_Status' => 'SSH Status',
            'Lockdown_Mode' => 'Lockdown Mode',
            'SysLog_Status' => 'Sys Log Status',
            'SSL_Cert' => 'SSL Cert',
            'SSL_Cert_Issuer' => 'SSL Cert Issuer',
            'NLB_check' => 'Nlb Check',
            'TPS_check' => 'Tps Check',
            'Cut_and_Paste_check' => 'Cut And Paste Check',
            'ESXiCountryCode' => 'Esxi Country Code',
        ];
    }
}
