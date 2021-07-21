<div>
    @if(auth()->user())
        <div class="flex flex-col items-center p-4 mb-4 space-x-4 bg-white rounded-lg shadow-lg md:flex-row">
            <div class="flex w-full space-x-2 md:spac-x-4">
                <img src="{{auth()->user()->profile_photo_url}}" alt="{{auth()->user()->name}}" class="flex items-center self-start justify-center w-10 h-10 bg-gray-400 rounded-full ring-8 ring-white">
                <textarea wire:model='newPost' type="text" class="w-full bg-gray-100 border-transparent rounded-3xl" placeholder="what's in your mind?"></textarea>
            </div>
            <button wire:click='createPost' class="w-full px-5 py-2 text-base font-medium text-white bg-indigo-600 border border-transparent rounded-full shadow-sm md:w-auto text-centerinline-flex hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Submit</button>
        </div>
    @endif
    <ul>
        @foreach ($posts as $post)
        <li class="p-4 mb-4 bg-white rounded-lg shadow-lg">
            <div class="relative pb-8">
                <div class="relative flex items-start space-x-3">
                    <div class="relative">
                        <img class="flex items-center justify-center w-10 h-10 bg-gray-400 rounded-full ring-8 ring-white" src="{{$post->user->profile_photo_url}}" alt="photo of {{$post->user->name}}">
                    </div>
                    <div class="flex-1 min-w-0">
                        <div>
                            <div class="text-sm">
                                <a href="#" class="font-medium text-gray-900">{{$post->user->name}}</a>
                            </div>
                            <p class="mt-0.5 text-sm text-gray-500">
                                Posted {{$post->created_at->diffForHumans() }}
                            </p>
                        </div>
                        <div class="mt-2 text-sm text-gray-700">
                            <p>
                                {{$post->body}}
                            </p>
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
