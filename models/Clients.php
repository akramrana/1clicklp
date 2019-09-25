<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "clients".
 *
 * @property int $client_id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $phone
 * @property string $password
 * @property int $is_social_register
 * @property int $is_phone_verified
 * @property int $is_email_verified
 * @property string $verification_code
 * @property string $created_at
 * @property string $updated_at
 * @property int $newsletter_subscribed
 * @property string $type F = Free User, P = Premium User
 * @property int $is_active
 * @property int $is_deleted
 *
 * @property ClientCampaignTypes[] $clientCampaignTypes
 * @property ClientCampaigns[] $clientCampaigns
 * @property ClientPackages[] $clientPackages
 * @property ClientSubscribers[] $clientSubscribers
 * @property ClientTemplates[] $clientTemplates
 */
class Clients extends \yii\db\ActiveRecord
{
    public $password_hash,$confirm_password;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'clients';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['first_name', 'email', 'phone', 'password', 'created_at', 'updated_at', 'type'], 'required'],
            [['is_social_register', 'is_phone_verified', 'is_email_verified', 'newsletter_subscribed', 'is_active', 'is_deleted'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['type'], 'string'],
            [['first_name', 'last_name', 'email', 'phone'], 'string', 'max' => 50],
            [['password'], 'string', 'max' => 128],
            [['verification_code'], 'string', 'max' => 16],
            ['email','email'],
            ['email','unique'],
            [['password_hash','confirm_password'], 'required', 'on' => 'create'],
            [['password_hash'],'string','min'=>6],
            ['password_hash', 'match', 'pattern' => '$\S*(?=\S{6,})(?=\S*[A-Z])(?=\S*[\d])(?=\S*[\W])\S*$', 'message' => 'Password should contain at least one upper case letter, one number and one special character'],
            ['confirm_password', 'compare', 'compareAttribute' => 'password_hash','message' => Yii::t('yii', 'Confirm Password must be equal to "Password"')],
            ['phone', 'match', 'pattern' => '/^[0-9-+]+$/', 'message' => Yii::t('yii', 'Your phone can only contain numeric characters with +/-')],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'client_id' => 'Client ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'email' => 'Email',
            'phone' => 'Phone',
            'password' => 'Password',
            'is_social_register' => 'Social Register?',
            'is_phone_verified' => 'Phone Verified?',
            'is_email_verified' => 'Email Verified?',
            'verification_code' => 'Verification Code',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'newsletter_subscribed' => 'Newsletter Subscribed',
            'type' => 'Type',
            'is_active' => 'Status',
            'is_deleted' => 'Is Deleted',
            'password_hash' => Yii::t('app', 'Password'),
            'confirm_password' => Yii::t('app', 'Confirm Password'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClientCampaignTypes()
    {
        return $this->hasMany(ClientCampaignTypes::className(), ['client_id' => 'client_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClientCampaigns()
    {
        return $this->hasMany(ClientCampaigns::className(), ['client_id' => 'client_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClientPackages()
    {
        return $this->hasMany(ClientPackages::className(), ['client_id' => 'client_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClientSubscribers()
    {
        return $this->hasMany(ClientSubscribers::className(), ['client_id' => 'client_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClientTemplates()
    {
        return $this->hasMany(ClientTemplates::className(), ['client_id' => 'client_id']);
    }
}
