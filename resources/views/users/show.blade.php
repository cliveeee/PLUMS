<x-layout>
    <div class="container mx-auto p-6 bg-white shadow-md rounded">
        <h1 class="text-2xl font-bold mb-6">User Details</h1>

        <div class="mb-4">
            <h2 class="text-xl font-semibold">Name:</h2>
            <p>{{ $user->name }}</p>
        </div>

        <div class="mb-4">
            <h2 class="text-xl font-semibold">Email:</h2>
            <p>{{ $user->email }}</p>
        </div>

        <div class="mb-4">
            <h2 class="text-xl font-semibold">Role:</h2>
            <p>{{ $user->getRole() }}</p>
        </div>

        <a href="{{ route('users.index') }}" class="bg-blue-600 text-white p-2 rounded">Back to Users</a>
    </div>
</x-layout>