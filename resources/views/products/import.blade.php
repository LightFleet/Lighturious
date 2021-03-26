@extends('layouts.app')

@section('content')
    <form method="post" action="/api/import" enctype="multipart/form-data" class="mx-auto mt-28 max-w-sm bg-white flex flex-col">
        @csrf
        <input name="csv_file" id="csv_file" type="file">
        <button type="submit" class="border-2 border-gray-300 mt-4">Submit</button>
    </form>
@endsection
