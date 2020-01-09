<?php

use yii\helpers\Html;
use yii\helpers\BaseUrl;

$this->title = 'Signin';
?>

<section id="login_page" class="section_padding">
    <div class="container">
        <div class="main_round_box"> 
            <div class="row">
                <div class="col-sm-5">
                    <div class="left_blue_box section_headline">
                        <h1>Sign In to XYZ</h1>
                        <ul>
                            <li><a href="" ><i class="fa fa-facebook"></i></a></li>
                            <li><a href="" ><i class="fa fa-linkedin"></i></a></li>	
                        </ul>
                        <a href="" class="sign_email_txt">or use your email account</a>
                        <form>
                            <div class="form-group">
                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                                <!--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                            </div>

                            <button type="submit" class="btn btn-primary prpl_btn">Sign In</button>
                            <div class="form-group">
                                <a href="" class="form-check-label" for="exampleCheck1">Forgotyour password?</a>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-sm-7">
                    <div class="right_wt_box section_headline">
                        <h1>Sign Up for <b>FREE</b></h1>
                        <p>Enter your personal details<br>and start journy with us.</p>
                        <a href="signup.html" class="btn btn-primary prpl_btn">Sign Up</a>

                    </div>
                </div>
            </div>
        </div>
    </div>	
</section>