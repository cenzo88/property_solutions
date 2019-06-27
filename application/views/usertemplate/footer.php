 <div class="footer-area">

            <div class=" footer">
                <div class="container">
                    <div class="row">

                        <div class="col-md-3 col-sm-6 wow fadeInRight animated">
                            <div class="single-footer">
                                <h4>About us </h4>
                                <div class="footer-title-line"></div>

                                <img src="<?= base_url('')?>assets/img/logo.png" alt="" class="wow pulse" data-wow-delay="1s">
                                <p>Your Digital Real Estate partner.</p>
                                <ul class="footer-adress">
                                    <li><i class="pe-7s-map-marker strong"> </i> Poblacion, Calape, Bohol, 6300</li>
                                    <li><i class="pe-7s-mail strong"> </i> propadmin@email.com</li>
                                    <li><i class="pe-7s-call strong"> </i> (038) 412 - 4978</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 wow fadeInRight animated">
                            <div class="single-footer">
                                <h4>Quick links </h4>
                                <div class="footer-title-line"></div>
                                <ul class="footer-menu">
                                    <li><a href="<?= base_url('')?>User/property">Properties</a>  </li> 
                                    <li><a href="<?= base_url('')?>User/submitproperty">Submit property </a></li> 
                                    <li><a href="<?= base_url('')?>User/contact">Contact us</a></li> 
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
         


        <script>
                            $(document).ready(function () {

                                $('#image-gallery').lightSlider({
                                    gallery: true,
                                    item: 1,
                                    thumbItem: 9,
                                    slideMargin: 0,
                                    speed: 500,
                                    auto: true,
                                    loop: true,
                                    onSliderLoad: function () {
                                        $('#image-gallery').removeClass('cS-hidden');
                                    }
                                });
                            });
        </script>
        
   </body>

</html>