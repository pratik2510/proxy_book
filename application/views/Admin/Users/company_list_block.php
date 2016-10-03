<div class="table-responsive popular_list">
    <table class="table text-nowrap">
        <tbody>
            <?php
            foreach ($companies as $company) {
                $name = $company['name'];
                $img_src = ($company['profile_image'] != '') ? $company['profile_image'] : 'no_photo.png';
                $on_error = "this.src='assets/images/no_photo.png'";
                ?>
                <tr>
                    <td>
                        <div class="list_logo">
                            <a href="admin/company_detail/<?php echo base64_encode($company['id']); ?>"><img src="assets/images/company_logos/<?php echo $img_src; ?>" class="img-circle img-xs" alt="<?php echo $name; ?>" onerror="<?php echo $on_error; ?>"></a>
                        </div>

                        <div class="list_desc">
                            <div class="">
                                <a href="admin/company_detail/<?php echo base64_encode($company['id']); ?>" class="text-default ">
                                    <h6 class="text-success-600 "><?php echo $name; ?></h6>
                                </a>
                            </div>
                            <div class="text-muted text-size-small">
                                <i class="icon icon-pin"></i>
                                <span class="company_address"><?php echo $company['emirate_name']; ?></span>
                                <!--<span class="company_address"><?php echo $company['address']; ?></span>-->
                            </div>
                        </div>
                    </td>
                    <?php if( isset($is_popular) && $is_popular != 1){ ?>
                    <td>
                        <span class="text-muted"><?php echo str_replace(',', ', ', $company['field_names']); ?></span>
                    </td>
                    <?php } ?>
                    <td>
                        <span class="text-muted"><?php echo $company['open_positions']; ?> open positions</span>
                    </td>
                </tr>

                <?php
            }
            ?>
        </tbody>
    </table>
</div>