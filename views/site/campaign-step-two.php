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
                    <p>Create campaign steps-2</p>
                </div>
                <div class="row">
                    <div class="col-12">
                        <label class="label">From Name</label>
                        <input id="campaign-from-name" type="text" name="campaign-from-name" class="form-control"/>
                        
                        <div class="mt-4">
                            <label class="label">Email Address **</label>
                            <input id="campaign-from-email" type="text" name="campaign-from-email" class="form-control"/>
                        </div>
                        
                        <div class="mt-4">
                            <label class="label">Subject</label>
                            <input id="campaign-subject" type="text" name="campaign-subject" class="form-control"/>
                        </div>
                        
                        <div class="text-center mt-3">
                            <button class="btn btn-dark" onclick="site.updateCampaign(<?= $model->client_campaign_id; ?>)">Choose Template</button>
                            <button class="btn btn-default">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
