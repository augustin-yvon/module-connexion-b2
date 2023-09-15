<?php
function generateHeader() : string {
    $header = '<header>';
    $header .= '<div class="header-content">';

    $header .= '<a href="register.php" id="register-page" class="original-color"><img  src="../assets/img/inscription.png" alt="S\'incrire" title="S\'incrire"></a>';
    $header .= '<a href="register.php" class="hover-color"><img  src="../assets/img/inscription-orange.png" alt="S\'incrire" title="S\'incrire"></a>';
    
    $header .= '<a href="../index.php" id="home-page" class="original-color"><img  src="../assets/img/accueil.png" alt="Accueil" title="Accueil"></a>';
    $header .= '<a href="../index.php" class="hover-color"><img  src="../assets/img/accueil-orange.png" alt="Accueil" title="Accueil"></a>';
    
    $header .= '<a href="login.php" id="log-page" class="original-color"><img  src="../assets/img/connexion.png" alt="Se Connecter" title="Se Connecter"></a>';
    $header .= '<a href="login.php" class="hover-color"><img  src="../assets/img/connexion-orange.png" alt="Se Connecter" title="Se Connecter"></a>';
   
    $header .= '<a href="profile.php" id="profile-page" class="original-color"><img  src="../assets/img/profil.png" alt="Profil" title="Profil"></a>';
    $header .= '<a href="profile.php" class="hover-color"><img  src="../assets/img/profil-orange.png" alt="Profil" title="Profil"></a>';

    $header .= '</div>';
    $header .= '</header>';

    return $header;
}

function generateHeaderIndex() : string {
    $header = '<header>';
    $header .= '<div class="header-content">';

    $header .= '<a href="View/register.php" id="register-page" class="original-color"><img  src="assets/img/inscription.png" alt="S\'incrire" title="S\'incrire"></a>';
    $header .= '<a href="View/register.php" class="hover-color"><img  src="assets/img/inscription-orange.png" alt="S\'incrire" title="S\'incrire"></a>';
    
    $header .= '<a href="index.php" id="home-page" class="original-color"><img  src="assets/img/accueil.png" alt="Accueil" title="Accueil"></a>';
    $header .= '<a href="index.php" class="hover-color"><img  src="assets/img/accueil-orange.png" alt="Accueil" title="Accueil"></a>';
    
    $header .= '<a href="View/login.php" id="log-page" class="original-color"><img  src="assets/img/connexion.png" alt="Se Connecter" title="Se Connecter"></a>';
    $header .= '<a href="View/login.php" class="hover-color"><img  src="assets/img/connexion-orange.png" alt="Se Connecter" title="Se Connecter"></a>';
   
    $header .= '<a href="View/profile.php" id="profile-page" class="original-color"><img  src="assets/img/profil.png" alt="Profil" title="Profil"></a>';
    $header .= '<a href="View/profile.php" class="hover-color"><img  src="assets/img/profil-orange.png" alt="Profil" title="Profil"></a>';

    $header .= '</div>';
    $header .= '</header>';

    return $header;
}
?>