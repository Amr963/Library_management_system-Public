@if (session()->has('message'))
    <div x-data="{ show: true }"
        class="fixed top-0 buttom-1/2 left-1/2 transform-translate-x-1/2 bg-laravel text-white px-48 py-3"
        x-init="setTimeout(() => show = false, 3000)" x-show="show">
        <p style="color: red;">
            {{ session('message') }}
        </p>
    </div>
@endif
