<div class="col-6">
    <div class="table_wrapper">
        <table class="table table-hover table-dark">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Titulación</th>
                    <th>Creditos</th>
                    <th>Max. Alum.</th>
                </tr>
            </thead>

            <tbody>
                @if(!empty($titles) && $titles->count())
                    @foreach($titles as $title)
                        @foreach($title->courses as $course)
                            <tr>
                                <td>
                                    <a href="{{ route('courses.edit', $course) }}" class="link-warning">
                                        {{ $course->name }}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('titles.edit', $course->title) }}" class="link-warning">
                                        {{ $course->title->name }}
                                    </a>
                                </td>
                                <td>{{ $course->credits }}</td>
                                <td>{{ $course->max_students }}</td>
                            </tr>
                        @endforeach
                    @endforeach
                @else
                    <tr>
                        <td>There are no data.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
