<x-layout>
        <x-slot:judul>{{ $title }}</x-slot:judul>
<html lang="en">
    <style>
        
table, th, td {
  border:1px solid black;
}
    </style>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>
<body>
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400" "table-fixed">
        <thead class="text-xs text-gray-700 uppercase dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    No
                </th>
                <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                    Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Subject Name
                </th>
                <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                    Phone
                </th>
                <th scope="col" class="px-6 py-3">
                    Email
                </th>
                <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                    Address
                </th>

            </tr>
        </thead>
        <tbody>
            @foreach ($teacher as $teacher)
            <tr class="border-b border-gray-200 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                    {{$loop->iteration}}
                </th>
                <td class="px-6 py-4">
                    {{$teacher["name"]}}
                </td>
                <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
                    {{$teacher->subject->name}}
                </td>
                <td class="px-6 py-4">
                   {{$teacher["phone"]}}
                </td>
                <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
                    {{$teacher["email"]}}
                </td>
                <td class="px-6 py-4">
                   {{$teacher["address"]}}
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
</x-layout>

