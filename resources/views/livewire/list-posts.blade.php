<div>
    @if(auth()->user())    
        <div class="bg-white p-4 mb-4 flex space-x-4 items-center rounded-lg shadow-lg flex-col md:flex-row">
            <div class="flex w-full space-x-2 md:spac-x-4">
                <img src="{{auth()->user()->profile_photo_url}}" alt="{{auth()->user()->name}}" class=" self-start h-10 w-10 rounded-full bg-gray-400 flex items-center justify-center ring-8 ring-white">
                <textarea type="text" class="w-full border-transparent bg-gray-100 rounded-3xl" placeholder="what's in your mind?"></textarea>
            </div>
            <button class="w-full md:w-auto text-centerinline-flex px-5 py-2 border border-transparent text-base font-medium rounded-full shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Submit</button>
        </div>
    @endif
    <ul>
        @foreach ($posts as $post)
        <li class="bg-white p-4 mb-4 rounded-lg shadow-lg">
            <div class="relative pb-8">
                <div class="relative flex items-start space-x-3">
                    <div class="relative">
                        <img class="h-10 w-10 rounded-full bg-gray-400 flex items-center justify-center ring-8 ring-white" src="{{$post->user->profile_photo_url}}" alt="photo of {{$post->user->name}}">
                    </div>
                    <div class="min-w-0 flex-1">
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
    <div class="bg-white p-4 rounded-lg shadow-lg">
        {{ $posts->links() }}
    </div>
</div>
