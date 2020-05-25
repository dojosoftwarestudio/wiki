<template>
  <div>
    <a href="#" class="btn btn-sm btn-warning" v-on:click.prevent="editKeep(fillKeep)">
        Editar
    </a>
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
          		{{ error }}
          	</span>
        </div>
        <div class="modal-footer">
          	<input type="submit" value="Actualizar" class="btn btn-primary btn-sm">
        </div>
      </div>
    </div>
  </div>
  </form>
</div>
</template>
<script>
  import axios from 'axios'
  import toastr from 'toastr'
  export default {
    props:{
      fillKeep:{
        keep: '',
        id: ''
      },
    },
    data(){
      return {
        errors: {}
      }
    },
    mounted() {
      console.log('Form Component Edit Task mounted.')
    },
    methods:{
      editKeep: function(keep){
          this.fillKeep.id = keep.id
          this.fillKeep.keep = keep.keep
          $('#edit').modal('show')
      },
      updateKeep: function(id){
          var url = 'tasks/'+id
          axios.put(url, this.fillKeep)
          .then( response => {
              this.$emit('list')
              this.fillKeep = ''
              this.errors = []
              $('#edit').modal('hide')
              toastr.success('Editado con exito')
          }).catch( error => {
              this.errors = error.response.data
          })
      },
    }
  }
</script>