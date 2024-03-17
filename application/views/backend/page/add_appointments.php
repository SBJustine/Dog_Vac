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
                    <h6 class="mb-4">Appointment Form</h6>
                    <form action="<?= base_url() ?>index.php/add_appointments" method="post" onsubmit="return validateAppointmentForm()">
                        <div class="form-floating mb-3">
                            <input type="text" name="appointmentName" class="form-control" id="appointmentName" placeholder="">
                            <label for="floatingInput">Name of Owner</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="appointmentPetName" class="form-control" id="appointmentPetName" placeholder="">
                            <label for="floatingInput">Name of Pet</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" name="vaccine" id="vaccine" aria-label="Floating label select example">
                                <option value="one">One</option>
                                <option value="two">Two</option>
                                <option value="three">Three</option>
                            </select>
                            <label for="vaccine">Vaccine</label>
                        </div>
                        
                        <div class="form-floating mb-3">
                            <input type="datetime-local" name="appointmentDateTime" class="form-control" id="appointmentDateTime" value="<?php echo date('Y-m-d\TH:i'); ?>" required>
                            <label for="floatingInput">Date & Time</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" name="appointmentContactNumber" class="form-control" id="appointmentContactNumber" placeholder="">
                            <label for="floatingInput">Contact Number</label>
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
        function validateAppointmentForm() {
            var ownerNameInput = document.getElementById('appointmentName');
            var petNameInput = document.getElementById('appointmentPetName');
            var ownerNameValue = ownerNameInput.value.trim();
            var petNameValue = petNameInput.value.trim();
            var isValidOwnerName = /^[A-Za-z\s]+$/.test(ownerNameValue); // Regex pattern to allow only letters and spaces
            var isValidPetName = /^[A-Za-z\s]+$/.test(petNameValue); // Regex pattern to allow only letters and spaces
            
            if (!isValidOwnerName) {
                alert('Please enter a valid name for the owner with only letters and spaces.');
                return false;
            }
            if (!isValidPetName) {
                alert('Please enter a valid name for the pet with only letters and spaces.');
                return false;
            }
            return true;
        }
    </script>