<div class="main_wrapper">
    <div class="row">
        <div class="alert alert-dismissible div_p_error" role="alert" style="display: none;">
            <button type="button" class="close alert_close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <div id="p_error_msg">

            </div>
        </div>
        <div class="col-sm-4 col-md-3">
            <?php echo $company['company_card']; ?>

            <div class="widget contact_company">
                <h2>Map View</h2>
                <div class="map_view" >
                    <a target="_blank" class="btn btn-primary navigate_btn" href="<?php echo 'http://maps.google.com/maps?z=7&t=m&q=loc:' . $company['company_detail']['latitude'] . '+' . $company['company_detail']['longitude']; ?>">
                    <!--<a class="btn btn-primary navigate_btn" href="<?php echo 'https://www.google.co.in/maps/place/'. urlencode($company['company_detail']['name']) . '/@' . $company['company_detail']['latitude'] . ',' . $company['company_detail']['longitude']; ?>">-->
                        <i class="fa fa-location-arrow"></i> Navigate
                    </a>
                    <div id="comapany_location_map">

                    </div>
                </div>
                
            </div>
        </div>

        <div class="col-sm-8 col-md-9">
            <div class="company-header">
                <h1><?php echo $company['company_detail']['name']; ?></h1>
            </div>
        <?php
            if($company['company_detail']['id'] == $this->session->userdata('user_id')){
        ?>
            <div class="progress">
                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $company['company_detail']['profile_complete']; ?>%">
                    <?php echo $company['company_detail']['profile_complete']; ?>% Profile Complete
                </div>
            </div>
        <?php } ?>

        <?php // if( $company['extra_detail']['description'] != '' ){ ?>
            <h3 class="page-header">Company Profile</h3>

            <p>
                <?php echo $company['extra_detail']['description']; ?>
            </p>
        <?php // } ?>

        <?php
            if ( $company['field_html'] != '' ) {
        ?>
                <h3 class="page-header">Job Fields</h3>

                <div class="company_job_field">
                    <ul>
                        <li>
                            <?php echo $company['field_html']; ?>
                        </li>
                    </ul>
                </div>
            <?php } ?>

            <h3 class="page-header"><?php echo $company['open_positions']; ?> Open Positions</h3>

            <div class="filter_div" id="fliter_form_div">
                <form method="post" id="position_fliter_form" class="filter_form">
                </form>
            </div>
            <div class="positions-list filter_result">
                <?php echo $company['position_list_html']; ?>
            </div>

            <div id="pagination_div" class="center">
                <ul id="list_pagination" class="pagination"></ul>
            </div>
        </div>
    </div>    
</div>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyAY6AYJk-FtRRm4-f3nyH2t9GQdaZ2wn20&libraries=places"></script>
<script type="text/javascript">
    $(document).ready(function () {
        var map;
        var lat = '<?php echo $company['company_detail']['latitude']; ?>';
        var long = '<?php echo $company['company_detail']['longitude']; ?>';
        var mapCenter = new google.maps.LatLng(lat, long);
        var mapProp = {
            center: mapCenter,
            zoom: 14,
            draggable: false,
            scrollwheel: false,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };

        var marker = new google.maps.Marker({
            position: mapCenter
        });

        map = new google.maps.Map(document.getElementById("comapany_location_map"), mapProp);
        marker.setMap(map);
    });
</script>