<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    @vite(['resources/css/login.css', 'resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="form">
        <!-- Simplicity is the essence of happiness. - Cedric Bledsoe -->
        <h2 class="text-3xl font-extrabold dark:text-black">Log in</h2>
        @if($errors->any())
            <div class="p-4 mb-4 text-md text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @elseif(session('status') !== null)
                <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                    <span class="font-medium">{{ session('status') }}</span>
                </div>
        @elseif(session('email_verification') !== null)
            <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                <span class="font-medium">{{ session('email_verification') }}</span>
            </div>
        @endif
        <form action="/signin" method="POST">
            @csrf
            <div class="relative mb-4">
                <input type="text" id="username" name="username"
                    class="block px-2.5 pb-2.5 pt-4 text-field w-full text-md text-gray-900 bg-white rounded-lg border-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" " value="{{ old('username') }}" required/>
                <label for="username"
                    class="absolute text-md font-semibold text-gray-500 
                    dark:text-gray-500 duration-300 transform -translate-y-4 scale-75 
                    top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 
                    peer-focus:text-blue-600 peer-focus:dark:text-blue-500 
                    peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 
                    peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 
                    peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 
                    rtl:peer-focus:left-auto start-1">Username</label>
            </div>
            <div class="relative mb-4">
                <input type="password" id="password" name="password"
                    class="block px-2.5 pb-2.5 pt-4 text-field w-full text-md text-gray-900 bg-white rounded-lg border-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" " required/>
                <label for="password" class="absolute text-md font-semibold text-gray-500 
                                dark:text-gray-500 duration-300 transform -translate-y-4 scale-75 
                                top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 
                                peer-focus:text-blue-600 peer-focus:dark:text-blue-500 
                                peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 
                                peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 
                                peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 
                                rtl:peer-focus:left-auto start-1">Password</label>
            </div>
            <a class="forgot-password" href="{{ url('/forgot-password') }}">Forgot Password ?</a>
            <br><br>
            <span class="flex items-center mb-4">
                <input id="remember-me" name="remember_me" type="checkbox" value="true"
                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="remember-me" class="ms-2 text-md font-medium text-black-900 dark:text-black-300">Remember Me</label>
            </span>
            <button>Login</button>
            <p>Create a new Account ? <a href="{{ url('/signup') }}">Register</a></p>
        </form>
    </div>
</body>
</html>