@extends('layouts.vgk')

@section('content')

    <div class="md:w-0 lg:w-1/5"></div>
    <div class="flex flex-column md:w-100 lg:w-3/5">
    
        @foreach ($standings['teams'] as $key => $division)
            <h2 class="text-5xl p-3">{{ $standings['divisions'][$key] }} Division</h2>
                <div class="p-2">
                    <table class="table table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th>Rank</th>
                                <th>Name</th>
                                <th>GP</th>
                                <th>W</th>
                                <th>L</th>
                                <th>OT</th>
                                <th>PTS</th>
                            </tr>
                        </thead>
                        <tbody >
                            @foreach ($division as $teamKey => $team)
                                <tr bgcolor="{{ ($team->team->id == $vgkId) ? '#B8975C' : ''}}" >
                                    <td>{{ $teamKey + 1 }}</td>
                                    <td>{{ $team->team->name }}</td>
                                    <td>{{ $team->stat->gamesPlayed }}</td>
                                    <td>{{ $team->stat->wins }}</td>
                                    <td>{{ $team->stat->losses }}</td>
                                    <td>{{ $team->stat->ot }}</td>
                                    <td>{{ $team->stat->pts }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
        @endforeach
    </div>
    <div class="md:w-0 lg:w-1/5"></div>

@endsection
