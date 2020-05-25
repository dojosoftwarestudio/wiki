<template>
    <div class="row">
    <div class="col-md-12">
        <h1 class="page-header">
            CRUD
        </h1>
    </div>
    <div class="col-sm-7">
        <a href="" class="btn btn-primary float-right" data-toggle="modal" data-target="#create">
            Nueva
        </a>
        <table class="table tble-hover table-striped">
            <tr>
                <th>ID</th>
                <th>Tarea</th>
                <th colspan="2"></th>
            </tr>
            <tr v-for="task in tasks">
                <td>{{task.id}}</td>
                <td>{{task.keep}}</td>
                <td>
                    <task-edit-component :fillKeep="task" @list="getKeeps(1)"></task-edit-component>
                    <a href="#" class="btn btn-sm btn-danger" v-on:click.prevent="deleteKeep(task)">
                        Borrar
                    </a>
                </td>
            </tr>
        </table>
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item" v-if="pagination.current_page > 1">
                    <a  class="page-link" href="#" @click.prevent="changePage(pagination.current_page - 1)">
                        <span>Atras</span>
                    </a>
                </li>

                <li  class="page-item"  v-for="page in pagesNumber" v-bind:class="[ page == isActived ? 'active' : '']">
                    <a  class="page-link" href="#" @click.prevent="changePage(page)">
                        {{ page }}
                    </a>
                </li>

                <li class="page-item" v-if="pagination.current_page < pagination.last_page">
                    <a  class="page-link" href="#" @click.prevent="changePage(pagination.current_page + 1)">
                        <span>Siguiente</span>
                    </a>
                </li>
            </ul>
        </nav>
        <task-create-component @list="getKeeps(1)"></task-create-component>

    </div>
    <div class="col-sm-5">
            <pre class="bg-dark text-white">
                {{ $data }}
            </pre>
    </div>
 </div>
</template>

<script>
import axios from 'axios'
import toastr from 'toastr'
    export default {
        data(){
            return {
                tasks:[],
                pagination:{
                    'total'        :0,
                    'current_page' :0,
                    'per_page'     :0,
                    'last_page'    :0,
                    'from'         :0,
                    'to'           :0
                },
                offset: 5
            }
        },
        mounted() {
            console.log('Task mounted.')
            this.getKeeps()
        },
        computed:{
            isActived: function(){
                return this.pagination.current_page
            },
            pagesNumber: function() {
                if(!this.pagination.to){
                    return []
                }

                var from = this.pagination.current_page - this.offset
                if(from < 1){
                    from = 1
                }

                var to = from + (this.offset * 2)
                if(to >= this.pagination.last_page){
                    to = this.pagination.last_page
                }

                var pagesArray = []
                while(from <= to){
                    pagesArray.push(from)
                    from++
                }
                return pagesArray
            }
        },
        methods:{
            getKeeps: function(page){
                var url = 'tasks?page='+page
                axios.get(url).then(response => {
                    this.tasks = response.data.tasks.data,
                    this.pagination = response.data.pagination
                })
            },
            deleteKeep: function(keep){
                var url = 'tasks/'+ keep.id
                axios.delete(url).then(response=>{
                    this.getKeeps()
                    toastr.success('Eliminado OK')
                })
            },
            changePage: function(page) {
                this.pagination.current_page = page
                this.getKeeps(page)
            }
        }
    }

</script>