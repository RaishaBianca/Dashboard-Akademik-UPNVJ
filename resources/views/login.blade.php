<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Portal Layanan Akademik</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div id="LoginPage">
        <div class="left">
                <h1>Portal Layanan Akademik</h1>
                <h4>UPN Veteran Jakarta</h4>
        </div>
        <div class='right'>
            <div class='form-div'>
                <h1 class='title'>LOGIN</h1>
                <form action="{{ route('dashboard') }}" method="GET">
                    @component('components.input', ['type' => 'text', 'name' => 'username', 'placeholder' => 'Username'])
                    @endcomponent
                    @component('components.input', ['type' => 'password', 'name' => 'password', 'placeholder' => 'Password'])
                    @endcomponent
                    <button type="submit" class='submit-button'>Login</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>