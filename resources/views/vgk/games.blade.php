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
                        start: '{{ $event->start }}',
                        end: '{{ $event->end }}',
                        backgroundColor: '{{ (strpos($event->title, '@') !== false) ? '#2F3D40' : '#B8975C' }}',
                        borderColor: '{{ (strpos($event->title, '@') !== false) ? '#2F3D40' : '#B8975C' }}',
                        textColor: '{{  (strpos($event->title, '@') !== false) ? 'white' : 'black'  }}'
                    },
                    @endforeach
                ]
            });

            calendar.render();
        })
    </script>

    <div class="md:p-5">
        <div id="calendar"></div>
    </div>

@endsection
