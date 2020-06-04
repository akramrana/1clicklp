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
            <div class="tab-pane fade show active campaign-confirmation" id="billing" role="tabpanel" aria-labelledby="billing-tab">
                <div class="profile">
                    <h2><?= $model->campaign_name_en; ?></h2>
                    <p>Campaign published</p>
                </div>
                <div class="row">
                    <div class="col-12">
                        <table class="table table-bordered">
                            <tr class="">
                                <th class="">
                                    <strong>Name of Campaign</strong>
                                </th>
                                <td class="">
                                    <?= $model->campaign_name_en; ?>
                                </td>
                            </tr>
                            <tr class="">
                                <th class="">
                                    Description
                                </th>
                                <td class="">
                                    <?= $model->campaign_description_en; ?>
                                </td>
                            </tr>
                            <tr class="">
                                <th class="">
                                    From Name
                                </th>
                                <td class="">
                                    <?= $model->campaign_from_name; ?>
                                </td>
                            </tr>
                            <tr class="">
                                <th class="">
                                    Email
                                </th>
                                <td class="">
                                    <?= $model->campaign_from_email; ?>
                                </td>
                            </tr>
                            <tr class="">
                                <th class="">
                                    Published At
                                </th>
                                <td class="col-9">
                                    <?= $model->published_at; ?>
                                </td>
                            </tr>
                            <tr class="">
                                <th class="">
                                    Campaign Unique Url
                                </th>
                                <td class="">
                                    <a href="<?= Url::to(['site/view-template', 'unique_id' => $model->campaign_number], true); ?>">
                                        <?= Url::to(['site/view-template', 'unique_id' => $model->campaign_number], true); ?>
                                    </a>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
