<main>
        <!--? Contact form Start -->
        <div class="contact-form-main pb-top">
            <div class="container">
                <div class="row justify-content-md-end">
                    <div class="col-xl-7 col-lg-7">
                        <div class="form-wrapper">
                            <!--Section Tittle  -->
                            <div class="form-tittle">
                                <div class="row ">
                                    <div class="col-xl-12">
                                        <div class="section-tittle section-tittle2 mb-70">
                                            <h2></h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--End Section Tittle  -->
                            <form action="<?= base_url()?>index.php/appointment_form" id="contact-form" action="#" method="post" >
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-box user-icon mb-30">
                                            <input type="text" name="appointmentName" placeholder="Name  of owner">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-box email-icon mb-30">
                                            <input type="text" name="appointmentPetName" placeholder="Name of pet">
                                        </div>
                                    </div>

                                    <!-- <div class="col-lg-6 col-md-6">
                                        <div class="form-box email-icon mb-30">
                                            <input type="text" name="address" placeholder="Services">
                                        </div>
                                    </div> -->

                                    <div class="col-lg-6 col-md-6">
                                    <!-- Service Selection Dropdown -->
                                    <select class="form-select" name="vaccine" id="vaccine" aria-label="Floating label select example">
                                        <option value="" disabled selected>Select a service</option>
                                        <option value="one">Vaccination</option>
                                        <option value="two">Grooming</option>
                                        <option value="three">Treatment</option>
                                    </select>
                                </div>


                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-box subject-icon mb-30">
                                            <input type="text" name="appointmentContactNumber" placeholder="Contact Number">
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-box email-icon mb-30"></div>
                                        <input type="date" name="appointmentDate" value="" class="form-control">
                                   </div>
                                   
                                   <div class="col-lg-12">
                                        <div class="submit-info" style="margin-top:50px">
                                            <button class="btn submit-btn2" type="submit" style="background-color: maroon; color: white;">Submit Now</button>
                                        </div>
                                    </div>

                                </div>
                                <!-- shape-dog -->
                                <div class="shape-dog">
                                    <img src="assets/img/gallery/shape1.png" alt="">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- contact left Img-->
            <div class="from-left d-none d-lg-block">
                <img src="<?= base_url();?>assets/img1/gallery/contact_form.png" alt=""> 
            </div>
        </div>

    
    <!-- Scroll Up -->
    <div id="back-top" >
        <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
    </div>
    </main>



    <!-- Modal for Appointment Success Message -->
    <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <!-- <div class="modal-header">
                    <h5 class="modal-title" id="successModalLabel">Appointment Submitted Successfully!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div> -->
                <div class="modal-body">
                    Appointment Submitted Successfully!
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#contact-form').submit(function(event) {
            // Prevent the default form submission
            event.preventDefault();

            // Perform AJAX submission (assuming you're using AJAX to submit the form)
            $.ajax({
                type: "POST",
                url: $(this).attr('action'),
                data: $(this).serialize(), // Serialize the form data
                success: function(response) {
                    // If the form submission is successful, show the success modal
                    $('#successModal').modal('show');
                },
                error: function(xhr, status, error) {
                    // Handle errors if any
                    console.error('Error:', error);
                }
            });
        });
    });
</script>


<style>
    /* Modal Styles */
    .modal-content {
        background-color: #ffffff;
        border-radius: 8px;
        max-width: 400px; /* Adjust the max-width as needed */
        margin: auto;
    }

    .modal-header {
        border-bottom: none;
        padding-bottom: 0;
    }

    .modal-title {
        font-size: 20px;
        font-weight: bold;
        color: #333333;
    }

    .modal-body {
        padding: 20px;
        font-size: 16px;
        color: #666666;
    }

    .modal-footer {
        border-top: none;
        padding-top: 0;
    }

    /* Close button styles */
    .close {
        font-size: 18px;
        color: #333333;
        opacity: 0.5;
    }

    .close:hover {
        opacity: 1;
    }

    /* Button styles */
    .btn-secondary {
        background-color: #cccccc;
        color: #ffffff;
        padding: 8px 16px;
        font-size: 14px;
    }

    .btn-secondary:hover {
        background-color: #999999;
    }
</style>
