<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>
        <!-- Generate QR Code -->
        <div class="mt-6">
            <button type="button" onclick="generate2FA()" class="bg-indigo-600 text-white px-4 py-2 rounded">Generate 2FA QR Code</button>
        </div>

        <!-- QR Code + TOTP Input -->
        <div class="mt-4" id="qr-container" style="display: none;">
            <p class="mb-2">Scan this QR code in Google Authenticator:</p>
            <div id="qrcode"></div>

            <!-- TOTP Code Input -->
            <div class="mt-4">
                <x-input-label for="otp" :value="__('Enter Code from App')" />
                <x-text-input id="otp" class="block mt-1 w-full" type="text" name="otp" required />
                <x-input-error :messages="$errors->get('otp')" class="mt-2" />
            </div>
        </div>

        <!-- Hidden Google2FA Secret -->
        <input type="hidden" name="google2fa_secret" id="google2fa_secret" />

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
    <script>
    function generate2FA() {
        const email = document.getElementById('email').value;

        if (!email) {
            alert("Please enter your email first.");
            return;
        }

        fetch("{{ route('2fa.generate') }}", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
            },
            body: JSON.stringify({ email: email })
        })
        .then(response => response.json())
        .then(data => {
            document.getElementById('google2fa_secret').value = data.secret;
            document.getElementById('qr-container').style.display = 'block';
            document.getElementById('qrcode').innerHTML = `<img src="${data.qr}" />`;
        });
    }
    </script>

</x-guest-layout>
