@php
$awards = collect($awards)->groupBy('year');
@endphp
<table class="award-list w-100">
    @foreach($awards as $year => $entries)
    <tr>
        <td class="award-list-left pingFang" width="150">
            {{ $year }}
        </td>
        <td class="award-list-right pingFang-thin">
            {!! implode('<br/>', array_pluck($entries, 'title')) !!}
        </td>
    </tr>
    @endforeach
</table>
