<?php /* home.php */ ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Solutions for Students — CampusNest</title>
  <link rel="stylesheet" href="css/style.css" />
</head>
<body>

<!-- Topbar -->
<?php require 'views/nav.php'; ?>

<main class="page-content">
  <!-- Hero Section -->
  <section class="hero-section">
    <div class="hero-content">
      <h1>Your Campus Life, Simplified</h1>
      <p class="hero-subtitle">Everything you need to thrive in university life - from connecting with classmates to managing your schedule and finding your perfect dorm room.</p>
      <div class="hero-actions">
        <a href="#features" class="btn btn-primary">Explore Features</a>
        <a href="room-finder.php" class="btn btn-light">Find a Room</a>
      </div>
    </div>
    
  </section>

  <section class="image-details">
      <div class="image">
        <img src="img/img6.jpg" alt="Students planning with a calendar" />
      </div>
      <div class="details">
        <h3>Everything you need for campus life</h3>
        <p>From chats to calendars and room bookings, manage it all smoothly.</p>
        <ul class="detail-list">
          <li>Create or join study communities</li>
          <li>Sync deadlines and classes effortlessly</li>
          <li>Find and reserve the right room fast</li>
        </ul>
        <a href="#cta-section" class="btn btn-primary">Get Started</a>
      </div>
    </section>
  </section>

  <!-- Features Section -->
  <section id="features" class="section features-wrap">
    <div class="section-head">
      <h2>Solutions for Students!</h2>
      <p class="section-description">Everything you need to make the most of your university experience</p>
      <span class="section-underline" aria-hidden="true"></span>
    </div>

    <div class="feature-grid">
      <!-- Card 1 -->
      <article class="feature-card">
        <div class="card-image">
          <img src="img/img3.jpg" alt="Chat Groups" />
        </div>
        <h3>Chat Groups</h3>
        <p>Connect and share ideas with fellow students anytime. Join study groups, discuss assignments, and build lasting friendships.</p>
        <a href="chat-groups.php" class="feature-link">Read More</a>
      </article>

      <!-- Card 2 -->
      <article class="feature-card accented">
        <div class="card-image">
          <img src="img/img2.jpg" alt="Smart Calendar" />
        </div>
        <h3>Smart Calendar</h3>
        <p>Track your classes, events, and deadlines in one place. Never miss an important date again with our intelligent reminders.</p>
        <a href="smart-calendar.php" class="feature-link">Read More</a>
      </article>

      <!-- Card 3 -->
      <article class="feature-card">
        <div class="card-image">
          <img src="img/img4.jpg" alt="Room Finder" />
        </div>
        <h3>Room Finder</h3>
        <p>Check which dorm rooms are available and ready to reserve. Find your perfect home away from home with detailed room information.</p>
        <a href="room-finder.php" class="feature-link">Read More</a>
      </article>

      <!-- Card 4 -->
      <article class="feature-card">
        <div class="card-image">
          <img src="img/img5.jpg" alt="24/7 Support" />
        </div>
        <h3>24/7 Support</h3>
        <p>Got questions? Our support team is here to help you 24/7. Get quick answers and personalized assistance whenever you need it.</p>
        <a href="support.php" class="feature-link">Read More</a>
      </article>
    </div>

 

  

  <!-- CTA Section -->
  <section class="cta-section" id="cta-section">
    <div class="cta-content">
      <h2>Ready to Transform Your Campus Experience?</h2>
      <p>Explore features and get started with Calendar, Chat Groups, and Room Finder.</p>
      <div class="cta-actions">
        <a href="smart-calendar.php" class="btn btn-primary">Open Calendar</a>
        <a href="chat-groups.php" class="btn btn-light">Open Chat Groups</a>
      </div>
    </div>
  </section>
</main>

<?php require 'views/footer.php'; ?>

<script src="js/app.js"></script>
</body>
</html>
