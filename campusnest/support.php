<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>24/7 Support - CampusNest</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include 'views/nav.php'; ?>

    <main class="page-content">
        <div class="support-container">
            <div class="support-header">
                <h1>24/7 Support Center</h1>
                <p>We're here to help you with any questions or issues you might have.</p>
            </div>
            <div class="support-options">
                <div class="support-card" onclick="support.openLiveChat()">
                    <div class="support-icon">💬</div>
                    <h3>Live Chat</h3>
                    <p>Chat with our support team in real-time</p>
                    <div class="status">Available Now</div>
                </div>
                <div class="support-card" onclick="support.openTicketSystem()">
                    <div class="support-icon">📝</div>
                    <h3>Submit Ticket</h3>
                    <p>Create a support ticket for complex issues</p>
                    <div class="status">24/7</div>
                </div>
                <div class="support-card" onclick="support.showFAQ()">
                    <div class="support-icon">❓</div>
                    <h3>FAQ</h3>
                    <p>Find answers to common questions</p>
                    <div class="status">Self-Service</div>
                </div>
                <div class="support-card" onclick="support.showContactInfo()">
                    <div class="support-icon">📞</div>
                    <h3>Contact Info</h3>
                    <p>Get our contact information</p>
                    <div class="status">Always Available</div>
                </div>
            </div>
            <div class="faq-section" id="faqSection" style="display: none;">
                <h2>Frequently Asked Questions</h2>
                <div class="faq-list">
                    <div class="faq-item">
                        <div class="faq-question" onclick="support.toggleFAQ(this)">
                            <h3>How do I reset my password?</h3>
                            <span class="faq-toggle">+</span>
                        </div>
                        <div class="faq-answer">
                            <p>Click on the "Forgot Password" link on the login page. Enter your email address and follow the instructions sent to your email to reset your password.</p>
                        </div>
                    </div>
                    <div class="faq-item">
                        <div class="faq-question" onclick="support.toggleFAQ(this)">
                            <h3>How can I join a study group?</h3>
                            <span class="faq-toggle">+</span>
                        </div>
                        <div class="faq-answer">
                            <p>Navigate to the Chat Groups page and browse available study groups. Click on a group to join and start participating in discussions.</p>
                        </div>
                    </div>
                    <div class="faq-item">
                        <div class="faq-question" onclick="support.toggleFAQ(this)">
                            <h3>How do I reserve a dorm room?</h3>
                            <span class="faq-toggle">+</span>
                        </div>
                        <div class="faq-answer">
                            <p>Go to the Room Finder page, browse available rooms, and click "Reserve" on the room you want. You'll receive a confirmation email once the reservation is complete.</p>
                        </div>
                    </div>
                    <div class="faq-item">
                        <div class="faq-question" onclick="support.toggleFAQ(this)">
                            <h3>Can I cancel my room reservation?</h3>
                            <span class="faq-toggle">+</span>
                        </div>
                        <div class="faq-answer">
                            <p>Yes, you can cancel your reservation within 24 hours of making it. Contact our support team for assistance with cancellations.</p>
                        </div>
                    </div>
                    <div class="faq-item">
                        <div class="faq-question" onclick="support.toggleFAQ(this)">
                            <h3>How do I add events to my calendar?</h3>
                            <span class="faq-toggle">+</span>
                        </div>
                        <div class="faq-answer">
                            <p>On the Smart Calendar page, click "Add Event" and fill in the event details including title, date, time, and type. Your event will be saved and displayed on the calendar.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="contact-section" id="contactSection" style="display: none;">
                <h2>Contact Information</h2>
                <div class="contact-grid">
                    <div class="contact-item">
                        <div class="contact-icon">📧</div>
                        <h3>Email Support</h3>
                        <p>support@campusnest.edu</p>
                        <p>Response within 2 hours</p>
                    </div>
                    <div class="contact-item">
                        <div class="contact-icon">📞</div>
                        <h3>Phone Support</h3>
                        <p>1-800-CAMPUS</p>
                        <p>Available 24/7</p>
                    </div>
                    <div class="contact-item">
                        <div class="contact-icon">🏢</div>
                        <h3>Office Hours</h3>
                        <p>Student Center, Room 101</p>
                        <p>Mon-Fri: 8AM-6PM</p>
                    </div>
                    <div class="contact-item">
                        <div class="contact-icon">💬</div>
                        <h3>Social Media</h3>
                        <p>@CampusNestSupport</p>
                        <p>Twitter & Instagram</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Live Chat Modal -->
        <div class="modal" id="liveChatModal">
            <div class="chat-modal">
                <div class="chat-header">
                    <h3>Live Chat Support</h3>
                    <button class="close-btn" onclick="support.closeLiveChat()">×</button>
                </div>
                <div class="chat-messages" id="chatMessages"></div>
                <div class="chat-input">
                    <input type="text" id="chatInput" placeholder="Type your message..." />
                    <button onclick="support.sendChatMessage()">Send</button>
                </div>
            </div>
        </div>

        <!-- Ticket System Modal -->
        <div class="modal" id="ticketModal">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Submit Support Ticket</h3>
                    <button class="close-btn" onclick="support.closeTicketSystem()">×</button>
                </div>
                <form id="ticketForm">
                    <div class="form-group">
                        <label for="ticketSubject">Subject</label>
                        <input type="text" id="ticketSubject" required>
                    </div>
                    <div class="form-group">
                        <label for="ticketCategory">Category</label>
                        <select id="ticketCategory" required>
                            <option value="">Select Category</option>
                            <option value="technical">Technical Issue</option>
                            <option value="billing">Billing</option>
                            <option value="room">Room Reservation</option>
                            <option value="general">General Inquiry</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="ticketPriority">Priority</label>
                        <select id="ticketPriority" required>
                            <option value="low">Low</option>
                            <option value="medium">Medium</option>
                            <option value="high">High</option>
                            <option value="urgent">Urgent</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="ticketDescription">Description</label>
                        <textarea id="ticketDescription" rows="5" required placeholder="Please describe your issue in detail..."></textarea>
                    </div>
                    <div class="form-actions">
                        <button type="button" class="btn btn-light" onclick="support.closeTicketSystem()">Cancel</button>
                        <button type="submit" class="btn btn-primary">Submit Ticket</button>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <?php include 'views/footer.php'; ?>
    <script src="js/app.js"></script>
</body>
</html>
