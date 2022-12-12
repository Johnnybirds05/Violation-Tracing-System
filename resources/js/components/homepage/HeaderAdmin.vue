<template>
    
    <div class="container">
        <div class="container text-center head-home">
            <a class="btn btn-dark pe-3 px-3 button-admin" href="/" role="button">Back</a>

            <div class="img">
                <img src="../../../pics/logo.png" alt="vavts" class="logo">
            </div>

            <div class="appname mt-3">
                <h2><b>Vehicle Assistant and Violation Tracing System</b> </h2>
                <span class="logonote">Making your travel in Tangub City easier!</span>
            </div>

        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>

<style scoped>
.button-admin{
    position: absolute;
    color: aliceblue;
    top: 50px;
    right: 50px;
    font-family: monospace;
}
</style>