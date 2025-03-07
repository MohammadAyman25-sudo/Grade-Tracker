<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    @vite(['resources/css/register.css', 'resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div>
        <!-- I begin to speak only when I am certain what I will say is not better left unsaid. - Cato the Younger -->
        <div class="form">
            <h2 class="text-3xl font-extrabold dark:text-black">Sign up</h2>
            @if ($errors->any())
                <div class="p-4 mb-4 text-md text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                    role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="/register" method="POST">
                @csrf
                <div class="flex flex-1 justify-between gap-x-0.5">
                    <div class="relative mb-4">
                        <input type="text" id="first_name" name="first_name"
                            class="block px-2.5 pb-2.5 pt-4 text-field w-full text-md text-gray-900 bg-white rounded-lg border-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            placeholder=" " value="{{ old('first_name') }}" required />
                        <label for="first_name" class="absolute text-md font-semibold text-gray-500 
                                                        dark:text-gray-500 duration-300 transform -translate-y-4 scale-75 
                                                        top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 
                                                        peer-focus:text-blue-600 peer-focus:dark:text-blue-500 
                                                        peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 
                                                        peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 
                                                        peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 
                                                        rtl:peer-focus:left-auto start-1">First Name</label>
                    </div>
                    <div class="relative mb-4">
                        <input type="text" id="last_name" name="last_name"
                            class="block px-2.5 pb-2.5 pt-4 text-field w-full text-md text-gray-900 bg-white rounded-lg border-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            placeholder=" " value="{{ old('last_name') }}" required />
                        <label for="last_name" class="absolute text-md font-semibold text-gray-500 
                                        dark:text-gray-500 duration-300 transform -translate-y-4 scale-75 
                                        top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 
                                        peer-focus:text-blue-600 peer-focus:dark:text-blue-500 
                                        peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 
                                        peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 
                                        peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 
                                        rtl:peer-focus:left-auto start-1">Last Name</label>
                    </div>
                </div>
                <div class="flex flex-1 justify-between">
                    <div class="relative mb-4">
                        <input type="text" id="username" name="username"
                            class="block px-2.5 pb-2.5 pt-4 text-field w-full text-md text-gray-900 bg-white rounded-lg border-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            placeholder=" " value="{{ old('username') }}" required />
                        <label for="username" class="absolute text-md font-semibold text-gray-500 
                                                        dark:text-gray-500 duration-300 transform -translate-y-4 scale-75 
                                                        top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 
                                                        peer-focus:text-blue-600 peer-focus:dark:text-blue-500 
                                                        peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 
                                                        peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 
                                                        peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 
                                                        rtl:peer-focus:left-auto start-1">Username</label>
                    </div>
                    <div class="relative mb-4">
                        <input type="email" id="email"
                            class="block px-2.5 pb-2.5 pt-4 w-full text-md text-gray-900 bg-white rounded-lg border-2 border-gray-300 appearance-none dark:text-gray-900 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            placeholder=" " name="email" required/>
                        <label for="email" class="absolute text-md font-semibold
                                                                     text-gray-500 dark:text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4
                                                                      rtl:peer-focus:left-auto start-1">Email</label>
                    </div>
                </div>
                <div class="flex flex-1 justify-between">
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
                        <div class="relative mb-4">
                            <input type="password" id="password_confirmation" name="password_confirmation"
                                class="block px-2.5 pb-2.5 pt-4 text-field w-full text-md text-gray-900 bg-white rounded-lg border-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder=" " required/>
                            <label for="password_confirmation" class="absolute text-md font-semibold text-gray-500 
                                                        dark:text-gray-500 duration-300 transform -translate-y-4 scale-75 
                                                        top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 
                                                        peer-focus:text-blue-600 peer-focus:dark:text-blue-500 
                                                        peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 
                                                        peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 
                                                        peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 
                                                        rtl:peer-focus:left-auto start-1">Re-Type Password</label>
                        </div>
                </div>
                <button>Register</button>
                <p>Already have an account ? <a href="{{ url('login') }}">Log in</a></p>
            </form>
        </div>
    </div>
</body>

</html>