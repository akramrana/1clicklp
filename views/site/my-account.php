<?php

use yii\helpers\Html;
use yii\helpers\BaseUrl;
use yii\helpers\Url;

$this->title = 'My Account';
?>
<section id="my_account_dash" class="section_padding">
    <div class="container">
        <?php
        echo $this->render('_my-account-nav',[
            'nav' => 'overview'
        ]);
        ?>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <div class="overview_box">
                    <h4>Subscribers (1000)</h4>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: 30%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">30%</div>
                    </div>
                    <h4>Email sends (10,000)</h4>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: 50%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">50%</div>
                    </div>
                    <a class="btn btn-primary prpl_btn" href="<?= Url::to(['site/signin']);?>">Upgrade Plan</a>
                </div>
            </div>
        </div>
    </div>
</section>