<template>

    <div>

        <v-card flat>
            <v-card-text >
                <template>
                    <v-container fluid>
                        <v-data-iterator
                            :items="drivers"
                            :items-per-page.sync="itemsPerPage"
                            :page.sync="page"
                            :search="search"
                            :sort-by="sortBy.toLowerCase()"
                            :sort-desc="sortDesc"
                            hide-default-footer
                        >
                            <template v-slot:header>
                                <v-toolbar color="dark" class="mb-3">
                                    <img src="../../../pics/sports_motorsports_white_24dp.svg" class="driver-icon" alt="...">
                                    <h4 class="ml-2">Driver List</h4>
                                    <v-spacer></v-spacer>
                                    <div class="containered">
                                        <input placeholder="Type to search..." required="" class="inputted" name="text" type="text" v-model="search">
                                        <div class="icon">
                                            <svg viewBox="0 0 512 512" class="ionicon" xmlns="http://www.w3.org/2000/svg">
                                                <title>Search</title>
                                                <path stroke-width="32" stroke-miterlimit="10" stroke="currentColor" fill="none" d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z"></path>
                                                <path d="M338.29 338.29L448 448" stroke-width="32" stroke-miterlimit="10" stroke-linecap="round" stroke="currentColor" fill="none"></path>
                                            </svg>
                                        </div>
                                    </div>
                                </v-toolbar>
                            </template>

                            <template v-slot:default="props">
                                <v-row>
                                    <v-col v-for="item in props.items" :key="item.user_id" cols="12" sm="10" md="8" lg="6">
                                        <v-card class="table-text" color="grey darken-3">
                                            <v-card-title class="subheading font-weight-bold">
                                                <img src="../../../pics/perm_identity_white_36dp.svg" alt="profile" class="profile">
                                                <h6>{{ item.lname }}, {{ item.fname }} {{ item.mname }}</h6>
                                                <v-spacer></v-spacer>
                                                <div class=" ml-10 button-tourism">
                                                    <button class="button mt-1" @click="openDriverFormDialog(item)"> Edit Details</button>
                                                    
                                                </div>
                                            </v-card-title>

                                            <v-list dense class="table-text">
                                                <v-list-item v-for="(key, index) in filteredKeys" :key="index">
                                                    <v-list-item-content :class="{ 'blue--text': sortBy === key }">
                                                        {{ key.label }}:
                                                    </v-list-item-content>
                                                    <v-list-item-content class="align-end" :class="{ 'blue--text': sortBy === key }">
                                                        <div v-if="key.column === 'is_verified'">
                                                            <span v-if="item.is_verified === 1">Verified</span>
                                                            <span v-else>Unverified</span>
                                                        </div>
                                                        <div v-else>{{ item[key.column] }}</div>
                                                    </v-list-item-content>
                                                </v-list-item>
                                            </v-list>
                                        </v-card>
                                    </v-col>
                                </v-row>
                            </template>

                            <template v-slot:footer>
                                <v-row class="mt-2" align="center" justify="center">
                                    <span class="grey--text">Items per page</span>
                                    <v-menu offset-y>
                                        <template v-slot:activator="{ on, attrs }">
                                            <v-btn dark text color="primary" class="ml-2" v-bind="attrs" v-on="on">
                                                {{ itemsPerPage }}
                                                <v-icon>mdi-chevron-down</v-icon>
                                            </v-btn>
                                        </template>
                                        <v-list>
                                            <v-list-item v-for="(number, index) in itemsPerPageArray" :key="index" @click="updateItemsPerPage(number)">
                                                <v-list-item-title>{{ number }}</v-list-item-title>
                                            </v-list-item>
                                        </v-list>
                                    </v-menu>

                                    <v-spacer></v-spacer>

                                    <span class="mr-4 grey--text">
                                        Page {{ page }} of {{ numberOfPages }}
                                    </span>

                                    <v-btn fab dark color="blue darken-3" class="mr-1" @click="formerPage">
                                        <v-icon>mdi-chevron-left</v-icon>
                                    </v-btn>
                                    <v-btn fab dark color="blue darken-3" class="ml-1" @click="nextPage">
                                        <v-icon>mdi-chevron-right</v-icon>
                                    </v-btn>
                                </v-row>
                            </template>

                        </v-data-iterator>
                    </v-container>
                </template>
            </v-card-text>
        </v-card>



        <!-- alert modal -->
        <template>
            <v-row justify="center">
                <v-dialog
                    v-model="driverFormDialog"
                    scrollable
                    persistent
                    max-width="800px"
                >
                    <v-card>
                        <v-card-title>
                            <v-icon style="vertical-align: middle">
                                mdi-account
                            </v-icon>
                            <h5 class="modal-title text-white" id="staticBackdropLabel">
                                Driver Details
                            </h5>
                            <v-spacer></v-spacer>
                            <label class="switch">
                                <input type="checkbox" v-model="fields.is_verified" class="inputer">
                                <span class="slider"></span>
                            </label>
                        </v-card-title>
                        <v-divider></v-divider>
                        <v-card-text style="height: 600px;">


                            <div class="form-registration">
                                <v-row>
                                    <v-col
                                        cols="12"
                                        md="3"
                                        sm="6">
                                        <v-text-field
                                            v-model="fields.fname"
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
                                <v-row>
                                    <v-col
                                        cols="12"
                                        md="4"
                                        sm="6">
                                        <v-select
                                            :items="['Non-professional', 'Professional']"
                                            outlined
                                            v-model="fields.driver_license_type"
                                        ><template v-slot:label>
                                            <v-icon style="vertical-align: middle">
                                                mdi-account
                                            </v-icon>
                                            Driver License Type
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
                                                Driver License No.
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
                                                @input="menu1 = false"
                                            ></v-date-picker>
                                        </v-menu>
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
                                @click="driverFormDialog = false"
                            >
                                Cancel
                            </v-btn>
                            <v-btn
                                outlined
                                text
                                class="ml-3"
                                @click="updateDriverForm"
                            >
                                Update
                            </v-btn>

                            <v-btn
                                outlined
                                text @click="openVehicleFormDialog" class="ml-3"
                            >
                                View Vehicles
                            </v-btn>
                            <v-spacer></v-spacer>
                        </v-card-actions>

                    </v-card>
                </v-dialog>
            </v-row>
        </template>





        <!-- Edit Vehicle -->
        <template>
            <v-row justify="center">
                <v-dialog
                    v-model="vehicleFormDialog"
                    scrollable
                    persistent
                    max-width="800px"
                >
                    <v-card>
                        <v-card-title>
                            <v-icon style="vertical-align: middle">
                                mdi-car
                            </v-icon>
                            <h5 class="modal-title text-white" id="staticBackdropLabel">
                                Vehicles Information
                            </h5>
                            <v-spacer></v-spacer>
                        </v-card-title>
                        <v-card-text style="height: 500px;">
                            <v-divider></v-divider>


                            <div class="form-registration" v-for="(item, index) in vehicles" :key="index">
                                <v-row>
                                    <v-col
                                        cols="12"
                                        md="2"
                                        sm="6">
                                        <label class="switch">
                                            <input type="checkbox" v-model="item.is_verified" class="inputer">
                                            <span class="slider"></span>
                                        </label>
                                    </v-col>
                                </v-row>
                                <v-row>
                                    <v-col
                                        cols="12"
                                        md="4"
                                        sm="6">
                                        <v-text-field
                                            outlined
                                            clearable v-model="item.model"
                                        >
                                            <template v-slot:label>
                                                <v-icon style="vertical-align: middle">
                                                    mdi-car-multiple
                                                </v-icon>
                                                Model
                                            </template>
                                        </v-text-field>
                                    </v-col>
                                    <v-col
                                        cols="12"
                                        md="4"
                                        sm="6">
                                        <v-select
                                            v-model="item.body_type"
                                            :items="['MOTORCYCLE', 'TRICYCLE','TRUCK','CAR']"
                                            outlined
                                        ><template v-slot:label>
                                            <v-icon style="vertical-align: middle">
                                                mdi-engine
                                            </v-icon>
                                            Body Type
                                        </template></v-select>
                                    </v-col>
                                    <v-col
                                        cols="12"
                                        md="4"
                                        sm="6">
                                        <v-text-field
                                            v-model="item.color"
                                            outlined
                                            clearable
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
                                    <v-col
                                        cols="12"
                                        md="4"
                                        sm="6">
                                        <v-text-field
                                            v-model="item.serial_no"
                                            outlined
                                            clearable
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
                                            v-model="item.plate_no"
                                            outlined
                                            clearable
                                        >
                                            <template v-slot:label>
                                                <v-icon style="vertical-align: middle">
                                                    mdi-ticket-confirmation
                                                </v-icon>
                                                Plate No.
                                            </template>
                                        </v-text-field>
                                    </v-col>

                                    <v-col
                                        cols="12"
                                        md="4"
                                        sm="6">
                                        <v-text-field
                                            v-model="item.receipt_no"
                                            outlined
                                            clearable
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
                                    <v-col
                                        cols="12"
                                        md="6"
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
                                                    v-model="item.expr_date"
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
                                                v-model="item.expr_date"
                                                no-title
                                                @input="menu1 = false"
                                            ></v-date-picker>
                                        </v-menu>
                                    </v-col>
                                </v-row>
                                <hr>
                            </div>
                            

                        </v-card-text>
                        <v-divider></v-divider>
                        <v-card-actions>
                            <v-spacer></v-spacer>
                            <v-btn
                                outlined
                                text
                                @click="vehicleFormDialog = false"
                            >
                                Cancel
                            </v-btn>
                            <v-btn
                                outlined
                                text
                                @click="submitVehicleForm"
                                class="ml-3"
                            >
                                Save
                            </v-btn>
                            <v-spacer></v-spacer>
                        </v-card-actions>

                    </v-card>
                </v-dialog>
            </v-row>
        </template>


        <AlertDialog ref="myAlertDialog"></AlertDialog>


    </div>
</template>


<script>
export default{
    data(){
        return{

            user_id: 0,

            show: {
                password: false,
                repeat_password: false
            },


            fields: {},
            errors: {},

            driverFormDialog: false,
            vehicleFormDialog: false,


            drivers: [],
            vehicles: [],

            provinces: [],
            cities: [],
            barangays: [],
            street: '',



            itemsPerPageArray: [2, 4, 6],
            search: '',
            filter: {},
            sortDesc: false,
            page: 1,
            itemsPerPage: 2,
            sortBy: 'name',

            keys: [
                { label: 'Name', column: 'name' },
                { label: 'Email', column: 'email' },
                { label: 'Mobile No.', column: 'mobile_no' },
                { label: 'Status', column: 'is_verified' },
            ],

        }
    },


    methods: {
        getDriversAccounts(){
            axios.get('/get-all-drivers-accounts').then(res=>{
                this.drivers = res.data
            })
        },


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

        nextPage () {
            if(this.page + 1 <= this.numberOfPages) this.page += 1
        },
        formerPage () {
            if(this.page - 1 >= 1) this.page -= 1
        },
        updateItemsPerPage (number) {
            this.itemsPerPage = number
        },


        openDriverFormDialog(row){
            this.fields = {}
            this.loadProvinces()
            let tempData = []
            this.user_id = row.user_id;
            console.log(this.user_id)
            axios.get('/drivers/' + row.user_id).then(res=>{
                this.fields = res.data
                tempData = res.data
                axios.get('/load-cities?prov=' + this.fields.province).then(res=>{
                    //load barangay
                    this.cities = res.data;
                    this.fields.city = tempData.city;
                    axios.get('/load-barangays?prov=' + this.fields.province + '&city_code='+this.fields.city).then(res=>{
                        this.barangays = res.data;
                        this.fields.barangay = tempData.barangay
                    });
                });

            })

            this.driverFormDialog = true
        },

        openVehicleFormDialog(){
            this.vehicleFormDialog = true
            axios.get('/get-driver-vehicles/' + this.user_id).then(res=>{
                this.vehicles = res.data
            }).catch(err=>{
            
            })
        },

        updateDriverForm(){
            if(this.user_id > 0){
                axios.put('/drivers/' + this.user_id, this.fields).then(res=>{
                    if(res.data.cagadas === 'updated'){
                        this.$refs.myAlertDialog.openAlert({
                            title: 'Saved!',
                            message: 'Successfully saved!'
                        })

                        this.getDriversAccounts()
                        this.driverFormDialog = false
                    }
                }).catch(err=>{
                    if(err.response.status === 422){
                        this.errors = err.response.data.errors;
                    }
                })
            }

        },


        submitVehicleForm(){
            axios.post('/submit-vehicle', this.vehicles).then(res=>{
                
                if(res.data.status === 'updated'){
                    this.$refs.myAlertDialog.openAlert({
                        title: 'Updated!',
                        message: 'Vehicle successfully updated!'
                    })
                }
                this.vehicleFormDialog = false
            }).catch(err=>{
            
            })
        },


        openDeleteDriver(row){
            this.user_id = row.user_id;

            this.deleteAcc
        }

    },

    mounted(){
        this.getDriversAccounts()
    },

    computed: {
        numberOfPages () {
            return Math.ceil(this.drivers.length / this.itemsPerPage)
        },

        filteredKeys () {
            return this.keys.filter(key => key.label !== 'Name')
        },
    }
}
</script>


<style scoped>
.form-registration{
    padding: 15px;
}
</style>