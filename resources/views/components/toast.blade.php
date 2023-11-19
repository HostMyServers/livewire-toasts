<div
        x-data="toastsHandler()"
        class="fixed inset-0 z-50 flex flex-col items-end justify-start h-screen w-screen mt-4 px-3"
        x-on:toast.window="add($event.detail)"
        style="pointer-events:none"
>
    <template x-for="toast of toasts" :key="toast.id">
        <div
                x-show="visible.includes(toast)"
                x-transition:enter="transition ease-in duration-200"
                x-transition:enter-start="transform opacity-0 translate-y-2"
                x-transition:enter-end="transform opacity-100"
                x-transition:leave="transition ease-out duration-500"
                x-transition:leave-start="transform translate-x-0 opacity-100"
                x-transition:leave-end="transform translate-x-full opacity-0"
                @click="remove(toast.id)"
                style="pointer-events:all"
        >
            <div
                    class="rounded flex items-center justify-center space-x-4 mb-4 mb:mr-6 p-4 w-full mb:w-96 h-16 shadow-lg font-bold text-lg cursor-pointer"
                    :class="{
                        'bg-green-200/90 text-green-700 dark:bg-green-400/90 dark:text-green-950': toast.type === 'success',
                        'bg-blue-100/90 text-blue-700 dark:bg-blue-300/90 dark:text-blue-950': toast.type === 'information',
                        'bg-yellow-100 text-yellow-700 dark:bg-yellow-300/80 dark:text-yellow-950': toast.type === 'warning',
                        'bg-red-200/90 text-red-700 dark:bg-red-500/90 dark:text-red-950': toast.type === 'error',
                    }"
            >
                <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 rounded-lg">
                    <i x-show="toast.type == 'success'" class="ri-checkbox-circle-fill ri-2x text-green-700 dark:text-green-950"></i>

                    <i x-show="toast.type == 'information'" class="ri-information-fill ri-2x text-blue-700 dark:blue-950"></i>

                    <i x-show="toast.type == 'warning'" class="ri-error-warning-fill ri-2x text-yellow-700 dark:yellow-950"></i>

                    <i x-show="toast.type == 'error'" class="ri-error-warning-fill ri-2x text-red-700 dark:text-red-950"></i>
                </div>
                <div class="w-full ml-3 text-sm font-normal" x-text="toast.message"></div>
                <button type="button" class="ml-auto -mx-1.5 -my-1.5  rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 inline-flex items-center justify-center h-8 w-8" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <i class="ri-close-fill"></i>
                </button>
            </div>
        </div>
    </template>
</div>
<script>

    function toastsHandler() {
        return {
            toasts: [],
            visible: [],
            add(toast) {
                if (toast) {
                    toast = toast[0]
                    toast.id = Date.now()
                    this.toasts.push(toast)
                    this.show(toast.id)
                }
            },
            show(id) {
                this.visible.push(this.toasts.find(toast => toast.id == id))
                const timeShown = 4000 * this.visible.length
                setTimeout(() => {
                    this.remove(id)
                }, timeShown)
            },
            remove(id) {
                const toast = this.visible.find(toast => toast.id == id)
                const index = this.visible.indexOf(toast)
                this.visible.splice(index, 1)
            },
        }
    }
</script>

