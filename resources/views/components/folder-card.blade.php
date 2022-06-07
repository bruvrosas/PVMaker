{{--
Auteur: Bruno Manuel Vieira Rosas
Date: 02.06.2022
Description: Folder card component
--}}

<div class="focus:outline-none mb-7 bg-white p-6 shadow rounded">
    <div class="flex items-center border-gray-200 pb-6">
        <span class="iconify" data-icon="ant-design:folder-filled" style="color: #c63b3b;" data-width="50" data-height="50"></span>
        <div class="flex items-start justify-between w-full">
            <div class="pl-3 w-full">
                <p tabindex="0" class="focus:outline-none text-xl font-medium leading-5 text-gray-800">{{$folder->name}}</p>
                <p tabindex="0" class="focus:outline-none text-sm leading-normal pt-2 text-gray-500">{{$folder->reports->count()}} PVs</p>
            </div>
        </div>
        <div class="flex items-center space-x-2">
            <a href="{{route('folders.edit', $folder->id)}}"><span class="iconify" data-icon="ci:edit" style="color: black;" data-width="18" data-height="18"></span></a>
            <form class="flex items-center" method="POST" action="{{route('folders.destroy', $folder->id)}}">
                @csrf
                @method('DELETE')
                <button type="submit">
                    <span class="iconify" data-icon="fa-solid:trash" data-width="18" data-height="18"></span>
                </button>
            </form>
        </div>
    </div>
    <div class="">
        <table class="w-full border break-words">
            <thead class="bg-PVblue dark:bg-gray-700">
            <tr>
                <th scope="col" class="py-3 px-6 text-base font-bold tracking-wider text-center text-black uppercase dark:text-gray-400">
                    Titre
                </th>
                <th scope="col" class="py-3 px-6 text-base font-bold tracking-wider text-center text-black uppercase dark:text-gray-400">
                    Date
                </th>
                <th scope="col" class="py-3 px-6 text-base font-bold tracking-wider text-center text-black uppercase dark:text-gray-400">
                    Tags
                </th>
                <th scope="col" class="p-4">
                    <span class="sr-only">Options</span>
                </th>
            </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                @foreach($folder->reports as $report)
                    <x-report-table-row :report="$report" />
                @endforeach
            </tbody>
        </table>
    </div>
</div>
