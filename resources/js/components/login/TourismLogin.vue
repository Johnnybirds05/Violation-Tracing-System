<template>
    <div class="container login-body">
        

            <div class="login-card">
                <img src="../../../pics/account.svg" class="login-pics">
                <h4><b>City Tourism Login</b></h4>
                <form action="#">
                        <div class="mt-1 login-content">
                            <div>
                                <img src="../../../pics/user.svg" class="login-icons">
                            </div>
                            <div>
                                <input type="text" name="tourism-username" class="login-field" id="tourism-username" required placeholder="Enter Username">
                            </div>  
                        </div>
                        <div class="login-content">
                            <div>
                                <img src="../../../pics/lock_white_24dp.svg" class="login-icons">
                            </div>
                            <div>
                                <input type="password" name="tourism-password" class="login-field" id="password" required placeholder="Enter Password">
                                <i class="far fa-eye" id="eye" @click="togglePasswordVisibility" style="margin-left: -30px; cursor: pointer;"></i>
                            </div>  
                        </div>

                        <div class="login-content mt-4">
                            <button class="btn-login" type="submit">
                                    <div class="svg-wrapper-1">
                                        <div class="svg-wrapper">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                            <path fill="none" d="M0 0h24v24H0z"></path>
                                            <path fill="currentColor" d="M1.946 9.315c-.522-.174-.527-.455.01-.634l19.087-6.362c.529-.176.832.12.684.638l-5.454 19.086c-.15.529-.455.547-.679.045L12 14l6-8-8 6-8.054-2.685z"></path>
                                        </svg>
                                        </div>
                                    </div>
                                    <span>Login</span>
                                </button>
                        </div>
                </form>

            </div>
           

    </div>
    
</template>

<script>

    export default {
        methods: {
            //methods/function here....

            togglePasswordVisibility(){
                const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                password.setAttribute('type', type);
                document.getElementById('eye').classList.toggle('fa-eye-slash');
            },
        }

        
    }
 
    
    
</script>
