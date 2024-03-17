<main>
    
    <div class="container-fluid pt-4 px-4">
        <div class="bg-light rounded-top p-4">
            <div class="row">
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="bg-light rounded h-100 p-4">
                        <h6 class="mb-4">REGISTERED ADMIN</h6>
                        <div class="col-md-3"> <!-- Adjusted column size to one-fourth -->
                    <!-- Search Bar -->
                    <div class="mb-3">
                        <input type="text" class="form-control" id="searchInput" placeholder="Search...">
                    </div>
                </div>
                        <div class="table-responsive">
                            <table class="table datanew" id="adminTable">
                                <thead>
                                    <tr>
                                        <th scope="col" onclick="sortTable(0)">
                                            <div class="d-flex justify-content-between align-items-center">
                                                # 
                                                <span class="arrow">&#9650;</span>
                                            </div>
                                        </th>
                                        <th scope="col" onclick="sortTable(1)" data-sort="asc">
                                            <div class="d-flex justify-content-between align-items-center">
                                                Fullname
                                                <span class="arrow">&#9650;</span>
                                            </div>
                                        </th>
                                        <th>
                                            <div class="d-flex justify-content-between align-items-center">
                                                Email
                                                <span class="arrow"></span>
                                            </div>
                                        </th>
                                        <th>
                                            <div class="d-flex justify-content-between align-items-center">
                                                Password
                                                <span class="arrow"></span>
                                            </div>
                                        </th>
                                        <th>
                                            <div class="d-flex justify-content-between align-items-center">
                                                Date_Added
                                                <span class="arrow"></span>
                                            </div>
                                        </th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($adminUsers as $key => $user): ?>
                                    <tr class="<?php echo $key % 2 === 0 ? 'bg-light' : 'bg-white'; ?>"   data-admin-id="<?= $user->admin_id; ?>">
                                        <td><?php echo $user->admin_id; ?></td>
                                        <td><?php echo $user->fullname; ?></td>
                                        <td><?php echo $user->email; ?></td>
                                        <td><?php echo $user->password; ?></td>
                                        <td><?php echo $user->date_added; ?></td>
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
    function sortTable(columnIndex) {
        var table, rows, switching, i, x, y, shouldSwitch;
        table = document.getElementById("adminTable");
        switching = true;
        var sortOrder = table.rows[0].getElementsByTagName("th")[columnIndex].getAttribute("data-sort");
        
        while (switching) {
            switching = false;
            rows = table.rows;
            for (i = 1; i < (rows.length - 1); i++) {
                shouldSwitch = false;
                x = rows[i].getElementsByTagName("td")[columnIndex];
                y = rows[i + 1].getElementsByTagName("td")[columnIndex];
                
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
            if (shouldSwitch) {
                rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                switching = true;
            }
        }
        // Toggle sorting order
        var newSortOrder = sortOrder === "asc" ? "desc" : "asc";
        table.rows[0].getElementsByTagName("th")[columnIndex].setAttribute("data-sort", newSortOrder);
        
        // Update arrow icon
        var arrow = table.rows[0].getElementsByTagName("th")[columnIndex].querySelector(".arrow");
        if (newSortOrder === "asc") {
            arrow.innerHTML = "&#9650;"; // Up arrow
        } else {
            arrow.innerHTML = "&#9660;"; // Down arrow
        }
    }

    // Search Function
    document.getElementById("searchInput").addEventListener("input", function() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("searchInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("adminTable");
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

<div id="updateadminModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Admin Information</h4>
            </div>
                <div class="modal-body">	
                    <!-- form info -->
                    <form autocomplete="off" class="form" role="form" action="<?= base_url(); ?>index.php/update_admin" method="post" id="admin">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="fullname">Fullname</label>
                                    <input type="text" class="form-control" name="fullname" id="fullname" value="<?= $property->fullname ?? '' ?>">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control" name="email" id="email" value="<?= $property->email ?? '' ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                    <label for="date_added">Date Added</label>
                                    <input type="date" class="form-control" name="date_added" id="date_added" value="<?= $property->date_added ?? '' ?>">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="text" class="form-control" name="password" id="password" value="<?= $property->password ?? '' ?>">
                                </div>
                                
                            </div>
                            
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" title="Update" class="btn btn-primary" id="update_button">Update</button>
                    <button type="button" title="Cancel" class="btn btn-secondary" id="update_cancel">Cancel</button>
        
                </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<script>
    var adminID;

    $(document).ready(function() {
        $('table.datanew tbody').on('click', 'tr', function() {
            adminID = $(this).data('admin-id');
            $('#updateadminModal').modal('show');

        $.ajax({
            type: "POST",
            url: "Admin_Controller/view_admin",
            data: { adminID: adminID },
            success: function(response) {
                var adminData = JSON.parse(response);
                if (adminData && !$.isEmptyObject(adminData)) {
                    console.log("Admin data:", adminData);
                    $('#fullname').val(adminData.fullname);
                    $('#email').val(adminData.email);
                    $('#password').val(adminData.password);
                    // Format the date as needed before assigning it to the input field
                    var formattedDate = formatDate(adminData.date_added); // Assuming you have a function to format the date
                    $('#date_added').val(formattedDate);
                } else {
                    console.error('Empty admin data received');
                }
            },

            error: function(xhr, status, error) {
                console.error('Error:', error);
            }
        });
    });

    $('#update_button').click(function() {
        var fullname = $('#fullname').val();
        var email = $('#email').val();
        var password = $('#password').val();
        var date_added = $('#date_added').val();
        var updateadminID = adminID;

        $.ajax({
            type: "POST",
            url: "Admin_Controller/update_admin",
            data: {
                fullname: fullname,
                email: email,
                password: password,
                date_added: date_added,
                adminID: updateadminID,
            },
            success: function(response) {
                console.log("Admin updated successfully:", response);
                $('#updateadminModal').modal('hide');
                $('#updateSuccessModal').modal('show');
                location.reload();
            },
            error: function(xhr, status, error) {
                console.error('Error updating admin:', error);
                $('#updateErrorModal').modal('show');
            }
        });
    });

    $('#update_cancel').click(function() {
        $('#updateadminModal').modal('hide');
    });
});

</script>