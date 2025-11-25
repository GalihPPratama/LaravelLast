<form action="{{ route('students.store') }}" method="POST" class="space-y-6">
    @csrf

    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
        Add Guardian
    </h3>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">

        <div>
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Name
            </label>
            <input type="text" name="name" id="name" required
                class="w-full border rounded-lg p-2 dark:bg-gray-700 dark:text-white">
        </div>

        <div>
            <label for="classroom" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Classroom
            </label>
            <select id="classroom" name="classroom_id"
                class="w-full border rounded-lg p-2 dark:bg-gray-700 dark:text-white">
                <option value="">-- Select Classroom --</option>
                @foreach ($classrooms as $classroom)
                    <option value="{{ $classroom->id }}">{{ $classroom->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Email
            </label>
            <input type="email" name="email" id="email" required
                class="w-full border rounded-lg p-2 dark:bg-gray-700 dark:text-white">
        </div>

        <div>
            <label for="addressphp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Address
            </label>
            <input type="text" name="addressphp" id="addressphp"
                class="w-full border rounded-lg p-2 dark:bg-gray-700 dark:text-white">
        </div>

        <div>
            <label for="birthdate" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Birthday
            </label>
            <input type="date" name="birthdate" id="birthdate" required
                class="w-full border rounded-lg p-2 dark:bg-gray-700 dark:text-white">
        </div>

    </div>

    <div class="flex justify-end">
        <button type="submit"
            class="px-4 py-2 bg-blue-700 text-white rounded-md hover:bg-blue-800">
            Save
        </button>
    </div>
</form>
