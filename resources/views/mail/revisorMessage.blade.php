<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Messaggio per il revisore</title>
</head>
<body>
    <h1>Ciao admin</h1>
    <h2>L'utente {{$contact['name']}} ha richiesto di diventare advisor</h2>
    <p>Ecco le sue credenziali:</p>
    <p>Nome: {{$contact['name']}} </p>
    <p>Email: {{$contact['email']}} </p>
    <p>Messaggio: {{$contact['body']}} </p>

</body>
</html>
