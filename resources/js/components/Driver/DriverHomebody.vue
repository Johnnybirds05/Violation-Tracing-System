<template>
    <v-container>
        <div class="container driver-body mt-3">
            <v-row class="row rowleft p-2">

                <v-col class="col driver-picbox" cols="12" md="2" sm="6">
                    <img :src="`/storage/avatars/${user.avatar}`" alt="profile" class="profile">
                    <button class="button btn button-detail text-center mt-2" style="vertical-align:middle" @click="editDialog = true">
                        <span><b>Edit </b></span>
                    </button>
                </v-col>

                <v-col class="cols-name mt-5" cols="12" md="6" sm="6">
                    <h3>{{fullName }}</h3>
                    <span>ID: {{ user.driver_license_no }}
                        <b class="status ml-2 p-1" v-if="user.is_verified === 0"> ! Unverified Account</b>
                    </span> <br>
                    <span>Expiration Date:  {{ user.expr_date }}</span> <br>
                    <span>{{ driverAddress }}</span> <br>
                    <span>{{ user.email }}</span> <br>
                    <span>{{ user.mobile_no  }}</span>
                </v-col>

                <v-col class="col-md-3 logout-button" cols="12" md="2" sm="6">
                    <div class="row">
                        <div class="col">
                            <button class="button-back btn-warning"
                                    @click="logout"
                                    role="button">Logout
                                <img src="../../../pics/logout_white_24dp.svg">
                            </button>
                        </div>
                    </div>
                </v-col>

            </v-row>


        </div>
        <div class=" drivers-links">
            <v-app>
                <v-card>
                    <v-tabs vertical background-color="grey darken-3">
                        <v-tab class="tabs-title">
                            <img src="../../../pics/two_wheeler_white_24dp.svg" class="mr-2"> Vehicles
                        </v-tab>

                        <v-tab class="tabs-title">
                            <img src="../../../pics/note_alt_white_24dp.svg" class="mr-2"> Requirements
                        </v-tab>

                        <v-tab class="tabs-title">
                            <img src="../../../pics/minor_crash_white_24dp.svg" class="mr-2"> Violations
                        </v-tab>

                        <v-tab class="tabs-title">
                            <img src="../../../pics/newspaper_white_24dp.svg" class="mr-2"> Ordinances
                        </v-tab>

                        <!-- For the vehicle             -->
                        <v-tab-item>
                            <v-card flat>
                                <v-card-text color="black">
                                    <v-container>

                                        <v-expansion-panels focusable>

                                            <v-expansion-panel v-for="(item,i) in vehicles" :key="i">
                                                <v-expansion-panel-header color="grey darken-4">
                                                    <v-row class="centers">
                                                        <v-col cols="12" md="2" sm="6">
                                                            <img :src="`/storage/vehicles/${item.vehicle_img}`" class="vehicle-img">
                                                        </v-col>
                                                        <v-col cols="12" md="4" sm="6">
                                                            <h3 class="vehicle-name mt-3">{{ item.model }} - {{ item.body_type }}</h3> <br>
                                                            <h5>{{ item.plate_no }}</h5>
                                                        </v-col>
                                                        <v-spacer></v-spacer>
                                                        <v-col cols="12" md="3" sm="6">

                                                            <div v-if="item.is_verified === 1">
                                                                <v-alert type="success" class="text-type"> Verified!</v-alert>
                                                            </div>
                                                            <div v-else>
                                                              <v-alert type="warning" alt="Go to the City Tourism Office" class="text-type"> Unverified!</v-alert>
                                                            </div>
                                                        </v-col>
                                                    </v-row>
                                                </v-expansion-panel-header>

                                                <v-expansion-panel-content>
                                                    <v-row class="vehicle-accord  pa-3">
                                                        <v-col cols="12" md="9" sm="6">
                                                            <v-row>
                                                                <v-col cols="12" md="3" sm="6">
                                                                    <b> Serial: {{ item.serial_no }}</b>
                                                                </v-col>
                                                                <v-col cols="12" md="2" sm="6">
                                                                    <b>Color: {{ item.color }}</b>
                                                                </v-col>
                                                                <v-col cols="12" md="3" sm="6">
                                                                    <b>Reciept No: {{ item.receipt_no }}</b>
                                                                </v-col>
                                                                <v-col cols="12" md="3" sm="6">
                                                                    <b>Expiration Date: {{ item.expr_date }}</b>
                                                                </v-col>
                                                            </v-row>
                                                        </v-col>
                                                        
                                                        <span v-if="item.is_verified === 1">
                                                            <v-col cols="2" md="2" sm="6" >
                                                                <v-btn class="mt-2" :href="`/print-qr/${item.qr_ref}`" dense color="primary">
                                                                    Print QR
                                                                </v-btn>
                                                            </v-col>
                                                        </span>
                                                            
                                                        
                                                    </v-row>
                                                    <v-card v-if="item.is_verified === 0" class="d-flex align-stretch mt-6" color="warning" dense>
                                                        <b class="pa-5"> Note: To verify your vehicle information. Please go to the Tangub City, City Tourism Office!</b>
                                                    </v-card>
                                                </v-expansion-panel-content>
                                            </v-expansion-panel>

                                        </v-expansion-panels>


                                        <button class="icon-btn add-btn mt-5" @click="addVehicleDialog=true">
                                            <div class="add-icon"></div>
                                            <div class="btn-txt"><b>Add Vehicle</b></div>
                                        </button>
                                    </v-container>
                                </v-card-text>
                            </v-card>

                            <!-- for the requirement tab -->
                        </v-tab-item>
                        <v-tab-item>
                            <v-card flat>
                                <v-card-text>
                                    <!-- Vehicle Requirement Side -->
                                    <v-container>
                                        <v-expansion-panels focusable>
                                            <v-expansion-panel v-for="(item, index) in requirements" :key="index">
                                                <v-expansion-panel-header color="grey darken-4">
                                                    <v-row class="marginNeg mt-1">
                                                        <v-col cols="12" md="2" sm="6">
                                                            <img src="./../../../pics/no_crash_white_24dp.svg" class="vehicle-img mr-5">
                                                        </v-col>
                                                        <v-col cols="12" md="6" sm="6">
                                                            <h3 class="mt-6">{{  item.requirement_type }}</h3>
                                                        </v-col>
                                                    </v-row>
                                                </v-expansion-panel-header>
                                                <v-expansion-panel-content>
                                                    <v-card color="blue darken-4" class="mt-2">
                                                        <v-card-title>
                                                            <v-icon class="mr-2">
                                                                mdi-clipboard-list-outline
                                                            </v-icon>
                                                            Information Verification Requirements
                                                            <v-spacer></v-spacer>
                                                            <v-text-field
                                                                v-model="search"
                                                                append-icon="mdi-magnify"
                                                                label="Search"
                                                                single-line
                                                                hide-details
                                                            ></v-text-field>
                                                        </v-card-title>
                                                        <v-data-table
                                                            :headers="headers"
                                                            :items="item.requirements"
                                                            :search="search"
                                                        ></v-data-table>
                                                    </v-card>
                                                </v-expansion-panel-content>
                                            </v-expansion-panel>
                                        </v-expansion-panels>
                                        <!-- license Requirement Side -->

                                    </v-container>
                                </v-card-text>
                            </v-card>
                        </v-tab-item>


                        <!-- this is for the Violation tab -->
                        <v-tab-item>
                            <v-card flat>
                                <v-card-text>
                                    <v-card color="blue darken-3">
                                        <v-card-title>
                                            <v-icon class="mr-2">
                                                mdi-lightbulb-alert
                                            </v-icon>
                                            Violation History
                                            <v-spacer></v-spacer>
                                            <v-text-field
                                                v-model="search"
                                                append-icon="mdi-magnify"
                                                label="Search"
                                                single-line
                                                hide-details
                                            ></v-text-field>
                                        </v-card-title>
                                        <v-data-table
                                            :headers="headersViolations"
                                            :items="violations"
                                            :search="search"
                                        ></v-data-table>
                                    </v-card>
                                    <v-alert
                                        dense
                                        outlined
                                        type="error">
                                        <b>Note: </b> Please Settle your violation before the warning date! You may settle your violation
                                        in the City Treasurer's Office by paying the fines or in the legal counsel by doing community
                                        service.
                                    </v-alert>
                                </v-card-text>
                            </v-card>
                        </v-tab-item>

                        <!-- Ordinance List -->
                        <v-tab-item>
                            <v-card flat>
                                <v-card-text>
                                    <v-expansion-panels focusable>
                                        <v-expansion-panel
                                            v-for="(item,i) in ordinances"
                                            :key="i"
                                        >
                                            <v-expansion-panel-header color="grey darken-4">
                                                <v-row class="centers marginNeg margin-left">
                                                    <v-col cols="12" md="1" sm="6">
                                                        <img src="./../../../pics/feed_white_24dp.svg" class="ordinance-img mr-5 mt-3">
                                                    </v-col>
                                                    <v-col cols="12" md="4" sm="6">

                                                        <h3 class="vehicle-name mt-5">{{ item.ordinance_name }}</h3>
                                                    </v-col>
                                                </v-row>
                                            </v-expansion-panel-header>
                                            <v-expansion-panel-content>

                                                <v-row>
                                                    <v-col cols="12" md="3" sm="6">
                                                        <h4> Description: </h4>
                                                    </v-col>
                                                    <v-col cols="12" md="9" sm="6">
                                                        <b>{{ item.description }} </b>
                                                    </v-col>
                                                </v-row>

                                                <v-row v-for="(offense, ix) in item.ordinance_penalties" :key="ix">
                                                    <v-col cols="12" md="3" sm="6">
                                                        <b>Offense: {{ offense.offense_order }}: </b>
                                                    </v-col>
                                                    <v-col cols="12" md="2" sm="2">
                                                        Php {{ offense.cost }}
                                                    </v-col>
                                                    <v-col cols="12" md="2" sm="2">
                                                        <span class="impound" v-if="offense.is_impound === 1">
                                                            Impound
                                                        </span>
                                                    </v-col>
                                                </v-row>

                                            </v-expansion-panel-content>
                                        </v-expansion-panel>
                                    </v-expansion-panels>
                                </v-card-text>
                            </v-card>
                        </v-tab-item>
                    </v-tabs>
                </v-card>
            </v-app>
        </div>

        <!-- Modals -->
        <!-- modals for edit -->
        <v-row justify="center">
            <v-dialog
                v-model="editDialog"
                scrollable
                persistent
                max-width="400px"
            >
                <v-card>
                    <v-card-title>
                        <v-icon style="vertical-align: middle">
                            mdi-information
                        </v-icon>
                        <h5 class="modal-title text-white" id="staticBackdropLabel">
                            Information!
                        </h5>
                        <v-spacer></v-spacer>
                    </v-card-title>
                    <v-divider></v-divider>
                    <v-card-text class="d-flex justify-center">
                        <div class="card-header">
                            <div class="card-section-text mt-2">
                                Please go to the City Tourism Office of Tangub City to be able to edit the details of your profile or vehicle!
                            </div>
                        </div>
                    </v-card-text>
                    <v-divider></v-divider>
                    <v-card-actions>
                        <v-spacer></v-spacer>
                        <v-btn
                            color="green darken-1"
                            text
                            @click="editDialog=false"
                        >
                            Okay!
                        </v-btn>
                        <v-spacer></v-spacer>
                    </v-card-actions>
                </v-card>
            </v-dialog>
        </v-row>
        <!-- modals for delete -->
        <v-row justify="center">
            <v-dialog
                v-model="deleteDialog"
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
                            <div class="card-section-text mt-2">
                                Are you sure you want to delete this vehicle?
                            </div>
                        </div>
                    </v-card-text>
                    <v-divider></v-divider>
                    <v-card-actions>
                        <v-spacer></v-spacer>
                        <v-btn
                            text
                            @click="deleteDialog=false"
                        >
                            Cancel
                        </v-btn>
                        <v-btn

                            text
                            @click="submitDelete"
                        >
                            Delete
                        </v-btn>
                        <v-spacer></v-spacer>
                    </v-card-actions>
                </v-card>
            </v-dialog>
        </v-row>


        <!-- Modal for Add Vehicle -->
        <v-row justify="center">
            <v-dialog
                v-model="addVehicleDialog"
                scrollable
                persistent
                max-width="800px"
            >
                <v-card>
                    <v-card-text style="height: 380px;">

                        <div class="card-header">
                            <div class="card-section-text">
                                Vehicle Information
                            </div>
                        </div>

                        <div class="form-registration">
                            <v-row>
                                <v-col cols="12" md="4" sm="6">
                                    <v-text-field
                                        outlined
                                        clearable
                                        v-model="fields.model"
                                        :error-messages="errors.model ? errors.model[0] : ''"
                                    >
                                        <template v-slot:label>
                                            <v-icon style="vertical-align: middle">
                                                mdi-car-multiple
                                            </v-icon>
                                            Model
                                        </template>
                                    </v-text-field>
                                </v-col>
                                <v-col cols="12" md="4" sm="6">
                                    <v-select
                                        v-model="fields.body_type"
                                        :items="['Motocycle', 'Tricycle','Truck','Car']"
                                        outlined
                                        :error-messages="errors.body_type ? errors.body_type[0] : ''"

                                    ><template v-slot:label>
                                        <v-icon style="vertical-align: middle">
                                            mdi-engine
                                        </v-icon>
                                        Body Type
                                    </template></v-select>
                                </v-col>

                                <v-col cols="12" md="4" sm="6">
                                    <v-text-field
                                        outlined
                                        clearable
                                        v-model="fields.color"
                                        :error-messages="errors.color ? errors.color[0] : ''"
                                    >
                                        <template v-slot:label>
                                            <v-icon style="vertical-align: middle">
                                                mdi-format-color-fill
                                            </v-icon>
                                            Color
                                        </template>
                                    </v-text-field>
                                </v-col>
                            </v-row>

                            <v-row class="marginNeg">
                                <v-col cols="12" md="4" sm="6">
                                    <v-text-field
                                        outlined
                                        clearable
                                        v-model="fields.serial_no"
                                    >
                                        <template v-slot:label>
                                            <v-icon style="vertical-align: middle">
                                                mdi-ticket-confirmation
                                            </v-icon>
                                            Serial No.
                                        </template>
                                    </v-text-field>
                                </v-col>
                                <v-col
                                    cols="12"
                                    md="4"
                                    sm="6">
                                    <v-text-field
                                        outlined
                                        clearable
                                        v-model="fields.plate_no"
                                        :error-messages="errors.plate_no ? errors.plate_no[0] : ''"
                                    >
                                        <template v-slot:label>
                                            <v-icon style="vertical-align: middle">
                                                mdi-ticket-confirmation
                                            </v-icon>
                                            Plate No.
                                        </template>
                                    </v-text-field>
                                </v-col>

                                <v-col cols="12" md="4" sm="6">
                                    <v-text-field
                                        outlined
                                        clearable
                                        v-model="fields.receipt_no"
                                        :error-messages="errors.receipt_no ? errors.receipt_no[0] : ''"
                                    >
                                        <template v-slot:label>
                                            <v-icon style="vertical-align: middle">
                                                mdi-ticket-confirmation
                                            </v-icon>
                                            Receipt No.
                                        </template>
                                    </v-text-field>
                                </v-col>
                            </v-row>

                            <v-row class="marginNeg">
                                <v-col cols="12" md="6" sm="6">
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
                                                :error-messages="errors.expr_date ? errors.expr_date[0] : ''"
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
                                            @input="menu1 = false"
                                        ></v-date-picker>
                                    </v-menu>
                                </v-col>

                                <v-col cols="12" md="6" sm="6">
                                    <v-file-input
                                        v-model="fields.vehicle_img"
                                        label="Motor image"
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

                        </div>

                    </v-card-text>
                    <v-divider></v-divider>
                    <v-card-actions>
                        <v-spacer></v-spacer>
                        <v-btn
                            outlined
                            text
                            @click="addVehicleDialog = false"
                        >
                            Cancel
                        </v-btn>
                        <v-btn
                            outlined
                            text
                            @click="submitVehicle"
                            class="ml-3"
                        >
                            Save
                        </v-btn>
                        <v-spacer></v-spacer>
                    </v-card-actions>

                </v-card>
            </v-dialog>
            <!-- Modal for Add Vehicle -->
        </v-row>


        <AlertDialog ref="myAlertDialog"></AlertDialog>

    </v-container>

</template>

<script>

export default {

    mounted(){
        this.intiData()
        this.getUser()
        this.getVehicles()

    },

    data () {
        return {

            hasUnsettled: 0,

            user: {
                lname: '',
                fname: '',
                mname: '',
                sex: '',
                suffix: '',
                driver_license_type: '',
                driver_license_no: '',
                expr_date: null,
                province: {},
                city: {},
                barangay: {},
                street: '',
            },


            fields: {
                model: '',
                body_type: '',
                color: '',
                serial_no: '',
                plate_no: '',
                receipt_no: '',
                expr_date: '',
                motor_img: {}
            },

            errors: {},

            editDialog:false,
            deleteDialog:false,

            vehicle_id: 0,



            addVehicleDialog: false,
            successDialog: false,

            vehicles: [],
            requirements: [],
            ordinances: [],
            violations: [],



            search: '',

            headers: [
                {
                    text: 'Name',
                    align: 'start',
                    sortable: false,
                    value: 'requirement_name',
                },
            ],

            headersViolations: [
                {
                    text: 'Name',
                    align: 'start',
                    sortable: false,
                    value: 'ordinance',
                },
                { text: 'Citation No.', value: 'citation_no' },
                { text: 'Plate No.', value: 'plate_no' },
                { text: 'Date', value: 'date_violate' },
                { text: 'Fines', value: 'cost' },
                { text: 'Day Left', value: 'day_left' },
                { text: 'Status', value: 'status' },
            ],

        }

    },

    methods: {

        intiData(){
            this.getAllRequirements()
            this.getAllOrdinances()
            this.getMyViolations()
        },


        logout(){
            axios.post('/logout').then(()=>{
                window.location = '/'
            })
        },

        getUser(){
            axios.get('/get-driver').then(res=>{
                this.user = res.data
            })
        },

        getVehicles(){
            axios.get('/get-vehicles').then(res=>{
                this.vehicles = res.data
            })
        },

        getAllRequirements(){
            axios.get('/get-all-requirements').then(res=>{
                this.requirements = res.data
            })
        },

        getAllOrdinances(){
            axios.get('/get-all-ordinances').then(res=>{
                this.ordinances = res.data
            })
        },
        getMyViolations(){
            axios.get('/get-my-violations').then(res=>{
                console.log(res.data)
                //this.violations = res.data
                res.data.forEach(item => {
                    this.violations.push({
                        ordinance : item.ordinance.ordinance_name,
                        date_violate : item.date_violate,
                        citation_no : item.citation_no,
                        plate_no: item.plate_no,
                        cost : item.ordinance_penalty.cost,
                        day_left: this.dayRemain(item.date_violate, item.ordinance.no_day),
                        status: item.settled === 1 ? 'Settled' : 'Unsettled',
                    })

                    if(item.settled === 0){
                        this.hasUnsettled = 1;
                    }
                })
            })
        },

        submitVehicle(){
            let formData = new FormData();
            formData.append('model', this.fields.model);
            formData.append('body_type', this.fields.body_type);
            formData.append('color', this.fields.color);
            formData.append('serial_no', this.fields.serial_no);
            formData.append('plate_no', this.fields.plate_no);
            formData.append('receipt_no', this.fields.receipt_no);
            formData.append('expr_date', this.fields.expr_date);
            formData.append('vehicle_img', this.fields.vehicle_img);

            axios.post('/driver-submit-vehicle', formData).then(res=>{
                if(res.data.status === 'saved'){
                    //success alert

                    this.$refs.myAlertDialog.openAlert({
                        title: 'Saved!',
                        message: 'Successfully saved!'
                    })

                    this.addVehicleDialog = false
                    this.getVehicles()
                    this.clearFields()

                }
            }).catch(err=>{
                throw err
                // if(err.response.status === 422){
                //     this.errors = err.response.data.errors;
                // }
            })
        },

        clearFields(){
            this.fields = {
                model: '',
                body_type: '',
                color: '',
                serial_no: '',
                plate_no: '',
                receipt_no: '',
                expr_date: '',
                motor_img: {}
            }
        },
        confirmDelete(id){
            this.deleteDialog = true
            this.vehicle_id = id
        },

        submitDelete(){
            axios.delete('/driver-delete-vehicle/' + this.vehicle_id).then(res=>{
                if(res.data.status === 'deleted'){

                    this.$refs.myAlertDialog.openAlert({
                        title: 'Deleted!',
                        message: 'Successfully deleted!'
                    })

                    this.deleteDialog = false
                    this.getVehicles()
                    this.vehicle_id = 0
                }
            })
        },

        dayRemain: function(value, dayPenalty) {

            let dateNow = new Date();
            let dateFrom = new Date(value);

            let dateDiff = Math.round((dateNow - dateFrom) / (1000 * 60 * 60 * 24));

            return dayPenalty - dateDiff;
        }

    },



    computed: {

        fullName(){
            return this.user.fname + ' ' + this.user.mname + ' ' + this.user.lname + ' ' + this.user.suffix;
        },

        driverAddress(){
            return this.user.province.provDesc+ ', ' + this.user.city.citymunDesc + ' ' + this.user.barangay.brgyDesc + ' ' + this.user.street;
        }
    },

}



</script>

<style scoped src="../../../css/driverhomebody.css">
</style>
