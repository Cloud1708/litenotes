{{-- filepath: /home/criscarlo/litenotes/resources/views/notes/show.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ !$note->trashed() ? __('Notes') : __('Trash  ') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-alert-success>
                {{ session('success') }}
            </x-alert-success>
            <div class="flex">
                @if(!$note->trashed())
                <p class="opacity-70">
                    <strong>Created: </strong>{{ optional($note->created_at)->diffForHumans() ?? '-' }}
                </p>
                                
                <p class="opacity-70 ml-8">
                    <strong>Updated at: </strong>{{ optional($note->updated_at)->diffForHumans() ?? '-' }}
                </p>
                <a href="{{ route('notes.edit', $note) }}" class="btn-link ml-auto">Edit Note</a>
                <form action="{{ route('notes.destroy', $note) }}" method="POST">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-danger ml-4" onclick="return confirm('Are you sure you wish to move this to trash?')">Move to trash</button>
                </form>
                @else
                <p class="opacity-70">
                    <strong>Deleted: </strong>{{ $note->deleted_at->diffForHumans()}}
                </p>
                <form action="{{ route('trashed.update', $note) }}" method="post" class="ml-auto">
                    @method('put')
                    @csrf
                    <button type="submit" class="btn-link ml-auto">Restore Note</button>
                </form>
                
               <form action="{{ route('trashed.destroy', $note) }}" method="POST">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-danger ml-4" onclick="return confirm('Are you sure you wish to delete this note forever? This action cannot be undone')">Delete Forever</button>
                </form>
                @endif
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