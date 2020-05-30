<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\BaseUrl;

$this->title = 'Pricing';
?>
<section id="price_tbl" class="section_padding">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 section_headline text-center">
                <h1><b>Pricing</b> - We keep it simple and <b>Flexible</b></h1>
            </div>
        </div>

        <div class="row">
            <?php
            if (!empty($models)) {
                foreach ($models as $key => $model) {
                    $class = '';
                    if ($model->package_id == 2) {
                        $class = 'price_blue_bg';
                    }
                    ?>
                    <div class="col-sm-4">
                        <div class="text-center single_price_tbl <?= $class; ?>">
                            <h1><?= $model->name_en; ?></h1>
                            <h2><sup>$</sup><?= $model->price; ?></h2>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><b><?= $model->max_templates; ?></b> Template(s)</li>
                                <li class="list-group-item"><?= $model->description_en; ?></li>
                                <li class="list-group-item"><b><?= $model->validity; ?></b> Day(s) Validity</li>
                                <li class="list-group-item"><b><?= $model->max_subscriber; ?></b> Subscriber(s)</li>
                                <li class="list-group-item"><b><?= $model->max_email; ?></b> Email(s)</li>
                            </ul>
                            <?php
                            if (Yii::$app->session['_1clickLpCustomerLogin']) {
                                ?>
                                <a class="btn btn-primary prpl_btn" href="<?= Url::to(['site/package-details','id' => $model->package_id]); ?>">Buy Now</a>
                                <?php
                            } else {
                                ?>
                                <a class="btn btn-primary prpl_btn" href="<?= Url::to(['site/signup']); ?>">Sign Up</a>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>
        </div>

    </div>
</section>


