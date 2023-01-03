<template>
    <div>


        <v-container class="card-size">
            <v-stepper v-model="e1">

                <v-stepper-header>

                    <v-btn @click="debug">DEBUG</v-btn>

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
                                            :error-messages="this.errors.fname ? this.errors.fname[0] : ''"
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
                                            :error-messages="this.errors.lname ? this.errors.lname[0] : ''"
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
                                            :error-messages="this.errors.sex ? this.errors.sex[0] : ''"
                                            :item-value="['Male', 'Female']"
                                            :items="['Male', 'Female']"
                                            outlined
                                            v-model="fields.sex"
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
                                                    v-model="fields.bdate"
                                                    persistent-hint
                                                    v-bind="attrs"
                                                    v-on="on"
                                                    readonly
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
                                            v-model="picture"
                                            label="Picture (2by2)"
                                            placeholder="Select your image"
                                            prepend-icon="mdi-camera"
                                            outlined
                                            :show-size="1000"
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
                                            :error-messages="this.errors.province ? this.errors.province[0] : ''"
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
                                            :error-messages="this.errors.city ? this.errors.city[0] : ''"
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
                                            :error-messages="this.errors.barangay ? this.errors.barangay[0] : ''"
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
                                            :error-messages="this.errors.street ? this.errors.street[0] : ''"

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
                                            :error-messages="this.errors.email ? this.errors.email[0] : ''"
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
                                            :error-messages="this.errors.mobile_no ? this.errors.mobile_no[0] : ''"
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
                                            v-model="fields.driver_license_type"
                                            :error-messages="this.errors.driver_license_type ? this.errors.driver_license_type[0] : ''"
                                        ><template v-slot:label>
                                            <v-icon style="vertical-align: middle">
                                                mdi-card
                                            </v-icon>
                                            Drivers License Type
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
                                            :error-messages="this.errors.driver_license_no ? this.errors.driver_license_no[0] : ''"
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
                                                    readonly
                                                    v-model="fields.expr_date"
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
                                                v-model="fields.expr_date"
                                                no-title
                                                :error-messages="this.errors.expr_date ? this.errors.expr_date[0] : ''"
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
                                            :error-messages="this.errors.username ? this.errors.username[0] : ''"
                                        >
                                            <template v-slot:label>
                                                <v-icon style="vertical-align: middle">
                                                    mdi-account-check
                                                </v-icon>
                                                Username
                                            </template>
                                        </v-text-field>
                                    </v-col>

                                    <v-col
                                        cols="12"
                                        md="3"
                                        sm="6">
                                        <v-text-field
                                            v-model="fields.password"
                                            :append-icon="show3 ? 'mdi-eye' : 'mdi-eye-off'"
                                            :error-messages="this.errors.password ? this.errors.password[0] : ''"
                                            :type="show3 ? 'text' : 'password'"
                                            class="input-group--focused"
                                            @click:append="show3 = !show3"
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
                                            v-model="fields.password_confirmation"
                                            :append-icon="show4 ? 'mdi-eye' : 'mdi-eye-off'"
                                            :error-messages="this.errors.password_confirmation ? this.errors.password_confirmation[0] : ''"
                                            :type="show4 ? 'text' : 'password'"
                                            class="input-group--focused"
                                            @click:append="show4 = !show4"
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
                                    </div>
                                </div>
                            </div>
                        </v-card>

                        <v-btn color="light-green darken-3" @click="submit">
                            Submit
                        </v-btn>

                        <v-btn color="grey darken-3" @click="e1 = 2">
                            Back
                        </v-btn>
                    </v-stepper-content>
                </v-stepper-items>
            </v-stepper>

        </v-container>
        <!--dv modal-->
        <div>
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
                                Saved!
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
                                @click="proceedLogin"
                            >
                                Proceed to login!
                            </v-btn>
                            <v-spacer></v-spacer>
                        </v-card-actions>
                    </v-card>
                </v-dialog>
            </v-row>
        </div>

        <div>
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
        </div>

    </div><!--root div-->


</template>

<script>
import { version } from 'vue';



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
                picture: null,

                driver_license_type: '',
                driver_license_no: '',
                expr_date: '',

                username: '',
                password: '',
                password_confirmation: '',
            },

            picture: null,


            validate: {

                emailRules: [
                    v => !!v || 'E-mail is required',
                    v => /.+@.+\..+/.test(v) || 'E-mail must be valid',
                ],

                mobileRule: [
                    v => !!v || 'Mobile Number is required',
                    v => /((^(\+)(\d){12}$)|(^\d{11}$))/.test(v) || 'Invalid mobile no.',
                ],

            },


            errors: {},

            provinces: [],
            cities: [],
            barangays: [],

            termsDialog: false,
            successDialog: false,
            errorDialog: false,

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

            let bdate = new Date(this.fields.bdate);
            let formattedBdate = bdate.getFullYear() + '-' + (bdate.getMonth() + 1) + '-' + bdate.getDate()

            let expr = new Date(this.fields.expr_date);
            expr = expr.getFullYear() + '-' + (expr.getMonth() + 1) + '-' + expr.getDate()

            let formData = new FormData();
            formData.append('fname', this.fields.fname);
            formData.append('lname', this.fields.lname);
            formData.append('mname', this.fields.mname);
            formData.append('suffix', this.fields.suffix);
            formData.append('sex', this.fields.sex);
            formData.append('bdate', formattedBdate);
            formData.append('province', this.fields.province);
            formData.append('city', this.fields.city);
            formData.append('barangay', this.fields.barangay);
            formData.append('street', this.fields.street);
            formData.append('email', this.fields.email);
            formData.append('mobile_no', this.fields.mobile_no);
            formData.append('driver_license_type', this.fields.driver_license_type);
            formData.append('driver_license_no', this.fields.driver_license_no);
            formData.append('expr_date', expr);
            formData.append('profile_picture', this.picture);

            formData.append('username', this.fields.username);
            formData.append('password', this.fields.password);
            formData.append('password_confirmation', this.fields.password_confirmation);
            formData.append('terms', this.fields.terms);


            axios.post('/driver-register', formData).then(res=>{
                if(res.data.status === 'saved'){
                    //if success register
                    //window.location = '/driver-dashboard'
                    if(res.data.status === 'saved'){
                        this.successDialog = true
                        this.fields = {}
                    }

                }
            }).catch(err => {

                if(err.response.status === 422){

                    this.errors = err.response.data.errors
                    //this.errorDialog = true

                    if(err.response.data.errors === 'terms'){
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
        },

        proceedLogin(){
            window.location = '/driver-login'
        },

        debug(){
            this.fields = {
                fname: 'Janjan',
                mname: '',
                lname: 'Cagadas',
                suffix: '',
                sex: 'Male',
                bdate: '2000-04-10',
                terms: false,
                province: '',
                city: '',
                barangay: '',
                street: 'p-test',
                email: 'dev01@dev.com',
                mobile_no: '09167895655',
                picture: null,

                driver_license_type: 'Professional',
                driver_license_no: 'k09-123423312',
                expr_date: '2023-04-19',

                username: 'aa',
                password: 'aa',
                password_confirmation: 'aa',

            }
        }

    },

    mounted() {
        this.initData()
    }




}
</script>
<style scoped src="../../../css/register.css">

</style>
