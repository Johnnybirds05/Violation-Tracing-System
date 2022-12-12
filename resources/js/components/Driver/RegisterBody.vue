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
            
            <v-stepper-step :complete="e1 > 3" step="3">
                <b>Vehicle Registration Information</b> 
            </v-stepper-step>

            <v-divider></v-divider>
            
            <v-stepper-step step="4">
                <b>Account Information</b> 
            </v-stepper-step>

        </v-stepper-header>
        
    <v-stepper-items>
        
    <v-stepper-content step="1">
            <v-card class="mb-12 overflowing" color="grey darken-3" height="600px">
            <hr>
                <div class="container-fluid register-fills">
                    <b>Personal Information</b>
                </div>
            <hr>

                <div class="container-fluid register-fills">
                        
                    <div class="row g-2">

                        <div class="col-md-4">
                            <label class="form-label"> First Name: </label>
                            <input type="text" class="form-control" id="driver-firstname">
                        </div>

                        <div class="col-md-3">
                            <label class="form-label"> Last Name: </label>
                            <input type="text" class="form-control" id="driver-lastname">
                        </div>

                        <div class="col-md-3">
                            <label class="form-label">Middle Name: </label>
                            <input type="text" class="form-control" id="driver-middlename">
                        </div>

                        <div class="col-md-1">
                            <label class="form-label">Suffix: </label>
                            <input type="text" class="form-control" id="driver-suffix" placeholder="SR." maxlength="3">
                        </div>

                        <div class="col-md-1">
                            <label class="form-label">Age: </label>
                            <input type="number" class="form-control" id="driver-age" maxlength="3" pattern="[0-9]+">
                        </div>
                    </div>
                </div>

                <div class="container-fluid register-fills">
                    <div class="row g-2">

                        <div class="col-md-2">
                            <label class="form-label">Sex: </label>
                            <select class="form-select" name="sex" aria-label="Default select example">
                                <option selected disabled>Select</option>
                                <option value="1">male</option>
                                <option value="2">female</option>
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label for="date" class="form-label">Birthdate: </label>
                            <div class="input-group date" id="birthdate">
                                <input type="text" class="form-control">
                                <span class="input-group-append">
                                    <span class="input-group-text bg-white">
                                        <i class="fa fa-calendar icons"></i>
                                    </span>
                                </span>
                            </div>
                        </div>
                        
                                        
                        <div class="col-md-4">
                            <label for="formFileSm" class="form-label">Picture(2by2):</label>
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
                            <label class="form-label">Street:</label>
                            <input type="text" class="form-control" id="driver-street">
                        </div>

                        <div class="col-md-3">
                            <label class="form-label">Barangay:</label>
                            <input type="text" class="form-control" id="driver-barangay">
                        </div>

                        <div class="col-md-3">
                            <label class="form-label">City:</label>
                            <input type="text" class="form-control" id="driver-city">
                        </div>

                        <div class="col-md-3">
                            <label class="form-label">Province:</label>
                            <input type="text" class="form-control" id="driver-province">
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
                        <input type="email" class="form-control" id="driver-email">
                    </div>

                    <div class="col-md-3">
                        <label class="form-label">Mobile Number:</label>
                        <input type="number" class="form-control" id="driver-number">
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
                            <select class="form-select" name="id-type" aria-label="Default select example">
                                <option selected disabled>Select</option>
                                <option value="1">Non-professional</option>
                                <option value="2">Professional</option>
                            </select>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">ID No:</label>
                        <input type="text" class="form-control" id="license-ID">
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
            
                asdhgasdh
                </v-card>
        
                <v-btn color="black" @click="e1 = 4">
                    Next
                </v-btn>
        
                <v-btn color="grey darken-3">
                    Cancel
                </v-btn>
            </v-stepper-content>

            <v-stepper-content step="4">
                <v-card class="mb-12" color="grey darken-3" height="400px">
            
                asdhgasdh
                </v-card>
        
                <v-btn color="orange" @click="e1 = 1">
                    submit
                </v-btn>
        
                <v-btn color="grey darken-3">
                    Cancel
                </v-btn>
            </v-stepper-content>
        </v-stepper-items>
    </v-stepper>

    </v-app>
    </div>


  </template>

<script>

export default {
  data () {
    return {
      e1: 1,
      
    }
},
    mounted() {
        $(function() {
            $('#birthdate').datepicker();
            $('#license').datepicker();
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
    overflow-y: scroll;
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

</style>