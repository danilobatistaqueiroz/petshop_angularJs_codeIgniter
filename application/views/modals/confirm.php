<!-- Modal -->
<div id="confirmModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <input type="hidden" id="id" name="id" class="modal-id" value=""/>
    <input type="hidden" id="type" name="type" class="modal-type" value=""/>
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" id="modalTitle">...</h4>
      </div>
      <div class="modal-body">
        <p class="modal-text" id="modalText">...</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" onclick="confirmYesModal();">Yes</button>
        <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<script>
  function confirmYesModal(){
    var id = $('#confirmModal input[name=id]').val();
    confirmExecution(id);
    $('#confirmModal').modal('hide');
  }
  function confirmOpenModal(id, type, title, text){
    $('#confirmModal input[name=id]').val(id);
    $('#confirmModal input[name=type]').val(type);
    $('#confirmModal h4.modal-title').text(title);
    $('#confirmModal p.modal-text').text(text);
    $('#confirmModal').modal();
  }
</script>
