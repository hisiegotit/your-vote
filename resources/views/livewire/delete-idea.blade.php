<div
    x-cloak
    x-data="{ isOpen: true }"
    x-show="isOpen"
    @keydown.escape.window="isOpen = false"
    class="relative z-10"
    aria-labelledby="modal-title"
    role="dialog"
    aria-modal="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
  
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
      <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
        <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg border-red border">
          <div class="bg-surface0 px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
            <div class="sm:flex sm:items-start">
              <div class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                <svg class="h-6 w-6 text-red" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                </svg>
              </div>
              <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                <h3 class="text-base font-semibold leading-6 text-white" id="modal-title">Delete idea</h3>
                <div class="mt-2">
                  <p class="text-sm text-text">Are you sure you want to delete this idea? It will be permanently removed.</p>
                </div>
              </div>
            </div>
          </div>
          <div class="bg-surface0 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
            <button type="button" class="inline-flex w-full justify-center rounded-md bg-red px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red sm:ml-3 sm:w-auto border border-red hover:border-surface1 transition duration-150 ease-in">Delete</button>
            <button type="button" class="mt-3 inline-flex w-full justify-center rounded-md px-3 py-2 text-sm font-semibold text-base shadow-sm ring-inset bg-surface1 sm:mt-0 sm:w-auto border text-red border-surface1 hover:border-red transition duration-150 ease-in">Cancel</button>
          </div>
        </div>
      </div>
    </div>
  </div>