<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\assets;
use yii\web\AssetBundle;
/**
 * Description of EditorAsset
 *
 * @author akram
 */
class EditorAsset extends AssetBundle{
    //put your code here
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'vvvebjs/css/editor.css',
        'vvvebjs/css/line-awesome.css',
        'vvvebjs/libs/codemirror/lib/codemirror.css',
        'vvvebjs/libs/codemirror/theme/material.css',
    ];
    public $js = [
        'vvvebjs/js/jquery.min.js',
        'vvvebjs/js/jquery.hotkeys.js',
        'vvvebjs/js/popper.min.js',
        'vvvebjs/js/bootstrap.js',
        'vvvebjs/libs/builder/builder.js',
        'vvvebjs/libs/builder/undo.js',
        'vvvebjs/libs/builder/inputs.js',
        //'vvvebjs/libs/builder/components-server.js',
        'vvvebjs/libs/builder/components-bootstrap4.js',
        //'vvvebjs/libs/builder/components-widgets.js',
        'vvvebjs/libs/builder/sections-bootstrap4.js',
        'vvvebjs/libs/codemirror/lib/codemirror.js',
        'vvvebjs/libs/codemirror/lib/xml.js',
        'vvvebjs/libs/codemirror/lib/formatting.js',
        'vvvebjs/libs/builder/plugin-codemirror.js',
        'vvvebjs/libs/autocomplete/jquery.autocomplete.js',
    ];
}
