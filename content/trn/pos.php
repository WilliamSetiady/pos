<?php
$query = mysqli_query($config, "SELECT users.user_name, transaction.* FROM transaction 
                                                            LEFT JOIN users ON users.user_id = transaction.id_user
                                                            ORDER BY transaction.tr_id DESC");
$rows = mysqli_fetch_all($query, MYSQLI_ASSOC);
?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body ">
                <h5 class="card-title">Data Transaction</h5>
                <div class="mb-3 d-flex justify-content-between">
                    <a href="?page=/trn/add_pos" class="btn btn-primary">Add Transaction</a>

                </div>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="">
                            <tr>
                                <th>Number</th>
                                <th>Cashier</th>
                                <th>Transaction Number</th>
                                <th>Sub Total</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($rows as $key => $row) : ?>
                                <tr>
                                    <td><?= $key += 1 ?></td>
                                    <td><?= $row['user_name'] ?></td>
                                    <td><?= $row['tr_num'] ?></td>
                                    <td><?= $row['sub_total'] ?></td>
                                    <td class="d-flex justify-content-center">
                                        <a href="?page=/usr/add_user&add-user-role=<?= $row['user_id'] ?>"
                                            class="btn btn-info me-2 ms-2">Add User Role</a>
                                        <a href="?page=/usr/add_user&edit=<?= $row['user_id'] ?>"
                                            class="btn btn-primary me-2 ms-2">Edit</a>
                                        <a onclick="return confirm('Are you Sure want to delete this data??')"
                                            href="?page=/usr/add_user&delete=<?= $row['user_id'] ?>"
                                            class="btn btn-danger me-2 ms-2">Delete</a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>