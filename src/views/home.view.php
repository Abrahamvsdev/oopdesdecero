<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School - <?=$name;?></title> 
    <style>
        body {
            font-family: sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column; 
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            text-align: center; 
        }

        .container {
            background-color: white;
            padding: 40px; 
            border-radius: 12px; 
            box-shadow: 0 7px 20px rgba(0, 0, 0, 0.25); 
            max-width: 700px; 
            width: 95%; 
            margin: 20px;
        }

        h1 {
            color: #2c3e50;
            font-weight: bold;
            font-size: 3em; 
            margin-bottom: 20px; 
        }

        p.lead { 
            color: #555;
            font-size: 1.2em;
            margin-bottom: 30px; 
            line-height: 1.6; 
        }

        .button-link {
            display: inline-block;
            padding: 14px 25px; 
            background-color: #3498db; 
            color: white;
            text-decoration: none; 
            border-radius: 8px; 
            font-size: 1.2em;
            font-weight: 600;
            transition: background-color 0.3s ease; 
        }

        .button-link:hover {
            background-color: #2980b9; 
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Bienvenido a <?=$name;?></h1> 
        <p class="lead">Este es el panel de administración de CEFPNuria.</p> 
        <a href="/addUser" class="button-link">Añadir Estudiante/Profesor</a>
        <a href="/addDepartment" class="button-link">Añadir Departamento</a>  
    </div>
</body>
</html>