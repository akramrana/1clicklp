<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Templates;

/**
 * TemplateSearch represents the model behind the search form of `app\models\Templates`.
 */
class TemplateSearch extends Templates
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['template_id', 'category_id', 'is_active', 'is_deleted'], 'integer'],
            [['title_en', 'sub_title_en', 'image', 'type', 'raw_html_content', 'folder_name', 'created_at', 'updated_at'], 'safe'],
            [['regular_price', 'final_price'], 'number'],
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
        $query = Templates::find();

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
            'template_id' => $this->template_id,
            'category_id' => $this->category_id,
            'regular_price' => $this->regular_price,
            'final_price' => $this->final_price,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'is_active' => $this->is_active,
            'is_deleted' => $this->is_deleted,
        ]);

        $query->andFilterWhere(['like', 'title_en', $this->title_en])
            ->andFilterWhere(['like', 'sub_title_en', $this->sub_title_en])
            ->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'raw_html_content', $this->raw_html_content])
            ->andFilterWhere(['like', 'folder_name', $this->folder_name]);

        return $dataProvider;
    }
}
