<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\BaseUrl;

$this->title = 'Edit Profile';
?>
<section id="my_account_dash" class="section_padding">
    <div class="container">
        <?php
        echo $this->render('_my-account-nav',[
            'nav' => 'profile'
        ]);
        ?>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <div class="profile">
                    <h2>Profile photo</h2>
                    <div class="profile_photo">
                        <img src="<?=BaseUrl::home();?>ui/images/icon_design.png" width="100" height="100">
                    </div>
                    <div class="profile_photo_upload">
                        <h3>Upload your photo</h3>
                        <p>Photo should be at least 300px x 300px</p>
                        <input type="file" class="btn btn-primary" id="exampleFormControlFile1">
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