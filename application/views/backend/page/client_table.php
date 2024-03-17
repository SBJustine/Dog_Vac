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
                            <table class="table text-start align-middle table-bordered table-hover mb-0" id="dtBasicExample">
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
                                        <tr class="<?php echo $key % 2 === 0 ? 'bg-light' : 'bg-white'; ?>">
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
