<template>
    <div>

        <v-container>
            <v-row class="justify-content-center">
                <div class="col-md-6">
                    <form action="/login">

                        <div class="card p-6">
                            <div class="card-header">Login</div>
        
                            <div class="card-body">
                                <form method="POST" action="/login">
    
                                    <div class="row mb-3">
                                        <v-text-field label="Username" v-model="fields.username" 
                                            hide-details="auto" 
                                            :rules="rules">
                                        </v-text-field>
                                    </div>
    
                                    <div class="row mb-2">
                                        <v-text-field type="password" label="Password" :rules="rules" 
                                            v-model="fields.password" 
                                        ></v-text-field>
                                    </div>

                                    <div class="row mb-0">
                                        <div class="col-md-8 offset-md-4">
                                            <v-btn
                                                elevation="2"
                                                outlined
                                            >LOGIN</v-btn>
                                            <a class="btn btn-link" href="/password/reset">
                                                Forgot Password
                                            </a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </form>
                </div>
            </v-row>
        </v-container>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    
                </div>
            </div>
        </div>
    </div><!--root div-->

</template>


<script>
export default{
    data(){
        return{
            rules: [
                value => !!value || 'Required.',
                value => (value || '').length <= 20 || 'Max 20 characters',
            ],

            fields: {},
        }
    }
}</script>

<style scoped>
   
</style>