
<div class="row">
    <div class="col-xs-12 col-sm-6 mt-4 mb-4">
        <div class="form-group">
            {!! Form::label('name', 'Nombre') !!}
            {!! Form::text('name', isset($title) && !empty($title) ? $title->name : null, ['class' => 'form-control', 'required' => 'required']) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-6 mt-4 mb-4">
        <div class="form-group">
            {!! Form::label('title_id', 'Titulación') !!}
            {!! Form::select('title_id', $titles, null, ['class' => 'form-control', 'required' => 'required']) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-6 mt-4 mb-4">
        <div class="form-group">
            {!! Form::label('credits', 'Creditos') !!}
            {!! Form::number('credits', isset($title) && !empty($title) ? $title->credits : null, ['class' => 'form-control', 'required' => 'required', 'min' => 1]) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-6 mt-4 mb-4">
        <div class="form-group">
            {!! Form::label('max_students', 'Alumnos máximos') !!}
            {!! Form::number('max_students', isset($title) && !empty($title) ? $title->max_students : null, ['class' => 'form-control', 'required' => 'required', 'min' => 1]) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-6 mt-4 mb-4">
        <div class="form-group">
            {!! Form::label('year', 'Año') !!}
            {!! Form::date('year', isset($year) && !empty($year) ? $year : null, ['class' => 'form-control', 'required' => 'required']) !!}
        </div>
    </div>
</div>
