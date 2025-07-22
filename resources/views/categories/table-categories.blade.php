 <div class="relative overflow-x-auto mt-5">
     <h1 class="text-2xl">Data Categories</h1>
     <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
         <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
             <tr>
                 <th scope="col" class="px-6 py-3">
                     Name
                 </th>

                 <th scope="col" class="px-6 py-3">
                     Description
                 </th>
                 <th scope="col" class="px-10 py-3">
                     Action
                 </th>
             </tr>
         </thead>
         <tbody>
             @foreach ($Categories as $c)
                 <tr>
                     <td class="py-2">{{ $c->name }}</td>
                     <td>{{ $c->description }}</td>
                     <td class="flex items-center gap-2 py-2">
                         <form action="/category/{{ $c->id }}" method="POST">
                             @csrf
                             @method('DELETE')
                             <button onclick="return confirm('Apakah Anda Yakin?')" type="submit"
                                 class="hover:underline bg-red-500 hover:bg-orange-150 text-white font-bold py-1 px-3 rounded">Delete</button>
                         </form>
                            <a class="bg-green-500 hover:bg-orange-600 text-white font-bold py-1 px-6 rounded" href="/category/edit/{{ $c->id }}">Edit</a>
                     </td>
                 </tr>
             @endforeach
         </tbody>
     </table>
 </div>
