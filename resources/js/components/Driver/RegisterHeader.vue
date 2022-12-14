<template>
    <div class="container-fluid LoginHeader">
        <img src="../../../pics/logo.png" class="LoginLogo mx-4 m-1"> 
        <div class="driver-buttons">       
            <a class="btn btn-dark text-right pe-3 px-3 m-1" href="/driver-login" role="button">Login</a>
            <a class="btn btn-dark text-right pe-3 px-3" href="/" role="button">Back</a>
        </div>
    </div>
    
</template>

<script>
    export default {
    }
</script>

<style scoped>
    .driver-buttons{
      position: absolute;
      right: 50px;
      animation-name: to-right;
      animation-duration: 1s;
    }
</style>