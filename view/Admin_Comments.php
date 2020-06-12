<?php 
$this->title = "Administration";
$this->section = "Commentaires"
?>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Id</th>
            <th>Pseudo</th>
            <th>Contenu</th>
            <th>Date publication</th>
            <th>Actions</th>
        </tr>
    </thead>
    <?php
            foreach ($flagComments as $comment){
            ?>
    <tbody>
        <tr>
            <td><?= htmlspecialchars($comment->getId());?></td>
            <td><?= htmlspecialchars($comment->getPseudo());?></td>
            <td><?= htmlspecialchars($comment->getContent());?></td>
            <td><?= htmlspecialchars($comment->getDate_Creation());?></td>
            <td>
                <a class="view" title="View" data-toggle="tooltip"
                    href="../public/index.php?route=comment&commentId=<?= $comment->getId(); ?>"><i
                        class="material-icons">&#xE254;</i></a>
                <a class="edit" title="Edit" data-toggle="tooltip"
                    href="../public/index.php?route=updapteComment&commentId=<?= $comment->getId(); ?>"><i
                        class="material-icons">&#xE254;</i></a>
                <a class="delete" title="Delete" data-toggle="tooltip"
                    href="../public/index.php?route=deleteComment&commentId=<?= $comment->getId(); ?>"><i
                        class="material-icons">&#xE872;</i></a>
            </td>
        </tr>
    </tbody>
    <?php
            }
        ?>
</table>