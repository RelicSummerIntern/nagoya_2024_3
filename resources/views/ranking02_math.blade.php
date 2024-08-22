<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            第二回模試のランキング(数学)
        </h2>
    </x-slot>

    <div class="max-w-4xl mx-auto mt-10 px-4 sm:px-6 lg:px-8">
        <div class="bg-white shadow-md rounded-lg p-6">
            <!-- ボタン群 -->
            <div class="flex justify-center space-x-4 mb-6">
                <a href="/ranking02" class="bg-gray-500 text-white px-4 py-2 rounded-lg text-center focus:outline-none focus:ring-2 focus:ring-gray-500">
                    総合
                </a>
                <a href="/ranking02_english" class="bg-orange-500 text-white px-4 py-2 rounded-lg text-center focus:outline-none focus:ring-2 focus:ring-orange-500">
                    英語
                </a>
                <a href="/ranking02_japanese" class="bg-red-500 text-white px-4 py-2 rounded-lg text-center focus:outline-none focus:ring-2 focus:ring-red-500">
                    国語
                </a>
                <a href="/ranking02_math" class="bg-blue-500 text-white px-4 py-2 rounded-lg text-center focus:outline-none focus:ring-2 focus:ring-blue-500">
                    数学
                </a>
                <a href="/ranking02_science" class="bg-green-500 text-white px-4 py-2 rounded-lg text-center focus:outline-none focus:ring-2 focus:ring-green-500">
                    理科
                </a>
                <a href="/ranking02_society" class="bg-yellow-500 text-white px-4 py-2 rounded-lg text-center focus:outline-none focus:ring-2 focus:ring-yellow-500">
                    社会
                </a>

            </div>

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
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            1
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            山田 太郎(仮)
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            40点(仮)
                        </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            2
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            鈴木 一郎(仮)
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            36点(仮)
                        </td>
                    </tr>
                    <!-- ここに他のランキングデータが続きます -->
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
