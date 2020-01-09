<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\BaseUrl;
$this->title = 'About Us';
$this->params['breadcrumbs'][] = $this->title;
?>
<section id="features_section_one" class="section_padding about_hero">
    <div class="container-fluid">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col col-lg-8 text-center section_headline">
                    <h1><b>About us</b></h1>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="about_top_box" class="section_padding">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="about_box_copy section_copy section_headline">
                    <h1>Lorem ipsum dolor sit amet consectetur</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt <br>ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
                    <a class="btn btn-primary prpl_btn" href="signup.html">Register</a>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="our_exp" class="section_padding work_process">
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-sm-8 section_headline section_copy text-center">
                <h1>Lorem ipsum dolor sit amet consectetur</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
            </div>
        </div>
        <div class="row padding_top_50">
            <div class="col-sm-3">
                <div class="items common_img">
                    <img src="<?=BaseUrl::home();?>ui/images/icon_search.png" alt="Experience"/>
                    <div>
                        <h3>Discovery</h3>
                        <p>Lorem ipsum dolor sit amet</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="items common_img">
                    <img src="<?=BaseUrl::home();?>ui/images/icon_design.png" alt="Experience"/>
                    <div>
                        <h3>Design</h3>
                        <p>Lorem ipsum dolor sit amet</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="items common_img">
                    <img src="<?=BaseUrl::home();?>ui/images/icon_action.png" alt="Experience"/>
                    <div>
                        <h3>Action</h3>
                        <p>Lorem ipsum dolor sit amet</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="items common_img">
                    <img src="<?=BaseUrl::home();?>ui/images/icon_review.png" alt="Experience"/>
                    <div>
                        <h3>Review</h3>
                        <p>Lorem ipsum dolor sit amet</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
<section id="our_exp" class="about_product">
    <div class="container-fluid">
        <div class="row padding_top_50">
            <div class="col-sm-6 about_product_padd">
                <div class="section_headline section_copy">
                    <h2>Lorem ipsum dolor sit amet consectetur</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt</p>
                </div>
                <div class="items common_img">
                    <img src="<?=BaseUrl::home();?>ui/images/icon_responsive.png" alt="Experience"/>
                    <div>
                        <h3>Fully responsive </h3>
                        <p>Lorem ipsum dolor sit amet</p>
                    </div>
                </div>
                <div class="items common_img">
                    <img src="<?=BaseUrl::home();?>ui/images/icon_seo.png" alt="Experience"/>
                    <div>
                        <h3>SEO optimized</h3>
                        <p>Lorem ipsum dolor sit amet</p>
                    </div>
                </div>
                <div class="items common_img">
                    <img src="<?=BaseUrl::home();?>ui/images/icon_editor.png" alt="Experience"/>
                    <div>
                        <h3>Easy editor</h3>
                        <p>Lorem ipsum dolor sit amet</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <img src="<?=BaseUrl::home();?>ui/images/abt_dashboard.png" alt="about image" class="img-fluid" />
            </div>
        </div>
    </div>
</section>