<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\BaseUrl;

$this->title = 'Edit Profile';
?>
<section id="my_account_dash" class="section_padding">
    <div class="container">
        <div class="section_headline btm_padding"><h1>Iqbal Ahmed</h1></div>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Overvirw</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="billing-tab" data-toggle="tab" href="#billing" role="tab" aria-controls="Billing" aria-selected="false">Billing</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="api-tab" data-toggle="tab" href="#integrations" role="tab" aria-controls="api" aria-selected="false">API</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="api-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="api" aria-selected="false">Profile</a>
            </li>
        </ul>
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
            <div class="tab-pane fade" id="billing" role="tabpanel" aria-labelledby="billing-tab">...</div>
            <div class="tab-pane fade" id="integrations" role="tabpanel" aria-labelledby="integrations-tab">...</div>

            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <div class="profile">
                    <h2>Profile photo</h2>
                    <div class="profile_photo">
                        <img src="<?=BaseUrl::home();?>ui/images/icon_design.png" width="100" height="100">
                    </div>
                    <div class="profile_photo_upload">
                        <h3>Upload your photo</h3>
                        <p>Photo should be at least 300px x 300px</p>
                        <input type="file" class="btn btn-primary" id="exampleFormControlFile1"> 
                        <a class="btn btn-primary" href="">Take a Photo</a>
                    </div>
                </div>
                <div class="row profile_info">
                    <div class="col-sm-6">
                        <h2>Basic information</h2>
                        <form>
                            <div class="form-group">
                                <label for="formGroupExampleInput">Username</label>
                                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input">
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput2">Another label</label>
                                <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Another input">
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput2">Another label</label>
                                <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Another input">
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput2">Another label</label>
                                <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Another input">
                            </div>
                        </form>
                    </div>
                    <div class="col-sm-6">
                        <h2>Change password</h2>
                        <form>
                            <div class="form-group">
                                <label for="formGroupExampleInput">Verify your password</label>
                                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input">
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput2">New password</label>
                                <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Another input">
                            </div>

                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>