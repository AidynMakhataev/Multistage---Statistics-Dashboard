@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit SmmReport #{{ $smmreport->id }}</div>
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

                        {!! Form::model($smmreport, [
                            'method' => 'PATCH',
                            'url' => ['/admin/smm-reports', $smmreport->id],
                            'class' => 'form-horizontal',
                            'files' => true
                        ]) !!}

                        @include ('admin.smm-reports.form')

                        <smm-overview :parameters="{{ json_encode($smmreport->smm_overview) }}"></smm-overview>
                        <people-overview :parameters="{{ json_encode($smmreport->people_overview) }}"></people-overview>
                        <country-report :parameters="{{ json_encode($smmreport->country_report) }}"></country-report>


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
