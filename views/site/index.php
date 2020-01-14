<?php
/* @var $this yii\web\View */
use yii\helpers\BaseUrl;
use yii\helpers\Url;
$this->title = 'Home';
?>
<section id="hero">
    <div class="container-fluid">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col col-lg-8 hero_txt_box text-center section_headline">
                    <h1><b>Promote</b> your business in <b>easy</b> 3 steps</h1>
                    <p><b>No domain hosting required</b> <br><b>Choose</b> a template, <b>publish</b> and let <b>audience know your services</b></p>
                    <a class="btn btn-primary prpl_btn" href="<?= Url::to(['site/signup']);?>">Sign up free</a>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-3">
                    <div class="round_box">
                        <h2>Email Marketing</h2>
                        <p>Qualified staff worked here over 10 years</p>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="round_box">
                        <h2>Landing Pages</h2>
                        <p>Various stimulating daily activities</p>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="round_box">
                        <h2>Auto Funnel</h2>
                        <p>Tasty menus designed by our residents</p>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="round_box">
                        <h2>Details Reporting</h2>
                        <p>Gorgeous views and accessible gardens </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<section id="home_copy" class="section_padding">
    <div class="container">
        <div class="row">
            <div class="col-sm-4 section_headline">
                <h1>Start your <b>promotion</b> in easy <b>3 steps</b></h1>
            </div>
            <div class="col-sm-8 section_copy">
                <p>
                    We are the best online marketing platform that you can afford. Where you will get high converting landing pages within <b>1 click.</b> <br><br>

                    You <b>don’t</b> need <b>Domain & hosting</b> to publish your landing page! When your template editing will be completed, you will get a publish button and you will get an unique URL. You can also create campaign with us.<br><br>

                    You will get an <b>easy management</b> dashboard, where you can see all the trackings or subscribers list and other options.
                </p>
            </div>
        </div>
    </div>
</section>
<section id="steps" class="section_padding">
    <div class="container">

        <div class="row">
            <div class="col-sm-4">
                <div class="stp_box">
                    <img src="<?=BaseUrl::home();?>ui/images/select_icon.png" alt="icon">
                    <h2>Select</h2>
                    <p>Select template from <br>our storage</p>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="stp_box">
                    <img src="<?=BaseUrl::home();?>ui/images/customize_icon.png" alt="icon">
                    <h2>Customize</h2>
                    <p>Easy to customize the template <br>by your own</p>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="stp_box">
                    <img src="<?=BaseUrl::home();?>ui/images/publish_icon.png" alt="icon">
                    <h2>Publish</h2>
                    <p>Publish your template <br>and get the URL</p>
                </div>
            </div>
        </div>


    </div>
</section>
<section id="features" class="section_padding">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 fetr_items">
                <ul>
                    <li>
                        <img src="<?=BaseUrl::home();?>ui/images/icon_LeadGeneration.png" alt="Lead Generation">
                        <h2>Lead Generation</h2>
                    </li>
                    <li>
                        <img src="<?=BaseUrl::home();?>ui/images/icon_dashboard.png" alt="Lead Generation">
                        <h2>Drag & drop tools</h2>
                    </li>
                    <li>
                        <img src="<?=BaseUrl::home();?>ui/images/icon_email_marketing.png" alt="Lead Generation">
                        <h2>Email Marketing</h2>
                    </li>
                    <li>
                        <img src="<?=BaseUrl::home();?>ui/images/icon_reporting.png" alt="Lead Generation">
                        <h2>Details Reporting</h2>
                    </li>
                    <li>
                        <img src="<?=BaseUrl::home();?>ui/images/icon_powerfull_lp.png" alt="Lead Generation">
                        <h2>Powerfull Landing Pages</h2>
                    </li>
                    <li>
                        <img src="<?=BaseUrl::home();?>ui/images/icon_management.png" alt="Lead Generation">
                        <h2>Easy management</h2>
                    </li>
                </ul>
            </div>
            <div class="col-sm-6">
                <div class="fetr_txt_box section_headline">
                    <h1>Take a <b>look</b> in our <b>features</b></h1>
                    <p>Our features are full of great importance. <br>Which will meet your needs and get some additional&nbsp;benefits.</p>
                    <a class="btn btn-primary prpl_btn" href="<?= Url::to(['site/signin']);?>">Get started</a>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="home_why_us">
    <div class="container">
        <div class="row justify-content-end">
            <div class="col-sm-5 section_headline">
                <h1><b>Reasons</b> why you should <b>choose us</b></h1>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">We are passionate about what we do.</li>
                    <li class="list-group-item">We listen to your feedback.</li>
                    <li class="list-group-item">We provide a high level of support.</li>
                    <li class="list-group-item">We focus on the quality of our services.</li>
                    <li class="list-group-item">Don't trust your business to a non-business centered host.</li>
                    <li class="list-group-item">We do not oversell our web hosting services.</li>
                </ul>
                <a class="btn btn-primary prpl_btn" href="<?= Url::to(['site/signin']);?>">Get started</a>
            </div>
        </div>
    </div>
</section>
<section id="price_tbl" class="section_padding">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 section_headline text-center">
                <h1><b>Pricing</b> - We keep it simple and <b>Flexible</b></h1>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-4">
                <div class="text-center single_price_tbl">
                    <h1>Personal</h1>
                    <h2><sup>$</sup>29</h2>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><b>4GB</b> Ram</li>
                        <li class="list-group-item">Dapibus ac facilisis in</li>
                        <li class="list-group-item"><b>Morbi</b> leo risus</li>
                        <li class="list-group-item">Porta ac consectetur ac</li>
                        <li class="list-group-item">Vestibulum at eros</li>
                    </ul>
                    <a class="btn btn-primary prpl_btn" href="<?= Url::to(['site/signup']);?>">Sign Up</a>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="text-center single_price_tbl price_blue_bg">
                    <h1>Business</h1>
                    <h2><sup>$</sup>29</h2>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><b>4GB</b> Ram</li>
                        <li class="list-group-item">Dapibus ac facilisis in</li>
                        <li class="list-group-item"><b>Morbi</b> leo risus</li>
                        <li class="list-group-item">Porta ac consectetur ac</li>
                        <li class="list-group-item">Vestibulum at eros</li>
                    </ul>
                    <a class="btn btn-primary prpl_btn" href="<?= Url::to(['site/signup']);?>">Sign Up</a>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="text-center single_price_tbl">
                    <h1>Corporate</h1>
                    <h2><sup>$</sup>29</h2>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><b>4GB</b> Ram</li>
                        <li class="list-group-item">Dapibus ac facilisis in</li>
                        <li class="list-group-item"><b>Morbi</b> leo risus</li>
                        <li class="list-group-item">Porta ac consectetur ac</li>
                        <li class="list-group-item">Vestibulum at eros</li>
                    </ul>
                    <a class="btn btn-primary prpl_btn" href="<?= Url::to(['site/signup']);?>">Sign Up</a>
                </div>
            </div>
        </div>

    </div>
</section>
<section id="home_contact_form" class="section_padding margin_btm_50">
    <div class="container">
        <div class="row form_box">
            <div class="col-lg-3 col-sm-4 left_items">
                <a href="mailto:"><img src="<?=BaseUrl::home();?>ui/images/contact_email.png" alt="email"></a>
                <h2>Please describe <br>your queries</h2>
                <p>
                    We need your email <br>
                    addres to reach <br>
                    you back
                </p>
            </div>
            <div class="col-lg-9 col-sm-8 right_items">
                <h1>Contact us</h1>
                <form>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Message</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <div class="form-group">
                                <label for="inputEmail4">Name</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="inputEmail4">Email</label>
                                <input type="email" class="form-control">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">SEND</button>
                </form>

            </div>
        </div>
    </div>
</section>
