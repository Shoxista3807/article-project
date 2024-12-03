<x-app-layout>
    <x-slot name="header">
        <div class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight flex">
            <h2>Yozuvchilar: </h2>
            <h2> {{ $article->author->name }}</h2>
        </div>
    </x-slot>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg content-center m-auto flex justify-center container">
        <div
            class="flex justify-center  w-full bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <a href="#">
                <img style="max-height: 450px ;width: 100%" class="rounded-t-lg w-full rounded-lg"
                    src="/storage/{{ $article->photo }}" alt="" />
            </a>
            <div class="p-5">
                <h1 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                    Muallif: {{ $article->author->name }}
                </h1>
                <hr>
                <h1 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Maqola Sarlavhasi</h1>
                <a href="#">
                    <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">
                        {{ $article->title }}</h5>
                </a>
                <hr>
                <h1 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Maqola Sarlavhasi</h1>

                <p class="mb-3  text-gray-700 dark:text-gray-400"> {{ $article->excerpt }}</p>
                <hr>
                <h1 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Maqola</h1>
                <p class="mb-3  text-gray-700 dark:text-gray-400"> {{ $article->body }}</p>
                <div class="flex items-center justify-between gap-7">
                    {{-- @dd(Auth::user()->role) --}}
                    @if (auth()->user()->id === $article->user_id)
                        <a href={{ route('article.edit', $article->id) }}
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">O'zgartirish</a>
                    @endif
                    @if (auth()->user()->role->name === 'admin' || auth()->user()->id === $article->user_id)
                        <form onsubmit="return confirm('Haqiqatdanham o\'chirmoqchimisiz')"
                            action="{{ route('article.destroy', $article->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button
                                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg focus:ring-4 focus:outline-none bg-red-600 hover:bg-red-700 focus:ring-red-800">
                                O'chirsh</button>
                        </form>
                    @endif
                    @if (auth()->user()->role->name === 'admin' && $article->active === 0)
                        <form class="px-15" action={{ route('public', ['article' => $article->id]) }} method="post">
                            @csrf
                            @method('PATCH')
                            <button type="submit"
                                class="text-white bg-[#4285F4] hover:bg-[#4285F4]/90 focus:ring-4 focus:outline-none focus:ring-[#4285F4]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-[#4285F4]/55 me-2 mb-2">
                                <svg class="w-[20px] h-[20px] text-white-800 dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="none"
                                    viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="1.8"
                                        d="M12 7.757v8.486M7.757 12h8.486M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>

                            </button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
