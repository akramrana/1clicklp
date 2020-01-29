<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\BaseUrl;

$this->title = 'Edit Profile';
//debugPrint(Yii::$app->session['_1clickLpCustomerData']);
?>
<section id="my_account_dash" class="section_padding">
    <div class="container">
        <?php
        echo $this->render('_my-account-nav', [
            'nav' => 'profile'
        ]);
        ?>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <div class="profile">
                    <h2>Profile photo</h2>
                    <div class="profile_photo">
                        <?php
                        if (Yii::$app->session['_1clickLpCustomerData']['photo'] == null) {
                            $propic = BaseUrl::home() . 'ui/images/icon_design.png';
                        } else {
                            $propic = BaseUrl::home() . '/uploads/' . Yii::$app->session['_1clickLpCustomerData']['photo'];
                        }
                        ?>
                        <img id="usr-profic" src="<?= $propic; ?>" width="100" height="100">

                    </div>
                    <div class="profile_photo_upload">
                        <h3>Upload your photo</h3>
                        <p>Photo should be at least 300px x 300px</p>
                        <input accept="image/png, image/jpeg, images/gif" onchange="site.fileUpload(this)" type="file" class="btn btn-primary" id="exampleFormControlFile1">
                        <p id="profile-pic-help" class="error"></p>
                        <div id="progress" class="progress" style="display: none">
                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
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