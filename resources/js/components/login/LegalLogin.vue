<template>
    <div class="container login-body">
        

            <div class="login-card">
                <img src="../../../pics/account.svg" class="login-pics">
                <h4><b>Legal Counsel Login</b></h4>
                <form action="#">
                        <div class="mt-1 login-content">
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
        }

        
    }
    // d lage mu gana ahak hahaha
    // const togglePassword = document.querySelector('#togglePassword');
    // const password = document.querySelector('#password');

    // togglePassword.addEventListener('click', function (e) {
    //     const type = password.getAttribute('type') === 'password' ? 'text' : 'password';

    // password.setAttribute('type', type);
    // this.classList.toggle('fa-eye-slash');
    // });
    
</script>
