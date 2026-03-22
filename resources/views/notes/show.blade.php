{{-- filepath: /home/criscarlo/litenotes/resources/views/notes/show.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Notes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex">
                <p class="opacity-70">
                    <strong>Created: </strong>{{ optional($note->created_at)->diffForHumans() ?? '-' }}
                </p>
                                
                <p class="opacity-70 ml-8">
                    <strong>Updated at: </strong>{{ optional($note->updated_at)->diffForHumans() ?? '-' }}
                </p>
            </div>

            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                <h2 class="font-bold text-4xl">
                    {{ $note->title }}
                </h2>

                @php
                    $paragraphs = preg_split('/\r?\n\r?\n+/', trim($note->text ?? ''));
                @endphp

                @foreach($paragraphs as $para)
                    <p class="mt-6" style="text-align:justify;">
                        {!! nl2br(e($para)) !!}
                    </p>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>