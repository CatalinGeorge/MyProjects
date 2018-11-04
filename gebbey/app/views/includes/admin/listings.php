<!--Add form-->
<!--div class="add-form-item add-form p20 m20">

  <div class="add-form-item">
  <?php echo validation_errors(); ?>
  <?php echo form_open_multipart('home/create'); ?>

<label>Select category</label>
  <div class="add_form card">
    <div class="row m0">
      <select name="category" ng-model="categ">
      <?php foreach ($categories as $category): ?>
        <option value="<?php echo $category['c_id']; ?>"><?php echo $category['c_name']; ?></option>
      <?php endforeach; ?>
    </select>
  </div>
  </div>

    <div class="">

      <label>Details</label>

      <div class="bg-light-more plr20 pb30">

        <div class="add_form card row m0">
          <input type="text" name="name" placeholder="Title...">
        </div>

        <div class="add_form card row m0">
          <textarea name="description" rows="5" placeholder="Description...."></textarea>
        </div>

<div ng-if="categ != 2">
        <?php // Jobs category special fields
          //if ($category['c_id'] != 2) {
        ?>
        <div class="add_form card row m0">
            <input type="text" name="price" placeholder="Price ($)">
        </div>
      <?php //} ?>
</div>

<h4 class="pt20">Location</h4>
        <div class="row m0">
          <div class="add_form card col-md-4">
            <select name="country">
              <option selected disabled>Select country</option>
            <?php foreach ($countries as $country): ?>
              <option value="<?php echo $country['country_id']; ?>"><?php echo $country['country_name']; ?></option>
            <?php endforeach; ?>
          </select>
          </div>
          <div class="add_form card col-md-4">
            <select name="state">
              <option selected disabled>Select country first</option>
            <?php foreach ($states as $state): ?>
              <option value="<?php echo $state['state_id']; ?>"><?php echo $state['state_name']; ?></option>
            <?php endforeach; ?>
          </select>
          </div>
          <div class="add_form card col-md-4">
            <select name="city">
              <option selected disabled>Select state first</option>
            <?php foreach ($cities as $city): ?>
              <option value="<?php echo $city['city_id']; ?>"><?php echo $city['city_name']; ?></option>
            <?php endforeach; ?>
          </select>
          </div>
        </div>

        <div class="add_form card">
          <textarea name="address" rows="2" placeholder="Address...."></textarea>
        </div>

<h4 class="pt20">Contact</h4>
        <div class="row m0">
          <div class="add_form card col-md-6">
              <input type="text" name="phone" placeholder="Phone">
          </div>
          <div class="add_form card col-md-6">
              <input type="text" name="email" placeholder="Email">
          </div>
        </div>

<div ng-if="categ == 1">
            <?php // Real estate category special fields
              //if ($category['c_id'] == 1) {
            ?>
            <h4 class="pt20">Other details</h4>
            <div class="row m0">
                <div class="add_form card col-md-6">
                  <select name="type">
                    <option selected disabled>Select type</option>
                    <option value="condo">Condo</option>
                    <option value="land">Land</option>
                    <option value="villa">Villa</option>
                  </select>
                </div>
                <div class="add_form card col-md-6">
                  <select name="rentsale">
                    <option selected disabled>Select status</option>
                    <option value="rent">Rent</option>
                    <option value="sale">Sale</option>
                  </select>
                </div>
              </div>
            <?php
              //}
            ?>
          </div>

<div ng-if="categ == 2">
            <?php // Jobs category special fields
              //if ($category['c_id'] == 2) {
            ?>
            <h4 class="pt20">Other details</h4>
            <div class="row m0">
                <div class="add_form card col-md-8">
                    <input type="text" name="company" placeholder="Company">
                </div>
                <div class="add_form card col-md-4">
                    <input type="text" name="price" placeholder="Salary ($)">
                </div>
              </div>
              <div class="row m0">
                <div class="add_form card col-md-6">
                    <input type="text" name="job_title" placeholder="Job title">
                </div>
                <div class="add_form card col-md-6">
                    <input type="text" name="qualification" placeholder="Qualification">
                </div>
              </div>
              <div class="row m0">
                  <div class="add_form card col-md-12">
                      <input type="text" name="deadline" placeholder="Application deadline">
                  </div>
                </div>
            <?php
              //}
            ?>
          </div>

<div ng-if="categ == 5">
            <?php // Automobile category special fields
              //if ($category['c_id'] == 5) {
            ?>
            <h4 class="pt20">Other details</h4>
            <div class="row m0">
              <div class="add_form card col-md-6">
                <select name="make">
                  <option selected disabled>Select make</option>
                <?php foreach ($makes as $make): ?>
                  <option value="<?php echo $make['make_id']; ?>"><?php echo $make['make_name']; ?></option>
                <?php endforeach; ?>
              </select>
              </div>
              <div class="add_form card col-md-6">
                <select name="model">
                  <option selected disabled>Select make first</option>
                <?php foreach ($models as $model): ?>
                  <option value="<?php echo $model['model_id']; ?>"><?php echo $model['model_name']; ?></option>
                <?php endforeach; ?>
              </select>
              </div>
            </div>
            <div class="row m0">
              <div class="add_form card col-md-4">
                  <input type="text" name="mileage" placeholder="Mileage">
              </div>
              <div class="add_form card col-md-4">
                  <input type="text" name="color" placeholder="Color">
              </div>
              <div class="add_form card col-md-4">
                  <input type="text" name="body" placeholder="Body">
              </div>
            </div>
            <?php
              //}
            ?>
  </div>


<div ng-if="categ == 6">
            <?php // Events category special fields
              //if ($category['c_id'] == 6) {
            ?>
            <h4 class="pt20">Other details</h4>
            <div class="row m0">
              <div class="add_form card col-md-12">
                  <input type="text" name="company" placeholder="Company">
              </div>
              </div>
              <div class="row m0">
                <div class="add_form card col-md-8">
                    <input type="text" name="startdate" placeholder="Starting date">
                </div>
                <div class="add_form card col-md-4">
                    <input type="text" name="starttime" placeholder="Starting time">
                </div>
                </div>
            <?php
              //}
            ?>
</div>

<h4 class="pt20">Images</h4>
<div class="row m0">
      <div class="col-md-12">
        <div class="img-uploader">
          <input type="file" name="userfile[]" multiple="multiple">
        </div>
      </div>
    </div>

        <input name="category" type="hidden" value="<?php echo $category['c_slug']; ?>">
        <input name="category_id" type="hidden" value="<?php echo $category['c_id']; ?>">
        <input name="user" type="hidden" value="<?php echo $user['u_id']; ?>">

<div class="row m0">
        <div class="col-md-6 col-md-offset-3" style="z-index:1;">
          <div class="add_form card submit-btn bg-blue">
              <input type="submit" name="submit" value="Publish">
          </div>
        </div>
      </div>

<div class="clearfix"></div>

      </div>
      </form>
  </div>
</form>
</div--><!--Add form-->


<!--div class="add_form card">
  <input type="text" placeholder="Search listing by name..." class="mtb10">
</div-->

<?php foreach ($items as $item): ?>
  <div class="row admin_row">
    <div class="col-md-8">
      <?php echo $item['i_name']; ?> <span class="blue"> - </span> $<?php echo $item['i_price']; ?>
    </div>
    <div class="col-md-4 right">
      <a class="plr10" href="<?php echo base_url(); ?>admin/edituser/<?php echo $item['i_user']; ?>"><i class="material-icons">supervisor_account</i></a>
      <a class="plr10" href="<?php echo base_url(); ?>admin/edititem/<?php echo $item['i_id']; ?>"><i class="material-icons">edit</i></a>
      <a class="plr10" href="<?php echo base_url(); ?>admin/deleteitem/<?php echo $item['i_id']; ?>"><i class="material-icons">delete</i></a>
    </div>
  </div>
<?php endforeach; ?>

<!--a class="floating-br bg-blue round white center add-form-trigger"><i class="material-icons">add</i></a-->
