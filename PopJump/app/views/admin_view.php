<?php echo form_open_multipart('admin/login_admin'); ?>


<div class="row">

<div class="col-md-4 col-md-offset-4 box-shadow2 ptb40 round-small mt50">

  <h4 class="m0 center pb30">Admin login </h4>

  <div class="row plr20">
    <div class="col-md-4">
      <label class="ptb5 fw100">Email</label>
    </div>
    <div class="col-md-8 round-small no-focus border-gray2">
      <input type="input" name="email" class="ptb5 font-12 no-border full-width" />
    </div>
  </div><br>

  <div class="row plr20">
    <div class="col-md-4">
    <label class="ptb5 fw100">Password</label>
  </div>
  <div class="col-md-8 round-small no-focus border-gray2">
    <input type="password" name="pass" class="ptb5 font-12 no-border full-width" />
    </div>
  </div><br>


  <div class="row plr20">
    <div class="col-md-4 pr0">
    <label class="ptb5 fw100"></label>
  </div>

  <div class="col-md-8 p0">
    <div class="">
      <input   type="submit" value="Admin login" class="mtb5 up font-12 fw600 round mr10 outline-button-orange single-link-ow">
    </div>
  </div>
  </div>
  </form>
</div>

</div>
