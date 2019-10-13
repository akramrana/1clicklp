<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ClientCampaigns;

/**
 * ClientCampaignSearch represents the model behind the search form of `app\models\ClientCampaigns`.
 */
class ClientCampaignSearch extends ClientCampaigns
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['client_campaign_id', 'client_id', 'client_campaign_type_id', 'client_template_id', 'is_publish', 'is_active', 'is_deleted'], 'integer'],
            [['campaign_name_en', 'campaign_description_en', 'created_at', 'updated_at', 'published_at'], 'safe'],
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
        $query = ClientCampaigns::find();

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
            'client_campaign_id' => $this->client_campaign_id,
            'client_id' => $this->client_id,
            'client_campaign_type_id' => $this->client_campaign_type_id,
            'client_template_id' => $this->client_template_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'published_at' => $this->published_at,
            'is_publish' => $this->is_publish,
            'is_active' => $this->is_active,
            'is_deleted' => $this->is_deleted,
        ]);

        $query->andFilterWhere(['like', 'campaign_name_en', $this->campaign_name_en])
            ->andFilterWhere(['like', 'campaign_description_en', $this->campaign_description_en]);

        return $dataProvider;
    }
}
