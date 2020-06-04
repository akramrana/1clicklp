<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "client_audiences".
 *
 * @property int $client_audience_id
 * @property int $client_id
 * @property int $email
 *
 * @property Clients $client
 */
class ClientAudiences extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'client_audiences';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['client_id', 'email'], 'required'],
            [['client_id'], 'integer'],
            ['email', 'email'],
            [['client_id'], 'exist', 'skipOnError' => true, 'targetClass' => Clients::className(), 'targetAttribute' => ['client_id' => 'client_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'client_audience_id' => 'Client Audience ID',
            'client_id' => 'Client ID',
            'email' => 'Email',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClient()
    {
        return $this->hasOne(Clients::className(), ['client_id' => 'client_id']);
    }
}
