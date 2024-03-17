<main>
    <style>
        .arrow {
            float: right;
        }
    </style>
    
    <div class="container-fluid pt-4 px-4">
        <div class="bg-light rounded-top p-4">

            <div class="row">
                <div class="col-12">
                    <div class="bg-light rounded h-100 p-4">
                        <h6 class="mb-4">REGISTERED EMPLOYEE</h6>
                                    <!-- Search Bar -->
                            <div class="row mb-3">
                                <div class="col-md-3">
                                    <input type="text" class="form-control" id="searchEmployeeInput" placeholder="Search...">
                                </div>
                            </div>
                        <div class="table-responsive">
                            <table class="table datanew" id="employeeTable">
                                <thead>
                                    <tr>
                                        <th scope="col" onclick="sortTableEmployee(0)">
                                            <div class="d-flex justify-content-between align-items-center">
                                                #<span class="arrow">&#9650;</span>
                                            </div>
                                        </th>
                                        <th scope="col" onclick="sortTableEmployee(1)">
                                            <div class="d-flex justify-content-between align-items-center">
                                                Fullname<span class="arrow">&#9650;</span>
                                            </div>
                                        </th>
                                        <th>
                                            <div class="d-flex justify-content-between align-items-center">
                                                Position<span class="arrow"></span>
                                            </div>
                                        </th>
                                        <th>
                                            <div class="d-flex justify-content-between align-items-center">
                                                Address<span class="arrow"></span>
                                            </div>
                                        </th>
                                        <th scope="col" onclick="sortTableEmployee(4)">
                                            <div class="d-flex justify-content-between align-items-center">
                                                Age<span class="arrow">&#9650;</span>
                                            </div>
                                        </th>
                                        <th>
                                            <div class="d-flex justify-content-between align-items-center">
                                                Sex<span class="arrow"></span>
                                            </div>
                                        </th>
                                        <th>
                                            <div class="d-flex justify-content-between align-items-center">
                                                Phone Number<span class="arrow"></span>
                                            </div>
                                        </th>
                                        <th>
                                            <div class="d-flex justify-content-between align-items-center">
                                                Status<span class="arrow"></span>
                                            </div>
                                        </th>
                                        <th>
                                            <div class="d-flex justify-content-between align-items-center">
                                                Date Added<span class="arrow"></span>
                                            </div>
                                        </th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($employeeUsers as $key => $user): ?>
                                        <tr class="<?php echo $key % 2 === 0 ? 'bg-light' : 'bg-white'; ?>" data-employee-id="<?= $user->employeeID; ?>">
                                            <td><?php echo $user->employeeID; ?></td>
                                            <td><?php echo $user->employeeName; ?></td>
                                            <td><?php echo $user->employeePosition; ?></td>
                                            <td><?php echo $user->employeeAddress; ?></td>
                                            <td><?php echo $user->employeeAge; ?></td>
                                            <td><?php echo $user->employeeSex; ?></td>
                                            <td><?php echo $user->employeePhoneNum; ?></td>
                                            <td><?php echo $user->employeeStatus; ?></td>
                                            <td><?php echo $user->employeeAdded; ?></td>
                                            <td>
                                                <button class="btn btn-primary">Update</button>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    function sortTableEmployee(columnIndex) {
        var table, rows, switching, i, x, y, shouldSwitch;
        table = document.getElementById("employeeTable");
        switching = true;
        var sortOrder = table.rows[0].getElementsByTagName("th")[columnIndex].querySelector(".arrow").getAttribute("data-sort");
        
        while (switching) {
            switching = false;
            rows = table.rows;
            for (i = 1; i < (rows.length - 1); i++) {
                shouldSwitch = false;
                x = rows[i].getElementsByTagName("td")[columnIndex];
                y = rows[i + 1].getElementsByTagName("td")[columnIndex];
                
                if (columnIndex === 0) { // For the "#" column
                    if (sortOrder === "asc") {
                        if (parseInt(x.innerHTML) > parseInt(y.innerHTML)) {
                            shouldSwitch = true;
                            break;
                        }
                    } else {
                        if (parseInt(x.innerHTML) < parseInt(y.innerHTML)) {
                            shouldSwitch = true;
                            break;
                        }
                    }
                } else { // For other columns
                    if (sortOrder === "asc") {
                        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                            shouldSwitch = true;
                            break;
                        }
                    } else {
                        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                            shouldSwitch = true;
                            break;
                        }
                    }
                }
            }
            if (shouldSwitch) {
                rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                switching = true;
            }
        }
        // Toggle sorting order
        var newSortOrder = sortOrder === "asc" ? "desc" : "asc";
        table.rows[0].getElementsByTagName("th")[columnIndex].querySelector(".arrow").setAttribute("data-sort", newSortOrder);
        
        // Update arrow icon
        var arrow = table.rows[0].getElementsByTagName("th")[columnIndex].querySelector(".arrow");
        if (newSortOrder === "asc") {
            arrow.innerHTML = "&#9650;"; // Up arrow
        } else {
            arrow.innerHTML = "&#9660;"; // Down arrow
        }
    }

    // Search Function
    document.getElementById("searchEmployeeInput").addEventListener("input", function() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("searchEmployeeInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("employeeTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1]; // Change index to the column you want to search
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    });
</script>




<div id="updateEmployeeModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Employee Information</h4>
            </div>
            <div class="modal-body">
                <!-- Form to update employee information -->
                <form autocomplete="off" class="form" role="form" action="<?= base_url(); ?>index.php/update_employee" method="post" id="employeeUpdateForm">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="employeeName">Name</label>
                                <input type="text" class="form-control" name="employeeName" id="employeeName">
                            </div>
                            <div class="form-group">
                                <label for="employeePosition">Position</label>
                                <input type="text" class="form-control" name="employeePosition" id="employeePosition">
                            </div>
                            <div class="form-group">
                                <label for="employeeAddress">Address</label>
                                <input type="text" class="form-control" name="employeeAddress" id="employeeAddress">
                            </div>
                            <div class="form-group">
                                <label for="employeeAge">Age</label>
                                <input type="number" class="form-control" name="employeeAge" id="employeeAge">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="employeeSex">Sex</label>
                                <select class="form-control" name="employeeSex" id="employeeSex">
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="employeePhoneNum">Phone Number</label>
                                <input type="text" class="form-control" name="employeePhoneNum" id="employeePhoneNum">
                            </div>
                            <div class="form-group">
                                <label for="employeeStatus">Status</label>
                                <select class="form-control" name="employeeStatus" id="employeeStatus">
                                    <option value="Active">Active</option>
                                    <option value="Inactive">Inactive</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="employeeAdded">Date Added</label>
                                <input type="date" class="form-control" name="employeeAdded" id="employeeAdded">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="updateEmployeeButton">Update</button>
                <button type="button" class="btn btn-secondary" id="updateEmployeeCancel" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<script>
    var employeeID; // Define a global variable to store employeeID

    $(document).ready(function() {
    var employeeID;

    $('table.datanew tbody').on('click', 'tr', function() {
        employeeID = $(this).data('employee-id');
        $('#updateEmployeeModal').modal('show');

        $.ajax({
            type: "POST",
            url: "Admin_Controller/view_employee",
            data: { employeeID: employeeID },
            success: function(response) {
                console.log("Response from server:", response);

                // Attempt to parse response as JSON
                var employeeData;
                try {
                    employeeData = JSON.parse(response);
                    console.log("Parsed employee data:", employeeData);
                } catch (error) {
                    console.error('Error parsing response as JSON:', error);
                    return;
                }

                // Check if employeeData is not empty and has required fields
                if (employeeData && employeeData.employeeName && employeeData.employeePosition) {
                    console.log("Populating modal fields...");
                    // Populate modal fields with employee data
                    $('#employeeName').val(employeeData.employeeName);
                    $('#employeePosition').val(employeeData.employeePosition);
                    $('#employeeAddress').val(employeeData.employeeAddress);
                    $('#employeeAge').val(employeeData.employeeAge);
                    $('#employeeSex').val(employeeData.employeeSex);
                    $('#employeePhoneNum').val(employeeData.employeePhoneNum);
                    $('#employeeStatus').val(employeeData.employeeStatus);
                    $('#employeeAdded').val(employeeData.employeeAdded);
                } else {
                    console.error('Invalid or incomplete employee data received');
                }
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
            }
        });
    });

        $('#updateEmployeeButton').click(function() {
            var employeeName = $('#employeeName').val();
            var employeePosition = $('#employeePosition').val();
            var employeeAddress = $('#employeeAddress').val();
            var employeeAge = $('#employeeAge').val();
            var employeeSex = $('#employeeSex').val();
            var employeePhoneNum = $('#employeePhoneNum').val();
            var employeeStatus = $('#employeeStatus').val();
            var employeeAdded = $('#employeeAdded').val();
            var updateemployeeID = employeeID;

            // Update employee data using AJAX
            $.ajax({
                type: "POST",
                url: "Admin_Controller/update_employee",
                data: { 
                    employeeID: updateemployeeID, // Pass employeeID
                    employeeName: employeeName,
                    employeePosition: employeePosition,
                    employeeAddress: employeeAddress,
                    employeeAge: employeeAge,
                    employeeSex: employeeSex,
                    employeePhoneNum: employeePhoneNum,
                    employeeStatus: employeeStatus,
                    employeeAdded: employeeAdded
                },

                success: function(response) {
                console.log("Employee updated successfully:", response);
                $('#updateEmployeeModal').modal('hide');
                $('#updateSuccessModal').modal('show');
                location.reload();
            },
                error: function(xhr, status, error) {
                    console.error('Error updating employee:', error);
                    // Display error message
                    $('#updateErrorModal').modal('show');
                }
            });
        });

        $('#updateEmployeeCancel').click(function() {
            $('#updateEmployeeModal').modal('hide');
        });
    });
</script>
