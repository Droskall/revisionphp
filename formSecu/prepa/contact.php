<?php
require __DIR__ . '/partials/header.php';
// Affichage des messages !!

$messages = [
        'Succes : Le formulaire est bon',
        'Erreur : Rien ne vas',
        'Erreur : Le pseudo ne vas pas',
        'Erreur : Le mail vas pas',
        'Erreur : Trop jeune ou trop vieux',
        'Erreur : MDP ne vas pas',
        'Erreur : MDP ne correspond pas',
        'Erreur : Le message ne vas pas',
];

if (isset($_GET['f'])){
    $indexMessage = (int)$_GET['f'];
    $message = $messages[$indexMessage];?>
    <div class="feedback-message <?=  strpos($message, 'Erreur : ') === 0 ? 'feedback-error' : 'feedback-success' ?> ">
        <?= $message ?> </div>
    <?php
}
?>

<div>
    <h1>Mon formulaire de contact/inscription</h1>
    <form action="/forms/contact-form.php" method="post" id="contact">
        <div>
            <label for="id-username">Username</label>
            <input type="text" name="username" id="id-username" minlength="5" maxlength="20" required>
        </div>
        <div>
            <label for="id-mail">Adresse mail</label>
            <input type="email" name="mail" id="id-mail" required>
        </div>
        <div>
            <label for="id-age">Age</label>
            <input type="number" name="age" id="id-age" min="18" max="120" required>
        </div>
        <div>
            <label for="id-passwd">Password</label>
            <input type="password" name="password" id="id-passwd" required>
        </div>
        <div>
            <label for="id-passwd-repeat">Répétez le password</label>
            <input type="password" name="password-repeat" id="id-passwd-repeat" required>
        </div>
        <div>
            <label for="id-message">Votre message</label>
            <textarea name="message" id="id-message" minlength="20" maxlength="255" required></textarea>
        </div>
        <div>
            <input type="submit" value="Envoyer" name="submit-contact">
        </div>
    </form>
</div>

<?php
require __DIR__ . '/partials/footer.php';