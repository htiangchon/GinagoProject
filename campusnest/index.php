<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>CampusNest</title>
  <link rel="stylesheet" href="css/style.css" />
</head>
<body>
<!-- Navigation -->
<?php require 'views/nav.php'; ?>

<!-- Main content -->
<main class="landing">
  <!-- Left: Welcome -->
  <div class="welcome-card">
    <div class="welcome-image">
      <img src="img/img7.jpg" alt="Welcome to CampusNest" />
    </div>
    <h1>Welcome to Our Community!</h1>
    <p>
      We're glad you're here. This platform was built to connect people,
      share ideas, and make your journey easier. Whether you're signing in
      as a returning member or just discovering us for the first time, we
      want you to feel at home.
    </p>
    <p>
      Explore our features, stay updated with the latest news, and be part
      of something meaningful. Your presence truly matters here!
    </p>

    <div class="quick-actions">
      <a href="smart-calendar.php" class="btn btn-primary">Open Calendar</a>
      <a href="chat-groups.php" class="btn btn-light">Open Chat Groups</a>
      <a href="room-finder.php" class="btn btn-light">Open Room Finder</a>
    </div>
  </div>

  <!-- Right: Features -->
  <div class="features-section">
    <div class="section-head">
      <h2>What you can do here</h2>
      <span class="section-underline"></span>
    </div>

    <div class="feature-grid">
      <article class="feature-card accented">
        <div class="f-icon" aria-hidden="true">🎓</div>
        <h3>Create your space</h3>
        <p>Build a profile and connect with classmates and mentors across the community.</p>
      </article>

      <article class="feature-card accented">
        <div class="f-icon" aria-hidden="true">📅</div>
        <h3>Stay organized</h3>
        <p>Track announcements and events so you never miss an important update.</p>
      </article>

      <article class="feature-card accented">
        <div class="f-icon" aria-hidden="true">💬</div>
        <h3>Share & learn</h3>
        <p>Swap ideas, find help, and collaborate on projects in a friendly space.</p>
      </article>
    </div>

    <section class="image-details">
      <div class="image">
        <img src="img/img8.jpg" alt="Students collaborating on campus" />
      </div>
      <div class="details">
        <h3>Campus tools, all in one place</h3>
        <p>Plan your week, join conversations, and find rooms without switching tabs.</p>
        <ul class="detail-list">
          <li>Smart reminders for classes and events</li>
          <li>Active chat groups for courses and clubs</li>
          <li>Up-to-date dorm room availability</li>
        </ul>
        <a href="home.php#features" class="btn btn-primary">Explore Features</a>
      </div>
    </section>
  </div>
</main>

<?php require 'views/footer.php'; ?>
</body>
</html>
