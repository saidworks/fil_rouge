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
                                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50">Role</th>
                                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50">Route Name</th>
                                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="min-w-full divide-y divide-gray-200">
                            @if ($data->count())
                                @foreach ($data as $item )
                                <tr>
                                    <td class="px-6 py-3 text-sm whitespace-no-wrap">
                                        {{ $item->role }} 
                                    </td>
                                    
                                    <td class="px-6 py-3 text-sm whitespace-no-wrap">
                                        <a class="text-indigo-600 hover:text-indigo-900"
                                            href="{{ URL::to($item->route_name) }}" 
                                            target="_blank"> {{ $item->route_name }}
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
    <div class="mt-5">
         {{ $data->links() }}
    </div>

       
    {{-- Modal Form for update and create --}}
    <div class="mt-4">
        <x-jet-dialog-modal wire:model="modalFormVisible">
            <x-slot name="title">
                {{ __('Save User Permission') }} {{ $modelId }}
            </x-slot>
    </div>
            <x-slot name="content">
                <div class="mt-4">
                    <x-jet-label for="role" value="{{ __('Role') }}" />
                    <select wire:model="role" class="block w-full px-3 py-3 pr-8 leading-tight text-gray-700 bg-gray-100 border border-gray-200 appearance-none round focus:outline-none focus:bg-white focus:border-gray-500">
                        <option value="">Select a role</option>
                        {{-- use method from the model to display options --}}
                        @foreach (App\Models\User::userRoleList() as $key => $value )
                            <option value="{{ $value }}">{{ $value }}</option>
                        @endforeach
                    </select>
                    @error('role') <span class="error"> {{ $message }}</span> @enderror
                </div> 

                <div class="mt-4">
                    <x-jet-label for="routeName" value="{{ __('Route Name') }}" />
                    <select wire:model="routeName" class="block w-full px-3 py-3 pr-8 leading-tight text-gray-700 bg-gray-100 border border-gray-200 appearance-none round focus:outline-none focus:bg-white focus:border-gray-500">
                        <option value="">Select a route</option>
                        {{-- use method from the model to display options --}}
                        @foreach (App\Models\UserPermission::routeNameList() as $item )
                            <option value="{{ $item }}">{{ $item }}</option>
                        @endforeach
                    </select>
                    @error('routeName') <span class="error"> {{ $message }}</span> @enderror
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
            {{ __('Revoke Permission') }}
        </x-slot>

        <x-slot name="content">
            {{ __('Are you sure you want to revoke your permission to access for this user? Once your permission is deleted, the user can not access this resource anymore.') }}

        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('modalFormDeleteVisible')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-danger-button class="ml-2" wire:click="delete" wire:loading.attr="disabled">
                {{ __('Revoke permission') }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>