<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Document</title>
    <script src="../js/app.js" defer></script>
    <script src="https://unpkg.com/axios@1.1.2/dist/axios.min.js"></script>
    

</head>

<body class="bg-orange-100">
    <div class="container mx-auto">
        <div class="w-96 mx-auto p-4">
            <h1 class="text-center text-xl font-semibold">Personal library</h1>
            @yield('content')
        </div>
    </div>
</body>

</html>
