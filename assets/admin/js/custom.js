$(document).on('ready', function () {

    // Mini sidebar
    // -------------------------
    // Setup
    function miniSidebar() {
        if ($('body').hasClass('sidebar-xs')) {
            $('.sidebar-main.sidebar-fixed .sidebar-content').on('mouseenter', function () {
                if ($('body').hasClass('sidebar-xs')) {

                    // Expand fixed navbar
                    $('body').removeClass('sidebar-xs').addClass('sidebar-fixed-expanded');
                }
            }).on('mouseleave', function () {
                if ($('body').hasClass('sidebar-fixed-expanded')) {

                    // Collapse fixed navbar
                    $('body').removeClass('sidebar-fixed-expanded').addClass('sidebar-xs');
                }
            });
        }
    }

    // Initialize
    miniSidebar();

    // Toggle mini sidebar
    $('.sidebar-main-toggle').on('click', function (e) {

        // Initialize mini sidebar 
        miniSidebar();
    });


    // Nice scroll
    // ------------------------------
    // Setup
    function initScroll() {
        $(".sidebar-fixed .sidebar-content").niceScroll({
            mousescrollstep: 100,
            cursorcolor: '#ccc',
            cursorborder: '',
            cursorwidth: 3,
            hidecursordelay: 100,
            autohidemode: 'scroll',
            horizrailenabled: false,
            preservenativescrolling: false,
            railpadding: {
                right: 0.5,
                top: 1.5,
                bottom: 1.5
            }
        });
    }

    // Remove
    function removeScroll() {
        $(".sidebar-fixed .sidebar-content").getNiceScroll().remove();
        $(".sidebar-fixed .sidebar-content").removeAttr('style').removeAttr('tabindex');
    }
    // Initialize
    initScroll();

    // Remove scrollbar on mobile
    $(window).on('resize', function () {
        setTimeout(function () {
            if ($(window).width() <= 768) {

                // Remove nicescroll on mobiles
                removeScroll();
            }
            else {

                // Init scrollbar
                initScroll();
            }
        }, 100);
    }).resize();

    // Switchery toggles
    var switches = Array.prototype.slice.call(document.querySelectorAll('.switch'));
    switches.forEach(function (html) {
        var switchery = new Switchery(html, {color: '#4CAF50'});
    });

    $(".name_field_form").validate({
        ignore: 'input[type=hidden], .select2-search__field', // ignore hidden fields
        errorClass: 'validation-error-label',
        successClass: 'validation-valid-label',
        highlight: function (element, errorClass) {
            $(element).removeClass(errorClass);
        },
        unhighlight: function (element, errorClass) {
            $(element).removeClass(errorClass);
        },
        validClass: "validation-valid-label",
        rules: {
            name_field: {
                required: true,
            }
        },
        messages: {
            name_field: {
                required: "Please enter name.",
            }
        }
    });
    
    $(document).find('.date_input').datepicker({
        format: "dd M yyyy",
        maxViewMode: 2,
        autoclose: true
    });
    
    $(document).find('.edu_from_date').each(function () {
        var from_date = $(this);
        var to_date = from_date.parents('.div_add_block').find('.edu_to_date');
        from_date.datepicker({format: "dd M yyyy", autoclose: true}).on('changeDate', function (e) {
            var startDate = from_date.val();
            to_date.data('datepicker').setStartDate(startDate);
        });
        to_date.datepicker({
            format: "dd M yyyy",
            autoclose: true,
            startDate: from_date.val()
        });
    });


    $(document).find('.exp_from_date').each(function () {
        var from_date = $(this);
        var to_date = from_date.parents('.div_add_block').find('.exp_to_date');
        from_date.datepicker({format: "dd M yyyy", autoclose: true}).on('changeDate', function (e) {
            var startDate = from_date.val();
            to_date.data('datepicker').setStartDate(startDate);
        });
        to_date.datepicker({
            format: "dd M yyyy",
            autoclose: true,
            startDate: from_date.val()
        });
    });

    /**
     * Datatable
     */
    $('.datatable-basic').DataTable({
        autoWidth: false,
        columnDefs: [{
                orderable: false,
            }],
        "pagingType": "full_numbers",
        dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
        language: {
            search: '<span>Filter:</span> _INPUT_',
            lengthMenu: '<span>Show:</span> _MENU_',
            paginate: {'first': 'First', 'last': 'Last', 'next': '&rarr;', 'previous': '&larr;'}
        },
    });

    // Add placeholder to the datatable filter option
    $('.dataTables_filter input[type=search]').attr('placeholder', 'Type to filter...');


    // Enable Select2 select for the length option
    $('.dataTables_length select').selectpicker({
        minimumResultsForSearch: Infinity,
        width: '100%'
    });

    $(".table tr").each(function (i) {
        // Title
        var $title = $(this).find('.letter-icon-title'),
                letter = $title.eq(0).text().charAt(0).toUpperCase();

        // Icon
        var $icon = $(this).find('.letter-icon');
        $icon.eq(0).text(letter);
    });

    $('select').selectpicker({
        width: '100%',
        tickIcon: 'icon-checkmark3'
    });

    $(".styled").uniform({radioClass: 'choice'});
    
    $(".upload_photo").fileinput({
        dropZoneTitle: '<i class="fa fa-photo"></i><span>Upload Cover Image</span>',
        uploadUrl: '/',
        maxFileCount: 1,
        showUpload: false,
        browseLabel: 'Browse',
        browseIcon: '',
        removeLabel: 'Remove',
        removeIcon: '',
        uploadLabel: 'Upload',
        uploadIcon: '',
        autoReplace: true,
        allowedFileTypes: ['image'],
        allowedFileExtensions: ['jpg', 'gif', 'png', 'jpeg']
    });
    
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

});