@extends('app')

@section('content')
 <div class="row" id="crud">
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
			<tr v-for="keep in keeps">
				<td>@{{keep.id}}</td>
				<td>@{{keep.keep}}</td>
				<td>
					<a href="#" class="btn btn-sm btn-warning" v-on:click.prevent="editKeep(keep)">
						Editar
					</a>
					<a href="#" class="btn btn-sm btn-danger" v-on:click.prevent="deleteKeep(keep)">
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
						@{{ page }}
					</a>
				</li>

				<li class="page-item" v-if="pagination.current_page < pagination.last_page">
					<a  class="page-link" href="#" @click.prevent="changePage(pagination.current_page + 1)">
						<span>Siguiente</span>
					</a>
				</li>
			</ul>
		</nav>
		@include('tasks.create')
		@include('tasks.edit')
	</div>
	<div class="col-sm-5">
			<pre class="bg-dark text-white">
				@{{ $data }}
			</pre>
	</div>
 </div>
@endsection
