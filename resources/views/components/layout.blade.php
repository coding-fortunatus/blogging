<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-white">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> Blog Website </title>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

    @vite(['resources/css/app.css','resources/js/app.js'])

</head>
<body class="h-full">
{{ $slot }}
</body>
</html>
