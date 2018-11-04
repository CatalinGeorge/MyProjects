<?php echo form_open_multipart('edit_network/save_edit_network'); ?>


<div class="row">

<div class="col-md-4 col-md-offset-4 box-shadow2 ptb40 round-small mt50">

  <h4 class="m0 center pb30">Edit your network info</h4>

  <div class="row plr20">
    <div class="col-md-4">
      <label class="ptb5 fw100">Network user name</label>
    </div>
    <div class="col-md-8 round-small no-focus border-gray2">
      <input type="input" name="net_name_user" class="ptb5 font-12 no-border full-width" value="<?php echo $edit['net_name_user'] ?>" />
    </div>
  </div><br>

  <div class="row plr20">
    <div class="col-md-4">
    <label class="ptb5 fw100">Network url</label>
  </div>
  <div class="col-md-8 round-small no-focus border-gray2">
    <input type="input" name="net_url" class="ptb5 font-12 no-border full-width" value="<?php echo $edit['net_url'] ?>" />
    </div>
  </div><br>


  <div class="row plr20">
    <div class="col-md-4 pr0">
    <label class="ptb5 fw100"></label>
  </div>
  <input type="hidden" name="net_id" value="<?php echo $edit['net_id']; ?>" /><br />
  <div class="col-md-8 p0">
    <div class="">
      <input  name="submit" type="submit" value="Update info" class="mtb5 up font-12 fw600 round mr10 outline-button-orange single-link-ow">
    </div>
  </div>
  </div>
  </form>
</div>

</div>
