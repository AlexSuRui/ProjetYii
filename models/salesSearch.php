<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\sales;

/**
 * salesSearch represents the model behind the search form of `app\models\sales`.
 */
class salesSearch extends sales
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['year', 'quarter', 'country', 'sales'], 'safe'],
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
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params, $query=null)
    {
        if($query ==null){
            $query = sales::find();
        }
        
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
             'pagination' => [
                'pageSize' => 30,
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
            'id' => $this->id,
        ]);
//        foreach ($filters as $filter){
//            $this->addFilter($dataProvider, $filter);
//        }
        $query->andFilterWhere(['like', 'year', $this->year])
                ->andFilterWhere(['like', 'quarter', $this->quarter])
                ->andFilterWhere(['like', 'country', $this->country])
                ->andFilterWhere(['like', 'sales', $this->sales]);
        

        return $dataProvider;
    }
    /**
     * Add filter to customize
     */
    protected function addFilter($dataProvider, $colomn1, $colomn2=null, $colomn3=null)
    {
        $query = $dataProvider->query;
        
        $query ->andFilterWhere(['like', $colomn1, $this->$colomn1]);
        if(!is_null($colomn2))
        {
            $query ->andFilterWhere(['like', $colomn2, $this->$colomn2]);
        }
        if(!is_null($colomn3))
        {
            $query ->andFilterWhere(['like', $colomn3, $this->$colomn3]);
        }
        return $dataProvider;
        
    }
}
