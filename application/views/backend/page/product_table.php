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
                        <h6 class="mb-4">List of Products</h6>
                        <div class="table-responsive">
                            <!-- Search Bar -->
                            <div class="row mb-3">
                                <div class="col-md-3">
                                    <input type="text" class="form-control" id="searchProductInput" placeholder="Search...">
                                </div>
                            </div>
                            <table class="table datanew" id="productTable">
                                <thead>
                                    <tr>
                                        <th scope="col" onclick="sortTable('productTable', 0)">
                                            #
                                            <span class="arrow" data-column="0">&#9650;</span>
                                        </th>
                                        <th scope="col" onclick="sortTable('productTable', 1)">
                                            Product Name
                                            <span class="arrow" data-column="1">&#9650;</span>
                                        </th>
                                        <th scope="col" onclick="sortTable('productTable', 2)">
                                            Cost
                                            <span class="arrow" data-column="2">&#9650;</span>
                                        </th>
                                        <th scope="col" onclick="sortTable('productTable', 3)">
                                            Quantity
                                            <span class="arrow" data-column="3">&#9650;</span>
                                        </th>
                                        <th>
                                            Category
                                            <span class="arrow" data-column="4"></span>
                                        </th>
                                        <th scope="col" onclick="sortTable('productTable', 5)">
                                            Date Added
                                            <span class="arrow" data-column="5">&#9650;</span>
                                        </th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($productUsers as $key => $user): ?>
                                        <tr class="<?php echo $key % 2 === 0 ? 'bg-light' : 'bg-white'; ?>" data-product-id="<?= $user->productID; ?>">
                                            <td><?php echo $user->productID; ?></td>
                                            <td><?php echo $user->productName; ?></td>
                                            <td><?php echo $user->cost; ?></td>
                                            <td><?php echo $user->quantity; ?></td>
                                            <td><?php echo $user->category; ?></td>
                                            <td><?php echo $user->dateAdded; ?></td>
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


        <!-- Update Product Modal -->
        <div id="updateProductModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Product Information</h4>
                </div>
                <div class="modal-body">	
                    <!-- Form to update pet information -->
                    <form autocomplete="off" class="form" role="form" id="updateProductForm">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="productName">Name</label>
                                    <input type="text" class="form-control" name="productName" id="productName" value="<?= $property->productName ?? '' ?>">
                                </div>
                                <div class="form-group">
                                    <label for="cost">Cost</label>
                                    <input type="text" class="form-control" name="cost" id="cost" value="<?= $property->cost ?? '' ?>">
                                </div>
                                <div class="form-group">
                                    <label for="quantity">Quantity</label>
                                    <input type="text" class="form-control" name="quantity" id="quantity" value="<?= $property->quantity ?? '' ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="category">Category</label>
                                    <select class="form-control" name="category" id="category" value="<?= $property->category ?? '' ?>">
                                        <option value="Dog">Dog</option>
                                        <option value="Cat">Cat</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="dateAdded">Date Added</label>
                                    <input type="date" class="form-control" name="dateAdded" id="dateAdded" value="<?= $property->dateAdded ?? '' ?>">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" title="Update" class="btn btn-primary" id="update_button">Update</button>
                    <button type="button" title="Cancel" class="btn btn-secondary" data-dismiss="modal" id="update_cancel">Cancel</button>
                </div>
            </div>
        </div>
    </div>



    <script>
    $(document).ready(function () {
        var productID;

        $('table.datanew tbody').on('click', 'tr', function () {
            productID = $(this).data('product-id');
            $('#updateProductModal').modal('show');

            $.ajax({
                type: "POST",
                url: "Admin_Controller/view_product",
                data: { productID: productID },
                success: function (response) {
                    var productData = JSON.parse(response);
                    if (productData && !$.isEmptyObject(productData)) {
                        console.log("Product data:", productData);
                        $('#productName').val(productData.productName);
                        $('#cost').val(productData.cost);
                        $('#quantity').val(productData.quantity);
                        $('#category').val(productData.category);
                        $('#dateAdded').val(productData.dateAdded);
                    } else {
                        console.error('Empty product data received');
                    }
                },
                error: function (xhr, status, error) {
                    console.error('Error:', error);
                }
            });
        });

        $('#update_button').click(function () {
            var productName = $('#productName').val();
            var cost = $('#cost').val();
            var quantity = $('#quantity').val();
            var category = $('#category').val();
            var dateAdded = $('#dateAdded').val();

            $.ajax({
                type: "POST",
                url: "Admin_Controller/update_product",
                data: {
                    productID: productID,
                    productName: productName,
                    cost: cost,
                    quantity: quantity,
                    category: category,
                    dateAdded: dateAdded
                },
                success: function (response) {
                    console.log("Product updated successfully:", response);
                    $('#updateProductModal').modal('hide');
                    location.reload(); // Reload the page
                },
                error: function (xhr, status, error) {
                    console.error('Error updating product:', error);
                    // Optionally, handle errors
                }
            });
        });

        $('#update_cancel').click(function () {
            $('#updateProductModal').modal('hide');
        });
    });
</script>


    
    
    <script>
        function sortTable(tableId, columnIndex) {
            var table, rows, switching, i, x, y, shouldSwitch;
            table = document.getElementById(tableId);
            switching = true;
            var sortOrder = table.rows[0].getElementsByTagName("th")[columnIndex].querySelector(".arrow").getAttribute("data-sort");
            
            while (switching) {
                switching = false;
                rows = table.rows;
                for (i = 1; i < (rows.length - 1); i++) {
                    shouldSwitch = false;
                    x = rows[i].getElementsByTagName("td")[columnIndex];
                    y = rows[i + 1].getElementsByTagName("td")[columnIndex];
                    
                    if (columnIndex === 0 || columnIndex === 2 || columnIndex === 3) {
                        // For numeric sorting
                        if (sortOrder === "asc") {
                            if (parseFloat(x.innerHTML) > parseFloat(y.innerHTML)) {
                                shouldSwitch = true;
                                break;
                            }
                        } else {
                            if (parseFloat(x.innerHTML) < parseFloat(y.innerHTML)) {
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
        document.getElementById("searchProductInput").addEventListener("input", function() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("searchProductInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("productTable");
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

    <script>
        $(document).ready(function () {
            $('#productTable').DataTable();
        });
    </script>
