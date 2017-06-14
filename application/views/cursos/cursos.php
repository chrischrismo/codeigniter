<?php
    foreach ($cursos->result() as $curso) {
    ?>
<ul>
    <li><?= $curso->nombreCurso  ?></li>
    <li><?= $curso->videosCurso  ?></li>
</ul>
<?php
}
?>
</body>
</html>

