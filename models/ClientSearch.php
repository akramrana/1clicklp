<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Clients;

/**
 * ClientSearch represents the model behind the search form of `app\models\Clients`.
 */
class ClientSearch extends Clients
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['client_id', 'is_social_register', 'is_phone_verified', 'is_email_verified', 'newsletter_subscribed', 'is_active', 'is_deleted'], 'integer'],
            [['first_name', 'last_name', 'email', 'phone', 'password', 'verification_code', 'created_at', 'updated_at', 'type'], 'safe'],
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
        $query = Clients::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => ['defaultOrder' => ['client_id' => SORT_DESC]],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'client_id' => $this->client_id,
            'is_social_register' => $this->is_social_register,
            'is_phone_verified' => $this->is_phone_verified,
            'is_email_verified' => $this->is_email_verified,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'newsletter_subscribed' => $this->newsletter_subscribed,
            'is_active' => $this->is_active,
            'is_deleted' => 0,
        ]);

        $query->andFilterWhere(['like', 'first_name', $this->first_name])
            ->andFilterWhere(['like', 'last_name', $this->last_name])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'password', $this->password])
            ->andFilterWhere(['like', 'verification_code', $this->verification_code])
            ->andFilterWhere(['like', 'type', $this->type]);

        return $dataProvider;
    }
}
