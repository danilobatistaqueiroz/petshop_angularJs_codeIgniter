<?php $this->load->view('commons/header'); ?>
<?php $this->load->view('modals/login'); ?>

<div style="margin-left:10px;">
    <div>
        <h1>System Users</h1>
    </div>
    <div id="setupUser" class="container" style="display:none;">
      <form method="post" action="<?=base_url('save')?>" enctype="multipart/form-data">
        <div class="form-group row">
          <?php if ($this->session->flashdata('error') == TRUE): ?>
              <p><?php echo $this->session->flashdata('error'); ?></p>
          <?php endif; ?>
          <?php if ($this->session->flashdata('success') == TRUE): ?>
              <p><?php echo $this->session->flashdata('success'); ?></p>
          <?php endif; ?>
        </div>
        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
          <div class="col-sm-10">
            <input type="name" class="form-control" id="name" placeholder="User Name" value="<?=set_value('name')?>" required>
          </div>
        </div>
        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
          <div class="col-sm-10">
            <input type="email" class="form-control" id="email" placeholder="Email" value="<?=set_value('email')?>" required>
          </div>
        </div>
        <div class="form-group row">
          <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
          <div class="col-sm-10">
            <input type="password" class="form-control" id="passsword" placeholder="Password" value="<?=set_value('pwd')?>" required>
          </div>
        </div>
        <fieldset class="form-group">
          <div class="row">
            <label class="col-form-label col-sm-2">Type</label>
            <div class="col-sm-10">
              <div class="form-check">
                <label class="form-check-label">
                  <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
                  Shipper
                </label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
                  Provider
                </label>
              </div>
              <div class="form-check disabled">
                <label class="form-check-label">
                  <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios3" value="option3">
                  Administrator
                </label>
              </div>
            </div>
          </div>
        </fieldset>
        <div class="form-group row">
          <div class="col-sm-10">
            <button type="submit" class="btn btn-primary">Register</button>
            <input type="button" onclick="$('#setupUser').toggle();$('#btnNewUser').prop('disabled',false);" formnovalidate class="btn btn-warning" value="Cancel"/>
          </div>
        </div>
      </form>
    </div>
  
	<div>

      <div style="margin-bottom:50px;">
      </div>
      <div class="clearfix"></div>
      <div class="table-responsive"><!-- Table to show employee detalis -->
        <table class="table table-hover">
        <tr class="form-group row">
          <th colspan="3">
            <input type="text" class="form-control col-xs-2" placeholder="Search Users" ng-model="search_query">
          </th>
          <th colspan="5">
            <input id="btnNewUser" type="button" class="btn btn-success col-xs-4" 
                   value="New User" onclick="$('#setupUser').toggle();$('#btnNewUser').prop('disabled',true);"/>
          </th>
        </tr>
        <tr>
          <th>User ID</th><th>User Name</th><th>Email</th><th>Type</th><th>Address</th><th></th><th></th>
        </tr>
        <?php if ($users == FALSE): ?>
            <tr><td colspan="2">User Not Found!</td></tr>
        <?php else: ?>
        <?php foreach ($users as $row): ?>
        <tr>
          <td>
            <span><?= $row['id'] ?></span>
          </td>
          <td><?= $row['name'] ?></td>
          <td><?= $row['email'] ?></td>
          <td><?= $row['type'] ?></td>
          <td><?= $row['addr'] ?></td>
          <td>
            <button class="btn btn-warning btn-sm" ng-click="editInfo(detail)" title="Edit"><span class="glyphicon glyphicon-edit">Edit</span></button>
            <button class="btn btn-danger btn-sm" ng-click="confirmDelete(detail)" title="Delete"><span class="glyphicon glyphicon-trash">Delete</span></button>
          </td>
        </tr>
        <?php endforeach; ?>
        <?php endif; ?>
        </table>
      </div>
	</div>

<div style="margin-bottom:50px">
</div>
</div>

<?php $this->load->view('commons/footer'); ?>