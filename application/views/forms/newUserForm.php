<!-- Form used to add new entries of users in database -->
<form class="form-horizontal" name="userList" id="userForm" ng-submit="insertInfo(userInfo);" >
  <h3 class="text-center">Insert User Details</h3>
  <div class="form-group row">
    <?php if ($this->session->flashdata('error') == TRUE): ?>
        <p><?php echo $this->session->flashdata('error'); ?></p>
    <?php endif; ?>
    <?php if ($this->session->flashdata('success') == TRUE): ?>
        <p><?php echo $this->session->flashdata('success'); ?></p>
    <?php endif; ?>
  </div>
  <div class="form-group">
    <label for="Name">Login:</label>
    <input type="text" name="user_name" class="form-control" placeholder="Enter Employee Name" ng-model="userInfo.name" autofocus required />
  </div>
  <div class="form-group">
    <p class="text-danger" ng-show="userList.user_name.$invalid && userList.user_name.$dirty">Name field is Empty!</p>
  </div>
  <div class="form-group">
    <label for="Email">Email:</label>
    <input type="email" name="user_email" class="form-control" placeholder="Enter Employee Email Address" ng-model="userInfo.email" autofocus required />
  </div>
  <div class="form-group">
    <p class="text-danger" ng-show="userList.user_email.$invalid && userList.user_email.$dirty">Invalid Email!</p>
  </div>
  <div class="form-group">
    <label for="Type">Type:</label>
    <label for="" class="radio-inline type">
      <input type="radio" name="user_type" value="Admin" ng-model="userInfo.type">Administrator
    </label>
    <label for="" class="radio-inline type">
      <input type="radio" name="user_type" value="Supplier" ng-model="userInfo.type">Supplier
    </label>
    <label for="" class="radio-inline type">
      <input type="radio" name="user_type" value="Shipper" ng-model="userInfo.type">Shipper
    </label>
  </div>
  <div class="form-group">
    <label for="Address">Address:</label>
    <input type="text" name="user_address" class="form-control" placeholder="Enter User Address" ng-model="userInfo.address" autofocus required />
  </div>
  <div class="form-group">
    <p class="text-danger" ng-show="userList.user_address.$invalid && userList.user_address.$dirty">Address field is Empty!</p>
  </div>
  <div class="form-group">
    <button class="btn btn-success" ng-disabled="userList.$invalid" ng-click="insertMsg(userInfo.name)">Add New User</button>
    <input type="button" class="btn btn-warning" formnovalidate onclick="cancelNewUserForm();" value="Cancel" />
  </div>
</form>
<script>
  function cancelNewUserForm(){
    $('#newUserForm').slideUp();
    $('#btnNewUser').prop('disabled',false);
  }
</script>
