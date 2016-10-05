<?php 
    if (count($streams) > 0){
        foreach ($streams as $stream) {
?>
<option value="<?php echo $stream['id'] ?>" data-duration = "<?php echo $stream['duration'] ?>"><?php echo $stream['stream_name'] ?></option>
<?php
        }
    }
?>