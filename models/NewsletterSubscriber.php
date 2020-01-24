<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "newsletter_subscriber".
 *
 * @property int $newsletter_subscriber_id
 * @property string $email
 * @property int $status
 * @property string $subscribe_date
 */
class NewsletterSubscriber extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'newsletter_subscriber';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['email'], 'required'],
            [['email'], 'email'],
            [['status'], 'integer'],
            [['subscribe_date'], 'safe'],
            [['email'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'newsletter_subscriber_id' => 'Newsletter Subscriber ID',
            'email' => 'Email',
            'status' => 'Status',
            'subscribe_date' => 'Subscribe Date',
        ];
    }
}
