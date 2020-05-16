<!-- Modal -->
<form v-on:submit.prevent="updateKeep(fillKeep.id)" method="POST">
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar tarea</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        	<label for="keep">Tarea </label>
        	<input type="text" name="keep" class="form-control" v-model="fillKeep.keep">
        	<span v-for="error in errors" class="bg-danger text-white">
        		@{{ error }}
        	</span>
      </div>
      <div class="modal-footer">
        	<input type="submit" value="Actualizar" class="btn btn-primary btn-sm">
      </div>
    </div>
  </div>
</div>
</form>