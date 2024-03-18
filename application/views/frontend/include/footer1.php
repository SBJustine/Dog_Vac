<footer>
        <!-- Footer Start-->
        <div class="footer-area footer-padding">
            <div class="container">
                <div class="row d-flex justify-content-between">
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                       <div class="single-footer-caption mb-50">
                         <div class="single-footer-caption mb-30">
                              <!-- logo -->
                             <div class="footer-logo mb-25">
                                 <a href="index.html"><img src="<?= base_url();?>assets/img1/logo/vetlogo.png" alt=""></a>
                             </div>
                             <div class="footer-tittle">
                                 <div class="footer-pera">
                                     <p>We help manage your pets!</p>
                                </div>
                             </div>
                             <!-- social -->
                             <div class="footer-social">
                                 <!-- <a href="https://www.facebook.com/sai4ull"><i class="fab fa-facebook-square"></i></a> -->
                                 <!-- <a href="#"><i class="fab fa-twitter-square"></i></a>
                                 <a href="#"><i class="fab fa-linkedin"></i></a>
                                 <a href="#"><i class="fab fa-pinterest-square"></i></a> -->
                             </div>
                         </div>
                       </div>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-4 col-sm-5">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Company</h4>
                                <ul>
                                    <li><a  href="<?= base_url();?>index.php/home1">Home</a></li>
                                    <li><a  href="<?= base_url();?>index.php/about1">About Us</a></li>
                                    <li><a  href="<?= base_url();?>index.php/services1">Services</a></li>
                                    <li><a  href="<?= base_url();?>index.php/contact1">  Contact Us</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-7">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Services</h4>
                                <ul>
                                    <li><a href="<?= base_url();?>index.php/services1">Pet Vaccination</a></li>
                                    <li><a href="<?= base_url();?>index.php/services1">Pet Grooming</a></li>
                                    <li><a href="<?= base_url();?>index.php/services1">Pet Treatment</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Get in Touch</h4>
                                <ul>
                                 <li><a href="<?= base_url();?>index.php/contact1">09959401818 | 09602016523</a></li>
                                 <li><a href="https://www.facebook.com/OrigVetCare"> @origvetcare | FB Page</a></li>
                                 <li><a href="<?= base_url();?>index.php/contact1">1193 Bohol Circumferential Road,
                                    CPG North Avenue, Ubujan District,
                                    Tagbilaran City, Bohol
                                 </a></li>
                             </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- footer-bottom area -->
        <div class="footer-bottom-area">
            <div class="container">
                <div class="footer-border">
                     <div class="row d-flex align-items-center">
                         <div class="col-xl-12 ">
                             <div class="footer-copy-right text-center">
                                 <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Orig VetCare Clinic</i>  
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                             </div>
                         </div>
                     </div>
                </div>
            </div>
        </div>
        <!-- Footer End-->
    </footer>
    <!-- Scroll Up -->
    <div id="back-top" >
        <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
    </div>

    <!-- JS here -->
    
    <script src="<?= base_url();?>assets/js1/vendor/modernizr-3.5.0.min.js"></script>
    <!-- Jquery, Popper, Bootstrap -->
    <script src="<?= base_url();?>assets/js1/vendor/jquery-1.12.4.min.js"></script>
    <script src="<?= base_url();?>assets/js1/popper.min.js"></script>
    <script src="<?= base_url();?>assets/js1/bootstrap.min.js"></script>
    <!-- Jquery Mobile Menu -->
    <script src="<?= base_url();?>assets/js1/jquery.slicknav.min.js"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="<?= base_url();?>assets/js1/owl.carousel.min.js"></script>
    <script src="<?= base_url();?>assets/js1/slick.min.js"></script>
    <!-- One Page, Animated-HeadLin -->
    <script src="<?= base_url();?>assets/js1/wow.min.js"></script>
    <script src="<?= base_url();?>assets/js1/animated.headline.js"></script>
    <script src="<?= base_url();?>assets/js1/jquery.magnific-popup.js"></script>

    <!-- Nice-select, sticky -->
    <script src="<?= base_url();?>assets/js1/jquery.nice-select.min.js"></script>
    <script src="<?= base_url();?>assets/js1/jquery.sticky.js"></script>
    
    <!-- contact js -->
    <script src="<?= base_url();?>assets/js1/contact.js"></script>
    <script src="<?= base_url();?>assets/js1/jquery.form.js"></script>
    <script src="<?= base_url();?>assets/js1/jquery.validate.min.js"></script>
    <script src="<?= base_url();?>assets/js1/mail-script.js"></script>
    <script src="<?= base_url();?>assets/js1/jquery.ajaxchimp.min.js"></script>
    
    <!-- Jquery Plugins, main Jquery -->	
    <script src="<?= base_url();?>assets/js1/plugins.js"></script>
    <script src="<?= base_url();?>assets/js1/main.js"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    


    <script>
                
        window.onload = function() {
  document.getElementById('contactForm').addEventListener('submit',function(event) { event.preventDefault();
  
      console.log('heyyy');
  var templateParams = {
      from_name : document.getElementById('name').value,
      from_email : document.getElementById('email').value,
      subject : document.getElementById('subject').value,
      message : document.getElementById('message').value
  }
  emailjs.send('service_bub6ydg', 'template_frb9bk3', templateParams, '1CV5MTuAG2z3Xaa7Q')
  .then(function(response) {

    //sweet alert

    swal({
           title: "Message Sent Successfully!",
      icon: "success",
    });
    document.getElementById('name').value = "";
document.getElementById('email').value = "";
document.getElementById('subject').value = "";
document.getElementById('message').value = "";
     console.log('SUCCESS!', response.status, response.text);


  }, function(error) {

    swal({
           title: "Failed to Send! Please Try Again",
      icon: "error",
    });

     console.log('FAILED...', error);
  });

 

  });



}
    </script>
        
    </body>
</html>