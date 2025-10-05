<x-app-layout>
  <x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
      {{ __('Products') }}
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

        <div class="mb-6 flex flex-col">
          <div class="flex items-center justify-between border-gray-200 px-6 py-4">
            <div class="sm:col-span-1">
              <form
                method="GET"
                action="{{ route('products.index') }}"
              >
                <label
                  for="search"
                  class="sr-only"
                >Search</label>
                <div class="relative">
                  <input
                    type="text"
                    id="search"
                    name="search"
                    value="{{ request('search') }}"
                    class="block w-full rounded-lg border border-gray-200 px-3 py-2 ps-11 text-sm focus:border-blue-500 focus:ring-blue-500 disabled:pointer-events-none disabled:opacity-50"
                    placeholder="Search products..."
                  >
                  <div class="pointer-events-none absolute inset-y-0 start-0 flex items-center ps-4">
                    <svg
                      class="size-4 shrink-0 text-gray-400"
                      xmlns="http://www.w3.org/2000/svg"
                      width="24"
                      height="24"
                      viewBox="0 0 24 24"
                      fill="none"
                      stroke="currentColor"
                      stroke-width="2"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    >
                      <circle
                        cx="11"
                        cy="11"
                        r="8"
                      />
                      <path d="m21 21-4.3-4.3" />
                    </svg>
                  </div>
                </div>
              </form>
            </div>

            <a
              href="{{ route('products.create') }}"
              class="inline-flex items-center gap-x-2 rounded-lg border border-transparent bg-blue-600 px-3 py-2 text-sm font-medium text-white hover:bg-blue-700 focus:bg-blue-700 focus:outline-hidden"
            >
              Create New Product
            </a>
          </div>


          <table class="min-w-full bg-white">
            <thead>
              <tr>
                <th
                  class="border-b border-gray-200 bg-gray-50 px-4 py-2 text-left text-xs font-semibold uppercase tracking-wider text-gray-600"
                >Product Name</th>
                <th
                  class="border-b border-gray-200 bg-gray-50 px-4 py-2 text-left text-xs font-semibold uppercase tracking-wider text-gray-600"
                >Description</th>
                <th
                  class="border-b border-gray-200 bg-gray-50 px-4 py-2 text-left text-xs font-semibold uppercase tracking-wider text-gray-600"
                >Stock</th>
                <th
                  class="border-b border-gray-200 bg-gray-50 px-4 py-2 text-left text-xs font-semibold uppercase tracking-wider text-gray-600"
                >Price</th>
                <th
                  class="border-b border-gray-200 bg-gray-50 px-4 py-2 text-left text-xs font-semibold uppercase tracking-wider text-gray-600"
                >Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($products as $product)
                <tr>
                  <td class="border-b border-gray-200 px-4 py-2">
                    <div class="flex items-center gap-x-4">
                      <img
                        class="h-10 w-10 rounded-lg object-cover"
                        src="{{ asset('storage/' . $product->image_path) }}"
                        alt="Product Image"
                      >
                      <div>
                        <span class="block text-sm font-semibold text-gray-800">
                          {{ $product->name }}
                        </span>
                      </div>
                    </div>
                  </td>
                  <td class="border-b border-gray-200 px-4 py-2">{{ Str::limit($product->description, 50, '...') }}</td>
                  <td class="border-b border-gray-200 px-4 py-2">{{ $product->stock }}</td>
                  <td class="border-b border-gray-200 px-4 py-2">Rp
                    {{ number_format($product->price, 0, ',', '.') }}</td>
                  <td class="border-b border-gray-200 px-4 py-2">
                    <div class="flex space-x-2">
                      <a
                        href="{{ route('products.show', $product->id) }}"
                        class="text-blue-500 hover:text-blue-700"
                      >View</a>
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
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>

          <div class="mt-4 px-5">
            {{ $products->appends(['search' => request('search')])->links() }}
          </div>
        </div>
      </div>
    </div>
</x-app-layout>
