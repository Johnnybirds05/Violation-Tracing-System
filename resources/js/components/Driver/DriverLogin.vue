<template>
    <div class="container login-body">
        

            <div class="login-card">
                <img src="../../../pics/account.svg" class="login-pics">
                <h4><b>Driver Login</b></h4>
                <form action="#">
                        <div class="mt-4 login-content">
                            <div>
                                <img src="../../../pics/user.svg" class="login-icons">
                            </div>
                            <div>
                                <input type="text" name="counsel-username" class="login-field" id="counsel-username" required placeholder="Enter Username">
                            </div>  
                        </div>
                        <div class="login-content">
                            <div>
                                <img src="../../../pics/lock_white_24dp.svg" class="login-icons">
                            </div>
                            <div>
                                <input type="password" name="counsel-password" class="login-field" id="password" required placeholder="Enter Password">
                                <i class="far fa-eye" id="togglePassword" style="margin-left: -30px; cursor: pointer;"></i>
                            </div>  
                        </div>
                        <div class="extensions mt-5">
                            <a href="/register"> Don't have an account?</a>
                            or 
                            <a href="/register"> Forgot Password</a>
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

<style scoped>
.extensions a{
    text-decoration: none;
    color: rgb(128, 128, 128);
    font-size: small;
}
.extensions{
    display: flex;
    justify-content: center;
    align-items: center;
    color: rgb(75, 75, 75);
    flex-direction: column;

}
</style>
