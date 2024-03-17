<main>
    <style>
        .btn-maroon {
            background-color: maroon;
            color: white;
        }
    </style>
    
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-6">                  
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Add Employee</h6>
                    <form action="<?= base_url() ?>index.php/add_employee" method="post" onsubmit="return validateEmployeeForm()">
                        <div class="form-floating mb-3">
                            <input type="text" name="employeeName" class="form-control" id="employeeName" placeholder="">
                            <label for="floatingInput">Fullname</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" name="employeePosition" id="employeePosition" aria-label="Floating label select example">
                                <option value="Veterinarian">Veterinarian</option>
                                <option value="Groomer">Groomer</option>
                            </select>
                            <label for="floatingInput">Position</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="employeeAddress" class="form-control" id="employeeAdress" placeholder="">
                            <label for="floatingInput">Address</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="employeeAge" class="form-control" id="employeeAge" placeholder="">
                            <label for="floatingInput">Age</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" name="employeeSex" id="employeeSex" aria-label="Floating label select example">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                            <label for="floatingInput">Sex</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="employeePhoneNum" class="form-control" id="employeePhoneNum" placeholder="">
                            <label for="floatingInput">Phone Number</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" name="employeeStatus" id="employeeStatus" aria-label="Floating label select example">
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                            <label for="floatingInput">Status</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="datetime-local" name="employeeAdded" class="form-control" id="employeeAdded" value="<?php echo date('Y-m-d\TH:i'); ?>" required>
                            <label for="floatingInput">Date Added</label>
                        </div>
                        <div class="modal-footer d-flex">
                            <input type="submit" class="btn btn-maroon custom-button" value="Create">
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-sm-12 col-xl-6">
                <div class="bg-light rounded h-100 p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Calendar Reminder</h6>
                        <a href="">Show All</a>
                    </div>
                    <div id="calender"></div>
                </div>
            </div>
        </div>
    </div>
</main>
<script>
        function validateEmployeeForm() {
            var fullnameInput = document.getElementById('employeeName');
            var fullnameValue = fullnameInput.value.trim();
            var isValidFullname = /^[A-Za-z\s]+$/.test(fullnameValue); // Regex pattern to allow only letters and spaces
            
            if (!isValidFullname) {
                alert('Please enter a valid fullname with only letters and spaces.');
                return false;
            }
            return true;
        }
    </script>