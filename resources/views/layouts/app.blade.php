<div class="min-h-screen bg-gray-100">
    @include('layouts.navigation')

    <!-- Page Heading -->
    <header class="bg-white shadow text-center">
        <div class="flex justify-between space-x-7 max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            {{ $header }}
            <nav class="space-x-4">
                <span class="text-xl font-bold">Settings: </span>
                <Link href="{{ route('service.index') }}">Services</Link>
                <Link href="{{ route('service_category.index') }}">Categories</Link>
                <Link href="{{ route('price_increments.index') }}">Price Increments</Link>
            </nav>
        </div>
    </header>

    <!-- Page Content -->
    <main>
        {{ $slot }}
    </main>
</div>
