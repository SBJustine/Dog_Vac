 <!-- Form Start -->
 <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-6">                  
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Add Product</h6>
                            <form action="<?= base_url() ?>index.php/add_product" method="post">

                            <div class="form-floating mb-3">
                                <input type="" name="productName" class="form-control" id="productName"
                                    placeholder="">
                                <label for="floatingInput">Product Name</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="" name="cost" class="form-control" id="cost"
                                    placeholder="">
                                <label for="floatingInput">Cost</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="" name="quantity" class="form-control" id="quantity"
                                    placeholder="">
                                <label for="floatingInput">Quantity</label>
                            </div>

                            <div class="form-floating mb-3">
                                <select class="form-select" name="category" id="category"
                                    aria-label="Floating label select example">
                                    <option value="Dog">Dog</option>
                                    <option value="Cat">Cat</option>
                                </select>
                                <label for="floatingInput">Category</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="datetime-local" name="dateAdded" class="form-control" id="dateAdded" value="<?php echo date('Y-m-d\TH:i'); ?>" required>
                                <label for="floatingInput">Date Added</label>
                            </div>

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
                    