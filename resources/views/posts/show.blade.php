<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <div
            class="rounded border-r border-b border-l border-gray-400 lg:border-l-0 lg:border-t lg:border-gray-400 bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
            <div class="mb-8">
                <p class="text-sm text-gray-600 flex items-center">
                    <svg class="w-8 fill-current text-gray-500 w-3 h-3 mr-2" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20">
                        <path
                            d="M4 8V6a6 6 0 1 1 12 0v2h1a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-8c0-1.1.9-2 2-2h1zm5 6.73V17h2v-2.27a2 2 0 1 0-2 0zM7 6v2h6V6a3 3 0 0 0-6 0z" />
                    </svg>
                    {{ $post->title }}
            </div>
            <div class="flex items-center">
                <img class="w-20 h-20 rounded-full mr-4" src="{{ asset('storage/images/836.jpg') }}"
                    alt="Avatar of Jonathan Reinink">
                <div class="text-sm">
                    <p class="text-gray-900 leading-none">{{ $post->user->name }}</p>
                    <p class="text-gray-600">{{ $post->created_at }}</p>
                </div>
            </div>
            <div class="text-sm">
                <p class="text-gray-600">
                    {{ $post->body }}
                </p>
            </div>
        </div>
    </div>
</x-app-layout>
