<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuario Agregado</title>
    <style>
        body { font-family: sans-serif; text-align: center; padding-top: 50px; }
        .success-message { color: green; font-size: 1.2em; margin-bottom: 20px; }
        .button-link { display: inline-block; padding: 10px 15px; background-color: #007bff; color: white; text-decoration: none; border-radius: 5px; }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="success-message"><?php echo $_SESSION['success_message'] ?? 'Usuario agregado correctamente.'; ?></h2>
        <a href="/addUser" class="button-link">Añadir Otro Usuario</a>
    </div>
</body>
</html>