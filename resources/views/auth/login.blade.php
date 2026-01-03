<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Animasi -->
    <style>
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade {
            animation: fadeInUp 0.8s ease-out;
        }
    </style>
</head>

<body class="min-h-screen bg-gradient-to-br from-indigo-600 to-purple-700 flex items-center justify-center"
    style="background-image: url('{{ asset('images/bg-login.jpg') }}');">

    <body class="min-h-screen relative overflow-hidden">

        <!-- Background -->
        <div class="fixed inset-0 bg-cover bg-center bg-no-repeat scale-105"
            style="background-image: url('{{ asset('images/bg-login.jpg') }}');">
        </div>

        <!-- Overlay -->
        <div class="fixed inset-0 bg-black/40"></div>

        <!-- Login Card -->
        <div class="relative z-10 min-h-screen flex items-center justify-center">
            <div class="bg-black/55 backdrop-blur-lg border border-white/20 
            w-full max-w-md rounded-2xl shadow-2xl p-8 animate-fade text-white">
                <h2 class="text-3xl font-extrabold text-center mb-6 text-white drop-shadow-lg">
                    Login
                </h2>


                <!-- FORM LOGIN -->


                @if(session('error'))
                    <div class="bg-red-100 text-red-600 p-3 rounded mb-4 text-sm">
                        {{ session('error') }}
                    </div>
                @endif

                <form method="POST" action="/login" class="space-y-4">
                    @csrf

                    <!-- Email -->
                    <div>
                        <label class="text-sm text-gray-300">Email</label>
                        <input type="email" name="email"
                            class="w-full px-4 py-2 bg-white/10 text-white placeholder-gray-300 border border-white/20 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none"
                            placeholder="you@email.com" required>
                    </div>

                    <!-- Password + Show Hide -->
                    <div>
                        <label class="text-sm text-gray-300">Password</label>
                        <div class="relative">
                            <input type="password" name="password" id="password"
                                class="w-full px-4 py-2 bg-white/10 text-white placeholder-gray-300 border border-white/20 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none"
                                placeholder="••••••••" required>
                            <button type="button" onclick="togglePassword()"
                                class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-500 hover:text-indigo-600">
                                👁
                            </button>
                        </div>
                    </div>

                    <!-- Remember Me -->
                    <div class="flex items-center justify-between text-sm">
                        <label class="flex items-center gap-2">
                            <input type="checkbox" name="remember" class="rounded text-indigo-600">
                            Remember me
                        </label>

                        <a href="#" class="text-indigo-600 hover:underline">
                            Forgot password?
                        </a>
                    </div>

                    <!-- Button -->
                    <button type="submit"
                        class="w-full py-2 bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-semibold rounded-lg hover:scale-[1.02] transition transform">
                        Login
                    </button>
                </form>

                <p class="text-center text-sm text-gray-600 mt-6">
                    Belum punya akun?
                    <a href="/register" class="text-indigo-600 hover:underline font-semibold">
                        Register
                    </a>
                </p>
            </div>

            <!-- JS Show / Hide Password -->
            <script>
                function togglePassword() {
                    const input = document.getElementById('password');
                    input.type = input.type === 'password' ? 'text' : 'password';
                }
            </script>

    </body>

</html>