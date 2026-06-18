@extends('admin.layouts.app')

@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Country Management</h4>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="#">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Country</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="row p-3 align-items-center">
        <div class="col-md-12 text-right text-end">
            <a href="/manager/country/create" class="btn btn-success text-white">
                <i class="mdi mdi-plus-circle"></i> New Country
            </a>
        </div>
    </div>
    <div class="table-responsive pl-4 pr-4">
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Handle</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($countries as $country)
                    <tr>
                        <td>{{ $country->id }}</td>
                        <td>{{ $country->name }}</td>
                        <td>
                            <form action="/manager/country/{{ $country->id }}" method="POST" class="d-inline-block"
                                onsubmit="return confirm('Are you sure you want to delete this item?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger text-white" title="Delete Country">
                                    <i class="mdi mdi-delete"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
