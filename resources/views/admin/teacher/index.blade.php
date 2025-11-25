<x-admin.dash-layout>

    <x-slot:judul>{{ $title }}</x-slot:judul>

    <section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">
        <div class="mx-auto max-w-screen-xl px-4 lg:px-12">

            <div 
                x-data="{
                    openAddModal: false,
                    openDeleteModal: false,
                    deleteUrl: '',

                    openEditModal: false,
                    editUrl: '',
                    editData: {
                        name: '',
                        subject_id: '',
                        phone: '',
                        email: '',
                        address: '',
                    }
                }"
                class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden"
            >

                <x-admin.toptable button-label="Add Teacher" on-click="openAddModal = true" />

                <!-- ADD MODAL -->
                <div x-show="openAddModal" x-transition x-cloak
                    class="fixed inset-0 flex items-center justify-center bg-black/50 z-50">
                    <div @click.outside="openAddModal = false"
                        class="bg-white dark:bg-gray-800 rounded-xl shadow-lg w-full max-w-2xl p-6 relative">
                        <button @click="openAddModal = false"
                            class="absolute top-2 right-3 text-gray-400 hover:text-gray-600">
                            ✕
                        </button>

                        @include('admin.teacher.create', ['subjects' => $subjects])
                    </div>
                </div>


                <!-- TEACHER TABLE -->
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">

                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th class="px-4 py-3">No</th>
                                <th class="px-4 py-3">Name</th>
                                <th class="px-4 py-3">Subject</th>
                                <th class="px-4 py-3">Phone</th>
                                <th class="px-4 py-3">Email</th>
                                <th class="px-4 py-3">Address</th>
                                <th class="px-4 py-3">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($teachers as $teacher)
                                @php
                                    $dropdownId = "teacher-dropdown-$teacher->id";
                                    $buttonId = "$dropdownId-button";
                                @endphp

                                <tr class="border-b dark:border-gray-700">
                                    <td class="px-4 py-3">{{ $loop->iteration }}</td>
                                    <td class="px-4 py-3">{{ $teacher->name }}</td>
                                    <td class="px-4 py-3">{{ $teacher->subject->name }}</td>
                                    <td class="px-4 py-3">{{ $teacher->phone }}</td>
                                    <td class="px-4 py-3">{{ $teacher->email }}</td>
                                    <td class="px-4 py-3">{{ $teacher->address }}</td>

                                    <td class="px-4 py-3 flex items-center justify-end relative">

                                        <!-- 3 dots -->
                                        <button id="{{ $buttonId }}" data-dropdown-toggle="{{ $dropdownId }}"
                                            class="inline-flex items-center p-0.5 text-sm text-gray-500
                                                   hover:text-gray-800 rounded-lg dark:text-gray-400 dark:hover:text-gray-100"
                                            type="button">
                                            <svg class="w-5 h-5" fill="currentColor">
                                                <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM18 10a2 2 0 100-4 2 2 0 000 4z"/>
                                            </svg>
                                        </button>

                                        <!-- DROPDOWN -->
                                        <div id="{{ $dropdownId }}"
                                            class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow 
                                                   dark:bg-gray-700 dark:divide-gray-600">

                                            <ul class="py-1 text-sm text-gray-700 dark:text-gray-200">
                                                <li>
                                                    <!-- EDIT BUTTON -->
                                                    <button
                                                        @click="
                                                            openEditModal = true;
                                                            editUrl = '{{ route('teacher.update', $teacher->id) }}';
                                                            editData = {
                                                                name: '{{ addslashes($teacher->name) }}',
                                                                subject_id: '{{ $teacher->subject_id }}',
                                                                phone: '{{ addslashes($teacher->phone) }}',
                                                                email: '{{ addslashes($teacher->email) }}',
                                                                address: `{{ addslashes($teacher->address) }}`,
                                                            };
                                                        "
                                                        class="block py-2 px-4 hover:bg-gray-100 
                                                               dark:hover:bg-gray-600 dark:hover:text-white">
                                                        Edit
                                                    </button>
                                                </li>
                                            </ul>

                                            <div class="py-1">
                                                <button
                                                    @click="
                                                        openDeleteModal = true;
                                                        deleteUrl = '{{ route('teacher.destroy', $teacher->id) }}';
                                                    "
                                                    class="block w-full text-left py-2 px-4 text-sm text-red-600
                                                           hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                    Delete
                                                </button>
                                            </div>

                                        </div>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>

                <!-- PAGINATION -->
                <div class="p-4">
                    {{ $teachers->links() }}
                </div>

                <!-- DELETE MODAL -->
                @include('admin.teacher.delete')

                <!-- EDIT MODAL (NOW A REAL MODAL LIKE STUDENT) -->
                <div x-show="openEditModal" x-transition x-cloak
                    class="fixed inset-0 flex items-center justify-center bg-black/50 z-50">

                    <div @click.outside="openEditModal = false"
                        class="bg-white dark:bg-gray-800 rounded-xl shadow-lg w-full max-w-2xl p-6 relative">

                        <button @click="openEditModal = false"
                            class="absolute top-2 right-3 text-gray-400 hover:text-gray-600">
                            ✕
                        </button>

                        @include('admin.teacher.edit', ['subjects' => $subjects])
                    </div>

                </div>

            </div>
        </div>
    </section>

</x-admin.dash-layout>
