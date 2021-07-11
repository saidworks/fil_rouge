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
                                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50">Title</th>
                                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50">Link</th>
                                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50">Content</th>
                                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="min-w-full divide-y divide-gray-200">
                            @if ($data->count())
                                @foreach ($data as $item )
                                <tr>
                                    <td class="px-6 py-3 text-sm whitespace-no-wrap">
                                        {{ $item->title }} 
                                    {!! $item->is_default_home ? '<span class="text-xs font-bold text-green-400">[Default Home Page]</span>' : ''!!}
                                    {!! $item->is_default_not_found ? '<span class="text-xs font-bold text-red-400">[Default Not Found Page]</span>' : ''!!}
                                    </td>
                                    <td class="px-6 py-3 text-sm whitespace-no-wrap">
                                        <a class="text-indigo-600 hover:text-indigo-900"
                                            href="{{ URL::to('/'.$item->slug) }}" 
                                            target="_blank"> {{ $item->slug }}</a></td>
                                    <td class="px-6 py-3 text-sm whitespace-no-wrap">{!! $item->content !!}</td>
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
                    <x-jet-label for="title" value="{{ __('Title') }}" />
                    <x-jet-input id="title" class="block w-full mt-1" type="text" name="title" wire:model.debounce.800ms='title' />
                    @error('title') <span class="error"> {{ $message }}</span> @enderror
                </div>  

                <div class="mt-4">
                    <x-jet-label for="slug" value="{{ __('Slug') }}" /> 
                    <span class="items-center px-3 mt-1 text-sm text-gray-500 border border-r-0 border-gray-300 rounded-1-md bg-gray-50">
                        https://localhost:8000/
                    </span>
                    {{-- debounce avoid to many requests at the same time --}}
                    <x-jet-input id="slug" class="block w-full mt-1 transition duration-150 ease-in-out rounded rounded-r-md sm:text-sm sm:leading-5" wire:model.debounce.800ms='slug' type="text" name="slug" placeholder="url-slug" />
                    @error('slug') <span class="error"> {{ $message }}</span> @enderror
                </div>
                <div class="mt-4">
                    <label for="">
                        <input class="form-checkbox" type="checkbox" value="{{ $isSetToDefaultHomePage }}" wire:model="isSetToDefaultHomePage">
                        <span class="ml-2 text-sm text-gray-600">Set as the default Home Page</span>
                    </label>
                </div>  
                <div class="mt-4">
                    <label for="">
                        <input class="form-checkbox" type="checkbox" value="{{ $isSetToDefaultNotFoundPage }}" wire:model="isSetToDefaultNotFoundPage">
                        <span class="ml-2 text-sm text-red-600">Set as the default 404 Page</span>
                    </label>
                </div> 

                <div class="mt-4">
                    <x-jet-label for="content" value="{{ __('Content') }}" />
                    <div class="rounded-md shadow-sm">
                        <div class="mt-1 bg-white">
                            <div class="body-content" wire:ignore>
                                <trix-editor 
                                class='trix-editor'
                                x-ref="trix"
                                wire:model.debounce.100000ms="content"
                                wire:key="trix-content-unique-key">

                                </trix-editor>
                            </div>
                        </div>
                    </div>
                    @error('content') <span class="error"> {{ $message }}</span> @enderror
                </div>   
                <div class="mt-1">
                    <input type="file" wire:model.debounce.100000ms="image" name="image" id="">
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