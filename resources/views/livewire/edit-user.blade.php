<div>
    <form class="flex flex-col space-y-5" wire:submit.prevent="update">

        <!-- Name -->
        <div class="col-span-6 sm:col-span-4">
        <x-jet-label for="name" value="{{ __('Name') }}" />
        <x-jet-input id="name" type="text" class="block w-full mt-1" wire:model="user.name" autocomplete="name" />
        <x-jet-input-error for="user.name" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
        <x-jet-label for="email" value="{{ __('Email') }}" />
        <x-jet-input id="email" type="email" class="block w-full mt-1" wire:model="user.email" />
        <x-jet-input-error for="user.email" class="mt-2" />
        </div>
        <div class="flex justify-end w-full">
            <button type="submit" class="inline-flex items-center p-3 px-8 py-3 text-white bg-indigo-600 border border-transparent rounded-full shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Update
                <!-- Heroicon name: outline/plus -->
                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
            </button>
        </div>
    </form>
</div>
