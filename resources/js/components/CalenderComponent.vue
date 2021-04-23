<template>
    <div class="container">
        <full-calendar
            :events="calendarEvents"
            :header="{
                    left: 'prev, next today',
                    center: 'title',
                    right: 'dayGridMonth, timeGridWeek, timeGridDay, listWeek',
                }"
        >
        </full-calendar>
    </div>
</template>

<script>

    export default {
        data() {
            return {
                calendarEvents: [{
                    events(start, end, timezone, callback) {
                        axios.get('localhost:81/calender').then(res => {
                            callback(res.data.eventList)
                        })
                    },
                    color: 'blue',
                    textColor: 'white',
                }]
            }
        }
    }

</script>

<style scoped>

</style>
