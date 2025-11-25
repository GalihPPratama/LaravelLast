<div 
x-data="{ openDeleteModal: false, deleteUrl: '' }"
x-cloak>

    <div
        x-show="openDeleteModal"
        x-transition
        class="fixed inset-0 flex items-center justify-center bg-black/50 z-50"
    >
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg w-full max-w-md p-6 relative">

            <button
                @click="openDeleteModal = false"
                class="absolute top-2 right-3 text-gray-400 hover:text-gray-600"
            >✕</button>

            <div class="text-center">

                <svg class="text-gray-400 dark:text-gray-500 w-11 h-11 mb-3.5 mx-auto" 
                    fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" 
                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" 
                        clip-rule="evenodd"></path>
                </svg>

                <p class="mb-4 text-gray-500 dark:text-gray-300">
                    Are you sure you want to delete this guardian?
                </p>

                <div class="flex justify-center items-center space-x-4">
                    <button
                        @click="openDeleteModal = false"
                        type="button"
                        class="py-2 px-3 text-sm text-gray-500 bg-white rounded-lg border hover:bg-gray-100 
                        dark:bg-gray-700 dark:text-gray-300"
                    >
                        No, cancel
                    </button>

                    <form :action="deleteUrl" method="POST">
                        @csrf
                        @method('DELETE')
                        <button
                            type="submit"
                            class="py-2 px-3 text-sm text-white bg-red-600 rounded-lg hover:bg-red-700"
                        >
                            Yes, I'm sure
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>

</div>