<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Maqolalar
        </h2>
    </x-slot>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg content-center p-20">
        @if ($articles->isEmpty())
            <p class="text-center text-2xl">Maqolalar mavjud emas</p>
        @else
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr class="font-black">
                        <th scope="col" class="px-6 py-3 ">
                            Yozuvchining ismi
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Maqola Sarlavhasi
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Maqoladan Parcha
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Maqola
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($articles as $article)
                        <tr onclick="window.location='{{ route('article.show', $article->id) }}'"
                            class="hover:bg-gray-300 cursor-pointer odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $article->author->name }}
                            </th>
                            <td scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $article->title }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $article->excerpt }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $article->body }}
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
</div>

</x-app-layout>
