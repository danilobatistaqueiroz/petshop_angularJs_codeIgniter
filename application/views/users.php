<?php $this->load->view('modals/login'); ?>
<?php $this->load->view('modals/register'); ?>
<?php $this->load->view('modals/confirm'); ?>
<?php $this->load->view('commons/header'); ?>

<div style="margin-left:10px;">

    <div id="newUserForm" style="display:none" class="alert jumbotron col-md-6 col-md-offset-3">
      <?php include "forms/newUserForm.php";?>
    </div>
    <div id="editUserForm" style="display:none" class="alert jumbotron col-md-6 col-md-offset-3">
      <?php include "forms/editUserForm.php";?>
    </div>

    <div>
      <div style="margin-bottom:50px;">
      </div>
      <div class="clearfix"></div>
      <div class="table-responsive"><!-- Table to show employee detalis -->
        <table class="table table-hover">
        <tr id="searchBar">
          <th colspan="4">
            <input type="text" class="form-control col-xs-2" placeholder="Search Users" ng-model="search_query">
          </th>
          <th colspan="2">
            <input id="btnNewUser" type="button" class="btn btn-success col-xs-4"
                   value="New User" onclick="newInfo();"/>
          </th>
        </tr>
        <tr>
          <th>User ID</th><th>Login</th><th>Email</th><th>Type</th><th>Address</th><th></th>
        </tr>
        <?php if ($users == FALSE): ?>
            <tr><td colspan="2">User Not Found!</td></tr>
        <?php else: ?>
        <?php foreach ($users as $row): ?>
        <tr id="tr_user_<?=$row['id']?>" >
          <td>
            <span><?= $row['id'] ?></span>
          </td>
          <td><?= $row['login'] ?></td>
          <td><?= $row['email'] ?></td>
          <td><?= $row['type'] ?></td>
          <td><?= $row['addr'] ?></td>
          <td>
            <button class="btn btn-warning btn-sm" onclick="editInfo();" title="Edit"><span class="glyphicon glyphicon-edit">Edit</span></button>
            <button class="btn btn-danger btn-sm" onclick="confirmDel(<?=$row['id']?>);" title="Delete"><span class="glyphicon glyphicon-trash">Delete</span></button>
          </td>
        </tr>
        <?php endforeach; ?>
        <?php endif; ?>
        <tr>
          <td colspan="6">
            <p id="messages"></p>
          </td>
        </tr>
        </table>
      </div>
	</div>


<div style="margin-bottom:50px">
</div>
</div>
<style>
  searchBar:before {
   content: none;
}
</style>

<script>
    function confirmExecution(id){
      if($('#confirmModal input[name=type]').val()=='delete user'){
        $.post("inativateUser", {id: id, status: 0}, function(result, status){
          if(status=='success'){
            $("#tr_user_"+id).remove();
          } else {
            $("#messages").html(result);
          }
        });
      }
    }
    function confirmDel(id){
      confirmOpenModal(id,'delete user','Delete user','Do you really want to delete this user?');
    }
    function newInfo(){
      $('#newUserForm').slideDown();
      $('#btnNewUser').prop('disabled',true);
      $('#editUserForm').slideUp();
    }
    function editInfo(info){
      $('#newUserForm').slideUp();
      $('#btnNewUser').prop('disabled',false);
      $('#editUserForm').slideDown();
    }
</script>
<?php $this->load->view('commons/footer'); ?>
