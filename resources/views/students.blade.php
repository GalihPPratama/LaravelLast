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

{{-- <table style="width:100%", class-"table-auto">
    <thead>
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Address</th>
            <th>birthdate</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($students as $student)
        <tr>
            <th>{{$loop->iteration}}</th>
            <th>{{$student["name"]}}</th>
            <th>{{$student["email"]}}</th>
            <th>{{$student["addressphp"]}}</th>
            <th>{{$student["grade"]}}</th>
            <th>{{$student["birthdate"]}}</th>
        </tr>
        @endforeach
    </tbody>
</table> --}}
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
                    Email
                </th>
                <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                    Address
                </th>
                <th scope="col" class="px-6 py-3">
                    Class
                </th>
                <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                    Birthdate
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
            <tr class="border-b border-gray-200 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                    {{$loop->iteration}}
                </th>
                <td class="px-6 py-4">
                    {{$student["name"]}}
                </td>
                <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
                    {{$student["email"]}}
                </td>
                <td class="px-6 py-4">
                   {{$student["addressphp"]}}
                </td>
                <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
                    {{$student->classroom->name}}
                </td>
                <td class="px-6 py-4">
                   {{$student["birthdate"]}}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
</x-layout>

