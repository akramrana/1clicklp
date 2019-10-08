<?php
namespace app\helpers;
use yii\helpers\ArrayHelper;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AppHelper
 *
 * @author akram
 */
class AppHelper
{
    static function getPaymodes()
    {
        return [
            'C' => 'Cash', 'B' => 'Bkash', 'CC' => 'Credit Card', 'P' => 'Paypal'
        ];
    }
    
    static function getPaymodeName($paymode)
    {
        $modes = self::getPaymodes();
        return $modes[$paymode];
    }
    
    static function getAllCategories()
    {
        $model = \app\models\Categories::find()
                ->where(['is_deleted' => 0])
                ->orderBy(['name_en' => SORT_ASC])
                ->all(); 
        $list = ArrayHelper::map($model, 'category_id', 'name_en');
        return $list;
    }
    
    static function getAllClients()
    {
        $model = \app\models\Clients::find()
                ->where(['is_deleted' => 0])
                ->all(); 
        $list = ArrayHelper::map($model, 'client_id', function($model){
            return $model->first_name.' '.$model->last_name;
        });
        return $list;
    }
    
    static function getAllTemplates()
    {
        $model = \app\models\Templates::find()
                ->where(['is_deleted' => 0])
                ->all(); 
        $list = ArrayHelper::map($model, 'template_id', 'title_en');
        return $list;
    }
    
    static function getAllClientTemplates()
    {
        $model = \app\models\ClientTemplates::find()
                ->where(['is_deleted' => 0])
                ->all(); 
        $list = ArrayHelper::map($model, 'client_template_id', 'name_en');
        return $list;
    }
    
    static function getClientTemplatesById($id)
    {
        $model = \app\models\ClientTemplates::find()
                ->where(['is_deleted' => 0,'client_id' => $id])
                ->all(); 
        $list = ArrayHelper::map($model, 'client_template_id', 'name_en');
        return $list;
    }
}
