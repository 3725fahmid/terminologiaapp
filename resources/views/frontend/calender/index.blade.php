@extends('layouts.app')

@section('title')
    Calender
@endsection

@section('cssLinks')


    <!-- Plugin css -->
    <link rel="stylesheet" href="{{ asset('backend/assets/libs/@fullcalendar/core/main.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('backend/assets/libs/@fullcalendar/daygrid/main.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('backend/assets/libs/@fullcalendar/bootstrap/main.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('backend/assets/libs/@fullcalendar/timegrid/main.min.css') }}" type="text/css">



@endsection

@section('admin')

<div class="page-content">
<div class="container-fluid">

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Calendar</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Upcube</a></li>
                    <li class="breadcrumb-item active">Calendar</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->

<div class="row mb-4">
    <div class="col-xl-3">
        <div class="card h-100">
            <div class="card-body">
                <button type="button" class="btn font-16 btn-primary waves-effect waves-light w-100"
                    id="btn-new-event" data-bs-toggle="modal" data-bs-target="#event-modal">
                    Create New Event
                </button>

                <div id="external-events">
                    <br>
                    <p class="text-muted">Drag and drop your event or click in the calendar</p>
                    <div class="external-event fc-event bg-success" data-class="bg-success">
                        <i class="mdi mdi-checkbox-blank-circle font-size-11 me-2"></i>New Event
                        Planning
                    </div>
                    <div class="external-event fc-event bg-info" data-class="bg-info">
                        <i class="mdi mdi-checkbox-blank-circle font-size-11 me-2"></i>Meeting
                    </div>
                    <div class="external-event fc-event bg-warning" data-class="bg-warning">
                        <i class="mdi mdi-checkbox-blank-circle font-size-11 me-2"></i>Generating
                        Reports
                    </div>
                    <div class="external-event fc-event bg-danger" data-class="bg-danger">
                        <i class="mdi mdi-checkbox-blank-circle font-size-11 me-2"></i>Create
                        New theme
                    </div>
                </div>
                
            </div>
        </div>
    </div> <!-- end col-->
    <div class="col-xl-9">
        <div class="card mb-0">
            <div class="card-body">
                <div id="calendar"></div>
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row-->
<div style='clear:both'></div>

<!-- Add New Event MODAL -->
<div class="modal fade" id="event-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header py-3 px-4">
                <h5 class="modal-title" id="modal-title">Event</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body p-4">
                <form class="needs-validation" name="event-form" id="form-event" novalidate>
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label">Event Name</label>
                                <input class="form-control" placeholder="Insert Event Name" type="text"
                                    name="title" id="event-title" required value="">
                                <div class="invalid-feedback">Please provide a valid event name
                                </div>
                            </div>
                        </div> <!-- end col-->
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label">Category</label>
                                <select class="form-select" name="category" id="event-category">
                                    <option  selected> --Select-- </option>
                                    <option value="bg-danger">Danger</option>
                                    <option value="bg-success">Success</option>
                                    <option value="bg-primary">Primary</option>
                                    <option value="bg-info">Info</option>
                                    <option value="bg-dark">Dark</option>
                                    <option value="bg-warning">Warning</option>
                                </select>
                                <div class="invalid-feedback">Please select a valid event
                                    category</div>
                            </div>
                        </div> <!-- end col-->
                    </div> <!-- end row-->
                    <div class="row mt-2">
                        <div class="col-6">
                            <button type="button" class="btn btn-danger"
                                id="btn-delete-event">Delete</button>
                        </div> <!-- end col-->
                        <div class="col-6 text-end">
                            <button type="button" class="btn btn-light me-1"
                                data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success" id="btn-save-event">Save</button>
                        </div> <!-- end col-->
                    </div> <!-- end row-->
                </form>
            </div>
        </div>
        <!-- end modal-content-->
    </div>
    <!-- end modal dialog-->
</div>
<!-- end modal-->

</div> <!-- container-fluid -->
</div>
<!-- End Page-content -->

@endsection

@section('scripts')

    <!-- plugin js -->
    <script src="{{ asset('backend/assets/libs/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/jquery-ui-dist/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/@fullcalendar/core/main.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/@fullcalendar/bootstrap/main.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/@fullcalendar/daygrid/main.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/@fullcalendar/timegrid/main.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/@fullcalendar/interaction/main.min.js') }}"></script>

    <!-- Calendar init -->
    {{-- <script src="{{ asset('backend/assets/js/pages/calendar.init.js') }}"></script> --}}




<script>
// Immediately Invoked Function Expression (IIFE) passing jQuery as parameter
!(function (g) {
"use strict"; // Enable strict mode for cleaner JavaScript

function e() {} // Constructor function

// Define init method on the prototype
(e.prototype.init = function () {
var l = g("#event-modal"), // Get modal element
    t = g("#modal-title"), // Get modal title element
    a = g("#form-event"), // Get form element
    i = null, // Variable to store selected event (for edit)
    r = null, // Variable to store selected date (for add)
    s = document.getElementsByClassName("needs-validation"), // Bootstrap validation element(s)
    i = null, // Duplicate declaration of i (same as above)
    r = null, // Duplicate declaration of r (same as above)
    e = new Date(), // Get current date
    n = e.getDate(), // Get current day
    d = e.getMonth(), // Get current month
    o = e.getFullYear(); // Get current year

// Initialize FullCalendar draggable functionality
new FullCalendarInteraction.Draggable(
    document.getElementById("external-events"), // Element containing external events
    {
        itemSelector: ".external-event", // Select draggable items
        eventData: function (e) {
            return {
                title: e.innerText, // Use inner text as event title
                className: g(e).data("class"), // Use data-class as event class
            };
        },
    }
);

// Define preset events for calendar
var c = [
        { title: "All Day Event", start: new Date(o, d, 1) },
        {
            title: "Long Event",
            start: new Date(o, d, n - 5),
            end: new Date(o, d, n - 2),
            className: "bg-warning",
        },
        {
            id: 999,
            title: "Repeating Event",
            start: new Date(o, d, n - 3, 16, 0),
            allDay: !1,
            className: "bg-info",
        },
        {
            id: 999,
            title: "Repeating Event",
            start: new Date(o, d, n + 4, 16, 0),
            allDay: !1,
            className: "bg-primary",
        },
        {
            title: "Meeting",
            start: new Date(o, d, n, 10, 30),
            allDay: !1,
            className: "bg-success",
        },
        {
            title: "Lunch",
            start: new Date(o, d, n, 12, 0),
            end: new Date(o, d, n, 14, 0),
            allDay: !1,
            className: "bg-danger",
        },
        {
            title: "Birthday Party",
            start: new Date(o, d, n + 1, 19, 0),
            end: new Date(o, d, n + 1, 22, 30),
            allDay: !1,
            className: "bg-success",
        },
        {
            title: "Click for Google",
            start: new Date(o, d, 28),
            end: new Date(o, d, 29),
            url: "http://google.com/",
            className: "bg-dark",
        },
    ],
    v =
        (document.getElementById("external-events"), // Executes but result unused
        document.getElementById("calendar")); // Get calendar element

// Function to show modal and prepare for adding new event
function u(e) {
    l.modal("show"), // Show the modal
        a.removeClass("was-validated"), // Remove validation class
        a[0].reset(), // Reset form fields
        g("#event-title").val(), // Clear title input
        g("#event-category").val(), // Clear category input
        t.text("Add Event"), // Set modal title
        (r = e); // Store clicked date
}

// Initialize FullCalendar
var m = new FullCalendar.Calendar(v, {
    plugins: ["bootstrap", "interaction", "dayGrid", "timeGrid"], // Load plugins
    editable: !0, // Allow event editing
    droppable: !0, // Allow external drag-and-drop
    selectable: !0, // Allow date selection
    defaultView: "dayGridMonth", // Set default view
    themeSystem: "bootstrap", // Use Bootstrap theme
    header: {
        left: "prev,next today", // Set left header buttons
        center: "title", // Set center header (title)
        right: "dayGridMonth,timeGridWeek,timeGridDay,listMonth", // Set right header buttons
    },
    eventClick: function (e) {
        l.modal("show"), // Show modal
            a[0].reset(), // Reset form
            (i = e.event), // Store selected event
            g("#event-title").val(i.title), // Fill title input
            g("#event-category").val(i.classNames[0]), // Fill category input
            (r = null), // Reset date variable
            t.text("Edit Event"), // Change modal title
            (r = null); // Reset date variable again
    },
    dateClick: function (e) {
        u(e); // Open modal with selected date
    },
    events: c, // Load predefined events
});

m.render(), // Render calendar

    // Handle event form submission
    g(a).on("submit", function (e) {
        e.preventDefault(); // Prevent default form action
        g("#form-event :input"); // Select form inputs (not used)

        var t,
            a = g("#event-title").val(), // Get event title from input
            n = g("#event-category").val(); // Get category/class

        // Validate form
        !1 === s[0].checkValidity()
            ? (event.preventDefault(), // Prevent form submission
                event.stopPropagation(), // Stop event bubbling
                s[0].classList.add("was-validated")) // Add validation style
            : (i // If editing existing event
                    ? (i.setProp("title", a), // Update title
                    i.setProp("classNames", [n])) // Update class
                    : ((t = {
                        title: a, // New event title
                        start: r.date, // Date from click
                        allDay: r.allDay, // All-day flag
                        className: n, // Class/category
                    }),
                    m.addEvent(t)), // Add new event to calendar
                l.modal("hide")); // Hide modal after submit
    }),

    // Handle delete event button
    g("#btn-delete-event").on("click", function (e) {
        i && (i.remove(), (i = null), l.modal("hide")); // If event selected, remove it
    }),

    // Handle "New Event" button click
    g("#btn-new-event").on("click", function (e) {
        u({ date: new Date(), allDay: !0 }); // Open modal with today's date
    });
}),

// Instantiate CalendarPage object
(g.CalendarPage = new e()),

// Set constructor reference
(g.CalendarPage.Constructor = e);

})(window.jQuery), // Pass jQuery to the IIFE

// Auto-run calendar init when DOM is ready
(function () {
"use strict"; // Strict mode
window.jQuery.CalendarPage.init(); // Call init function
})();

</script>



@endsection


