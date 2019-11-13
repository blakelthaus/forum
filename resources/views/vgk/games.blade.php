@extends('layouts.vgk')

@section('content')

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                plugins: ['dayGrid'],
                events: [
                    @foreach ($events as $event)
                    {
                        title: '{{ $event->title }}',
                        start: '{{ $event->start->format('Y-m-d') }}',
                        end: '{{ $event->end->format('Y-m-d') }}',
                        backgroundColor: '{{ (strpos($event->title, '@') !== false) ? '#2F3D40' : '#B8975C' }}',
                        textColor: '{{  (strpos($event->title, '@') !== false) ? 'white' : 'black'  }}'
                    },
                    @endforeach
                ]
            });

            calendar.render();
        })
    </script>

    <div class="p-5">
        <div id="calendar"></div>
    </div>

@endsection
