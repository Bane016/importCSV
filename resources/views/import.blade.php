@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Form for import CSV files</div>
                    <div class="card-body">
                        <form method='post' action='/uploadFile' enctype='multipart/form-data'>
                            {{ csrf_field() }}
                        <div class="mb-3">
                            <label class="form-label">Select CSV file</label>
                            <input class="form-control" type="file" name="file" >
                        </div>
                        <div class="btn-row">
                            <button class="btn btn-success" type="submit" name="submit" value="Import">
                                Import CSV
                            </button>
                        </div>
                            @if(Session::has('message'))
                                <div class="alert alert-success" role="alert">
                                    <p>{{ Session::get('message') }}</p>
                                </div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
