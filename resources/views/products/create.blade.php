<x-app-layout>
  <x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
      {{ __('Create New Products') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
      <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
        @session('success')
          <div
            class="alert alert-success"
            role="alert"
          > {{ $value }} </div>
        @endsession

        <form
          action="{{ route('products.store') }}"
          enctype="multipart/form-data"
          method="POST"
        >
          @csrf


          <div
            class="grid grid-cols-12 gap-2 border-t border-gray-200 px-5 py-8 first:border-transparent first:pt-0 last:pb-0 sm:gap-4"
          >
            <div class="sm:col-span-3">
              <label
                for="name"
                class="mt-2.5 inline-block text-sm font-medium text-gray-500 dark:text-neutral-500"
              >
                Name
              </label>
            </div>

            <div class="sm:col-span-9">
              <input
                id="name"
                class="shadow-2xs block w-full rounded-lg border border-gray-200 px-3 py-1.5 pe-11 focus:border-blue-500 focus:ring-blue-500 disabled:pointer-events-none disabled:opacity-50 sm:py-2 sm:text-sm"
                name="name"
                type="text"
                value="{{ old('name') }}"
                required
              >
              @error('name')
                <div class="text-sm text-red-500">{{ $message }}</div>
              @enderror
            </div>

            <div class="sm:col-span-3">
              <label
                for="description"
                class="mt-2.5 inline-block text-sm font-medium text-gray-500 dark:text-neutral-500"
              >
                Description
              </label>
            </div>

            <div class="sm:col-span-9">
              <textarea
                id="description"
                class="shadow-2xs block w-full rounded-lg border border-gray-200 px-3 py-1.5 pe-11 focus:border-blue-500 focus:ring-blue-500 disabled:pointer-events-none disabled:opacity-50 sm:py-2 sm:text-sm"
                name="description"
                rows="5"
                required
              >{{ old('description') }}</textarea>
              @error('description')
                <div class="text-sm text-red-500">{{ $message }}</div>
              @enderror
            </div>

            <div class="sm:col-span-3">
              <label
                for="price"
                class="mt-2.5 inline-block text-sm font-medium text-gray-500 dark:text-neutral-500"
              >
                Price
              </label>
            </div>

            <div class="sm:col-span-9">
              <input
                id="price"
                class="shadow-2xs block w-full rounded-lg border border-gray-200 px-3 py-1.5 pe-11 focus:border-blue-500 focus:ring-blue-500 disabled:pointer-events-none disabled:opacity-50 sm:py-2 sm:text-sm"
                name="price"
                type="number"
                value="{{ old('price') }}"
                required
              >
              @error('price')
                <div class="text-sm text-red-500">{{ $message }}</div>
              @enderror
            </div>

            <div class="sm:col-span-3">
              <label
                for="stock"
                class="mt-2.5 inline-block text-sm font-medium text-gray-500 dark:text-neutral-500"
              >
                Stock
              </label>
            </div>

            <div class="sm:col-span-9">
              <input
                id="stock"
                class="shadow-2xs block w-full rounded-lg border border-gray-200 px-3 py-1.5 pe-11 focus:border-blue-500 focus:ring-blue-500 disabled:pointer-events-none disabled:opacity-50 sm:py-2 sm:text-sm"
                name="stock"
                type="number"
                value="{{ old('stock') }}"
                required
              >
              @error('stock')
                <div class="text-sm text-red-500">{{ $message }}</div>
              @enderror
            </div>

            <div class="sm:col-span-3">
              <label
                for="image"
                class="mt-2.5 inline-block text-sm font-medium text-gray-500 dark:text-neutral-500"
              >
                Image
              </label>
            </div>

            <div class="sm:col-span-9">
              <label
                for="image"
                class="sr-only"
              >Image</label>
              <input
                type="file"
                name="image"
                id="image"
                class="block w-full rounded-lg border border-gray-200 shadow-sm file:me-4 file:border-0 file:bg-gray-100 file:bg-gray-50 file:px-4 file:py-2 focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:pointer-events-none disabled:opacity-50 sm:text-sm"
              >
            </div>
          </div>

          <div class="mt-5 flex justify-end gap-x-2 px-5 py-8">
            <a
              href="{{ route('products.index') }}"
              type="button"
              class="shadow-2xs focus:outline-hidden inline-flex items-center gap-x-2 rounded-lg border border-gray-200 bg-white px-3 py-2 text-sm font-medium text-gray-800 hover:bg-gray-50 focus:bg-gray-50 disabled:pointer-events-none disabled:opacity-50"
            >
              Cancel
            </a>
            <button
              type="submit"
              class="focus:outline-hidden inline-flex items-center gap-x-2 rounded-lg border border-transparent bg-blue-600 px-3 py-2 text-sm font-medium text-white hover:bg-blue-700 focus:bg-blue-700"
            >
              Create Product
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</x-app-layout>
