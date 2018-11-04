<!--Page-->
<div class="page home-page container">

	<?php echo form_open_multipart('add_advertisement/add_advm'); ?>

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
						<div class="col-md-4"></div>
						<div ng-show="totalBudget" class="col-md-4">
							<paypal-button env="opts.env" client="opts.client" payment="opts.payment" commit="opts.commit" on-authorize="opts.onAuthorize"></paypal-button>
						</div>
						<!--div class="col-md-4 center pt20">or</div>
						<div class="add_form card submit-btn bg-dark col-md-4">
							<input type="submit" name="submit" value="Save for later" />
						</div-->
					</div>

					<div class="ptb30"></div>

					<div class="center">
						<a href="<?php echo base_url(); ?>advertisements">Back</a>
					</div>

	</form>
