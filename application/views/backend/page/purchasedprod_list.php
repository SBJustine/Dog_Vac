<main>
    <div class="container-fluid pt-4 px-4">
        <div class="bg-light rounded-top p-4">
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <!-- Search Bar -->
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <input type="text" class="form-control" id="searchProductInput" placeholder="Search...">
                            </div>
                        </div>
                        <table class="table text-start align-middle table-bordered table-hover mb-0" id="productTable">
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
                                            Product Name
                                            <span class="arrow">&#9650;</span>
                                        </div>
                                    </th>
                                    <th scope="col">
                                        <div class="d-flex justify-content-between align-items-center">
                                            Action 
                                            <span class="arrow"></span>
                                        </div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($purchasedprod_list as $key => $user): ?>
                                    <tr class="<?php echo $key % 2 === 0 ? 'bg-light' : 'bg-white'; ?>">
                                        <td><?php echo $user->productID; ?></td>
                                        <td><?php echo $user->productName; ?></td>
                                        <td>
                                            <a href="<?= base_url();?>index.php/purchase_form?productID=<?php echo $user->productID; ?>" class="btn btn-primary">Purchase</a>
                                            <a href="<?= base_url();?>index.php/purchase_table?productID=<?php echo $user->productID; ?>" class="btn btn-primary">Products Purchased</a>
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

    <script>
        function sortTable(columnIndex) {
            var table, rows, switching, i, x, y, shouldSwitch;
            table = document.getElementById("productTable"); // Get the table by ID
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
        document.getElementById("searchProductInput").addEventListener("input", function() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("searchProductInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("productTable"); // Get the table by ID
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
