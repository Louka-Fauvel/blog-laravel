<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('commentaries.update', $commentary) }}">
            @csrf
            @method('PUT')
            <textarea
                name="message"
                placeholder="{{ __('Message') }}"
                class="block w-full mt-4 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            >{{ old('content', $commentary->message) }}</textarea>
            <x-input-error :messages="$errors->get('message')" class="mt-2" />
            
            <div class="mt-4 space-x-2">
                <x-primary-button>{{ __('Modifier') }}</x-primary-button>
                <a href="{{ route('articles.show', ['article' => $article, 'commentaries' => $article->commentaries]) }}">{{ __('Annuler') }}</a>
            </div>
        </form>
    </div>
</x-app-layout>