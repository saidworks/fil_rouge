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
                                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50">Type</th>
                                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50">Sequence</th>
                                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50">Label</th>
                                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50">Url</th>
                                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="min-w-full divide-y divide-gray-200">
                            @if ($data->count())
                                @foreach ($data as $item )
                                <tr>
                                    <td class="px-6 py-3 text-sm whitespace-no-wrap">
                                        {{ $item->type }} 
                                
                                    </td>
                                    <td class="px-6 py-3 text-sm whitespace-no-wrap">
                                        <a class="text-indigo-600 hover:text-indigo-900">
                                             {{ $item->sequence }}</a></td>
                                    <td class="px-6 py-3 text-sm whitespace-no-wrap">{!! $item->label !!}</td>
                                    <td class="px-6 py-3 text-sm whitespace-no-wrap">
                                        {{-- URL::to generate URL based on domain I am using--}}
                                        <a class="text-indigo-600 hover:text-indigo-900"
                                            href="{{ URL::to($item->slug) }}" 
                                            target="_blank"> {{ $item->slug }}
                                        </a></td>
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
                {{ __('Save Navigation Item') }} {{ $modelId }}
            </x-slot>
    </div>
            <x-slot name="content">
                <div class="mt-4">
                    <x-jet-label for="label" value="{{ __('Label') }}" />
                    <x-jet-input id="label" class="block w-full mt-1" type="text" name="label" wire:model.debounce.800ms='label' />
                    @error('label') <span class="error"> {{ $message }}</span> @enderror
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
                    <x-jet-label for="sequence" value="{{ __('Sequence') }}" />
                    <x-jet-input id="sequence" class="block w-full mt-1" type="text" name="sequence" wire:model.debounce.800ms='sequence' />
                    @error('label') <span class="error"> {{ $message }}</span> @enderror
                </div>  

                <div class="mt-4">
                    <x-jet-label for="type" value="{{ __('Type') }}" />
                    <select wire:model="type" class="block w-full px-3 py-3 pr-8 leading-tight text-gray-700 bg-gray-100 border border-gray-200 appearance-none round focus:outline-none focus:bg-white focus:border-gray-500">
                        <option value="SidebarNav">Sidebar Navigation</option>
                        <option value="TopNav">Top Navigation </option>
                    </select>
                    @error('type') <span class="error"> {{ $message }}</span> @enderror
                </div>  
                {{-- <div class="mt-4">
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
                </div>  --}}

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
            {{ __('Delete Navigation Item') }}
        </x-slot>

        <x-slot name="content">
            {{ __('Are you sure you want to delete your navigation menu? Once your page is deleted, all of its resources and data will be permanently deleted.') }}

        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('modalFormDeleteVisible')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-danger-button class="ml-2" wire:click="delete" wire:loading.attr="disabled">
                {{ __('Delete Navigation Item') }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>