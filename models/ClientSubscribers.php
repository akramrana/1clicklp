<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "client_subscribers".
 *
 * @property int $client_subscriber_id
 * @property int $client_id
 * @property int $client_template_id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $phone
 * @property string $message
 * @property string $ip_address
 * @property string $location
 * @property string $created_at
 * @property string $updated_at
 * @property int $is_active
 * @property int $is_deleted
 *
 * @property ClientCampaignUsers[] $clientCampaignUsers
 * @property ClientTemplates $clientTemplate
 * @property Clients $client
 */
class ClientSubscribers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'client_subscribers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['client_id', 'client_template_id', 'first_name', 'email', 'phone', 'ip_address', 'created_at'], 'required'],
            [['client_id', 'client_template_id', 'is_active', 'is_deleted'], 'integer'],
            [['message'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['first_name', 'last_name', 'ip_address'], 'string', 'max' => 50],
            [['email', 'phone', 'location'], 'string', 'max' => 128],
            ['email','email'],
            ['phone', 'match', 'pattern' => '/^[0-9-+]+$/', 'message' => Yii::t('yii', 'Your phone can only contain numeric characters with +/-')],
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
            'client_subscriber_id' => 'Client Subscriber ID',
            'client_id' => 'Client',
            'client_template_id' => 'Client Template',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'email' => 'Email',
            'phone' => 'Phone',
            'message' => 'Message',
            'ip_address' => 'Ip Address',
            'location' => 'Location',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'is_active' => 'Status',
            'is_deleted' => 'Is Deleted',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClientCampaignUsers()
    {
        return $this->hasMany(ClientCampaignUsers::className(), ['client_subscriber_id' => 'client_subscriber_id']);
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
