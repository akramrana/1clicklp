<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ClientCampaignTypes;

/**
 * ClientCampaignTypeSearch represents the model behind the search form of `app\models\ClientCampaignTypes`.
 */
class ClientCampaignTypeSearch extends ClientCampaignTypes
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['client_campaign_type_id', 'client_id'], 'integer'],
            [['name_en', 'created_at', 'updated_at', 'is_active', 'is_deleted'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = ClientCampaignTypes::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => ['defaultOrder' => ['client_campaign_type_id' => SORT_DESC]],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'client_campaign_type_id' => $this->client_campaign_type_id,
            'client_id' => $this->client_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'is_active' => $this->is_active,
            'is_deleted' => 0
        ]);

        $query->andFilterWhere(['like', 'name_en', $this->name_en]);

        return $dataProvider;
    }
}
