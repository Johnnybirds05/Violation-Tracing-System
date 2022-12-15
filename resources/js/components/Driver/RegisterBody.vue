<template>
<div class="container-sm register-div">
    <v-app  class=" register-body">
        <v-stepper v-model="e1">
        <v-stepper-header>

            <v-stepper-step :complete="e1 > 1" step="1">
                <b>Personal Information</b> 
            </v-stepper-step>
            
            <v-divider></v-divider>
            
            <v-stepper-step :complete="e1 > 2" step="2">
                <b>Driver's License Information</b> 
            </v-stepper-step>
            
            <v-divider></v-divider>
            
            <v-stepper-step step="3">
                <b>Account Information</b> 
            </v-stepper-step>

        </v-stepper-header>
        
    <v-stepper-items>
        
    <v-stepper-content step="1">
            <v-card class="mb-12 overflowing" color="grey darken-3" height="610px">
            <hr>
                <div class="container-fluid register-fills">
                    <b>Personal Information</b>
                </div>
            <hr>

                <div class="container-fluid register-fills">
                        
                    <div class="row g-2">

                        <div class="col-md-4">
                            <label class="form-label"> First Name: </label>
                            <input type="text" class="form-control input" id="driver-firstname">
                        </div>

                        <div class="col-md-3">
                            <label class="form-label"> Last Name: </label>
                            <input type="text" class="form-control input" id="driver-lastname">
                        </div>

                        <div class="col-md-3">
                            <label class="form-label">Middle Name: </label>
                            <input type="text" class="form-control input" id="driver-middlename">
                        </div>

                        <div class="col-md-1">
                            <label class="form-label">Suffix: </label>
                            <input type="text" class="form-control input" id="driver-suffix" placeholder="SR." maxlength="3">
                        </div>
                    </div>
                </div>

                <div class="container-fluid register-fills">
                    <div class="row g-2">

                        <div class="col-md-2">
                            <label class="form-label">Sex: </label>
                            <select class="form-select input" name="sex" aria-label="Default select example">
                                <option selected disabled>Select</option>
                                <option value="1">male</option>
                                <option value="2">female</option>
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label for="date" class="form-label">Birthdate: </label>
                            <div class="input-group date input" id="birthdate">
                                <input type="text" class="form-control">
                                <span class="input-group-append">
                                    <span class="input-group-text bg-white">
                                        <i class="fa fa-calendar icons"></i>
                                    </span>
                                </span>
                            </div>
                        </div>
                        
                                        
                        <div class="col-md-4">
                            <label for="formFileSm" class="form-label input">Picture(2by2):</label>
                            <input class="form-control" id="formFile" type="file" accept="image/png, image/gif, image/jpeg">
                        </div>               
                    </div>          
                </div>
                    
            <hr>
                <div class="container-fluid register-fills">
                    <b>Current Address</b>
                </div>
            <hr>

                <div class="container-fluid register-fills">
                    <div class="row g-2">

                        <div class="col-md-3">
                            <label class="form-label">Province:</label>
                            <select class="form-select input" name="province" aria-label="Default select example">
                                <option selected disabled>Select</option>
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label class="form-label">City:</label>
                            <select class="form-select input" name="city" aria-label="Default select example">
                                <option selected disabled>Select</option>
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label class="form-label">Barangay:</label>
                            <select class="form-select input" name="barangay" aria-label="Default select example">
                                <option selected disabled>Select</option>
                            </select>
                        </div>
                    </div>
                </div>

            <hr>
                <div class="container-fluid register-fills">
                    <b>Contact Information</b>
                </div>
            <hr>

            <div class="container-fluid mb-5">
                <div class="row g-2">

                    <div class="col-md-4">
                        <label class="form-label">Email:</label>
                        <input type="email" class="form-control input" id="driver-email">
                    </div>

                    <div class="col-md-3">
                        <label class="form-label">Mobile Number:</label>
                        <input type="number" class="form-control input" id="driver-number">
                    </div>

                </div>
            </div>
            <hr>
        </v-card>
        
        <v-btn color="primary" @click="e1 = 2">
            Next
        </v-btn>
        
    </v-stepper-content>
        
    <v-stepper-content step="2">
        <v-card class="mb-12" color="grey darken-3" height="400px">
        <hr>
            <div class="container-fluid register-fills">
                <b>Driver's License Information</b>
            </div>
        <hr>

            <div class="container-fluid">
                <div class="row g-2  centers">

                    <div class="col-md-3">
                        <label class="form-label"> ID Type: </label>
                            <select class="form-select input" name="id-type" aria-label="Default select example">
                                <option selected disabled>Select</option>
                                <option value="1">Non-professional</option>
                                <option value="2">Professional</option>
                            </select>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">ID No:</label>
                        <input type="text" class="form-control input" id="license-ID">
                    </div>

                    <div class="col-md-3">
                            <label for="date" class="form-label">Expiration Date: </label>
                            <div class="input-group date" id="license">
                                <input type="text" class="form-control">
                                <span class="input-group-append">
                                    <span class="input-group-text bg-white">
                                        <i class="fa fa-calendar icons"></i>
                                    </span>
                                </span>
                            </div>
                    </div>
                 </div>
            </div>
            <hr>
                        
        </v-card>
        
                <v-btn color="primary" @click="e1 = 3">
                    Next
                </v-btn>
        
                <v-btn color="grey darken-3" @click="e1 = 1">
                    Back
                </v-btn>

    </v-stepper-content>

    <v-stepper-content step="3">
        <v-card class="mb-12" color="grey darken-3" height="400px">
            
            <hr>
                <div class="container-fluid register-fills">
                    <b>Account Information</b>
                </div>
            <hr>
            <div class="container-fluid">

                <Alerts v-if="AlertTrigger.buttonTrigger" :ToggleAlert="() => ToggleAlert('buttonTrigger')">
                        <!-- this is where I show my alerts --> 
                </Alerts>
                <div class="row g-2  centers">
                    <div class="col-md-5">
                        <label class="form-label"> Username: </label>
                        <input type="text" class="form-control input" id="driver-firstname">
                    </div>
                </div>

                <div class="row g-2  centers">
                    <div class="col-md-5">
                        <label class="form-label"> Password: </label>
                        <input type="password" class="form-control input" id="driver-password">
                    </div>
                </div>

                <div class="row g-2  centers">
                    <div class="col-md-5">
                        <label class="form-label"> Repeat Password: </label>
                        <input type="password" class="form-control input" id="driver-reppassword">
                    </div>
                </div>
            </div>
                
                </v-card>
                
                
                <v-btn color="light-green darken-3"  @click = "() => ToggleAlert('buttonTrigger')">
                    Submit
                </v-btn>
                
        
                <v-btn color="grey darken-3" @click="e1 = 2">
                    Back
                </v-btn>
            </v-stepper-content>
        </v-stepper-items>
    </v-stepper>

    </v-app>
    </div>


  </template>

<script>
import Alerts from "./Alerts.vue";
import { ref } from "vue";

export default {
  data () {
    return {
      e1: 1,
      
    }
},

    setup(){
        const AlertTrigger  = ref({
            buttonTrigger : false,
            timedTrigger : false
        });
        const ToggleAlert = (trigger) =>{
            AlertTrigger.value[trigger] = !AlertTrigger.value[trigger]
        }
        return{
            Alerts,
            AlertTrigger,
            ToggleAlert
        }
    },

    mounted() {
        $(function() {
            $('#birthdate').datepicker();
            $('#license').datepicker();
            $('#vehicle').datepicker();
        });
       

        
    }
    
    
  
  
}
</script>
<style scoped lang="scss">
 ::v-deep .v-application--wrap {
    min-height: fit-content;
  }
  .register-body{
    opacity: .7;
    animation-name: to-left;
    animation-duration: 1s;
  }
  .register-div{
    margin-top: 20px;
    width: 70%;
  }
  .register-fills{
    display: flex;
    justify-content: center;
    align-items: center;
    margin: 5px;
  }
  .overflowing{
    overflow-y: auto;
    overflow-x: hidden;
  }
  .icons{
    font-size: 25px;
  }
label{
    font-size: 12px;
}
b{
    font-size: 15px;
}
.form-control,.form-select,.input-group{
    font-size: 13px;
    font-family: Verdana, Geneva, Tahoma, sans-serif;
}
.centers{
    display: flex;
    justify-content: center;
    align-items: center;
}
.input {
  transition: .5s linear;
}

.input:focus {
  color: #1d1d1d;
  box-shadow: 4px 4px 10px #070707;
}

.input:focus::placeholder {
  color: #fa4753;
}
</style>