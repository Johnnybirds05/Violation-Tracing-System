<template>
    <v-app>
        <div class="container-fluid">
            <div class="container">
                <slot/>
                <div class="text-center">
                <v-alert type="success" class="text-center"> <b>You are now registered to the System!</b>  <br>
                <v-btn
                class="ma-2"
                :loading="loading"
                :disabled="loading"
                color="primary"
                @click="ToggleAlert()"
                >
                proceed
                </v-btn>
            
            </v-alert>
            </div>
            </div>

            
            
        </div>
    </v-app>
    

</template>

<script>
    export default {
        props: ['ToggleAlert']
    }
</script>

<style lang="scss" scoped>
.container-fluid{
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    height: 100%;
    z-index: 99;
    animation-name: crop;
    animation-duration: 1s;
    background-color: rgba(41, 41, 41, 0.2);

    display: flex;
    justify-content: center;
    align-items: center;
}

@keyframes crop {
  0%   { transform: scaleX(0.7);}
  50%  {transform: scaleX(1.3);}
  100% {transform: scaleX(1);}
}

</style>