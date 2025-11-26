<form action="{{ route('teacher.store') }}" method="POST" class="space-y-5">
    @csrf

    <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200 mb-3">
        Add New Teacher
    </h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">


        <div>
            <label class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300">
                Name
            </label>
            <input type="text" name="name"
                   class="w-full p-2 rounded border text-white dark:bg-gray-700 dark:border-gray-600"

                   required>
        </div>


        <div>
            <label class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300">
                Subject
            </label>
            <select name="subject_id"
                    class="w-full p-2 rounded border text-white dark:bg-gray-700 dark:border-gray-600"

                    required>
                <option value="">-- Choose Subject --</option>
                @foreach ($subjects as $subject)
                    <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                @endforeach
            </select>
        </div>


        <div>
            <label class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300">
                Phone
            </label>
            <input type="text" name="phone"
                   class="w-full p-2 rounded border text-white dark:bg-gray-700 dark:border-gray-600"
>
        </div>

        <div>
            <label class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300">
                Email
            </label>
            <input type="email" name="email"
                   class="w-full p-2 rounded border text-white dark:bg-gray-700 dark:border-gray-600"
>
        </div>
    </div>

    <div>
        <label class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300">
            Address
        </label>
        <textarea name="address" rows="3"
                 class="w-full p-2 rounded border text-white dark:bg-gray-700 dark:border-gray-600"
    ></textarea>
    </div>

    <div class="flex justify-end">
        <button class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
            Save
        </button>
    </div>
</form>
