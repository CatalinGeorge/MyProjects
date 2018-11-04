  <div class="row">

    <div class="col-md-10 p-l-0">
      <h3 class="m-t-0"><?php echo $product['pr_name']; ?></h3>
    </div>
    <div class="col-md-2">
      <span class="fw-600 text-blue float-right fs-24">$<?php echo number_format($product['pr_price'], 2, '.', ','); ?></span>
    </div>
  </div>

    <p class="text-gray lh-30 m-t-b-20"><?php echo $product['pr_description']; ?></p>

    <div class="col-md-6 p-0">
      <button type="button" class="btn-actions">
        Read more
      </button>
    </div>

<div class="col-md-6 p-0 text-right">
  <button type="button" class="btn-actions bg-blue text-white">
    <?php  if($user){
        $this->db->from('favorite_products');
        $this->db->where('fp_product',$product['pr_id']);
        $this->db->where('fp_user',$user['us_id']);
        $query = $this->db->get();
              if($query->num_rows()==0)
              {  ?>
<a href="<?php echo base_url(); ?>single/add_favorite/<?php echo $product['pr_id']; ?>/<?php echo $product['pr_user']; ?>">
Save</a>
</button>
<?php }
      }else { ?>
        <button type="button" class="btn-actions bg-blue text-white">
      <a href="<?php echo base_url(); ?>single/remove_favorite/<?php echo $product['pr_id']; ?>/<?php echo $product['pr_user']; ?>">  Unsave</a>
          <?php } ?>
</button>
</div>
