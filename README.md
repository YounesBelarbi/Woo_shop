# Woo shop


# Installation

- Dépendances : ``Composer install``
- Base de données : configuration dans le fichier ``wp-config.php``  
    -informations de la base de données  
    -clé d'authentification et de salage  
    -url worpdress  
    -mode debug  
    -environnement 

# Informations complémentaires

Export BDD dans le dossier ``/sql_database``.

Nom de domaine instance local : ``http://localhost/woo_shop``  

Accès à l'admin http://localhost/woo_shop/wordpress/wp-admin    
identifiant : ``woo_shop``  
Mot de passe : ``woo_shop``

Plugins installés : Query Monitor

# Phase du test

- Modification de la couleur des boutons de la page boutique : codé dans le fichier du thème enfant``/content/themes/storefront-child/style.css``.
- Champ supplémentaire sur la page Checkout :  codé dans le dossier du thème enfant``/content/themes/storefront-child/functions.php``.
- Creation d'un plugin pour afficher un message sur la dashboard client : plugin dans le dossier ``/content/messagePlugin``.
- Création d'une page permettant de rajouter des informations à l'utilisateur courant : plugin dans le dossier ``/content/newPagePlugin``.

Malgré l'utilisation de composer et dans le cadre du test technique, j'ai préféré commit le dossier ``/content``.  
Également, j'ai codé directement les plugins dans le dossier ``/content`` au lieu de faire des dossier .zip.  
Enfin, je n'ai pas traité l'apparence du thème.

