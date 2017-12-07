@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-10">
                <div class="panel panel-default">
                    <div class="panel-heading">Create New SmmReport</div>
                    <div class="panel-body">
                        <a href="{{ url('/admin/smm-reports') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::open(['url' => '/admin/smm-reports', 'class' => 'form-horizontal', 'files' => true]) !!}

                        @include ('admin.smm-reports.form')

                        <smm-overview :parameters="{{ json_encode([])  }}"></smm-overview>
                        <people-overview :parameters="{{ json_encode(['gender' => ['male' => 0, 'female' => 0], 'ages' => []])  }}"></people-overview>
                        <country-report :parameters="{{ json_encode([]) }}"></country-report>

                        <div class="form-group">
                            <div class="col-md-offset-4 col-md-4">
                                {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
                            </div>
                        </div>

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
