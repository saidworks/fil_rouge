<div class='p-6'>
    <div class="flex items-center justify-end px-4 py-3 text-right sm:px-6">
        <x-jet-button wire:click="createShowModal">
            {{ __('Create') }}
        </x-jet-button>
    </div>

    {{-- data table --}}
    <div class="flex flex-col">
                    <table class='min-w-full divide-y divide-gray-200'>
                        <thead>
                            <tr>
                                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50">Name</th>
                                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50">Description</th>
                                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50">Duration</th>
                                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50">Price</th>
                                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50">Picture</th>
                                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="min-w-full divide-y divide-gray-200">
                            @if ($data->count())
                                @foreach ($data as $item )
                                <tr>
                                    <td class="px-6 py-3 text-sm whitespace-no-wrap">
                                        {{ $item->name }} 
                                    </td>
                                    <td class="px-6 py-3 text-sm whitespace-no-wrap">
                                        {!!$item->description !!}</td>
                                    <td class="px-6 py-3 text-sm whitespace-no-wrap">{{$item->duration}}</td>
                                    <td class="px-6 py-3 text-sm whitespace-no-wrap">{{$item->price}}</td>
                                    <td class="w-16 px-6 py-3 text-sm whitespace-no-wrap md:w-32 lg:w-48"><img src="{{ asset('storage/img/'.$item->picture) }}"></td>
                                    <td class="px-6 py-3 text-sm whitespace-no-wrap">
                                        <x-jet-button wire:click="updateShowModal({{ $item->id }})">
                                            {{ __('Update') }}
                                        </x-jet-button>
                                        <x-jet-danger-button wire:click="deleteShowModal({{ $item->id }})">
                                            {{ __('Delete') }}
                                        </x-jet-button>
                                    </td>
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
    {{-- Modal Form for update and create --}}
    <div class="mt-4">
        <x-jet-dialog-modal wire:model="modalFormVisible">
            <x-slot name="title">
                {{ __('Save Page') }} {{ $modelId }}
            </x-slot>
    </div>
            <x-slot name="content">
                <div class="mt-4">
                    <x-jet-label for="name" value="{{ __('Name') }}" />
                    <x-jet-input id="name" class="block w-full mt-1" type="text" name="name" wire:model.debounce.800ms='name' />
                    @error('name') <span class="error"> {{ $message }}</span> @enderror
                </div>  

                <div class="mt-4">
                    <x-jet-label for="price" value="{{ __('Price') }}" /> 
                    {{-- debounce avoid to many requests at the same time --}}
                    <x-jet-input id="price" class="block w-full mt-1 transition duration-150 ease-in-out rounded rounded-r-md sm:text-sm sm:leading-5" wire:model.debounce.800ms='price' type="number" name="slug" placeholder="price" />
                    @error('price') <span class="error"> {{ $message }}</span> @enderror
                </div>
                <div class="mt-4">
                    <x-jet-label for="duration" value="{{ __('Duration') }}" /> 
                    {{-- debounce avoid to many requests at the same time --}}
                    <x-jet-input id="duration" class="block w-full mt-1 transition duration-150 ease-in-out rounded rounded-r-md sm:text-sm sm:leading-5" wire:model.debounce.1000ms='duration' type="number" name="duration" placeholder="duration" />
                    @error('duration') <span class="error"> {{ $message }}</span> @enderror
                </div>

                <div class="mt-4">
                    <x-jet-label for="description" value="{{ __('Description') }}" />
                    <div class="rounded-md shadow-sm">
                        <div class="mt-1 bg-white">
                            <div class="body-content" wire:ignore>
                                <trix-editor 
                                class='trix-editor'
                                x-ref="trix"
                                wire:model.debounce.100000ms="description"
                                wire:key="trix-content-unique-key">

                                </trix-editor>
                            </div>
                        </div>
                    </div>
                    @error('content') <span class="error"> {{ $message }}</span> @enderror
                </div>   
                
                <div class="mt-1">
                    <input type="file" wire:model.debounce.100000ms="picture" name="picture" id="picture">
                </div>
            </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('modalFormVisible')" wire:loading.attr="disabled">
                    {{ __('Nevermind') }}
                </x-jet-secondary-button>
                @if($modelId)
                    <x-jet-button class="ml-2" wire:click="update" wire:loading.attr="disabled">
                        {{ __('Save') }}
                    </x-jet-button>
                @else
                    <x-jet-button class="ml-2" wire:click="create" wire:loading.attr="disabled">
                        {{ __('Create') }}
                    </x-jet-button>
                @endif
            </x-slot>
        </x-jet-dialog-modal>
    
    {{-- end model for create and update --}}

    <!-- Delete User Confirmation Modal -->
    <x-jet-dialog-modal wire:model="modalFormDeleteVisible">
        <x-slot name="title">
            {{ __('Delete Page') }}
        </x-slot>

        <x-slot name="content">
            {{ __('Are you sure you want to delete your page? Once your page is deleted, all of its resources and data will be permanently deleted.') }}

        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('modalFormDeleteVisible')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-danger-button class="ml-2" wire:click="delete" wire:loading.attr="disabled">
                {{ __('delete') }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>