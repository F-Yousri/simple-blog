<div>
    <ul class="-mb-8">
        @foreach ($posts as $post)
        <li class="bg-white p-4">
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
    {{ $posts->links() }}
</div>
