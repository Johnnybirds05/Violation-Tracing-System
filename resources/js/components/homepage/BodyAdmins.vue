<template>
    <div class="home-body body-admin">

        <div class="container body-admins">
            <div class="card m-3 card-homecol" style="width: 18rem;">
                <img src="../../../pics/4.png" class="card-img-top" alt="...">
                <div class="card-body card-home">
                    <h5 class="card-title "><b>City Treasurer</b></h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
                <div class="card-body">
                    <a href="/logincto" class="btn btn-dark">Sign in  <img src="../../../pics/arrow-left.svg"></a>
                </div>
            </div>

            <div class="card m-3 card-homecol" style="width: 18rem;">
                <img src="../../../pics/5.png" class="card-img-top" alt="...">
                <div class="card-body card-home">
                    <h5 class="card-title"><b>Legal Counsel</b></h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
                <div class="card-body">
                    <a href="/logincounsel" class="btn btn-dark">Sign in <img src="../../../pics/arrow-left.svg"></a>
                </div>
            </div>

            <div class="card m-3 card-homecol" style="width: 18rem;">
                <img src="../../../pics/6.png" class="card-img-top" alt="...">
                <div class="card-body card-home">
                    <h5 class="card-title "><b>Local Legislative</b></h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
                <div class="card-body">
                    <a href="/loginlegislative" class="btn btn-dark">Sign in <img src="../../../pics/arrow-left.svg"></a>
                </div>
            </div>

        </div>
        <div class="container body-admins">
            <div class="card m-3 card-homecol" style="width: 18rem;">
                <img src="../../../pics/7.png" class="card-img-top" alt="...">
                <div class="card-body card-home">
                    <h5 class="card-title"><b>Task Force</b></h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
                <div class="card-body">
                    <a href="/logintask" class="btn btn-dark">Sign in <img src="../../../pics/arrow-left.svg"></a>
                </div>
            </div>
            <div class="card m-3  card-homecol" style="width: 18rem;">
                <img src="../../../pics/8.png" class="card-img-top" alt="...">
                <div class="card-body card-home">
                    <h5 class="card-title"><b>City Tourism</b></h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
                <div class="card-body">
                    <a href="/logintourism" class="btn btn-dark">Sign in <img src="../../../pics/arrow-left.svg"></a>
                </div>
            </div>

            <div class="card m-3 invis" style="width: 18rem;"></div>
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
.body-admins{
    display: flex;
    justify-content: center;
    align-items: center;
}
.invis{
    opacity: 0;
}
.body-admin{
    flex-direction: column;
}
@media only screen and (max-width: 1000px){
    .body-admins{
        flex-direction: column;
    }
 
}
</style>