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
                        <label>Surname :</label>
                        <input type="text" id="r_lname" name="<?php echo $title; ?>_r_lname" class="form-control" value="<?php echo $resume_detail[$lname]; ?>">
                        <input type="hidden" id="r_id" name="r_id" class="form-control" value="<?php echo base64_encode($resume_detail['id']); ?>">
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
                    <div class="col-sm-12 skill_block">
                        <p class="border-bottom-teal">Skills :</p>
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
                                        <label>Company Name :</label>
                                        <input type="text" class="form-control" name="r_exp[<?php echo $resume_experience['id'] ;?>][<?php echo $exp_company_name; ?>]" class="form-control" value="<?php echo $resume_experience[$exp_company_name]; ?>" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Job Title :</label>
                                        <input type="text" name="r_exp[<?php echo $resume_experience['id'] ;?>][<?php echo $exp_title; ?>]" class="form-control" value="<?php echo $resume_experience[$exp_title]; ?>" required>
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
                                        <label>School / University Name :</label>
                                        <input type="text" name="r_edu[<?php echo $resume_education['id']; ?>][<?php echo $edu_school_name; ?>]" class="form-control" value="<?php echo $resume_education[$edu_school_name]; ?>" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Degree :</label>
                                        <input type="text" name="r_edu[<?php echo $resume_education['id']; ?>][<?php echo $edu_degree; ?>]" class="form-control" value="<?php echo $resume_education[$edu_degree]; ?>" required>
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