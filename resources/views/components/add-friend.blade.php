
<div class="flex flex-row items-center w-[100%]">
<form action="{{route('request')}}" class="flex justify-between gap-15 w-[80%]" method="POST">
    @csrf
<input type="search" name="username" placeholder="add friend by username" class="ml-5 w-[60%] p-2 rounded-lg mt-2 mb-1">
{{-- <input type="submit" value="add friend"  class="ml-15 w-[10%] p-2 bg-green-500 mt-2 mb-1 rounded-lg cursor-pointer"> --}}
</form>
@if (session()->has('message'))
    <p class="text-blue-500">
        {{ session('message') }}
    </p>
@endif
</div>

