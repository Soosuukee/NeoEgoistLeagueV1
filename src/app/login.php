<?php
require_once(__DIR__ . '/../app/connectDB.php');
//$password = password_hash("admin",PASSWORD_DEFAULT)
//var_dump($password);

$errors = [];
//-- 2) Vérifier les données provenant du formulaire lorsque il est validé / soumis / submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //Verifie les champs pour creer des erreurs
    //Verifie que le champ USERNAME est defini et non vide et aussi que la longueur n'est pas inferieur a 0
    if (isset($_POST["username"]) == false || strlen($_POST["username"]) < 4) {
        $errors["username"] = " Le champ username doit etre d'au moins 4 caractères";
    }
    if (isset($_POST["password"]) == false || strlen($_POST["password"]) < 4) {
        $errors["username"] = " Le champ password doit etre d'au moins 4 caractères";
    }

    //----4) S'il n'y a pas d'erreur , je connecte mon utilisateur
    if (empty($errors)) {
        //connexion

        //1 recherche en base de données d'un utilisateur correspondant 
        $pdo = connectDB();
        $query = $pdo->prepare(" SELECT * from User WHERE username = :username ");
        $query->execute(['username' => $_POST['username']]);
        $user = $query->fetch();

        // 2- si un utilisateur avec le meme username est trouvé en BDD:
        var_dump($user);
    }
}
?>

<h1>Login</h1>
<form method="POST" action="login.php">
    <label>Username</label>
    <input required type="text" name="username">
    <label>Password</label>
    <input required type="password" name="password">
    <button class="btn btn-outline-success">Se connecter</button>
</form>