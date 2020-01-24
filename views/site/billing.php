<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\BaseUrl;

$this->title = 'Billing';
?>
<section id="my_account_dash" class="section_padding">
    <div class="container">
        <?php
        echo $this->render('_my-account-nav', [
            'nav' => 'billing'
        ]);
        ?>
        <div class="tab-content" id="myTabContent">

            <div class="tab-pane fade show active" id="billing" role="tabpanel" aria-labelledby="billing-tab">
                <div class="profile">
                    <h2>Billing</h2>
                </div>
            </div>

        </div>
    </div>
</section>