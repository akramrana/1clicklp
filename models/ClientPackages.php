<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "client_packages".
 *
 * @property int $client_package_id
 * @property int $client_id
 * @property int $package_id
 * @property string $package_number
 * @property string $purchase_date
 * @property string $expiry_date
 * @property int $is_paid
 * @property double $price
 * @property int $max_templates
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Clients $client
 * @property Packages $package
 */
class ClientPackages extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'client_packages';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['client_id', 'package_id', 'purchase_date', 'expiry_date', 'price', 'max_templates', 'created_at', 'updated_at'], 'required'],
            [['client_id', 'package_id', 'is_paid', 'max_templates'], 'integer'],
            [['purchase_date', 'expiry_date', 'created_at', 'updated_at'], 'safe'],
            [['price'], 'number'],
            [['package_number'], 'string', 'max' => 50],
            [['client_id'], 'exist', 'skipOnError' => true, 'targetClass' => Clients::className(), 'targetAttribute' => ['client_id' => 'client_id']],
            [['package_id'], 'exist', 'skipOnError' => true, 'targetClass' => Packages::className(), 'targetAttribute' => ['package_id' => 'package_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'client_package_id' => 'Client Package ID',
            'client_id' => 'Client',
            'package_id' => 'Package',
            'package_number' => 'Package Number',
            'purchase_date' => 'Purchase Date',
            'expiry_date' => 'Expiry Date',
            'is_paid' => 'Is Paid',
            'price' => 'Price',
            'max_templates' => 'Max Templates',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClient()
    {
        return $this->hasOne(Clients::className(), ['client_id' => 'client_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPackage()
    {
        return $this->hasOne(Packages::className(), ['package_id' => 'package_id']);
    }
}
