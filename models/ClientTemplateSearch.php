<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ClientTemplates;

/**
 * ClientTemplateSearch represents the model behind the search form of `app\models\ClientTemplates`.
 */
class ClientTemplateSearch extends ClientTemplates
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['client_template_id', 'template_id', 'client_id', 'is_published', 'is_active', 'is_deleted'], 'integer'],
            [['name_en', 'page_title_en', 'raw_html_content', 'publish_url', 'created_at', 'updated_at', 'published_at', 'is_published'], 'safe'],
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
        $query = ClientTemplates::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => ['defaultOrder' => ['client_template_id' => SORT_DESC]],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'client_template_id' => $this->client_template_id,
            'template_id' => $this->template_id,
            'client_id' => $this->client_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'published_at' => $this->published_at,
            'is_published' => $this->is_published,
            'is_active' => $this->is_active,
            'is_deleted' => 0,
        ]);

        $query->andFilterWhere(['like', 'name_en', $this->name_en])
            ->andFilterWhere(['like', 'page_title_en', $this->page_title_en])
            ->andFilterWhere(['like', 'raw_html_content', $this->raw_html_content])
            ->andFilterWhere(['like', 'publish_url', $this->publish_url]);

        return $dataProvider;
    }
}
