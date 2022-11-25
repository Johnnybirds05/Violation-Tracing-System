<template>
    
    <div class="container">
        <div class="container text-center head-home">

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

<style>
.logo{
    width: 250px;
    color: rgb(175, 175, 175);
}
.appname{
    color: rgb(175, 175, 175);
    font-family:monospace;
}
.logonote{
    font-size: 15px;
}
@media only screen and (max-width: 1000px){
    .logonote{
        font-size:11px;
    }
    .logo{
    width: 200px;
    }
}
</style>