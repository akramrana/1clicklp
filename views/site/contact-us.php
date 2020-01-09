<?php

use yii\helpers\Html;
use yii\helpers\BaseUrl;

$this->title = 'Contact Us';
?>
<section id="contact_hero">
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-sm-5 section_headline section_copy">
                    <h1>Get In Touch</h1>
                    <p>Leave your important feedback to us, one of our team members will get back to you soon.</p>
                </div>
                <div class="col-sm-1"></div>
                <div class="col-sm-6">
                    <img src="<?=BaseUrl::home();?>ui/images/world-map.png" alt="world map" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</section>
<section id="contact_page_form" class="section_padding margin_btm_50">
    <div class="container">
        <div class="row form_box">
            <div class="col-lg-3 col-sm-4 left_items">
                <a href="mailto:">
                    <img src="<?=BaseUrl::home();?>ui/images/contact_email.png" alt="email">
                </a>
                <h2>Please describe <br/>your queries</h2>
                <p>
                    We need your email <br/>
                    addres to reach <br/>
                    you back
                </p>
            </div>
            <div class="col-lg-9 col-sm-8 right_items">
                <h2>Send us a Message</h2>
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