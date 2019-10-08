<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ClientPackages;

/**
 * ClientPackageSearch represents the model behind the search form of `app\models\ClientPackages`.
 */
class ClientPackageSearch extends ClientPackages
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['client_package_id', 'client_id', 'package_id', 'is_paid', 'max_templates'], 'integer'],
            [['package_number', 'purchase_date', 'expiry_date', 'created_at', 'updated_at'], 'safe'],
            [['price'], 'number'],
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
        $query = ClientPackages::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => ['defaultOrder' => ['client_package_id' => SORT_DESC]],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'client_package_id' => $this->client_package_id,
            'client_id' => $this->client_id,
            'package_id' => $this->package_id,
            'purchase_date' => $this->purchase_date,
            'expiry_date' => $this->expiry_date,
            'is_paid' => $this->is_paid,
            'price' => $this->price,
            'max_templates' => $this->max_templates,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'package_number', $this->package_number]);

        return $dataProvider;
    }
}
