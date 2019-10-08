<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ClientSubscribers;

/**
 * ClientSubscriberSearch represents the model behind the search form of `app\models\ClientSubscribers`.
 */
class ClientSubscriberSearch extends ClientSubscribers
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['client_subscriber_id', 'client_id', 'client_template_id', 'is_active', 'is_deleted'], 'integer'],
            [['first_name', 'last_name', 'email', 'phone', 'message', 'ip_address', 'location', 'created_at', 'updated_at'], 'safe'],
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
        $query = ClientSubscribers::find();

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
            'client_subscriber_id' => $this->client_subscriber_id,
            'client_id' => $this->client_id,
            'client_template_id' => $this->client_template_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'is_active' => $this->is_active,
            'is_deleted' => $this->is_deleted,
        ]);

        $query->andFilterWhere(['like', 'first_name', $this->first_name])
            ->andFilterWhere(['like', 'last_name', $this->last_name])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'message', $this->message])
            ->andFilterWhere(['like', 'ip_address', $this->ip_address])
            ->andFilterWhere(['like', 'location', $this->location]);

        return $dataProvider;
    }
}
