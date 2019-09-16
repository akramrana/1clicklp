<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "client_campaigns".
 *
 * @property int $client_campaign_id
 * @property int $client_id
 * @property string $campaign_name_en
 * @property string $campaign_description_en
 * @property int $client_campaign_type_id
 * @property int $client_template_id
 * @property string $created_at
 * @property string $updated_at
 * @property string $published_at
 * @property int $is_publish
 * @property int $is_active
 * @property int $is_deleted
 *
 * @property ClientCampaignUsers[] $clientCampaignUsers
 * @property ClientCampaignTypes $clientCampaignType
 * @property ClientTemplates $clientTemplate
 * @property Clients $client
 */
class ClientCampaigns extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'client_campaigns';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['client_id', 'campaign_name_en', 'client_campaign_type_id', 'client_template_id', 'created_at'], 'required'],
            [['client_id', 'client_campaign_type_id', 'client_template_id', 'is_publish', 'is_active', 'is_deleted'], 'integer'],
            [['campaign_description_en'], 'string'],
            [['created_at', 'updated_at', 'published_at'], 'safe'],
            [['campaign_name_en'], 'string', 'max' => 50],
            [['client_campaign_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => ClientCampaignTypes::className(), 'targetAttribute' => ['client_campaign_type_id' => 'client_campaign_type_id']],
            [['client_template_id'], 'exist', 'skipOnError' => true, 'targetClass' => ClientTemplates::className(), 'targetAttribute' => ['client_template_id' => 'client_template_id']],
            [['client_id'], 'exist', 'skipOnError' => true, 'targetClass' => Clients::className(), 'targetAttribute' => ['client_id' => 'client_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'client_campaign_id' => 'Client Campaign ID',
            'client_id' => 'Client ID',
            'campaign_name_en' => 'Campaign Name En',
            'campaign_description_en' => 'Campaign Description En',
            'client_campaign_type_id' => 'Client Campaign Type ID',
            'client_template_id' => 'Client Template ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'published_at' => 'Published At',
            'is_publish' => 'Is Publish',
            'is_active' => 'Is Active',
            'is_deleted' => 'Is Deleted',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClientCampaignUsers()
    {
        return $this->hasMany(ClientCampaignUsers::className(), ['client_campaign_id' => 'client_campaign_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClientCampaignType()
    {
        return $this->hasOne(ClientCampaignTypes::className(), ['client_campaign_type_id' => 'client_campaign_type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClientTemplate()
    {
        return $this->hasOne(ClientTemplates::className(), ['client_template_id' => 'client_template_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClient()
    {
        return $this->hasOne(Clients::className(), ['client_id' => 'client_id']);
    }
}
