<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "client_campaign_types".
 *
 * @property int $client_campaign_type_id
 * @property int $client_id
 * @property string $name_en
 * @property string $created_at
 * @property string $updated_at
 * @property string $is_active
 * @property string $is_deleted
 *
 * @property Clients $client
 * @property ClientCampaigns[] $clientCampaigns
 */
class ClientCampaignTypes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'client_campaign_types';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['client_id', 'name_en', 'created_at', 'is_active', 'is_deleted'], 'required'],
            [['client_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name_en'], 'string', 'max' => 50],
            [['client_id'], 'exist', 'skipOnError' => true, 'targetClass' => Clients::className(), 'targetAttribute' => ['client_id' => 'client_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'client_campaign_type_id' => 'Client Campaign Type ID',
            'client_id' => 'Client',
            'name_en' => 'Name',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'is_active' => 'Status',
            'is_deleted' => 'Is Deleted',
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
    public function getClientCampaigns()
    {
        return $this->hasMany(ClientCampaigns::className(), ['client_campaign_type_id' => 'client_campaign_type_id']);
    }
}
