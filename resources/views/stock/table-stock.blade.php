 <div class="relative overflow-x-auto my-5 p-4 sm:ml-64">
     <h1 class="text-2xl my-3">Data Product</h1>
     <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
         <thead class="text-xs text-center text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
             <tr>
                 <th scope="col" class="px-6 py-3">
                     Name
                 </th>
                 <th scope="col" class="px-6 py-3">
                     Type
                 </th>
                 <th scope="col" class="px-6 py-3">
                     quantity
                 </th>
                 <th scope="col" class="px-6 py-3">
                     date
                 </th>
                 <th scope="col" class="px-6 py-3">
                     note
                 </th>
                 <th scope="col" class="px-6 py-3">
                     Action
                 </th>
             </tr>
         </thead>
         <tbody>
             @foreach ($stock as $p)
             @if ($p->status === 'pending')
                 <tr class="text-center">
                     <td>{{ $p->product->name }}</td>
                     <td>{{ $p->type }}</td>
                     <td>{{ $p->quantity }}</td>
                     <td>{{ $p->date }}</td>
                     <td>{{ $p->note }}</td>
                     <td class="py-4">
                         <div class="flex gap-2">
                                 <form action="/stock/ubahstatus/{{ $p->id }}" method="POST">
                                     @csrf
                                     @method('PUT')
                                     <input type="hidden" name="status" value="diterima">
                                     <button onclick="return confirm('Terima barang ini?')"
                                         class="text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-4 py-2 text-center shadow-md">
                                         Terima
                                     </button>
                                 </form>

                                 <form action="/stock/ubahstatus/{{ $p->id }}" method="POST">
                                     @csrf
                                     @method('PUT')
                                     <input type="hidden" name="status" value="ditolak">
                                     <button onclick="return confirm('Tolak barang ini?')"
                                         class="text-white bg-yellow-400 hover:bg-yellow-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2 text-center shadow-md">
                                         Tolak
                                     </button>
                                 </form>
                             @endif
                         </div>
                     </td>
             @endforeach
         </tbody>
     </table>
 </div>
