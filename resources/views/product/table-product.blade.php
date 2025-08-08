 <div class="relative overflow-x-auto mb-5">
     <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
         <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
             <tr>

                 <th scope="col" class="px-6 py-3">
                     Name
                 </th>
                 <th scope="col" class="px-6 py-3">
                     Sku
                 </th>
                 <th scope="col" class="px-6 py-3">
                     Description
                 </th>
                 <th scope="col" class="px-6 py-3">
                     Purchase Price
                 </th>
                 <th scope="col" class="px-6 py-3">
                     Selling Price
                 </th>
                 <th scope="col" class="px-6 py-3">
                     Image
                 </th>
                 <th scope="col" class="px-6 py-3">
                     Minimum Stok
                 </th>
                 <th scope="col" class="px- pu-3">
                     Action
                 </th>
             </tr>
         </thead>
         <tbody>
             @foreach ($Product as $p)
                 <tr class="text-center">
                     <td>{{ $p->name }}</td>
                     <td>{{ $p->sku }}</td>
                     <td>{{ $p->description }}</td>
                     <td>{{ $p->purchase_price }}</td>
                     <td>{{ $p->selling_price }}</td>
                     <td class="py-2 px-3">
                         <img class="w-16" src="{{ asset('storage/' . $p->image) }}" alt="image">
                     </td>
                     <td>{{ $p->minimum_stock }}</td>
                     @if(Auth::user()->role == "Admin")
                     <td class="py-2 flex items-center px-3 gap-3">
                         <form  action="/delete/product/{{ $p->id }}" method="post">
                             @csrf
                             @method('DELETE')
                             <button onclick="return confirm('apakah anda yakin')" class="bg-red-500 px-5 py-2 rounded text-white font-bold" type="submit">DELETE</button>
                         </form>
                         <a class="bg-green-500 px-5 py-2 rounded text-white font-bold" href="/edit/product/{{ $p->id }}">EDIT
                     </td>
                     @endif
                 </tr>
             @endforeach
         </tbody>
     </table>
     {{-- {{ $Product->links('pagination::simple-tailwind') }} --}}
 </div>
