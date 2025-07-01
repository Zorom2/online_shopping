@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Edit Category</div>
                <div class="card-body">
                    <form action="{{url("/admin/category/upd/{$category->id}") }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <table class="table table-sm">
                            <tr>
                                <td>
                                    <label class="form-control">Name</label>
                                </td>
                                <td>
                                    <input type="text" name="name" class="form-control" value="{{ $category->name }}">
                                    @error('name')
                                    <div style="color: red;">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <label class="form-control">Old Photo</label>
                                </td>
                                <td>
                                    <img src="{{ asset("images/category/$category->photo") }}" width='50' height='50' alt="">
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <label class="form-control">New Photo</label>
                                </td>
                                <td>
                                    <input type="file" name="photo" class="form-control">
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <label class="form-control">Status</label>
                                </td>
                                <td>
                                    <input type="text" name="status" class="form-control" value="{{ $category->status }}">
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <label class="form-control">Remark</label>
                                </td>
                                <td>
                                    <input type="text" name="remark" class="form-control" value="{{ $category->remark }}">
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <input type="submit" value="Update" class="btn btn-primary btn-sm form-control">
                                </td>
                            </tr>
                        </table>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection