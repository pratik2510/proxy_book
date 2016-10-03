<div class="table-responsive popular_list">
    <table class="table table-bordered table-hover datatable-basic text-nowrap">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Profile Complete</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($users as $key => $user) {
                $name = $user['name'] . ' ' . $user['surname'];
                $img_src = ($user['profile_image'] != '') ? $user['profile_image'] : 'no_photo.png';
                $img = ($user['is_social_login'] == 0) ? 'assets/images/user_images/' . $img_src : $user['profile_image'];
                $on_error = "this.src='assets/images/no_photo.png'";
                ?>
                <tr>
                    <td><?php echo $key + 1; ?></td>
                    <td>
                        <div class="list_logo">
                            <a><img src="<?php echo $img; ?>" class="img-circle img-xs" alt="<?php echo $name; ?>" onerror="<?php echo $on_error; ?>"></a>
                        </div>

                        <div class="list_desc">
                            <div class="">
                                <a class="text-default">
                                    <h6 class="text-success-600 "><?php echo $name; ?></h6>
                                </a>
                            </div>
                            <div class="text-muted text-size-small">
                                <?php if($user['emirate_name'] != ''){ ?>
                                <i class="icon icon-pin"></i>
                                <span><?php echo $user['emirate_name']; ?></span>
                                <?php } ?>
                            </div>
                        </div>
                    </td>
                    <td>
                        <h6 class="text-success-600 "><?php echo $user['email']; ?></h6>
                    </td>
                    <td>
                        <span class="candidates-list-item-profile-count"><?php echo $user['profile_complete']; ?>% completed</span>
                        <span class="candidates-list-item-profile-bar"><span style="width: <?php echo $user['profile_complete']; ?>%"></span></span>
                    </td>
                    <td class="action_td">
                        <a class="btn btn-xs bg-brown" href="admin/translate_user_account/<?php echo base64_encode($user['id']); ?>"><i class="icon-sphere"></i> Translate</a>
                    </td>
                </tr>

                <?php
                    
            }
            ?>
        </tbody>
    </table>
    
</div>