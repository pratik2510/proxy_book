<div class="table-responsive popular_list">
    <table class="table text-nowrap">
        <tbody>
            <?php
            foreach ($positions as $position) {
                $img_src = ($position['profile_image'] != '') ? $position['profile_image'] : 'no_photo.png';
                $on_error = "this.src='assets/images/no_photo.png'";
                ?>
                <tr>
                    <td>
                        <div class="list_desc">
                            <div class="">
                                <h6 class="text-success-600 ">
                                    <a href="#" class="text-success-600"><?php echo $position['english_name']; ?></a>
                                    <span class="badge"><?php echo $position['english_status_name']; ?></span>
                                </h6>
                            </div>
                            <div class="text-muted text-size-small">
                                <div class="list_logo">
                                    <img src="assets/images/company_logos/<?php echo $img_src; ?>" class="img-circle img-xs" alt="<?php echo $position['name']; ?>" onerror="<?php echo $on_error; ?>">
                                </div>
                                <span><?php echo $position['english_emirate_name'] . ', ' . $position['name']; ?></span>
                            </div>
                        </div>


                    </td>
                    <td>
                        <div class="list_desc">
                            <div class="">
                                <h6 class="text-success-600 ">
                                    <a href="#" class="text-success-600"><?php echo $position['arabic_name']; ?></a>
                                    <span class="badge"><?php echo $position['arabic_status_name']; ?></span>
                                </h6>
                            </div>
                            <div class="text-muted text-size-small">
                                <div class="list_logo">
                                    <img src="assets/images/company_logos/<?php echo $img_src; ?>" class="img-circle img-xs" alt="<?php echo $position['name']; ?>" onerror="<?php echo $on_error; ?>">
                                </div>
                                <span><?php echo $position['arabic_emirate_name'] . ', ' . $position['name']; ?></span>
                            </div>
                        </div>


                    </td>
                    <td>
                        <span class="text-muted"><?php echo date('d M Y', strtotime($position['joining_date'])); ?></span>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>