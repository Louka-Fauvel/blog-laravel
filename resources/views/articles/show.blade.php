<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">

        <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
            <div class="p-6 flex space-x-2">
                <div class="flex-1">
                    
                    <div class="flex justify-between items-center">
                        <h1 class="text-3xl text-gray-900">{{ $article->title }}</h1>
                        <div>
                            <span class="text-gray-800">{{ $article->user->name }}</span>
                            <small class="ml-2 text-sm text-gray-600">{{ $article->created_at->format('j M Y, g:i a') }}</small>
                            @unless ($article->created_at->eq($article->updated_at))

                                <small class="text-sm text-gray-600"> &middot; {{ __('modifié') }}</small>

                            @endunless
                        </div>

                        @if ($article->user->is(auth()->user()))
                            <x-dropdown>
                                <x-slot name="trigger">
                                    <button>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                        </svg>
                                    </button>
                                </x-slot>
                                <x-slot name="content">
                                    <x-dropdown-link :href="route('articles.edit', $article)">
                                        {{ __('modifier') }}
                                    </x-dropdown-link>
                                </x-slot>
                            </x-dropdown>
                        @endif

                    </div>
                    <p class="mt-4 text-lg text-gray-900">{{ $article->content }}</p>
                </div>
            </div>
        </div>

        <form method="POST" action="{{ route('commentaries.store') }}">
            @csrf
            <textarea
                name="message"
                placeholder="{{ __('Message') }}"
                class="block w-full mt-4 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            >{{ old('content') }}</textarea>
            <x-input-error :messages="$errors->get('message')" class="mt-2" />
            
            <input 
                name="article_id"
                type="hidden"
                value="{{ $article->id }}"
            />
            
            <x-primary-button class="mt-4">{{ __('Ajouter') }}</x-primary-button>
        </form>

        <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
            @foreach ($commentaries as $commentarie)
                <div class="p-6 flex space-x-2">
                    <div class="flex-1">
                        
                        <div class="flex justify-end items-center">
                            <div>
                                <span class="text-gray-800">{{ $commentarie->user->name }}</span>
                                <small class="ml-2 text-sm text-gray-600">{{ $commentarie->created_at->format('j M Y, g:i a') }}</small>
                                @unless ($commentarie->created_at->eq($commentarie->updated_at))

                                    <small class="text-sm text-gray-600"> &middot; {{ __('modifié') }}</small>

                                @endunless
                            </div>

                            @if ($article->user->is(auth()->user()))
                                <x-dropdown>
                                    <x-slot name="trigger">
                                        <button>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                            </svg>
                                        </button>
                                    </x-slot>
                                    <x-slot name="content">
                                        <x-dropdown-link :href="route('commentaries.edit', $commentarie)">
                                            {{ __('modifier') }}
                                        </x-dropdown-link>
                                    </x-slot>
                                </x-dropdown>
                            @endif

                        </div>
                        <p class="mt-4 text-lg text-gray-900">{{ $commentarie->message }}</p>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</x-app-layout>