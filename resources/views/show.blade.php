<x-app-layout>
   <div>
      <a href="/" class="flex items-center font-semibold hover:underline">
         <svg viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
            <path fill-rule="evenodd" d="M7.72 12.53a.75.75 0 010-1.06l7.5-7.5a.75.75 0 111.06 1.06L9.31 12l6.97 6.97a.75.75 0 11-1.06 1.06l-7.5-7.5z" clip-rule="evenodd" />
          </svg>
          
         <span class="ml-2"> All idea</span>
      </a>
   </div>

   <div class="idea-container shadow-sm bg-white rounded-xl flex mt-4">
      <div class="flex flex-1 px-4 py-4">
         <div class="flex-none">
            <a href="#">
               <img src="https://source.unsplash.com/200x200/?face&crop=face&v=1" alt="avatar" class="w-14 h-14 rounded-xl">
            </a>
         </div>
         <div class="w-full mx-4">
            <h4 class="text-xl font-semibold">
               <a href="" class="hover:underline">
                  A random title
               </a>
            </h4>
            <div class="text-gray-600 mt-3">
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Accusamus hic impedit maxime, iste non quisquam commodi cum possimus asperiores laudantium voluptatum mollitia natus, rerum autem libero voluptatibus quis ullam obcaecati! Quas repellat quia dicta unde? Voluptatem sit accusamus omnis enim exercitationem facere explicabo nobis odio dolorum commodi tempore suscipit reiciendis ea consequuntur sapiente, nesciunt, non ad natus est quis? Enim deserunt nisi velit sed fugit ipsa est accusantium dolores neque? Autem repellendus exercitationem voluptatibus tempore ipsam aliquam recusandae laudantium ut rerum soluta impedit officiis eum quis tenetur vitae quas officia, fugiat culpa. Fugit id perspiciatis optio adipisci natus consectetur quasi.
            </div>
            <div class="flex items-center justify-between mt-6">
               <div class="flex items-center text-xs text-gray-400 font-semibold space-x-2">
                  <div class="font-bold text-gray-800">Author</div>
                  <div>&bull;</div>
                  <div>10 hours ago</div>
                  <div>&bull;</div>
                  <div>Category 1</div>
                  <div>&bull;</div>
                  <div class="text-gray-800">3 comments</div>
               </div>
               <div class="flex items-center space-x-2">
                  <div class="bg-gray-200 text-xxs font-bold uppercase leading-none rounded-full text-center w-28 h-7 py-2 px-4">Open</div>
               </div>
               <button class="relative text-left border border-gray-100 transition duration-150 hover:border-gray-400 bg-gray-100 hover:bg-gray-200 rounded-full h-7">
                  <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                     <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 18.75a.75.75 0 110-1.5.75.75 0 010 1.5z" />
                  </svg>
                  <ul class="absolute w-38 font-semibold bg-white shadow-dialog rounded-xl py-3 ml-4 hidden">
                     <li><a href="#" class="hover:bg-gray-100 block transition ease-in duration-150 px-5 py-3">Mark as spam</a></li>
                     <li><a href="#" class="hover:bg-gray-100 block transition ease-in duration-150 px-5 py-3">Delete post</a></li>
                  </ul>
               </button>
            </div>
         </div>
      </div>
   </div> <!-- end idea-container -->

   <div class="buttons-container flex items-center justify-between mt-6">
      <div class="flex items-center space-x-4 ml-6">
         <button type="button" class="flex items-center justify-center h-11 w-32 text-xs text-white bg-pink font-semibold rounded-xl border border-pink hover:border-strong-pink transition duration-150 ease-in px-6 py-3">
            <svg viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
               <path fill-rule="evenodd" d="M4.804 21.644A6.707 6.707 0 006 21.75a6.721 6.721 0 003.583-1.029c.774.182 1.584.279 2.417.279 5.322 0 9.75-3.97 9.75-9 0-5.03-4.428-9-9.75-9s-9.75 3.97-9.75 9c0 2.409 1.025 4.587 2.674 6.192.232.226.277.428.254.543a3.73 3.73 0 01-.814 1.686.75.75 0 00.44 1.223zM8.25 10.875a1.125 1.125 0 100 2.25 1.125 1.125 0 000-2.25zM10.875 12a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0zm4.875-1.125a1.125 1.125 0 100 2.25 1.125 1.125 0 000-2.25z" clip-rule="evenodd" />
            </svg>        
            <span class="ml-1"> Reply</span>
         </button>
   
         <button type="button" class="flex items-center justify-center h-11 text-xs bg-gray-200 font-semibold rounded-xl border border-gray-200 hover:border-gray-400 transition duration-150 ease-in px-6 py-3">
            <span class="mr-1"> Set Status</span>
            <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
               <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
             </svg>
                    
         </button>
      </div>
      <div class="flex items-center space-x-4 ml-6">
         <div class="bg-white font-semibold text-center rounded-xl px-3 py-2">
            <div class="text-xl leading-snug">12</div>
            <div class="text-gray-400 text-xs leading-none">Votes</div>
         </div>
         <button type="button" class="w-32 h-11 text-xs bg-gray-200 font-semibold rounded-xl border border-gray-200 uppercase hover:border-strong-pink hover:bg-pink hover:text-white transition duration-150 ease-in px-6 py-3">
            <span>Vote</span>
         </button>
      </div>
   </div>

   <div class="comments-container relative space-y-6 ml-22 my-8">
      <div class="comment-container shadow-sm bg-white rounded-xl flex mt-4">
         <div class="flex flex-1 px-4 py-4">
            <div class="flex-none">
               <a href="#">
                  <img src="https://source.unsplash.com/200x200/?face&crop=face&v=2" alt="avatar" class="w-14 h-14 rounded-xl">
               </a>
            </div>
            <div class="w-full mx-4">
               <div class="text-gray-600 mt-3 line-clamp-3">
               Lorem, ipsum dolor sit amet consectetur adipisicing elit. Tempore, delectus.
               </div>
               <div class="flex items-center justify-between mt-6">
                  <div class="flex items-center text-xs text-gray-400 font-semibold space-x-2">
                     <div class="font-bold text-gray-800">Author</div>
                     <div>&bull;</div>
                     <div>10 hours ago</div>
                  </div>
                  <button class="relative text-left border border-gray-100 transition duration-150 hover:border-gray-400 bg-gray-100 hover:bg-gray-200 rounded-full h-7">
                     <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 18.75a.75.75 0 110-1.5.75.75 0 010 1.5z" />
                     </svg>
                     <ul class="absolute w-38 font-semibold bg-white shadow-dialog rounded-xl py-3 ml-4 hidden">
                        <li><a href="#" class="hover:bg-gray-100 block transition ease-in duration-150 px-5 py-3">Mark as spam</a></li>
                        <li><a href="#" class="hover:bg-gray-100 block transition ease-in duration-150 px-5 py-3">Delete post</a></li>
                     </ul>
                  </button>
               </div>
            </div>
         </div>
      </div> <!-- end comment-container -->
      <div class="comment-container shadow-sm bg-white rounded-xl flex mt-4">
         <div class="flex flex-1 px-4 py-4">
            
            <div class="flex-none">
               <a href="#">
                  <img src="https://source.unsplash.com/200x200/?face&crop=face&v=3" alt="avatar" class="w-14 h-14 rounded-xl">
               </a>
               <div class="text-center uppercase text-xxs mt-1 font-bold text-strong-pink">
                  Admin
               </div>
            </div>
            <div class="w-full mx-4">
               <h4 class="text-xl font-semibold">
                  <a href="" class="hover:underline">
                     Status changed to "Under consideration"
                  </a>
               </h4>
               <div class="text-gray-600 mt-3 line-clamp-3">
               Lorem, ipsum dolor sit amet consectetur adipisicing elit. Tempore, delectus.
               </div>
               <div class="flex items-center justify-between mt-6">
                  <div class="flex items-center text-xs text-gray-400 font-semibold space-x-2">
                     <div class="font-bold text-pink">Admin</div>
                     <div>&bull;</div>
                     <div>10 hours ago</div>
                  </div>
                  <button class="relative text-left border border-gray-100 transition duration-150 hover:border-gray-400 bg-gray-100 hover:bg-gray-200 rounded-full h-7">
                     <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 18.75a.75.75 0 110-1.5.75.75 0 010 1.5z" />
                     </svg>
                     <ul class="absolute w-38 font-semibold bg-white shadow-dialog rounded-xl py-3 ml-4 hidden">
                        <li><a href="#" class="hover:bg-gray-100 block transition ease-in duration-150 px-5 py-3">Mark as spam</a></li>
                        <li><a href="#" class="hover:bg-gray-100 block transition ease-in duration-150 px-5 py-3">Delete post</a></li>
                     </ul>
                  </button>
               </div>
            </div>
         </div>
      </div> <!-- end comment-container -->
      <div class="comment-container shadow-sm bg-white rounded-xl flex mt-4">
         <div class="flex flex-1 px-4 py-4">
            <div class="flex-none">
               <a href="#">
                  <img src="https://source.unsplash.com/200x200/?face&crop=face&v=2" alt="avatar" class="w-14 h-14 rounded-xl">
               </a>
            </div>
            <div class="w-full mx-4">
               <div class="text-gray-600 mt-3 line-clamp-3">
               Lorem, ipsum dolor sit amet consectetur adipisicing elit. Tempore, delectus.
               </div>
               <div class="flex items-center justify-between mt-6">
                  <div class="flex items-center text-xs text-gray-400 font-semibold space-x-2">
                     <div class="font-bold text-gray-800">Author</div>
                     <div>&bull;</div>
                     <div>10 hours ago</div>
                  </div>
                  <button class="relative text-left border border-gray-100 transition duration-150 hover:border-gray-400 bg-gray-100 hover:bg-gray-200 rounded-full h-7">
                     <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 18.75a.75.75 0 110-1.5.75.75 0 010 1.5z" />
                     </svg>
                     <ul class="absolute w-38 font-semibold bg-white shadow-dialog rounded-xl py-3 ml-4 hidden">
                        <li><a href="#" class="hover:bg-gray-100 block transition ease-in duration-150 px-5 py-3">Mark as spam</a></li>
                        <li><a href="#" class="hover:bg-gray-100 block transition ease-in duration-150 px-5 py-3">Delete post</a></li>
                     </ul>
                  </button>
               </div>
            </div>
         </div>
      </div> <!-- end comment-container -->
   </div> <!-- end comments-container -->
</x-app-layout>