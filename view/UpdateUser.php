<?php $this->title = "Modifier un utilisateur"; ?>
<form method="post" action="">
    <label for="pseudo">Pseudo</label><br>
    <input type="text" id="pseudo" name="pseudo" value=" <?= htmlspecialchars($user->getPseudo()) ?>"><br>
    <label for="password">Mot de passe</label><br>
    <input type="password" id="password" name="password" value=" <?= htmlspecialchars($user->getPassword()) ?>"><br>
    <input type="submit" value="Modifier" id="submit" name="submit">
</form>
