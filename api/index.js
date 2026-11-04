const express = require("express");

const mysql = require("mysql2");

const mailer = require("nodemailer");

const jwt = require ("jsonwebtoken");

const multer = require("multer");

const bcrypt = require("bcrypt");

const crypto = require("crypto");

const path = require("path");

const cookie_parser = require("cookie-parser");
const { error } = require("console");

const cle_token = "gdskjgfsdkgklerhkshkghejkrhguier";

const app = express();

app.set("view engine" , "ejs");

app.set("views" , path.join (__dirname , "../templates"));

app.use(express.static("../css"));

app.use(express.static("../js_cote_navigateur"));

const base_donnes = mysql.createConnection({
    host : "localhost",
    user : "root" ,
    password : "Tokiniaina" ,
    database : "portfolio" ,
});

app.get("/" , (requette , reponse) =>{
    reponse.render("index" , {titre : "Acceuil"});
})

app.get("/competences" , (requette , reponse) =>{
    reponse.render("competence" , {titre : "Competence"});
})

app.get("/projets" , (requette , reponse) =>{
    base_donnes.connect((error)=>{
        if (error){
            console.log("On n'as pas pu se connecter a la base de donnes");
            
        }
        else{
            base_donnes.query("SELECT * FROM Projet" , (error , resultat)=>{
                if (error){
                    console.log(error);
                    
                }else{
                    reponse.render("projets" , {titre : "Projets" , projets : resultat});
                }
            })
        }
    })
})

app.get("/contact" , (requette , reponse) =>{
    reponse.render("contacter" , {titre : "Me Contacter"});
})

app.get("/Admin/connection" , (requette , reponse) =>{
    reponse.render("connection");
})

app.get("/Admin/validation_otp/:email" , (requette , reponse) =>{
    const email_utilisateur = requette.params.email;
    reponse.render("validation_otp" , {email_utilisateur});
})

app.use(cookie_parser());

app.get("/Admin/Acceuil" , (requette , reponse) =>{        
    const token = requette.cookies.Authorization ;
    jwt.verify(token , cle_token , (erreur , token_decode)=>{
        if(erreur){
            reponse.redirect("/Admin/connection");
        }else{
            reponse.render("Acceuil_admin");
        }
    })
})

app.get("/Admin/Acceuil" , (requette , reponse) =>{
    const token = requette.cookies.Authorization ;
    jwt.verify(token , cle_token , (erreur , token_decode)=>{
        if(erreur){
            reponse.redirect("/Admin/connection");
        }else{
            reponse.render("Acceuil_admin_projet");
        }
    })
})

const stockage = multer.diskStorage({
    destination : (requette , file , callback)=>{
        callback(null , "images/")
    },
    filename : (requette , file , callback)=>{
        const date_preffixe = Date.now()
        const extension = path.extname(file.originalname)
        callback(null , "projet_" + date_preffixe + extension);
    }
})

const download = multer({storage : stockage});



app.post("/api/add/projet" , download.array("images") , (requette , reponse) =>{
    base_donnes.connect((erreur)=>{
        if(erreur){
            reponse.send("<h1>Erreur de connection a la base de donnes<h1>");
        }
    })

    const nom = requette.body.nom;
    const description = requette.body.description;
    const github = requette.body.github;
    
    base_donnes.query("INSERT INTO projet (nom , description , github , images) VALUES (nom , description , github , images)" , (erreur , resultat)=>{
        if(erreur){
            reponse.send("<h1>Erreur de requette a la base de donnes<h1>");
        }else{
            reponse.redirect("/Admin/Acceuil_admin_projet");
        }
    })
})

app.use(express.urlencoded({
    extended : true ,
}));

const transporter_gmail = mailer.createTransport({
    service : "gmail" ,
    auth : {
        user : "tokiniaina3108@gmail.com",
        pass : "rtklmxvqjjmomggk",
    }
})

app.post("/api/contact" , (requette , reponse)=>{
    const email_repondre = requette.body.email_destination ;
    const sujet = requette.body.sujet ;
    const message = requette.body.message ;

    transporter_gmail.sendMail({
        from : "tokiniaina3108@gmail.com",
        to : "tokyainas8@gmail.com",
        replyTo : email_repondre,
        subject : sujet,
        text : message,
    } , (erreur)=>{
        if (erreur){
            console.log(erreur);
        }else{
            reponse.redirect("/contact");
        }
    })
})

app.post("/api/auth/admin" , (requette , reponse) =>{
    base_donnes.connect((erreur)=>{
        if(erreur){
            reponse.send("<h1>Erreur de connection a la base de donnes<h1>");
        }
    })

    const email_utilisateur = requette.body.email;
    const mdp_donne = requette.body.mdp;
    
    base_donnes.query("SELECT email , mdp FROM utilisateur WHERE email=?" , [email_utilisateur] , async (erreur , resultat)=>{
        if(erreur){
            reponse.send("<h1>Erreur de requette a la base de donnes<h1>");
        }else{
            const donnes = resultat[0];
            let validation_mdp = await bcrypt.compare(mdp_donne , donnes.mdp);

            if (validation_mdp){
                let otp_valide = crypto.randomInt(100000 , 900000);
                base_donnes.query("UPDATE utilisateur SET otp=? WHERE email=?" , [otp_valide , email_utilisateur] , (erreur)=>{
                    if (erreur){
                        reponse.send("<h1>Erreur lors de l'envoi de l'OTP<h1>");                        
                    }else{
                        transporter_gmail.sendMail({
                            from : "tokiniaina3108@gmail.com",
                            to : email_utilisateur ,
                            subject : "Validation OTP",
                            text : `Voici l'OTP valable : \n <h1>${otp_valide}<h1>`, 
                        });
                        reponse.redirect(`/Admin/validation_otp/${email_utilisateur}`);
                    }
                })
            }else{
                reponse.redirect("/");
            }
        }
    })
})

app.post("/api/auth/admin/otp/:email" , (requette , reponse)=>{
    const email_utilisateur = requette.params.email;
    base_donnes.connect((erreur)=>{
        if(erreur){
            console.log(erreur);
            
            reponse.redirect(`/Admin/validation_otp/${email_utilisateur}`);
        }
    })
    
    base_donnes.query("SELECT otp FROM utilisateur WHERE email=?" , [email_utilisateur] , (erreur , resultat)=>{
        if(erreur){
            console.log(erreur);
            reponse.redirect(`/Admin/validation_otp/${email_utilisateur}`);
        }else{
            const donnes = resultat[0];
            const otp_donne = requette.body.otp;
            const otp = donnes.otp;

            if (otp == otp_donne){
                const token = jwt.sign({email_utilisateur} , cle_token);
                reponse.cookie("Authorization" , token , {
                    httpOnly : false ,
                    maxAge : 2 * 60 * 1000,
                    secure : false,
                });
                reponse.redirect("/Admin/Acceuil");
            }else{
                console.log(otp);
                console.log(otp_donne);
                
                
                reponse.redirect(`/Admin/validation_otp/${email_utilisateur}`);
            }
        }
    })  
})

module.exports = app;