<x-layout>
    <div class="max-w-lg mx-auto mt-10 p-6 bg-white rounded-lg shadow-lg border border-gray-200">
        <h2 class="text-2xl font-bold text-blue-600 mb-6 text-center">Edit Course</h2>
        <form action="{{ route('courses.update', $course->id) }}" method="post">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                <input
                    id="title"
                    name="title"
                    class="form-input mt-1 block w-full border border-gray-300 rounded-md shadow-sm bg-gray-100 p-3 focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50"
                    value="{{ $course["title"] ?? "" }}"
                >
            </div>

            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea
                    id="description"
                    name="description"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm bg-gray-100 p-3 focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50"
                >{{ $course["description"] ?? "" }}</textarea>
            </div>

            <div class="flex flex-col items-center gap-4">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-md transition duration-300 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6h18M4 6l1.293-1.293a1 1 0 011.414 0L12 7.586l5.293-5.293a1 1 0 011.414 0L21 6h1M4 6v14a1 1 0 001 1h14a1 1 0 001-1V6H4z" />
                    </svg>
                    Save Changes
                </button>
                <a href="{{ route('courses.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white py-2 px-4 rounded-md transition duration-300">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</x-layout>
