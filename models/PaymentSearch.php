<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Payments;

/**
 * PaymentSearch represents the model behind the search form of `app\models\Payments`.
 */
class PaymentSearch extends Payments
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['payment_id', 'status', 'type_id'], 'integer'],
            [['paymode', 'currency_code', 'PaymentID', 'result', 'remark', 'payment_date', 'transaction_id', 'auth', 'ref', 'TrackID', 'udf1', 'udf2', 'udf3', 'udf4', 'udf5', 'type'], 'safe'],
            [['gross_amount', 'net_amount'], 'number'],
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
        $query = Payments::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => ['defaultOrder' => ['payment_id' => SORT_DESC]],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'payment_id' => $this->payment_id,
            'gross_amount' => $this->gross_amount,
            'net_amount' => $this->net_amount,
            'payment_date' => $this->payment_date,
            'status' => $this->status,
            'type_id' => $this->type_id,
        ]);

        $query->andFilterWhere(['like', 'paymode', $this->paymode])
            ->andFilterWhere(['like', 'currency_code', $this->currency_code])
            ->andFilterWhere(['like', 'PaymentID', $this->PaymentID])
            ->andFilterWhere(['like', 'result', $this->result])
            ->andFilterWhere(['like', 'remark', $this->remark])
            ->andFilterWhere(['like', 'transaction_id', $this->transaction_id])
            ->andFilterWhere(['like', 'auth', $this->auth])
            ->andFilterWhere(['like', 'ref', $this->ref])
            ->andFilterWhere(['like', 'TrackID', $this->TrackID])
            ->andFilterWhere(['like', 'udf1', $this->udf1])
            ->andFilterWhere(['like', 'udf2', $this->udf2])
            ->andFilterWhere(['like', 'udf3', $this->udf3])
            ->andFilterWhere(['like', 'udf4', $this->udf4])
            ->andFilterWhere(['like', 'udf5', $this->udf5])
            ->andFilterWhere(['like', 'type', $this->type]);

        return $dataProvider;
    }
}
