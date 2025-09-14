<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Calendar - CampusNest</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <?php include 'views/nav.php'; ?>

    <main class="page-content">
        <div class="calendar-wrapper">

  <!-- LEFT: Calendar -->
  <div class="calendar-container">
    <div class="calendar-header">
      <div class="calendar-nav" style="display:flex; align-items:center;">
        <button class="nav-btn" onclick="calendar.previousMonth()">‹</button>
        <h2 id="monthYear" style="margin: 0 12px;">Month Year</h2>
        <button class="nav-btn" onclick="calendar.nextMonth()">›</button>
      </div>
      <div>
        <button class="btn btn-light" onclick="calendar.goToToday()">Today</button>
        <button class="btn btn-primary" onclick="calendar.showAddEvent()">Add Event</button>
      </div>
    </div>

    <div class="calendar-grid">
      <div class="calendar-weekdays">
        <div>Sun</div><div>Mon</div><div>Tue</div><div>Wed</div><div>Thu</div><div>Fri</div><div>Sat</div>
      </div>
      <div class="calendar-days" id="calendarDays"></div>
    </div>
  </div>

  <!-- RIGHT: Events list -->
  <div class="events-panel">
    <h3>Events</h3>
    <div id="eventsList" class="events-list">
      <p class="no-events">No events</p>
    </div>
  </div>

</div>

<!-- keep your existing Add Event Modal unchanged (ids must match) -->


        <!-- Add Event Modal -->
        <div class="modal" id="addEventModal">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Add New Event</h3>
                    <button class="close-btn" onclick="calendar.hideAddEvent()">×</button>
                </div>
                <form id="addEventForm">
                    <div class="form-group">
                        <label for="eventTitle">Event Title</label>
                        <input type="text" id="eventTitle" required>
                    </div>
                    <div class="form-group">
                        <label for="eventDate">Date</label>
                        <input type="date" id="eventDate" required>
                    </div>
                    <div class="form-group">
                        <label for="eventTime">Time</label>
                        <input type="time" id="eventTime" required>
                    </div>
                    <div class="form-group">
                        <label for="eventType">Type</label>
                        <select id="eventType" required>
                            <option value="class">Class</option>
                            <option value="exam">Exam</option>
                            <option value="assignment">Assignment</option>
                            <option value="meeting">Meeting</option>
                            <option value="personal">Personal</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="eventDescription">Description</label>
                        <textarea id="eventDescription" rows="3"></textarea>
                    </div>
                    <div class="form-actions">
                        <button type="button" class="btn btn-light" onclick="calendar.hideAddEvent()">Cancel</button>
                        <button type="submit" class="btn btn-primary">Add Event</button>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <?php include 'views/footer.php'; ?>
    <script src="js/app.js"></script>
</body>
</html>
