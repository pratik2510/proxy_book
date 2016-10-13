<div class="row">
    <div class="col-md-6">
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">Book List</h5>
                <div class="heading-elements">
                    <ul class="icons-list">
                        <li><a data-action="collapse"></a></li>
                    </ul>
                </div>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover datatable-basic">
                        <thead>
                            <tr class="bg-teal">
                                <th>#</th>
                                <th>Cover Page</th>
                                <th>Book Name</th>
                                <th>Author Name</th>
                                <th>Publication</th>
                                <th>Subject(s)</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($records as $key => $record) {
                                ?>
                                <tr>
                                    <td><?php echo $key + 1; ?></td>
                                    <td><img src="assets/images/book_images/<?php echo $record['cover_image']; ?>" alt="<?php echo $record['book_name']; ?>"></td>
                                    <td><?php echo $record['book_name']; ?></td>
                                    <td><?php echo $record['author_name']; ?></td>
                                    <td><?php echo $record['publication_name']; ?></td>
                                    <td><?php echo $record['subject_names']; ?></td>
                                    <td><?php echo 'Rs. ' . $record['sell_price']; ?></td>
                                    <td>
                                        <ul class="icons-list">
                                            <li class="text-teal-600">
                                                <a id="edit_<?php echo base64_encode($record['id']); ?>" class="edit"><i class="icon-pencil7"></i></a>
                                            </li>
                                            <li class="text-danger-600">
                                                <a id="delete_<?php echo base64_encode($record['id']); ?>" class="delete"><i class="icon-trash"></i></a>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
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