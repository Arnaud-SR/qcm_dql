<?php
require_once'class/Cfg.php';
if (isset($_SESSION['id_user'])) {
    header("Location: dashboard.php");
    exit;
}
$tabError = [];
if (filter_input(INPUT_POST, "submit_login")) {
    $user = new User();
    $user->login = filter_input(INPUT_POST, 'login', FILTER_VALIDATE_EMAIL, FILTER_FLAG_NO_ENCODE_QUOTES);
    $user->password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
    if ($user->loguer()) {
        header("Location: index.php");
        exit();
    } else {
        $tabError[] = "* Identifiant incorrect, veuillez réessayer ";
        $tabErrorString = implode('', $tabError);
    }

}
?>
<!doctype html>
<html lang="fr">
<head>
    <?php require_once 'head.php'?>
    <title>Accueil</title>
</head>
<body>
<div class="row">
    <div class="col-3 mx-auto text-center">
        <h2>Bienvenue</h2>
        <?php
        if (isset($tabErrorString)) {
            echo "<span class='text-danger'>$tabErrorString</span>";
        }
        ?>
    </div>
</div>

<div class="row mt-5 mt">
    <div class="col-4 mx-auto p-3">
        <form method="post">
            <div class="row form-group">
                <div class="mx-auto col-8">
                    <input type="text" placeholder="Login..." class="form-control" name="login" required>
                </div>
            </div>
            <div class="row mt-3 form-group">
                <div class="mx-auto col-8">
                    <input type="password" placeholder="Mot de passe..." class="form-control" name="password" required>
                </div>
            </div>
            <div class="row mt-2 form-group">
                <div class="mx-auto">
                    <input type="submit" class="btn btn-success" value="Se connecter" name="submit_login">
                </div>
            </div>
        </form>
        <div class="row">
            <small class="font-italic mx-auto">Pas de compte ? <a href="register.php">cliquez ici</a> pour vous inscrire</small>
        </div>
    </div>
</div>

</body>
</html>
