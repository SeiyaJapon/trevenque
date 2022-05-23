@extends('layouts.app')

@section('header')

    <div class="row">
        <div class="col-6">Dashboard</div>
        <div class="col-6 text-end"></div>
    </div>
@stop

@section('content')
    <div class="mt-4 mb-5">
        <div class="row">
            <div class="col-12">
                <div class="table_wrapper">
                    @if(!empty($users) && $users->count())
                        @foreach($users as $user)
                            <h2>{{ $user->name }} {{ $user->surname }}</h2>
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Titulación</th>
                                            <th>Convocatoria</th>
                                            <th>Nota</th>
                                            <th>Año</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($user->qualifications as $qualification)
                                        <tr>
                                            <td>
                                                {{ $qualification->course->name }}
                                            </td>
                                            <td>
                                                {{ $qualification->tries }}
                                            </td>
                                            <td>
                                                <strong>{{ $qualification->note }}</strong>
                                            </td>
                                            <td>
                                                {{ \Carbon\Carbon::createFromDate($qualification->year)->year }}
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                        @endforeach
                    @else
                        <tr>
                            <td>There are no data.</td>
                        </tr>
                    @endif
                </div>
            </div>
        </div>
    </div>

@stop

@section('css')
@stop

@section('js')
@stop
