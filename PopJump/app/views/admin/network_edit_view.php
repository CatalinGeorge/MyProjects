<?php echo form_open('admin/save_editnetwork'); ?>
<label>Network name</label>
  <input type="text" name="net_name" value="<?php echo $net_info['net_name'] ?>" />
  <br>
  <label>Network  </label>
    <input type="text" name="net_url" value="<?php echo $net_info['net_url'] ?>" />
<br>
            <input type="hidden" name="net_id" value="<?php echo $net_info['net_id'] ?>" />
            <input type="submit" name="submit" value="Update info" />
          </form>
