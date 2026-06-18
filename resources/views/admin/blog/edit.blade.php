@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-body">
                    <h4 class="card-title">Edit Blog</h4>
                    <form class="form-horizontal m-t-30" action="/manager/blog/{{ $blog->id }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        @include('admin.blog.fields', ['button' => 'Update', $blog])
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
