<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\BaseUrl;
use yii\widgets\LinkPager;

$this->title = $model->campaign_name_en;
?>
<section id="my_account_dash" class="section_padding">
    <div class="container">
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="billing" role="tabpanel" aria-labelledby="billing-tab">
                <div class="profile">
                    <h2><?= $model->campaign_name_en; ?></h2>
                    <p>Choose template for your campaign</p>
                </div>
                <div class="row">
                    <?php
                    if (!empty($models)) {
                        foreach ($models as $row) {
                            ?>
                            <div class="col-3">
                                <div class="card pad-5">
                                    <img class="card-img-top" src="<?= BaseUrl::home() ?>uploads/<?= $row->image; ?>" alt="<?= $row->title_en; ?>"/>
                                    <div class="card-body">
                                        <h5 class="card-title"><?= $row->title_en; ?></h5>
                                        <p class="card-text card-sub-ttl"><?= $row->sub_title_en; ?>&nbsp;</p>
                                         <a href="<?= Url::to(['editor','id' => $row->template_id,'cid' => $model->client_campaign_id]); ?>" class="btn btn-primary">Get Template</a>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>
                <div class="col-11 col-1">
                    <?php
                    echo LinkPager::widget([
                        'pagination' => $pages,
                    ]);
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
