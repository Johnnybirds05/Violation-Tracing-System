<template>
    <v-app class="box-white">
        <v-container width="200px" class="login-body">
           
                <v-container class="login-card">
                    
                <img src="../../../pics/account.svg" class="login-pics">
                <h4><b>Office Login</b></h4>
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

                        <div class="login-content mt-4">
                        <button class="btn button-cards" type="submit">
                                <button class="dev-buttons">
                                    <svg height="24" width="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M0 0h24v24H0z" fill="none"></path><path d="M5 13c0-5.088 2.903-9.436 7-11.182C16.097 3.564 19 7.912 19 13c0 .823-.076 1.626-.22 2.403l1.94 1.832a.5.5 0 0 1 .095.603l-2.495 4.575a.5.5 0 0 1-.793.114l-2.234-2.234a1 1 0 0 0-.707-.293H9.414a1 1 0 0 0-.707.293l-2.234 2.234a.5.5 0 0 1-.793-.114l-2.495-4.575a.5.5 0 0 1 .095-.603l1.94-1.832C5.077 14.626 5 13.823 5 13zm1.476 6.696l.817-.817A3 3 0 0 1 9.414 18h5.172a3 3 0 0 1 2.121.879l.817.817.982-1.8-1.1-1.04a2 2 0 0 1-.593-1.82c.124-.664.187-1.345.187-2.036 0-3.87-1.995-7.3-5-8.96C8.995 5.7 7 9.13 7 13c0 .691.063 1.372.187 2.037a2 2 0 0 1-.593 1.82l-1.1 1.039.982 1.8zM12 13a2 2 0 1 1 0-4 2 2 0 0 1 0 4z" fill="currentColor"></path></svg>
                                    <span>Login</span>
                                </button>
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
                                        Error msg here 
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
                errorDialog: true,
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
