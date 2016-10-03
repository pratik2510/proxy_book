<link href="assets/css/resume_detail.css" rel="stylesheet" type="text/css">
<?php if(isset($is_pdf)){ ?>
<style>
.badge{
    padding-top: 5px;
    padding-right: 5px;
    padding-left: 5px;
    padding-bottom: 5px;
    width: 170px;
    height: 18px;
    line-height: 18px;
    display: inline;
}
.resume {
    border:none;
}
.resume-main-content h2.resume_name {
    font-size: 20px;
    padding: 0;
    margin: 0;
}
.resume-main-content h3.resume_field {
    font-size: 14px;
    padding: 0;
    margin: 0;
}
.resume-chapter h2 {
    font-size: 14px;
}
.resume_contact,
.resume-chapter-content dl dt,
.resume-chapter-content dl dd p {
    font-size: 12px;
}
.resume-main-contacts span{
    border-right: none;
}
</style>
<?php } ?>
<div class="main">
    <div class="resume">
        <div class="resume-main">
            <div class="resume-main-image">
                <?php
                    $img_src = ($resume_detail['photo'] != '') ? $resume_detail['photo'] : 'no_photo.png';
                    $on_error = "this.src='assets/images/no_photo.png'";
                ?>
                <img class="profile_image" src="assets/images/resume_images/<?php echo $img_src; ?>" alt="" onerror="<?php echo $on_error; ?>">
            </div>

            <div class="resume-main-content">
                <h2 class="resume_name" ><?php echo $resume_detail['fname'] . ' ' . $resume_detail['mname'] . ' ' . $resume_detail['lname']; ?>
                    <?php if(!isset($is_pdf)){ ?>
                        <div class="resume_sign_wrapper">
                            <span class="resume-main-verified"><i class="icon-checkmark4"></i></span>
                            <p class="badge" title="Special Need">
                                <?php echo ($resume_detail['special_need'] == 0) ? 'Special' : 'Normal'; ?>
                            </p>
                            <p class="badge" title="UAE Military Service">
                                <?php echo ($resume_detail['military_service'] == 0) ? 'Done' : 'Awaiting'; ?>
                            </p>
                        </div>
                    <?php } ?>
                </h2>
                <h3 class="resume_field"><?php echo $resume_detail['field_name']; ?></h3>
                <div class="resume-main-contacts">
                    <span class="resume_contact">
                        <i class="fa fa-map-marker"></i><?php echo $resume_detail['emirate_name']; ?>
                    </span>
                    <span class="resume_contact">
                        <i class="fa fa-phone" aria-hidden="true"></i><?php echo $resume_detail['phone_no']; ?>
                    </span>
                    <span class="resume_contact">
                        <i class="fa fa-envelope-o" aria-hidden="true"></i>
                        <a href="mailto:<?php echo $resume_detail['email']; ?>"><?php echo $resume_detail['email']; ?></a>
                    </span>
                    <?php 
                        if( $resume_detail['website'] != ''){
                    ?>
                    <span class="resume_contact">
                        <i class="fa fa-globe" aria-hidden="true"></i>
                        <a href="<?php echo $resume_detail['website']; ?>" target="_blank"><?php echo $resume_detail['website']; ?></a>
                    </span>
                    <?php } ?>
                </div>
                <?php
                    if($resume_detail['user_id'] == $this->session->userdata('user_id') && !isset($is_pdf) ){
                ?>
                <div class="progress">
                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $resume_detail['profile_complete']; ?>%">
                        <?php echo $resume_detail['profile_complete']; ?>% Profile Complete
                    </div>
                </div>
                <?php } ?>
                <!-- p class="resume-main-contacts">
                    <i class="fa fa-map-marker"></i><?php echo $resume_detail['emirate_name']; ?><br>
                    Email: <a href="mailto:<?php echo $resume_detail['email']; ?>"><?php echo $resume_detail['email']; ?></a> - Website: <a href="<?php echo $resume_detail['website']; ?>" target="_blank"><?php echo $resume_detail['website']; ?></a>
                </p-->

            <?php if(!isset($is_pdf)){ ?>
                <div class="resume-main-actions">
                    <a href="download/<?php echo base64_encode($resume_detail['id']); ?>" class="btn btn-success"><i class="icon-download4"></i> Download</a>
                    <a href="#" class="btn btn-info"><i class="icon-share3" aria-hidden="true"></i>Share</a>
                    <a href="#" class="btn btn-default bg-grey"><i class="icon-phone2" aria-hidden="true"></i>Contact</a>
                </div>
            <?php } ?>
            </div>
        </div>
        <div class="resume-chapter">
            <div class="resume-chapter-inner">
                <div class="resume-chapter-title">
                    <h2>Summary</h2>
                </div>

                <div class="resume-chapter-content">
                    <?php echo $resume_detail['biography']; ?>
                </div>
            </div>
        </div>

        <div class="resume-chapter">
            <div class="resume-chapter-inner resume_experience">
                <div class="resume-chapter-title">
                    <h2>Experience</h2>
                </div>
                <div class="resume-chapter-content">
                    <!--<h2 class="mb40">Working History</h2>-->
                    <!--<h2 class="mb40">Experience</h2>-->

                        <?php
                        if ($resume_detail['resume_exp_id'] != '' && count($resume_detail['resume_experiences']) > 0) {
                            foreach ($resume_detail['resume_experiences'] as $resume_experience) {
                                ?>
                            <dl>
                                <dt><?php echo date('M, Y', strtotime($resume_experience['from_date'])) . ' - ' . date('M, Y', strtotime($resume_experience['to_date'])); ?></dt>

                                <dd>
                                    <h3><?php echo $resume_experience['title'] ?></h3>                                    
                                    <p>
                                        <?php echo $resume_experience['company_name']; ?>
                                    </p>
                                </dd>
                            </dl>
                                <?php
                            }
                        }
                        ?>
                </div>
            </div>
        </div>

        <div class="resume-chapter">
            <div class="resume-chapter-inner resume_education">
                <div class="resume-chapter-title">
                    <h2>Education</h2>
                </div>
                <div class="resume-chapter-content">
                    <!--<h2 class="mb40">Education</h2>-->

                        <?php
                        if ($resume_detail['resume_edu_id'] != '' && count($resume_detail['resume_educations']) > 0) {
                            foreach ($resume_detail['resume_educations'] as $resume_education) {
                                ?>
                            <dl>
                                <dt><?php echo date('M, Y', strtotime($resume_education['from_date'])) . ' - ' . date('M, Y', strtotime($resume_education['to_date'])); ?></dt>

                                <dd>
                                    <h3><?php echo $resume_education['degree'] ?></h3>                                    
                                    <p>
                                        <?php echo $resume_education['school_name']; ?>
                                    </p>
                                </dd>
                            </dl>
                                <?php
                            }
                        }
                        ?>
                </div>
            </div>
        </div>

        <div class="resume-chapter">
            <div class="resume-chapter-inner">
                <div class="resume-chapter-title">
                    <h2>Skills</h2>
<!--                        <h2>Experience</h2>-->
                </div>

                <div class="resume-chapter-content">
                    <ul>
                        <?php
                            if($resume_detail['skills'] != ''){
                                $skill_names = explode(',', $resume_detail['skill_names']);
                                foreach ($skill_names as $skill_name) {
                        ?>
                            <li><?php echo $skill_name; ?></li>
                        <?php
                                }
                            }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>   
</div>