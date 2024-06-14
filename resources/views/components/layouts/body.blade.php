<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="{{ asset('assets/js/tailwind-css-3.4.4.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('assets/icons/fontawesome6/css/all.min.css') }}">
    <title>NIC_LARAVEL</title>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                colors: {
                    clifford: '#da373d',
                }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-100">
    {{ $slot }}
</body>
</html>