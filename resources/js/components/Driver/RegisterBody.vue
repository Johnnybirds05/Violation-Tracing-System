<template>
    <div>
        <v-container class="card-size">
            <v-app  class=" register-body">
                <v-stepper v-model="e1">
                    <v-stepper-header>
                        <v-stepper-step :complete="e1 > 1" step="1">
                            <v-icon style="vertical-align: middle"> mdi-account</v-icon>
                            <span class="font-top">Personal Information</span>
                        </v-stepper-step>

                        <v-divider></v-divider>

                        <v-stepper-step :complete="e1 > 2" step="2">
                            <v-icon style="vertical-align: middle"> mdi-card-account-details</v-icon>
                            <span class="font-top">Driver's License Information</span>
                        </v-stepper-step>

                        <v-divider></v-divider>

                        <v-stepper-step step="3">
                            <v-icon style="vertical-align: middle"> mdi-account-box</v-icon>
                            <span class="font-top">Account Information</span>
                        </v-stepper-step>

                    </v-stepper-header>

                <v-stepper-items>

                <v-stepper-content step="1">
                    
                    <v-card class="mb-12" color="grey darken-4">
                        <div class="card-header">
                            <div class="card-section-text">
                                Personal Information
                            </div>          
                        </div>
                    
                        <div class="form-registration">
                            <v-row>
                                <v-col
                                    cols="12"
                                    md="3"
                                    sm="6">
                                    <v-text-field
                                        v-model="fields.fname"
                                        :rules="validate.fnameRules"
                                        outlined
                                        clearable
                                    >
                                    <template v-slot:label>
                                        <v-icon style="vertical-align: middle">
                                            mdi-account
                                        </v-icon>
                                        First Name
                                    </template>
                                </v-text-field>
                                </v-col>

                                <v-col
                                    cols="12"
                                    md="3"
                                    sm="6">
                                    <v-text-field
                                        v-model="fields.mname"
                                        :rules="validate.mnameRules"
                                        outlined
                                        clearable
                                    > <template v-slot:label>
                                        <v-icon style="vertical-align: middle">
                                            mdi-account
                                        </v-icon>
                                        Middle Name
                                    </template></v-text-field>
                                </v-col>

                                <v-col
                                    cols="12"
                                    md="3"
                                    sm="6">
                                    <v-text-field
                                        v-model="fields.lname"
                                        :rules="validate.lnameRules"
                                        outlined
                                        clearable
                                    >
                                    <template v-slot:label>
                                        <v-icon style="vertical-align: middle">
                                            mdi-account
                                        </v-icon>
                                        Last Name
                                    </template></v-text-field>
                                </v-col>

                                <v-col
                                    cols="12"
                                    md="3"
                                    sm="6">
                                    <v-text-field
                                        v-model="fields.suffix"
                                        hint="leave blank if none"
                                        outlined
                                        clearable
                                    >
                                    <template v-slot:label>
                                        <v-icon style="vertical-align: middle">
                                            mdi-account
                                        </v-icon>
                                        Suffix
                                    </template></v-text-field>
                                </v-col>
                            </v-row>

                            <v-row>
                                <v-col
                                    cols="12"
                                    md="4"
                                    sm="6">
                                    <v-select
                                        :rules="validate.sexRules"
                                        :items="['Male', 'Female']"
                                        outlined
                                    ><template v-slot:label>
                                        <v-icon style="vertical-align: middle">
                                            mdi-gender-male-female
                                        </v-icon>
                                        Sex
                                    </template></v-select>
                                </v-col>
                                <v-col
                                    cols="12"
                                    md="4"
                                    sm="6">
                                    <v-menu
                                        :close-on-content-click="false"
                                        transition="scale-transition"
                                        offset-y
                                        max-width="290px"
                                        min-width="auto"
                                        >
                                        <template v-slot:activator="{ on, attrs }">
                                            <v-text-field
                                                outlined
                                                :rules="validate.bdateRules"
                                                v-model="fields.bdate"
                                                persistent-hint
                                                v-bind="attrs"
                                                v-on="on"
                                            > 
                                            <template v-slot:label>
                                                <v-icon style="vertical-align: middle">
                                                    mdi-calendar
                                                </v-icon>
                                                Birthdate
                                            </template></v-text-field>
                                        </template>
                                        <v-date-picker
                                            v-model="fields.bdate"
                                            no-title
                                            @input="menu1 = false"
                                        ></v-date-picker>
                                    </v-menu>
                                </v-col>

                                <v-col cols="12" md="4" sm="6">
                                    <v-file-input
                                        v-model="fields.picture"
                                        counter
                                        multiple
                                        label="Picture (2by2)"
                                        placeholder="Select your image"
                                        prepend-icon="mdi-camera"
                                        outlined
                                        :show-size="1000"
                                        :rules="validate.picRules"
                                    >
                                        <template v-slot:selection="{ index, text }">
                                        <v-chip
                                            v-if="index < 2"
                                            color="deep-white accent-4"
                                            dark
                                            label
                                            small
                                        >
                                            {{ text }}
                                        </v-chip>

                                        <span
                                            v-else-if="index === 2"
                                            class="text-overline grey--text text--darken-3 mx-2"
                                        >
                                            +{{ files.length - 2 }} File(s)
                                        </span>
                                        </template>
                                    </v-file-input>
                                </v-col>
                            </v-row>

                            <v-row>
                                <v-col cols="12" md="3" sm="6">
                                    <v-select
                                        item-value="provCode"
                                        item-text="provDesc"
                                        :items="provinces"
                                        outlined
                                        @change="loadCities"
                                        v-model="fields.province"
                                        :rules="validate.provRules"
                                    ><template v-slot:label>
                                                <v-icon style="vertical-align: middle">
                                                    mdi-map-marker
                                                </v-icon>
                                                Province
                                            </template></v-select>
                                </v-col>

                                <v-col cols="12" md="3" sm="6">
                                    <v-select
                                        item-value="citymunCode"
                                        item-text="citymunDesc"
                                        :items="cities"
                                        outlined
                                        @change="loadBarangays"
                                        v-model="fields.city"
                                        :rules="validate.cityRules"
                                    ><template v-slot:label>
                                                <v-icon style="vertical-align: middle">
                                                    mdi-map-marker
                                                </v-icon>
                                                City
                                            </template></v-select>
                                </v-col>
                                <v-col cols="12" md="3" sm="6">
                                    <v-select
                                        item-value="brgyCode"
                                        item-text="brgyDesc"
                                        :items="barangays"
                                        outlined
                                        v-model="fields.barangay"
                                    ><template v-slot:label>
                                                <v-icon style="vertical-align: middle">
                                                    mdi-map-marker
                                                </v-icon>
                                                Barangay
                                            </template></v-select>
                                </v-col>

                                <v-col cols="12" md="3" sm="6">
                                    <v-text-field
                                        outlined
                                        v-model="fields.street"
                                        :rules="validate.streetRules"
                                    ><template v-slot:label>
                                                <v-icon style="vertical-align: middle">
                                                    mdi-map-marker
                                                </v-icon>
                                                Street
                                            </template></v-text-field>
                                </v-col>
                            </v-row>


                            <v-row>
                                <v-col cols="12" md="6" sm="6">
                                    <v-text-field
                                        :rules="validate.emailRules"
                                        required
                                        outlined
                                        v-model="fields.email"
                                    ><template v-slot:label>
                                        <v-icon style="vertical-align: middle">
                                            mdi-email
                                        </v-icon>
                                        Email
                                    </template></v-text-field>
                                </v-col>

                                <v-col cols="12" md="6" sm="6">
                                    <v-text-field
                                        label="Mobile No."
                                        :rules="validate.mobileRule"
                                        required
                                        outlined
                                        v-model="fields.mobile_no"
                                    ><template v-slot:label>
                                        <v-icon style="vertical-align: middle">
                                            mdi-cellphone
                                        </v-icon>
                                        Mobile No.
                                    </template></v-text-field>
                                </v-col>
                            </v-row>

                        </div><!--form-registration-->
                    </v-card>

                    <v-btn color="primary" @click="e1 = 2">
                        Next
                    </v-btn>

                </v-stepper-content>

                <v-stepper-content step="2">
                    <v-card class="mb-12" color="grey darken-4">
                        <div class="card-header">
                            <div class="card-section-text">
                                Driver's License Information <br>
                                <span class="skip">(click next if none...)</span>
                            </div>          
                            
                        </div>

                        <div class="form-registration">
                            <v-row>
                                <v-col
                                    cols="12"
                                    md="4"
                                    sm="6">
                                    <v-select
                                        :items="['Non-professional', 'Professional']"
                                        outlined
                                    ><template v-slot:label>
                                        <v-icon style="vertical-align: middle">
                                            mdi-card
                                        </v-icon>
                                        Sex
                                    </template></v-select>
                                </v-col>
                                <v-col
                                    cols="12"
                                    md="4"
                                    sm="6">
                                    <v-text-field
                                        v-model="fields.driver_license_no"
                                        outlined
                                        clearable
                                    >
                                    <template v-slot:label>
                                        <v-icon style="vertical-align: middle">
                                            mdi-account
                                        </v-icon>
                                        ID No.
                                    </template>
                                </v-text-field>
                                </v-col>

                                <v-col
                                    cols="12"
                                    md="4"
                                    sm="6">
                                    <v-menu
                                        :close-on-content-click="false"
                                        transition="scale-transition"
                                        offset-y
                                        max-width="290px"
                                        min-width="auto"
                                        >
                                        <template v-slot:activator="{ on, attrs }">
                                            <v-text-field
                                                outlined
                                                v-model="fields.expr"
                                                persistent-hint
                                                v-bind="attrs"
                                                v-on="on"
                                            > 
                                            <template v-slot:label>
                                                <v-icon style="vertical-align: middle">
                                                    mdi-calendar
                                                </v-icon>
                                                Expiration Date
                                            </template></v-text-field>
                                        </template>
                                        <v-date-picker
                                            v-model="fields.bdate"
                                            no-title
                                            @input="menu1 = false"
                                        ></v-date-picker>
                                    </v-menu>
                                </v-col>
                            </v-row>
                        </div>

                    </v-card>

                        <v-btn color="primary" @click="e1 = 3">
                            Next
                        </v-btn>

                        <v-btn color="grey darken-3" @click="e1 = 1">
                            Back
                        </v-btn>

                </v-stepper-content>

                <v-stepper-content step="3">
                    <v-card class="mb-12" color="grey darken-4">

                        <div class="card-header">
                            <div class="card-section-text">
                                Account Information
                            </div>          
                        </div>

                        <div class="form-registration">
                            <v-row class="centers">
                                <v-col
                                    cols="12"
                                    md="3"
                                    sm="4">
                                    <v-text-field
                                        v-model="fields.username"
                                        outlined
                                        clearable
                                    >
                                    <template v-slot:label>
                                        <v-icon style="vertical-align: middle">
                                            mdi-account-check
                                        </v-icon>
                                        username
                                    </template>
                                </v-text-field>
                                </v-col>
        
                                <v-col
                                    cols="12"
                                    md="3"
                                    sm="6">
                                        <v-text-field
                                        :append-icon="show3 ? 'mdi-eye' : 'mdi-eye-off'"
                                        :rules="validate.usernameRules"
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

                                <v-col
                                    cols="12"
                                    md="3"
                                    sm="6">
                                        <v-text-field
                                        :append-icon="show4 ? 'mdi-eye' : 'mdi-eye-off'"
                                        :rules="validate.usernameRules"
                                        :type="show4 ? 'text' : 'password'"
                                        label="Not visible"
                                        class="input-group--focused"
                                        @click:append="show4 = !show4"
                                                v-model="fields.password_confirmation"
                                                outlined
                                            >
                                            <template v-slot:label>
                                                <v-icon style="vertical-align: middle">
                                                    mdi-lock-question
                                                </v-icon>
                                                Repeat password
                                            </template>
                                        </v-text-field>
                                </v-col>
                            </v-row>
                            <v-row class="centers marginNeg margin-left">
                                <v-col
                                    cols="12"
                                    md="4"
                                    sm="6">
                                    <v-checkbox
                                        v-model="fields.terms">
                                        <template v-slot:label>
                                            <span class="button-term" @click="termsDialog = true">Agree to Terms and Conditions</span>
                                        </template>
                                    </v-checkbox>
                                   
                                </v-col>
                                        
                            </v-row>
                                
                        </div>
                        <div class="container-fluid">

                            <div class="row g-0  centers ">
                                <div class="col-md-3 ml-7">
                                    <div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>



                            </v-card>


                            <v-btn color="light-green darken-3" @click="successDialog = true">
                                Submit
                            </v-btn>


                            <v-btn color="grey darken-3" @click="e1 = 2">
                                Back
                            </v-btn>
                        </v-stepper-content>
                    </v-stepper-items>
                </v-stepper>
        

                <!-- modals for success -->
                <template>
                    <v-row justify="center">
                        <v-dialog
                        v-model="successDialog"
                        scrollable
                        persistent
                        max-width="400px"
                        >
                        <v-card>
                            <v-card-title>
                                <v-icon style="vertical-align: middle">
                                    mdi-account-check
                                </v-icon>
                                <h5 class="modal-title text-white" id="staticBackdropLabel">
                                    Congratulations!
                                </h5>
                                <v-spacer></v-spacer>
                            </v-card-title>
                            <v-divider></v-divider>
                            <v-card-text style="height: 100px;" class="d-flex justify-center">
                                <div class="card-header">
                                    <div class="card-section-text">
                                        You successfully registered to the system! 
                                    </div>          
                                </div>                             
                            </v-card-text>
                            <v-divider></v-divider>
                            <v-card-actions>
                                <v-spacer></v-spacer>
                                <v-btn
                                    color="green darken-1"
                                    text
                                    @click="submit"
                                >
                                    Proceed to login!
                                </v-btn>
                                <v-spacer></v-spacer>
                            </v-card-actions>
                        </v-card>
                        </v-dialog>
                    </v-row>
                </template>

                

            

            </v-app>

                 
        </v-container>

    </div><!--root div-->


  </template>

<script>

export default {
    data () {
        return {
            
            e1: 1,
            show3: false,
            show4: false,

            fields: {
                fname: '',
                mname: '',
                lname: '',
                suffix: '',
                sex: '',
                bdate: '',
                terms: false,
                province: '',
                city: '',
                barangay: '',
                street: '',
                email: '',
                mobile_no: '',
                picture: {},
            },

            validate: {
                fnameRules: [
                    v => !!v || 'Firstname is required',
                ],
                mnameRules: [
                    v => !!v || 'Middlename is required',
                ],
                lnameRules: [
                    v => !!v || 'Lastname is required',
                ],
                sexRules: [
                    v => !!v || 'Sex is required',
                ],
                bdateRules: [
                    v => !!v || 'Birthdate is required',
                ],
                picRules: [
                    v => !!v || 'Picture is required',
                ],
                provRules: [
                    v => !!v || 'Province is required',
                ],
                cityRules: [
                    v => !!v || 'City is required',
                ],
                brgyRules: [
                    v => !!v || 'Barangay is required',
                ],
                streetRules: [
                    v => !!v || 'Street is required',
                ],
                emailRules: [
                    v => !!v || 'E-mail is required',
                    v => /.+@.+\..+/.test(v) || 'E-mail must be valid',
                ],


                mobileNo: [
                    v => !!v || 'Mobile Number is required',                  
                    v => /((^(\+)(\d){12}$)|(^\d{11}$))/.test(v) || 'Invalid mobile no.',
                ],
                usernameRules: [
                    v => !!v || 'username is required',
                ],
                passwordRules: [
                    v => !!v || 'password is required',
                ],
            },


            errors: {},

            provinces: [],
            cities: [],
            barangays: [],

            termsDialog: false,
            successDialog: false,

        }
    },



    methods: {
        loadProvinces: function(){
            axios.get('/load-provinces').then(res=>{
                this.provinces = res.data;
            })
        },
        loadCities: function(){
            axios.get('/load-cities?prov=' + this.fields.province).then(res=>{
                this.cities = res.data;
            })
        },

        loadBarangays: function(){
            axios.get('/load-barangays?prov=' + this.fields.province + '&city_code='+this.fields.city).then(res=>{
                this.barangays = res.data;
            })
        },


        submit: function(){

            let fbdate = document.getElementById('test-birthdate');
            console.log(fbdate.value);
            console.log(this.fields.bdate);

            return;


            let bdate = new Date(this.fields.bdate);
            this.fields.bdate = bdate.getFullYear() + '-' + (bdate.getMonth() + 1) + '-' + bdate.getDate()

            let expr = new Date(this.fields.expr);
            expr = expr.getFullYear() + '-' + (expr.getMonth() + 1) + '-' + expr.getDate()

            let img = document.getElementById('pic');

            let formData = new FormData();
            formData.append('fname', this.fields.fname);
            formData.append('lname', this.fields.lname);
            formData.append('mname', this.fields.mname);
            formData.append('suffix', this.fields.suffix);
            formData.append('sex', this.fields.sex);
            formData.append('bdate', this.fields.bdate);
            formData.append('province', this.fields.province);
            formData.append('city', this.fields.city);
            formData.append('barangay', this.fields.barangay);
            formData.append('street', this.fields.street);
            formData.append('email', this.fields.email);
            formData.append('mobile_no', this.fields.mobile_no);
            formData.append('driver_license_type', this.fields.driver_license_type);
            formData.append('driver_license_no', this.fields.driver_license_no);
            formData.append('expr_date', expr);
            formData.append('pic', this.fields.pict);


            axios.post('/driver-register', formData).then(res=>{
               
                if(res.data.status === 'saved'){
                    //if success register
                    window.location = '/driver-dashboard'
                }
            }).catch(err => {
                if(err.response.status === 422){
                   
                    this.errors = err.response.data.errors

                    if(err.response.data.status === 'terms'){
                        //alert
                        alert('Please agree to terms and condition.')
                    }
                }
            })
        },

        initData(){

            this.loadProvinces()
        },

        onFileChange(event){
            this.fields.pict = event.target.files;
        }

    },

    mounted() {
        this.initData()
    }




}
</script>
<style scoped src="../../../css/register.css">
 
</style>
