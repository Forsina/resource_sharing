<template>
    <button :class="classes" @click="subscribe">Претплати се</button>
</template>

<script>
    export default {
        props: ['active'],
        data() {
            return {
                isActive: this.active,
            }
        },
        computed: {
            classes() {
                return ['btn', this.isActive ? 'btn-primary' : 'btn-link'];
            }
        },
        methods: {
            subscribe() {
                axios[
                    (this.isActive ? 'delete' : 'post')
                ](location.pathname + '/subscriptions');
                this.isActive = ! this.isActive;
            }
        }
    }
</script>