<?php $this->title = "Utilisateur" ?>
<div>
    <p>ID : <?= htmlspecialchars($user->getId());?></p>
    <p>Pseudo : <?= htmlspecialchars($user->getPseudo());?></p>
    <p>Mot de passe : <?= htmlspecialchars($user->getPassword());?></p>
    <p>Créé le : <?= htmlspecialchars($user->getDate_Creation());?></p>
</div>