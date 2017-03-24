<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\vm;

/**
 * vmSearch represents the model behind the search form of `app\models\vm`.
 */
class vmSearch extends vm
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['inventory_date', 'region', 'vcenter_server', 'vm_name', 'vm_host_name', 'vm_state', 'vm_ip', 'vm_family', 'vm_guest_full_name', 'vm_guest_id', 'vm_esx_host', 'vm_hardware_version', 'vm_tools_status', 'vm_tools_version', 'vm_tools_version_status', 'vm_name_check', 'vm_compliance_check', 'VMCountryCode'], 'safe'],
            [['vm_memory', 'vm_total_vcpu', 'vm_num_cpus', 'vm_num_cores_per_cpu', 'vm_is_template', 'vm_provisionedspaceGB', 'vm_usedspaceGB'], 'integer'],
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
        $query = vm::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination'=>[
                'pageSize' => 50,
            ],
        ]);
        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
//            'inventory_date' => $this->inventory_date,
            'vm_memory' => $this->vm_memory,
            'vm_total_vcpu' => $this->vm_total_vcpu,
            'vm_num_cpus' => $this->vm_num_cpus,
            'vm_num_cores_per_cpu' => $this->vm_num_cores_per_cpu,
            'vm_is_template' => $this->vm_is_template,
            'vm_provisionedspaceGB' => $this->vm_provisionedspaceGB,
            'vm_usedspaceGB' => $this->vm_usedspaceGB,
        ]);
        $today = date('y-m-d h:i:s a', time());
        Yii::warning($today);
        
        $query->andFilterWhere(['between','inventory_date', $this->inventory_date,$today])
            ->andFilterWhere(['like', 'region', $this->region])
            ->andFilterWhere(['like', 'vcenter_server', $this->vcenter_server])
            ->andFilterWhere(['like', 'vm_name', $this->vm_name])
            ->andFilterWhere(['like', 'vm_host_name', $this->vm_host_name])
            ->andFilterWhere(['like', 'vm_state', $this->vm_state])
            ->andFilterWhere(['like', 'vm_ip', $this->vm_ip])
            ->andFilterWhere(['like', 'vm_family', $this->vm_family])
            ->andFilterWhere(['like', 'vm_guest_full_name', $this->vm_guest_full_name])
            ->andFilterWhere(['like', 'vm_guest_id', $this->vm_guest_id])
            ->andFilterWhere(['like', 'vm_esx_host', $this->vm_esx_host])
            ->andFilterWhere(['like', 'vm_hardware_version', $this->vm_hardware_version])
            ->andFilterWhere(['like', 'vm_tools_status', $this->vm_tools_status])
            ->andFilterWhere(['like', 'vm_tools_version', $this->vm_tools_version])
            ->andFilterWhere(['like', 'vm_tools_version_status', $this->vm_tools_version_status])
            ->andFilterWhere(['like', 'vm_name_check', $this->vm_name_check])
            ->andFilterWhere(['like', 'vm_compliance_check', $this->vm_compliance_check])
            ->andFilterWhere(['like', 'VMCountryCode', $this->VMCountryCode]);

        return $dataProvider;
    }
}
