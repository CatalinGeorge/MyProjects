<!--div class="add_form card">
  <input type="text" name="search" placeholder="Search comments by comment..." class="mtb10">
</div-->

<?php foreach ($comments as $comment): ?>
  <div class="row admin_row">
    <div class="col-md-9">
      <?php echo $comment['co_comment']; ?>
    </div>
    <div class="col-md-3 right">
      <a class="plr10" href="<?php echo base_url(); ?>admin/edititem/<?php echo $comment['co_listing']; ?>"><i class="material-icons">list</i></a>
      <a class="plr10" href="<?php echo base_url(); ?>admin/edituser/<?php echo $comment['co_user']; ?>"><i class="material-icons">supervisor_account</i></a>
      <a class="plr10" href="<?php echo base_url(); ?>admin/editcomment/<?php echo $comment['co_id']; ?>"><i class="material-icons">edit</i></a>
      <a class="plr10" href="<?php echo base_url(); ?>admin/deletecomment/<?php echo $comment['co_id']; ?>"><i class="material-icons">delete</i></a>
    </div>
  </div>
<?php endforeach; ?>
