<!--Country-->
<div class="col-md-4">
  <div class="bg-light add_form p10 mb30">
    <?php echo form_open('admin/addcountry'); ?>
    <div class="add_form card">
        <input type="input" name="country_name" placeholder="Country name" />
      </div>
        <div class="add_form card submit-btn bg-blue">
          <input type="submit" name="submit" value="Create a new country" />
        </div>
    </form>
  </div>

<?php foreach ($countries as $country): ?>
  <div class="row admin_row">
    <div class="col-md-8">
      <?php echo $country['country_name']; ?> <span class="blue">
    </div>
    <div class="col-md-4 right">
      <a class="plr10" href="<?php echo base_url(); ?>admin/editcountry/<?php echo $country['country_id']; ?>"><i class="material-icons">edit</i></a>
      <a class="plr10" href="<?php echo base_url(); ?>admin/deletecountry/<?php echo $country['country_id']; ?>"><i class="material-icons">delete</i></a>
    </div>
  </div>
<?php endforeach; ?>
</div>

<div class="col-md-4">
<!--State-->
  <div class="bg-light add_form p10 mb30">
    <?php echo form_open('admin/addstate'); ?>
      <select name="state_country" class="card">
        <?php foreach ($countries as $country): ?>
          <option value="<?php echo $country['country_id']; ?>"><?php echo $country['country_name']; ?></option>
        <?php endforeach; ?>
      </select>
      <div class="add_form card">
        <input type="input" name="state_name" placeholder="State name" />
      </div>
      <div class="add_form card submit-btn bg-blue">
        <input type="submit" name="submit" value="Create a new state" />
      </div>
    </form>
  </div>

<?php foreach ($states as $state): ?>
  <div class="row admin_row">
    <div class="col-md-8">
      <?php echo $state['state_name']; ?> <span class="blue">
    </div>
    <div class="col-md-4 right">
      <a class="plr10" href="<?php echo base_url(); ?>admin/editstate/<?php echo $state['state_id']; ?>"><i class="material-icons">edit</i></a>
      <a class="plr10" href="<?php echo base_url(); ?>admin/deletestate/<?php echo $state['state_id']; ?>"><i class="material-icons">delete</i></a>
    </div>
  </div>
<?php endforeach; ?>
</div>

<div class="col-md-4">
<!--City-->
  <div class="bg-light add_form p10 mb30">
    <?php echo form_open('admin/addcity'); ?>
    <select name="city_state" class="card">
      <?php foreach ($states as $state): ?>
        <option value="<?php echo $state['state_id']; ?>"><?php echo $state['state_name']; ?></option>
      <?php endforeach; ?>
    </select>
    <div class="add_form card">
        <input type="input" name="city_name" placeholder="City name" />
      </div>
      <div class="add_form card submit-btn bg-blue">
        <input type="submit" name="submit" value="Create a new city" />
      </div>
    </form>
  </div>

<?php foreach ($cities as $city): ?>
  <div class="row admin_row">
    <div class="col-md-8">
      <?php echo $city['city_name']; ?> <span class="blue">
    </div>
    <div class="col-md-4 right">
      <a class="plr10" href="<?php echo base_url(); ?>admin/editcity/<?php echo $city['city_id']; ?>"><i class="material-icons">edit</i></a>
      <a class="plr10" href="<?php echo base_url(); ?>admin/deletecity/<?php echo $city['city_id']; ?>"><i class="material-icons">delete</i></a>
    </div>
  </div>
<?php endforeach; ?>
</div>
