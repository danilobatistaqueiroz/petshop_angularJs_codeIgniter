<div class="modal fade" id="loginModal" tabindex="-1" role="dialog">
  <form action="<?=base_url('login')?>" method="POST">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="logintitle">Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="form-group">
            <label for="email" class="form-control-label">Email:</label>
            <input type="text" class="form-control" name="email" id="email" value="danilobatistaqueiroz@gmail.com">
          </div>
          <div class="form-group">
            <label for="pwd" class="form-control-label">Password:</label>
            <input text="text" class="form-control" name="pwd" id="pwd" value="123456"/>
          </div>
      </div>
      <div class="modal-footer">
        <input type="submit" class="btn btn-primary" value="Login" />
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
  </form>
</div>
