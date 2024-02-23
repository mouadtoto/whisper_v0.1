<div class="flex flex-col space-y-1 mt-4 -mx-2 h-48 overflow-y-auto">
    @foreach($users as $user)
        <a href="{{ route('conversations.show',$user->id) }}"
           class="flex flex-row items-center hover:bg-gray-100 rounded-xl p-2">
            <div class="flex items-center justify-center h-8 w-8 bg-indigo-200 rounded-full">
                H
            </div>
            <div class="ml-2 text-sm font-semibold">{{$user->name}}</div>
        </a>
    @endforeach

</div>
