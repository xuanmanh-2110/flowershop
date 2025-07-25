@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h2 class="text-3xl font-bold text-rose-600 mb-6 text-center">Sửa khách hàng</h2>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
            <ul class="list-disc list-inside">@foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach</ul>
        </div>
    @endif

    <form action="{{ route('customers.update', $customer) }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="name" class="block text-gray-700 text-sm font-medium mb-1">Tên:</label>
            <input type="text" name="name" id="name" value="{{ old('name', $customer->name) }}" class="form-input mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-rose-500 focus:ring focus:ring-rose-200 focus:ring-opacity-50" required>
        </div>

        <div class="mb-4">
            <label for="email" class="block text-gray-700 text-sm font-medium mb-1">Email:</label>
            <input type="email" name="email" id="email" value="{{ old('email', $customer->email) }}" class="form-input mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-rose-500 focus:ring focus:ring-rose-200 focus:ring-opacity-50" required>
        </div>

        <div class="mb-4">
            <label for="phone" class="block text-gray-700 text-sm font-medium mb-1">Số điện thoại:</label>
            <input type="text" name="phone" id="phone" value="{{ old('phone', $customer->phone) }}" class="form-input mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-rose-500 focus:ring focus:ring-rose-200 focus:ring-opacity-50">
        </div>

        <div class="mb-4">
            <label for="address" class="block text-gray-700 text-sm font-medium mb-1">Địa chỉ:</label>
            <textarea name="address" id="address" rows="3" class="form-input mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-rose-500 focus:ring focus:ring-rose-200 focus:ring-opacity-50" placeholder="Nhập địa chỉ đầy đủ">{{ old('address', $customer->address) }}</textarea>
        </div>

        <button type="submit" class="bg-rose-500 text-white hover:bg-rose-600 font-bold py-2 px-4 rounded-md shadow-md transition-colors duration-200">Cập nhật</button>
    </form>
</div>

@endsection
