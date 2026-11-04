<%- include ("structure_base/header")%>

    <main>
        <section>
            <h2 class="titre_page">MES PROJETS</h2>
            <h1>Construisons quelques choses ensemble.</h1>
        </section>

        <section class="Projet" aria-label="Mes projets">
            <% projets.forEach((projet)=>{%>
                <article class="projet-card">
                    <div class="projet-card__image">
                        <img src="<%= projet.Image %>" alt="Aperçu du projet">
                    </div>
                    <div class="projet-card__contenu">
                        <h3><%= projet.Titre || projet.titre || 'Projet GitHub' %></h3>
                        <p class="projet-card__description"><%= projet.Description || projet.description %></p>
                        <a class="projet-card__lien" href="<%= projet.Github || projet.github %>" target="_blank" rel="noopener noreferrer">
                            Voir le projet sur GitHub
                        </a>
                    </div>
                </article>
            <% }) %>
        </section>

        <%- include ("structure_base/service")%>

    </main>

<%- include ("structure_base/footer")%>