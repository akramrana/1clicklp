<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\BaseUrl;

$this->title = 'API';
?>
<section id="my_account_dash" class="section_padding">
    <div class="container">
        <?php
        echo $this->render('_my-account-nav',[
            'nav' => 'api'
        ]);
        ?>
        <div class="tab-content" id="myTabContent">
            
            <div class="tab-pane fade show active" id="integrations" role="tabpanel" aria-labelledby="integrations-tab">
                <div class="profile">
                    <h2>API</h2>
                </div>
            </div>
            
        </div>
    </div>
</section>