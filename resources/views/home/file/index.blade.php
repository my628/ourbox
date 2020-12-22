@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    File
                    <button type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#modal-folder-create">
                        <i class="fas fa-folder-plus"></i> 新增目录
                    </button>
                </div>
                <!---->
                <div class="card-body">
                    <table id="post-table" class="table table-sm table-striped table-bordered table-hover display">
                        <thead>
                        <tr>
                            <th>name</th>
                            <th>type</th>
                            <th>size</th>
                            <th>option</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @foreach ($subfolders as $path => $name)
                                <tr>
                                    <td>
                                        <a href="#">
                                            <i class="fa fa-folder fa-lg fa-fw"></i>
                                            {{ $name }}
                                        </a>
                                    </td>
                                    <td>目录</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>
                                        <button type="button" class="btn btn-xs btn-danger">
                                            <i class="fa fa-times-circle fa-lg"></i>
                                            删除
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tr>

                            @foreach ($files as $file)
                            <tr>
                                <td>
                                    <a href="{{ $file['webPath'] }}">
                                        {{ $file['name'] }}
                                    </a>
                                </td>
                                <td>{{ $file['mimeType'] ? : 'Unknown' }}</td>
                                <td>{{ $file['modified'] }}</td>
                                <td>{{ $file['size'] }}</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-danger">
                                        <i class="fa fa-times-circle fa-lg"></i>
                                        删除
                                    </button>
                                </td>
                            </tr>
                        @endforeach
    
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    File Upload
                </div>
                <div class="card-body">
                    <form action="/home/file" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="file" id="validatedCustomFile" required>
                                <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                                <div class="invalid-feedback">Example invalid custom file feedback</div>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit" >
                            <i class="fas fa-upload"></i> Upload
                        </button>
                        <button id="btnResetForm" class="btn btn-primary" onClick="bsCustomFileInput.destroy()">

                            Reset form
          
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<!-- -->
@section('scripts')
<script>
$('#file-table').DataTable({});

bsCustomFileInput.init()
var form = document.querySelector('form')
var btn = document.getElementById('btnResetForm')
btn.addEventListener('click', function () {
  form.reset()
})
</script>
@stop