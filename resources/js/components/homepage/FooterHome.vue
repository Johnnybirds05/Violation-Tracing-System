<template>
    
    <div class="container-fluid footer mt-15">
        <a href="/">
            <div class="footer-buttons">
                <img src="../../../pics/home.svg" alt="home" class="home-button">

            </div>

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
.footer{
    display:flex;
    justify-content: center;
    align-items: center;
    background-color: black;
    align-self: flex-end;
    position:relative;
    bottom: -25px;
}
.home-button{
    color: white;
    width: 30px;
    border: 50px;
    cursor: pointer;
}
.footer-buttons:hover{
    background-color: rgb(39, 39, 39);
    transition: 1s;

}
.footer-buttons{
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 10px;
    margin: 5px;
}

@media only screen and (max-width: 1000px){
    .footer{
        top: 0px;
    }
}
</style>