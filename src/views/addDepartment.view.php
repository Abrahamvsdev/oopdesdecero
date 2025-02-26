<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir Departamento</title>
    <style>
        body {
            font-family: sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            text-align: center;
        }

        .container {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            max-width: 600px;
            width: 95%;
            margin: 20px;
        }

        h1 {
            color: #2c3e50;
            font-weight: bold;
            font-size: 2.5em;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 20px;
            text-align: left; 
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #34495e;
        }

        .form-group input[type="text"] {
            width: 100%;
            padding: 12px;
            border: 1px solid #bdc3c7;
            border-radius: 8px;
            box-sizing: border-box;
            font-size: 1.1em;
            color: #444;
        }

        button[type="submit"], .button-link { /* Estilos aplicados también a .button-link */
            display: inline-block;
            padding: 14px 20px;
            background-color: #27ae60;
            color: white;
            text-decoration: none;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 1.2em;
            font-weight: 600;
            transition: background-color 0.3s ease;
            margin-top: 15px; 
        }

        button[type="submit"]:hover, .button-link:hover {
            background-color: #219150;
        }

        .back-link { 
            display: inline-block;
            margin-top: 20px; 
            color: #3498db;
            text-decoration: none;
        }

        .back-link:hover {
            text-decoration: underline; 
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Añadir Nuevo Departamento</h1>
        <form action="/storeDepartment" method="POST">
            <div class="form-group">
                <label for="name">Nombre del Departamento:</label>
                <input type="text" id="name" name="name" placeholder="Introduce el nombre del departamento" required>
            </div>

            <button type="submit">Guardar Departamento</button>
        </form>
        <a href="/" class="button-link">Volver al Inicio</a> 
    </div>
</body>
</html>