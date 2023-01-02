<template>
    <div class="container-fluid LoginHeader">
      <img src="../../../pics/logo.png" class="LoginLogo mx-4 m-1"> 
      <a class="btn text-right buttons pe-3 px-3" href="/admins" role="button">
                <button class="button-back">
                    <svg height="16" width="16" xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 1024 1024"><path d="M874.690416 495.52477c0 11.2973-9.168824 20.466124-20.466124 20.466124l-604.773963 0 188.083679 188.083679c7.992021 7.992021 7.992021 20.947078 0 28.939099-4.001127 3.990894-9.240455 5.996574-14.46955 5.996574-5.239328 0-10.478655-1.995447-14.479783-5.996574l-223.00912-223.00912c-3.837398-3.837398-5.996574-9.046027-5.996574-14.46955 0-5.433756 2.159176-10.632151 5.996574-14.46955l223.019353-223.029586c7.992021-7.992021 20.957311-7.992021 28.949332 0 7.992021 8.002254 7.992021 20.957311 0 28.949332l-188.073446 188.073446 604.753497 0C865.521592 475.058646 874.690416 484.217237 874.690416 495.52477z"></path></svg>
                    <b>Back</b>
                </button>
      </a>
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
    background-color: rgb(15, 15, 15);
    opacity: .9;
    color: aliceblue;
    display: flex;
    align-items: center;
    padding: 10px;

}
.buttons{
    margin-left: auto;
    margin-right: 40px;
    animation-name: to-right;
    animation-duration: .5s;
    position: relative;
}
.button-back {
 display: flex;
 height: 3em;
 width: 100px;
 align-items: center;
 justify-content: center;
 border-radius: 3px;
 letter-spacing: 1px;
 transition: all 0.2s linear;
 cursor: pointer;
 border: 2px solid rgb(173, 173, 173);
 background: linear-gradient(to right, #585858, #1f1f1f, #0c0c0c);
 color: #d1d1d1;
 font-size: 12px;
}

.button-back > svg {
 font-size: 20px;
 transition: all 0.4s ease-in;
}

.button-back:hover > svg {
 font-size: 1.2em;
 transform: translateX(-5px);
}

.button-back:hover {
 box-shadow: 9px 9px 33px #d1d1d1, -9px -9px 33px #ffffff;
 transform: translateY(-2px);
}
a{
    text-decoration: none;
}
@media only screen and (max-width: 1000px){
    .buttons{
        margin-right: 20px; 
    }

}
</style>