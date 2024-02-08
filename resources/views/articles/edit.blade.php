<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('articles.update', $article) }}">
            @csrf
            @method('patch')
            <input
                name="title"
                type="text"
                placeholder="{{ __('Titre de l\'article') }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                value="{{ $article->title }}"
            />
            <x-input-error :messages="$errors->get('title')" class="mt-2" />

            <textarea
                name="content"
                placeholder="{{ __('Contenu') }}"
                class="block w-full mt-4 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            >{{ old('content', $article->content) }}</textarea>
            <x-input-error :messages="$errors->get('content')" class="mt-2" />
            
            <div class="mt-4 space-x-2">
                <x-primary-button>{{ __('Modifier') }}</x-primary-button>
                <a href="{{ route('articles.index') }}">{{ __('Annuler') }}</a>
            </div>
        </form>
    </div>
</x-app-layout>