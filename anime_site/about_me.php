<?php require_once 'nav.php'; ?>

<h2>About Me</h2>

<div class="about-content">
    <img src="https://scontent.fcgy2-1.fna.fbcdn.net/v/t39.30808-6/501028939_9903788446382249_932422160048767988_n.jpg?_nc_cat=102&ccb=1-7&_nc_sid=6ee11a&_nc_eui2=AeGR0WV1ZLe-YRabQtRvC79_U6m1T_uWTt5TqbVP-5ZO3pWw8uhHHqyU-cFXnVP0fw8UQRl1LR2MiJ54BOXTnLAb&_nc_ohc=Mu58CpKPElEQ7kNvwGVr6iI&_nc_oc=AdkuG5ZsEXciR2YiYCyPPVAqly7I80pQZa0RyHWQz7R62k0t88rh0e8NCo0l1_KTpoM&_nc_zt=23&_nc_ht=scontent.fcgy2-1.fna&_nc_gid=rzbrwYwKodc7jBFbfxHNJg&oh=00_AfV4FQsezV9FSLbagj8JfAH5YqCKFtl_JWQFurBDx4F4fg&oe=68A2778C" alt="Profile Picture" class="profile-pic">
    <div class="bio">
        <p>Hello fellow anime I'm Hover Tiangchon! I'm a passionate fan of ecchi and harem anime genres.</p>
        <p>I've been watching anime for over 10 years and have developed a particular taste for shows with romantic comedy elements, fan service, and engaging storylines.</p>
        <p>This website is my personal collection of top recommendations for anyone looking to explore these genres.</p>
        <p>When I'm not watching anime, I enjoy reading manga, collecting figures, and participating in anime conventions.</p>
    </div>
</div>

<style>
    .about-content {
        display: flex;
        gap: 2rem;
        align-items: center;
        margin-top: 2rem;
        flex-wrap: wrap;
        justify-content: center;
    }

    .profile-pic {
        border-radius: 50%;
        border: 3px solid var(--secondary-color);
        box-shadow: var(--shadow);
        width: 300px;
        height: 300px;
        object-fit: cover;
    }

    .bio {
        max-width: 600px;
        background-color: var(--light-color);
        padding: 2rem;
        border-radius: 8px;
        box-shadow: var(--shadow);
    }

    .bio p {
        margin-bottom: 1rem;
    }

    @media (max-width: 768px) {
        .about-content {
            flex-direction: column;
            text-align: center;
        }

        .profile-pic {
            width: 200px;
            height: 200px;
        }

        .bio {
            padding: 1rem;
        }
    }
</style>

<?php require_once 'footer.php'; ?>