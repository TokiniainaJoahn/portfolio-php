<%- include ("structure_base/header")%>

<main class="page-competences">
    <section class="competences-intro">
        <p class="competences-intro__label">Savoir-faire</p>
        <h2 class="titre_page">MES COMPÉTENCES</h2>
        <h1>Construisons quelque chose ensemble.</h1>
        <p>Un ensemble de technologies et de compétences que je mets au service de projets utiles et bien conçus.</p>
    </section>

    <div class="container_competence">
        <article class="competence">
            <section class="competence-card competence-card--systeme">
                <div class="competence-card__titre">
                    <span class="competence-card__index">01</span>
                    <h3>Systèmes & administration</h3>
                </div>
                <div class="card">
                    <span class="skill-item"><img src="icons8-linux-96.png" alt="Linux"><p>Linux</p></span>
                    <span class="skill-item"><img src="icons8-git-96.png" alt="Git"><p>Git</p></span>
                    <span class="skill-item"><img src="github.png" alt="GitHub"><p>GitHub</p></span>
                    <span class="skill-item"><img src="icons8-docker-96.png" alt="Docker"><p>Docker</p></span>
                </div>
            </section>

            <section class="competence-card competence-card--frontend">
                <div class="competence-card__titre">
                    <span class="competence-card__index">02</span>
                    <h3>Front-end</h3>
                </div>
                <div class="card">
                    <span class="skill-item"><img src="icons8-html-5-96.png" alt="HTML"><p>HTML</p></span>
                    <span class="skill-item"><img src="icons8-css3-96.png" alt="CSS"><p>CSS</p></span>
                    <span class="skill-item"><img src="icons8-javascript-96.png" alt="JavaScript"><p>JavaScript</p></span>
                </div>
            </section>

            <section class="competence-card competence-card--backend">
                <div class="competence-card__titre">
                    <span class="competence-card__index">03</span>
                    <h3>Back-end</h3>
                </div>
                <div class="card">
                    <span class="skill-item"><img src="icons8-python-96.png" alt="Python"><p>Python</p></span>
                    <span class="skill-item"><img src="icons8-php-logo-80.png" alt="PHP"><p>PHP</p></span>
                    <span class="skill-item"><img src="icons8-nodejs-96.png" alt="Node.js"><p>Node.js</p></span>
                </div>
            </section>

            <section class="competence-card competence-card--database">
                <div class="competence-card__titre">
                    <span class="competence-card__index">04</span>
                    <h3>Bases de données</h3>
                </div>
                <div class="card">
                    <span class="skill-item"><img src="icons8-mysql-logo-96.png" alt="MySQL"><p>MySQL</p></span>
                    <span class="skill-item"><img src="postgresql.png" alt="PostgreSQL"><p>PostgreSQL <small>(en cours)</small></p></span>
                    <span class="skill-item skill-item--text"><strong>SQLite</strong></span>
                </div>
            </section>

            <section class="competence-card competence-card--soft">
                <div class="competence-card__titre">
                    <span class="competence-card__index">05</span>
                    <h3>Soft skills</h3>
                </div>
                <div class="card card--text">
                    <span class="skill-item skill-item--text"><strong>Travail d'équipe</strong></span>
                    <span class="skill-item skill-item--text"><strong>Communication</strong></span>
                    <span class="skill-item skill-item--text"><strong>Ponctualité</strong></span>
                </div>
            </section>

            <section class="competence-card competence-card--office">
                <div class="competence-card__titre">
                    <span class="competence-card__index">06</span>
                    <h3>Informatique bureautique</h3>
                </div>
                <div class="card card--text">
                    <span class="skill-item skill-item--text"><strong>Word</strong></span>
                    <span class="skill-item skill-item--text"><strong>Excel</strong></span>
                    <span class="skill-item skill-item--text"><strong>PowerPoint</strong></span>
                </div>
            </section>
        </article>
    </div>

    <%- include ("structure_base/service")%>
</main>

<%- include ("structure_base/footer")%>