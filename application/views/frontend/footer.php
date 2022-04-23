<footer class="footer area-bg">
                <div class="area-bg__inner">
                    <div class="footer__main">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="footer-section">
                                        <a class="footer__logo" href="">
                                            <img class="img-responsive" src="<?=base_url()?>assets/frontend/media/general/headersikopmil.jpg" alt="Logo" />
                                        </a>
                                        <!-- <div class="footer__info">Duis aute irure reprehend voluptate velit ese acium fugiat nula pariatur exceptus ipsum dolor sit amet consectetur adipisic elita sed eiusmod tempor.</div> -->
                                        <ul class="social-net list-inline">
                                            <li class="social-net__item"><a class="social-net__link text-primary_h" href="facebook.com"><i class="icon fa fa-facebook"></i></a>
                                            </li>
                                            <li class="social-net__item"><a class="social-net__link text-primary_h" href="twitter.com"><i class="icon fa fa-twitter"></i></a>
                                            </li>
                                            <li class="social-net__item"><a class="social-net__link text-primary_h" href="linkedin.com"><i class="icon fa fa-linkedin"></i></a>
                                            </li>
                                            <li class="social-net__item"><a class="social-net__link text-primary_h" href="instagram.com"><i class="icon fa fa-instagram"></i></a>
                                            </li>
                                            <li class="social-net__item"><a class="social-net__link text-primary_h" href="youtube.com"><i class="icon fa fa-youtube-play"></i></a>
                                            </li>
                                        </ul>
                                        <!-- end .social-list-->
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <section class="footer-section footer-section_list-columns">
                                        <h3 class="footer-section__title ui-title-inner">Top Merk</h3>
                                        <ul class="footer-list footer-list_columns list-unstyled">
                                            <?php
                                             $brand = getTopBrands();
                                             foreach ($brand as $key => $value) { ?>
                                                <li class="footer-list__item"><a class="footer-list__link" href=""><?=$value->nm_merk?></a>
                                            <?php } ?>
                                        </ul>
                                    </section>
                                </div>
                                <div class="col-md-2">
                                    <section class="footer-section footer-section_list-one">
                                        <h3 class="footer-section__title ui-title-inner">Top Tipe</h3>
                                        <ul class="footer-list list-unstyled">
                                            

                                            <?php
                                             $tipe = getTopTipe();
                                             foreach ($tipe as $key => $value) { ?>
                                                <li class="footer-list__item"><a class="footer-list__link" href=""><?=$value->nm_tipe?></a>
                                            </li>
                                            <?php } ?>


                                        </ul>
                                    </section>
                                </div>
                                <div class="col-md-3">
                                    <section class="footer-section">
                                        <h3 class="footer-section__title ui-title-inner">Address Information</h3>
                                        <div class="footer-contact footer-contact_lg">Call us<span class="text-primary"> (042) 789 35490</span>
                                        </div>
                                        <div class="footer-contact"><i class="icon icon-xs fa fa-envelope-o"></i>support@sikopmil.com</div>
                                        <!-- <div class="footer-contact"><i class="icon icon-lg fa fa-map-marker"></i>Fairview Ave, El Monte, CA, 91732</div>
                                        <div class="footer-contact"><i class="icon fa fa-clock-o"></i>Mon - Fri : 0900am to 0600pm</div> -->
                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="copyright">
                        <div class="container">
                            <div class="row">
                                <div class="col-xs-12">Copyrights 2017<a class="copyright__brand" href=""> MOTORLAND</a> All Rights Reserved<a class="copyright__link" href="">Privacy Policy</a><a class="copyright__link" href="">Terms & Conditions</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- .footer-->