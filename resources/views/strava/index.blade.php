@extends('layouts.header')

@section('content')
    <div class="container my-12 mx-auto px-4 md:px-12 h-full" id="sites">
        <h1 class="text-2xl dark:text-white">{{ $athlete->firstname . ' ' . $athlete->lastname  }}'s Recent Strava Activity</h1>

        <table class="min-w-max w-full table-auto m-2">
            <thead>
                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal dark:text-white dark:bg-gray-800">
                    <td class="px-3 py-3">Activity Name</td>
                    <td class="px-3 py-3">Distance</td>
                    <td class="px-3 py-3">Moving Time</td>
                    <td class="px-3 py-3">Elapsed Time</td>
                    <td class="px-3 py-3">Elevation Gain</td>
                    <td class="px-3 py-3">Activity Type</td>
                    <td class="px-3 py-3">Date</td>
                </tr>
            </thead>
            <tbody  class="text-gray-600 text-sm dark:text-white">
                @foreach($activities as $key => $activity) 
                    <tr class="border-b border-gray-200 hover:bg-gray-300 dark:hover:bg-gray-600">
                        <td class="px-3 py-3">{{ $activity['name'] }}</td>
                        <td class="px-3 py-3">{{ $activity['distance'] }}</td>
                        <td class="px-3 py-3">{{ $activity['moving_time'] }}</td>
                        <td class="px-3 py-3">{{ $activity['elapsed_time'] }}</td>
                        <td class="px-3 py-3">{{ $activity['elevation_gain'] }}</td>
                        <td class="px-3 py-3">{{ $activity['type'] }}</td>
                        <td class="px-3 py-3">{{ $activity['date'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection