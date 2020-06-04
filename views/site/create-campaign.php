<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\BaseUrl;
use yii\widgets\LinkPager;

$this->title = $category->name_en;
?>
<section id="my_account_dash" class="section_padding">
    <div class="container">
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="billing" role="tabpanel" aria-labelledby="billing-tab">
                <div class="profile">
                    <h2>Create <?= $category->name_en; ?></h2>
                    <p>Keep your subscribers engaged by sharing your latest news, promoting a line of products, or announcing an event.</p>
                </div>
                <div class="row">
                    <div class="col-12">
                        <label class="label">Campaign Name</label>
                        <input id="campaign-name" type="text" name="campaign-name" class="form-control"/>
                        
                        <div class="mt-4">
                            <label class="label">Campaign Description</label>
                            <textarea id="campaign-description" name="campaign-description" class="form-control"></textarea>
                        </div>
                        
                        <div class="text-center mt-3">
                            <button class="btn btn-dark" onclick="site.createCampaign(<?= $category->category_id; ?>)">Begin</button>
                            <button class="btn btn-default">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
