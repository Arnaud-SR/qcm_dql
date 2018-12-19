<?php ?>

<table class="table table-striped">
    <thead>
    <tr>
        <th>ID</th>
        <th>Crée le</th>
        <th>Enseignant</th>
        <th>Date limite</th>
        <th style="width: 175px">Intitulé</th>
        <th class="text-center">Nombre de question</th>
        <th class="text-center">Répondre</th>
        <th class="text-center">Détails</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($qcmPublished as $qcm) {
        $nbQuestions = QCM::countNbQuestions($qcm->id_qcm);
        $is_visible = $qcm->is_published ? 'fas fa-eye text-success' : 'fas fa-eye-slash text-danger';
        $teacher = QCM::getTeacherName($qcm->id_teacher);
        $teacherName = $teacher[0]->prenom." ".$teacher[0]->nom;

        echo "<tr>
    <td>$qcm->id_qcm</td>
    <td>{$qcm->created_at}</td>
    <td>{$teacherName}</td>
    <td>$qcm->date_limit</td>
    <td>$qcm->title</td>
    <td class='text-center'>$nbQuestions</td>
    <td><a class='btn btn-warning' href='qcm-exam.php?id_qcm={$qcm->id_qcm}'>Répondre au QCM</a></td>
    <td><span class='btn btn-info'>Détail du QCM</span></td>   
    </td>
</tr>";
    }
    ?>
    </tbody>
</table>
