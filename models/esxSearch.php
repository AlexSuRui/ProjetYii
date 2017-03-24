<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\esx;

/**
 * esxSearch represents the model behind the search form of `app\models\esx`.
 */
class esxSearch extends esx
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['inventory_date', 'region', 'vcenter_server', 'UUID', 'device_name', 'FQDN', 'connected_state', 'device_manufacturer', 'device_model', 'device_serial_number', 'operating_system', 'operating_system_name', 'operating_system_version', 'ip_address', 'mac_address', 'cpu_name', 'cluster_name', 'datacenter_name', 'import_device_type_id', 'esx_version_check', 'fqdn_check', 'domain_name_check', 'dns_check', 'dns_servers', 'search_suffix_check', 'vswitch_forged_transmits', 'promiscious_mode', 'mac_changes', 'nic_teaming_active', 'default_vm_portgroup', 'esx_mgmt_network_check', 'esx_nas_network_check', 'ad_authentication', 'ntp_check', 'ntp_service', 'ntp_services', 'DCUI', 'ESXi_Shell', 'SSH_Status', 'Lockdown_Mode', 'SysLog_Status', 'SSL_Cert', 'SSL_Cert_Issuer', 'NLB_check', 'TPS_check', 'Cut_and_Paste_check', 'ESXiCountryCode'], 'safe'],
            [['operating_system_build', 'ram', 'cpu_speed', 'cpu_chip_count', 'cpu_core_count'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = esx::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'inventory_date' => $this->inventory_date,
            'operating_system_build' => $this->operating_system_build,
            'ram' => $this->ram,
            'cpu_speed' => $this->cpu_speed,
            'cpu_chip_count' => $this->cpu_chip_count,
            'cpu_core_count' => $this->cpu_core_count,
        ]);

        $query->andFilterWhere(['like', 'region', $this->region])
            ->andFilterWhere(['like', 'vcenter_server', $this->vcenter_server])
            ->andFilterWhere(['like', 'UUID', $this->UUID])
            ->andFilterWhere(['like', 'device_name', $this->device_name])
            ->andFilterWhere(['like', 'FQDN', $this->FQDN])
            ->andFilterWhere(['like', 'connected_state', $this->connected_state])
            ->andFilterWhere(['like', 'device_manufacturer', $this->device_manufacturer])
            ->andFilterWhere(['like', 'device_model', $this->device_model])
            ->andFilterWhere(['like', 'device_serial_number', $this->device_serial_number])
            ->andFilterWhere(['like', 'operating_system', $this->operating_system])
            ->andFilterWhere(['like', 'operating_system_name', $this->operating_system_name])
            ->andFilterWhere(['like', 'operating_system_version', $this->operating_system_version])
            ->andFilterWhere(['like', 'ip_address', $this->ip_address])
            ->andFilterWhere(['like', 'mac_address', $this->mac_address])
            ->andFilterWhere(['like', 'cpu_name', $this->cpu_name])
            ->andFilterWhere(['like', 'cluster_name', $this->cluster_name])
            ->andFilterWhere(['like', 'datacenter_name', $this->datacenter_name])
            ->andFilterWhere(['like', 'import_device_type_id', $this->import_device_type_id])
            ->andFilterWhere(['like', 'esx_version_check', $this->esx_version_check])
            ->andFilterWhere(['like', 'fqdn_check', $this->fqdn_check])
            ->andFilterWhere(['like', 'domain_name_check', $this->domain_name_check])
            ->andFilterWhere(['like', 'dns_check', $this->dns_check])
            ->andFilterWhere(['like', 'dns_servers', $this->dns_servers])
            ->andFilterWhere(['like', 'search_suffix_check', $this->search_suffix_check])
            ->andFilterWhere(['like', 'vswitch_forged_transmits', $this->vswitch_forged_transmits])
            ->andFilterWhere(['like', 'promiscious_mode', $this->promiscious_mode])
            ->andFilterWhere(['like', 'mac_changes', $this->mac_changes])
            ->andFilterWhere(['like', 'nic_teaming_active', $this->nic_teaming_active])
            ->andFilterWhere(['like', 'default_vm_portgroup', $this->default_vm_portgroup])
            ->andFilterWhere(['like', 'esx_mgmt_network_check', $this->esx_mgmt_network_check])
            ->andFilterWhere(['like', 'esx_nas_network_check', $this->esx_nas_network_check])
            ->andFilterWhere(['like', 'ad_authentication', $this->ad_authentication])
            ->andFilterWhere(['like', 'ntp_check', $this->ntp_check])
            ->andFilterWhere(['like', 'ntp_service', $this->ntp_service])
            ->andFilterWhere(['like', 'ntp_services', $this->ntp_services])
            ->andFilterWhere(['like', 'DCUI', $this->DCUI])
            ->andFilterWhere(['like', 'ESXi_Shell', $this->ESXi_Shell])
            ->andFilterWhere(['like', 'SSH_Status', $this->SSH_Status])
            ->andFilterWhere(['like', 'Lockdown_Mode', $this->Lockdown_Mode])
            ->andFilterWhere(['like', 'SysLog_Status', $this->SysLog_Status])
            ->andFilterWhere(['like', 'SSL_Cert', $this->SSL_Cert])
            ->andFilterWhere(['like', 'SSL_Cert_Issuer', $this->SSL_Cert_Issuer])
            ->andFilterWhere(['like', 'NLB_check', $this->NLB_check])
            ->andFilterWhere(['like', 'TPS_check', $this->TPS_check])
            ->andFilterWhere(['like', 'Cut_and_Paste_check', $this->Cut_and_Paste_check])
            ->andFilterWhere(['like', 'ESXiCountryCode', $this->ESXiCountryCode]);

        return $dataProvider;
    }
}
