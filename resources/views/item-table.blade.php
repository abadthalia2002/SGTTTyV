@php
    $statusOptions = \App\Support\InternmentRecordItem::statusOptions();
@endphp

<table class="w-full text-sm border border-gray-300">
    <thead>
        <tr class="bg-gray-100">
            <th class="border p-2 w-1/2">Ítem</th>

            @foreach ($statusOptions as $key => $label)
                <th class="border p-2 text-center w-16">{{ $label }}</th>
            @endforeach
        </tr>
    </thead>

    <tbody>
        @foreach ($items as $item)
            <tr>
                <td class="border p-2">{{ $item }}</td>

                @foreach ($statusOptions as $key => $label)
                    <td class="border p-2 text-center">
                        <input 
                            type="radio" 
                            name="items[{{ $category }}][{{ $item }}]" 
                            value="{{ $key }}"
                            class="cursor-pointer"
                            @checked(data_get($state, "items.$category.$item") === $key)
                        >
                    </td>
                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>
