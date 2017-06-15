

<?php if($cursos): ?>
<?php foreach ($cursos->result() as $curso): ?>
<ul>
    <li><a href="<?=base_url()?>cursos/editar/<?= $curso->idCurso; ?>"><?= $curso->nombreCurso  ?></a></li>
    <li><?= $curso->videosCurso  ?></li>
</ul>
<?php endforeach; ?>
<?php else: ?>
    <p> Error en la aplicacion </p>
<?php endif; ?>
</body>
</html>

