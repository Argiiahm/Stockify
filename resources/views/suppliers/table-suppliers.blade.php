 <div class="relative overflow-x-auto mt-5">
     <h1 class="text-2xl mb-3">Data Suppliers</h1>
     <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
         <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
             <tr>
                 <th scope="col" class="px-6 py-3">
                     Name
                 </th>
                 <th scope="col" class="px-6 py-3">
                     Address
                 </th>
                 <th scope="col" class="px-6 py-3">
                     Phone
                 </th>
                 <th scope="col" class="px-6 py-3">
                     Email
                 </th>
                 <th scope="col" class="px-6 py-3">
                     Action
                 </th>
             </tr>
         </thead>
         <tbody class="">
             @foreach ($Suppliers as $s)
                 <tr class="">
                     <td class="">{{ Str::limit($s->name, 7) }}</td>
                     <td class="">{{ Str::limit($s->address, 5) }}</td>
                     <td class="">{{ Str::limit(Str::mask($s->phone, '*', 10), 20) }}</td>
                     <td class="">{{ Str::limit(Str::mask($s->email, '*', 9), 7) }}</td>
                     <td class="flex items-center gap-2 py-2">
                         <form action="/suppliers/{{ $s->id }}" method="POST">
                             @csrf
                             @method('DELETE')
                             <button onclick="return confirm('Apakah Anda Yakin?')" type="submit"
                                 class="hover:underline bg-red-500 hover:bg-orange-150 text-white font-bold py-1 px-3 rounded">Delete</button>
                         </form>
                         <a href="/suppliers/edit/{{ $s->id }}"
                             class="hover:underline bg-green-500 hover:bg-orange-150 text-white font-bold py-1 px-6 rounded">Edit</a>
                     </td>
                 </tr>
             @endforeach
         </tbody>
     </table>
 </div>
