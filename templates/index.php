<%- include ("structure_base/header")%>

    <main class="page-accueil">
        <section class="competences-intro" style="height: 65px; box-sizing: border-box; margin: 0 auto;">
            <p class="competences-intro__label">Bienvenue</p>
            <h2 class="titre_page" style="margin: 5px 0;">ACCEUIL</h2>
        </section>
        <section class="hero" aria-labelledby="hero-titre">
            <div class="hero__content">
                <p class="hero__brand">Tokiniaina <span>Joahn</span></p>
                <h1 class="hero__titre" id="hero-titre">Développeur web &amp; mobile</h1>
                <p class="hero__texte">
                    Applications modernes, rapides et intuitives — des idées transformées en projets concrets.
                </p>
                <div class="hero__actions">
                    <a href="/projets" class="btn btn--or">Voir mes projets</a>
                    <a href="/contact" class="btn btn--ligne">Me contacter</a>
                </div>
            </div>
            <div class="hero__visuel" aria-hidden="true">
                <div class="hero__glow"></div>
                <img src="logo_T.png" alt="" class="hero__logo">
                <div class="hero__grille"></div>
            </div>
        </section>

        <section class="bandeau-accueil" aria-labelledby="competences-titre">
            <div class="bandeau-accueil__inner">
                <div class="bandeau-accueil__texte-bloc">
                    <p class="section-label">Compétences</p>
                    <h2 class="bandeau-accueil__titre" id="competences-titre">Ce que je <span>maîtrise</span></h2>
                    <p class="bandeau-accueil__texte">
                        Compétences acquises en formation et sur des projets concrets — frontend, backend et outils.
                    </p>
                    <a href="/competences" class="btn btn--ligne">Voir mes compétences</a>
                </div>
                <div class="skills-preview" aria-label="Aperçu des compétences">
                    <article class="skill-card">
                        <img src="/icons8-javascript-96.png" alt="JavaScript" class="skill-card__icone" loading="lazy">
                        <p class="skill-card__nom">JavaScript</p>
                    </article>
                    <article class="skill-card">
                        <img src="/icons8-mysql-logo-96.png" alt="MySQL" class="skill-card__icone" loading="lazy">
                        <p class="skill-card__nom">MySQL</p>
                    </article>
                    <article class="skill-card">
                        <img src="/icons8-python-96.png" alt="Python" class="skill-card__icone" loading="lazy">
                        <p class="skill-card__nom">Python</p>
                    </article>
                    <article class="skill-card">
                        <img src="/github.png" alt="GitHub" class="skill-card__icone" loading="lazy">
                        <p class="skill-card__nom">GitHub</p>
                    </article>
                    <article class="skill-card">
                        <img src="/icons8-docker-96.png" alt="Docker" class="skill-card__icone" loading="lazy">
                        <p class="skill-card__nom">Docker</p>
                    </article>
                    <article class="skill-card">
                        <img src="/icons8-nodejs-96.png" alt="Node.js" class="skill-card__icone" loading="lazy">
                        <p class="skill-card__nom">Node.js</p>
                    </article>
                </div>
            </div>
        </section>

        <section class="parcours" aria-labelledby="parcours-titre">
            <p class="section-label">Parcours</p>
            <h2 class="parcours__titre" id="parcours-titre">Formation &amp; <span>expérience</span></h2>
            <ol class="parcours__liste">
                <li class="parcours__item">
                    <time class="parcours__date" datetime="2025">2025 — Aujourd’hui</time>
                    <p class="parcours__ecole">EMIT Informatique — DA2I</p>
                    <p class="parcours__desc">Formation en informatique en cours à l’EMIT.</p>
                </li>
                <li class="parcours__item">
                    <time class="parcours__date" datetime="2025">2025</time>
                    <p class="parcours__ecole">Projets académiques</p>
                    <p class="parcours__desc">Réalisations scolaires qui ont consolidé mes compétences techniques.</p>
                </li>
            </ol>
        </section>

        <section class="appel-contact" aria-labelledby="contact-titre">
            <p class="section-label">Contact</p>
            <h2 class="appel-contact__titre" id="contact-titre">Parlons de votre <span>projet</span></h2>
            <p class="appel-contact__texte">
                Une idée, une collaboration ou un conseil — écrivez-moi, je réponds rapidement.
            </p>
            <div class="appel-contact__actions">
                <a href="/contact" class="btn btn--or">Me contacter</a>
                <div class="reseaux" aria-label="Réseaux sociaux">
                    <a href="#" aria-label="GitHub"><img src="github.png" alt="" loading="lazy"></a>
                    <a href="#" aria-label="LinkedIn"><img src="linkedin.png" alt="" loading="lazy"></a>
                    <a href="mailto:tokyainas8@gmail.com" aria-label="Email"><img src="social.png" alt=""
                            loading="lazy"></a>
                    <a href="#" aria-label="WhatsApp"><img src="whatsapp.png" alt="" loading="lazy"></a>
                </div>
            </div>
        </section>

        <section class="services-accueil" aria-labelledby="services-titre">
            <p class="section-label">Services</p>
            <h2 class="services-accueil__titre" id="services-titre">Ce que je <span>propose</span></h2>
            <%- include ("structure_base/service")%>
        </section>
    </main>

    <%- include ("structure_base/footer")%>