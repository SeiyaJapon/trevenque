@extends('layouts.app')

@section('header')
    <div class="row">
        <div class="col-6">{{ $action }} titulación</div>
        <div class="col-6 text-end">
            <a href="#" class="btn btn-sm btn btn-outline-danger btn-remove">
                Eliminar
            </a>
        </div>
    </div>
@stop

@section('content')
    <div class="table_wrapper">
        @if (false === $model)
            {!! Form::open(['route' => ['courses.store'], 'method' => 'POST']) !!}
        @else
            {!! Form::open(['route' => ['courses.destroy', ['id' => $course]], 'method' => 'DELETE', 'id' => 'deleteItem']) !!}
            {!! Form::close() !!}

            {!! Form::model($course, ['route' => ['courses.update', ['id' => $course]], 'method' => 'PUT']) !!}
        @endif
        {{--        <form action="{{ route('products.store') }}" method="POST">--}}
        {{--            @csrf--}}
        <div class="card-body">
            @include('teachers.courses.partials.fields')
        </div>

        <div class="row">
            <div class="col-6">
                <input type="submit" class="btn btn-primary" value="Guardar">
            </div>
            <div class="col-6 text-end">
                <a href="{{ route('teachers.dashboard') }}" class="btn btn-secondary ">
                    Volver
                </a>
            </div>
        </div>
        {{--        </form>--}}
        {!! Form::close() !!}
    </div>
@stop

@section('css')
@stop

@section('js')
    <script>
        $('.btn-remove').on('click', function (e) {
            e.preventDefault();

            removeBtn()
        });

        function removeBtn() {
            if (window.confirm('¿Esta seguro que desea borrar esta asignatura?')) {
                $('#deleteItem').submit();
            }
        }
    </script>
@stop
