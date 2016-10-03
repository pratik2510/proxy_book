<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>I Am Proud Emarati - Back End</title>
        <base href="<?php echo base_url(); ?>">

        <!-- Global stylesheets -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
        <!--<link href="assets/admin/css/icons/fontawesome/styles.min.css" rel="stylesheet" type="text/css">-->
        <link href="assets/admin/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
        <link href="assets/admin/css/bootstrap.css" rel="stylesheet" type="text/css">
        <link href="assets/admin/css/core.css" rel="stylesheet" type="text/css">
        <link href="assets/admin/css/components.css" rel="stylesheet" type="text/css">
        <link href="assets/admin/css/colors.css" rel="stylesheet" type="text/css">
        <link href="assets/admin/css/style.css" rel="stylesheet" type="text/css">
        <!-- <link href="assets/css/common.css" rel="stylesheet" type="text/css" id="style-primary"> -->
        <!-- /global stylesheets -->

        <!-- Core JS files -->
        <script type="text/javascript" src="assets/admin/js/plugins/loaders/pace.min.js"></script>
        <script type="text/javascript" src="assets/admin/js/core/libraries/jquery.min.js"></script>
        <script type="text/javascript" src="assets/admin/js/core/libraries/bootstrap.min.js"></script>
        <script type="text/javascript" src="assets/js/jquery.validate.js"></script>
        <!-- /core JS files -->
    </head>

    <body class="navbar-top">

        <div class="navbar navbar-inverse bg-teal navbar-fixed-top header-highlight">
            <!--<div class="navbar navbar-default navbar-fixed-top header-highlight">-->
            <div class="navbar-header">
                <a class="navbar-brand" href="admin">
                    <img src="assets/img/logo.png" alt="">
                </a>

                <ul class="nav navbar-nav visible-xs-block">
                    <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
                    <li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
                </ul>
            </div>

            <div class="navbar-collapse collapse" id="navbar-mobile">
                <ul class="nav navbar-nav">
                    <li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a></li>
                </ul>

                <div class="navbar-right">
                    <p class="navbar-text">Hello, <?php echo $user_data['name']; ?>!</p>
                </div>
            </div>
        </div>

        <div class="page-container">
            <div class="page-content">
                <div class="sidebar sidebar-main sidebar-fixed">
                    <div class="sidebar-content">
                        <div class="sidebar-user-material">
                            <div class="category-content">
                                <div class="sidebar-user-material-content">
                                    <a href="admin">
                                        <img src="assets/images/no_photo.png" class="img-circle img-responsive" alt=""></a>
                                    <h6>Hello, <?php echo $user_data['name']; ?></h6>
                                </div>

                                <div class="sidebar-user-material-menu">
                                    <a href="#user-nav" data-toggle="collapse"><span>My account</span> <i class="caret"></i></a>
                                </div>
                            </div>

                            <div class="navigation-wrapper collapse" id="user-nav">
                                <ul class="navigation">
                                    <li><a href="#"><i class="icon-user-plus"></i> <span>My profile</span></a></li>
                                    <li><a href="admin/logout"><i class="icon-switch2"></i> <span>Logout</span></a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="sidebar-category sidebar-category-visible">
                            <div class="category-content no-padding">
                                <ul class="navigation navigation-main navigation-accordion">
                                    <li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main pages"></i></li>
                                    <li><a href="admin"><i class="icon-home2"></i> <span>Dashboard</span></a></li>
                                    <li><a href="admin/resumes"><i class="icon-users"></i> <span>Authors</span></a></li>
                                    <li><a href="admin/positions"><i class="icon-magazine"></i> <span>Positions</span></a></li>
                                    <li><a href="admin/manage/emirates"><i class="icon-pin"></i> <span>Emirates</span></a></li>
                                    <li><a href="admin/manage/fields"><i class="icon-pin"></i> <span>Job Fields</span></a></li>
                                    <li><a href="admin/manage/types"><i class="icon-pin"></i> <span>Job Types</span></a></li>
                                    <li><a href="admin/manage/job_status"><i class="icon-pin"></i> <span>Job Status</span></a></li>
                                    <li><a href="admin/manage/skills"><i class="icon-pin"></i> <span>Job Skills</span></a></li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="content-wrapper">
                    <div class="">
                        <div class="page-header-content">
                            <div class="page-title">
                                <h2><span class="text-semibold"><?php echo $page_header; ?></span></h2>
                            </div>
                            <?php
                            if ($this->session->flashdata('success_msg')) {
                                ?>
                                <div class="alert alert-success alert-dismissible" role="alert">
                                    <button type="button" class="close alert_close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <?php echo $this->session->flashdata('success_msg'); ?>
                                </div>
                                <?php
                            }
                            ?>
                            <?php
                            if ($this->session->flashdata('error_msg')) {
                                ?>
                                <div class="alert alert-danger alert-dismissible" role="alert">
                                    <button type="button" class="close alert_close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <?php echo $this->session->flashdata('error_msg'); ?>
                                </div>
                                <?php
                            }
                            ?>
                            <div class="alert alert-dismissible div_alert_error" role="alert" style="display: none;">
                                <button type="button" class="close alert_close" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <div id="error_msg_div">
                                    <p class="alert_error_msg"></p>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="content">
                        <?php echo $body; ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- Theme JS files -->
        <script type="text/javascript" src="assets/admin/js/plugins/forms/styling/switchery.min.js"></script>
        <script type="text/javascript" src="assets/admin/js/plugins/forms/styling/uniform.min.js"></script>
        <script type="text/javascript" src="assets/admin/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
        <script type="text/javascript" src="assets/libraries/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
        <script type="text/javascript" src="assets/admin/js/plugins/ui/nicescroll.min.js"></script>
        <script type="text/javascript" src="assets/admin/js/plugins/forms/selects/bootstrap_select.min.js"></script>
        <script type="text/javascript" src="assets/admin/js/plugins/tables/datatables/datatables.min.js"></script>
        <script type="text/javascript" src="assets/js/jquery.twbsPagination.min.js"></script>
        <script type="text/javascript" src="assets/admin/js/core/app.js"></script>
        <script type="text/javascript" src="assets/admin/js/custom.js"></script>

        <script type="text/javascript" src="assets/admin/js/plugins/ui/ripple.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $('input:required').on('blur', function () {
                    $(this).val($(this).val().trim());
                });
                
                <?php
                    if (isset($total_pages) && $total_pages > 1) {
                ?>
                    var page = <?php echo $total_pages; ?>;
                    set_pagination('list_pagination', page);
                <?php } ?>

                function set_pagination(pagination_obj, total_pages) {
                    if (total_pages > 0) {
                        var form_detail = get_form_detail();
                        $(document).find('#' + pagination_obj).twbsPagination({
                            totalPages: total_pages,
                            loop: false,
                            first: '<i class="icon-first" aria-hidden="true"></i>',
                            prev: '<i class="icon-backward2" aria-hidden="true"></i>',
                            next: '<i class="icon-forward3" aria-hidden="true"></i>',
                            last: '<i class="icon-last" aria-hidden="true"></i>',
                            initiateStartPageClick: false,
                            onPageClick: function (event, page) {
                                $('#loader').fadeIn(1000);
                                $.ajax({
                                    type: 'POST',
                                    url: '<?php echo base_url(); ?>' + form_detail.url + '/' + page,
                                    dataType: 'JSON',
                                    async: false,
                                    data: $('#' + form_detail.form_id).serialize(),
                                    success: function (data) {
                                        $('#loader').fadeOut(1000);
                                        if (data.success == 1) {
                                            $(document).find('.filter_result').html(data.html);
                                        }
                                    }
                                });
                            }
                        });
                    }
                }

                function get_form_detail() {
                    var page_url = '<?php echo $this->uri->rsegments[2]; ?>'
                    var url = '';
                    if (page_url == "position_list") {
                        url = 'admin/position/filter_position';
                    } else if (page_url == "resume_list") {
                        url = 'admin/resume/filter_resume';
                    } else if (page_url == "position_fliter_form") {
                        url = 'position/filter_position';
                    } else if (page_url == "user_accounts") {
                        url = 'admin/accounts/filter_users';
                    } else if (page_url == "company_accounts") {
                        url = 'admin/accounts/filter_company';
                    }
                    var return_array = {
                        url: url
                    };
                    return return_array;
                }
            });
        </script>
        <!-- /theme JS files -->
    </body>
</html>
