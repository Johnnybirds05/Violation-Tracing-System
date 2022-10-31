<template>
    
    <div class="container">
        .<div class="container text-center headhome">
            <div class="img">
                <img src="../../pics/logo.png" alt="vavts" class="logo">
            </div>
            <div class="appname mt-3">
                <h2 class="logoname"><b>Vehicle Assistant and Violation Tracing System</b> </h2>
                <span class="logonote">Making your travel in Tangub City easier!</span>
            </div>
        </div>
        <div class="container-md body bg-light justify-center align-content-center">
            <div class="row">
                <div class="col px-4">

                    he
                </div>
                <div class="col px-4">
                    he
                </div>
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
    width: 200px;
    top: -10cm;
    color: rgb(175, 175, 175);
}
.appname{
    color: rgb(175, 175, 175);
    font-family:monospace;
}
.logonote{
    font-size: 11px;
}
.logoname{
    font: size 20px;
}

@media only screen and (min-width: 1000px){
    .logonote{
        font-size:15px;
    }
    .logo{
    width: 250px;
    top: -10cm;
    color: rgb(175, 175, 175);
    }
}
</style>