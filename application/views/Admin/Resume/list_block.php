<div class="table-responsive popular_list">
    <table class="table text-nowrap">
        <tbody>
            <?php
            foreach ($candidates as $candidate) {
                $name = $candidate['fname'] . ' ' . $candidate['mname'] . ' ' . $candidate['lname'];
                $img_src = ($candidate['photo'] != '') ? $candidate['photo'] : 'no_photo.png';
                $on_error = "this.src='assets/images/no_photo.png'";
                ?>
                <tr>
                    <td>
                        <div class="list_logo">
                            <a href="admin/resume_detail/<?php echo base64_encode($candidate['id']); ?>"><img src="assets/images/resume_images/<?php echo $img_src; ?>" class="img-circle img-xs" alt="<?php echo $name; ?>" onerror="<?php echo $on_error; ?>"></a>
                        </div>

                        <div class="list_desc">
                            <div class="">
                                <a href="admin/resume_detail/<?php echo base64_encode($candidate['id']); ?>" class="text-default">
                                    <h6 class="text-success-600 "><?php echo $name; ?></h6>
                                </a>
                            </div>
                            <div class="text-muted text-size-small">
                                <i class="icon icon-pin"></i>
                                <span><?php echo $candidate['emirate_name']; ?></span>
                            </div>
                        </div>
                    </td>
                    <td>
                        <h6 class="text-success-600 "><?php echo $candidate['field_name']; ?></h6>
                    </td>
                    <td>
                        <span class="candidates-list-item-profile-count"><?php echo $candidate['profile_complete']; ?>% completed</span>
                        <span class="candidates-list-item-profile-bar"><span style="width: <?php echo $candidate['profile_complete']; ?>%"></span></span>
                    </td>
                    <td class="action_td">
                        <a class="btn btn-xs bg-brown" href="admin/translate_resume/<?php echo base64_encode($candidate['id']); ?>"><i class="icon-sphere"></i> Translate</a>
                    </td>
                </tr>

                <?php
                    
            }
            ?>
        </tbody>
    </table>
    
</div>