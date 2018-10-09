<template>
    <div id="alert" :class="typeColor">
        <!-- <strong class="font-semibold">{{ type || 'Info' }}:</strong> -->
        <span class="block sm:inline">
            <slot>I'm an example message!</slot>
        </span>
        <button v-if="clsbtn == 'true'" class="absolute pin-t pin-b pin-r px-3 py-3" @click="dismissAlert">
            <svg class="fill-current h-4 w-4 text-grey-darker" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/>
            </svg>
        </button>
    </div>
</template>

<script>
export default {
    props: ['type', 'clsbtn'],
    computed: {
        typeColor() {
            let color;

            switch(this.type) {
                case 'Success':
                    color = 'border-l-4 bg-green-lightest border-green text-green-dark text-sm px-3 py-3 mb-4 rounded relative'
                    break;
                case 'Error':
                    color = 'border-l-4 bg-red-lightest border-red text-red-dark text-sm px-3 py-3 mb-4 rounded relative'
                    break;
                case 'Info':
                    color = 'border-l-4 bg-blue-lightest border-blue text-blue-dark text-sm px-3 py-3 mb-4 rounded relative'
                    break;
                case 'Warning':
                    color = 'border-l-4 bg-orange-lightest border-orange text-orange-dark text-sm px-3 py-3 mb-4 rounded relative'
                    break;
                default:
                    color = 'border-l-4 bg-blue-lightest border-blue text-blue-dark text-sm px-3 py-3 mb-4 rounded relative'
            }

            return color;
        }
    },
    methods: {
        dismissAlert() {
            var al = document.querySelector('#alert');
            if (al.style.display === 'none') {
                al.style.display = 'block';
            } else {
                al.style.display = 'none';
            }
        }
    }
}
</script>
