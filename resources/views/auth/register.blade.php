<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Animasi masuk -->
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

<body class="min-h-screen relative overflow-hidden">

    <!-- Background Image -->
    <div class="fixed inset-0 bg-cover bg-center bg-no-repeat"
        style="background-image: url('{{ asset('images/bg-register.jpeg') }}');">
    </div>

    <!-- Overlay -->
    <div class="fixed inset-0 bg-black/40"></div>

    <!-- Register Card -->
    <div class="relative z-10 min-h-screen flex items-center justify-center">
        <div
            class="bg-black/50 backdrop-blur-lg border border-white/20 w-full max-w-md rounded-xl shadow-2xl p-8 animate-fade text-white">


            <h2 class="text-3xl font-extrabold text-center mb-6 text-white drop-shadow-lg">
                Register
            </h2>

            @if ($errors->any())
                <div class="bg-red-100 text-red-600 p-3 rounded mb-4 text-sm">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="/register" class="space-y-4">
                @csrf

                <!-- Name -->
                <div>
                    <label class="text-sm text-gray-300">Nama</label>
                    <input type="text" name="name"
                        class="w-full px-4 py-2 bg-white/10 text-white placeholder-gray-300 border border-white/20 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none"
                        placeholder="Nama lengkap" required>
                </div>

                <!-- Email -->
                <div>
                    <label class="text-sm text-gray-300">E-mail</label>
                    <input type="email" name="email"
                        class="w-full px-4 py-2 bg-white/10 text-white placeholder-gray-300 border border-white/20 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none"
                        placeholder="you@email.com" required>
                </div>

                <!-- Password -->
                <div>
                    <label class="text-sm text-gray-300">Password</label>
                    <div class="relative">
                        <input type="password" id="password" name="password"
                            class="w-full px-4 py-2 bg-white/10 text-white placeholder-gray-300 border border-white/20 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none"
                            placeholder="••••••••" required>
                        <button type="button" onclick="togglePassword('password')"
                            class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-500 hover:text-indigo-600">
                            👁
                        </button>
                    </div>
                </div>

                <!-- Confirm Password -->
                <div>
                    <label class="text-sm text-gray-300">Konfirmasi Password</label>
                    <div class="relative">
                        <input type="password" id="password_confirmation" name="password_confirmation"
                            class="w-full px-4 py-2 bg-white/10 text-white placeholder-gray-300 border border-white/20 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none"
                            placeholder="••••••••" required>
                        <button type="button" onclick="togglePassword('password_confirmation')"
                            class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-500 hover:text-indigo-600">
                            👁
                        </button>
                    </div>
                </div>

                <!-- Button -->
                <button type="submit"
                    class="w-full py-2 bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-semibold rounded-lg hover:scale-[1.02] transition transform">
                    Register
                </button>
            </form>

            <p class="text-center text-sm text-gray-600 mt-6">
                Sudah punya akun?
                <a href="/login" class="text-indigo-400 hover:underline">
                    Login
                </a>
            </p>

        </div>
    </div>

    <!-- JS Show / Hide Password -->
    <script>
        function togglePassword(id) {
            const input = document.getElementById(id);
            input.type = input.type === 'password' ? 'text' : 'password';
        }
    </script>

</body>

</html>