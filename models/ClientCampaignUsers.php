<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "client_campaign_users".
 *
 * @property int $client_campaign_user
 * @property int $client_campaign_id
 * @property int $client_subscriber_id
 *
 * @property ClientCampaigns $clientCampaign
 * @property ClientSubscribers $clientSubscriber
 */
class ClientCampaignUsers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'client_campaign_users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['client_campaign_id', 'client_subscriber_id'], 'required'],
            [['client_campaign_id', 'client_subscriber_id'], 'integer'],
            [['client_campaign_id'], 'exist', 'skipOnError' => true, 'targetClass' => ClientCampaigns::className(), 'targetAttribute' => ['client_campaign_id' => 'client_campaign_id']],
            [['client_subscriber_id'], 'exist', 'skipOnError' => true, 'targetClass' => ClientSubscribers::className(), 'targetAttribute' => ['client_subscriber_id' => 'client_subscriber_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'client_campaign_user' => 'Client Campaign User',
            'client_campaign_id' => 'Client Campaign ID',
            'client_subscriber_id' => 'Client Subscriber ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClientCampaign()
    {
        return $this->hasOne(ClientCampaigns::className(), ['client_campaign_id' => 'client_campaign_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClientSubscriber()
    {
        return $this->hasOne(ClientSubscribers::className(), ['client_subscriber_id' => 'client_subscriber_id']);
    }
}
