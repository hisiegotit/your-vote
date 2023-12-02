<x-app-layout>
   <div class="filters flex space-x-6">
      <div class="w-1/3">
         <select name="category" id="category" class="w-full rounded-xl border-none px-4 py-2">
            <option value="cate1">Category 1</option>
            <option value="cate2">Category 2</option>
            <option value="cate3">Category 3</option>
            <option value="cate4">Category 4</option>
         </select>
      </div>
      <div class="w-1/3">
         <select name="other_filters" id="other_filters" class="w-full rounded-xl border-none px-4 py-2">
            <option value="cate1">Filter 1</option>
            <option value="cate2">Filter 2</option>
            <option value="cate3">Filter 3</option>
            <option value="cate4">Filter 4</option>
         </select>
      </div>
      <div class="w-2/3 relative">
         <input type="search" placeholder="Find idea" class="w-full rounded-xl bg-white px-4 py-2 pl-8 border-none placeholder-gray-900">
         <div class="absolute top-0 flex items-center h-full ml-2">
            <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 text-gray-600">
               <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
            </svg>
         </div>
      </div>
   </div> <!-- end filters -->

   <div class="ideas-container space-y-6 my-6">
      <div class="idea-container hover:shadow-card transition ease-out duration-150 bg-white rounded-xl flex cursor-pointer">
         <div class="border-r border-gray-100 px-5 py-8">
            <div class="text-center">
               <div class="font-semibold text-2xl">12</div>
               <div class="text-gray-500">Votes</div>
            </div>

            <div class="mt-8">
               <button class="w-20 bg-gray-200 font-bold text-xxs uppercase rounded-xl px-4 py-3 transition ease-in duration-150 hover:bg-light-pink">
                  Vote
               </button>
            </div>
         </div>
         <div class="flex px-2 py-6">
            <a href="" class="flex-none">
               <img src="https://source.unsplash.com/200x200/?face&crop=face&v=1" alt="avatar" class="w-14 h-14 rounded-xl">
            </a>
            <div class="mx-4">
               <h4 class="text-xl font-semibold">
                  <a href="" class="hover:underline">
                     A random title
                  </a>
               </h4>
               <div class="text-gray-600 mt-3 line-clamp-3">
                  Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quaerat quis magnam laudantium amet excepturi temporibus architecto quidem non deleniti, doloribus culpa ullam aperiam inventore nihil praesentium nam saepe accusantium quod nobis dolore, illo fugiat. Ratione voluptatibus ducimus cum. Eum debitis aperiam doloremque consequuntur perferendis veniam eius, libero eaque saepe numquam.
               </div>
               <div class="flex items-center justify-between mt-6">
                  <div class="flex items-center text-xs text-gray-400 font-semibold space-x-2">
                     <div>10 hours ago</div>
                     <div>&bull;</div>
                     <div>Category 1</div>
                     <div>&bull;</div>
                     <div class="text-gray-800">3 comments</div>
                     <div>&bull;</div>
                  </div>
                  <div class="flex items-center space-x-2">
                     <div class="bg-gray-200 text-xxs font-bold uppercase leading-none rounded-full text-center w-28 h-7 py-2 px-4">Open</div>
                  </div>
                  <button class="relative text-left bg-gray-100 hover:bg-gray-200 rounded-full h-7">
                     <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 18.75a.75.75 0 110-1.5.75.75 0 010 1.5z" />
                     </svg>
                     <ul class="absolute w-38 font-semibold bg-white shadow-dialog rounded-xl py-3 ml-4">
                        <li><a href="#" class="hover:bg-gray-100 block transition ease-in duration-150 px-5 py-3">Mark as spam</a></li>
                        <li><a href="#" class="hover:bg-gray-100 block transition ease-in duration-150 px-5 py-3">Delete post</a></li>
                     </ul>
                  </button>
               </div>
            </div>
         </div>
      </div> <!-- end idea-container -->
   </div> <!-- end ideas-container -->
</x-app-layout>