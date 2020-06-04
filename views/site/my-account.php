<?php

use yii\helpers\Html;
use yii\helpers\BaseUrl;
use yii\helpers\Url;

$this->title = 'My Account';

$user = Yii::$app->session['_1clickLpCustomerData'];
$package = \app\models\ClientPackages::find()
        ->where(['client_id' => $user->client_id, 'status' => 1])
        ->one();
?>
<section id="my_account_dash" class="section_padding">
    <div class="container">
        <?php
        echo $this->render('_my-account-nav', [
            'nav' => 'overview'
        ]);
        ?>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <div class="overview_box profile">
                    <h2>Package Info</h2>
                    <h4><?= $package->package->name_en; ?></h4>
                    <p><?= $package->package->description_en; ?></p>
                    <p>Validity <?= $package->validity; ?> day(s)</p>
                    <p>Valid till <?= $package->expiry_date; ?> </p>

                    <h4>Templates (<?= $package->max_templates; ?>)</h4>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">0%</div>
                    </div>
                    <h4>Subscribers (<?= $package->max_subscriber ?>)</h4>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">0%</div>
                    </div>
                    <h4>Email sends (<?= $package->max_email ?>)</h4>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">0%</div>
                    </div>
                    <a class="btn btn-primary prpl_btn" href="<?= Url::to(['site/signin']); ?>">Upgrade Plan</a>
                </div>
            </div>
        </div>
    </div>
</section>