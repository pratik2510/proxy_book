<?php
$title = ($is_english) ? 'English' : 'Arabic';
$name = ($is_english) ? 'name' : 'arabic_name';
$surname = ($is_english) ? 'surname' : 'arabic_surname';
?>
<div class="col-sm-6 translate_resume">
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title"><?php echo $title; ?></h5>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li><a data-action="collapse"></a></li>
                </ul>
            </div>
        </div>
        <div class="panel-body">
            <fieldset>
                <legend class="text-semibold bg-teal">
                    <i class="icon-file-text2 position-left"></i>
                    Basic Information
                    <a class="control-arrow" data-toggle="collapse" data-target=".basic_info">                  
                        <i class="icon-circle-down2"></i>
                    </a>
                </legend>
                <div class="collapse in basic_info" id="<?php echo $title; ?>_basic_info">
                    <div class="form-group">
                        <label>First Name :</label>
                        <input type="text" name="<?php echo $title; ?>_r_fname" class="form-control" value="<?php echo $user_detail[$name]; ?>">
                    </div>

                    <div class="form-group">
                        <label>Surname :</label>
                        <input type="text" id="r_lname" name="<?php echo $title; ?>_r_lname" class="form-control" value="<?php echo $user_detail[$surname]; ?>">
                        <input type="hidden" id="r_id" name="r_id" class="form-control" value="<?php echo base64_encode($user_detail['id']); ?>">
                    </div>
                </div>
            </fieldset>
        </div>
    </div>
</div>