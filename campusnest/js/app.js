
// Goal: keep the code easy to read and explain how things work.
// Tip: search for the section headers (CHAT, CALENDAR, ROOMS, SUPPORT)
// =============================================================
function el(id) { return document.getElementById(id); }
function setHTML(id, html) { var n = el(id); if (n) n.innerHTML = html; }

// =============================================================
// CHAT GROUPS (fake in‑memory data + very simple UI updates)
// =============================================================
var currentGroup = null;
var groups = [
            {
                id: 1,
                name: 'Computer Science',
                members: 24,
                lastMessage: 'Anyone up for studying algorithms?',
                lastTime: '2 min ago',
                messages: [
            { user: 'Alice', message: 'Hi everyone!', time: '10:30 AM' },
            { user: 'Bob', message: 'Hello! How is everyone doing?', time: '10:32 AM' }
                ]
            },
            {
                id: 2,
                name: 'Mathematics',
                members: 18,
                lastMessage: 'Calculus exam next week!',
                lastTime: '15 min ago',
                messages: [
            { user: 'David', message: 'Calculus exam next week!', time: '10:20 AM' },
            { user: 'Eva', message: 'I need help with derivatives', time: '10:22 AM' }
        ]
    }
];

// Simple Chat Functions
function initChatGroups() {
    var groupList = el('groupList');
    if (!groupList) return;
    var html = '';
    for (var i = 0; i < groups.length; i++) {
        var g = groups[i];
        html += '<div class="group-item" onclick="selectGroup(' + g.id + ')">' +
                '<h4>' + g.name + '</h4>' +
                '<p>' + g.members + ' members</p>' +
                '</div>';
    }
    groupList.innerHTML = html;
    if (!currentGroup && groups.length) {
        selectGroup(groups[0].id);
    }
}

function selectGroup(groupId) {
    for (var i = 0; i < groups.length; i++) {
        if (groups[i].id === groupId) {
            currentGroup = groups[i];
            break;
        }
    }

    var chatHeader = el('chatHeader');
    var chatMessages = el('chatMessages');
    var chatInput = el('chatInput');

    if (chatHeader && currentGroup) {
        chatHeader.innerHTML = '<h3>' + currentGroup.name + '</h3>';
    }

    if (chatMessages && currentGroup) {
        var messagesHtml = '';
        for (var i = 0; i < currentGroup.messages.length; i++) {
            var msg = currentGroup.messages[i];
            messagesHtml += '<div class="message"><strong>' + msg.user + ':</strong> ' + msg.message + '</div>';
        }
        chatMessages.innerHTML = messagesHtml;
        chatMessages.scrollTop = chatMessages.scrollHeight;
    }
    if (chatInput) chatInput.style.display = 'block';
}

function sendMessage() {
    var input = el('messageInput');
    if (!input || !currentGroup || !input.value.trim()) return;

    var message = input.value.trim();
    currentGroup.messages.push({
        user: 'You',
        message: message,
        time: new Date().toLocaleTimeString()
    });

    selectGroup(currentGroup.id); // Refresh chat
    input.value = '';
}

// Create Group (simple prompt-based)
function createGroup() {
    var name = prompt('Enter group name:');
    if (!name || !name.trim()) return;
    var newGroup = {
        id: Date.now(),
        name: name.trim(),
        members: 1,
        lastMessage: 'Group created',
        lastTime: 'Just now',
        messages: [ { user: 'System', message: 'Group created!', time: new Date().toLocaleTimeString([], {hour:'2-digit', minute:'2-digit'}) } ]
    };
    groups.unshift(newGroup);
    initChatGroups();
    selectGroup(newGroup.id);
}


// CALENDAR (stores events in localStorage so they persist)
// ----------------------- CALENDAR -----------------------
var currentDate = new Date();
var today = new Date();
var selectedDate = new Date(); // defaults to today

// load events (array of { id, title, date: "YYYY-MM-DD", time, type, description })
var events = JSON.parse(localStorage.getItem('calendarEvents') || '[]');

// helper save
function saveEvents(){ localStorage.setItem('calendarEvents', JSON.stringify(events)); }

// helper id
function makeId(){ return Date.now().toString(36) + Math.random().toString(36).slice(2,8); }

// normalize existing events to ensure ids exist
let normalized = false;
for (let i=0;i<events.length;i++){ if (!events[i].id){ events[i].id = makeId(); normalized = true; } }
if (normalized) saveEvents();

// calendar controller for UI buttons
window.calendar = {
  init: function(){ selectedDate = new Date(); currentDate = new Date(); renderCalendar(); },
  previousMonth: function(){ currentDate.setMonth(currentDate.getMonth()-1); renderCalendar(); },
  nextMonth: function(){ currentDate.setMonth(currentDate.getMonth()+1); renderCalendar(); },
  showAddEvent: showAddEvent,
  hideAddEvent: hideAddEvent,
  goToToday: function(){ currentDate = new Date(); selectedDate = new Date(); renderCalendar(); }
};

function renderCalendar(){
  // header
  var monthYear = document.getElementById('monthYear');
  if (monthYear) monthYear.textContent = currentDate.toLocaleDateString('en-US', { month:'long', year:'numeric' });

  // build days
  renderCalendarDays(currentDate.getFullYear(), currentDate.getMonth());

  // update events list for selected
  renderEventsForSelected();
}

function renderCalendarDays(year, month){
  const calendarDays = document.getElementById('calendarDays');
  if (!calendarDays) return;
  calendarDays.innerHTML = '';

  const firstDay = new Date(year, month, 1).getDay(); // 0=Sun
  const lastDate = new Date(year, month+1, 0).getDate();

  // leading placeholders
  for (let i=0;i<firstDay;i++){
    const ph = document.createElement('div');
    ph.className = 'calendar-day placeholder';
    ph.style.visibility='hidden';
    calendarDays.appendChild(ph);
  }

  for (let d=1; d<=lastDate; d++){
    const dateObj = new Date(year, month, d);
    const dateStr = dateObj.toISOString().split('T')[0];

    // count events for day
    const dayEvents = events.filter(e => e.date === dateStr);
    let markHtml = '<div class="events-mark"></div>';
    if (dayEvents.length === 1) markHtml = '<div class="events-mark"><span class="event-dot" title="1 event"></span></div>';
    else if (dayEvents.length > 1) markHtml = `<div class="events-mark"><span class="event-count" title="${dayEvents.length}">${dayEvents.length}</span></div>`;

    const dayEl = document.createElement('div');
    dayEl.className = 'calendar-day';
    dayEl.dataset.date = dateStr;
    dayEl.innerHTML = `<div class="date-number">${d}</div>${markHtml}`;

    dayEl.addEventListener('click', function(){
      selectedDate = new Date(dateStr);
      // update current month if user clicked outside current month (safer)
      currentDate.setFullYear(selectedDate.getFullYear(), selectedDate.getMonth());
      renderCalendar();
    });

    // highlight today & selected
    if (dateObj.toDateString() === today.toDateString()) dayEl.classList.add('today');
    if (selectedDate && dateObj.toDateString() === selectedDate.toDateString()) dayEl.classList.add('active-day');

    calendarDays.appendChild(dayEl);
  }

  // trailing placeholders to round out the grid
  const totalCells = calendarDays.children.length;
  const remainder = totalCells % 7;
  if (remainder !== 0) {
    const toAdd = 7 - remainder;
    for (let i=0;i<toAdd;i++){
      const ph = document.createElement('div');
      ph.className = 'calendar-day placeholder';
      ph.style.visibility='hidden';
      calendarDays.appendChild(ph);
    }
  }
}

function showAddEvent(){
  const modal = document.getElementById('addEventModal');
  const eventDateInput = document.getElementById('eventDate');
  if (modal) modal.style.display = 'flex';
  const defaultDate = selectedDate || today || new Date();
  if (eventDateInput) eventDateInput.value = defaultDate.toISOString().split('T')[0];

  // bind form submit once
  const form = document.getElementById('addEventForm');
  if (form && !form.dataset.bound){
    form.addEventListener('submit', function(e){
      e.preventDefault();
      const newEvent = {
        id: makeId(),
        title: (document.getElementById('eventTitle')||{}).value || '',
        date: (document.getElementById('eventDate')||{}).value || '',
        time: (document.getElementById('eventTime')||{}).value || '',
        type: (document.getElementById('eventType')||{}).value || '',
        description: (document.getElementById('eventDescription')||{}).value || ''
      };
      if (!newEvent.title || !newEvent.date) return;
      events.push(newEvent);
      saveEvents();
      form.reset();
      hideAddEvent();
      // after add: select that date and re-render
      selectedDate = new Date(newEvent.date);
      renderCalendar();
      renderEventsForSelected();
    });
    form.dataset.bound = '1';
  }

function addEvent() {
    const title = document.getElementById("eventTitle").value;
    const date = document.getElementById("eventDate").value;
    const time = document.getElementById("eventTime").value;
    const type = document.getElementById("eventType").value;
    const description = document.getElementById("eventDescription").value;

    if (!title || !date) {
        alert("Please enter a title and date.");
        return;
    }

    const event = {
        id: Date.now().toString(),
        title,
        date,       // saved as YYYY-MM-DD
        time,
        type,
        description
    };

    events.push(event);
    saveEvents();

    // Render events for this date
    renderEventsForSelected(date);

    closeModal();
}

}

function hideAddEvent(){
  const modal = document.getElementById('addEventModal');
  if (modal) modal.style.display = 'none';
}

function renderEventsForSelected(date) {
    const list = document.getElementById("eventsList");
    if (!list) return;

    // filter by date
    const dayEvents = events.filter(ev => ev.date === date); // cmedel

    if (dayEvents.length === 0) {
        list.innerHTML = "<p>No events</p>";
        return;
    }

    let html = "";
    dayEvents.forEach(ev => {
        html += `
          <div class="event-item ${ev.type}">
            <div class="event-time">${ev.time || ''}</div>
            <div class="event-content">
              <h4>${ev.title}</h4>
              <p>${ev.description || ''}</p>
            </div>
          </div>
        `;
    });

    list.innerHTML = html;
}

function deleteEvent(id){
  const idx = events.findIndex(e => String(e.id) === String(id));
  if (idx !== -1) {
    events.splice(idx, 1);
    saveEvents();
    renderCalendar();
    renderEventsForSelected();
}

 function initCalendar() {
    renderCalendar();
    const today = new Date().toISOString().split("T")[0]; // YYYY-MM-DD
    renderEventsForSelected(today);
}
 
}

// initialize when page loads
document.addEventListener('DOMContentLoaded', function(){
  // If the file has other init logic based on page, keep that; otherwise init calendar
  try { calendar.init(); } catch(e) { /* ignore if calendar not present */ }
});


// ROOM FINDER (static list + filter / sort on the client)

var rooms = [
    { id: 1, building: 'North Hall', room: '101', type: 'Single', price: 800, available: true },
    { id: 2, building: 'South Hall', room: '201', type: 'Double', price: 600, available: true },
    { id: 3, building: 'East Hall', room: '301', type: 'Suite', price: 1200, available: false }
];

function initRoomFinder() {
    renderRooms();
}

function renderRooms() {
    var roomsGrid = el('roomsGrid');
        if (!roomsGrid) return;

    var html = '';
    for (var i = 0; i < rooms.length; i++) {
        var room = rooms[i];
        var status = room.available ? 'Available' : 'Reserved';
        html += '<div class="room-card">' +
               '<h4>' + room.building + ' - Room ' + room.room + '</h4>' +
               '<p>' + room.type + ' Room</p>' +
               '<p>$' + room.price + '/month</p>' +
               '<p>Status: ' + status + '</p>' +
               (room.available ? '<button onclick="reserveRoom(' + room.id + ')">Reserve</button>' : '') +
               '</div>';
    }
    roomsGrid.innerHTML = html;
}

function reserveRoom(roomId) {
    for (var i = 0; i < rooms.length; i++) {
        if (rooms[i].id === roomId) {
            rooms[i].available = false;
            break;
        }
    }
    alert('Room reserved successfully!');
    renderRooms();
}


// SUPPORT (modals + faq toggling)

function initSupport() {
    // Support page is initialized
}

function openLiveChat() {
    var modal = el('liveChatModal');
        if (modal) {
            modal.style.display = 'flex';
        }
    }

function closeLiveChat() {
    var modal = el('liveChatModal');
        if (modal) {
            modal.style.display = 'none';
        }
    }

function sendChatMessage() {
    var input = el('chatInput');
    if (!input || !input.value.trim()) return;

    var chatMessages = el('chatMessages');
    if (chatMessages) {
        var messageDiv = document.createElement('div');
        messageDiv.innerHTML = '<strong>You:</strong> ' + input.value;
        chatMessages.appendChild(messageDiv);

        // Simple auto-response
        setTimeout(function() {
            var responseDiv = document.createElement('div');
            responseDiv.innerHTML = '<strong>Support:</strong> Thank you for your message!';
            chatMessages.appendChild(responseDiv);
        }, 1000);
    }

    input.value = '';
}

// Ticket modal + FAQ helpers
function openTicketSystem() {
    var modal = el('ticketModal');
    if (modal) modal.style.display = 'flex';
    var form = el('ticketForm');
    if (form && !form.dataset.bound) {
        form.addEventListener('submit', function(e){
            e.preventDefault();
            alert('Ticket submitted! We will get back to you soon.');
            closeTicketSystem();
        });
        form.dataset.bound = '1';
    }
}

function closeTicketSystem() {
    var modal = el('ticketModal');
    if (modal) modal.style.display = 'none';
    var form = el('ticketForm');
    if (form) form.reset();
}

function showFAQ() {
    var faq = el('faqSection');
    var contact = el('contactSection');
    if (faq) faq.style.display = 'block';
    if (contact) contact.style.display = 'none';
}

function showContactInfo() {
    var faq = el('faqSection');
    var contact = el('contactSection');
    if (contact) contact.style.display = 'block';
    if (faq) faq.style.display = 'none';
}

function toggleFAQ(trigger) {
    var item = trigger.parentElement;
    var answer = item ? item.querySelector('.faq-answer') : null;
    var toggle = trigger.querySelector('.faq-toggle');
    if (!answer || !toggle) return;
    if (answer.style.display === 'block') {
        answer.style.display = 'none';
        toggle.textContent = '+';
    } else {
        answer.style.display = 'block';
        toggle.textContent = '−';
    }
}

// Expose a simple support object for inline handlers
window.support = {
    openLiveChat: openLiveChat,
    closeLiveChat: closeLiveChat,
    sendChatMessage: sendChatMessage,
    openTicketSystem: openTicketSystem,
    closeTicketSystem: closeTicketSystem,
    showFAQ: showFAQ,
    showContactInfo: showContactInfo,
    toggleFAQ: toggleFAQ
};

// Initialize when page loads
document.addEventListener('DOMContentLoaded', function() {
    // Initialize page-specific features
    var currentPage = window.location.pathname.split('/').pop();

    if (currentPage === 'chat-groups.php') {
        initChatGroups();
    } else if (currentPage === 'smart-calendar.php') {
        // Initialize calendar regardless of wrapper object
        initCalendar();
    } else if (currentPage === 'room-finder.php') {
        initRoomFinder();
    } else if (currentPage === 'support.php') {
        initSupport();
    }

    // Setup message input enter key
    var messageInput = el('messageInput');
    if (messageInput) {
        messageInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                sendMessage();
            }
        });
    }

    // Setup chat input enter key
    var chatInput = el('chatInput');
    if (chatInput) {
        chatInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                sendChatMessage();
            }
        });
    }
});
