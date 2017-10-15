<div class="modal fade" id="registerModal" tabindex="-1" role="dialog">
  <form action="<?=base_url('register')?>" method="POST">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="registertitle">Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="login" class="form-control-label">Login:</label>
          <input type="text" class="form-control" name="login" id="login" value="client1" onfocus="cleanLogin();" onblur="existsLogin();">
          <div id="loginMessages" class="alert alert-warning" style="display:none">
            <strong>Warning!</strong> Login is already taken
          </div>
        </div>
        <div class="form-group">
          <label for="email" class="form-control-label">Email:</label>
          <input type="email" class="form-control" name="email" id="email" value="client1@gmail.com">
        </div>
        <div class="form-group">
          <label for="pwd" class="form-control-label">Password:</label>
          <input type="password" class="form-control" name="pwd" id="pwd" value="client1"/>
        </div>
        <div class="form-group">
          <label for="addr" class="form-control-label">Address:</label>
          <input type="text" class="form-control" name="addr" id="addr" value="Avenue New World, 100"/>
        </div>
      </div>
      <div class="modal-footer">
        <input type="submit" class="btn btn-primary" value="Register" />
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
  </form>
</div>
<script>
  function cleanLogin() {
    $("#loginMessages").hide();
  }
  function existsLogin() {
    $.post( "validateLogin", { login: $('#login').val() }).done(function( message ) {
      if(message!=''){
        $("#loginMessages").show();
      }
    });
  /*
    $.ajax({
      url: "validateLogin?XDEBUG_SESSION_START=X",
      method: "GET",
      data: { login: $('#login').val() }
    })
      .done(function(message) {
        alert( message );
      })
      .fail(function() {
        alert( "error" );
      })
      .always(function() {
        alert( "complete" );
      });
      */
  }
</script>
