<template>
    <v-app class="box-white">
        <v-container class=" login-body">
           
                <v-container class="login-card">
                    
                <img src="../../../pics/account.svg" class="login-pics">
                <h4><b>Driver Login</b></h4>
                <form @submit.prevent="submit">    
                    <v-row class="margin-top">
                        <v-col
                            cols="12"
                            md="12"
                            sm="6">
                                <v-text-field
                                        v-model="fields.username"
                                        :rules="validate.usernameRules"
                                        outlined
                                        clearable
                                    >
                                    <template v-slot:label>
                                        <v-icon style="vertical-align: middle">
                                            mdi-account
                                        </v-icon>
                                        Enter username
                                    </template>
                                </v-text-field>
                        </v-col>
                    </v-row>

                    <v-row class="marginNeg">
                        <v-col
                            cols="12"
                            md="12"
                            sm="6">
                                <v-text-field
                                :append-icon="show3 ? 'mdi-eye' : 'mdi-eye-off'"
                                :rules="validate.passwordRules"
                                :type="show3 ? 'text' : 'password'"
                                label="Not visible"
                                class="input-group--focused"
                                @click:append="show3 = !show3"
                                        v-model="fields.password"
                                        outlined
                                    >
                                    <template v-slot:label>
                                        <v-icon style="vertical-align: middle">
                                            mdi-lock-question
                                        </v-icon>
                                        Enter password
                                    </template>
                                </v-text-field>
                            
                    
                        </v-col>
                    </v-row>

                    <div class="extensions">
                        <a href="/driver-register">Don't have an account?</a>
                        or 
                        <a href="#">Forgot Password</a>
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
                </v-container>

            
        



    </v-container>
</v-app>
        


        

        
    
</template>

<script>

    export default {

        data(){
            return{
                //variables here...
                fields: {},
                errors: {},
                show3: false,

                validate: {
                usernameRules: [
                    v => !!v || 'username is required',
                ],
                passwordRules: [
                    v => !!v || 'password is required',
                ],
                }
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

<style scoped lang="scss">
::v-deep .v-application--wrap {
    min-height: 630px;
    background-color: rgb(0, 0, 0);
    opacity: .9;
  }
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

.error-msg{
    font-size: 13px;
    width: 90%;
    position: absolute;
    top: 30%;
    left: 5%;
    animation-name: to-left;
    animation-duration: 1s;
}
.margin-top{
    margin-top: 10px;
}
.marginNeg{
    margin-top: -30px;
}
.text-fields{
    font-family: monospace;
    font-size: 11px;
}
.login-card{
    padding: 20px;
    margin-top: 10px;
}
.v-text-field ::v-deep label {
    font-size: 0.8em;
    font-family: monospace;
}
</style>
