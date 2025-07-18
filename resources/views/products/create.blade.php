@extends('layouts.app')

@section('content')
<button onclick="window.history.back()" class="inline-block bg-rose-100 hover:bg-rose-200 text-rose-600 font-bold py-2 px-4 rounded-md shadow-md transition-colors duration-200 mb-4 ml-4">
  ← Quay lại trang trước
</button>
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold text-rose-600 mb-6 text-center">Thêm sản phẩm mới</h1>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow-md">
        @csrf
        <div class="mb-4">
            <label for="name" class="block text-gray-700 text-sm font-medium mb-1">Tên:</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-input mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-rose-500 focus:ring focus:ring-rose-200 focus:ring-opacity-50" required>
        </div>

        <div class="mb-4">
            <label for="description" class="block text-gray-700 text-sm font-medium mb-1">Mô tả:</label>
            <textarea name="description" id="description" class="form-textarea mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-rose-500 focus:ring focus:ring-rose-200 focus:ring-opacity-50">{{ old('description') }}</textarea>
        </div>

        <div class="mb-4">
            <label for="price" class="block text-gray-700 text-sm font-medium mb-1">Giá:</label>
            <input type="number" step="0.01" name="price" id="price" value="{{ old('price') }}" class="form-input mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-rose-500 focus:ring focus:ring-rose-200 focus:ring-opacity-50" required>
        </div>


        <div class="mb-4">
            <label for="image" class="block text-gray-700 text-sm font-medium mb-1">Ảnh:</label>
            <input type="file" name="image" id="image" accept="image/*" class="form-input mt-1 block w-full text-gray-700">
        </div>

        <button type="submit" class="bg-rose-500 text-white hover:bg-rose-600 font-bold py-2 px-4 rounded-md shadow-md transition-colors duration-200">Thêm sản phẩm</button>
    </form>
</div>
@endsection

