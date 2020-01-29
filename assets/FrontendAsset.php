<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\assets;
use yii\web\AssetBundle;
/**
 * Description of FrontendAsset
 *
 * @author akram
 */
class FrontendAsset extends AssetBundle
{
    public $baseUrl = '@web/ui/';
    
    public $css = [
        'css/bootstrap.min.css',
        'css/main.css',
        'css/responsive.css',
        'font-awesome/css/font-awesome.min.css',
        'https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,600,700,800,900&display=swap'
    ];
    
    public $js = [
        //'js/jquery-3.4.1.min.js.js',
        'js/bootstrap.min.js',
        'js/script.js',
        'js/site.js',
    ];
    
    public $depends = [
        'yii\web\YiiAsset',
    ];
}
