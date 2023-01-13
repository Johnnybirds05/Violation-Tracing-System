<template>
    <v-app class="box-white">
        <v-container width="200px" class="login-body">

            <v-container class="login-card">

                <img src="../../../pics/account.svg" class="login-pics">
                <h4><b>Login</b></h4>
                <form @submit.prevent="submit">
                    <v-row class="margin-top">
                        <v-col
                            cols="12"
                            md="12"
                            sm="12">
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
                            sm="12">
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
                            <span class="login">Login</span>
                        </button>
                    </div>
                    </div>


                </form>
            </v-container>
        </v-container>


        <template>
            <v-row justify="center">
                <v-dialog
                v-model="errorDialog"
                scrollable
                persistent
                max-width="400px"
                >
                <v-card>
                    <v-card-title>
                        <v-icon style="vertical-align: middle">
                            mdi-alert
                        </v-icon>
                        <h5 class="modal-title text-white" id="staticBackdropLabel">
                            Warning!
                        </h5>
                        <v-spacer></v-spacer>
                    </v-card-title>
                    <v-divider></v-divider>
                    <v-card-text class="d-flex justify-center">
                        <div class="card-header">
                            <div class="card-section-text">
                                <span v-if="errors.username">
                                    {{ errors.username[0] }}
                                </span>
                            </div>
                        </div>
                    </v-card-text>
                    <v-divider></v-divider>
                    <v-card-actions>
                        <v-spacer></v-spacer>
                        <v-btn
                            color="green darken-1"
                            text
                            @click="errorDialog=false"
                        >
                            Okay!
                        </v-btn>
                        <v-spacer></v-spacer>
                    </v-card-actions>
                </v-card>
                </v-dialog>
            </v-row>
        </template>

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
                },
                errorDialog: false,
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

                    if(res.data.role === 'TOURISM'){
                        window.location = '/tourism-dashboard';
                    }
                    if(res.data.role === 'TASK FORCE'){
                        window.location = '/taskforce-dashboard';
                    }

                    if(res.data.role === 'LOCAL LEGISLATIVE'){
                        window.location = '/legislative-dashboard';
                    }

                    if(res.data.role === 'LEGAL COUNSEL' || res.data.role === 'TREASURY'){
                        window.location = '/counsel-treasury-dashboard';
                    }


                }).catch(err=>{
                    console.log(err.response.data.errors)
                    this.errors = err.response.data.errors;
                    this.errorDialog = true;
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
  .login-pics{
    width: 130px;
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
.login-body{
    background-color: rgb(31, 31, 31);
    width: 400px;
    padding: 20px;
    border-radius: 30px;
    margin-top: 30px;
}
.login{
    color: white;
}
.container{
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
}
</style>
