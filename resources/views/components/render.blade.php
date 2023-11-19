<div
        x-data="toastsHandler()"
        class="fixed inset-0 z-50 flex flex-col items-end justify-start h-screen w-screen mt-4 px-3"
        x-on:toast.window="add($event.detail)"
        style="pointer-events:none"
>
    <template x-for="toast of toasts" :key="toast.id">
        <div
                class="md:pr-2"
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
            <x-toasts::toasts.success />
            <x-toasts::toasts.error />
            <x-toasts::toasts.warning />
            <x-toasts::toasts.information />
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

