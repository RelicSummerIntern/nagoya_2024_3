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
                                <p class="text-gray-700 mt-2">運動の三法則</p>
                                <span class="absolute bottom-1 right-2 text-xs text-gray-500">{{ now()->format('H:i') }}</span>
                            </div>
                        </div>
                        <!-- AI's response -->
                        <div class="flex items-start">
                            <div class="relative max-w-xs p-4 bg-gray-100 rounded-lg shadow-sm">
                                <p class="font-semibold text-gray-800">physicAI</p>
                                <p class="text-gray-700 mt-2">
                                運動の三法則は、アイザック・ニュートンが提唱した物理学の基本的な法則で、物体の運動の原理を説明するものです。これらの法則は「ニュートンの運動の法則」とも呼ばれ、以下の三つから成ります。<br><br>

                                <strong>第一法則（慣性の法則）</strong><br>
                                「すべての物体は、外から力が加わらない限り、静止している物体は静止し続け、運動している物体は等速直線運動を続ける。」<br><br>
                                これは、物体に外力が加わらない限り、その物体はその状態（静止または等速直線運動）を維持しようとするという法則です。これを慣性と呼びます。<br><br>

                                <strong>第二法則（運動の法則）</strong><br>
                                「物体に力が加わると、その物体はその力の向きに比例した加速度を持ち、加速度は物体の質量に反比例する。」<br><br>
                                この法則は数式で表すと、F = ma となります。ここで、F は力、m は物体の質量、a は加速度を表します。この法則により、力と加速度の関係を明確に示しています。<br><br>

                                <strong>第三法則（作用・反作用の法則）</strong><br>
                                「ある物体が別の物体に力を加えると、その物体も同じ大きさで反対方向の力を受ける。」<br><br>
                                この法則は、一般に「作用・反作用の法則」として知られています。例えば、手で壁を押すと、壁も同じ大きさの力で手を押し返しているということです。<br><br>

                                これらの三法則は、古典力学の基礎を形成し、物体の運動を理解するための重要な原理となっています。
                                </p><br><br><br><br>
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
        // 他のメッセージの場合、通常の処理を実行ff
        setTimeout(function() {
            window.location.href = '/ai_answer_not';
        }, 1500); 
    }
});
</script>

</x-app-layout>
