<div class='p-6'>
    <div class="flex items-center justify-end px-4 py-3 text-right sm:px-6">
        <x-jet-button wire:click="createShowModal">
            {{ __('Create') }}
        </x-jet-button>
    </div>

    {{-- Modal Form --}}
    <div class="mt-4">
        <x-jet-dialog-modal wire:model="modalFormVisible">
            <x-slot name="title">
                {{ __('Save Page') }}
            </x-slot>
        </div>
            <x-slot name="content">
                <div class="mt-4">
                    <x-jet-label for="title" value="{{ __('Title') }}" />
                    <x-jet-input id="title" class="block mt-1 w-full" type="text" name="title" wire:model.debounce.800ms='title' />
                </div>    
                <div class="mt-4">
                    <x-jet-label for="title" value="{{ __('Slug') }}" /> 
                    <span class="mt-1 items-center px-3 rounded-1-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">
                        https://localhost:8000/
                    </span>
                    {{-- debounce avoid to many requests at the same time --}}
                    <x-jet-input id="title" class="block mt-1 w-full rounded rounded-r-md transition duration-150 ease-in-out sm:text-sm sm:leading-5" wire:model.debounce.800ms='slug' type="text" name="slug" placeholder="url-slug" />
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
                </div>   
            </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('modalFormVisible')" wire:loading.attr="disabled">
                    {{ __('Nevermind') }}
                </x-jet-secondary-button>

                <x-jet-button class="ml-2" wire:click="create" wire:loading.attr="disabled">
                    {{ __('Save') }}
                </x-jet-button>
            </x-slot>
        </x-jet-dialog-modal>

</div>