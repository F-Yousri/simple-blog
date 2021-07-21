<div>
    <form wire:submit.prevent="store">

        <!-- Name -->
        <div class="col-span-6 sm:col-span-4">
        <x-jet-label for="name" value="{{ __('Name') }}" />
        <x-jet-input id="name" type="text" class="block w-full mt-1" wire:model="name" autocomplete="name" />
        <x-jet-input-error for="name" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
        <x-jet-label for="email" value="{{ __('Email') }}" />
        <x-jet-input id="email" type="email" class="block w-full mt-1" wire:model="email" />
        <x-jet-input-error for="email" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="password" value="{{ __('Password') }}" />
            <x-jet-input id="password" type="password" class="block w-full mt-1" wire:model="password" />
            <x-jet-input-error for="password" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="confirm-password" value="{{ __('Confirm Password') }}" />
            <x-jet-input id="confirm-password" type="password" class="block w-full mt-1" wire:model="confirmPassword" />
            <x-jet-input-error for="confirmPassword" class="mt-2" />
        </div>

        <button type="submit">Save</button>
    </form>
</div>
