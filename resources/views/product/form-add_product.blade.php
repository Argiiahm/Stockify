 <div id="static-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
     class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
     <div class="relative p-4 w-full max-w-2xl max-h-full">
         <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
             <div
                 class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                 <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                     Add Product
                 </h3>
                 <button type="button"
                     class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                     data-modal-hide="static-modal">
                     <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                         viewBox="0 0 14 14">
                         <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                             d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                     </svg>
                     <span class="sr-only">Close modal</span>
                 </button>
             </div>

             <div class="p-4 md:p-5 space-y-4">
                 <form action="/product/store" class="max-w-md mx-auto" method="POST" enctype="multipart/form-data">
                     @csrf
                     <div class="relative z-0 w-full mb-5 group">
                         <input type="text" name="name" id="name"
                             class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                             placeholder="Name" required />
                     </div>
                     
                     <select id="suppliers" name="supplier_id"
                         class="bg-gray-50 border border-gray-300 text-gray-900 mb-5 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                         <option value="" selected disabled>Suppliers</option>
                         @foreach ($Suppliers as $s)
                             <option value="{{ $s->id }}">{{ $s->name }}</option>
                         @endforeach
                     </select>

                     <select id="" name="category_id"   
                         class="bg-gray-50 border border-gray-300 mb-5 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                         <option value="" selected disabled>Category</option>
                         @foreach ($Categories as $c)
                             <option value="{{ $c->id }}">{{ $c->name }}</option>
                         @endforeach
                     </select>
                     
                     <div class="relative z-0 w-full mb-5 group">
                         <input type="text" name="sku" id=""
                             class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                             placeholder="Sku" required />
                     </div>
                     <div class="relative z-0 w-full mb-5 group">
                         <input type="text" name="description" id="description"
                             class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                             placeholder="Description" required />
                     </div>
                     <div class="grid md:grid-cols-2 md:gap-6">
                         <div class="relative z-0 w-full mb-5 group">
                             <input type="number" name="purchase_price" id="purchase_price"
                                 class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                 placeholder="Purchase Price" required />

                         </div>
                         <div class="relative z-0 w-full mb-5 group">
                             <input type="number" name="selling_price" id="selling_price"
                                 class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                 placeholder="Selling Price" required />
                         </div>
                     </div>
                     <div class="grid md:grid-cols-2 md:gap-6">
                         <div class="relative z-0 w-full mb-5 group">
                             <input type="file" name="image" id="image"
                                 class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                 placeholder="Image" />
                         </div>
                         <div class="relative z-0 w-full mb-5 group">
                             <input type="number" name="minimum_stock" id="minimum_stock"
                                 class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                 placeholder="Minimum Stock" required />
                         </div>
                     </div>
                     <button type="submit"
                         class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan</button>
                 </form>

             </div>

         </div>
     </div>
 </div>
