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
                        <h6 class="mb-4">REGISTERED CLIENT</h6>
                                    <!-- Search Bar -->
                            <div class="row mb-3">
                                <div class="col-md-3">
                                    <input type="text" class="form-control" id="searchClientInput" placeholder="Search...">
                                </div>
                            </div>
                        <div class="table-responsive">
                            <table class="table datanew" id="dtBasicExample">
                                <thead>
                                    <tr>
                                        <th scope="col" onclick="sortTable(0)">
                                        <div class="d-flex justify-content-between align-items-center">
                                            #
                                            <span class="arrow" data-column="0">&#9650;</span>
                                            <div>
                                        </th>
                                        <th scope="col" onclick="sortTable(1)">
                                        <div class="d-flex justify-content-between align-items-center">
                                            Fullname
                                            <span class="arrow" data-column="1">&#9650;</span>
                                            <div>
                                        </th>
                                        <th>
                                            Address
                                            <span class="arrow" data-column="2"></span>
                                        </th>
                                        <th>
                                            Phone Number
                                            <span class="arrow" data-column="3"></span>
                                        </th>
                                        <th>
                                            Sex
                                            <span class="arrow" data-column="4"></span>
                                        </th>
                                        <th>
                                            Email
                                            <span class="arrow" data-column="5"></span>
                                        </th>
                                        <th>
                                            Password
                                            <span class="arrow" data-column="6"></span>
                                        </th>
                                        <th>
                                            Status
                                            <span class="arrow" data-column="7"></span>
                                        </th>
                                        <th>
                                        <div class="d-flex justify-content-between align-items-center">
                                            Date Added
                                            <span class="arrow" data-column="8"></span>
                                            <div>
                                        </th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($clientUsers as $key => $user): ?>
                                        <tr class="<?php echo $key % 2 === 0 ? 'bg-light' : 'bg-white'; ?>" data-client-id="<?= $user->client_id; ?>">
                                            <td><?php echo $user->client_id; ?></td>
                                            <td><?php echo $user->client_fullname; ?></td>
                                            <td><?php echo $user->client_address; ?></td>
                                            <td><?php echo $user->phone_number; ?></td>
                                            <td><?php echo $user->sex; ?></td>
                                            <td><?php echo $user->client_email; ?></td>
                                            <td><?php echo $user->password; ?></td>
                                            <td><?php echo $user->client_status; ?></td>
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



    <div id="updateClientModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Client Information</h4>
            </div>
            <div class="modal-body">
                <!-- Form to update client information -->
                <form autocomplete="off" class="form" role="form" action="<?= base_url(); ?>index.php/update_client" method="post" id="clientUpdateForm">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="clientName">Name</label>
                                <input type="text" class="form-control" name="clientName" id="clientName">
                            </div>
                            <div class="form-group">
                                <label for="clientAddress">Address</label>
                                <input type="text" class="form-control" name="clientAddress" id="clientAddress">
                            </div>
                            <div class="form-group">
                                <label for="clientPhoneNumber">Phone Number</label>
                                <input type="text" class="form-control" name="clientPhoneNumber" id="clientPhoneNumber">
                            </div>
                            <div class="form-group">
                                <label for="clientSex">Sex</label>
                                <select class="form-control" name="clientSex" id="clientSex">
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="clientEmail">Email</label>
                                <input type="email" class="form-control" name="clientEmail" id="clientEmail">
                            </div>
                            <div class="form-group">
                                <label for="clientPassword">Password</label>
                                <input type="password" class="form-control" name="clientPassword" id="clientPassword">
                            </div>
                            <div class="form-group">
                                <label for="clientStatus">Status</label>
                                <select class="form-control" name="clientStatus" id="clientStatus">
                                    <option value="Active">Active</option>
                                    <option value="Inactive">Inactive</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="clientAdded">Date Added</label>
                                <input type="date" class="form-control" name="clientAdded" id="clientAdded">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="update_button">Update</button>
                <button type="button" class="btn btn-secondary" id="update_cancel" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<script>
    
    var client_id;
    $(document).ready(function() {
    // Define global variable to store client_id
    // Function to handle row click event
    $('#table.datanew tbody').on('click', 'tr', function() {
        client_id = $(this).data('client-id');
        // Show the updateClientModal
        $('#updateClientModal').modal('show');

        // Fetch client data using AJAX
        $.ajax({
            type: "POST",
            url: "Admin_Controller/view_client",
            data: { client_id: client_id },
            success: function(respoclient_idnse) {
                var clientData = JSON.parse(response);
                if (clientData && !$.isEmptyObject(clientData)) {
                    console.log("Client data:", clientData);
                    // Populate modal fields with client data
                    $('#clientName').val(clientData.client_fullname);
                    $('#clientAddress').val(clientData.client_address);
                    $('#clientPhoneNumber').val(clientData.phone_number);
                    $('#clientSex').val(clientData.sex);
                    $('#clientEmail').val(clientData.client_email);
                    $('#clientPassword').val(clientData.password);
                    $('#clientStatus').val(clientData.client_status);
                    $('#clientAdded').val(clientData.date_added);
                } else {
                    console.error('Empty or invalid client data received');
                }
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
            }
        });
    });

    // Function to handle update button click
    $('#update_button').click(function() {
        // Retrieve data from modal fields
        var clientName = $('#clientName').val();
        var clientAddress = $('#clientAddress').val();
        var clientPhoneNumber = $('#clientPhoneNumber').val();
        var clientSex = $('#clientSex').val();
        var clientEmail = $('#clientEmail').val();
        var clientPassword = $('#clientPassword').val();
        var clientStatus = $('#clientStatus').val();
        var clientAdded = $('#clientAdded').val();
        var updateclient_id = client_id;

        // Send updated data using AJAX
        $.ajax({
            type: "POST",
            url: "Admin_Controller/update_client",
            data: { 
                client_id: updateclient_id, // Pass clientID
                clientName: clientName,
                clientAddress: clientAddress,
                clientPhoneNumber: clientPhoneNumber,
                clientSex: clientSex,
                clientEmail: clientEmail,
                clientPassword: clientPassword,
                clientStatus: clientStatus,
                clientAdded: clientAdded
            },
            success: function(response) {
                console.log("Client updated successfully:", response);
                $('#updateClientModal').modal('hide'); // Hide the modal
                $('#updateSuccessModal').modal('show'); // Show success message modal
                location.reload(); // Reload the page
            },
            error: function(xhr, status, error) {
                console.error('Error updating client:', error);
                // Display error message
                $('#updateErrorModal').modal('show');
            }
        });
    });

    // Function to handle modal hide event
    $('#update_cancel').click(function() {
        $('#updateClientModal').modal('hide');
    });
});


</script>
    
    <script>
        function sortTable(columnIndex) {
            var table, rows, switching, i, x, y, shouldSwitch;
            table = document.getElementById("dtBasicExample");
            switching = true;
            var sortOrder = table.rows[0].getElementsByTagName("th")[columnIndex].querySelector(".arrow").getAttribute("data-sort");
            
            while (switching) {
                switching = false;
                rows = table.rows;
                for (i = 1; i < (rows.length - 1); i++) {
                    shouldSwitch = false;
                    x = rows[i].getElementsByTagName("td")[columnIndex];
                    y = rows[i + 1].getElementsByTagName("td")[columnIndex];
                    
                    if (columnIndex === 0) {
                        // For numeric sorting
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
                    } else {
                        // For string sorting
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
                arrow.innerHTML = "&#9650;";
            } else {
                arrow.innerHTML = "&#9660;";
            }
        }

        // Search Function
        document.getElementById("searchClientInput").addEventListener("input", function() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("searchClientInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("dtBasicExample");
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
</main>
