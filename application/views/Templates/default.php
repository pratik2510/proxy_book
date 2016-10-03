<!DOCTYPE html>
<html dir="<?php echo ($this->session->userdata('site_lang') != 'english') ? 'rtl' : 'ltr' ?>">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
        <base href="<?php echo base_url(); ?>">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" type="text/css">
        <link href="assets/fonts/profession/style.css" rel="stylesheet" type="text/css">
        <link href="assets/libraries/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="assets/libraries/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
        <link href="assets/libraries/bootstrap-fileinput/css/fileinput.min.css" rel="stylesheet" type="text/css">
        <link href="assets/libraries/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet" type="text/css">
        <link href="assets/libraries/bootstrap-wysiwyg/bootstrap-wysiwyg.min.css" rel="stylesheet" type="text/css">
        <link href="assets/libraries/tag-it/jquery.tagit.css" rel="stylesheet" type="text/css">
        <link href="assets/libraries/jquery-ui/jquery-ui.min.css" rel="stylesheet" type="text/css">
        <link href="assets/libraries/bootstrap-datepicker/bootstrap-datepicker3.css" rel="stylesheet" type="text/css">
        <link href="assets/libraries/cropper/cropper.min.css" rel="stylesheet" type="text/css">
        <link href="assets/css/profession-black-green.css" rel="stylesheet" type="text/css" id="style-primary">
        <link href="assets/css/custom.css" rel="stylesheet" type="text/css">
        <link href="assets/css/common.css" rel="stylesheet" type="text/css">
        <?php
        if ($this->session->userdata('site_lang') != 'english') {
            ?> 
            <link href="assets/css/bootstrap-rtl.min.css" rel="stylesheet" type="text/css" >
            <link href="assets/css/custom-rtl.css" rel="stylesheet" type="text/css" >
        <?php } ?>

        <link rel="icon" href="assets/favicon.ico" type="image/x-icon"/>
        <!--<link rel="shortcut icon" type="image/x-icon" href="assets/favicon.png">-->
        <script type="text/javascript" src="assets/js/jquery.js"></script>
        <script type="text/javascript" src="assets/libraries/jquery-ui/jquery-ui.min.js"></script>
        <script type="text/javascript" src="assets/js/jquery.validate.js"></script>
        <script type="text/javascript" src="assets/js/jquery.twbsPagination.min.js"></script>
        <script type="text/javascript" src="assets/js/custom.js"></script>
        <title><?php echo 'I Am Proud Emarati - ' . $title; ?></title>
    </head>


    <body class="hero-content-dark footer-dark" >

        <div class="page-wrapper">
            <div class="header-wrapper">
                <div class="header">
                    <div class="header-top">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="header-brand flip">
                                        <div class="header-logo">
                                            <a href="<?php echo base_url(); ?>">
                                                <img src="assets/img/logo.png">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <ul class="header-actions nav nav-pills flip">
                                        <?php
                                        if ($this->session->userdata('user_id') != '' && $this->session->userdata('is_admin') == 0 ) {
                                            ?>                                            
                                            <li>
                                                <a>
                                                    <?php 
                                                    $user_name = ($user_data[lang('user_name')] != '') ? $user_data[lang('user_name')] : $user_data[lang('t_user_name')];
                                                    echo lang('Hello').', ' . $user_name; ?> 
                                                    <i class="fa fa-chevron-down"></i> 
                                                </a>
                                                <ul class="sub-menu">
                                                    <li><a href="profile">
                                                        <?php echo ($user_data['account_type'] == 0) ? lang('My Profile') : lang('Company Profile'); ?></a>
                                                    </li>
                                                    <?php
                                                    if ($user_data['account_type'] == 0) {
                                                        if ($total_resume > 0) {
                                                        ?>
                                                        <li>
                                                            <a href="resume_detail"><?php echo lang('Review Resume'); ?></a>
                                                        </li>
                                                        <li>
                                                            <a href="translate_resume"><?php echo lang('Translate Resume'); ?></a>
                                                        </li>
                                                        <?php
                                                        }
                                                    } else {
                                                        ?>
                                                        <li><a href="open_positions"><?php echo lang('Open Positions'); ?></a></li>
                                                        <li><a href="closed_positions"><?php echo lang('Closed Positions'); ?></a></li>
                                                        <li><a href="add_product"><?php echo lang('Add Product / Service'); ?></a></li>
                                                        <li><a href="messages"><?php echo lang('Messages'); ?></a></li>
                                                    <?php } ?>
                                                    <li><a href="logout"><?php echo lang('Logout'); ?></a></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <?php
                                                if ($user_data['account_type'] == 0) {
                                                    if ($total_resume == 0) {
                                                        ?>
                                                        <a href="create_resume" class="primary"><?php echo lang('Create Resume'); ?></a>
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <a href="update_resume" class="primary"><?php echo lang('Update Resume'); ?></a>
                                                    <?php
                                                    }
                                                } else if ($user_data['account_type'] == 1) {
                                                    ?>
                                                    <a href="create_position" class="primary"><?php echo lang('Create New Position'); ?></a>
                                                    <?php
                                                }
                                                ?>
                                            </li>
                                        <?php } else { ?>
                                            <li><a href="login"><?php echo lang('Login'); ?></a></li>
                                            <li><a href="registration"><?php echo lang('Sign Up'); ?></a></li>
                                        <?php } ?>
                                        <li>
                                            <select id="lang_change">
                                                <option value="english" <?php echo ($this->session->userdata('site_lang') == 'english') ? 'selected="selected"' : ''; ?>>English</option>
                                                <option value="arabic" <?php echo ($this->session->userdata('site_lang') == 'arabic') ? 'selected="selected"' : ''; ?>><?php echo lang('Arabic'); ?></option>
                                            </select>
                                        </li>
                                    </ul>
        
                                    <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target=".header-nav">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="header-bottom">
                        <div class="container">
                            <ul class="header-nav nav nav-pills collapse flip">
                                <li class="<?php echo ($this->uri->rsegment(1) == 'home' ) ? 'active' : ''; ?>">
                                    <a href=""><?php echo lang('Home'); ?></a>
                                </li>

                                <li class="<?php echo ($this->uri->rsegment(1) == 'company' ) ? 'active' : ''; ?>">
                                    <a href="companies"><?php echo lang('Companies'); ?></a>
                                </li>

                                <li class="<?php echo ($this->uri->rsegment(1) == 'position' ) ? 'active' : ''; ?>">
                                    <a href="positions"><?php echo lang('Jobs'); ?></a>
                                </li>

                                <li class="<?php echo ($this->uri->rsegment(1) == 'candidate' ) ? 'active' : ''; ?>">
                                    <a href="candidates"><?php echo lang('Job seekers'); ?> </a>
                                    <!--
                                    <a href="candidates"><?php echo lang('Job seekers'); ?> <i class="fa fa-chevron-down"></i></a>
                                    <ul class="sub-menu">
                                        <li class="<?php echo ($this->uri->rsegment(2) == 'candidate_list' ) ? 'active' : ''; ?>"><a href="candidates"><?php echo lang('All Resumes'); ?></a></li>
                                        <li><a href="create_resume"><?php echo lang('Create Resume'); ?></a></li>
                                    </ul>
                                    -->
                                </li>
                            </ul>

                            <div class="header-search hidden-sm">
                                <form id="global_search_form" method="GET" action="search">
                                    <input type="text" class="form-control" id="search_key" name="search_key" placeholder="<?php echo lang('Search'); ?>">
                                    <button type="submit" class="search_btn">
                                        <i class="fa fa-search" aria-hidden="true"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="main-wrapper">
                <?php echo $body; ?>
            </div>

            <div class="footer-wrapper">
                <div class="footer">
                    <div class="footer-top">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-5">
                                    <div class="footer-top-block">
                                        <h2>
                                            <img class="footer_logo" src="assets/img/footer_logo.png"> I Am Proud Emarati
                                        </h2>
                                        <p>
                                            <?php echo lang('footer_msg'); ?>
                                        </p>
                                    </div>
                                </div>

                                <div class="col-sm-3 col-sm-offset-1">
                                    <div class="footer-top-block">
                                        <h2><?php echo lang('Helpful Links'); ?></h2>

                                        <ul>
                                            <li><a href="#"><?php echo lang('About us'); ?></a></li>
                                            <li><a href="#"><?php echo lang('Privacy policy'); ?></a></li>
                                            <li><a href="#"><?php echo lang('Terms of use'); ?></a></li>
                                            <li><a href="#"><?php echo lang('Contact us'); ?></a></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="footer-top-block profile_social_detail">
                                        <h2><?php echo lang('Social Media'); ?></h2>

                                        <ul class="social-links">
                                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="footer-bottom">
                        <div class="container">
                            <div class="footer-bottom-left">
                                &copy; 2016 <?php echo lang('All rights reserved'); ?>.
                            </div>

<!--                            <div class="footer-bottom-right">
                                Created by <a href="http://byaviators.com">Aviators</a>. Premium themes and templates.
                            </div>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id ="loader" style="display:none;">
            <i class="fa fa-empire fa-spin fa-5x fa-fw"></i>
            <!--<img src="assets/img/loader.gif">-->
        </div>
        <div class="modal fade" id="do_login_modal" tabindex="-1" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Login Required!!</h4>
                    </div>
                    <div class="modal-body">
                        <p>To perform this operation you must need to Login First. <a href="login">Click Here</a> to Login.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Ok</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="image_crop" aria-labelledby="modalLabel" role="dialog" tabindex="-1">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="modalLabel"><?php echo lang('Crop the image'); ?></h4>
                    </div>
                    <div class="modal-body">
                        <div class="modal_crop_div">
                            <img id="modal_image" src="" alt="Picture">
                        </div>
                        <input type="hidden" id="crop_img_type">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo lang('Crop'); ?></button>
                    </div>
                </div>
            </div>
        </div>
    <script type="text/javascript" src="assets/js/jquery.ezmark.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>        
    <script type="text/javascript" src="assets/libraries/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript" src="assets/libraries/cropper/cropper.min.js"></script>
    <script type="text/javascript" src="assets/libraries/tag-it/tag-it.min.js"></script>
    <script type="text/javascript" src="assets/libraries/bootstrap-fileinput/js/fileinput.min.js"></script>
    <script type="text/javascript" src="assets/libraries/bootstrap-select/js/bootstrap-select.min.js"></script>
    <script type="text/javascript" src="assets/libraries/bootstrap-wysiwyg/bootstrap-wysiwyg.min.js"></script>
    <script type="text/javascript" src="assets/libraries/cycle2/jquery.cycle2.min.js"></script>
    <script type="text/javascript" src="assets/libraries/cycle2/jquery.cycle2.carousel.min.js"></script>
    <script type="text/javascript" src="assets/libraries/countup/countup.min.js"></script>
    <!-- bootstrap-sass
        <script type="text/javascript" src="assets/libraries/bootstrap-sass/javascripts/bootstrap/collapse.js"></script>
        <script type="text/javascript" src="assets/libraries/bootstrap-sass/javascripts/bootstrap/dropdown.js"></script>
        <script type="text/javascript" src="assets/libraries/bootstrap-sass/javascripts/bootstrap/tab.js"></script>
        <script type="text/javascript" src="assets/libraries/bootstrap-sass/javascripts/bootstrap/transition.js"></script>
    -->

    <script type="text/javascript" src="assets/js/profession.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $(document).find('.pagination').each(function(){
                $(this).attr('id');
                console.log($(this).parents('.record_wrapper'));
            });
            
            $(".upload_photo").fileinput({
                dropZoneTitle: '<i class="fa fa-photo"></i><span><?php echo lang("Upload Photo"); ?></span>',
                uploadUrl: '/',
                maxFileCount: 1,
                showUpload: false,
                browseLabel: '<?php echo lang("Browse"); ?>',
                browseIcon: '',
                removeLabel: '<?php echo lang("Remove"); ?>',
                removeIcon: '',
                uploadLabel: 'Upload',
                uploadIcon: '',
                autoReplace: true,
                allowedFileTypes: ['image'],
                allowedFileExtensions: ['jpg', 'gif', 'png', 'jpeg']
            });
            
            $('#lang_change').on('changed.bs.select', function (e) {
                var lang = $(this).val();
                $.ajax({
                    type: "POST",
                    data: {"lang": lang},
                    dataType: 'JSON',
                    url: "<?php echo base_url(); ?>LanguageSwitcher/switchLang",
                    success: function (response) {
                        if (response.success == 1) {
                            location.reload();
                        }
                    }
                })
            });

            $(document).on('click', '.do_login', function () {
                $('#do_login_modal').modal('toggle');
            });
            
            $(document).on('click','.job_field',function(){
                var job_field_id = $(this).attr('data-id');
                
                if (!$(this).hasClass("bootstrap-select")) {
                    var form_detail = get_form_detail();
                    
                    fields = [];
                    fields.push(job_field_id);
                    var data = {'fields':fields};
                    var url = '<?php echo base_url(); ?>' + form_detail.url;
                    load_data(url, data);
                    $('.field_filter').selectpicker('val', [job_field_id]);
                }
            });
<?php
if (isset($total_pages) && $total_pages > 1) {
    ?>
                var page = <?php echo $total_pages; ?>;
                set_pagination('list_pagination', page);
<?php } ?>

            $(document).on('change', '.filter_option', function () {
                if (!$(this).hasClass("bootstrap-select")) {
                    var form_detail = get_form_detail();
                    var data = $('#' + form_detail.form_id).serialize();
                    var url = '<?php echo base_url(); ?>' + form_detail.url;
                    load_data(url, data);
                }
            });
            
            $(document).on('click', '.reset_filter', function () {
                $(document).find('.filter_option[type="checkbox"]').prop('checked', false);
                $('.checkbox div.ez-checkbox').removeClass('ez-checked');
                $('select.filter_option').selectpicker('val',[]);
                var form_detail = get_form_detail();
                var data = $('#' + form_detail.form_id).serialize();
                var url = '<?php echo base_url(); ?>' + form_detail.url;
                load_data(url, data);
                return 0;
            });
            
            function load_data(url, data){
                $('#loader').fadeIn();
                $.ajax({
                    type: 'POST',
                    url: url,
                    dataType: 'JSON',
                    async: false,
                    data: data,
                    success: function (data) {
                        if (data.success == 1) {
                            $(document).find('#pagination_div .pagination').remove();
                            var random_pagination_div = 'list_pagination_' + Math.floor((Math.random() * 100) + 1);
                            $(document).find('#pagination_div').html('<ul id="' + random_pagination_div + '" class="pagination"></ul>');
                            set_pagination(random_pagination_div, data.total_pages);
                            $(document).find('.filter_result').html(data.html);
                            $(document).find('.total_records').text(data.total_records);
                            $('#loader').fadeOut();
                        }
                    }
                });
            }

            function get_form_detail() {
                var form = $(document).find('form.filter_form');
                var url = '';
                if (form.length > 0) {
                    var form_id = form.attr('id');
                    if (form_id == "candidate_fliter_form") {
                        url = 'filter_resume';
                    } else if (form_id == "company_fliter_form") {
                        url = 'filter_company';
                    } else if (form_id == "position_fliter_form") {
                        url = 'filter_position';
                    } else if (form_id == "message_fliter_form") {
                        url = 'filter_message';
                    }
                }
                var return_array = {
                    url: url,
                    form_id: form_id
                };
                return return_array;
            }

            function set_pagination(pagination_obj, total_pages) {
                if (total_pages > 1) {
                    var form_detail = get_form_detail();
                    $(document).find('#' + pagination_obj).twbsPagination({
                        totalPages: total_pages,
                        loop: false,
                        first: '<i class="fa fa-fast-backward" aria-hidden="true"></i>',
                        prev: '<i class="fa fa-backward" aria-hidden="true"></i>',
                        next: '<i class="fa fa-forward" aria-hidden="true"></i>',
                        last: '<i class="fa fa-fast-forward" aria-hidden="true"></i>',
                        initiateStartPageClick: false,
                        onPageClick: function (event, page) {
                            $('#loader').fadeIn();
                            $.ajax({
                                type: 'POST',
                                url: '<?php echo base_url(); ?>' + form_detail.url + '/' + page + '<?php echo (isset($record_limit)) ? '/' . $record_limit : ''; ?>',
                                dataType: 'JSON',
                                async: false,
                                data: $('#' + form_detail.form_id).serialize(),
                                success: function (data) {
                                    if (data.success == 1) {
                                        $(document).find('.filter_result').html(data.html);
                                        $('#loader').fadeOut();
                                    }
                                }
                            });
                        }
                    });
                }
            }
            
            $("#global_search_form").validate({
                ignore: "",
                rules: {
                    search_key: "required",
                },
                messages: {
                    search_key: "Please enter key to search.",
                },
                submitHandler: function (form, event) {
                    form.submit();
                }
            });
        });
    </script>

</body>
</html>