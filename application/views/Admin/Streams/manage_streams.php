<div class="row">
    <div class="col-md-6">
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
                        <label class="col-sm-3 control-label">Stream Name:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="stream_name" id="stream_name" required="required">
                            <input type="hidden" name="record_id" id="record_id">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Course:</label>
                        <div class="col-sm-9">
                            <select class="select" name="course_id" id="course_id" title="Select Course">
                            <?php
                                foreach ($courses as $course) {
                            ?>
                                <option value="<?php echo $course['id']; ?>"><?php echo $course['course_name']; ?></option>
                            <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Type:</label>
                        <div class="col-sm-9">
                            <label class="radio-inline">
                                <input type="radio" class="styled stream_type" name="is_yearly" id="yearly" value="1"> Yearly
                            </label>

                            <label class="radio-inline">
                                <input type="radio" class="styled stream_type" name="is_yearly" id="Semesters" value="0"> Semesters
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Duration:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="duration" id="duration" required="required">
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

    <div class="col-md-6">
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title"><?php echo $record_type . ' List'; ?></h5>
                <div class="heading-elements">
                    <ul class="icons-list">
                        <li><a data-action="collapse"></a></li>
                    </ul>
                </div>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover datatable-basic">
                        <thead>
                            <tr class="bg-teal">
                                <th>#</th>
                                <th><?php echo $record_type . ' Name'; ?></th>
                                <th>Course Name</th>
                                <th>Type</th>
                                <th>Duration</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($records as $key => $record) {
                                ?>
                                <tr>
                                    <td><?php echo $key + 1; ?></td>
                                    <td><?php echo $record['stream_name']; ?></td>
                                    <td><?php echo $record['course_name']; ?></td>
                                    <td><?php echo ($record['is_yearly']) ? 'Yearly' : 'Semester'; ?></td>
                                    <td><?php echo $record['duration']; ?></td>
                                    <td>
                                        <ul class="icons-list">
                                            <li class="text-teal-600">
                                                <a id="edit_<?php echo base64_encode($record['id']); ?>" class="edit"><i class="icon-pencil7"></i></a>
                                            </li>
                                            <li class="text-danger-600">
                                                <a id="delete_<?php echo base64_encode($record['id']); ?>" class="delete"><i class="icon-trash"></i></a>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
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
            data:{id:id, type: 'streams' },
            success: function (data) {
                if (data.status == 1) {
                    var record = data.record[0];
//                     console.clear();
                    $('#stream_name').val(record.stream_name);
                    $('#duration').val(record.duration);
                    var is_yearly = $('input.stream_type[value='+ record.is_yearly +']');
                    $('stream_type').parent().removeClass('checked');
                    is_yearly.prop('checked',true);
                    is_yearly.parent().addClass('checked');
                    $('.select').selectpicker('val', record.course_id);
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
                data:{id:id, type: 'streams' },
                success: function (data) {
                    if (data.status == 1) {
                        location.reload();
                    }
                }
            });
        }
    });
</script>