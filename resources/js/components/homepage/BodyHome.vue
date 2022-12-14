<template>
    <div class="home-body">
        <div class="card m-5 card-homecol" style="width: 18rem;">
            <img src="../../../pics/3.png" class="card-img-top" alt="...">
            <div class="card-body card-home">
                <h5 class="card-title "><b>Offices</b></h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
            <div class="card-body">
                <a href="#" class="btn btn-dark">Get Started <img src="../../../pics/check.svg"></a>
            </div>
        </div>

        <div class="card m-5 mt-5 card-homecol" style="width: 18rem;">
            <img src="../../../pics/2.png" class="card-img-top" alt="...">
            <div class="card-body card-home">
                <h5 class="card-title"><b>Driver</b></h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
            <div class="card-body">
                <a href="/driver-login" class="btn btn-dark">Get Started <img src="../../../pics/check.svg"></a>
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
.home-body{
    display: flex;
    position: relative;
    justify-content: center;
    align-items: center;
    width: 100%;
}
.card-home{
    position: absolute;
    color: aliceblue;
    margin-top: 60%;
    opacity: .8;
    background-color:rgb(0, 0, 0);
    text-align: justify;
}
.card-homecol{
    background-color:rgb(0, 0, 0) ;
    animation-name: to-right;
    animation-duration: .5s;
    position: relative;
}
.card-title{
    font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
}
.bottoms{
    margin-bottom: 1000px;
}
.card-text{
    font-size: 13px;
}
@media only screen and (max-width: 1000px){
    .home-body{
        flex-direction: column;
    }
 
}
</style>