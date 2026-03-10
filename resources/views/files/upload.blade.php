<x-app-layout>

<form action="{{ route('files.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="file" required>
    <textarea name="note" placeholder="文件介绍"></textarea>
    <button type="submit">上传</button>
</form>

</x-app-layout>
