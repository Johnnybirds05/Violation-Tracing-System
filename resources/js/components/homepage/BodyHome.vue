<template>
    <div class="home">
                      
                        <div class="margins">
                            <v-card
                            max-width="344"                           
                        >
                        <img src="../../../pics/3.png" class="card-img-top" alt="...">
                            <v-card-title>
                               <b> OFFICES</b>
                            </v-card-title>

                            <v-card-subtitle>
                            Task Force, Local Legislative Office, City Treasurer's Office,City Tourism & Legal Counsel
                            </v-card-subtitle>

                            <v-card-actions>
                            <v-btn
                                color="orange lighten-2"
                                text
                            >
                                <a href="/admins" class="btn button-cards">
                                    <button class="cssbuttons-io-button"> Get started
                                        <div class="icon">
                                            <svg height="24" width="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M0 0h24v24H0z" fill="none"></path><path d="M16.172 11l-5.364-5.364 1.414-1.414L20 12l-7.778 7.778-1.414-1.414L16.172 13H4v-2z" fill="currentColor"></path></svg>
                                        </div>
                                    </button>
                                </a>
                            </v-btn>

                            <v-spacer></v-spacer>

                            
                            <v-btn
                                icon
                                @click="show = !show"
                            >
                                <v-icon>{{ show ? 'mdi-chevron-up' : 'mdi-chevron-down' }}</v-icon>
                            </v-btn>
                            </v-card-actions>

                            <v-expand-transition>
                            <div v-show="show">
                                <v-divider></v-divider>

                                <v-card-text>
                                    <div class="justified">
                                        This section administer all the processes that will happen to the driver. This includes the management of ordinances, violations, requirement and etc.
                                    </div>
                                </v-card-text>
                            </div>
                            </v-expand-transition>
                        </v-card>
                        </div>
                            
                        <div class="margins">
                            <v-card
                            max-width="344"   
                        >
                        <img src="../../../pics/2.png" class="card-img-top" alt="...">
                            <v-card-title>
                               <b> DRIVER</b>
                            </v-card-title>

                            <v-card-subtitle>
                                All of the driver of any vehicle in or outside the road of Tangub City
                            </v-card-subtitle>

                            <v-card-actions>
                            <v-btn
                                color="orange lighten-2"
                                text
                            >
                                <a href="/driver-login" class="btn button-cards">
                                    <button class="cssbuttons-io-button"> Get started
                                        <div class="icon">
                                            <svg height="24" width="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M0 0h24v24H0z" fill="none"></path><path d="M16.172 11l-5.364-5.364 1.414-1.414L20 12l-7.778 7.778-1.414-1.414L16.172 13H4v-2z" fill="currentColor"></path></svg>
                                        </div>
                                    </button>
                                </a>
                            </v-btn>

                            <v-spacer></v-spacer>

                            
                            <v-btn
                                icon
                                @click="show1 = !show1"
                            >
                                <v-icon>{{ show ? 'mdi-chevron-up' : 'mdi-chevron-down' }}</v-icon>
                            </v-btn>
                            </v-card-actions>

                            <v-expand-transition>
                            <div v-show="show1">
                                <v-divider></v-divider>

                                <v-card-text>
                                    <div class="justified">
                                        This section allows registration of drivers to view their list of vehicle, violation history, driving requirements and ordinances in Tangub City.
                                    </div>
                                </v-card-text>
                            </div>
                            </v-expand-transition>
                        </v-card>
                        </div>

        

    </div>
 
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        data: () => ({
        show: false,
        show1: false,
        }),
        }
</script>

<style>
.justified{
    text-align: justify;
}
.margins{
    margin: 30px;
}
.home{
    min-height:500px;
    width: 100%;
    display: flex;
    justify-content: center;
    margin-top: 20px;
}

.card-img-top{
    width: 344px    ;
    height: 254px    ;
}
@media only screen and (max-width: 1000px){
    .home-body{
        flex-direction: column;
    }
 
}
</style>