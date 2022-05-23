@extends('layouts.app')

@section('header')

    <div class="row">
        <div class="col-6">Dashboard</div>
        <div class="col-6 text-end">
            <a href="{{ route('qualifications.index') }}" class="btn btn-sm btn btn-outline-success">
                Calificar
            </a>
        </div>
    </div>
@stop

@section('content')
    <div class="mt-4 mb-5">
        <div class="row">
            <div class="col-6 text-center">
                <a href="{{ route('titles.create') }}" class="btn btn-primary">
                    Crear Titulación
                </a>
            </div>

            <div class="col-6 text-center">
                <a href="{{ route('courses.create') }}" class="btn btn-warning">
                    Crear Asignatura
                </a>
            </div>
        </div>
    </div>

    <div class="mt-4 mb-5">
        <hr>
    </div>

    <div class="mt-4 mb-5">
        <div class="row">
            @include('teachers.partials.table_titles')

            @include('teachers.partials.table_courses')
        </div>
    </div>

@stop

@section('css')
@stop

@section('js')
@stop
