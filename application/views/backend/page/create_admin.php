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
                    <h6 class="mb-4">Create Admin</h6>
                    <form action="<?= base_url() ?>index.php/create_admin" method="post" onsubmit="return validateForm()">
                        <div class="form-floating mb-3">
                            <input type="text" name="fullname" class="form-control" id="fullname" placeholder="">
                            <label for="floatingInput">Fullname</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" name="email" class="form-control" id="email" placeholder="">
                            <label for="floatingInput">Email</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                            <label for="floatingPassword">Password</label>
                        </div> 
                        <div class="form-floating mb-3">
                            <input type="datetime-local" name="date_added" class="form-control" id="date_added" value="<?php echo date('Y-m-d\TH:i'); ?>" required>
                            <label for="floatingInput">Date & Time</label>
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
        function validateForm() {
            var fullnameInput = document.getElementById('fullname');
            var fullnameValue = fullnameInput.value.trim();
            var isValid = /^[A-Za-z\s]+$/.test(fullnameValue); // Regex pattern to allow only letters and spaces
            
            if (!isValid) {
                alert('Please enter a valid fullname with only letters and spaces.');
                return false;
            }
            return true;
        }
    </script>