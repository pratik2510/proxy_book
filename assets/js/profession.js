$(document).ready(function () {
    'use strict';

//    $("#resume_sidebar").stick_in_parent();
    /**
     * Count Up
     */
    $('.stat-item').each(function () {
        var numAnim = new CountUp($('strong', this).attr('id'), 0, $(this).data('to'), 0, 1.5, {
            useEasing: true,
            useGrouping: true,
            separator: ',',
            decimal: '.',
            prefix: '',
            suffix: ''
        });
        numAnim.start();
    });

    /**
     * Action Bar
     */
    // Switch the body classes
    $('.action-bar-chapter a').on('click', function (e) {
        e.preventDefault();

        $(this).closest('ul').find('a').removeClass('active');
        $(this).closest('ul').find('a').each(function () {
            $('body').removeClass($(this).attr('data-action'));
        });
        $('body').addClass($(this).attr('data-action'));
        $(this).addClass('active');
    });

    // Change color combination
    $('.action-bar-chapter table a').on('click', function (e) {
        e.preventDefault();
        $(this).closest('table').find('a').removeClass('active');
        $(this).addClass('active');

        var uri = $(this).attr('href');
        $('#style-primary').attr('href', uri);
    });

    // Hide/Show
    $('.action-bar-title').on('click', function (e) {
        $('.action-bar-content').toggleClass('open');
    });

    /**
     * ezMark
     */
    $(document).find('input[type=radio], input[type=checkbox]').ezMark();

    /**
     * Bootstrap select
     */
    $('select').selectpicker({
        style: 'btn',
        width: '100%',
        template: {
            caret: '<i class="fa fa-chevron-down"></i>'
        },
    });

    /**
     * Bootstrap wysiwyg
     */
    $('#editor').wysihtml5();
    ;

    /**
     * Fileinput
     */

//    $(".upload_photo").fileinput({
//        dropZoneTitle: '<i class="fa fa-photo"></i><span><?php echo lang("Upload Photo"); ?></span>',
//        uploadUrl: '/',
//        maxFileCount: 1,
//        showUpload: false,
//        browseLabel: 'Browse',
//        browseIcon: '',
//        removeLabel: 'Remove',
//        removeIcon: '',
//        uploadLabel: 'Upload',
//        uploadIcon: '',
//        autoReplace: true,
//        allowedFileTypes: ['image'],
//        allowedFileExtensions: ['jpg', 'gif', 'png', 'jpeg']
//    });

    URL = window.URL || window.webkitURL;
    var blobURL = '';
    $('.upload_photo').on('fileloaded', function (event, file, previewId, index, reader) {
        blobURL = URL.createObjectURL(file);
        $('#crop_img_type').val(file.type);
        $("#image_crop").modal('show');

        $('#image_crop').on('shown.bs.modal', function () {
            var image = $(document).find('#image_crop #modal_image');
            image.cropper({
                viewMode:1,
                dragMode: 'move',
                aspectRatio: 1 / 1,
                cropBoxMovable: false,
                cropBoxResizable: false,
                movable: true,
                toggleDragModeOnDblclick: false
            });

            image.on('built.cropper', function () {
                URL.revokeObjectURL(blobURL);
            }).cropper('reset').cropper('replace', blobURL);
        });

    });
    $('.upload_photo').on('fileuploaderror', function (event, data, msg) {
        $(".upload_photo").fileinput('reset');
    });
    $('#image_crop').on('hidden.bs.modal', manage_crop_image);
    $("#crop_btn").click(manage_crop_image);

    function manage_crop_image() {
        var croppedCanvas = $('#modal_image').cropper('getCroppedCanvas', {height: 300, width: 300});
        var result = getRoundedCanvas(croppedCanvas);
        var im_url = result.toDataURL();
        $('.file-preview-image').attr('src', im_url);
        /*$('#modal_image').cropper('getCroppedCanvas').toBlob(function(blob){
         console.log('blob = ', blob);
         });*/
    }

    function getRoundedCanvas(sourceCanvas) {
        var canvas = document.createElement('canvas');
        var context = canvas.getContext('2d');
        var width = sourceCanvas.width;
        var height = sourceCanvas.height;

        canvas.width = width;
        canvas.height = height;
        context.beginPath();
        context.arc(width / 2, height / 2, Math.min(width, height) / 2, 0, 2 * Math.PI);
        context.strokeStyle = 'rgba(0,0,0,0)';
        context.stroke();
        context.clip();
        context.drawImage(sourceCanvas, 0, 0, width, height);

        return canvas;
    }

    $(document).find('.date_input').datepicker({
        format: "dd M yyyy",
//        maxViewMode: 2,
//        minViewMode: 1,
        autoclose: true
    });
    $(document).find('.edu_from_date').each(function () {
        var from_date = $(this);
        var to_date = from_date.parents('.div_add_block').find('.edu_to_date');
        from_date.datepicker({format: "M yyyy", minViewMode: 1,autoclose: true}).on('changeDate', function (e) {
            var startDate = from_date.val();
            to_date.data('datepicker').setStartDate(startDate);
        });
        to_date.datepicker({
            format: "M yyyy",
            autoclose: true,
            minViewMode: 1,
            startDate: from_date.val()
        });
    });


    $(document).find('.exp_from_date').each(function () {
        var from_date = $(this);
        var to_date = from_date.parents('.div_add_block').find('.exp_to_date');
        from_date.datepicker({format: "M yyyy", minViewMode: 1,autoclose: true}).on('changeDate', function (e) {
            var startDate = from_date.val();
            to_date.data('datepicker').setStartDate(startDate);
        });
        to_date.datepicker({
            format: "M yyyy",
            autoclose: true,
            minViewMode: 1,
            startDate: from_date.val()
        });
    });

    $(document).on('click', '.alert_close', function () {
        $(this).parent().fadeOut(500);
    });
});
