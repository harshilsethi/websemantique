<!DOCTYPE html>
<html>
<head>
    <meta charset=utf-8 />
    <title>Pictionnary - Inscription</title>
    <link rel="stylesheet" media="screen" href="css/styles.css">
</head>
<body>

<h2>Inscrivez-vous</h2>
<form class="inscription" action="req_inscription.php" method="post" name="inscription">
    <!-- c'est quoi les attributs action et method ? -->
    <!-- Attribut action: spécifie où envoyer le form-data quand une forme est validé -->
    <!-- Attribut méthode: spécifie comment envoyer le form-data  -->
    <!-- qu'y a-t-il d'autre comme possiblité que post pour l'attribut method ? -->
    <span class="required_notification">Les champs obligatoires sont indiqués par *</span>
    <ul>
        <!-- EMAIL -->
        <li>
            <label for="email">E-mail :</label>
            <input type="email" name="email" id="email"
            autofocus
            required/>
            <!-- quelle est la différence entre les attributs name et id ? -->
            <!-- c'est lequel qui doit être égal à l'attribut for du label ? -->
            <span class="form_hint">Format attendu "name@something.com"</span>
        </li>
        <!-- MOT DE PASSE -->
        <li>
            <label for="mdp1">Mot de passe :</label>
            <input type="password" name="password" id="mdp1"
                   onkeyup="validateMdp2()"
                   title = "Le mot de passe doit contenir de 4 à 8 caractères alphanumériques."
                   required
                   placeholder="password"
                   pattern="\w{4,8}">
            <!-- quels sont les deux scénarios où l'attribut title sera affiché ? -->
            <!-- encore une fois, quelle est la différence entre name et id pour un input ? -->
            <span class="form_hint">De 4 à 8 caractères alphanumériques.</span>
        </li>
        <!-- CONFIRMATION DE MOT DE PASSE -->
        <li>
            <label for="mdp2">Mot de passe :</label>
            <input type="password" id="mdp2" onkeyup="validateMdp2()"
                   required
                   placeholder="verify password">
            <!-- pourquoi est-ce qu'on a pas mis un attribut name ici ? -->
            <!-- quel scénario justifie qu'on ait ajouté l'écouter validateMdp2() à l'évènement onkeyup de l'input mdp1 ? -->
            <span  id='validatempd' class="form_hint">Les mots de passes doivent être identiques.</span>
            <script>
                validateMdp2 = function(e) {
                    var mdp1 = document.getElementById('mdp1').value;
                    var mdp2 = document.getElementById('mdp2').value;

                    if (mdp1 == mdp2) {
                        // ici on supprime le message d'erreur personnalisé, et du coup mdp2 devient valide.
                        document.getElementById('mdp2').setCustomValidity("");
                    } else {
                        // ici on ajoute un message d'erreur personnalisé, et du coup mdp2 devient invalide.
                        document.getElementById('mdp2').setCustomValidity('Les mots de passes doivent être identiques.');
                    }
                }
            </script>
        </li>

        <!-- NOM -->
        <li>
            <label for="nom">Nom :</label>
            <input type="text" name="nom" id="nom"
            placeholder="Sethi"/>
        </li>
        <!-- PRENOM -->
        <li>
            <label for="prenom">Prénom :</label>
            <input type="text" name="prenom" id="prenom"
                   required
                   placeholder="Harshil"/>
        </li>
        <!-- TELEPHONE -->
        <li>
            <label for="tel">Téléphone :</label>
            <input type="tel" name="tel" id="tel"
                   placeholder="0605040302"/>
        </li>
        <!-- SITE WEB -->
        <li>
            <label for="url">Site Web :</label>
            <input type="url" name="url" id="url"
                   placeholder="www.openclassroom.com"/>
        </li>
        <!-- SEXE -->
        <li>
            <label>Sexe :</label>
            <input type="radio" name="sexe" id="homme"/>Homme
            <input type="radio" name="sexe" id="femme"/>Femme
        </li>
        <!-- DATE DE NAISSANCE -->
        <li>
            <label for="birthdate">Date de naissance:</label>
            <input type="date" name="birthdate" id="birthdate" placeholder="JJ/MM/AAAA" required onchange="computeAge()"/>
            <script>
                computeAge = function(e) {
                    try{
                        // j'affiche dans la console quelques objets javascript, ce qui devrait vous aider.
                        console.log(Date.now());
                        console.log(document.getElementById("birthdate"));
                        console.log(document.getElementById("birthdate").valueAsDate);
                        console.log(Date.parse(document.getElementById("birthdate").valueAsDate));
                        console.log(new Date(0).getYear());
                        console.log(new Date(65572346585).getYear());
                        document.getElementById("age").value = Math.floor((Date.now() - Date.parse(document.getElementById("birthdate").valueAsDate)) / (365.25 * 24 * 60 * 60 * 1000));
                    } catch(e) {
                        document.getElementById("age").value = '';
                    }
                }
            </script>
            <span class="form_hint">Format attendu "JJ/MM/AAAA"</span>
        </li>
        <!-- AGE -->
        <li>
            <label for="age">Age:</label>
            <input type="number" name="age" id="age"
                   disabled/>
            <!-- à quoi sert l'attribut disabled ? -->
            <!-- disabled: sert à grisé la partie pour rendre le champs insaisissable -->
        </li>
        <!-- VILLE -->
        <li>
            <label for="ville">Ville :</label>
            <input type="text" name="ville" id="ville"
                   placeholder="Nice"/>
        </li>
        <!-- TAILLE -->
        <li>
            <label for="taille">Taille :</label>
            <input type="range" name="taille" id="taille"
                   max="2.50" min="0" step="0.01"
                   onchange="document.querySelector('#rangeit').innerHTML = document.querySelector('#taille').value + 'm';">
            <output id="rangeit"/>
        </li>
        <!-- COULEUR -->
        <li>
            <label for="color">Couleur :</label>
            <input type="color" name="color" id="color"/>
            <span class="form_hint">Votre couleur préféré</span>
        </li>
        <!-- PHOTO DE PROFIL -->
        <li>
            <label for="profilepicfile">Photo de profil:</label>
            <input type="file" id="profilepicfile" onchange="loadProfilePic(this)"/>
            <!-- l'input profilepic va contenir le chemin vers l'image sur l'ordinateur du client -->
            <!-- on ne veut pas envoyer cette info avec le formulaire, donc il n'y a pas d'attribut name -->
            <span class="form_hint">Choisissez une image.</span>
            <input type="hidden" name="profilepic" id="profilepic"/>
            <!-- l'input profilepic va contenir l'image redimensionnée sous forme d'une data url -->
            <!-- c'est cet input qui sera envoyé avec le formulaire, sous le nom profilepic -->
            <canvas id="preview" width="0" height="0"></canvas>
            <!-- le canvas (nouveauté html5), c'est ici qu'on affichera une visualisation de l'image. -->
            <!-- on pourrait afficher l'image dans un élément img, mais le canvas va nous permettre également
            de la redimensionner, et de l'enregistrer sous forme d'une data url-->
            <script>
                loadProfilePic = function (e) {
                    // on récupère le canvas où on affichera l'image
                    var canvas = document.getElementById("preview");
                    var ctx = canvas.getContext("2d");
                    // on réinitialise le canvas: on l'efface, et déclare sa largeur et hauteur à 0
                    ctx.setFillColor("white");
                    ctx.fillRect(0,0,canvas.width,canvas.height);
                    canvas.width=0;
                    canvas.height=0;
                    // on récupérer le fichier: le premier (et seul dans ce cas là) de la liste
                    var file = document.getElementById("profilepicfile").files[0];
                    // l'élément img va servir à stocker l'image temporairement
                    var img = document.createElement("img");
                    // l'objet de type FileReader nous permet de lire les données du fichier.
                    var reader = new FileReader();
                    // on prépare la fonction callback qui sera appelée lorsque l'image sera chargée
                    reader.onload = function(e) {
                        //on vérifie qu'on a bien téléchargé une image, grâce au mime type
                        if (!file.type.match(/image.*/)) {
                            // le fichier choisi n'est pas une image: le champs profilepicfile est invalide, et on supprime sa valeur
                            document.getElementById("profilepicfile").setCustomValidity("Il faut télécharger une image.");
                            document.getElementById("profilepicfile").value = "";
                        }
                        else {
                            // le callback sera appelé par la méthode getAsDataURL, donc le paramètre de callback e est une url qui contient
                            // les données de l'image. On modifie donc la source de l'image pour qu'elle soit égale à cette url
                            // on aurait fait différemment si on appelait une autre méthode que getAsDataURL.
                            img.src = e.target.result;
                            // le champs profilepicfile est valide
                            document.getElementById("profilepicfile").setCustomValidity("");
                            var MAX_WIDTH = 96;
                            var MAX_HEIGHT = 96;
                            var width = img.width;
                            var height = img.height;

                            // A FAIRE: si on garde les deux lignes suivantes, on rétrécit l'image mais elle sera déformée
                            // Vous devez supprimer ces lignes, et modifier width et height pour:
                            //    - garder les proportions,
                            //    - et que le maximum de width et height soit égal à 96
                            width = MAX_WIDTH;
                            height = MAX_HEIGHT;
                            var max = width > height ? width : height;
                            width = width * MAX_WIDTH / max;
                            height = height * MAX_HEIGHT / max;

                            canvas.width = width;
                            canvas.height = height;
                            // on dessine l'image dans le canvas à la position 0,0 (en haut à gauche)
                            // et avec une largeur de width et une hauteur de height
                            ctx.drawImage(img, 0, 0, width, height);
                            // on exporte le contenu du canvas (l'image redimensionnée) sous la forme d'une data url
                            var dataurl = canvas.toDataURL("image/png");
                            // on donne finalement cette dataurl comme valeur au champs profilepic
                            document.getElementById("profilepic").value = dataurl;
                        };
                    }
                    // on charge l'image pour de vrai, lorsque ce sera terminé le callback loadProfilePic sera appelé.
                    reader.readAsDataURL(file);
                }
            </script>
        </li>
        <li>
            <input type="submit" value="Soumettre Formulaire">
        </li>
    </ul>
</form>
</body>
</html>