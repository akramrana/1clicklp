<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "faq".
 *
 * @property int $faq_id
 * @property string $question_en
 * @property string $answer_en
 */
class Faq extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'faq';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['question_en', 'answer_en'], 'required'],
            [['question_en', 'answer_en'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'faq_id' => 'Faq ID',
            'question_en' => 'Question',
            'answer_en' => 'Answer',
        ];
    }
}
