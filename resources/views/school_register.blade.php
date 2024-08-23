@vite(['resources/css/button.css'])
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            希望する大学を選択してください
        </h2>
    </x-slot>

    <form method="POST" action="{{ route('school_store') }}">
        @csrf
        
        <div class="max-w-4xl mx-auto mt-10 px-4 sm:px-6 lg:px-8">
            <!-- 大学名を列挙 -->
            <div class="space-y-4">
                @foreach($schools as $school)
                <input type='radio' id='school_{{$school->id}}' name='school' value='{{$school->id}}'>
                <label for='school_{{$school->id}}' class="text-lg text-gray-800">{{$school->school_name}}</label>
                @endforeach
            </div>
        </div>
        <div class="flex items-center justify-center mt-4">
            <x-primary-button class="ml-4" type="submit">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-app-layout>

