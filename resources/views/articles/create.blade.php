<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Yangi maqola yaratish
        </h2>
    </x-slot>

    <div id="wrapper">
        <div id="page" class="container">
            <form class="mx-auto max-w-2xl mt-8" action="{{ route('article.store') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Maqola
                        sarlavhasi</label>
                    <input name="title" type="text" id="title" value="{{ old('title') }}"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                        placeholder="Maqola sarlavhasi" required />
                </div>
                <div class="mb-4">
                    <label for="excerpt" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Maqoladan
                        parcha</label>
                    <textarea name="excerpt" id="excerpt" rows="4" required
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Maqoladan parcha"> {{ old('excerpt') }}</textarea>
                </div>
                <div class="mb-4">
                    <label for="body"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Maqola</label>
                    <textarea name="body" id="body" rows="4" required
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Maqoladan parcha">   {{ old('body') }}</textarea>
                </div>
                <div class="mb-4">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input"> file
                        yuklang</label>
                    <input name="photo"
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                        aria-describedby="file_input_help" id="file_input" type="file">
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">SVG, PNG, JPG
                        (MAX.
                        800x400px).</p>
                </div>
                @auth
                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Maqolani yaratish</button>
                @else
                    <a href="{{ route('login') }}"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Tizimga kirish</a>
                @endauth
            </form>
        </div>
    </div>
</x-app-layout>
