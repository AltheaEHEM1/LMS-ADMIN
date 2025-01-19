<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./images/tabicon.png">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    @vite('resources/js/login.js')
    <title>Novella</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body class="bg-[url('./images/EM_bg.png')] bg-cover bg-center bg-no-repeat bg-fixed relative">
    
     <!-- Logo image -->
     <img src="./images/logo_login.png" alt="library logo" class="w-[550px] mb-10 translate-x-[80px] translate-y-[120px]">


    
    <!-- Sign In Form -->
    <form method="POST" action="{{ route('login_employee') }}" class="w-full max-w-sm space-y-6 translate-x-[160px] translate-y-[130px]" id="SigninForm">
    @csrf
    <!-- Email Input -->
    <div>
        <label for="email" class="block text-sm font-medium text-gray-300 text-left">
            Email <span class="text-red-500">*</span>
        </label>
        <input type="email" id="email" name="email" placeholder="Enter your email"
            value="{{ old('email') }}"
            class="mt-1 p-3 w-full rounded-md border border-gray-300 focus:ring-[#011b33] focus:border-[#011b33] text-black" required>
    </div>

    <!-- Password Input -->
    <div class="relative">
        <label for="password" class="block text-sm font-medium text-gray-300 text-left">
            Password <span class="text-red-500">*</span>
        </label>
        <input type="password" id="password" name="password" placeholder="Enter your password"
            class="mt-1 p-3 w-full rounded-md border border-gray-300 focus:ring-[#011b33] focus:border-[#011b33] text-black" required>
        
        <!-- Eye icon to toggle password visibility -->
        <span class="absolute top-2/3 right-3 transform -translate-y-1/2 cursor-pointer text-gray-500" id="togglePassword">
            <i class="fas fa-eye text-lg"></i>
        </span>
    </div>

    <!-- Login Button -->
    <button type="submit" class="w-full py-3 bg-white text-black rounded-md hover:bg-[#034b72] hover:text-white transition duration-300">
        Sign In
    </button>
</form>

@if ($errors->any())
    <div class="bg-red-500 text-white p-3 rounded mb-4">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif




</body>
</html>
