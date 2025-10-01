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
            <th>Job</th>
            <th>Phone Number</th>
            <th>Email</th>
            <th>Address</th>
            <th>birthdate</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($guardian as $guardian)
        <tr>
            <th>{{$loop->iteration}}</th>
            <th>{{$guardian["name"]}}</th>
            <th>{{$guardian["job"]}}</th>
            <th>{{$guardian["phone"]}}</th>
            <th>{{$guardian["email"]}}</th>
            <th>{{$guardian["address"]}}</th>
            <th>{{$guardian["birthdate"]}}</th>
        </tr>
        @endforeach
    </tbody>
</table> --}}
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400" "table-auto">
        <thead class="text-xs text-gray-700 uppercase dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">No</th>
                <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">Name </th>
                <th scope="col" class="px-6 py-3">Job</th>
                <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">Phone Number</th>
                <th scope="col" class="px-6 py-3">Email</th>
                <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">Address</th>
                <th scope="col" class="px-6 py-3">No</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($guardian as $guardian)
            <tr class="border-b border-gray-200 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                    {{$loop->iteration}}
                </th>
                <td class="px-6 py-4">
                    {{$guardian["name"]}}
                </td>
                <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
                    {{$guardian["job"]}}
                </td>
                <td class="px-6 py-4">
                   {{$guardian["phone"]}}
                </td>
                <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
                    {{$guardian["email"]}}
                </td>
                <td class="px-6 py-4">
                   {{$guardian["address"]}}
                </td>
                <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
                    {{$guardian["birthdate"]}}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
</x-layout>

