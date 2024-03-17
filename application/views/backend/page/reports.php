<main>
    <div class="container-fluid pt-4 px-4">
        <div class="bg-light rounded-top p-4">
            <div class="row">
                <div class="bg-light rounded h-100 p-4">
                    
                    <div class="table-controls mb-3">
                        <style>
                            /* Custom CSS for the download and print buttons */
                            button#downloadButton, button#printButton {
                                background-color: maroon;
                                color: white;
                            }
                        </style>
                        <button class="btn btn-primary mr-2" id="downloadButton">Download</button>
                        <button class="btn btn-success" id="printButton">Print</button>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr>
                                    <th scope="col">Appointments</th>
                                    <th scope="col">Client</th>
                                    <th scope="col">Pet</th>
                                    <th scope="col">Admin</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($reports as $key => $user): ?>
                                    <tr class="<?php echo $key % 2 === 0 ? 'bg-light' : 'bg-white'; ?>">
                                        <td><?php echo $user->report_appointment; ?></td>
                                        <td><?php echo $user->report_client; ?></td>
                                        <td><?php echo $user->report_pet; ?></td>
                                        <td><?php echo $user->report_admin; ?></td>
                                        <td><?php echo $user->pet_gender; ?></td>
                                        <td><?php echo $user->pet_species; ?></td>
                                        <td><?php echo $user->pet_color; ?></td>
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
</main>
