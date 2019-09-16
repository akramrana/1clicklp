<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "test_template".
 *
 * @property int $id
 * @property string $html
 */
class TestTemplate extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'test_template';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['html'], 'required'],
            [['html'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'html' => 'Html',
        ];
    }
}
