 <!-- Form Start -->
 <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-6">                  
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Add Pet</h6>
                            <form action="<?= base_url() ?>index.php/add_pet" method="post">
                            
                            <div class="form-floating mb-3">
                                <input type="" name="pet_name" class="form-control" id="pet_name"
                                    placeholder="">
                                <label for="floatingInput">Name of Pet</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="" name="pet_breed" class="form-control" id="pet_breed"
                                    placeholder="">
                                <label for="floatingInput">Breed</label>
                            </div>
                            <!-- <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="floatingPassword"
                                    placeholder="Password">
                                <label for="floatingPassword">Password</label>
                            </div> -->
                            <div class="form-floating mb-3">
                                <select class="form-select" name="pet_species" id="pet_species"
                                    aria-label="Floating label select example">
                                    <option value="Dog">Dog</option>
                                    <option value="Cat">Cat</option>                                  
                                </select>
                                <label for="vaccine">Species</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="" name="pet_age" class="form-control" id="pet_age"
                                    placeholder="">
                                <label for="floatingInput">Age</label>
                            </div>

                            <div class="form-floating mb-3">
                                <select class="form-select" name="pet_gender" id="pet_gender"
                                    aria-label="Floating label select example">
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>                               
                                </select>
                                <label for="vaccine">Gender</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="" name="pet_color" class="form-control" id="pet_color"
                                    placeholder="">
                                <label for="floatingInput">Color</label>
                            </div>

                            <div class="modal-footer d-flex">
                                <style>
                                    /* Custom CSS to change the button color to maroon */
                                    .btn-maroon {
                                        background-color: maroon;
                                        color: white;
                                    }
                                </style>
                             <input type="hidden" name="client_id" class="form-control" id=""
                                    placeholder="" value="<?= $client_id ?>">
                                <input type="submit" class="btn btn-maroon custom-button" value="ADD">
                            </div>
                            </form>
                        </div>
                        
                    </div>
                    
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-light rounded h-100 p-4">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0">Calender Reminder</h6>
                                <a href="">Show All</a>
                            </div>
                            <div id="calender"></div>
                        </div>
                    </div>
                    </div>
                    </div>
                    
                    