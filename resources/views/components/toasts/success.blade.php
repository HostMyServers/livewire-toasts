<div x-show="toast.type == 'success'"
        class="rounded flex items-center justify-center space-x-4 mb-4 mb:mr-6 p-4 w-full mb:w-96 h-16 shadow-lg font-bold text-lg cursor-pointer bg-green-200/90 text-green-700 dark:bg-green-400/90 dark:text-green-950"
>
    <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 rounded-lg">
        <i class="ri-checkbox-circle-fill ri-2x text-green-700 dark:text-green-950"></i>
    </div>
    <div class="w-full ml-3 text-sm font-normal" x-text="toast.message"></div>
    <button type="button" class="ml-auto -mx-1.5 -my-1.5  rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 inline-flex items-center justify-center h-8 w-8" aria-label="Close">
        <span class="sr-only">Close</span>
        <i class="ri-close-fill"></i>
    </button>
</div>