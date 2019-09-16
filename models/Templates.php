<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "templates".
 *
 * @property int $template_id
 * @property int $category_id
 * @property string $title_en
 * @property string $sub_title_en
 * @property string $image
 * @property double $regular_price
 * @property double $final_price
 * @property string $type F = Free, P = Premium
 * @property string $raw_html_content
 * @property string $folder_name
 * @property string $created_at
 * @property string $updated_at
 * @property int $is_active
 * @property int $is_deleted
 *
 * @property ClientTemplates[] $clientTemplates
 * @property Categories $category
 */
class Templates extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'templates';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id', 'title_en', 'sub_title_en', 'image', 'regular_price', 'final_price', 'type', 'raw_html_content', 'folder_name', 'created_at', 'updated_at'], 'required'],
            [['category_id', 'is_active', 'is_deleted'], 'integer'],
            [['regular_price', 'final_price'], 'number'],
            [['type', 'raw_html_content'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['title_en', 'sub_title_en', 'image'], 'string', 'max' => 255],
            [['folder_name'], 'string', 'max' => 50],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Categories::className(), 'targetAttribute' => ['category_id' => 'category_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'template_id' => 'Template ID',
            'category_id' => 'Category ID',
            'title_en' => 'Title En',
            'sub_title_en' => 'Sub Title En',
            'image' => 'Image',
            'regular_price' => 'Regular Price',
            'final_price' => 'Final Price',
            'type' => 'Type',
            'raw_html_content' => 'Raw Html Content',
            'folder_name' => 'Folder Name',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'is_active' => 'Is Active',
            'is_deleted' => 'Is Deleted',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClientTemplates()
    {
        return $this->hasMany(ClientTemplates::className(), ['template_id' => 'template_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Categories::className(), ['category_id' => 'category_id']);
    }
}
