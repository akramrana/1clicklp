<?php
namespace app\helpers;

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
}
