

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add another platform</h4>
      </div>
      <div class="modal-body">
        <?php echo form_open('admin/add_platform'); ?>
<input class="form-control" type="text" name="name" placeholder="Platform name"><br>
<input class="form-control" type="text" name="slug" placeholder="Platform slug">
<p class="font-10">Platform name simplified, without any weird characters or empty spaces.</p><br>
<input class="form-control" type="text" name="icon" placeholder="Platform icon"><br>
<input type="submit" class="up font-12 fw600 round mr10 outline-button-blue single-link-bw bg-white" value="Add">
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<div class="center p30">
<h4 class="ptb30">Social networks</h4>
<div class="row pb30">
  <button type="button" class="up font-12 fw600 round bg-white mr10 outline-button-blue single-link-bw" data-toggle="modal" data-target="#myModal">Add platform</button>
</div>
<?php foreach($platforms as $platform): ?>
  <div class="col-md-3 text-left ptb10 hoverdeletebtn">
    <img src="<?php echo $platform['icon']; ?>" height="20">
    <?php echo $platform['name']; ?>
    <a href="<?php echo base_url(); ?>admin/delete_platform/<?php echo $platform['id']; ?>" class="float-right pr30 deletebtn">
      <img src="https://png.icons8.com/dusk/20/000000/trash.png">
    </a>
  </div>
<?php endforeach; ?>
</div>

<style>
.deletebtn {
  opacity: 0;
  -webkit-transition: all .3s ease;
-moz-transition: all .3s ease;
-ms-transition: all .3s ease;
-o-transition: all .3s ease;
transition: all .3s ease;
}
.hoverdeletebtn:hover .deletebtn {
  opacity: 1;
}
.hoverdeletebtn:hover {
  background: #fafafa;
}
</style>
