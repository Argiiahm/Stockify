 <div class="relative overflow-x-auto mt-5">
     <h1 class="text-2xl mb-3">Data Product</h1>
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
                     IMinimum Stok
                 </th>
             </tr>
         </thead>
         <tbody>
            @foreach ($Product as $p )
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
               </tr>
            @endforeach
         </tbody>
     </table>
 </div>
