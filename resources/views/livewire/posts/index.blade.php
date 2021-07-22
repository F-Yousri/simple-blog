<div>
    @if(auth()->user())
        <div class="flex flex-col w-full p-4 mb-4 bg-white rounded-lg shadow-lg">
            <div class="flex flex-col items-center space-x-4 md:flex-row">
                <div class="flex w-full space-x-2 md:spac-x-4">
                    <img src="{{auth()->user()->profile_photo_url}}" alt="{{auth()->user()->name}}" class="flex items-center self-start justify-center w-10 h-10 bg-gray-400 rounded-full ring-8 ring-white">
                    <textarea wire:model='newPost' type="text" class="w-full bg-gray-100 border-transparent rounded-3xl" placeholder="what's in your mind?"></textarea>
                </div>
                <button wire:click='createPost' class="w-full px-5 py-2 text-base font-medium text-white bg-indigo-600 border border-transparent rounded-full shadow-sm md:w-auto text-centerinline-flex hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">{{__('Submit')}}</button>
            </div>
            <x-jet-input-error for="newPost" class="mt-2" />
        </div>
    @endif
    <ul x-data="{edittingPostId: @entangle('edittingPostId')}">
        @foreach ($posts as $post)
        <li class="p-4 mb-4 bg-white rounded-lg shadow-lg">
            <div class="relative pb-8">
                <div class="relative flex items-start space-x-3">
                    <div class="relative">
                        <img class="flex items-center justify-center w-10 h-10 bg-gray-400 rounded-full ring-8 ring-white" src="{{$post->user->profile_photo_url}}" alt="photo of {{$post->user->name}}">
                    </div>
                    <div class="flex-1 min-w-0">
                        <div>
                            <div class="flex justify-between">
                                <div class="text-sm">
                                    {{$post->user->name}}
                                </div>
                                <div class="flex space-x-4">
                                    <button x-show='!edittingPostId' wire:click='editPost({{$post->id}})'  class="text-indigo-600 hover:text-indigo-900 hover:underline">{{__('Edit')}}</button>
                                    <button x-show='!edittingPostId' wire:click='delete({{$post->id}})' class="text-red-600 hover:text-red-900 hover:underline">{{__('Delete')}}</button>
                                </div>
                            </div>
                            <p class="mt-0.5 text-sm text-gray-500">
                                {{__('Posted')}} {{$post->created_at->diffForHumans() }}
                            </p>
                        </div>
                        <div class="mt-2 text-sm text-gray-700">
                            <p x-show='edittingPostId != {{$post->id}}'>
                                {{$post->body}}
                            </p>
                            <textarea x-cloak x-show='edittingPostId == {{$post->id}}' wire:model='edittingPost' type="text" class="w-full bg-gray-100 border-transparent rounded-3xl" placeholder="what's in your mind?"></textarea>
                            <div class="flex justify-end mt-2 space-x-4">
                                <button x-cloak x-show='edittingPostId == {{$post->id}}' wire:click='updatePost' class="w-full px-5 py-2 text-base font-medium text-white bg-indigo-600 border border-transparent rounded-full shadow-sm md:w-auto text-centerinline-flex hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">{{__('Update')}}</button>
                                <button x-cloak x-show='edittingPostId == {{$post->id}}' wire:click='cancelEdit' class="w-full px-5 py-2 text-base font-medium text-white bg-gray-600 border-transparent rounded-full shadow-sm bordea md:w-auto text-centerinline-flex hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">{{__('Cancel')}}</button>
                            </div>
                            <x-jet-input-error x-cloak x-show='edittingPostId == {{$post->id}}' for="edittingPost" class="mt-2" />
                        </div>
                    </div>
                </div>
            </div>
        </li>
        @endforeach
    </ul>
    <div class="p-4 bg-white rounded-lg shadow-lg">
        {{ $posts->links() }}
    </div>
</div>
