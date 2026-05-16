<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Portfolio') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />

        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            <style>
                body {
                    margin: 0;
                    font-family: 'Instrument Sans', ui-sans-serif, system-ui, sans-serif;
                    color: #172033;
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

                .site-label {
                    position: absolute;
                    top: 28px;
                    left: 32px;
                    color: #111827;
                    font-size: 1.05rem;
                    font-weight: 600;
                    letter-spacing: 0.08em;
                    text-transform: uppercase;
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
                }

                .hero-visual {
                    min-height: 420px;
                    display: grid;
                    place-items: center;
                }

                .profile-photo {
                    width: min(100%, 390px);
                    aspect-ratio: 4 / 5;
                    object-fit: cover;
                    border-radius: 28px;
                    box-shadow: 0 24px 60px rgba(15, 23, 42, 0.16);
                }

                @keyframes blink {
                    50% {
                        opacity: 0;
                    }
                }

                .projects {
                    padding: 0 0 72px;
                }

                .section-heading {
                    margin-bottom: 24px;
                }

                .section-heading h2 {
                    margin: 0;
                    color: #111827;
                    font-size: clamp(1.5rem, 3vw, 2.2rem);
                    font-weight: 600;
                    letter-spacing: -0.04em;
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

                .project-thumb {
                    min-height: 168px;
                    border-radius: 16px;
                    background:
                        linear-gradient(135deg, rgba(15, 23, 42, 0.14), rgba(59, 130, 246, 0.08)),
                        linear-gradient(135deg, #dbeafe, #f8fafc);
                }

                .project-thumb.second {
                    background:
                        linear-gradient(135deg, rgba(15, 23, 42, 0.15), rgba(99, 102, 241, 0.12)),
                        linear-gradient(135deg, #e0e7ff, #f8fafc);
                }

                .project-thumb.third {
                    background:
                        linear-gradient(135deg, rgba(15, 23, 42, 0.15), rgba(14, 165, 233, 0.12)),
                        linear-gradient(135deg, #cffafe, #f8fafc);
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
                    border-top: 1px solid rgba(148, 163, 184, 0.22);
                }

                .contact-list {
                    display: grid;
                    grid-template-columns: repeat(3, minmax(0, 1fr));
                    align-items: center;
                    gap: 20px;
                    color: #475569;
                    font-size: 0.9rem;
                }

                .contact-list a {
                    color: inherit;
                    text-decoration: none;
                }

                .contact-list a:nth-child(1) {
                    justify-self: start;
                }

                .contact-list a:nth-child(2) {
                    justify-self: center;
                }

                .contact-list a:nth-child(3) {
                    justify-self: end;
                }

                @media (max-width: 640px) {
                    .contact-list {
                        grid-template-columns: 1fr;
                        gap: 12px;
                    }

                    .contact-list a:nth-child(n) {
                        justify-self: start;
                    }
                }

                @media (max-width: 800px) {
                    .site-label {
                        top: 20px;
                        left: 24px;
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
                }
            </style>
        @endif
    </head>
    <body class="portfolio-page">
        <div class="site-label">Portfolio</div>

        <main class="portfolio-shell">
            <section class="hero">
                <div>
                    <h1>Hi, I'm<br>Hendrik Huang</h1>
                    <p class="hero-role">Student Developer • Aspiring UI/UX Designer</p>
                    <p
                        class="hero-copy typing-copy"
                        data-typing-text="Siswa Rekayasa Perangkat Lunak dengan minat pada pengembangan web, UI/UX, dan teknologi modern. Menikmati proses membangun website, mengeksplorasi teknologi baru, serta mengubah ide menjadi solusi digital yang fungsional dan menarik."
                    ></p>
                </div>

                <div class="hero-visual">
                    <img class="profile-photo" src="{{ asset('images/emyself.png') }}" alt="Hendrik Huang">
                </div>
            </section>

            <section class="projects">
                <div class="section-heading">
                    <h2>Projects</h2>
                </div>

                <div class="project-grid">
                    <article class="project-card">
                        <div class="project-thumb"></div>
                        <div class="project-content">
                            <p class="project-category">Web Project</p>
                            <h3>Project Website One</h3>
                            <p>Website pertama yang menampilkan fungsi utama, desain rapi, dan pengalaman pengguna yang nyaman.</p>
                            <div class="project-tags">
                                <span>Laravel</span>
                                <span>Tailwind</span>
                            </div>
                        </div>
                    </article>

                    <article class="project-card">
                        <div class="project-thumb second"></div>
                        <div class="project-content">
                            <p class="project-category">UI / UX</p>
                            <h3>Project Website Two</h3>
                            <p>Proyek dengan fokus pada tampilan modern, struktur yang jelas, dan interaksi yang mudah dipahami.</p>
                            <div class="project-tags">
                                <span>Figma</span>
                                <span>Responsive</span>
                            </div>
                        </div>
                    </article>

                    <article class="project-card">
                        <div class="project-thumb third"></div>
                        <div class="project-content">
                            <p class="project-category">Web System</p>
                            <h3>Project Website Three</h3>
                            <p>Sistem berbasis web yang membantu mengubah kebutuhan pengguna menjadi solusi digital yang fungsional.</p>
                            <div class="project-tags">
                                <span>PHP</span>
                                <span>MySQL</span>
                            </div>
                        </div>
                    </article>
                </div>
            </section>

            <section class="contact">
                <p class="eyebrow">Contact</p>
                <div class="contact-list">
                    <a href="mailto:hendrikhuang57@gmail.com">hendrikhuang57@gmail.com</a>
                    <a href="https://wa.me/6282388486205" target="_blank" rel="noreferrer">0823 8848 6205</a>
                    <a href="https://github.com/Liwaru" target="_blank" rel="noreferrer">github.com/Liwaru</a>
                </div>
            </section>
        </main>

        <script>
            const typingElement = document.querySelector('[data-typing-text]');

            if (typingElement) {
                const text = typingElement.dataset.typingText;
                let index = 0;

                const type = () => {
                    typingElement.textContent = text.slice(0, index);
                    index += 1;

                    if (index <= text.length) {
                        window.setTimeout(type, 24);
                    }
                };

                type();
            }
        </script>

    </body>
</html>
