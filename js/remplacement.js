var chRemplacement = document.getElementById("remplacement");
chRemplacement.addEventListener("change", remplacementAppareil, false);

function remplacementAppareil(lesCriteres) {
//    parametres = construireParametres();
    var xhr = new XMLHttpRequest();
    var reponse;
    xhr.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            reponse = xhr.responseText;
            document.getElementById('Detail Affichage').innerHTML = reponse;
        }

    }
    xhr.open("post", "/?uc=gererSesPeripheriques&action=afficherPeripheriques", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencode");
    xhr.send(parametres);
    
document.location.href="index.php?uc=gererSesPeripheriques&action=afficherPeripheriques";
}