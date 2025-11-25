<form action="{{ route('guardian.store') }}" method="POST" class="space-y-6">
    @csrf

    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
        Add Student
    </h3>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">

        <div>
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Name
            </label>
            <input type="text" name="name"
                class="w-full border rounded-lg p-2 dark:bg-gray-700 dark:text-white">
        </div>

        <div>
            <label for="job" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Job
            </label>
            <input type="text" name="job"
                class="w-full border rounded-lg p-2 dark:bg-gray-700 dark:text-white">
        </div>

        <div>
            <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Phone
            </label>
            <input type="text" name="phone"
                class="w-full border rounded-lg p-2 dark:bg-gray-700 dark:text-white">
        </div>

        <div>
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Email
            </label>
            <input type="email" name="email"
                class="w-full border rounded-lg p-2 dark:bg-gray-700 dark:text-white">
        </div>

        <div>
            <label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Address
            </label>
            <input type="text" name="address"
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
