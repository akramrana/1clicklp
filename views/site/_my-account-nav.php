<?php

use yii\helpers\Url;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="section_headline btm_padding">
    <h1>
        <?php
        echo Yii::$app->session['_1clickLpCustomerData']['first_name'].' '.Yii::$app->session['_1clickLpCustomerData']['last_name'];
        ?>
    </h1>
</div>
<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link <?php echo ($nav == 'overview') ? 'active' : '' ?>" id="home-tab" href="<?= Url::to(['site/my-account']); ?>" role="tab" aria-controls="home" aria-selected="true">Overview</a>
    </li>
    <li class="nav-item">
        <a class="nav-link <?php echo ($nav == 'billing') ? 'active' : '' ?>" id="billing-tab" href="<?= Url::to(['site/billing']); ?>" role="tab" aria-controls="Billing" aria-selected="false">Billing</a>
    </li>
    <li class="nav-item">
        <a class="nav-link <?php echo ($nav == 'api') ? 'active' : '' ?>" id="api-tab" href="<?= Url::to(['site/api']); ?>" role="tab" aria-controls="api" aria-selected="false">API</a>
    </li>
    <li class="nav-item">
        <a class="nav-link <?php echo ($nav == 'profile') ? 'active' : '' ?>" id="profile-tab" href="<?= Url::to(['site/edit-profile']); ?>" role="tab" aria-controls="profile" aria-selected="false">Profile</a>
    </li>
</ul>