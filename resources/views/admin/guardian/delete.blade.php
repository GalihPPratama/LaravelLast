<div x-show="openDeleteModal" x-transition x-cloak
    class="fixed inset-0 flex items-center justify-center bg-black/50 z-50">

    <div @click.outside="openDeleteModal = false"
         class="bg-white dark:bg-gray-800 rounded-xl shadow-lg w-full max-w-md p-6 relative">

        <button @click="openDeleteModal = false"
            class="absolute top-2 right-3 text-gray-400 hover:text-gray-600">✕</button>

        <form x-bind:action="deleteUrl" method="POST">
            @csrf
            @method('DELETE')

            <h2 class="text-lg font-semibold text-gray-900 dark:text-gray-100">
                Delete Guardian?
            </h2>

            <p class="text-gray-600 dark:text-gray-300 mt-2">
                Are you sure you want to delete this guardian?  
                This action cannot be undone.
            </p>

            <div class="flex justify-end gap-2 mt-6">
                <button type="button"
                        @click="openDeleteModal = false"
                        class="px-4 py-2 bg-gray-500 text-white rounded-lg">
                    Cancel
                </button>

                <button class="px-4 py-2 bg-red-600 text-white rounded-lg">
                    Delete
                </button>
            </div>
        </form>
    </div>
</div>
