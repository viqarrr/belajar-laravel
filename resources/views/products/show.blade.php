<x-app-layout>
  <x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
      {{ __('Product Detail') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="mx-auto mb-4 max-w-2xl rounded bg-white px-8 pb-8 pt-6 shadow-md">
      <div class="mb-6 flex items-center justify-between">
        <h1 class="text-2xl font-bold text-gray-800">{{ $product->name }}</h1>
        <div class="flex space-x-2">
          <a
            href="{{ route('products.edit', $product->id) }}"
            class="text-green-500 hover:text-green-700"
          >Edit</a>
          <form
            action="{{ route('products.destroy', $product->id) }}"
            method="POST"
            onsubmit="return confirm('Are you sure?')"
          >
            @csrf
            @method('DELETE')
            <button
              type="submit"
              class="text-red-500 hover:text-red-700"
            >Delete</button>
          </form>
        </div>
      </div>

      <div>
        <img
          src="{{ asset('storage/' . $product->image_path) }}"
          alt="{{ $product->name }}"
        >
        <p class="text-xl font-medium text-gray-600">{{ $product->description }}</p>
        <p class="text-lg font-normal text-gray-500">Price: Rp
          {{ number_format($product->price, 0, ',', '.') }}</p>
        <p class="text-lg font-normal text-gray-500">Stock: {{ $product->stock }}</p>
      </div>

      <div class="mt-6">
        <a
          href="{{ route('products.index') }}"
          class="text-blue-500 hover:text-blue-700"
        >← Back to all products</a>
      </div>
    </div>
  </div>
</x-app-layout>
