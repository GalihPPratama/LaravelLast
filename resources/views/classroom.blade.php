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
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400" "table-auto">
        <thead class="text-xs text-gray-700 uppercase dark:text-gray-400">
            <tr>
                Classrooms
                <th class="px-6 py-3 bg-gray-50 dark:bg-gray-800">ID</th>
                <th scope="col" class="px-5 py-3">Class </th>
                <th scope="col" class="px-5 py-3">Student List</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($classroom as $classroom)
            <tr class="border-b border-gray-200 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                    {{$loop->iteration}}
                </th>
                <td class="px-6 py-4">
                    {{$classroom["name"]}}
                </td>
                <td class="px-6 py-4">
                    @foreach ($classroom->students as $student)
                    {{ $student->name }}   <br>                     
                    @endforeach
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
</x-layout>

