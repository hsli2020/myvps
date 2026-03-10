
@foreach($files as $file)
    <div>
        <p>{{ $file->original_name }} ({{ number_format($file->size / 1024, 2) }} KB)</p>
        <p>{{ $file->note }}</p>
        <a href="{{ route('files.download', $file->id) }}">下载</a>
        <form action="{{ route('files.destroy', $file->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit">删除</button>
        </form>
    </div>
@endforeach

{{ $files->links() }}

