<!-- resources/js/components/ExampleComponent.vue -->
<template>
    <div class="example-component">
        <h1>Hello, Vue.js!</h1>
    </div>
</template>

<script>
export default {
    mounted() {
        console.log("ExampleComponent mounted.");
    },
};
</script>

<style scoped>
.example-component {
    text-align: center;
    margin-top: 50px;
}
</style>
