<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscribir Estudiante en Curso</title>
    <style>
        body { font-family: sans-serif; }
    </style>
</head>
<body>
    <h1>Inscribir Estudiante en Curso</h1>
    <form action="/enrollment" method="POST">
        <label for="student_id">Selecciona un Estudiante:</label><br>
        <select name="student_id" id="student_id">
            <option value="">-- Selecciona un estudiante --</option>
            <?php foreach ($students as $student): ?> 
                <option value="<?=$student->getId();?>"><?=$student->getUsername();?> <?=$student->getLastName();?> (<?=$student->getDni();?>)</option> <!--  Opcion para cada estudiante -->
            <?php endforeach; ?>
        </select><br><br>

        <label for="course_id">Selecciona un Curso:</label><br>
        <select name="course_id" id="course_id">
            <option value="">-- Selecciona un curso --</option>
            <?php foreach ($courses as $course): ?> 
                <option value="<?=$course->getId();?>"><?=$course->getName();?></option>
            <?php endforeach; ?>
        </select><br><br>

        <input type="submit" value="Inscribir Estudiante">
    </form>
    <a href="/">Volver al Inicio</a>
</body>
</html>