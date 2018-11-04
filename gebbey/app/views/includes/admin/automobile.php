<!--Make-->
<div class="col-md-6">
  <div class="bg-light add_form p10 mb30">
    <?php echo form_open('admin/addmake'); ?>
    <div class="add_form card">
        <input type="input" name="make_name" placeholder="Make name" />
      </div>
        <div class="add_form card submit-btn bg-blue">
          <input type="submit" name="submit" value="Create a new make" />
        </div>
    </form>
  </div>

<?php foreach ($makes as $make): ?>
  <div class="row admin_row">
    <div class="col-md-8">
      <?php echo $make['make_name']; ?> <span class="blue">
    </div>
    <div class="col-md-4 right">
      <a class="plr10" href="<?php echo base_url(); ?>admin/editmake/<?php echo $make['make_id']; ?>"><i class="material-icons">edit</i></a>
      <a class="plr10" href="<?php echo base_url(); ?>admin/deletemake/<?php echo $make['make_id']; ?>"><i class="material-icons">delete</i></a>
    </div>
  </div>
<?php endforeach; ?>
</div>

<!--Model-->
<div class="col-md-6">
  <div class="bg-light add_form p10 mb30">
    <?php echo form_open('admin/addmodel'); ?>
    <select name="model_make" class="card">
      <?php foreach ($makes as $make): ?>
        <option value="<?php echo $make['make_id']; ?>"><?php echo $make['make_name']; ?></option>
      <?php endforeach; ?>
    </select>
    <div class="add_form card">
        <input type="input" name="model_name" placeholder="Model name" />
      </div>
        <div class="add_form card submit-btn bg-blue">
          <input type="submit" name="submit" value="Create a new model" />
        </div>
    </form>
  </div>

<?php foreach ($models as $model): ?>
  <div class="row admin_row">
    <div class="col-md-8">
      <?php echo $model['model_name']; ?> <span class="blue">
    </div>
    <div class="col-md-4 right">
      <a class="plr10" href="<?php echo base_url(); ?>admin/editmodel/<?php echo $model['model_id']; ?>"><i class="material-icons">edit</i></a>
      <a class="plr10" href="<?php echo base_url(); ?>admin/deletemodel/<?php echo $model['model_id']; ?>"><i class="material-icons">delete</i></a>
    </div>
  </div>
<?php endforeach; ?>
</div>
