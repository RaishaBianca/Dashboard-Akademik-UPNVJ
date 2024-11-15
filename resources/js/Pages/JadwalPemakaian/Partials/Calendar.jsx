import FullCalendar from "@fullcalendar/react";
import dayGridPlugin from '@fullcalendar/daygrid'

export default function Calendar({ events}) {

  function renderEventContent(eventInfo) {
    console.log(eventInfo)
    return (
      <div>
        <i>{eventInfo.timeText}</i>
        <br />
        <span className="text-xs font-semibold">{eventInfo.event.title}</span>
      </div>
    )
  }

  return (
    <FullCalendar
      plugins={[dayGridPlugin]}
      initialView='dayGridWeek'
      headerToolbar={{
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth, dayGridWeek'
      }}
      weekends={false}
      events={events}
      eventContent={renderEventContent}
    />
  )
}