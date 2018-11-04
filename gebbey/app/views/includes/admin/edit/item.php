<a class="v-center p10" href="<?php echo $this->agent->referrer(); ?>"><i class="material-icons">keyboard_arrow_left</i> Back</a>
<?php echo form_open('admin/save_edititem'); ?>

  <div class="add_form card row">

      <div class="col-md-6 pt15">
        <label>Name</label>
      </div>

      <div class="col-md-6">
        <input type="text" name="i_name" value="<?php echo $item['i_name'] ?>" />
      </div>

    </div>

    <div class="add_form card row">

        <div class="col-md-6 pt15">
          <label>Price</label>
        </div>

        <div class="col-md-6">
          <input type="text" name="i_price" value="<?php echo $item['i_price'] ?>" />
        </div>

      </div>

      <div class="add_form card row">

          <div class="col-md-6 pt15">
            <label>Description</label>
          </div>

          <div class="col-md-6">
            <input type="text" name="i_description" value="<?php echo $item['i_description'] ?>" />
          </div>

        </div>

        <div class="add_form card row">

            <div class="col-md-6 pt15">
              <label>Phone</label>
            </div>

            <div class="col-md-6">
              <input type="text" name="i_phone" value="<?php echo $item['i_phone'] ?>" />
            </div>

          </div>

          <div class="add_form card row">

              <div class="col-md-6 pt15">
                <label>Email</label>
              </div>

              <div class="col-md-6">
                <input type="text" name="i_email" value="<?php echo $item['i_email'] ?>" />
              </div>

            </div>

            <div class="add_form card row">

                <div class="col-md-6 pt15">
                  <label>Address</label>
                </div>

                <div class="col-md-6">
                  <input type="text" name="i_address" value="<?php echo $item['i_address'] ?>" />
                </div>

              </div>

    <input type="hidden" name="i_id" value="<?php echo $item['i_id'] ?>" />

  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <div class="add_form card submit-btn bg-blue">
        <input type="submit" name="submit" value="Update item" />
      </div>
    </div>
  </div>
</form>
