<template>
    <div class="container login-body">
        

            <div class="login-card">
                <img src="../../../pics/account.svg" class="login-pics">
                <h4><b>CTO Login</b></h4>
                <form action="#">
                        <div class="mt-1 login-content">
                            <div>
                                <img src="../../../pics/user.svg" class="login-icons">
                            </div>
                            <div>
                                <input type="text" name="cto-username" class="login-field" id="cto-username" required placeholder="Enter Username">
                            </div>  
                        </div>
                        <div class="login-content">
                            <div>
                                <img src="../../../pics/lock_white_24dp.svg" class="login-icons">
                            </div>
                            <div>
                                <input type="password" name="cto-password" class="login-field" id="password" required placeholder="Enter Password">
                                <i class="far fa-eye" id="togglePassword" style="margin-left: -30px; cursor: pointer;"></i>
                            </div>  
                        </div>

                        <div class="login-content mt-4">
                            <button class="btn btn-dark" type="submit"> Login <img src="../../../pics/login_white_24dp.svg" class="login-icons"></button>
                        </div>
                </form>

            </div>
           

    </div>
    
</template>

<script>

    export default {
        mounted() {
            console.log('Component mounted.')
            const togglePassword = document.querySelector('#togglePassword');
            const password = document.querySelector('#password');

            togglePassword.addEventListener('click', function (e) {
                const type = password.getAttribute('type') === 'password' ? 'text' : 'password';

            password.setAttribute('type', type);
            this.classList.toggle('fa-eye-slash');
            });
    
        }

        
    }
    
</script>

<style>
.login-pics{
    width: 130px;
    position: relative;
}
.login-size{
    width: 250px;
}

.login-card{
    color: antiquewhite;
    background-color: rgb(0, 0, 0);
    border-radius: 20px;
    font-family: monospace;
    width: 400px;
    opacity: .7;
    display: flex;
    justify-content: center;
    flex-direction: column;
    align-items: center;
    padding: 10px;
}

.login-body{
    display: flex;
    justify-content: center;
    align-content: center;
    height: 73vh;
}

.login-field{
    border-bottom: 1px solid white;
    width: 210px;
    color: aliceblue;
    padding: 5px;
    font-family: monospace;
    padding-left: 20px;
    background-color: black;
    
}
.login-icons{
    width:30px;

}
.login-content{
    display: flex;
    justify-content: center;
    align-items: center;
    margin: 25px;
}

@media only screen and (max-width: 1000px){

}
</style>