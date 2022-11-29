<?php 
/*Template Name: Contact Page Template*/ 
?>
<?php get_header() ?>
<section id="contact-0" class="wrapper-section secPadding contact-0 contact-lets-talk lets-talk contactDetails bgClrDarkLight">
    <div class="container-lg">
        <div class="row">
            <div class="col-lg-6 ">
                <div class="part-one">
                    <div class="sectionHeader">
                        <div class="secTagLine">Let’s talk</div>
                        <div class="ContactSecIntro secIntro">
                            <h1>Every successful venture <strong>starts with a consultation!</strong></h1>
                            <p>We are eager to listen to your digital vision and work together to make this a success. Just fill in this form and we’ll get back
                                to you within 24 business hours</p>
                            <hr>
                        </div>
                    </div>
                    <div class="getInTouch">
                        <div class="row isBgBorder pb-30 mb-30">
                            <div class="col-sm-6">
                                <div class="contact-page-address singleInfo d-flex gap-3 gap-xl-4 align-items-center mb-30">
                                    <div class="icon">
                                        <img class="lazy-load-image lazyload " src="<?php echo get_template_directory_uri(); ?>/images/location-icon.706bc3e6.svg" alt="lineShape" width="" height="" loading="lazy">
                                    </div>
                                    <div class="info">
                                        <h4 class="country text-white fw-bold fs-14">USA</h4>
                                        <div class="address textClrGray fs-14 fw-medium mb-0">
                                            <?php  
                                            $usa = carbon_get_theme_option('mos-contact-contact-address');  
                                            echo  $usa[0]["address"];
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="contact-page-address singleInfo d-flex gap-3 gap-xl-4 align-items-center mb-30">
                                    <div class="icon"><img class="lazy-load-image lazyload " src="<?php echo get_template_directory_uri(); ?>/images/location-icon.706bc3e6.svg" alt="lineShape" width="" height="" loading="lazy">
                                    </div>
                                    <div class="info">
                                        <h4 class="country text-white fw-bold fs-14">UK</h4>
                                        <div class="address textClrGray fs-14 fw-medium mb-0">
                                            <?php  
                                            $uk = carbon_get_theme_option('mos-contact-contact-address'); 
                                            echo  $uk[1]["address"];
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="contact-page-address singleInfo d-flex gap-3 gap-xl-4 align-items-center">
                                    <div class="icon"><img class="lazy-load-image lazyload " src="<?php echo get_template_directory_uri(); ?>/images/location-icon.706bc3e6.svg" alt="lineShape" width="" height="" loading="lazy"></div>
                                    <div class="info">
                                        <h4 class="country text-white fw-bold fs-14">Bangladesh</h4>
                                        <div class="address textClrGray fs-14 fw-medium mb-0">
                                            <?php  
                                            $bd = carbon_get_theme_option('mos-contact-contact-address'); 
                                            echo  $bd[2]["address"];
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row isBgBorder pb-30 mb-30">
                            <div class="col-6 col-sm-4">
                                <div class="singleInfo d-flex gap-3 gap-xl-4 align-items-center">
                                    <div class="icon">
                                        <img class="lazy-load-image lazyload " src="<?php echo get_template_directory_uri(); ?>/images/phone.78735261.svg" alt="lineShape" width="" height="" loading="lazy">
                                    </div>
                                    <div class="info">
                                        <h4 class="country text-white fw-bold fs-14">Phone</h4>
                                        <?php
                                        $a = carbon_get_theme_option('mos-contact-phone'); 
                                        ?>
                                        <a href="tel:<?php echo $a[0]["number"]; ?>" class="address textClrGray fs-14 fw-medium mb-0 text-decoration-none">
                                            <?php echo $a[0]["number"];?>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-sm-4">
                                <div class="singleInfo d-flex gap-3 gap-xl-4 align-items-center">
                                    <div class="icon">
                                        <img class="lazy-load-image lazyload " src="<?php echo get_template_directory_uri(); ?>/images/whatsapp.3c1b923b.svg" alt="lineShape" width="" height="" loading="lazy">
                                    </div>
                                    <div class="info">
                                        <h4 class="country text-white fw-bold fs-14">WhatsApp</h4>
                                        <?php   $wp = carbon_get_theme_option('mos-contact-whatsapp') ?>
                                        <a href="<?php  echo $wp; ?>" class="address textClrGray fs-14 fw-medium mb-0">(+775) 509-6984</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4 mt-3 mt-sm-0">
                                <div class="singleInfo d-flex gap-3 gap-xl-4 align-items-center">
                                    <div class="icon">
                                        <img class="lazy-load-image lazyload " src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAVCAYAAABG1c6oAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAAXNSR0IArs4c6
                                    QAAAARnQU1BAACxjwv8YQUAAAOmSURBVHgBlZVPaBxVHMe/7/dmM7NJdjObNHW1hU4tlbagbGoPeqjdHBRMq1Q8eJ
                                    KQgwdPRfAiiE1E9CKlevGYBEWoEexFDwVhix4CYrMiUejfof+SNqXZNN1Ndnd2X3/vzZ/tUgrtg8e8efP7feb7+/NmBB4abnHa
                                    dRynAEJR37cVlRsbtVKlNFHBEw4RL54Z++kYhJoUCq55IAWcLX2w+mw4+WxJSgtEoiIknW4122fLn4z4jwXmx+aOs
                                    57JGNS7fQDOcB9ISghBvCcZFl4FX/UaZM1I1Z6a/2hvF1hsffPUURL4Rd/ItIXMrkFIJ8WODJHUDdSwCMobYNW+Ihqd/3BnAt
                                    Vmx8yiRyLzPMNsyzgbgKBEkX6BnujaE54kOvfKd1e8GGgpUgXOGzK7tTIrdIoUaMcDO7LYk+9FhtVfuFPHH/6GtlEME2yjeLo9KUtHO
                                    GJCzo+dUvZQGv1ejkPTqmQS2udHPLz14mBX0pfWA4zP3VC1JjQwSQEnYKI0sXXGYhvfHur1THiCkly9/dKQgS3da2LqzE2zf3ifi4wtUW2yQApB
                                    goVqxSAxzqwZi3poNpVNHxdRnuJQM+mUUfT39RoWbmyYwpSXVzqFMaBwzTBeUrE4verSYCFfEhEkNAoNf12sYL3ewpF9A/jsjefw8rZexHbQdnG1
                                    TSrD/VQPPEuQzSVpJ8riUO43gfd/9PHBq8M4vDdr5jLn79v5Nfx5rRHZx9DQV1nkUquNNQ2J3yKSfiMuQAtf/L6Cd3+4ht/O30c+Y+HL14ewf5vziL1Jl2k/pP
                                    w4H0nYktsibGjdHliutvHV2VXMLVaN08EdTmTbDb260C5SeXKEz6fs5DFMuDi0qx/fv7ddjO3J4oVhGwe9PgPS4+Jqq1OUaDZqQLOuxi3TjIRZfliMwtDqRDa
                                    dUru32OLTUburD8u3Apy50kjyF8/KUqAfe8nX5sCJxQUGFuJ86HZ4diCF13b2I+tIU6RLlRb+ud3qNLOGcq6DhsDlvzY1pmIlZ1DQO0pa5ziSHBvpzhXLVaV+/r+
                                    mQxKdF5kzHH19QtjVf+uGwe1SphioP0MiCPazo0/8DYublnRCu2BhMXTbBNw9N/+rI9hUIUSpWXo4PxrK0kb5lM6aBteOccXjqopQ2fqKgr/QwGZVRerUN/6J3IzAY0
                                    ZxesljSYdYyVEpydWK6jXp1u6qwhrD2oGKTStKqCn/69xJU2A85fA+Xi3ywSrwUv8qfF6f9k/mkn/OAyusDVBu4I7RAAAAAElFTkSuQmCC" alt="lineShape" width="" height="" loading="lazy">
                                    </div>
                                    <div class="info">
                                        <h4 class="country text-white fw-bold fs-14">Skype</h4>
                                        <a href="skype:live:mosgetwebinc" class="address textClrGray fs-14 fw-medium mb-0">mosgetwebinc</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="singleInfo d-flex gap-3 gap-xl-4 align-items-center">
                                    <div class="icon">
                                        <img class="lazy-load-image lazyload " src="<?php echo get_template_directory_uri(); ?>/images/clock.af3f340c.svg" alt="lineShape" width="" height="" loading="lazy">
                                    </div>
                                    <div class="info">
                                        <h4 class="country text-white fw-bold fs-14">Open Hours</h4>
                                        <div class="address textClrGray fs-14 fw-medium mb-0 text-decoration-none">Saturday - Thursday: 10 am - 7 pm</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-mobile-margin-top col-lg-6">
                <div class="part-two">
                    <div class="contactWrapper bgClrSolitude isRadius12 h-100 form-validation undefined">
                        <div class="Toastify"></div>
                        <div class="contactHeader mb-30">
                            <div class="textClrThemeDark fs-24 fw-bold mb-10">Need a digital product or a custom solution? We’re all ears!</div>
                        </div>
                        <?php echo do_shortcode('[contact-form-7 id="2495" title="Contact form 1"]') ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php get_footer() ?>
