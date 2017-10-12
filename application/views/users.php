<html ng-app="crudApp">
<head>
  <title>Users</title>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <script src="https://npmcdn.com/tether@1.2.4/dist/js/tether.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
  <link rel="stylesheet" type="text/css" href="css/style.css"/>
  <script src="js/jQuery/jquery.min.js"></script>
  <script src="lib/angular/angular.15.min.js"></script><!-- Include AngularJS library -->
  <script src="js/bootstrap.min.js"></script>
  <script src="js/bootstrap-notify.min.js"></script><!--http://bootstrap-notify.remabledesigns.com/ https://github.com/mouse0270/bootstrap-notify-->
  <script src="js/angular-script.js"></script><!-- Include controller -->
</head>
<body>
<div class="container wrapper" ng-controller="DbController">
  <h1 class="text-center">AngularJS/Php/Postgre CRUD Demo</h1>
  <nav class="navbar navbar-default">
    <div class="navbar-header">
      <div class="alert alert-default search-box">
        <button class="btn btn-primary" ng-click="formToggle()">Add User
            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
        </button>
      </div>
    </div>
  </nav>
  <div class="col-md-6 col-md-offset-3">
    <div ng-include src="'forms/usersForm.html'"></div><!-- Include form template which is used to insert data into database -->
    <div ng-include src="'forms/editForm.html'"></div><!-- form template used to edit and update data into database -->
  </div>
  <div class="alert alert-default search-box">
    <span class="input-group-btn">
      <input type="text" class="form-control" placeholder="Search User Details" ng-model="search_query">
    </span>
  </div>
  <div class="clearfix"></div>
  <div class="table-responsive"><!-- Table to show employee detalis -->
    <table class="table table-hover">
    <tr>
      <th>User ID</th><th>User Name</th><th>Email</th><th>Type</th><th>Address</th><th></th><th></th>
    </tr>
    <tr ng-repeat="detail in details | filter:search_query">
      <td>
        <span>{{detail.user_id}}</span>
      </td>
      <td>{{detail.user_name}}</td>
      <td>{{detail.user_email}}</td>
      <td>{{detail.user_type}}</td>
      <td>{{detail.user_address}}</td>
      <td>
        <button class="btn btn-warning btn-sm" ng-click="editInfo(detail)" title="Edit"><span class="glyphicon glyphicon-edit">Edit</span></button>
      </td>
      <td>
        <button class="btn btn-danger btn-sm" ng-click="confirmDelete(detail)" title="Delete"><span class="glyphicon glyphicon-trash">Delete</span></button>
      </td>
    </tr>
      <!--data-id="detail" data-toggle="modal" data-target="#delModal"-->
    </table>
  </div>
  <div id="delModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">  
          <h4 class="modal-title"></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="empid" id="empid" value=""/>
          <p>Do you really want to delete the user?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal" ng-click="deleteInfo();">Yes</button>
          <button type="button" class="btn btn-info" data-dismiss="modal">No</button>
          <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>