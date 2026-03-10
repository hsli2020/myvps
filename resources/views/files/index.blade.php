<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Download') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <table class="w-full border-collapse border border-gray-400">
                    <tr>
                    <th class="border border-gray-300 px-4 py-2">#</th>
                    <th class="border border-gray-300 px-4 py-2">文件名</th>
                    <th class="border border-gray-300 px-4 py-2">大小</th>
                    <th class="border border-gray-300 px-4 py-2">说明</th>
                    <th class="border border-gray-300 px-4 py-2">下载</th>
                    </tr>

                    @foreach($files as $file)
                        <tr>
                            <td class="border border-gray-300 px-4 py-2">{{ $loop->iteration }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $file->original_name }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ number_format($file->size / 1024, 2) }} KB</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $file->note }}</td>
                            <td class="border border-gray-300 px-4 py-2"><a href="{{ route('files.download', $file->id) }}">下载</a></td>
{{--
                            <form action="{{ route('files.destroy', $file->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit">删除</button>
                            </form>
--}}
                        </tr>
                    @endforeach
                    </table>

                </div>
            </div>
        </div>
    </div>

{{ $files->links() }}

</x-app-layout>
