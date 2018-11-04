<div class="container">
  <div class="col-md-9">
    <?php echo validation_errors(); ?>
    <?php echo form_open_multipart('user_profile/save_edit_product'); ?>
  <div class="row">
    <h4 class="p-t-b-10 center text-gray m-t-50">Edit your product</h4>
    <div class="col-md-6 p-t-b-30 p-l-r-50 border-right2">
      <select name="categories" class="p-t-b-10 border full-width p-l-r-10 text-gray m-t-b-10">
        <?php foreach ($categories as $cat): ?>
		    <option
        <?php   if($cat['cat_id'] == $product['pr_category'])
               { ?>
                selected
                  <?php    }  ?>
        value="<?php echo $cat["cat_id"]; ?>"><?php echo $cat["cat_name"] ?> </option>
        <?php endforeach; ?>
      </select>
      <input type="text" value="<?php echo $product['pr_name']; ?>" name="name" placeholder="Product Name..." class="border p-t-b-10 p-l-r-20 m-t-b-10 full-width"/>
      <input type="text" value="<?php echo $product['pr_price']; ?>" name="price" placeholder="Price..." class="border p-t-b-10 p-l-r-20 m-t-b-10 full-width"/>
      <input type="text" value="<?php echo $product['pr_description']; ?>" name="description" placeholder="Description..." class="border p-t-10 p-b-50 p-l-r-20 m-t-b-10 full-width no-resize"/>
      <input type="hidden" name="pr_id" value="<?php echo $product['pr_id']; ?>" /><br />
      <input type="hidden" id="count_images" name="count_images">
      <p class="text-gray m-t-10 p-l-5">Add picture:</p>
<div class="inline v-center" id="imagezone">
      <div class="relative">
          <div class="bg-light2 inline mlr10" id="photo-bg1">
        <input type="file" name="image1" id="image1" accept="image/*" class="p-t-b-20 absolute top-0 elem-small op-0 input image">
        <img src="https://png.icons8.com/ios/50/8389af/compact-camera.png" class="bg-white">
      </div>
      </div>
    </div>


    <style>
          .input-image {
            width: 50px;
            height: 50px;
            position: absolute;
            opacity: 0;
          }
        </style>
     </div>

     <div class="row">
       <div id="image-preview"></div>
     </div>

     <script>
     $(document).ready(function(){
       var x = 1;
       function kktt() {
         $('#image'+x).change(function() {

           if (this.files && this.files[0]) {
             var reader = new FileReader();
             reader.onload = function(e) {
               $('#image-preview').append('<div class="col-md-2" id="image-preview'+x+'"><img src="'+e.target.result+'" width="100%" onclick="remove_image('+x+')"></div>');
             }
             reader.readAsDataURL(this.files[0]);
           }

           x = x + 1;
           $('#imagezone').append('<div class="bg-light2 inline mlr10" id="photo-bg'+x+'"><input type="file" name="image'+x+'" id="image'+x+'" class="input-image"><img src="https://png.icons8.com/ios/40/8389af/plus-math.png"></div>');

           $(this).parent().hide();

           $('#count_images').val(x);

           kktt();
         })
       }
       kktt();

     });

     function remove_image(x) {
       var z = x-1;
       $('#image-preview'+x).hide();
       $('#photo-bg'+z).remove();
     }
     </script>





    <?php
             //load directory helper
            $dir = 'media/'.$product["pr_media"].'/'; // Your Path to folder
            $map = directory_map($dir); /* This function reads the directory path specified in the first parameter and builds an array representation of it and all its contained files. */

            foreach ($map as $k)
            {?>
                <!-- Slides -->
                <a href='<?php echo base_url(); ?>/user_profile/remove_image/<?php echo $product['pr_media'] ?>/<?php echo $k; ?>'>
                <div class="swiper-slide" style="background:url(<?php echo base_url($dir)."/".$k;?>) no-repeat center center; height:270px;" class="cover">
                </div></a>

            <?php }   ?>




















    <div class="col-md-6 p-t-b-30 p-l-r-50">
      <select name="display_size" class="p-t-b-10 border full-width p-l-r-10 text-gray m-t-b-10">
        <?php foreach ($display_size as $ds): ?>
        <option
        <?php   if($ds['ds_name'] == $product['pr_display_size'])
               { ?>
                selected
                  <?php    }  ?>
        value="<?php echo $ds["ds_name"]; ?>"><?php echo $ds["ds_name"]; ?> </option>
        <?php endforeach; ?>
      </select>
      <select name="proc_type" class="p-t-b-10 border full-width p-l-r-10 text-gray m-t-b-10">
        <?php foreach ($proc_type as $pt): ?>
        <option
        <?php   if($pt['pt_name'] == $product['pr_proc_type'])
               { ?>
                selected
                  <?php    }  ?>
        value="<?php echo $pt["pt_name"]; ?>"><?php echo $pt["pt_name"]; ?> </option>
        <?php endforeach; ?>
      </select>
      <select name="ram_size" class="p-t-b-10 border full-width p-l-r-10 text-gray m-t-b-10">
        <?php foreach ($ram_size as $rs): ?>
        <option
        <?php   if($rs['rs_name'] == $product['pr_ram_size'])
               { ?>
                selected
                  <?php    }  ?>
        value="<?php echo $rs["rs_name"]; ?>"><?php echo $rs["rs_name"]; ?> </option>
        <?php endforeach; ?>
      </select>
      <select name="hd_size" class="p-t-b-10 border full-width p-l-r-10 text-gray m-t-b-10">
        <?php foreach ($hd_size as $hds): ?>
        <option
        <?php   if($hds['hds_name'] == $product['pr_hd_size'])
               { ?>
                selected
                  <?php    }  ?>
        value="<?php echo $hds["hds_name"]; ?>"><?php echo $hds["hds_name"]; ?> </option>
        <?php endforeach; ?>
      </select>
      <select name="weight" class="p-t-b-10 border full-width p-l-r-10 text-gray m-t-b-10">
        <?php foreach ($weight as $we): ?>
        <option
        <?php   if($we['we_name'] == $product['pr_weight'])
               { ?>
                selected
                  <?php    }  ?>
        value="<?php echo $we["we_name"]; ?>"><?php echo $we["we_name"]; ?> </option>
        <?php endforeach; ?>
      </select>
      <select name="display_type" class="p-t-b-10 border full-width p-l-r-10 text-gray m-t-b-10">
        <?php foreach ($display_type as $dist): ?>
        <option
        <?php   if($dist['dt_name'] == $product['pr_display_type'])
               { ?>
                selected
                  <?php    }  ?>
        value="<?php echo $dist["dt_name"]; ?>"><?php echo $dist["dt_name"]; ?> </option>
        <?php endforeach; ?>
      </select>
      <select name="os" class="p-t-b-10 border full-width p-l-r-10 text-gray m-t-b-10">
        <?php foreach ($os as $o): ?>
        <option
        <?php   if($o['os_name'] == $product['pr_os'])
               { ?>
                selected
                  <?php    }  ?>
         value="<?php echo $o["os_name"]; ?>"><?php echo $o["os_name"]; ?> </option>
        <?php endforeach; ?>
      </select>
      <select name="baterry_life" class="p-t-b-10 border full-width p-l-r-10 text-gray m-t-b-10">
        <?php foreach ($baterry_life as $bat_life): ?>
        <option
        <?php   if($bat_life['bl_name'] == $product['pr_baterry_life'])
               { ?>
                selected
                  <?php    }  ?>
        value="<?php echo $bat_life["bl_name"]; ?>"><?php echo $bat_life["bl_name"]; ?> </option>
        <?php endforeach; ?>
      </select>
    </div>
  </div>

  <div class="center m-t-b-50 relative">
    <div><input type="submit" value="Save" class="btn-outline-b"></div>
  </div>
</form>

</div>
