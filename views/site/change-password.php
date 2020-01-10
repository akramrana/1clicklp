<?php

use yii\helpers\Html;
use yii\helpers\BaseUrl;

$this->title = 'Change Password';
?>
<section id="login_page" class="section_padding">
    <div class="container">
        <div class="row justify-content-md-center password_change">
            <div class="col-sm-5">
                <div class="left_blue_box section_headline">
                    <h1>Reset Password Form</h1>
                    <hr>
                    <form>

                        <div class="form-group">
                            <label class="col-form-label">Email verification code password recovery</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="pwd" class="col-form-label">New Password</label>
                            <input type="password" class="form-control" id="pwd" name="New password">
                        </div>
                        <div class="form-group">
                            <label for="pwd" class="col-form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="pwd" name="Confirm password">
                        </div>

                        <button type="submit" class="btn btn-primary prpl_btn">Reset Password</button>
                    </form>
                </div>
            </div>
        </div>
    </div>	
</section>