<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            模試の点数を入力してください
        </h2>
    </x-slot>

    <div class="max-w-4xl mx-auto mt-10 px-4 sm:px-6 lg:px-8">
        <div class="bg-white shadow-md rounded-lg p-6">
            <!-- フォーム -->
            <form action="{{ route('ranking') }}" method="POST">
                @csrf
                <!-- 模試選択のテキストと入力ボックス -->
                <div class="space-y-4">
                    @foreach($subjects as $subject)
                    <div class="flex items-center">
                        <label class="text-lg text-gray-800 mr-4">{{$subject->subject_name}}</label>
                        <input type="number" subject_id="{{$subject->id}}" min="0" max="100" class="border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">点<br>
                    </div>
                    @endforeach
                </div>
                <!-- 登録ボタン -->
                <div class="flex items-center justify-center mt-4">
            <x-primary-button class="ml-4" type="submit">
                {{ __('Register') }}
            </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
