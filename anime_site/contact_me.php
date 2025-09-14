<?php require_once 'nav.php'; ?>

<h2>Contact Me</h2>

<div class="contact-form">
    <form action="process_contact.php" method="post">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
        </div>
        
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        
        <div class="form-group">
            <label for="subject">Subject:</label>
            <input type="text" id="subject" name="subject" required>
        </div>
        
        <div class="form-group">
            <label for="message">Message:</label>
            <textarea id="message" name="message" rows="5" required></textarea>
        </div>
        
        <button type="submit">Send Message</button>
    </form>
    
    <div class="contact-info">
        <h3>Other Ways to Reach Me</h3>
        <p><strong>Email:</strong> s1921610@usls.edu.ph</p>
        <p><strong>Twitter:</strong> @Hover016</p>
        <p><strong>Discord:</strong> Noir016</p>
    </div>
</div>

<style>
    .contact-form {
        display: flex;
        gap: 3rem;
        margin-top: 2rem;
        flex-wrap: wrap;
    }

    form {
        flex: 1;
        min-width: 300px;
        background-color: var(--light-color);
        padding: 2rem;
        border-radius: 8px;
        box-shadow: var(--shadow);
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    label {
        display: block;
        margin-bottom: 0.5rem;
        font-weight: bold;
    }

    input, textarea {
        width: 100%;
        padding: 0.8rem;
        border-radius: 4px;
        border: 1px solid #444;
        background-color: #333;
        color: white;
    }

    textarea {
        resize: vertical;
    }

    button {
        padding: 0.8rem 1.5rem;
        border: none;
        border-radius: 30px;
        background-color: var(--secondary-color);
        color: var(--text-color);
        cursor: pointer;
        transition: all 0.3s ease;
        font-size: 1rem;
        font-weight: bold;
        text-transform: uppercase;
        letter-spacing: 1px;
        box-shadow: var(--shadow);
    }

    button:hover {
        background-color: var(--primary-color);
        box-shadow: var(--glow);
        transform: translateY(-2px);
    }

    .contact-info {
        flex: 1;
        min-width: 300px;
        background-color: var(--light-color);
        padding: 2rem;
        border-radius: 8px;
        box-shadow: var(--shadow);
    }

    .contact-info h3 {
        margin-bottom: 1rem;
        color: var(--secondary-color);
    }

    .contact-info p {
        margin-bottom: 1rem;
    }

    @media (max-width: 768px) {
        .contact-form {
            flex-direction: column;
            gap: 2rem;
        }

        form, .contact-info {
            width: 100%;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.querySelector('form');
        
        form.addEventListener('submit', function(e) {
            // Simple validation
            const name = document.getElementById('name').value.trim();
            const email = document.getElementById('email').value.trim();
            const message = document.getElementById('message').value.trim();
            
            if (!name || !email || !message) {
                e.preventDefault();
                alert('Please fill in all required fields');
                return false;
            }
            
            if (!email.includes('@') || !email.includes('.')) {
                e.preventDefault();
                alert('Please enter a valid email address');
                return false;
            }
            
            // If everything is valid, the form will submit
        });
    });
</script>

<?php require_once 'footer.php'; ?>