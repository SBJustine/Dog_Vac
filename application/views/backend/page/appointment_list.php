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
                        <h6 class="mb-4">List of Appointments</h6>
                        <div class="table-responsive">
                            <!-- Search Bar -->
                            <div class="row mb-3">
                                <div class="col-md-3">
                                    <input type="text" class="form-control" id="searchAppointmentInput" placeholder="Search...">
                                </div>
                            </div>
                            <table class="table text-start align-middle table-bordered table-hover mb-0" id="appointmentList">
                                <thead>
                                    <tr>
                                        <th scope="col" onclick="sortTableAppointment(0)">
                                            <div class="d-flex justify-content-between align-items-center">#<span class="arrow">&#9650;</span></div>
                                        </th>
                                        <th scope="col" onclick="sortTableAppointment(1)">
                                            <div class="d-flex justify-content-between align-items-center">Name of Owner<span class="arrow">&#9650;</span></div>
                                        </th>
                                        <th scope="col">Name of Pet</th>
                                        <th scope="col">Type of Vaccine</th>
                                        <th scope="col">Date Added<span class="arrow"></span></th>
                                        <th scope="col">Contact Number</th>
                                        <th scope="col" colspan="2">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($appointmentUsers as $key => $user): ?>
                                        <tr class="<?php echo $key % 2 === 0 ? 'bg-light' : 'bg-white'; ?>">
                                            <td><?php echo $user->appointmentId; ?></td>
                                            <td><?php echo $user->appointmentName; ?></td>
                                            <td><?php echo $user->appointmentPetName; ?></td>
                                            <td><?php echo $user->vaccine; ?></td>
                                            <td><?php echo $user->appointmentDate; ?></td>
                                            <td><?php echo $user->appointmentContactNumber; ?></td>
                                            <td>
                                                <button class="btn btn-primary">Approve</button>
                                    </td>
                                    <td>
                                                <button class="btn btn-primary">Decline</button>
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

    <script>
        function sortTableAppointment(columnIndex) {
            var table, rows, switching, i, x, y, shouldSwitch;
            table = document.getElementById("appointmentList");
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
        document.getElementById("searchAppointmentInput").addEventListener("input", function() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("searchAppointmentInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("appointmentList");
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
