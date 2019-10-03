<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "payments".
 *
 * @property int $payment_id
 * @property string $paymode C => Cash, B = Bkash, CC= Credit Card, P=Paypal
 * @property string $gross_amount
 * @property string $net_amount
 * @property string $currency_code
 * @property string $PaymentID
 * @property string $result
 * @property string $remark
 * @property string $payment_date
 * @property string $transaction_id
 * @property string $auth
 * @property string $ref
 * @property string $TrackID
 * @property string $udf1
 * @property string $udf2
 * @property string $udf3
 * @property string $udf4
 * @property string $udf5
 * @property int $status
 * @property string $type T => Template P => Package
 * @property int $type_id
 */
class Payments extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'payments';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['paymode', 'remark', 'type'], 'string'],
            [['gross_amount', 'net_amount'], 'number'],
            [['currency_code', 'type', 'type_id'], 'required'],
            [['payment_date'], 'safe'],
            [['status', 'type_id'], 'integer'],
            [['currency_code'], 'string', 'max' => 10],
            [['PaymentID', 'TrackID'], 'string', 'max' => 200],
            [['result', 'transaction_id', 'auth', 'ref', 'udf1', 'udf2', 'udf3', 'udf4', 'udf5'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'payment_id' => 'Payment ID',
            'paymode' => 'Paymode',
            'gross_amount' => 'Gross Amount',
            'net_amount' => 'Net Amount',
            'currency_code' => 'Currency Code',
            'PaymentID' => 'Payment ID',
            'result' => 'Result',
            'remark' => 'Remark',
            'payment_date' => 'Payment Date',
            'transaction_id' => 'Transaction ID',
            'auth' => 'Auth',
            'ref' => 'Ref',
            'TrackID' => 'Track ID',
            'udf1' => 'Udf1',
            'udf2' => 'Udf2',
            'udf3' => 'Udf3',
            'udf4' => 'Udf4',
            'udf5' => 'Udf5',
            'status' => 'Status',
            'type' => 'Type',
            'type_id' => 'Type Name',
        ];
    }
}
