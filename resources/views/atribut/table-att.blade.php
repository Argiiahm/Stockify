 <div class="flex gap-20">
            @include('categories.table-categories')
            <div class="relative overflow-x-auto mt-5">
                <h1 class="text-2xl mb-3">Attributes</h1>
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Name
                            </th>

                            <th scope="col" class="px-6 py-3">
                                Product Name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Values
                            </th>
                            <th scope="col" class="px-20 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($Attribute as $c)
                            <tr class="text-center">
                                <td class="py-2">{{ $c->name }}</td>
                                <td>{{ $c->product->name }}</td>
                                <td>{{ $c->value }}</td>
                                <td class="flex items-center gap-2 py-2 justify-center">
                                    <form action="/attribute/delete/{{ $c->id }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="return confirm('Apakah Anda Yakin?')" type="submit"
                                            class="hover:underline bg-red-500 hover:bg-orange-150 text-white font-bold py-1 px-3 rounded">Delete</button>
                                    </form>
                                    <a class="bg-green-500 hover:bg-orange-600 text-white font-bold py-1 px-6 rounded"
                                        href="/attribute/edit/{{ $c->id }}">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>