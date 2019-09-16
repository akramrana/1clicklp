<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "packages".
 *
 * @property int $package_id
 * @property string $name_en
 * @property string $description_en
 * @property double $price
 * @property int $max_templates
 * @property int $validity
 * @property string $created_at
 * @property string $updated_at
 * @property int $is_active
 * @property int $is_deleted
 *
 * @property ClientPackages[] $clientPackages
 */
class Packages extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'packages';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name_en', 'price', 'validity', 'created_at'], 'required'],
            [['description_en'], 'string'],
            [['price'], 'number'],
            [['max_templates', 'validity', 'is_active', 'is_deleted'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name_en'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'package_id' => 'Package ID',
            'name_en' => 'Name En',
            'description_en' => 'Description En',
            'price' => 'Price',
            'max_templates' => 'Max Templates',
            'validity' => 'Validity',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'is_active' => 'Is Active',
            'is_deleted' => 'Is Deleted',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClientPackages()
    {
        return $this->hasMany(ClientPackages::className(), ['package_id' => 'package_id']);
    }
}
