<template>
    <div class="container-fluid LoginHeader">
      <img src="../../../pics/logo.png" class="LoginLogo mx-4 m-1"> 
      <a class="btn btn-dark text-right buttons pe-3 px-3" href="/admins" role="button">Back</a>
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
.LoginLogo{
    width: 180px;
    animation-name: to-left;
    animation-duration: 1s;
    position: relative;
}
.LoginHeader{
    background-color: black;
    opacity: .8;
    color: aliceblue;
    display: flex;
    align-items: center;
    padding: 10px;

}
.buttons{
    margin-left: auto;
    margin-right: 40px;
    animation-name: to-right;
    animation-duration: 1s;
    position: relative;
}

@media only screen and (max-width: 1000px){
    .buttons{
        margin-right: 20px; 
    }

}
</style>