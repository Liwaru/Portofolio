<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title><?php echo e(config('app.name', 'Portfolio')); ?></title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />

        <?php if(file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot'))): ?>
            <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
        <?php else: ?>
            <style>
                body {
                    margin: 0;
                    font-family: 'Instrument Sans', ui-sans-serif, system-ui, sans-serif;
                    color: #172033;
                }

                html {
                    scroll-behavior: smooth;
                }

                .portfolio-page {
                    min-height: 100vh;
                    background:
                        radial-gradient(circle at top left, rgba(219, 234, 254, 0.7), transparent 28rem),
                        linear-gradient(180deg, #ffffff 0%, #fbfdff 100%);
                }

                .portfolio-shell {
                    width: min(1100px, calc(100% - 48px));
                    margin: 0 auto;
                    padding: 72px 0 48px;
                }

                .topbar {
                    position: absolute;
                    top: 28px;
                    left: 32px;
                    right: 32px;
                    display: flex;
                    align-items: center;
                    justify-content: space-between;
                }

                .site-label {
                    color: #111827;
                    font-size: 1.05rem;
                    font-weight: 600;
                    letter-spacing: 0.08em;
                    text-transform: uppercase;
                    animation: fade-in 700ms ease both;
                }

                .nav-links {
                    display: flex;
                    align-items: center;
                    gap: 28px;
                    animation: fade-in 700ms ease both;
                }

                .nav-links a {
                    color: #475569;
                    font-size: 0.92rem;
                    font-weight: 500;
                    text-decoration: none;
                    padding: 9px 14px;
                    border: 1px solid transparent;
                    border-radius: 999px;
                    transition: color 180ms ease, border-color 180ms ease, background-color 180ms ease;
                }

                .nav-links a:hover {
                    color: #ffffff;
                    border-color: #111827;
                    background: #111827;
                }

                .hero {
                    display: grid;
                    grid-template-columns: minmax(0, 1fr) minmax(320px, 460px);
                    align-items: center;
                    gap: 48px;
                    padding: 24px 0 72px;
                }

                .eyebrow {
                    margin: 0 0 12px;
                    color: #6b7280;
                    font-size: 0.78rem;
                    font-weight: 600;
                    letter-spacing: 0.22em;
                    text-transform: uppercase;
                }

                .hero h1 {
                    margin: 0;
                    color: #111827;
                    font-size: clamp(2rem, 4vw, 3.2rem);
                    font-weight: 700;
                    letter-spacing: -0.06em;
                    line-height: 1;
                    animation: fade-up 700ms ease 120ms both;
                }

                .hero-copy {
                    max-width: 480px;
                    min-height: 9em;
                    margin: 20px 0 0;
                    color: #6b7280;
                    font-size: 1rem;
                    line-height: 1.8;
                }

                .typing-copy::after {
                    content: '';
                    display: inline-block;
                    width: 1px;
                    height: 1em;
                    margin-left: 4px;
                    background: #64748b;
                    vertical-align: -2px;
                    animation: blink 0.8s steps(1) infinite;
                }


                .hero-role {
                    margin: 18px 0 0;
                    color: #2563eb;
                    font-size: 0.9rem;
                    font-weight: 600;
                    animation: fade-up 700ms ease 220ms both;
                }

                .hero-visual {
                    min-height: 420px;
                    display: grid;
                    place-items: center;
                }

                .profile-frame {
                    width: min(100%, 390px);
                    aspect-ratio: 4 / 5;
                    overflow: hidden;
                    border-radius: 28px;
                    box-shadow:
                        0 24px 60px rgba(15, 23, 42, 0.16),
                        0 0 0 1px rgba(255, 255, 255, 0.8);
                    animation: photo-reveal 900ms cubic-bezier(0.22, 1, 0.36, 1) 180ms both;
                }

                .profile-photo {
                    width: 100%;
                    height: 100%;
                    object-fit: cover;
                    transform: scale(1.015);
                    transform-origin: right center;
                }

                @keyframes blink {
                    50% {
                        opacity: 0;
                    }
                }

                @keyframes fade-up {
                    from {
                        opacity: 0;
                        transform: translateY(12px);
                    }

                    to {
                        opacity: 1;
                        transform: translateY(0);
                    }
                }

                @keyframes fade-in {
                    from {
                        opacity: 0;
                    }

                    to {
                        opacity: 1;
                    }
                }

                @keyframes photo-reveal {
                    from {
                        opacity: 0;
                        transform: scale(0.98);
                    }

                    to {
                        opacity: 1;
                        transform: scale(1);
                    }
                }

                .projects {
                    padding: 0 0 72px;
                    scroll-margin-top: 72px;
                }

                .section-heading {
                    margin-bottom: 24px;
                    text-align: center;
                }

                .section-heading h2 {
                    margin: 0;
                    color: #111827;
                    font-size: clamp(1.5rem, 3vw, 2.2rem);
                    font-weight: 600;
                    letter-spacing: -0.04em;
                }

                .section-heading p {
                    margin: 10px 0 0;
                    color: #6b7280;
                    font-size: 0.96rem;
                }

                .project-grid {
                    display: grid;
                    gap: 18px;
                    grid-template-columns: repeat(3, minmax(0, 1fr));
                }

                .project-card {
                    overflow: hidden;
                    padding: 14px;
                    border: 1px solid rgba(148, 163, 184, 0.22);
                    border-radius: 24px;
                    background: rgba(255, 255, 255, 0.82);
                    box-shadow: 0 18px 45px rgba(15, 23, 42, 0.06);
                    transition: transform 180ms ease, box-shadow 180ms ease, border-color 180ms ease;
                }

                .project-card:hover {
                    transform: translateY(-4px);
                    border-color: rgba(96, 165, 250, 0.35);
                    box-shadow: 0 22px 55px rgba(15, 23, 42, 0.1);
                }

                .project-card:focus-visible {
                    outline: 2px solid #2563eb;
                    outline-offset: 4px;
                }

                .project-thumb {
                    min-height: 168px;
                    display: grid;
                    place-items: center;
                    overflow: hidden;
                    border-radius: 16px;
                    border: 1px solid rgba(148, 163, 184, 0.14);
                }

                .project-thumb.infrasph {
                    background: #f7f2ed;
                }

                .project-thumb.gofutsal {
                    background: #f3f9e8;
                }

                .project-thumb.absensiku {
                    background: #eef7fb;
                }

                .project-thumb img {
                    width: 100%;
                    height: 168px;
                    object-fit: cover;
                    display: block;
                }

                .project-content {
                    padding: 18px 6px 8px;
                }

                .project-category {
                    margin: 0 0 10px;
                    color: #2563eb;
                    font-size: 0.72rem;
                    font-weight: 600;
                    letter-spacing: 0.14em;
                    text-transform: uppercase;
                }

                .project-card h3 {
                    margin: 0 0 10px;
                    color: #111827;
                    font-size: 1.15rem;
                }

                .project-card p {
                    margin: 0;
                    color: #6b7280;
                    line-height: 1.65;
                }

                .project-tags {
                    display: flex;
                    flex-wrap: wrap;
                    gap: 8px;
                    margin-top: 16px;
                }

                .project-tags span {
                    border-radius: 999px;
                    padding: 7px 10px;
                    background: #eff6ff;
                    color: #475569;
                    font-size: 0.74rem;
                    font-weight: 500;
                }

                .contact {
                    margin-top: 28px;
                    padding-top: 18px;
                }

                .contact-heading {
                    margin-bottom: 24px;
                    text-align: center;
                }

                .contact-heading h2 {
                    margin: 0;
                    color: #111827;
                    font-size: clamp(1.5rem, 3vw, 2.2rem);
                    font-weight: 600;
                    letter-spacing: -0.04em;
                }

                .contact-grid {
                    display: grid;
                    grid-template-columns: repeat(3, minmax(0, 1fr));
                    gap: 18px;
                }

                .contact-card {
                    min-height: 170px;
                    padding: 22px;
                    border: 1px solid rgba(148, 163, 184, 0.22);
                    border-radius: 24px;
                    background: rgba(255, 255, 255, 0.82);
                    box-shadow: 0 18px 45px rgba(15, 23, 42, 0.06);
                    text-decoration: none;
                    transition: transform 180ms ease, box-shadow 180ms ease, border-color 180ms ease;
                }

                .contact-card:hover {
                    transform: translateY(-4px);
                    border-color: rgba(96, 165, 250, 0.35);
                    box-shadow: 0 22px 55px rgba(15, 23, 42, 0.1);
                }

                .contact-icon {
                    width: 54px;
                    height: 54px;
                    display: grid;
                    place-items: center;
                    margin-bottom: 22px;
                    border-radius: 16px;
                    color: #ffffff;
                    background: #111827;
                }

                .contact-card:nth-child(2) .contact-icon {
                    background: #111827;
                }

                .contact-card:nth-child(3) .contact-icon {
                    background: #111827;
                }

                .contact-icon svg {
                    width: 24px;
                    height: 24px;
                }

                .contact-card h3 {
                    margin: 0 0 8px;
                    color: #111827;
                    font-size: 1.12rem;
                }

                .contact-card p {
                    margin: 0 0 18px;
                    color: #6b7280;
                    font-size: 0.92rem;
                }

                .contact-label {
                    display: block;
                    margin-bottom: 8px;
                    color: #64748b;
                    font-size: 0.72rem;
                    font-weight: 600;
                    letter-spacing: 0.14em;
                    text-transform: uppercase;
                }

                .contact-value {
                    color: #172033;
                    font-size: 0.96rem;
                    font-weight: 500;
                }

                .reveal-on-scroll {
                    opacity: 0;
                    transform: translateY(18px);
                    transition:
                        opacity 650ms ease,
                        transform 650ms cubic-bezier(0.22, 1, 0.36, 1);
                }

                .reveal-on-scroll.is-visible {
                    opacity: 1;
                    transform: translateY(0);
                }

                .project-grid .project-card:nth-child(2),
                .contact-grid .contact-card:nth-child(2) {
                    transition-delay: 90ms;
                }

                .project-grid .project-card:nth-child(3),
                .contact-grid .contact-card:nth-child(3) {
                    transition-delay: 180ms;
                }

                .project-modal {
                    position: fixed;
                    inset: 0;
                    z-index: 20;
                    display: grid;
                    place-items: center;
                    padding: 24px;
                    background: rgba(15, 23, 42, 0.42);
                    opacity: 0;
                    visibility: hidden;
                    transition: opacity 180ms ease, visibility 180ms ease;
                }

                .project-modal.is-open {
                    opacity: 1;
                    visibility: visible;
                }

                .project-modal-panel {
                    width: min(980px, 100%);
                    display: grid;
                    grid-template-columns: minmax(320px, 0.95fr) minmax(320px, 1.05fr);
                    gap: 42px;
                    padding: 28px;
                    border-radius: 30px;
                    background: #ffffff;
                    box-shadow: 0 28px 80px rgba(15, 23, 42, 0.24);
                    transform: translateY(10px) scale(0.98);
                    transition: transform 180ms ease;
                }

                .project-modal.is-open .project-modal-panel {
                    transform: translateY(0) scale(1);
                }

                .project-modal-media {
                    align-self: center;
                    display: grid;
                    place-items: center;
                    overflow: hidden;
                    border: 1px solid rgba(148, 163, 184, 0.14);
                    border-radius: 24px;
                    background: #f8fafc;
                }

                .project-modal-media img {
                    width: 100%;
                    height: auto;
                    object-fit: contain;
                    display: block;
                }

                .project-modal-content {
                    display: flex;
                    flex-direction: column;
                    justify-content: center;
                }

                .project-modal-content h3 {
                    margin: 0 0 18px;
                    color: #111827;
                    font-size: clamp(2rem, 4vw, 2.8rem);
                    line-height: 0.98;
                    letter-spacing: -0.06em;
                }

                .project-modal-content p {
                    margin: 0;
                    color: #6b7280;
                    font-size: 1.05rem;
                    line-height: 1.8;
                }

                .project-modal-divider {
                    width: 100%;
                    height: 1px;
                    margin: 0 0 22px;
                    background: rgba(99, 102, 241, 0.22);
                }

                .project-modal-actions {
                    display: flex;
                    align-items: center;
                    gap: 12px;
                    margin-top: 24px;
                }

                .visit-project {
                    display: inline-flex;
                    align-items: center;
                    justify-content: center;
                    min-height: 44px;
                    padding: 0 18px;
                    border-radius: 999px;
                    background: #111827;
                    color: #ffffff;
                    font-size: 0.92rem;
                    font-weight: 600;
                    text-decoration: none;
                }

                .close-modal {
                    min-height: 44px;
                    padding: 0 18px;
                    border: 1px solid rgba(148, 163, 184, 0.3);
                    border-radius: 999px;
                    background: #ffffff;
                    color: #334155;
                    font: inherit;
                    cursor: pointer;
                }

                @media (max-width: 800px) {
                    .topbar {
                        top: 20px;
                        left: 24px;
                        right: 24px;
                    }

                    .nav-links {
                        gap: 16px;
                    }

                    .hero {
                        grid-template-columns: 1fr;
                        gap: 28px;
                    }

                    .hero-visual {
                        min-height: auto;
                    }

                    .project-grid {
                        grid-template-columns: 1fr;
                    }

                    .contact-grid {
                        grid-template-columns: 1fr;
                    }

                    .project-modal-panel {
                        grid-template-columns: 1fr;
                    }

                    .project-modal-media img {
                        height: auto;
                    }
                }
            </style>
        <?php endif; ?>
    </head>
    <body class="portfolio-page" id="home">
        <header class="topbar">
            <div class="site-label">Portfolio</div>
            <nav class="nav-links">
                <a href="#home">Home</a>
                <a href="#projects">Projects</a>
                <a href="#contact">Contact</a>
            </nav>
        </header>

        <main class="portfolio-shell">
            <section class="hero">
                <div>
                    <h1>Hi, I'm<br>Hendrik Huang</h1>
                    <p class="hero-role">RPL Student • Web Developer</p>
                    <p
                        class="hero-copy typing-copy"
                        data-typing-text="Siswa Rekayasa Perangkat Lunak dengan fokus pada web development, UI/UX, dan teknologi modern. Menikmati proses membangun aplikasi dan mengubah ide menjadi solusi digital yang fungsional."
                    ></p>
                </div>

                <div class="hero-visual">
                    <div class="profile-frame">
                        <img class="profile-photo" src="<?php echo e(asset('images/Hendrik Huang.png')); ?>" alt="Hendrik Huang">
                    </div>
                </div>
            </section>

            <section class="projects" id="projects">
                <div class="section-heading reveal-on-scroll">
                    <h2>Projects</h2>
                    <p>A selection of projects I’ve worked on.</p>
                </div>

                <div class="project-grid">
                    <article
                        class="project-card reveal-on-scroll"
                        tabindex="0"
                        data-project-title="InfraSPH"
                        data-project-description="Sistem manajemen infrastruktur sekolah yang membantu pengelolaan fasilitas, aset, dan data sarana secara lebih rapi dan efisien."
                        data-project-image="<?php echo e(asset('images/InfraSPH.jfif')); ?>"
                        data-project-image-alt="InfraSPH"
                        data-project-tags="Laravel, MySQL"
                        data-project-url="https://infrasph.hendrik.rplkodingan.com/"
                    >
                        <div class="project-thumb infrasph">
                            <img class="infrasph-logo" src="<?php echo e(asset('images/InfraSPH.jfif')); ?>" alt="InfraSPH">
                        </div>
                        <div class="project-content">
                            <p class="project-category">Web System</p>
                            <h3>InfraSPH</h3>
                            <p>Sistem manajemen infrastruktur sekolah yang membantu pengelolaan fasilitas, aset, dan data sarana secara lebih rapi dan efisien.</p>
                            <div class="project-tags">
                                <span>Laravel</span>
                                <span>MySQL</span>
                            </div>
                        </div>
                    </article>

                    <article
                        class="project-card reveal-on-scroll"
                        tabindex="0"
                        data-project-title="GoFutsal"
                        data-project-description="Sistem informasi reservasi lapangan futsal yang memudahkan pengguna melihat jadwal, melakukan booking, dan mengelola pembayaran."
                        data-project-image="<?php echo e(asset('images/GoFutsal.webp')); ?>"
                        data-project-image-alt="GoFutsal"
                        data-project-tags="Laravel, Booking, Payment"
                        data-project-url="https://gofutsal.hendrik.rplkodingan.com/"
                    >
                        <div class="project-thumb gofutsal">
                            <img class="gofutsal-logo" src="<?php echo e(asset('images/GoFutsal.webp')); ?>" alt="GoFutsal">
                        </div>
                        <div class="project-content">
                            <p class="project-category">Web Project</p>
                            <h3>GoFutsal</h3>
                            <p>Sistem informasi reservasi lapangan futsal yang memudahkan pengguna melihat jadwal, melakukan booking, dan mengelola pembayaran.</p>
                            <div class="project-tags">
                                <span>Laravel</span>
                                <span>Booking</span>
                                <span>Payment</span>
                            </div>
                        </div>
                    </article>

                    <article
                        class="project-card reveal-on-scroll"
                        tabindex="0"
                        data-project-title="AbsensiKu"
                        data-project-description="Sistem informasi absensi karyawan yang membantu pencatatan kehadiran menjadi lebih praktis, rapi, dan mudah dikelola."
                        data-project-image="<?php echo e(asset('images/Absensiku.jpg')); ?>"
                        data-project-image-alt="AbsensiKu"
                        data-project-tags="Laravel, Attendance System"
                        data-project-url="https://absensiku.hendrik.rplkodingan.com/"
                    >
                        <div class="project-thumb absensiku">
                            <img class="absensiku-logo" src="<?php echo e(asset('images/Absensiku.jpg')); ?>" alt="AbsensiKu">
                        </div>
                        <div class="project-content">
                            <p class="project-category">Web System</p>
                            <h3>AbsensiKu</h3>
                            <p>Sistem informasi absensi karyawan yang membantu pencatatan kehadiran menjadi lebih praktis, rapi, dan mudah dikelola.</p>
                            <div class="project-tags">
                                <span>Laravel</span>
                                <span>Attendance System</span>
                            </div>
                        </div>
                    </article>
                </div>
            </section>

            <section class="contact" id="contact">
                <div class="contact-heading reveal-on-scroll">
                    <h2>Contact</h2>
                </div>

                <div class="contact-grid">
                    <a class="contact-card reveal-on-scroll" href="mailto:hendrikhuang57@gmail.com">
                        <span class="contact-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                <path d="M4 6h16v12H4z"></path>
                                <path d="m4 7 8 6 8-6"></path>
                            </svg>
                        </span>
                        <h3>Email</h3>
                        <p>Send me a message</p>
                        <span class="contact-label">Email Address</span>
                        <span class="contact-value">hendrikhuang57@gmail.com</span>
                    </a>

                    <a class="contact-card reveal-on-scroll" href="https://wa.me/6282388486205" target="_blank" rel="noreferrer">
                        <span class="contact-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                <path d="M22 16.92v2a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6A19.79 19.79 0 0 1 2.12 3.18 2 2 0 0 1 4.11 1h2a2 2 0 0 1 2 1.72c.12.9.33 1.78.62 2.63a2 2 0 0 1-.45 2.11L7.09 8.91a16 16 0 0 0 6 6l1.45-1.19a2 2 0 0 1 2.11-.45c.85.29 1.73.5 2.63.62A2 2 0 0 1 22 16.92z"></path>
                            </svg>
                        </span>
                        <h3>WhatsApp</h3>
                        <p>Let’s talk directly</p>
                        <span class="contact-label">Phone Number</span>
                        <span class="contact-value">+62 823-8848-6205</span>
                    </a>

                    <a class="contact-card reveal-on-scroll" href="https://github.com/Liwaru" target="_blank" rel="noreferrer">
                        <span class="contact-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                <path d="M9 19c-4.5 1.5-4.5-2.5-6-3m12 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 19 4.77 5.07 5.07 0 0 0 18.91 1S17.73.65 15 2.48a13.38 13.38 0 0 0-6 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7a3.37 3.37 0 0 0-.94 2.58V22"></path>
                            </svg>
                        </span>
                        <h3>GitHub</h3>
                        <p>View my repositories</p>
                        <span class="contact-label">Profile</span>
                        <span class="contact-value">github.com/Liwaru</span>
                    </a>
                </div>
            </section>
        </main>

        <div class="project-modal" aria-hidden="true">
            <div class="project-modal-panel" role="dialog" aria-modal="true" aria-labelledby="project-modal-title">
                <div class="project-modal-media">
                    <img src="" alt="">
                </div>

                <div class="project-modal-content">
                    <p class="project-category">Project Detail</p>
                    <h3 id="project-modal-title"></h3>
                    <div class="project-modal-divider"></div>
                    <p class="project-modal-description"></p>
                    <div class="project-tags project-modal-tags"></div>
                    <div class="project-modal-actions">
                        <a class="visit-project" href="#" target="_blank" rel="noreferrer">Visit Project</a>
                        <button class="close-modal" type="button">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <script>
            const typingElement = document.querySelector('[data-typing-text]');

            if (typingElement) {
                const text = typingElement.dataset.typingText;
                let index = 0;

                const type = () => {
                    typingElement.textContent = text.slice(0, index);
                    index += 1;

                    if (index <= text.length) {
                        window.setTimeout(type, 18);
                    }
                };

                window.setTimeout(type, 520);
            }

            const projectModal = document.querySelector('.project-modal');
            const projectCards = document.querySelectorAll('.project-card');
            const modalImage = document.querySelector('.project-modal-media img');
            const modalTitle = document.querySelector('#project-modal-title');
            const modalDescription = document.querySelector('.project-modal-description');
            const modalTags = document.querySelector('.project-modal-tags');
            const visitProjectButton = document.querySelector('.visit-project');
            const closeModalButton = document.querySelector('.close-modal');

            const openProjectModal = (card) => {
                modalImage.src = card.dataset.projectImage;
                modalImage.alt = card.dataset.projectImageAlt;
                modalTitle.textContent = card.dataset.projectTitle;
                modalDescription.textContent = card.dataset.projectDescription;
                visitProjectButton.href = card.dataset.projectUrl;
                modalTags.innerHTML = '';

                card.dataset.projectTags.split(',').forEach((tag) => {
                    const item = document.createElement('span');
                    item.textContent = tag.trim();
                    modalTags.appendChild(item);
                });

                projectModal.classList.add('is-open');
                projectModal.setAttribute('aria-hidden', 'false');
            };

            const closeProjectModal = () => {
                projectModal.classList.remove('is-open');
                projectModal.setAttribute('aria-hidden', 'true');
            };

            projectCards.forEach((card) => {
                card.addEventListener('click', () => openProjectModal(card));
                card.addEventListener('keydown', (event) => {
                    if (event.key === 'Enter' || event.key === ' ') {
                        event.preventDefault();
                        openProjectModal(card);
                    }
                });
            });

            closeModalButton.addEventListener('click', closeProjectModal);

            projectModal.addEventListener('click', (event) => {
                if (event.target === projectModal) {
                    closeProjectModal();
                }
            });

            document.addEventListener('keydown', (event) => {
                if (event.key === 'Escape') {
                    closeProjectModal();
                }
            });

            const revealItems = document.querySelectorAll('.reveal-on-scroll');

            const revealObserver = new IntersectionObserver((entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('is-visible');
                        revealObserver.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.16,
            });

            revealItems.forEach((item) => revealObserver.observe(item));
        </script>

    </body>
</html>
<?php /**PATH C:\Users\Hendra Huang\Documents\new laravel\Portfolio\resources\views/portfolio.blade.php ENDPATH**/ ?>