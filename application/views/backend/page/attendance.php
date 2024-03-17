<main>
    <div class="container-fluid pt-4 px-4">
        <div class="bg-light rounded-top p-4">
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <!-- Button List of Attendance and Search Bar -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="searchAttendanceInput" placeholder="Search...">
                            </div>
                            <div class="col-md-6">
                                <a href="<?= base_url(); ?>index.php/attendance_table" class="btn btn-primary">List of Attendance</a>
                            </div>

                        </div>

                        <table class="table text-start align-middle table-bordered table-hover mb-0" id="attendance">

                            <thead>
                                <tr>
                                    <th scope="col" onclick="sortTable(0)">
                                        <div class="d-flex justify-content-between align-items-center">
                                            #
                                            <span class="arrow">&#9650;</span>
                                        </div>
                                    </th>
                                    <th scope="col" onclick="sortTable(1)">
                                        <div class="d-flex justify-content-between align-items-center">
                                            Employee
                                            <span class="arrow">&#9650;</span>
                                        </div>
                                    </th>
                                    <th>
                                        <div class="d-flex justify-content-between align-items-center">
                                            Action
                                            <span class="arrow"></span>
                                        </div>
                                    </th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($attendance)) : ?>
                                    <?php foreach ($attendance as $key => $user) : ?>
                                        <tr class="<?php echo $key % 2 === 0 ? 'bg-light' : 'bg-white'; ?>">
                                            <td><?php echo $user->employeeID; ?></td>
                                            <td><?php echo $user->employeeName; ?></td>
                                            <!-- Inside the loop -->
                                            <td>
                                                <a href="<?= base_url(); ?>index.php/attendance_check?employeeID=<?php echo $user->employeeID; ?>&status=present" class="btn btn-primary">Present</a>
                                                <a href="<?= base_url(); ?>index.php/attendance_check?employeeID=<?php echo $user->employeeID; ?>&status=absent" class="btn btn-primary">Absent</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <tr>
                                        <td colspan="3">No pending attendance to check. See <a href="<?= base_url(); ?>index.php/attendance_table">List of Attendance</a></td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function sortTable(columnIndex) {
            var table, rows, switching, i, x, y, shouldSwitch;
            table = document.getElementById("attendance"); // Corrected to get table by ID
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
        document.getElementById("searchAttendanceInput").addEventListener("input", function() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("searchAttendanceInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("attendance"); // Corrected to get table by ID
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