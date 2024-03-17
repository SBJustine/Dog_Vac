<main>
    <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded-top p-4">
                    <div class="row">
                <div class="col-12">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">List of appointments</h6>
                            <div class="table-responsive">
                                <table class="table text-start align-middle table-bordered table-hover mb-0">
                                    <thead>
                                        <tr>
                                            
                                            <th scope="col">Name of Owner</th>
                                            <th scope="col">Name of Pet</th>
                                            <th scope="col">Type of Vaccine</th>
                                            <th scope="col">Date_addded</th>
                                            <th scope="col">Contact Number</th>
                                            <th scope="col">Action</th>
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
                                        <!-- <td><?php echo $user->action; ?></td> -->
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