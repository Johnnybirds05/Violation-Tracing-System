<template>
    <v-app>
        <div class="container-fluid">
            <div class="container">
                <slot/>
                <div class="text-center">
                <v-alert type="success" class="text-center"> <b>Congratulation you are now registered to the System!</b>  <br>
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
    position: absolute;
    height: 100%;
    z-index: 99;
    animation-name: to-left;
    animation-duration: 1s;
    background-color: black;

    display: flex;
    justify-content: center;
    align-items: center;
    top: 20vh;
    left: 0;
}

</style>