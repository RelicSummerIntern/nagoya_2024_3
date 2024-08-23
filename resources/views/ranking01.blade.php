<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            第一回模試のランキング(総合)
        </h2>
    </x-slot>

    <div class="max-w-4xl mx-auto mt-10 px-4 sm:px-6 lg:px-8">
        <div class="bg-white shadow-md rounded-lg p-6">
            <!-- ボタン群 -->
            <form method="POST" action="/">
                    @csrf
                    <div class="space-y-4">
                        @foreach($exams as $exam)
                        <label>
                            <input type='submit' name='exam' value=1 class="mr-2">
                            {{$exam->exam_name}}
                        </label>
                        @endforeach
                    </div>
                </div>
            </form>

            <!-- ランキングテーブル -->
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            順位
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            名前
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            スコア
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <!-- ランキングデータ（サンプルデータ） -->
                     @foreach
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            1
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            山田 太郎(仮)
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            480点(仮)
                        </td>
                    </tr>
                    @endforeach
                    <!-- ここに他のランキングデータが続きます -->
                </tbody>
            </table>
        </div>
    </div>
        
            <!-- 戻るボタン -->
            <div class="flex justify-center mt-6">
                <x-nav-link :href="route('exams')" :active="request()->routeIs('post.index')" style="font-size: 15px; text-decoration: underline; color: #4a5568;">
                    {{ __('戻る') }}
                </x-nav-link>
            </div>
</x-app-layout>
