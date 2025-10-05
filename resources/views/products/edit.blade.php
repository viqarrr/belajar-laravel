<x-app-layout>
  <x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
      {{ __('Edit Product') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
      <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
        @session('success')
          <div class="alert alert-success" role="alert">{{ $value }}</div>
        @endsession

        <form
          action="{{ route('products.update', $product->id) }}"
          enctype="multipart/form-data"
          method="POST"
        >
          @csrf
          @method('PUT')

          <div class="grid grid-cols-12 gap-4 border-t border-gray-200 px-5 py-8 sm:gap-6">
            {{-- Name --}}
            <div class="sm:col-span-3">
              <label for="name" class="mt-2.5 inline-block text-sm font-medium text-gray-500">
                Name
              </label>
            </div>
            <div class="sm:col-span-9">
              <input
                id="name"
                name="name"
                type="text"
                value="{{ $product->name }}"
                required
                class="block w-full rounded-lg border border-gray-200 px-3 py-2 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
              >
              @error('name')
                <div class="text-sm text-red-500 mt-1">{{ $message }}</div>
              @enderror
            </div>

            {{-- Description --}}
            <div class="sm:col-span-3">
              <label for="description" class="mt-2.5 inline-block text-sm font-medium text-gray-500">
                Description
              </label>
            </div>
            <div class="sm:col-span-9">
              <textarea
                id="description"
                name="description"
                rows="5"
                required
                class="block w-full rounded-lg border border-gray-200 px-3 py-2 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
              >{{ $product->description }}</textarea>
              @error('description')
                <div class="text-sm text-red-500 mt-1">{{ $message }}</div>
              @enderror
            </div>

            {{-- Price --}}
            <div class="sm:col-span-3">
              <label for="price" class="mt-2.5 inline-block text-sm font-medium text-gray-500">
                Price
              </label>
            </div>
            <div class="sm:col-span-9">
              <input
                id="price"
                name="price"
                type="number"
                value="{{ $product->price }}"
                required
                class="block w-full rounded-lg border border-gray-200 px-3 py-2 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
              >
              @error('price')
                <div class="text-sm text-red-500 mt-1">{{ $message }}</div>
              @enderror
            </div>

            {{-- Stock --}}
            <div class="sm:col-span-3">
              <label for="stock" class="mt-2.5 inline-block text-sm font-medium text-gray-500">
                Stock
              </label>
            </div>
            <div class="sm:col-span-9">
              <input
                id="stock"
                name="stock"
                type="number"
                value="{{ $product->stock }}"
                required
                class="block w-full rounded-lg border border-gray-200 px-3 py-2 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
              >
              @error('stock')
                <div class="text-sm text-red-500 mt-1">{{ $message }}</div>
              @enderror
            </div>

            {{-- Image --}}
            <div class="sm:col-span-3">
              <label for="image" class="mt-2.5 inline-block text-sm font-medium text-gray-500">
                Image
              </label>
            </div>
            <div class="sm:col-span-9" x-data="{ imagePreview: '{{ asset('storage/' . $product->image_path) }}' }">
              <input
                type="file"
                name="image"
                id="image"
                @change="imagePreview = URL.createObjectURL($event.target.files[0])"
                class="block w-full rounded-lg border border-gray-200 shadow-sm file:me-4 file:border-0 file:bg-gray-50 file:px-4 file:py-2 focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
              >

              <div class="mt-3">
                <p class="mb-1 text-sm text-gray-500">Preview:</p>
                <img
                  :src="imagePreview"
                  alt="Preview"
                  class="h-32 w-32 rounded-md border border-gray-200 object-cover shadow-sm"
                >
              </div>

              @error('image')
                <div class="text-sm text-red-500 mt-1">{{ $message }}</div>
              @enderror
            </div>
          </div>

          <div class="mt-5 flex justify-end gap-x-2 px-5 py-8">
            <a
              href="{{ route('products.index') }}"
              class="inline-flex items-center gap-x-2 rounded-lg border border-gray-200 bg-white px-3 py-2 text-sm font-medium text-gray-800 hover:bg-gray-50 focus:outline-hidden"
            >
              Cancel
            </a>
            <button
              type="submit"
              class="inline-flex items-center gap-x-2 rounded-lg border border-transparent bg-blue-600 px-3 py-2 text-sm font-medium text-white hover:bg-blue-700 focus:bg-blue-700 focus:outline-hidden"
            >
              Update Product
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</x-app-layout>
