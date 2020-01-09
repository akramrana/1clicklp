<?php

use yii\helpers\Html;
use yii\helpers\BaseUrl;

$this->title = 'Signup';
?>
<section id="login_page" class="section_padding">
    <div class="container">
        <div class="main_round_box"> 
            <div class="row">
                <div class="col-sm-5">
                    <div class="left_blue_box section_headline">
                        <h1>Sign Up for <b>FREE</b></h1>
                        <p>Enter your personal details<br>and start journy with us.</p>
                        <form>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Full name">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                            </div>

                            <button type="submit" class="btn btn-primary prpl_btn">Sign Up</button>
                        </form>
                    </div>
                </div>
                <div class="col-sm-7">
                    <div class="right_wt_box section_headline">
                        <h1>Try XYZ free<br>for 30 days </h1>
                        <p>We are the best online marketing platform that you can afford. Where you will get high converting landing pages within 1 click.</p>

                    </div>
                </div>
            </div>
        </div>
    </div>	
</section>