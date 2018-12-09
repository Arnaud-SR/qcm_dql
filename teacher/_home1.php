<?php
$qcmNoPublished = QCM::getQcmList();
$qcmPublished = QCM::getQcmList(1);
$qcmList = QCM::getAllQcm();
?>
<table class="table table-striped">
    <thead>
    <tr>
        <th>ID</th>
        <th>Crée le</th>
        <th>Enseignant</th>
        <th>Date limite</th>
        <th style="width: 175px">Intitulé</th>
        <th class="text-center">Nombre de question</th>
        <th class="text-center">Résultats</th>
        <th class="text-center">Détails</th>
        <th>Visiblité</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($qcmList as $qcm) {
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
    <td><span class='btn btn-primary'>Voir les résultats</span></td>
    <td><span class='btn btn-info'>Détail du QCM</span></td>
    <td class='text-center'><a href=''><a href='published-qcm.php?qcm={$qcm->id_qcm}'><span class='{$is_visible}' title='rendre ce QCM visible par les étudiants'></a></span>
    </td>
</tr>";
    }
    ?>
    </tbody>
</table>


