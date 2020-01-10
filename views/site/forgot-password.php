<?php

use yii\helpers\Html;
use yii\helpers\BaseUrl;

$this->title = 'Reset Password';
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
                            <label class="col-form-label">Insert your email</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="">
                        </div>

                        <button type="submit" class="btn btn-primary prpl_btn">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>	
</section>