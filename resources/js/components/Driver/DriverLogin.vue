<template>
    <div class="container login-body">
        

        <div class="login-card">
            <img src="../../../pics/account.svg" class="login-pics">
            <h4><b>Driver Login</b></h4>
            <form @submit.prevent="submit">
                <div class="mt-4 login-content">
                    <div>
                        <img src="../../../pics/user.svg" class="login-icons">
                    </div>
                    <div>
                        <input type="text" v-model="fields.username" class="login-field" id="counsel-username" required placeholder="Enter Username">
                    </div>  
                </div>
                <div class="login-content">
                    <div>
                        <img src="../../../pics/lock_white_24dp.svg" class="login-icons">
                    </div>
                    <div>
                        <input type="password" v-model="fields.password" class="login-field" id="password" required placeholder="Enter Password">
                        <i class="far fa-eye" id="eye" @click="togglePasswordVisibility" style="margin-left: -30px; cursor: pointer;"></i>
                    </div>  
                </div>
                    <div class="container error-msg" v-if="this.errors.username">
                        <div class="alert alert-danger d-flex align-items-center bg-warning" role="alert">
                            <img src="./../../../pics/warning_amber_white_24dp.svg" width="24" height="24" role="img" aria-label="Danger:">
                            <div class="ml-3">
                                <b>{{this.errors.username[0]}}</b>
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Dispose"></button>
                        </div>
                    </div>
                <div class="extensions mt-5">
                    <a href="/driver-register"> Don't have an account?</a>
                    or 
                    <a href="#"> Forgot Password</a>
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

        data(){
            return{
                //variables here...
                fields: {},
                errors: {},
            }
        },

        methods: {
            //methods/function here....

            togglePasswordVisibility(){
                const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                password.setAttribute('type', type);
                document.getElementById('eye').classList.toggle('fa-eye-slash');
            },


            //neg submit or click sa login button fire this method
            submit(){
                axios.post('/driver-login', this.fields).then(res=>{
                    
                    if(res.data.role === 'DRIVER'){
                        window.location = '/driver-dashboard';
                    }
 

                }).catch(err=>{
                    console.log(err.response.data.errors)
                    this.errors = err.response.data.errors;
                })
            }
        },

        mounted() {
            //methods/function here.. but use this mounted if mag initialize or something naa kai event e raise during mount
            //sa component
        },

        
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
::v-deep .v-application--wrap {
    min-height: fit-content;
  }
.error-msg{
    font-size: 13px;
    width: 90%;
    position: absolute;
    top: 30%;
    left: 5%;
    animation-name: to-left;
    animation-duration: 1s;
}
</style>
