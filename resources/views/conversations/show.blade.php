<x-app-layout>
    <!-- component -->
    <div class="bg-gray-300">
        <div class="flex h-screen antialiased text-gray-800">
            <div class="flex flex-row h-full w-full overflow-x-hidden">
                <div class="flex flex-col py-8 pl-6 pr-2 w-64 bg-white flex-shrink-0">
                    <div class="flex flex-row items-center justify-center h-12 w-full">
                        <div class="flex items-center justify-center rounded-2xl text-indigo-700 bg-indigo-100 h-10 w-10">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path>
                            </svg>
                        </div>
                        <div class="ml-2 font-bold text-2xl">QuickChat</div>
                    </div>
                    <div class="flex flex-col items-center bg-indigo-100 border border-gray-200 mt-4 w-full py-6 px-4 rounded-lg">
                        <div class="h-20 w-20 rounded-full border overflow-hidden">
                            <img src="https://avatars3.githubusercontent.com/u/2763884?s=128" alt="Avatar" class="h-full w-full"/>
                        </div>
                        <div class="text-sm font-semibold mt-2">{{auth()->user()->name}}</div>
                        <div class="text-xs text-gray-500">{{auth()->user()->email}}</div>
                        <div class="flex flex-row items-center mt-3">
                            <div class="flex flex-col justify-center h-4 w-8 bg-indigo-500 rounded-full">
                                <div class="h-3 w-3 bg-white rounded-full self-end mr-1"></div>
                            </div>
                            <div class="leading-none ml-1 text-xs">Active</div>
                        </div>
                    </div>
                    <div class="flex flex-col mt-8">
                        <div class="flex flex-row items-center justify-between text-xs">
                            <span class="font-bold">Active Conversations</span>
                            <span class="flex items-center justify-center bg-gray-300 h-4 w-4 rounded-full">4</span>
                        </div>
                        @include('conversations.users',['users' => $users])
                    </div>
                </div>
                <div class="flex flex-col flex-auto h-full p-6 ">
                    <div class="flex flex-col flex-auto flex-shrink-0 rounded-2xl bg-gray-100 h-full p-4">
                        <div class="flex flex-col h-full overflow-x-auto mb-4">
                            <div class="flex flex-col h-full">
                                <div class="flex  justify-between bg-indigo-100 text-gray-900 rounded-lg p-2">
                                    {{$user->name}}
                                </div>
                                <div class="grid grid-cols-12 gap-y-2" id="messageContainer">
                                    @foreach($messages as $message)
                                        @if($message->user->id !== auth()->user()->id)
                                            <div class="col-start-1 col-end-8 p-3 rounded-lg">
                                                <div class="flex flex-row items-center">
                                                    <div class="flex items-center justify-center h-10 w-10 rounded-full bg-indigo-500 flex-shrink-0">
                                                        him
                                                    </div>
                                                    <div class="relative ml-3 text-sm bg-white py-2 px-4 shadow rounded-xl">
                                                        <div>{{ $message->content }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <div class="col-start-6 col-end-13 p-3 rounded-lg">
                                                <div class="flex items-center justify-start flex-row-reverse">
                                                    <div class="flex items-center justify-center h-10 w-10 rounded-full bg-indigo-500 flex-shrink-0">
                                                        Moi
                                                    </div>
                                                    <div class="relative mr-3 text-sm bg-indigo-100 py-2 px-4 shadow rounded-xl">
                                                        <div>{{ $message->content }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <form id="messageForm" action="" method="post" >
                            {{csrf_field()}}
                          <div class="flex flex-row items-center h-16 rounded-xl bg-white w-full px-4">
                            <div>
                                <button class="flex items-center justify-center text-gray-400 hover:text-gray-600">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"></path>
                                    </svg>
                                </button>
                            </div>
                            <div class="flex-grow ml-4">
                                <div class="relative w-full">
                                        <input id="content"  name="content" type="text" placeholder="Write message" class="flex w-full border rounded-xl focus:outline-none focus:border-indigo-300 pl-4 h-10"/>
                                </div>
                            </div>
                              <div class="flex-grow ml-4">
                                  <div class="relative w-full">
                                      <input id="to_id"  name="to_id" type="number" placeholder="Write message" class="w-full border rounded-xl focus:outline-none focus:border-indigo-300 pl-4 h-10 hidden" value="{{$user->id}}"/>
                                  </div>
                              </div>
                            <div class="ml-4">
                                <button type="submit" class="flex items-center justify-center bg-indigo-500 hover:bg-indigo-600 rounded-xl text-white px-4 py-1 flex-shrink-0">
                                    <span>Send</span>
                                    <span class="ml-2">
                  <svg class="w-4 h-4 transform rotate-45 -mt-px" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                  </svg>
                </span>
                                </button>
                            </div>
                        </div>
                        </form>
                     </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('messageForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent default form submission

            let formData = new FormData(this); // Get form data

            // Send AJAX request
            fetch('{{ route("conversations.store", ['user' => $user->id]) }}', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Failed to store message');
                    }
                    return response.json(); // Parse response JSON
                })
                .then(data => {
                    if (data.success) {
                        let newMessageHtml = `
                <div class="col-start-6 col-end-13 p-3 rounded-lg">
                    <div class="flex items-center justify-start flex-row-reverse">
                        <div class="flex items-center justify-center h-10 w-10 rounded-full bg-indigo-500 flex-shrink-0">
                            Moi
                        </div>
                        <div class="relative mr-3 text-sm bg-indigo-100 py-2 px-4 shadow rounded-xl">
                            <div>${formData.get('content')}</div>
                        </div>
                    </div>
                </div>
            `;

                        // Append the new message HTML to the message container
                        let messageContainer = document.getElementById('messageContainer');
                        messageContainer.insertAdjacentHTML('beforeend', newMessageHtml);
                        setTimeout(function () {
                            window.scrollTo(0, document.body.scrollHeight); // Scroll to bottom of page
                        }, 2);
                        // Clear the input field
                        document.getElementById('content').value = '';
                    } else {
                        // Handle error if message storage failed
                        console.error('Failed to store message:', data.error);
                    }
                })
                .catch(error => {
                    // Handle any network or server error
                    console.error('Error:', error);
                });
        });

    </script>
        <script>

            const receiverId = {{ $user->id ?? 'null' }};
            const SenderId = {{auth()->user()->id ?? 'null'}};
            if (receiverId) {
                console.log('Receiver ID:', receiverId);
                console.log('sender ID:',SenderId)
            } else {
                console.error('Receiver ID is null or undefined.');
                console.error('Sender ID is null or undefined.');

            }
        </script>
</x-app-layout>
