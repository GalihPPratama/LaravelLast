<div x-cloak>
    <div x-show="openEditModal" x-transition class="fixed inset-0 flex items-center justify-center bg-black/50 z-50">
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg w-full max-w-2xl p-6 relative">
            <button @click="openEditModal = false" class="absolute top-2 right-3 text-gray-400 hover:text-gray-600">✕</button>

            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Edit Subject</h3>

            <form :action="editUrl" method="POST" class="space-y-4">
                @csrf
                @method('PUT')

                <div class="grid gap-4">
                    <div>
                        <label class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                        <input type="text" name="name" class="w-full border rounded-lg p-2 dark:bg-gray-700 dark:text-white" x-model="editData.name" required>
                    </div>
                    <div>
                        <label class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                        <textarea name="description" rows="3" class="w-full border rounded-lg p-2 dark:bg-gray-700 dark:text-white" x-model="editData.description"></textarea>
                    </div>
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="px-4 py-2 bg-blue-700 text-white rounded-md hover:bg-blue-800">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>