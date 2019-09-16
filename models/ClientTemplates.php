<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "client_templates".
 *
 * @property int $client_template_id
 * @property int $template_id
 * @property int $client_id
 * @property string $name_en
 * @property string $page_title_en
 * @property string $raw_html_content
 * @property string $publish_url
 * @property string $created_at
 * @property string $updated_at
 * @property string $published_at
 * @property int $is_published
 * @property int $is_active
 * @property int $is_deleted
 *
 * @property ClientCampaigns[] $clientCampaigns
 * @property ClientSubscribers[] $clientSubscribers
 * @property Clients $client
 * @property Templates $template
 */
class ClientTemplates extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'client_templates';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['template_id', 'client_id', 'name_en', 'raw_html_content', 'publish_url', 'created_at'], 'required'],
            [['template_id', 'client_id', 'is_published', 'is_active', 'is_deleted'], 'integer'],
            [['page_title_en', 'raw_html_content'], 'string'],
            [['created_at', 'updated_at', 'published_at'], 'safe'],
            [['name_en', 'publish_url'], 'string', 'max' => 255],
            [['client_id'], 'exist', 'skipOnError' => true, 'targetClass' => Clients::className(), 'targetAttribute' => ['client_id' => 'client_id']],
            [['template_id'], 'exist', 'skipOnError' => true, 'targetClass' => Templates::className(), 'targetAttribute' => ['template_id' => 'template_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'client_template_id' => 'Client Template ID',
            'template_id' => 'Template ID',
            'client_id' => 'Client ID',
            'name_en' => 'Name En',
            'page_title_en' => 'Page Title En',
            'raw_html_content' => 'Raw Html Content',
            'publish_url' => 'Publish Url',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'published_at' => 'Published At',
            'is_published' => 'Is Published',
            'is_active' => 'Is Active',
            'is_deleted' => 'Is Deleted',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClientCampaigns()
    {
        return $this->hasMany(ClientCampaigns::className(), ['client_template_id' => 'client_template_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClientSubscribers()
    {
        return $this->hasMany(ClientSubscribers::className(), ['client_template_id' => 'client_template_id']);
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
    public function getTemplate()
    {
        return $this->hasOne(Templates::className(), ['template_id' => 'template_id']);
    }
}
