

<div class="form-group {{ $errors->has('project_id') ? 'has-error' : ''}}">
    {!! Form::label('project_id', 'Project', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('project_id', App\Project::pluck('name', 'id'), old('project_id'), ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('type') ? 'has-error' : ''}}">
    {!! Form::label('type', 'Social Type', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('type',['facebook' => 'facebook','instagram' => 'instagram','youtube' => 'youtube','vk' => 'vk'] , old('type'), ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('type', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('views') ? 'has-error' : ''}}">
    {!! Form::label('views', 'Number of views', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('views', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('views', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('reposts') ? 'has-error' : ''}}">
    {!! Form::label('reposts', 'Number of reposts', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('reposts', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('reposts', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('likes') ? 'has-error' : ''}}">
    {!! Form::label('likes', 'Number of likes', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('likes', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('likes', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('link') ? 'has-error' : ''}}">
    {!! Form::label('link', 'Link to source', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('link', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('link', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<comments :data="{{ isset($comment->comments) ? json_encode($comment->comments) : json_encode([]) }}"></comments>    

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
