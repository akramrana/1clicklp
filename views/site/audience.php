<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\BaseUrl;

$this->title = 'Audience';
?>
<section id="my_account_dash" class="section_padding">
    <div class="container">
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="billing" role="tabpanel" aria-labelledby="billing-tab">
                <div class="profile">
                    <h2>
                        <span>Audience</span>
                        <span class="float-right"><a onclick="site.showAudienceModal()" href="javascript:;" class="btn btn-block btn-dark btn-sm">Add Audiences</a></span>
                    </h2>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>E-mail</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (!empty($models)) {
                                foreach ($models as $aud) {
                                    ?>
                                    <tr>
                                        <td><?= $aud->email; ?></td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                    <?php
                    echo \yii\widgets\LinkPager::widget([
                        'pagination' => $pages,
                        'firstPageLabel' => 'First',
                        'lastPageLabel' => 'Last',
                    ]);
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Modal -->
<div class="modal fade" id="aud-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Audiences</h5><br/>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p id="aud-response"></p>
                <textarea id="audience-email" class="form-control" placeholder="Enter audience email comma separated eg: john@gmail.com,martin@xyz.com"></textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="site.saveAudiences()">Save changes</button>
            </div>
        </div>
    </div>
</div>