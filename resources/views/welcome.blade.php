<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel 10 and Vue3</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    @vite(['resources/css/app.css'])
    {{-- @vite(['https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css']) --}}
</head>

<body>
    <div id="app">
        <App />
    </div>
    @vite(['resources/js/app.js'])

</body>

</html>
