  <div class="tab-content">
    <div id="details" class="tab-pane fade in active col-md-4 col-md-offset-4 m-t-20">
        <div class="row border-bottom">
          <div class="col-md-12 text-gray p-10 center fw-600">Hardware Specifications of <?php echo $product['pr_name']; ?></div>
        </div>

        <div class="row border-bottom">
          <div class="col-md-3 p-0">
            <p class="m-0 p-10 text-gray fw-600">Processor</p>
          </div>
          <div class="col-md-9 p-0 border-left">
            <p class="m-0 p-10 text-gray"><?php echo $product['pr_proc_type']; ?></p>
          </div>
        </div>

        <div class="row border-bottom">
          <div class="col-md-3 p-0">
            <p class="m-0 p-10 text-gray fw-600">RAM</p>
          </div>
          <div class="col-md-9 p-0 border-left">
            <p class="m-0 p-10 text-gray"><?php echo $product['pr_ram_size']; ?></p>
          </div>
        </div>

        <div class="row border-bottom">
          <div class="col-md-3 p-0">
            <p class="m-0 p-10 text-gray fw-600">Storage</p>
          </div>
          <div class="col-md-9 p-0 border-left">
            <p class="m-0 p-10 text-gray"><?php echo $product['pr_hd_size']; ?></p>
          </div>
        </div>

        <div class="row border-bottom">
          <div class="col-md-3 p-0">
            <p class="m-0 p-10 text-gray fw-600">Graphics</p>
          </div>
          <div class="col-md-9 p-0 border-left">
            <p class="m-0 p-10 text-gray">1TB HDD</p>
          </div>
        </div>

        <div class="row border-bottom">
          <div class="col-md-3 p-0">
            <p class="m-0 p-10 text-gray fw-600">Display type</p>
          </div>
          <div class="col-md-9 p-0 border-left">
            <p class="m-0 p-10 text-gray"><?php echo $product['pr_display_type']; ?></p>
          </div>
        </div>

        <div class="row border-bottom">
          <div class="col-md-3 p-0">
            <p class="m-0 p-10 text-gray fw-600">Display size</p>
          </div>
          <div class="col-md-9 p-0 border-left">
            <p class="m-0 p-10 text-gray"><?php echo $product['pr_display_size']; ?></p>
          </div>
        </div>

        <div class="row border-bottom">
          <div class="col-md-3 p-0">
            <p class="m-0 p-10 text-gray fw-600">Operating System</p>
          </div>
          <div class="col-md-9 p-0 border-left">
            <p class="m-0 p-10 text-gray"><?php echo $product['pr_os']; ?></p>
          </div>
        </div>

        <div class="row border-bottom">
          <div class="col-md-3 p-0">
            <p class="m-0 p-10 text-gray fw-600">Battery Life</p>
          </div>
          <div class="col-md-9 p-0 border-left">
            <p class="m-0 p-10 text-gray"><?php echo $product['pr_baterry_life']; ?></p>
          </div>
        </div>

        <div class="row">
          <div class="col-md-3 p-0">
            <p class="m-0 p-10 text-gray fw-600">Weight</p>
          </div>
          <div class="col-md-9 p-0 border-left">
            <p class="m-0 p-10 text-gray"><?php echo $product['pr_weight']; ?></p>
          </div>
        </div>
    </div>

    <div id="comments" class="tab-pane fade col-md-4 col-md-offset-4 m-t-20">
        <!--Comments -->
        <div class="border-gray round-small m-t-20">
          <?php echo form_open('single/create_comment'); ?>
        <div class="row p-b-10">
          <div class="col-md-10 p-0">
            <div class="form-elem-com">
              <input type="text" name="comment" placeholder="Leave your comment here..." class="full-width p-t-b-5 p-l-r-10">
              <input type="hidden" name="product_id" value="<?php echo $product_id; ?>" />
              <input type="hidden" name="co_product_user" value="<?php echo $product['pr_user']; ?>">
            </div>
          </div>
          <div class="col-md-2 border-top2 border-bottom2 border-right2 p-0">
            <div class="p-l-10 bg-light">
             <input type="submit" style="position:absolute;width:40px;height:40px;opacity:0;"><img src="<?php echo base_url(); ?>assets/img/icons/long-arrow-right-filled.png" class="inline p-10 border-gray">
            </div>
          </div>
        </div>
      </form>
      <?php if(!empty($comments)){ ?>
      <?php foreach($comments as $comment): ?>
          <div class="row p-t-20">
            <div class="col-md-1">
            <a href="<?php echo base_url(); ?>profile/provider_profile/<?php echo $comment['co_poster'];  ?>" > <img src="<?php echo base_url(); ?>media/profile/<?php echo $product['us_id']; ?>/<?php echo $product['us_avatar']; ?>" width="50" class="round">
            </div></a>
            <div class="col-md-11">
              <div class="p-l-r-10">
                <h5 class="fw-700 m-t-0"><?php echo $comment['us_username']; ?>, <span class="fw-500 text-gray"><?php echo $comment['co_date']; ?></span> <span class="float-right text-gray fw-300 fs-12">&nbsp; <img src="<?php echo base_url(); ?>assets/img/icons/right2-filled.png" class="m-l-r-10"></span></h5>
                <p class="lh-20 text-gray"><?php echo $comment['co_comment']; ?> </p>
              </div>
            </div>
          </div>
          <hr>
        <?php endforeach; ?>
      <?php }else{ ?>
      <?php  } ?>
        </div>
    </div>

    <div id="trade" class="tab-pane fade col-md-4 col-md-offset-4 m-t-20">
      <?php echo form_open('single/send_product_offer'); ?>
      <div class="form-elem mb20">
            <select class="p10" name="product">

                   <?php foreach ($products as $prd): ?>
                       <option value="<?php echo $prd["pr_id"]; ?>"><?php echo $prd["pr_name"] ?> </option>
                     <?php endforeach; ?>
           </select>
         </div>


      <div class="row v-center">
        <div class="col-md-3 p-0">
          <div class="btn-group no-round">
            <input type="hidden" value="<?php echo $product['pr_user']; ?>" name="po_to" >
            <input type="hidden" value="<?php echo $product['pr_id']; ?>" name="prd" >
            <input name="val_type" value="0" type="radio" ><span class="p-l-r-5">+</span><br>
            <input name="val_type" type="radio" value="1" ><span class="p-l-r-5">-</span>
          </div>
        </div>
        <div class="col-md-9 p-0">
          <input type="text" name="value" placeholder="$" class="border full-width m-t-b-20 p-l-r-20 p-t-b-10">
        </div>
      </div>
      <input type="submit" value="ok" class="btn p-10 bg-light2 up" >
    </form>
    </div>

    <div id="offer" class="tab-pane fade col-md-4 col-md-offset-4 m-t-20">
      <?php echo form_open('single/send_offer'); ?>
      <input type="hidden" value="<?php echo $product['pr_id'] ?>" name="prd" >
      <input type="hidden" value="<?php echo $product['pr_user'] ?>" name="to" >
      <input type="text" name="value" placeholder="$$$" class="border full-width p-l-20 p-t-b-10"/>
      <input type="submit" value="ok" class="btn p-10 bg-light2 up" >
    </form>
    </div>

    <div id="message" class="tab-pane fade col-md-4 col-md-offset-4 m-t-20">
      <?php echo form_open('single/send_message'); ?>
      <textarea rows="7" name="message" placeholder="Leave a message..." class="border no-resize full-width p-20"></textarea>
      <input type="hidden" value="<?php echo $product['pr_user']; ?>" name="to" >
        <input type="hidden" value="<?php echo $product['pr_id'] ?>" name="prd" >
        <input type="submit" value="ok" class="btn p-10 bg-light2 up" >
      </form>
    </div>
  </div>
