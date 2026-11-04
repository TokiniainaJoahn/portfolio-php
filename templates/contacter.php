<%- include ("structure_base/header")%>

    <main>
        <section class="contact_intro">
            <h2 class="titre_page">CONTACT</h2>
            <h1>Construisons quelque chose ensemble.</h1>
        </section>
        <article class="contact_article">
            <section class="divers_contact">
                <h2>Parlons si vous avez des projet ou des conseils à me donner</h2>
                <p>Une idées de colaboration ou des opportunités?</p>
                <p>Envoyez-moi un email et je vous repondrait plus vite que possible</p>
                <div>
                    <section class="section_a_propos section_a_propos_1">
                        <a href=""><img src="social.png" alt=""></a>
                        <div>
                            <h2>Email</h2>
                            <h3>tokyainas8@gmail.com</h3>
                            <h4>Je vous repondrais généralement dans 0 à 10h</h4>
                        </div>
                    </section>
                </div>
                <div>
                    <section class="section_a_propos">
                        <a href=""><img src="github.png" alt=""></a>
                        <a href=""><img src="linkedin.png" alt="" style="margin-left: -10px;"></a>
                        <div>
                            <h2>Github / LinkedIn</h2>
                            <p>Regardez mes projets et mon parcours dans github et LinkedIn</p>
                        </div>
                    </section>
                </div>
                <p class="slogan">Disponible pour votre projet , des colaborations et des opportunités professionel et des conseils alors contactez moi si besion</p>
                
            </section>

            
            <form action="/api/contact" method="POST">
                <h2>Envoyez-moi un message par email</h2>

                <label for="nom_complet">Nom complet</label><br>
                <input type="text" id="nom_complet" name="nom" class="input_style" placeholder="Votre nom" required><br>

                <label for="email" class="label_contact">Entrez votre email :</label><br>
                <input type="email" id="email" name="email_destination" class="input_style" placeholder="email@example.com" required><br>

                <label for="sujet" class="label_contact">Entrez ici le sujet :</label><br>
                <input type="text" id="sujet" name="sujet" class="input_style" placeholder="Objet de votre demande" required><br>
                
                <label for="message" class="label_contact">Message :</label><br>
                <textarea name="message" id="message" placeholder="Décrivez votre projet" class="input_message" required></textarea><br>

                <input type="submit" class="btn_submit" value="Envoyez le message">

            </form>
        </article>
        
        <%- include ("structure_base/service")%>

    </main>

<%- include ("structure_base/footer")%>