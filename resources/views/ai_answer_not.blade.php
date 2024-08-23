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

                        <!-- AI's response -->
                        <div class="flex items-start">
                            <div class="relative max-w-xs p-4 bg-gray-100 rounded-lg shadow-sm">
                                <p class="font-semibold text-gray-800">physicAI</p>
                                <p class="text-gray-700 mt-2">
                                    すみません。よくわかりません。<br>
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

    <script>
    document.getElementById('send-button').addEventListener('click', function() {
    const message = document.getElementById('message').value.trim();

    if (message === '') {
        alert('メッセージを入力してください。');
        return;
    }

    if (message === '微分の定義は？') {
        // 1.5秒待ってからページ遷移を実行
        setTimeout(function() {
            window.location.href = '/ai_answer';
        }, 1500); 
        
    } 
    else if (message === '運動の三法則') {
        // 1.5秒待ってからページ遷移を実行
        setTimeout(function() {
            window.location.href = '/ai_answer2';
        }, 1500); 
    
        // 入力されたメッセージをセッションストレージに保存
        sessionStorage.setItem('userMessage', message);    
    } 

    else {
        // 他のメッセージの場合、通常の処理を実行
        setTimeout(function() {
            window.location.href = '/ai_answer_not';
        }, 1500); 
    }
});
</script>

</x-app-layout>
