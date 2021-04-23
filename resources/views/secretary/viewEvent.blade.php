@extends('admin.app')

@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <h2>Welcome - {{Auth::user()->first_name." ".Auth::user()->last_name}}</h2>


            <div id='calendar'></div>

    </div>

    <!-- day click dialog -->


    <!-- /day click dialog -->

    <script>

        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
                },
                navLinks: true, // can click day/week names to navigate views
                businessHours: true, // display business hours
                editable: true,
                selectable: true,
                events: [
                    {
                        title: 'Business Lunch',
                        start: '2020-09-03T13:00:00',
                        constraint: 'businessHours'
                    },
                    {
                        title: 'Meeting',
                        start: '2020-09-13T11:00:00',
                        constraint: 'availableForMeeting', // defined below
                        color: '#257e4a'
                    },
                    {
                        title: 'Conference',
                        start: '2020-09-18',
                        end: '2020-09-20'
                    },
                    {
                        title: 'Party',
                        start: '2020-09-29T20:00:00'
                    },

                    // areas where "Meeting" must be dropped
                    {
                        groupId: 'availableForMeeting',
                        start: '2020-09-11T10:00:00',
                        end: '2020-09-11T16:00:00',
                        display: 'background'
                    },
                    {
                        groupId: 'availableForMeeting',
                        start: '2020-09-13T10:00:00',
                        end: '2020-09-13T16:00:00',
                        display: 'background'
                    },

                    // red areas where no events can be dropped
                    {
                        start: '2020-09-24',
                        end: '2020-09-28',
                        overlap: false,
                        display: 'background',
                        color: '#ff9f89'
                    },
                    {
                        start: '2020-09-06',
                        end: '2020-09-08',
                        overlap: false,
                        display: 'background',
                        color: '#ff9f89'
                    }
                ],

                selectHelper: true,
                select:function(start, end, allDay)
                {
                    var title = prompt('Event Title:');
                    var start  = prompt('Start Date:');
                    var end = prompt('End Date:');
                    if(title)
                    {
                        var start = $.fullCalendar.formatDate(start, 'Y-MM-DD HH:mm:ss');

                        var end = $.fullCalendar.formatDate(end, 'Y-MM-DD HH:mm:ss');

                        $.ajax({
                            url:"/full-calender/action",
                            type:"POST",
                            data:{
                                title: title,
                                start: start,
                                end: end,
                                type: 'add'
                            },
                            success:function(data)
                            {
                                calendar.fullCalendar('refetchEvents');
                                alert("Event Created Successfully");
                            }
                        })
                    }
                }

            });

            calendar.render();



        });

    </script>


    <!-- /page content -->
@endsection
