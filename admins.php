<?php require_once 'navbar.php'; ?>



<!-- Insert Modal -->
<div class="modal fade" id="insertData" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="insertDataLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="insertDataLabel">Add New Admin to Database</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="crud.php" method="post">
                <div class="modal-body custom-navbar-background">

                    <!-- Create form inside Modal Body -->
                    <div class="form-group mb-3">
                        <label for=""> Username: </label>
                        <input type="text" class="form-control" name="username" placeholder="Enter Username" required>
                    </div>


                    <div class="form-group mb-3">
                        <label for=""> Email: </label>
                        <input type="text" class="form-control" name="email" placeholder="Enter Email" required>
                    </div>


                    <div class="form-group mb-3">
                        <label for=""> Password: </label>
                        <input type="text" class="form-control" name="password" placeholder="Enter Password" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for=""> Re-enter Password: </label>
                        <input type="text" class="form-control" name="confirm_password" placeholder="Re-enter Password" required>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="insert_new_admin" class="btn btn-primary">Insert</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Update Modal -->
<div class="modal fade" id="updateData" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="updateDataLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="updateDataLabel">Edit Admin</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="crud.php" method="post">
                <div class="modal-body custom-navbar-background">

                    <!-- Create form inside Modal Body -->

                    <div class="form-group mb-3">
                        <input type="hidden" class="form-control" id="admin_id" name="admin_id">
                    </div>

                    <div class="form-group mb-3">
                        <label for=""> Username: </label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Enter Username" required>
                    </div>


                    <div class="form-group mb-3">
                        <label for=""> Email: </label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="Enter Email" required>
                    </div>


                    <div class="form-group mb-3">
                        <label for=""> Password: </label>
                        <input type="text" class="form-control" id="password" name="password" placeholder="Enter Password" required>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="update" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Delete Modal -->
<div class="modal fade" id="deleteData" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteDataLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteDataLabel">Delete Admin</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="post">
            <input type="hidden" class="form-control" id="confirm_delete_id" name="admin_id">
            <div class="modal-body custom-navbar-background">
                <h4> Are you sure you want to delete? </h4>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" name="delete_data" class="btn btn-danger">Yes</button>
            </div>
            </form>
        </div>
    </div>
</div>




<!--MODAL CONTAINER-->
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-center">ADMIN CRUD</h4>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#insertData">
                        Add New Admin
                    </button>
                </div>
                <div class="card-body"> <!-- VIEW DATA IN CARD BODY -->
                    <table class="table table-primary table-striped table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#id</th>
                                <th scope="col">Username</th>
                                <th scope="col">Email</th>
                                <th scope="col">Password</th>
                                <th scope="col">CreatedAt</th>
                                <th scope="col">Update</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!--DISPLAY ADMIN TABLE-->
                            <?php
                            $fetch_all_admins = queryMysql("SELECT * FROM admins");
                            if ($fetch_all_admins->rowCount() > 0) {
                                while ($row = $fetch_all_admins->fetch()) {
                            ?>
                                    <tr>
                                        <td class="admin_id"><?php echo $row['admin_id']; ?></td>
                                        <td><?php echo $row['username']; ?></td>
                                        <td><?php echo $row['email']; ?></td>
                                        <td><?php echo $row['password']; ?></td>
                                        <td><?php echo $row['created_at']; ?></td>

                                        <td>
                                            <a href="" class="btn btn-success btn-sm update_data"> Update </a>
                                        </td>
                                        <td>
                                            <a href="" class="btn btn-danger btn-sm delete_data"> Delete </a>
                                        </td>
                                    </tr><!--  -->
                                <?php
                                }
                            } else {
                                ?>
                                <tr colspan="4"> No Records Found </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    /*edit */
    $(document).ready(function() {
        $('.update_data').click(function(e) {
            e.preventDefault();
            var admin_id = $(this).closest('tr').find('.admin_id').text(); //var is for input boxes
            //console.log(admin_id);

            $.ajax({
                method: "POST",
                url: "crud.php",
                data: {
                    'admin_click_update_btn': true,
                    'admin_id': admin_id
                },
                success: function(response) {
                    //console.log(response);
                    $.each(response, function(key, value) {

                        $('#admin_id').val(value['admin_id']);
                        $('#username').val(value['username']);
                        $('#email').val(value['email']);
                        $('#password').val(value['password']);

                    });

                    $('#updateData').modal('show');

                }
            });
        });
    });


    /*delete*/
    $(document).ready(function() {
        $('.delete_data').click(function(e) {
            e.preventDefault();
            var admin_id = $(this).closest('tr').find('.admin_id').text(); //var is for input boxes
            $('#confirm_delete_id').val(admin_id)
            $('#deleteData').modal('show');

            $.ajax({
                method: "POST",
                url: "crud.php",
                data: {
                    'click_delete_btn': true,
                    'admin_id': admin_id
                }

        });
        });
    });
</script>