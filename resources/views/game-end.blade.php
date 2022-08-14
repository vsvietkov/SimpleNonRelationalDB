<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SimpleNonRelationalDB</title>
    <style>
        .container {
            display: flex;
            flex-direction: column;
            height: 50%;
            width: 100%;
        }
        .buttons {
            margin: auto;
            display: flex;
            gap: 30px;
        }
        p {
            font-size: 72px;
            margin: auto;
        }
    </style>
</head>
<body>
<form class="container">
    <p>Game End</p>
    <div class="buttons">
        <button name="restart" value="true">Restart</button>
    </div>
</form>
</body>
</html>
