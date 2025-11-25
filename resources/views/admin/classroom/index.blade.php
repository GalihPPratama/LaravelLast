<x-admin.dash-layout>
    <x-slot:judul>{{ $title }}</x-slot:judul>
    <section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">
        <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
            <!-- Start coding here -->
            <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                <div x-data="{ openAddModal: false }">
                    <x-admin.toptable button-label="Add Classroom" on-click="openAddModal = true" />


                    {{-- Modal --}}
                    <div x-show="openAddModal" x-cloak>

                        <!-- Overlay -->
                        <div class="fixed inset-0 bg-black/50 z-40" @click="openAddModal = false">
                        </div>

                        <!-- Modal Box -->
                        <div class="fixed inset-0 flex items-center justify-center z-50" @click.stop>
                            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg w-full max-w-2xl p-6 relative">

                                <!-- Close Button -->
                                <button @click="openAddModal = false"
                                    class="absolute top-2 right-3 text-gray-400 hover:text-gray-600">
                                    ✕
                                </button>

                                @include('admin.classroom.create')
                            </div>
                        </div>
                    </div>


                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-4 py-3">#</th>
                                <th scope="col" class="px-4 py-3">Room Name</th>
                                <th scope="col" class="px-4 py-3">Students List</th>
                                <th scope="col" class="px-4 py-3">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($classrooms as $classroom)
                                <tr class="border-b dark:border-gray-700">
                                    <td class="px-4 py-3">{{ $loop->iteration }}</td>
                                    <td class="px-4 py-3">{{ $classroom->name }}</td>
                                    <td class="px-4 py-3">
                                        @foreach ($classroom->students as $student)
                                            {{ $student->name }} <br>
                                        @endforeach
                                    </td>
                                    <td class="px-4 py-3 flex items-center justify-end">
                                        @php
                                            $dropdownId = 'classroom-dropdown-' . $classroom->id;
                                            $buttonId = $dropdownId . '-button';
                                        @endphp

                                        <button id="{{ $buttonId }}" data-dropdown-toggle="{{ $dropdownId }}"
                                            class="inline-flex items-center p-0.5 text-sm font-medium text-center text-gray-500 hover:text-gray-800 rounded-lg focus:outline-none dark:text-gray-400 dark:hover:text-gray-100"
                                            type="button">
                                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                            </svg>
                                        </button>
                                        <div id="{{ $dropdownId }}"
                                            class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                            <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                                                aria-labelledby="{{ $buttonId }}">
                                                <li>
                                                    <a href="#"
                                                        class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Show</a>
                                                </li>
                                                <li>
                                                    <a href="#"
                                                        class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>
                                                </li>
                                            </ul>
                                            <div class="py-1">
                                                <a href="#"
                                                    class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</x-admin.dash-layout>
