<div class="row">
    <div class="col-xs-12">
        <form method="POST" class="form-horizontal form-validate manage_record" id="manage_record" name="manage_record">
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h5 class="panel-title"><?php echo 'Manage ' . $record_type; ?></h5>
                    <div class="heading-elements">
                        <ul class="icons-list">
                            <li><a data-action="collapse"></a></li>
                        </ul>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Book Name</label>
                        <div class="col-md-5">
                            <input type="text" tabindex="1" class="form-control" name="book_name" id="book_name" required="required">
                            <input type="hidden" name="record_id" id="record_id">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Author</label>
                        <div class="col-md-5">
                            <select tabindex="2" class="select" name="author_id" id="author_id" title="Select Author">
                            <?php
                                foreach ($authors as $author) {
                            ?>
                                <option value="<?php echo $author['id']; ?>"><?php echo $author['author_name']; ?></option>
                            <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Publication</label>
                        <div class="col-md-5">
                            <select class="select" name="publication_id" id="publication_id" title="Select Author">
                            <?php
                                foreach ($publications as $publication) {
                            ?>
                                <option value="<?php echo $publication['id']; ?>"><?php echo $publication['publication_name']; ?></option>
                            <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Subject</label>
                        <div class="col-md-5">
                            <select class="select" name="subjects[]" id="subjects" title="Select Subject(s)" multiple="">
                            <?php
                                foreach ($subjects as $id => $subject) {
                            ?>
                                <option value="<?php echo $id; ?>"><?php echo $subject; ?></option>
                            <?php } ?>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Description</label>
                        <div class="col-md-5">
                            <textarea class="form-control" name="description" id="description" required="required"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">M.R.P</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="mrp" id="mrp" required="required">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Sell Price</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="sell_price" id="sell_price" required="required">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Cover Image</label>
                        <div class="col-md-5">
                            <input type="file" class="upload_photo" id="p_photo" name="p_photo">
                        </div>
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn bg-teal">
                            <?php echo 'Save ' . $record_type; ?> <i class="icon-arrow-right14 position-right"></i>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript">
    var base_url = '<?php echo base_url(); ?>admin/';

    $(document).on('click', '.edit', function () {
        var id = $(this).attr('id').replace('edit_', '');
        var url = base_url + 'get_detail';
        $.ajax({
            type: 'POST',
            url: url,
            async: false,
            dataType: 'JSON',
            data: {id: id, type: 'books' },
            success: function (data) {
                if (data.status == 1) {
                    var record = data.record[0];
//                     console.clear();
                    $('#book_name').val(record.book_name);
                    $('#duration').val(record.duration);
                    var is_yearly = $('input.book_type[value='+ record.is_yearly +']');
                    $('book_type').parent().removeClass('checked');
                    is_yearly.prop('checked',true);
                    is_yearly.parent().addClass('checked');
                    $('.select').selectpicker('val', record.author_id);
                    $('#record_id').val(record.id);
                }
            }
        });
    });

    $(document).on('click', '.delete', function () {
        var r = confirm("Do you really wish to delete this record?");
        if (r == true) {
            var id = $(this).attr('id').replace('delete_', '');
            var url = base_url + 'delete_detail';
            $.ajax({
                type: 'POST',
                url: url,
                async: false,
                dataType: 'JSON',
                data:{id: id, type: 'books' },
                success: function (data) {
                    if (data.status == 1) {
                        location.reload();
                    }
                }
            });
        }
    });
</script>