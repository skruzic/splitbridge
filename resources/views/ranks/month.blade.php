@extends('layouts.master')

@section('content')
    <h1>Rang lista: {{ \Carbon\Carbon::parse($date)->isoFormat('MMMM YYYY.') }}</h1>
    <table class="table table-striped" id="dec">
        <thead>
            <tr>
                <th>#</th>
                <th>Član</th>
                <th>Bodovi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ranks as $rank)
                <tr>
                    <td>{{ $count++ }}.</td>
                    <td><a href="{{ route('members.show', $rank->id) }}">{{ $rank->surname . ' ' . $rank->name }}</a>
                    </td>
                    <td>{{ $rank->point_count }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <nav role="navigation" aria-label="Pagination Navigation">
        <ul class="pagination justify-content-center">
            {{-- Previous Page Link --}}
            @if ($prev->lt(\Illuminate\Support\Carbon::create(2014, 9, 30)))
                <li class="page-item disabled" aria-disabled="true">
                    <span class="page-link">{!! __('pagination.previous') !!}</span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ route('ranks.month', [$prev->year, $prev->month]) }}" rel="prev">
                        {!! __('pagination.previous') !!}
                    </a>
                </li>
            @endif

            {{-- Next Page Link --}}
            @if ($next->lt(now()))
                <li class="page-item">
                    <a class="page-link" href="{{ route('ranks.month', [$next->year, $next->month]) }}"
                       rel="next">{!! __('pagination.next') !!}</a>
                </li>
            @else
                <li class="page-item disabled" aria-disabled="true">
                    <span class="page-link">{!! __('pagination.next') !!}</span>
                </li>
            @endif
        </ul>
    </nav>
@stop

@section('title')
    Rang lista za {{ lcfirst(strftime('%B %Y.', strtotime($date))) }} ::
@stop
