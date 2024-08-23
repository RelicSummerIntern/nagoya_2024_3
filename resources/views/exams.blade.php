@vite(['resources/css/button.css'])
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            受験した模試を選択してください
        </h2>
    </x-slot>

    <div class="max-w-4xl mx-auto mt-10 px-4 sm:px-6 lg:px-8">
        <div class="bg-white shadow-md rounded-lg p-6">
            <!-- 模試選択のボタン -->
            <div class="space-y-4">
<!--                <a href="{{ route('score01') }}" class="block text-lg text-center text-white bg-blue-500 hover:bg-blue-600 rounded-lg py-2">
                    第1回模試
                </a>
                <a href="{{ route('score02') }}" class="block text-lg text-center text-white bg-blue-500 hover:bg-blue-600 rounded-lg py-2">
                    第2回模試
                </a>
                <a href="{{ route('score03') }}" class="block text-lg text-center text-white bg-blue-500 hover:bg-blue-600 rounded-lg py-2">
                    第3回模試
                </a>
-->
<!-- 
                <a href="{{ route('score01') }}" class="bg-white border-b border-gray-200 p-6 block w-full text-center
                font-semibold text-gray-800 hover:bg-gray-100 text-decoration-none">
                    第1回模試
                </a>
                <a href="{{ route('score02') }}" class="bg-white border-b border-gray-200 p-6 block w-full text-center
                font-semibold text-gray-800 hover:bg-gray-100 text-decoration-none">
                    第2回模試
                </a>
                <a href="{{ route('score03') }}" class="bg-white border-b border-gray-200 p-6 block w-full text-center
                font-semibold text-gray-800 hover:bg-gray-100 text-decoration-none">
                    第3回模試
                </a> 
-->
                @foreach($exams as $exam)
                    <form method="POST" action="{{ route('score_enter') }}">
                        @csrf
                        <input type="hidden" name="exam_id" value="{{ $exam->id }}">
                        <button type="submit">{{ $exam->exam_name }}</button>
                    </form>
                @endforeach

            </div>
        </div>
        <div class="flex justify-center mt-6">
            <x-nav-link :href="route('home')" :active="request()->routeIs('post.index')" style="font-size: 15px; text-decoration: underline; color: #4a5568;">
                {{ __('戻る') }}
            </x-nav-link>
        </div>
    </div>
</x-app-layout>

