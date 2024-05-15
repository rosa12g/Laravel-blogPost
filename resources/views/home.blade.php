<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
</head>
<body>
    <div class="container">
        @auth
        <p class="info-message">You are logged in</p>
        <form action="/logout" method="POST">
            @csrf
            <button class="btn">Logout</button>
        </form>

        <div class="section">
            <h2>Create New Post</h2>
            <form action="create-post" method="POST">
                @csrf
                <input type="text" name="title" placeholder="Post Title" class="input">
                <textarea name="body" placeholder="Body Content..." class="textarea"></textarea>
                <button class="btn">Save Post</button>
            </form>
        </div>

        <div class="section">
            <h2>All Posts</h2>
            @foreach($posts as $post)
            <div class="post">
                <h3>{{ $post['title'] }}</h3>
                <p>{{ $post['body'] }}</p>
            </div>
            @endforeach
        </div>
        @else
        @if (request()->get('action') == 'register')
        <div class="section">
            <h2>Register</h2>
            <form action="/register" method="POST">
                @csrf
                <input name="name" type="text" placeholder="Name" class="input">
                <input name="email" type="text" placeholder="Email" class="input">
                <input name="password" type="password" placeholder="Password" class="input">
                <button class="btn">Register</button>
            </form>
            <p>Already have an account? <a href="{{ url('/?action=login') }}">Login here</a></p>
        </div>
        @else
        <div class="section">
            <h2>Login</h2>
            <form action="/login" method="POST">
                @csrf
                <input name="loginname" type="text" placeholder="Name" class="input">
                <input name="loginpassword" type="password" placeholder="Password" class="input">
                <button class="btn">Login</button>
            </form>
            <p>Don't have an account? <a href="{{ url('/?action=register') }}">Register here</a></p>
        </div>
        @endif
        @endauth
    </div>
</body>
</html>
