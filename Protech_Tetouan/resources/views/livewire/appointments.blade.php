<div class='p-6'>


    {{-- data table --}}
    <div class="flex flex-col">
                    <table class='min-w-full divide-y divide-gray-200'>
                        <thead>
                            <tr>
                                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50">Id</th>
                                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50">Employee Id</th>
                                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50">Service Id</th>
                                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50">Client Name</th>
                                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50">Client Email</th>
                                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50">Date</th>
                                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50">Start Time</th>
                                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50">End Time</th>
                            </tr>
                        </thead>
                        <tbody class="min-w-full divide-y divide-gray-200">
                            @if ($data->count())
                                @foreach ($data as $item )
                                <tr>
                                    <td class="px-6 py-3 text-sm whitespace-no-wrap">
                                        {{ $item->id }} 
                                    </td>
                                    <td class="px-6 py-3 text-sm whitespace-no-wrap">
                                        {{ $item->employee_id }}</td>
                                        <td class="px-6 py-3 text-sm whitespace-no-wrap">
                                            {{ $item->service_id }}</td>
                                    <td class="px-6 py-3 text-sm whitespace-no-wrap">{{  $item->client_name  }}</td>
                                    <td class="px-6 py-3 text-sm whitespace-no-wrap">{{  $item->client_email  }}</td>
                                    <td class="px-6 py-3 text-sm whitespace-no-wrap">{{  $item->date  }}</td>
                                    <td class="px-6 py-3 text-sm whitespace-no-wrap">{{  $item->start_time->format('H:i:s')  }}</td>
                                    <td class="px-6 py-3 text-sm whitespace-no-wrap">{{  $item->end_time->format('H:i:s')  }}</td>
                                </tr> 
                                @endforeach
                            @else
                                <tr>
                                    <td class="px-6 py-3 text-sm whitespace-no-wrap" colspan="4">No results found</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
    </div>
   
        {{ $data->links() }}
</div>