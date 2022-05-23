<div class="col-12">
    @if(!empty($students) && $students->count())
        @foreach($students as $student)
            <h3>{{ $student->name }}</h3>

            {!! Form::model($student, ['route' => ['qualifications.store'], 'method' => 'POST']) !!}

                <input name="user_id" type="hidden" value="{{ $student->id }}">

                @if(!empty($student->courses) && $student->courses->count())
                    @foreach($student->courses as $course)
                        <div class="mt-5">
                            <div class="form-group">
                                {!! Form::label('note', "{$course->name} ({$course->title->name})") !!}
                                {!! Form::number('note[]', ($course->qualifications->isNotEmpty()) ? $course->qualifications->first()->note : null, ['class' => 'form-control', 'required' => 'required']) !!}
                            </div>
                            <div class="form-group mt-4">
                                {!! Form::label('tries', "Convocatorias") !!}
                                {!! Form::number('tries[]', ($course->qualifications->isNotEmpty()) ? $course->qualifications->first()->tries : 0, ['class' => 'form-control', 'required' => 'required', 'min' => '1', 'max' => 2]) !!}
                            </div>

                            <input type="hidden" name="course_id[]" value="{{ $course->id }}">
                            <input type="hidden" name="user_id[]" value="{{ $student->id }}">
                        </div>
                    @endforeach
                @endif

                <div class="row mt-5">
                    <div class="col-6">
                        <input type="submit" class="btn btn-primary" value="Guardar">
                    </div>
                    <div class="col-6 text-end">
                        <a href="{{ route('teachers.dashboard') }}" class="btn btn-secondary ">
                            Volver
                        </a>
                    </div>
                </div>
            {!! Form::close() !!}

            @if (! $loop->last)
                <hr>
            @endif
        @endforeach
    @else
        <tr>
            <td>There are no data.</td>
        </tr>
    @endif
</div>
