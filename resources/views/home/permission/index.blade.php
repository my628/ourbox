@extends('layouts.app')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Permission</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Permission</li>
            </ol>
          </div>
        </div>
    </div>
</div>
@include('home.permission.role')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md">
                <div class="card card-outline card-info">
                    <div class="card-header">
                        <div class="btn-group" role="group">
                            @foreach ($roles as $role)
                            <a class="btn btn-app btn-primary" href="/api/role/{{ $role->id }}/edit/" id="role_edit" data-toggle="modal" data-target="#role_modal" data-whatever="@edit">
                                <i class="{{ $role->icon }}" style="color:{{ $role->color}}"></i>{{ $role->name}}
                            </a>
                            @endforeach
                            <a class="btn btn-app btn-primary" id="role_create" data-toggle="modal" data-target="#role_modal" data-whatever="@create">
                                <i class="fas fa-plus" ></i>
                                添加用户组
                            </a>
                        </div><!--btn-group end-->
                    </div><!--card-header end-->
                    <div class="card-body">
                        <table id="post-table" class="table table-hover table-borderless ">
                            <thead class="thead-light">
                                <tr>
                                    <th>ID</th>
                                    <th>权限</th>
                                    <th>用户组</th>
                                    <th>阅读数</th>
                                    <th>操作</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($permissions as $permission)
                                <tr>
                                    <th scope="row">{{ $permission->id }}</th>
                                    <td>{{ $permission->name }}</td>
                                    <td>
                                        <div class="btn-group" role="group" id="role_dropdown" relatedTarget="#role_menu" aria-label="Button group with nested dropdown" >
                                            <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            @foreach ($permission->roles as $role)
                                            <span class="badge badge-pill badge-warning">
                                            <i class="fa fa-bitcoin"></i>{{ $role->name }}
                                            </span>

                                            @endforeach
                                            <span class="badge badge-pill badge-primary">
                                            <i class="fa fa-amazon"></i>
                                            </span>
                                            <span class="badge badge-pill badge-success">
                                            <i class="fa fa-android"></i>
                                            </span>
                                            <span class="badge badge-pill badge-danger">
                                            <i class="fa fa-apple"></i>
                                            </span>
                                            </button>
                                            <div class="dropdown-menu" id="role_menu" aria-labelledby="btnGroupDrop1">
                                                @foreach ($roles as $role)
                                                <a class="dropdown-item" id="role_item" href="#">{{ $role->name }}</a>
                                                @endforeach
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div><!--card-body end-->
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
<!-- -->
@section('scripts')
<script type="text/javascript">

$(document).ready(function(){

    var data = {
        id : 0,
        guard_name : "",
        name : "",
        icon : "",
        color : ""
    }

    var edit_button = $(this).find('.btn-group a#role_edit')
    edit_button.on('click', function(){

    })
    //click edit button event callback end 
    var create_button = $(this).find('.btn-group a#role_create')

    $('#role_modal').on('show.bs.modal', function (event) {

        var recipient = $(event.relatedTarget).data('whatever') // Extract info from data-* attributes
        var title = $(this).find('.modal-title')
        var guard_name = $(this).find('.modal-body input#guard_name')
        var name = $(this).find('.modal-body input#name')
        var role_delete = $(this).find('.modal-footer button#role_delete')
        var role_store = $(this).find('.modal-footer button#role_store')
        
        Swal.fire($(this).attr('href'))
        if (recipient === '@edit'){
            title.text('编辑用户组')
            axios.get('/api/role/4/edit/')
            .then(function (response) {
                //Swal.fire(response.data.id, response.data.name, response.data.gurad_name)
                data = response.data
                guard_name.val(data.guard_name)
                name.val(data.name)
            })
            .catch(function (error) {
                console.log(error)
            });

            role_delete.show()
        }
        if (recipient === '@create'){
            title.text('新建用户组')
            role_delete.hide()
            role_store.on('click', function(){
                
                data.guard_name = guard_name.val()
                data.name = name.val()
                //JSON.parse(data)
                axios.post('/api/role', {
                        guard_name: 'try agen',
                        name: 'please'
                    })
                .then(function (response) {
                        var element = $('<a class="btn btn-app btn-primary" data-toggle="modal" data-target="#role_modal" data-whatever="@edit"></a>')
                        element.text(response.data.name)
                        element.attr('href','/api/role/'+response.data.id+'/edit/');
                        create_button.before(element)
                    })
                .catch(function (error) {
                        console.log(error);
                    });
                    
                    
                    
                    
                $('#role_modal').modal('hide');
            });
            //click store button event end.
        };
    });
    //show.bs.modal event callback end
    $('#role_dropdown').on('show.bs.dropdown', function (event) {
        $(this).find('.dropdown-menu a').each(function () {
            $(this).on('click', function () {
                Swal.fire('Hello bitch!!!')





            });
        });
    });
    //show.bs.dropdown event callback end
});
//
</script>
@stop