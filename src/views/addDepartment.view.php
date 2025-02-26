<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir Departamento</title>
</head>
<body>
    <h1>Añadir Nuevo Departamento</h1>
    <form action="/storeDepartment" method="POST">
        <label for="department_name">Nombre del Departamento:</label><br>
        <input type="text" id="department_name" name="department_name"><br><br>
        <input type="submit" value="Guardar Departamento">
    </form>
    <a href="/">Volver al Inicio</a>
</body>
</html>