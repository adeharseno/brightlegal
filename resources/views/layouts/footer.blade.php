<footer class="bg-gray-800 text-white mt-auto">
    <div class="container mx-auto px-4 py-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div>
                <h3 class="text-xl font-bold mb-4">{{ config('app.name', 'BrightLegal') }}</h3>
                <p class="text-gray-400">Your trusted legal partner.</p>
            </div>

            <div>
                <h4 class="text-lg font-semibold mb-4">Quick Links</h4>
                <ul class="space-y-2">
                    <li><a href="{{ url('/') }}" class="text-gray-400 hover:text-white transition">Home</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition">About</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition">Services</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition">Contact</a></li>
                </ul>
            </div>

            <div>
                <h4 class="text-lg font-semibold mb-4">Contact Info</h4>
                <ul class="space-y-2 text-gray-400">
                    <li>Email: info@brightlegal.com</li>
                    <li>Phone: +1 234 567 890</li>
                    <li>Address: 123 Legal Street</li>
                </ul>
            </div>
        </div>

        <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-400">
            <p>&copy; {{ date('Y') }} {{ config('app.name', 'BrightLegal') }}. All rights reserved.</p>
        </div>
    </div>
</footer>
