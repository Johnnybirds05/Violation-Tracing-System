<template>
    <div class="container-fluid LoginHeader">
      <img src="../../../pics/logo.png" class="LoginLogo mx-4 m-1"> 
      <div class="driver-buttons row">       
        <a class="btn text-right col" href="/driver-register" role="button">
                <button class="button-back ml-3">
                    <svg height="16" width="16" xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 1024 1024"><path d="M874.690416 495.52477c0 11.2973-9.168824 20.466124-20.466124 20.466124l-604.773963 0 188.083679 188.083679c7.992021 7.992021 7.992021 20.947078 0 28.939099-4.001127 3.990894-9.240455 5.996574-14.46955 5.996574-5.239328 0-10.478655-1.995447-14.479783-5.996574l-223.00912-223.00912c-3.837398-3.837398-5.996574-9.046027-5.996574-14.46955 0-5.433756 2.159176-10.632151 5.996574-14.46955l223.019353-223.029586c7.992021-7.992021 20.957311-7.992021 28.949332 0 7.992021 8.002254 7.992021 20.957311 0 28.949332l-188.073446 188.073446 604.753497 0C865.521592 475.058646 874.690416 484.217237 874.690416 495.52477z"></path></svg>
                    <b>Register</b>
                </button>
        </a>
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

@media only screen and (max-width: 1000px){
    .LoginLogo{
      width: 100px;
    }
 
}


</style>