<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="/addUser" method="POST">
        <label for="username">Name</label>
        <input type="text" name="username" id="username">

        <label for="email">Email</label>
        <input type="email" name="email" id="email">

        <label for="lastname">lastname</label> <!-- //TODO Observar bien en el examen, si el campo ' name="" ' está bien -->
        <input type="text" name="lastname" id="lastname">

        <label for="password">Pass</label>
        <input type="password" name="password" id="password">

        <label for="dni">Dni</label>
        <input type="text" name="dni" id="dni">

        <label for="type">Type</label>
        <input type="text" name="type">

        <!--<label for="enrollment_year">Enrollment Year</label>
        <input type="number" name="enrollment_year" id="enrollment_year">-->

        <button type="submit">Enviar</button>
    </form>
    
</body>
</html>