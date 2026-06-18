@extends('admin.layouts.app')

@section('content')
    <div class="card">
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-5 align-self-center">
                    <h4 class="page-title">Blog Management</h4>
                </div>
                <div class="col-7 align-self-center">
                    <div class="d-flex align-items-center justify-content-end">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="#">Home</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Blog</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="row p-3 align-items-center">
            <div class="col-md-12 text-right text-end">
                <a href="/manager/blog/create" class="btn btn-success text-white">
                    <i class="mdi mdi-plus-circle"></i> New Blog
                </a>
            </div>
        </div>
        <div class="table-responsive p-3">
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Title</th>
                        <th scope="col">Image</th>
                        <th scope="col">Description</th>
                        <th scope="col">Handle</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($blogs as $blog)
                        <tr>
                            <th scope="row">{{ $blog->id }}</th>
                            <td>{{ $blog->title }}</td>
                            <td>{{ $blog->image }}</td>
                            <td>{{ $blog->description }}</td>
                            <td class="text-center align-middle">
                                <div class="d-flex justify-content-center align-items-center gap-2">

                                    <a href="/manager/blog/{{ $blog->id }}/edit" class="btn btn-sm btn-info text-white"
                                        title="Edit Profile">
                                        <i class="mdi mdi-pencil"></i> Edit
                                    </a>

                                    <form action="/manager/blog/{{ $blog->id }}" method="POST" class="d-inline-block"
                                        onsubmit="return confirm('Are you sure you want to delete this item?');">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-sm btn-danger text-white"
                                            title="Delete Profile">
                                            <i class="mdi mdi-delete"></i> Delete
                                        </button>
                                    </form>

                                </div>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection
