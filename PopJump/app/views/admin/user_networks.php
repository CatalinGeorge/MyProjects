<?php    if(!empty($user_networks)){ ?>
<ul>
<?php foreach($user_networks as $un): ?>
  <li><?php echo $un['net_name']; ?>
    <a href="<?php echo base_url(); ?>admin/edit_network/<?php echo $un['net_id']; ?>">Edit</a>
  <a href="<?php echo base_url(); ?>admin/delete_network/<?php echo $un['net_id']; ?>">Delete</a>
<?php endforeach; ?>
</ul>
<?php }else{ ?>
  <?php   echo "No networks";
} ?>
