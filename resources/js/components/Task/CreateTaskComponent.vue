<template>
  <form v-on:submit.prevent="createKeep()" method="POST">
  <div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Crear tarea</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          	<label for="keep">Tarea </label>
          	<input type="text" name="keep" class="form-control" v-model="newKeep">
          	<span v-for="error in errors" class="bg-danger text-white">
          		{{ error }}
          	</span>
        </div>
        <div class="modal-footer">
          	<input type="submit" value="Guardar" class="btn btn-primary btn-sm">
        </div>
      </div>
    </div>
  </div>
  </form>
</template>
<script>
import axios from 'axios'

  export default {
    data(){
      return {
        newKeep: '',
        errors: {}
      }
    },
    mounted() {
      console.log('Form Component Create Task mounted.')
    },
    methods:{
      createKeep: function(){
        var url = 'tasks'
        axios.post(url, {
            keep: this.newKeep
        }).then( response => {
            this.$emit('list')
            this.newKeep = ''
            this.errors = []
            $('#create').modal('hide')
            toastr.success('Creado con exito')
        }).catch( error => {
            this.errors = error.response.data
        })
    },
    }
  }
</script>