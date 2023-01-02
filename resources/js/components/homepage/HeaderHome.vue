<template>
    
    <div class="containersds">
        <div class="containersds text-center head-home">

            <div class="img">
                <img src="../../../pics/logo.png" alt="vavts" class="logo">
            </div>

            <div class="appname mt-3">
                <h2><b>Vehicle Assistant and Violation Tracing System</b> </h2>
                <div class="logonote">Making your travel in Tangub City easier!</div>
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
.head-home{
    animation-name: to-bottom;
    animation-duration: .5s;
    position: relative;
}
.logo{
    width: 250px;
    color: rgb(175, 175, 175);
}
.appname{
    color: rgb(175, 175, 175);
    font-family:monospace;
    margin-top: 30px;
}
.logonote{
    font-size: 15px;
    text-align: center;
    margin-top: 10px;
}
.containersds{
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
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