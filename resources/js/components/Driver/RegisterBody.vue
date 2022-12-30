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
                        <input type="text" v-model="fields.fname" class="form-control input" id="driver-firstname">
                        <span v-if="this.errors.fname" class="c-error">
                            {{ this.errors.fname[0] }}
                        </span>
                    </div>

                    <div class="col-md-3">
                        <label class="form-label"> Last Name: </label>
                        <input type="text" v-model="fields.lname" class="form-control input" id="driver-lastname">
                        <span v-if="this.errors.lname" class="c-error">
                            {{ this.errors.lname[0] }}
                        </span>
                    </div>

                    <div class="col-md-3">
                        <label class="form-label">Middle Name: </label>
                        <input type="text" v-model="fields.mname" class="form-control input" id="driver-middlename">
                    </div>

                    <div class="col-md-1">
                        <label class="form-label">Suffix: </label>
                        <input type="text"  v-model="fields.suffix" class="form-control input" id="driver-suffix" placeholder="SR." maxlength="3">
                    </div>
                </div>
            </div>

            <div class="container-fluid register-fills">
                <div class="row g-2">

                    <div class="col-md-2">
                        <label class="form-label">Sex: </label>
                        <select class="form-select input" name="sex"  v-model="fields.sex" aria-label="Default select example">
                            <option selected disabled>Select</option>
                            <option value="1">male</option>
                            <option value="2">female</option>
                        </select>
                    </div>

                    <div class="col-md-3">
                        <label for="date" class="form-label">Birthdate: </label>
                        <div class="input-group date input" id="birthdate">
                            <input type="text" class="form-control"  v-model="fields.bdate">
                            <span class="input-group-append">
                                <span class="input-group-text bg-white">
                                    <i class="fa fa-calendar icons"></i>
                                </span>
                            </span>
                        </div>
                    </div>


                    <div class="col-md-4">
                        <label for="formFileSm" class="form-label input">Picture(2by2):</label>
                        <input class="form-control" id="pic" type="file" accept="image/png, image/gif, image/jpeg">
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
                        <select class="form-select input" v-model="fields.province" @change="loadCity" aria-label="Default select example">
                            <option selected disabled>Select</option>
                            <option v-for="(item, index) in provinces" :key="index" :value="item.provCode">{{ item.provDesc }}</option>
                        </select>
                    </div>

                    <div class="col-md-3">
                        <label class="form-label">City:</label>
                        <select class="form-select input" v-model="fields.city" @change="loadBarangay" aria-label="Default select example">
                            <option selected disabled>Select</option>
                            <option v-for="(item, index) in cities" :key="index" :value="item.citymunCode">{{ item.citymunDesc }}</option>
                        </select>
                    </div>

                    <div class="col-md-3">
                        <label class="form-label">Barangay:</label>
                        <select class="form-select input" v-model="fields.barangay" aria-label="Default select example">
                            <option selected disabled>Select</option>
                            <option v-for="(item, index) in barangays" :key="index" :value="item.brgyCode">{{ item.brgyDesc }}</option>
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
                        <input type="email" v-model="fields.email" class="form-control input" id="driver-email">
                        <span v-if="this.errors.email" class="c-error">
                            {{ this.errors.email[0] }}
                        </span>
                    </div>

                    <div class="col-md-3">
                        <label class="form-label">Mobile Number:</label>
                        <input type="number" v-model="fields.mobile_no" class="form-control input" id="driver-number">
                        <span v-if="this.errors.mobile_no" class="c-error">
                            {{ this.errors.mobile_no[0] }}
                        </span>
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
                                <input type="text" v-model="fields.expr" class="form-control">
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
                        <input type="text" v-model="fields.username" class="form-control input" id="driver-firstname">
                    </div>
                </div>

                <div class="row g-2  centers">
                    <div class="col-md-5">
                        <label class="form-label"> Password: </label>
                        <input type="password" v-model="fields.password" class="form-control input" id="driver-password">
                    </div>
                </div>

                <div class="row g-2  centers">
                    <div class="col-md-5">
                        <label class="form-label"> Repeat Password: </label>
                        <input type="password" v-model="fields.password_confirmation" class="form-control input" id="driver-reppassword">
                    </div>
                </div>
            </div>

                </v-card>


                <v-btn color="light-green darken-3"  @click = "submit">
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

            fields: {},
            errors: {},

            provinces: [],
            cities: [],
            barangays: [],

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

    methods: {
        loadProvince: function(){
            axios.get('/load-provinces').then(res=>{
                this.provinces = res.data;
            })
        },
        loadCity: function(){
            axios.get('/load-cities?prov=' + this.fields.province).then(res=>{
                this.cities = res.data;
            })
        },

        loadBarangay: function(){
            axios.get('/load-barangays?prov=' + this.fields.province + '&city_code='+this.fields.city).then(res=>{
                this.barangays = res.data;
            })
        },
        submit: function(){
            let bdate = new Date(this.fields.bdate);
            this.fields.bdate = bdate.getFullYear() + '-' + (bdate.getMonth() + 1) + '-' + bdate.getDate()
            axios.post('/driver-register', this.fields).then(res=>{
                if(res.data.status === 'saved'){
                    //if success register

                    window.location = '/driver-dashboard'
                }
            }).catch(err => {
                if(err.response.status === 422){
                    this.errors = err.response.data.errors
                }
            })
        },

        initData(){
            $(function() {
                $('#birthdate').datepicker();
                $('#license').datepicker();
                $('#vehicle').datepicker();
            });

            this.loadProvince()
        }

    },

    mounted() {
        this.initData()
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

.c-error{
    font-weight: bold;
    font-size: 1em;
    color: red;
}
</style>
