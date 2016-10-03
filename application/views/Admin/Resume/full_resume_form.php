<?php
$title = ($is_english) ? 'English' : 'Arabic';
$fname = ($is_english) ? 'fname' : 'arabic_fname';
$mname = ($is_english) ? 'mname' : 'arabic_mname';
$lname = ($is_english) ? 'lname' : 'arabic_lname';
$skill_names = ($is_english) ? 'skill_names' : 'arabic_skill_names';
$column_name = ($is_english) ? 'english_name' : 'arabic_name';
$exp_company_name = ($is_english) ? 'company_name' : 'arabic_company_name';
$exp_title = ($is_english) ? 'title' : 'arabic_title';
$edu_school_name = ($is_english) ? 'school_name' : 'arabic_school_name';
$edu_degree = ($is_english) ? 'degree' : 'arabic_degree';
$experience = ($is_english) ? 'english_experience' : 'arabic_experience';
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
                    <!--<a class="control-arrow" data-toggle="collapse" data-target="#<?php echo $title; ?>_basic_info">-->
                        <i class="icon-circle-down2"></i>
                    </a>
                </legend>
                <div class="collapse in basic_info" id="<?php echo $title; ?>_basic_info">
                    <div class="form-group">
                        <label>First Name :</label>
                        <input type="text" name="<?php echo $title; ?>_r_fname" class="form-control" value="<?php echo $resume_detail[$fname]; ?>">
                    </div>

                    <div class="form-group">
                        <label>Middle Name :</label>
                        <input type="text" id="r_mname" name="<?php echo $title; ?>_r_mname" class="form-control"  value="<?php echo $resume_detail[$mname]; ?>">
                    </div>

                    <div class="form-group">
                        <label>Surname</label>
                        <input type="text" id="r_lname" name="<?php echo $title; ?>_r_lname" class="form-control" value="<?php echo $resume_detail[$lname]; ?>">
                    </div>

                    <div class="form-group">
                        <label for="p_dob">Sex</label>
                        <div id="div_r_sex" class="input_wrapper">
                            <label class="radio-inline"><input type="radio" class="styled sex_radio" name="<?php echo $title; ?>_r_sex" id="<?php echo $title; ?>_sex_male" value="0" <?php echo ($resume_detail['sex'] == 0) ? 'checked' : ''; ?>>Male</label>
                            <label class="radio-inline"><input type="radio" class="styled sex_radio" name="<?php echo $title; ?>_r_sex" id="<?php echo $title; ?>_sex_female" value="1" <?php echo ($resume_detail['sex'] == 1) ? 'checked' : ''; ?>>Female</label>
                        </div>
                    </div>
                </div>
            </fieldset>
            <fieldset>
                <legend class="text-semibold bg-teal">
                    <i class="icon-file-text2 position-left"></i>
                    Contact Information
                    <a class="control-arrow" data-toggle="collapse" data-target=".contact_info">
                    <!--<a class="control-arrow" data-toggle="collapse" data-target="#<?php echo $title; ?>_contact_info">-->
                        <i class="icon-circle-down2"></i>
                    </a>
                </legend>
                <div class="collapse in contact_info" id="<?php echo $title; ?>_contact_info">
                    <div class="form-group">
                        <label for="r_emirate">Emirate</label>
                        <div id="div_r_emirate" class="input_wrapper">
                            <input type="hidden" id="r_id" name="r_id" class="form-control" value="<?php echo base64_encode($resume_detail['id']); ?>">
                            <select class="form-control select-icons" id="<?php echo $title; ?>_r_emirate" name="r_emirate" title="Select Emirate">
                                <?php
                                foreach ($emirates as $emirate) {
                                    $selected = ($emirate['id'] == $resume_detail['emirate']) ? 'selected' : '';
                                    ?>
                                    <option value="<?php echo $emirate['id']; ?>" <?php echo $selected; ?> ><?php echo $emirate[$column_name]; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" id="r_phone" name="r_phone" class="form-control" value="<?php echo $resume_detail['phone_no']; ?>">
                    </div>

                    <div class="form-group">
                        <label>E-mail</label>
                        <input type="email" id="r_email" name="r_email" class="form-control"  value="<?php echo $resume_detail['email']; ?>">
                    </div>

                    <div class="form-group">
                        <label>Personal website</label>
                        <input type="text" id="r_website" name="r_website" class="form-control" value="<?php echo $resume_detail['website']; ?>">
                    </div>
                </div>
            </fieldset>
            <fieldset>
                <legend class="text-semibold bg-teal">
                    <i class="icon-file-text2 position-left"></i>
                    Skills
                    <a class="control-arrow" data-toggle="collapse" data-target=".skills">
                    <!--<a class="control-arrow" data-toggle="collapse" data-target="#<?php echo $title; ?>_skills">-->
                        <i class="icon-circle-down2"></i>
                    </a>
                </legend>
                <div class="collapse in skills" id="<?php echo $title; ?>_skills">
                    <div class="col-sm-12 row skill_block">
                        <p class="border-bottom-teal">Skills</p>
                    <?php 
                        foreach($users_resume_skills as $skill){
                    ?>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div id="div_r_skill" class="input_wrapper">
                                    <input type="text" id="<?php echo $title; ?>_r_skill_<?php echo $skill['id'] ?>" name="r_skill[<?php echo $skill['id'] ?>][<?php echo $column_name; ?>]" class="form-control" value="<?php echo $skill[$column_name]; ?>" required>
                                </div>
                            </div>
                        </div>
                    <?php
                        }
                    ?>
                    </div>
                    <div class="form-group">
                        <label for="p_email">Field</label>
                        <div id="div_r_field" class="input_wrapper">
                            <select class="form-control select-icons" id="<?php echo $title; ?>_r_field" name="r_field" title="Select Job Field(s)">
                                <?php
                                foreach ($fields as $field) {
                                    $field_selected = ($resume_detail['field'] == $field['id']) ? 'selected' : '';
                                    ?>
                                    <option value="<?php echo $field['id']; ?>" <?php echo $field_selected; ?> ><?php echo $field[$column_name]; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="p_email">Years of experience</label>
                        <div id="div_r_year_exp" class="input_wrapper">
                            <select class="form-control select-icons" id="<?php echo $title; ?>_r_year_exp" name="r_year_exp" title="Select Total Years of experience">
                                <?php
                                foreach ($exp_years as $exp_year) {
                                    $exp_year_selected = ($resume_detail['exp_years'] == $exp_year['id']) ? 'selected' : '';
                                    ?>
                                    <option value="<?php echo $exp_year['id']; ?>" <?php echo $exp_year_selected; ?> ><?php echo $exp_year[$experience]; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="r_military">UAE military service</label>
                        <div id="div_r_military" class="input_wrapper">
                            <label class="radio-inline"><input type="radio" class="styled military_radio" name="<?php echo $title; ?>_r_military" id="<?php echo $title; ?>_military_done" value="0" <?php echo ($resume_detail['military_service'] == 0) ? 'checked' : ''; ?> >Done</label>
                            <label class="radio-inline"><input type="radio" class="styled military_radio" name="<?php echo $title; ?>_r_military" id="<?php echo $title; ?>_military_awaiting" value="1" <?php echo ($resume_detail['military_service'] == 1) ? 'checked' : ''; ?>>Awaiting</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="r_need">Are you with a special need ?</label>
                        <div id="div_r_need" class="input_wrapper">
                            <label class="radio-inline"><input type="radio" class="styled need_radio" name="<?php echo $title; ?>_r_need" id="<?php echo $title; ?>_need_yes" value="0" <?php echo ($resume_detail['special_need'] == 0) ? 'checked' : ''; ?>>Yes</label>
                            <label class="radio-inline"><input type="radio" class="styled need_radio" name="<?php echo $title; ?>_r_need" id="<?php echo $title; ?>_need_no" value="1" <?php echo ($resume_detail['special_need'] == 1) ? 'checked' : ''; ?>>No</label>
                        </div>
                    </div>
                </div>
            </fieldset>
            <?php 
                if(count($resume_experiences) > 0){
            ?>
                <fieldset>
                    <legend class="text-semibold bg-teal">
                        <i class="icon-file-text2 position-left"></i>
                        Experience
                        <a class="control-arrow" data-toggle="collapse" data-target=".experiences">
<!--                        <a class="control-arrow" data-toggle="collapse" data-target="#<?php echo $title; ?>_experiences">-->
                            <i class="icon-circle-down2"></i>
                        </a>
                    </legend>
                    <div class="collapse in experiences" id="<?php echo $title; ?>_experiences">
                        <div class="div_experience_blocks div_blocks">
                        <?php
                            foreach ($resume_experiences as $key => $resume_experience) {
                                $from_date = ($resume_experience['from_date'] != '') ? date('d M Y', strtotime($resume_experience['from_date'])) : '';
                                $to_date = ($resume_experience['to_date'] != '') ? date('d M Y', strtotime($resume_experience['to_date'])) : '';
                        ?>
                            <div class="col-xs-12 div_add_block" id="exep_block_<?php echo $key; ?>">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Company Name</label>
                                        <input type="text" class="form-control" name="r_exp[<?php echo $resume_experience['id'] ;?>][<?php echo $exp_company_name; ?>]" class="form-control" value="<?php echo $resume_experience[$exp_company_name]; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Date From</label>
                                        <input type="text" name="r_exp[<?php echo $resume_experience['id'] ;?>][date_from]" class="form-control exp_from_date" value="<?php echo $from_date; ?>" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Job Title</label>
                                        <input type="text" name="r_exp[<?php echo $resume_experience['id'] ;?>][<?php echo $exp_title; ?>]" class="form-control" value="<?php echo $resume_experience[$exp_title]; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Date To</label>
                                        <input type="text" name="r_exp[<?php echo $resume_experience['id'] ;?>][date_to]" class="form-control exp_to_date" value="<?php echo $to_date; ?>" required>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        </div>
                    </div>
                </fieldset>
            <?php
                }
            ?>
            <?php 
                if(count($resume_educations) > 0 ){
            ?>
                <fieldset>
                    <legend class="text-semibold bg-teal">
                        <i class="icon-file-text2 position-left"></i>
                        Education
                        <a class="control-arrow" data-toggle="collapse" data-target=".educations">
                        <!--<a class="control-arrow" data-toggle="collapse" data-target="#<?php echo $title; ?>_educations">-->
                            <i class="icon-circle-down2"></i>
                        </a>
                    </legend>
                    <div class="collapse in educations" id="<?php echo $title; ?>_educations">
                        <div class="div_education_blocks div_blocks">
                        <?php
                            foreach ($resume_educations as $key => $resume_education) {
                                $from_date = ($resume_education['from_date'] != '') ? date('d M Y', strtotime($resume_education['from_date'])) : '';
                                $to_date = ($resume_education['to_date'] != '') ? date('d M Y', strtotime($resume_education['to_date'])) : '';
                        ?>
                            <div class="col-xs-12 div_add_block" id="edu_block_<?php echo $key; ?>">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>School / University Name</label>
                                        <input type="text" name="r_edu[<?php echo $resume_education['id']; ?>][<?php echo $edu_school_name; ?>]" class="form-control" value="<?php echo $resume_education[$edu_school_name]; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Date From</label>
                                        <input type="text" name="r_edu[<?php echo $resume_education['id']; ?>][date_from]" class="form-control edu_from_date" value="<?php echo $from_date; ?>" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Degree</label>
                                        <input type="text" name="r_edu[<?php echo $resume_education['id']; ?>][<?php echo $edu_degree; ?>]" class="form-control" value="<?php echo $resume_education[$edu_degree]; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Date To</label>
                                        <input type="text" name="r_edu[<?php echo $resume_education['id']; ?>][date_to]" class="form-control edu_to_date" value="<?php echo $to_date; ?>" required>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        </div>
                    </div>
                </fieldset>
            <?php } ?>
        </div>
    </div>
</div>