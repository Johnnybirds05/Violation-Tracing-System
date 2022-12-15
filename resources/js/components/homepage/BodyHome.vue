<template>
    <div class="home-body">
        <div class="card m-5 card-homecol" style="width: 18rem;">
            <img src="../../../pics/3.png" class="card-img-top" alt="...">
            <div class="card-body card-home">
                <h5 class="card-title "><b>Offices</b></h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
            <div class="card-body">
                <a href="/admins" class="btn button-cards">
                    <button class="cssbuttons-io-button"> Get started
                        <div class="icon">
                            <svg height="24" width="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M0 0h24v24H0z" fill="none"></path><path d="M16.172 11l-5.364-5.364 1.414-1.414L20 12l-7.778 7.778-1.414-1.414L16.172 13H4v-2z" fill="currentColor"></path></svg>
                        </div>
                    </button>
                </a>
            </div>
        </div>

        <div class="card m-5 mt-5 card-homecol" style="width: 18rem;">
            <img src="../../../pics/2.png" class="card-img-top" alt="...">
            <div class="card-body card-home">
                <h5 class="card-title"><b>Driver</b></h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
            <div class="card-body">
                <a href="/driver-login" class="btn button-cards">
                    <button class="cssbuttons-io-button"> Get started
                        <div class="icon">
                            <svg height="24" width="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M0 0h24v24H0z" fill="none"></path><path d="M16.172 11l-5.364-5.364 1.414-1.414L20 12l-7.778 7.778-1.414-1.414L16.172 13H4v-2z" fill="currentColor"></path></svg>
                        </div>
                    </button>
                </a>
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