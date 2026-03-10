<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Upload') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
{{--
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
--}}
                <form class=""
                    action="{{ route('files.store') }}" method="POST" enctype="multipart/form-data"
                >
                    @csrf
                    <div class="max-w-md mx-auto">
                        <label class="text-base text-slate-900 font-medium mb-3 block">Select file</label>
                        <input type="file" name="file"
                            class="w-full text-slate-500 font-medium text-sm bg-white border file:cursor-pointer cursor-pointer file:border-0 file:py-3 file:px-4 file:mr-4 file:bg-gray-100 file:hover:bg-gray-200 file:text-slate-500 rounded" />

                        <p class="text-xs text-slate-500 mt-2">PNG, JPG, DOCX, ZIP are Allowed.</p>

                        @error('file')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="max-w-md mx-auto mt-4">
                        <label class="text-base text-slate-900 font-medium mb-3 block">File note</label>
                        <textarea name="note" rows="10"
                            class="w-full text-slate-500 font-medium text-sm
                            bg-white border"></textarea>
                    </div>

                    <div class="max-w-md mx-auto mt-4">
                        <button type="submit" class="rounded-lg bg-blue-600 px-5 py-3 text-white">
                            Submit
                        </button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
