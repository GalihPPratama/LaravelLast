<form :action="editUrl" method="POST" class="space-y-5">
    @csrf
    @method('PUT')

    <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200 mb-3">
        Edit Teacher
    </h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">

        <!-- Name -->
        <div>
            <label class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300">
                Name
            </label>
            <input type="text" name="name" x-model="editData.name"
                class="w-full p-2 rounded border text-white dark:bg-gray-700 dark:border-gray-600" required>
        </div>

        <!-- Subject -->
        <div>
            <label class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300">
                Subject
            </label>
            <select name="subject_id" x-model="editData.subject_id"
                class="w-full p-2 rounded border text-white dark:bg-gray-700 dark:border-gray-600" required>
                @foreach ($subjects as $subject)
                    <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Phone -->
        <div>
            <label class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300">
                Phone
            </label>
            <input type="text" name="phone" x-model="editData.phone"
                class="w-full p-2 rounded border text-white dark:bg-gray-700 dark:border-gray-600">
        </div>

        <!-- Email -->
        <div>
            <label class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300">
                Email
            </label>
            <input type="email" name="email" x-model="editData.email"
                class="w-full p-2 rounded border text-white dark:bg-gray-700 dark:border-gray-600">
        </div>
    </div>

    <!-- Address (full width) -->
    <div>
        <label class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300">
            Address
        </label>
        <textarea name="address" rows="3" x-model="editData.address"
            class="w-full p-2 rounded border text-white dark:bg-gray-700 dark:border-gray-600"></textarea>
    </div>

    <div class="flex justify-end">
        <button class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
            Update
        </button>
    </div>
</form>
