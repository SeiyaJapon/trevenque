
<div class="row">
    <div class="col-xs-12 col-sm-6 mt-4 mb-4">
        <div class="form-group">
            {!! Form::label('name', 'Nombre') !!}
            {!! Form::text('name', isset($title) && !empty($title) ? $title->name : null, ['class' => 'form-control', 'required' => 'required']) !!}
        </div>
    </div>
</div>
