<!--Add form-->
<div class="add-form-item add-form p20 m20">

  <?php echo form_open_multipart('add_advertisement/add_advm_admin'); ?>

					<div class="row">
						<div class="add_form card col-md-12">
							<input type="input" name="addname" placeholder="Advertisement title" />
						</div>
					</div>

					<div class="row">
						<div class="add_form card col-md-3 pt10">
							<label>Daily budget</label>
							<input type="tel" name="dailybudget" ng-model="dailyBudget" placeholder="Daily budget" ng-change="calculateBudget('dailyBudget')" />
						</div>
						<div class="add_form card col-md-3 pt10">
							<label>Number of days</label>
							<input type="tel" name="numofdays" ng-model="numberOfDays" placeholder="Number of days" ng-change="calculateBudget('numberOfDays')" />
						</div>
						<div class="add_form card col-md-3 pt10">
							<label>Total budget</label>
							<input type="tel" name="budget" id="totalBudget" ng-model="totalBudget" placeholder="Total budget" ng-change="calculateBudget('totalBudget')" />
						</div>
						<div class="add_form card col-md-3 pt10 bg-blue">
							<label class="text-white">Total impressions</label>
							<input class="text-white" type="tel" name="impressions" ng-model="impressions" disabled />
						</div>
	          <div class="add_form card col-md-12 pt10">
							<label>Advertisement image</label>
							<input type="file" name="userfile" />
						</div>
					</div>

					<div class="row">
						<div class="add_form card col-md-12">
							<input type="input" name="url" placeholder="Advertisement link URL" />
						</div>
					</div>

					<div class="row">
						<div class="add_form card col-md-12">
							<textarea name="description" placeholder="Advertisement description"></textarea>
						</div>
					</div>
					<div class="ptb30"></div>

					<div class="row center">
						<div class="add_form card submit-btn bg-dark col-md-4">
							<input type="submit" name="submit" value="Submit" />
						</div>
					</div>

	</form>

</div>

<!--div class="add_form card">
  <input type="text" name="search" placeholder="Search advertisements by username..." class="mtb10">
</div-->

<?php foreach ($advertisements as $advm): ?>
  <div class="row admin_row">
    <div class="col-md-8">
      <?php echo $advm['advm_name']; ?> <span class="blue"></span>
    </div>
    <div class="col-md-4 right">
      <!--a class="plr10" href="<?php echo base_url(); ?>admin/useradverts/<?php echo $user['adv_id']; ?>"><i class="material-icons">dashboard</i></a-->
      <!--a class="plr10" href="<?php echo base_url(); ?>admin/editadvertiser/<?php echo $user['adv_id']; ?>"><i class="material-icons">edit</i></a-->
      <a class="plr10" href="<?php echo base_url(); ?>admin/deleteadvertisement/<?php echo $advm['advm_id']; ?>"><i class="material-icons">delete</i></a>
    </div>
  </div>
<?php endforeach; ?>

<a class="floating-br bg-blue round white center add-form-trigger"><i class="material-icons">add</i></a>
