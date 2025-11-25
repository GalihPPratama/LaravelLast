<div x-show="openEditModal" x-transition class="fixed inset-0 flex items-center justify-center bg-black/50 z-50">
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg w-full max-w-2xl p-6 relative">

        <button @click="openEditModal = false" class="absolute top-2 right-3 text-gray-400 hover:text-gray-600">
            ✕
        </button>

        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
            Edit Student
        </h3>

        <form :action="editUrl" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">

                <!-- Name -->
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Name
                    </label>
                    <input type="text" name="name" x-model="editData.name" required
                        class="w-full border rounded-lg p-2 dark:bg-gray-700 dark:text-white">
                </div>

                <!-- Classroom -->
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Classroom
                    </label>
                    <select name="classroom_id" x-model="editData.classroom_id"
                        class="w-full border rounded-lg p-2 dark:bg-gray-700 dark:text-white">
                        <option value="">-- Select Classroom --</option>
                        @foreach ($classrooms as $classroom)
                            <option value="{{ $classroom->id }}">{{ $classroom->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Email -->
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Email
                    </label>
                    <input type="email" name="email" x-model="editData.email" required
                        class="w-full border rounded-lg p-2 dark:bg-gray-700 dark:text-white">
                </div>

                <!-- Address -->
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Address
                    </label>
                    <input type="text" name="addressphp" x-model="editData.addressphp"
                        class="w-full border rounded-lg p-2 dark:bg-gray-700 dark:text-white">
                </div>

                <!-- Birthday -->
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Birthday
                    </label>
                    <input type="date" name="birthdate" x-model="editData.birthdate"
                        class="w-full border rounded-lg p-2 dark:bg-gray-700 dark:text-white">
                </div>

            </div>

            <div class="flex justify-end">
                <button type="submit" class="px-4 py-2 bg-blue-700 text-white rounded-md hover:bg-blue-800">
                    Update
                </button>
            </div>
        </form>

    </div>
</div>
