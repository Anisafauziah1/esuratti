<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Login</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen flex items-center justify-center bg-white">
  <div class="w-[480px] max-w-full p-12 rounded-3xl shadow-md"
       style="background: linear-gradient(135deg, #dff9e6 0%, #e6e9ef 100%)">

    <form action="{{ route('login') }}" method="POST" class="flex flex-col items-center space-y-6">
      @csrf

      <h2 class="text-green-700 font-semibold text-lg">Log In</h2>

      <input type="text" name="email" placeholder="Email" value="{{ old('email') }}"
        class="w-72 h-12 px-5 rounded-full shadow-sm border border-gray-300 focus:outline-none focus:ring-2 focus:ring-green-300"
        required />

      <input type="password" name="password" placeholder="Password"
        class="w-72 h-12 px-5 rounded-full shadow-sm border border-gray-300 focus:outline-none focus:ring-2 focus:ring-green-300"
        required />

      <button type="submit"
        class="w-72 h-12 rounded-full text-white text-sm font-medium shadow-md transition-colors"
        style="background-color: #568962;">
        Masuk
      </button>

      @error('email')
        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
      @enderror
    </form>

  </div>
</body>
</html>
