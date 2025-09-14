<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anime Fan Site</title>
    <style>
        /* CSS Styles - Anime Theme */
        :root {
            --primary-color: #6a0dad; /* Purple theme */
            --secondary-color: #ff1493; /* Deep pink */
            --text-color: #f8f8f8;
            --dark-color: #1a1a2e;
            --light-color: #2a2a3a;
            --shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            --glow: 0 0 10px rgba(255, 20, 147, 0.7);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: var(--dark-color);
            color: var(--text-color);
            line-height: 1.6;
            background-image: 
                radial-gradient(circle at 10% 20%, rgba(106, 13, 173, 0.2) 0%, transparent 20%),
                radial-gradient(circle at 90% 80%, rgba(255, 20, 147, 0.2) 0%, transparent 20%);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        header {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: var(--text-color);
            text-align: center;
            padding: 2rem 0;
            margin-bottom: 2rem;
            box-shadow: var(--shadow);
            border-bottom: 2px solid var(--secondary-color);
        }

        h1 {
            font-size: 2.5rem;
            margin-bottom: 0.5rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        p.subtitle {
            font-size: 1.1rem;
            font-style: italic;
        }

        /* Navigation */
        nav {
            background-color: var(--light-color);
            padding: 1rem;
            box-shadow: var(--shadow);
        }

        nav ul {
            display: flex;
            justify-content: center;
            list-style: none;
            gap: 2rem;
            flex-wrap: wrap;
        }

        nav a {
            color: var(--text-color);
            text-decoration: none;
            font-weight: bold;
            padding: 0.5rem 1rem;
            border-radius: 30px;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        nav a:hover {
            background-color: var(--secondary-color);
            box-shadow: var(--glow);
        }

        nav a.active {
            background-color: var(--primary-color);
            box-shadow: var(--glow);
        }

        /* Main content */
        main {
            flex: 1;
            padding: 0 2rem 2rem;
        }

        /* Footer */
        footer {
            text-align: center;
            padding: 2rem 0;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: var(--text-color);
            box-shadow: var(--shadow);
        }

        /* Mobile Styles */
        @media (max-width: 768px) {
            h1 {
                font-size: 1.8rem;
            }

            p.subtitle {
                font-size: 1rem;
            }

            nav ul {
                gap: 1rem;
            }

            nav a {
                padding: 0.5rem;
                font-size: 0.9rem;
            }

            main {
                padding: 0 1rem 1rem;
            }
        }

        @media (max-width: 480px) {
            h1 {
                font-size: 1.5rem;
            }
            
            nav ul {
                flex-direction: column;
                align-items: center;
                gap: 0.5rem;
            }
        }

        /* Media query for background color change */
        @media (max-width: 600px) {
            body {
                background-color: #0f0f1a;
            }
        }
    </style>
</head>
<body>
    <header>
        <h1>Anime Fan Site</h1>
        <p class="subtitle">Ecchi/Harem Masterpieces</p>
    </header>

    <nav>
        <ul>
            <li><a href="index.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : ''; ?>">Home</a></li>
            <li><a href="about_me.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'about_me.php' ? 'active' : ''; ?>">About Me</a></li>
            <li><a href="contact_me.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'contact_me.php' ? 'active' : ''; ?>">Contact</a></li>
        </ul>
    </nav>

    <main>