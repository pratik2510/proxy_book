
<div class="row">
    <form method="POST" class="form-validate" id="translate_resume" action="admin/resume/manage_resume">
        <?php
        echo $english_form;
        echo $arabic_form;
        ?>
        <div class="text-center">
            <button type="submit" class="btn bg-teal">Translate Resume <i class="icon-arrow-right14 position-right"></i></button>
        </div>
    </form>
</div>
<script type="text/javascript">
    $(document).on('change', '[type="radio"], select', function () {
        var id = $(this).attr('id');
        var new_id = '';
        if (id.indexOf("English") > -1) {
            new_id = id.replace('English', 'Arabic');
        } else if (id.indexOf("Arabic") > -1) {
            new_id = id.replace('Arabic', 'English');
        }
        if ($(this).hasClass('styled')) {
            $('#' + new_id).prop('checked', true);
            $.uniform.update();
        } else {
            $('#' + new_id).selectpicker('val', [$(this).val()]);
        }

    });

    $("#translate_resume.form-validate").validate({
        ignore: '',
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
            English_r_fname: "required",
            English_r_lname: "required",
            Arabic_r_fname: "required",
            Arabic_r_lname: "required",
        },
        messages: {
            English_r_fname: "Please enter First name.",
            English_r_lname: "Please enter Surname.",
            Arabic_r_fname: "Please enter First name.",
            Arabic_r_lname: "Please enter Last name."
        },
        submitHandler: function (form, event) {
            event.preventDefault();
            $.ajax({
                type: 'POST',
                dataType: 'JSON',
                url: "<?php echo base_url(); ?>admin/manage_resume",
                data: new FormData($("#translate_resume")[0]),
                async: false,
                contentType: false,
                processData: false,
                success: function (data) {
                    if (data.error != '') {
                        $('#c_error_msg').html(data.error);
                        $('.div_c_error').show();
                    } else {
                        window.location.href = '<?php echo base_url(); ?>admin/resumes'
                    }
                }
            });
        }
    });
</script>
