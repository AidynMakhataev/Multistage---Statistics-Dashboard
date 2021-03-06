@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-10">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit DigitalReport #{{ $digitalreport->id }}</div>
                    <div class="panel-body">
                        <a href="{{ url('/admin/digital-reports') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::model($digitalreport, [
                            'method' => 'PATCH',
                            'url' => ['/admin/digital-reports', $digitalreport->id],
                            'class' => 'form-horizontal',
                            'files' => true
                        ]) !!}

                        @include ('admin.digital-reports.form')
                        <actions-overview :parameters="{{ json_encode($digitalreport->actions_overview) }}"></actions-overview>
                        <people-overview :parameters="{{ json_encode($digitalreport->people_overview) }}"></people-overview>
                        <country-report :parameters="{{ json_encode($digitalreport->country_report) }}"></country-report>

                        <div class="form-group">
                            <div class="col-md-offset-4 col-md-4">
                                {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Update', ['class' => 'btn btn-primary']) !!}
                            </div>
                        </div>
                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
