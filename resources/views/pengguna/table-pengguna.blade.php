 <div class="relative overflow-x-auto mt-5">
     <div class="bg-gray-800 text-white text-center text-2xl font-semibold py-2 rounded my-2">
                Data Users
            </div>
     <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
         <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
             <tr>
                 <th scope="col" class="px-6 py-3">
                     Name
                 </th>
                 <th scope="col" class="px-6 py-3">
                     email
                 </th>
                 <th scope="col" class="px-6 py-3">
                     role
                 </th>
                 <th scope="col" class="px-6 py-3">
                     Action
                 </th>
             </tr>
         </thead>
         <tbody>
             @foreach ($Users as $s)
                 <tr>
                     <td class="px-6 py-4">
                         {{ $s->name }}
                     </td>
                     <td class="px-6 py-4">
                         {{ Str::mask($s->email, '*', 2, 5) }}
                     </td>
                     <td class="px-6 py-4">
                         {{ $s->role }}
                     </td>
                     <td class="px-6 py-4 flex gap-2">
                         <form action="/pengguna/delete/{{ $s->id }}" method="POST">
                             @csrf
                             @method('DELETE')
                             <button onclick="return confirm('Apakah Anda Yakin?')" type="submit"
                                 class="hover:underline bg-red-500 hover:bg-orange-150 text-white font-bold py-1 px-3 rounded">Delete</button>
                         </form>
                         <a href="/pengguna/edit/{{ $s->id }}"
                             class="hover:underline bg-green-500 hover:bg-orange-150 text-white font-bold py-1 px-6 rounded">Edit</a>
                     </td>
                 </tr>
             @endforeach
         </tbody>
     </table>
 </div>
