{{--
Auteur: Bruno Manuel Vieira Rosas
Date: 02.06.2022
Description: PV row component
--}}


<tr>
    <td class="max-w-xxs sm:max-w-xxxs text-center">{{$report->title}}</td>
    <td class="max-w-fit text-center">{{$report->date->format('d-m-Y')}}</td>
    <td class="text-center">
        @foreach($report->tags as $tag)
            {{ $loop->last ? $tag->name : $tag->name . ", " }}
        @endforeach
    </td>
    <td class="hidden md:flex items-center space-x-2 py-4 px-6 text-right max-w-fit whitespace-nowrap">
        <a href="{{route('reports.download',$report->id)}}"><span class="iconify" data-icon="ci:download" data-width="20" data-height="20"></span></a>
        <a href="{{route('reports.show',$report->id)}}"><span class="iconify" data-icon="ant-design:search-outlined" style="color: black;" data-width="20" data-height="20"></span></a>
        <a href="{{route('reports.import',$report->id)}}"><span class="iconify" data-icon="bxs:file-import" data-width="20" data-height="20"></span></a>
        <form class="flex items-center" data-id="" method="POST" action="{{route('reports.destroy',$report->id)}}">
            @csrf
            @method('DELETE')
            <button type="submit">
                <span class="iconify" data-icon="fa-solid:trash" data-width="18" data-height="18"></span>
            </button>
        </form>
    </td>
    <td class="flex md:hidden">
        <x-report-dropdown :report="$report"/>
    </td>
</tr>
