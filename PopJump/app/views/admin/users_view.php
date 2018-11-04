<div class="p30">
<?php echo form_open('admin/search_users'); ?>
<div class="col-md-10">
  <input class="form-control" type="text" name="search_query" placeholder="Search user">
</div>
<div class="col-md-2">
  <input class="up font-12 fw600 round bg-white mr10 outline-button-blue single-link-bw" type="submit"  value="Search">
</div>



</form>
</div>


<div class="container">

  <table class="table">
    <thead>
      <tr>
        <th>#</th>
        <th>Name</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>

<?php foreach($users as $us): ?>
<tr>
<td><?php echo $us['us_id']; ?></td>
<td class="fw700"><?php echo $us['us_first']; ?></td>

<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});
</script>

<td><a href="<?php echo base_url(); ?>admin/edit_user/<?php echo $us['us_id']; ?>"><img src="https://png.icons8.com/cotton/30/000000/edit-property.png" title="edit" class="pr20" data-toggle="tooltip"></a>

<a href="<?php echo base_url(); ?>admin/user_networks/<?php echo $us['us_id']; ?>"><img src="https://png.icons8.com/cotton/30/000000/share.png" title="user networks" class="pr20" data-toggle="tooltip"></a>
<a href="<?php echo base_url(); ?>admin/add_network_details/<?php echo $us['us_id']; ?>"><img src="https://png.icons8.com/cotton/30/000000/plus.png" title="add network" class="pr20" data-toggle="tooltip"></a>
<?php if($us['us_set_pop'] === '0'){ ?>
<a href="<?php echo base_url(); ?>admin/set_popularity/<?php echo $us['us_id']; ?>"><img src="https://png.icons8.com/cotton/30/000000/star.png" title="set popular" class="pr20" data-toggle="tooltip"></a>
<?php }else { ?>
<a href="<?php echo base_url(); ?>admin/unset_popularity/<?php echo $us['us_id']; ?>"><img src="https://png.icons8.com/cotton/30/000000/filled-star.png" title="unset popular" class="pr20" data-toggle="tooltip"></a>
<?php  } ?>
<?php if($us['us_set_block'] === '0'){ ?>
<a href="<?php echo base_url(); ?>admin/block/<?php echo $us['us_id']; ?>"><img src="https://png.icons8.com/cotton/30/000000/cancel.png" title="block user" class="pr20" data-toggle="tooltip"></a>
<?php }else { ?>
<a href="<?php echo base_url(); ?>admin/unblock/<?php echo $us['us_id']; ?>"><img src="https://png.icons8.com/cotton/30/000000/checkmark.png" title="unblock user" class="pr20" data-toggle="tooltip"></a>

<a href="<?php echo base_url(); ?>admin/delete_user/<?php echo $us['us_id']; ?>"><img src="https://png.icons8.com/cotton/30/000000/trash.png" title="delete" class="pr20" data-toggle="tooltip"></a>



<?php  } ?>

<?php if($us['us_set_pop'] == '1') { ?>
  <input value="<?php echo $us['us_set_order']; ?>" type="number" onchange="setOrder(this, <?php echo $us['us_id']; ?>)">
<?php } ?>

</td>
</tr>
<?php endforeach; ?>
</tbody>
</table>
</div>
</div>

<script>
function setOrder(order, user) {
  console.log(order.value);
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     console.log(this.responseText);
    }
  };
  xhttp.open("GET", "<?php echo base_url(); ?>admin/save_set_order/"+user+"/"+order.value, true);
  xhttp.send();
}
</script>
