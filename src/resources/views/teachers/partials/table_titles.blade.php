<div class="col-6">
    <div class="table_wrapper">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Tiulación</th>
                </tr>
            </thead>

            <tbody>
                @if(!empty($titles) && $titles->count())
                    @foreach($titles as $value)
                        <tr>
                            <td>
                                <a href="{{ route('titles.edit', $value) }}">
                                    {{ $value->name }}
                                </a>
                            </td>
                        </tr>
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
