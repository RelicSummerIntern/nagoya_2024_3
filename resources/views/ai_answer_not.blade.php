<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            physicAIとの対話
        </h2>
    </x-slot>

    <div class="max-w-4xl mx-auto mt-10 px-4 sm:px-6 lg:px-8">
        <div class="bg-white shadow-md rounded-lg p-6">
            <!-- チャットのメッセージリスト -->
            <div class="space-y-4 mb-4" id="chat-messages">
                @if (!empty($posts))
                    @foreach ($posts as $post)
                        <div class="flex items-start {{ $post->user->id == auth()->user()->id ? 'justify-end' : '' }}">
                            <div class="relative max-w-xs p-4 bg-gray-100 rounded-lg shadow-sm {{ $post->user->id == auth()->user()->id ? 'bg-blue-100 text-right' : '' }}">
                                <p class="font-semibold text-gray-800">{{ $post->user->name }}</p>
                                <p class="text-gray-700 mt-2">{{ $post->body }}</p>
                                <span class="absolute bottom-1 right-2 text-xs text-gray-500">{{ $post->updated_at->format('H:i') }}</span>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="space-y-4">
                        <!-- User's message -->
                        <div class="flex justify-end items-center h-full">
                            <div class="relative max-w-xs p-4 bg-blue-100 rounded-lg shadow-sm text-right">
                                <p class="font-semibold text-gray-800">あなた</p>
                                <p class="text-gray-700 mt-2">wawawawa</p>
                                <span class="absolute bottom-1 right-2 text-xs text-gray-500">{{ now()->format('H:i') }}</span>
                            </div>
                        </div>
                        <!-- AI's response -->
                        <div class="flex items-start">
                            <div class="relative max-w-xs p-4 bg-gray-100 rounded-lg shadow-sm">
                                <p class="font-semibold text-gray-800">physicAI</p>
                                <p class="text-gray-700 mt-2">
                                    すみません。よくわかりません。<br><br><br><br><br>
                                </p>
                                <span class="absolute bottom-1 right-2 text-xs text-gray-500">{{ now()->format('H:i') }}</span>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- メッセージ入力フォームをページ下に固定 -->
    <div class="fixed bottom-0 left-0 right-0 bg-white shadow-md p-4">
        <div class="max-w-4xl mx-auto flex">
            <textarea id="message" rows="2" class="w-full p-2 border border-gray-300 rounded-lg" placeholder="メッセージを入力してください..."></textarea>
            <button id="send-button" class="ml-4 px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600">
                送信
            </button>
        </div>
        <div class="flex justify-center mt-6">
            <x-nav-link :href="route('home')" :active="request()->routeIs('post.index')" style="font-size: 15px; text-decoration: underline; color: #4a5568;">
                {{ __('戻る') }}
            </x-nav-link>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        document.getElementById('send-button').addEventListener('click', function() {
            const message = document.getElementById('message').value;

            if (message.trim() === '') {
                alert('メッセージを入力してください。');
                return;
            }

            axios.post('/chat/send', { message })
                .then(response => {
                    // 応答をメッセージリストに追加
                    const chatMessages = document.getElementById('chat-messages');
                    const newMessage = document.createElement('div');
                    newMessage.className = 'flex items-start justify-end';
                    newMessage.innerHTML = `
                        <div class="relative max-w-xs p-4 bg-blue-100 rounded-lg shadow-sm text-right">
                            <p class="font-semibold text-gray-800">あなた</p>
                            <p class="text-gray-700 mt-2">${message}</p>
                            <span class="absolute bottom-1 right-2 text-xs text-gray-500">${new Date().toLocaleTimeString().slice(0, 5)}</span>
                        </div>
                    `;
                    chatMessages.appendChild(newMessage);

                    // AIからの応答をメッセージリストに追加
                    const aiMessage = document.createElement('div');
                    aiMessage.className = 'flex items-start';
                    aiMessage.innerHTML = `
                        <div class="relative max-w-xs p-4 bg-gray-100 rounded-lg shadow-sm">
                            <p class="font-semibold text-gray-800">AI</p>
                            <p class="text-gray-700 mt-2">${response.data.reply}</p>
                            <span class="absolute bottom-1 right-2 text-xs text-gray-500">${new Date().toLocaleTimeString().slice(0, 5)}</span>
                        </div>
                    `;
                    chatMessages.appendChild(aiMessage);

                    // メッセージをクリア
                    document.getElementById('message').value = '';
                })
                .catch(error => {
                    console.error('エラーが発生しました:', error);
                });
        });
    </script>

</x-app-layout>
