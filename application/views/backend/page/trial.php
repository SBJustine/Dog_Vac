
    <!-- Sign Up Start -->
    <div class="container-fluid">
        <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
            <div class="col-12 col-sm-10 col-md-10 col-lg-8 col-xl-7"><!-- Adjusted column width for wider form -->
                <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                <div class="card-body">

        <label style="color: red;"><?= $this->session->flashdata('msg_settings_error');?></label>
            <label style="color: green;"><?= $this->session->flashdata('msg_settings');?></label>
            <div class="table-responsive">
        <!-- Your registration form goes here -->
        <form action="<?= base_url() ?>index.php/add_client" method="post">

            <div class="form-group">
                <label class="control-label">Full Name</label>
                <input name="client_fullname" class="form-control"  id="client_fullname" placeholder="Full Name" type="text" required>
                <div class="invalid-feedback">
                    Please enter your full name.
                </div>
            </div>
            <div class="form-group">
                <label class="control-label">Address</label>
                <input name="client_address" class="form-control"  id="client_address" placeholder="Address" type="text" required>
                <div class="invalid-feedback">
                    Please enter your address.
                </div>
            </div>
            <div class="form-group">
                <label class="control-label">Sex</label>
                <select name="sex" id="sex" class="form-control" required>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
                <div class="invalid-feedback">
                    Please select your sex.
                </div>
            </div>
            <div class="form-group">
                <label class="control-label">Phone Number</label>
                <input type="tel" class="form-control" placeholder="Phone Number" id="phone_number"  name="phone_number" required>
                <div class="invalid-feedback">
                    Please enter your phone number.
                </div>
            </div>
            <div class="form-group">
                <label class="control-label">Email Address</label>
                <input type="client_email" class="form-control" id="client_email" placeholder="Email Address" name="client_email" required>
                <div class="invalid-feedback">
                    Please enter an email address.
                </div>
            </div>
            <div class="form-group">
                <label class="control-label">Password</label>
                <input name="password" class="form-control" id="password" placeholder="Password" type="password" required>
                <div class="invalid-feedback">
                    Please enter a password.
                </div>
            </div>
            <div class="form-group">
                <label class="control-label">Status</label>
                <select name="client_status" id="client_status" class="form-control" required>
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
                <div class="invalid-feedback">
                    Please select your status.
                </div>
            </div>
            <div class="form-group">
                <label class="control-label">Date Added</label>
                <input name="date_added" class="form-control" placeholder="Date Added" type="text" value="<?php echo date('Y-m-d'); ?>" required>
                <div class="invalid-feedback">
                    Please enter the date added.
                </div>
            </div>


           
            <!-- Add more registration fields as needed -->

            <div class="modal-footer d-flex">
                <style>
                    /* Custom CSS to change the button color to maroon */
                    .btn-maroon {
                        background-color: maroon;
                        color: white;
                    }
                </style>
               
                <input type="submit" class="btn btn-maroon custom-button" value="Create">
            </div>

        </form>
    </div>
</div>
                </div>
            </div>
        </div>
    </div>
    <!-- Sign Up End -->


                                            
                      