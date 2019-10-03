<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Packages;

/**
 * PackageSearch represents the model behind the search form of `app\models\Packages`.
 */
class PackageSearch extends Packages
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['package_id', 'max_templates', 'validity', 'is_active', 'is_deleted'], 'integer'],
            [['name_en', 'description_en', 'created_at', 'updated_at'], 'safe'],
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
        $query = Packages::find();

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
            'package_id' => $this->package_id,
            'price' => $this->price,
            'max_templates' => $this->max_templates,
            'validity' => $this->validity,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'is_active' => $this->is_active,
            'is_deleted' => $this->is_deleted,
        ]);

        $query->andFilterWhere(['like', 'name_en', $this->name_en])
            ->andFilterWhere(['like', 'description_en', $this->description_en]);

        return $dataProvider;
    }
}
