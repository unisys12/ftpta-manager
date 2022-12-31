<script>
import FullCalendar from '@fullcalendar/vue3'
import dayGridPlugin from '@fullcalendar/daygrid'
import timeGridPlugin from '@fullcalendar/timegrid'
import interactionPlugin from '@fullcalendar/interaction'

export default {
  components: {
    FullCalendar
  },
  props: {
    events: Array
  },
  data() {
    return {
      calendarOptions: {
        plugins: [ dayGridPlugin, timeGridPlugin, interactionPlugin ],
        initialView: 'dayGridMonth',
        headerToolbar: {
          left: 'prev,next today',
          center: 'title',
          right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        events: this.$props.events,
        },
    }
  },
  computed: {
    getEvents() {
        console.log(this.$props.events)
    }
  }
}
</script>
<template>
  <section>
    <FullCalendar :options="calendarOptions" />
  </section>
</template>
