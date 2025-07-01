@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

    @if(session('add_info'))
        <div class="alert alert-success">
            {{session('add_info')}}
        </div>
    @endif

    @if(session('del_info'))
        <div class="alert alert-danger">
            {{ session('del_info') }}
        </div>
    @endif

    @if(session('upd_info'))
        <div class="alert alert-warning">
            {{ session('upd_info') }}
        </div>
    @endif

    <div class="col-md-4">
        <div class="card">
            <div class="card-header">Add New Category</div>
            <div class="card-body">
                <form action="{{url('/admin/category/add') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <table class="table-sm">
                        <tr>
                            <td>
                                <label class="form-control">Name</label>
                            </td>
                            <td>
                                <input type="text" name="name" class="form-control">
                                @error('name')
                                <div style="color: red;">{{ $message }}</div>
                                @enderror
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label class="form-control">Photo</label>
                            </td>
                            <td>
                                <input type="file" name="photo" class="form-control">
                                @error('photo')
                                <div style="color: red;">{{ $message }}</div>
                                @enderror
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label class="form-control">Status</label>
                            </td>
                            <td>
                                <input type="text" name="status" class="form-control">
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label class="form-control">Remark</label>
                            </td>
                            <td>
                                <input type="text" name="remark" class="form-control">
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <input type="submit" value="Add" class="btn btn-primary btn-sm form-control">
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Category List</div>
            <div class="card-body">
                <table class="table table-hover table-sm">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Photo</th>
                        <th>Status</th>
                        <th>Remark</th>
                        <th>Delete</th>
                        <th>Update</th>
                    </tr>
                    @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>
                            <img width="50px" height="50px" src="{{ asset("images/category/$category->photo") }}" alt="">
                        </td>
                        <td>{{ $category->status }}</td>
                        <td>{{ $category->remark }}</td>
                        <td>
                            <a href="{{ url("/admin/category/del/{$category->id}") }}" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                        <td>
                            <a href="{{ url("/admin/category/upd/{$category->id}") }}" class="btn btn-warning btn-sm">Update</a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

    </div>
</div>
@endsection