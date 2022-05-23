@extends('layouts.app')

@section('header')

    <div class="row">
        <div class="col-6">Calificar</div>
        <div class="col-6 text-end">
        </div>
    </div>
@stop

@section('content')
    <div class="mt-4 mb-5">
        <div class="row">
            @include('teachers.qualifications.partials.table_qualifications')
        </div>
    </div>

@stop

@section('css')
@stop

@section('js')
@stop
