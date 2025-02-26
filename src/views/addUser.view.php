<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
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
        }

        .container {
            background-color: white;
            padding: 30px; 
            border-radius: 10px; 
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2); 
            max-width: 600px; 
            width: 100%;
            margin: 20px;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px; 
            color: #2c3e50; 
            font-weight: bold; 
            font-size: 2.5em; 
        }

        .form-group {
            margin-bottom: 20px; 
        }

        .form-group label {
            display: block;
            margin-bottom: 8px; 
            font-weight: 600; 
            color: #34495e; 
        }

        .form-group input[type="text"],
        .form-group input[type="email"],
        .form-group input[type="password"],
        .form-group input[type="number"],
        .form-group select {
            width: 100%;
            padding: 12px; 
            border: 1px solid #bdc3c7; 
            border-radius: 8px; 
            box-sizing: border-box;
            font-size: 1.1em; 
            color: #444; 
        }

        .form-group select {
            appearance: none; 
            -webkit-appearance: none; 
            -moz-appearance: none; 
            background-image: url('data:image/svg+xml;utf8,<svg fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M7 10l5 5 5-5z"/><path d="M0 0h24v24H0z" fill="none"/></svg>'); /* Añadir icono de flecha */
            background-repeat: no-repeat;
            background-position-x: 100%;
            background-position-y: 5px;
            padding-right: 30px; 
        }
        .form-group select::-ms-expand {
            display: none;
        }


        button[type="submit"] {
            background-color: #27ae60; 
            color: white;
            padding: 14px 20px; 
            border: none;
            border-radius: 8px; 
            cursor: pointer;
            font-size: 1.2em; 
            font-weight: 600; 
            display: block;
            width: 100%;
            transition: background-color 0.3s ease; 
        }

        button[type="submit"]:hover {
            background-color: #219150; 
        }

        .error-message {
            color: #c0392b; 
            margin-bottom: 20px; 
            padding: 10px;
            border: 1px solid #e74c3c; 
            border-radius: 4px;
            background-color: #fdedec; 
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Registro de Nuevo Usuario</h1>
        <form action="/addUser" method="POST">
            <div class="form-group">
                <label for="username">Nombre de Usuario</label>
                <input type="text" name="username" id="username" placeholder="Introduce tu nombre de usuario" required>
            </div>

            <div class="form-group">
                <label for="lastname">Apellido</label>
                <input type="text" name="lastname" id="lastname" placeholder="Introduce tu apellido" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" placeholder="Introduce tu email" required>
            </div>

            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" name="password" id="password" placeholder="Introduce tu contraseña" required>
            </div>

            <div class="form-group">
                <label for="dni">DNI</label>
                <input type="text" name="dni" id="dni" placeholder="Introduce tu DNI" required>
            </div>

            <div class="form-group">
                <label for="type">Tipo de Usuario</label>
                <select name="type" id="type" required>
                    <option value="">Selecciona un tipo de usuario</option> 
                    <option value="student">Estudiante</option>
                    <option value="teacher">Profesor</option>
                </select>
            </div>

            <div class="form-group">
                <label for="enrollment_year">Año de Inscripción (Solo Alumnos)</label>
                <input type="number" name="enrollment_year" id="enrollment_year" placeholder="Año de inscripción (opcional)">
            </div>

            <div class="form-group">
                <label for="department_id">Número de departamento (Solo Profesores)</label>
                <input type="number" name="department_id" id="department_id" placeholder="Número de departamento (opcional)">
            </div>

            <button type="submit">Registrar Usuario</button>
        </form>
    </div>
</body>
</html>