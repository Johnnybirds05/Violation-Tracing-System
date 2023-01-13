<template>
    <div class="container-fluid max-content mb-4">
        <div class="container tourism-body mt-3 mb-4">
            <v-app>
                <v-card >
                    <v-navigation-drawer v-model="drawer" temporary class="navs">
                        <v-divider></v-divider>
                        <v-list-item>
                            <v-list-item-avatar>
                                <img src="../../../pics/city tourism.jpg" class="card-img-top" alt="...">
                            </v-list-item-avatar>

                            <v-list-item-content>
                                <v-list-item-title><h5>Tourism Office</h5> </v-list-item-title>
                            </v-list-item-content>
                        </v-list-item>
                    </v-navigation-drawer>

                    <v-toolbar color="grey darken-4" dark flat>
                        <v-app-bar-nav-icon @click.stop="drawer = !drawer"></v-app-bar-nav-icon>
                        <v-toolbar-title>
                            <v-list-item-avatar>
                                <img src="../../../pics/city tourism.jpg" class="card-img-top" alt="...">
                            </v-list-item-avatar>
                            Tourism Office
                        </v-toolbar-title>
                        <v-spacer></v-spacer>
                        <v-spacer></v-spacer>

                        <v-toolbar-title>
                            <v-list-item>
                                <button class="cssbuttons-io-button button-back" @click="logout"> Logout
                                    <div class="icon">
                                        <svg height="24" width="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M0 0h24v24H0z" fill="none"></path><path d="M16.172 11l-5.364-5.364 1.414-1.414L20 12l-7.778 7.778-1.414-1.414L16.172 13H4v-2z" fill="currentColor"></path></svg>
                                    </div>
                                </button>
                            </v-list-item>
                        </v-toolbar-title>

                        <template v-slot:extension>
                            <v-tabs v-model="tab" align-with-title>
                                <v-tabs-slider color="white"></v-tabs-slider>
                                <v-tab>Drivers</v-tab>
                                <v-tab>Requirements</v-tab>
                                <v-tab>Accounts</v-tab>
                            </v-tabs>
                        </template>
                    </v-toolbar>

                    <v-tabs-items v-model="tab">

                        <!-- This is for the driver's data -->
                        <v-tab-item>
                            <!--driver panel here -->
                            <driver-list></driver-list>

                        </v-tab-item>


                        <!-- This is for the requirement Side -->
                        <v-tab-item>
                            <verification-requirement></verification-requirement>
                        </v-tab-item>

                        <!-- This is for the office Account -->
                        <v-tab-item>
                            <v-card flat>
                                <v-card-text>
                                    <div class="w-button-container">
                                        <v-btn @click="editOffice(0)">New</v-btn>
                                    </div>

                                    <v-divider></v-divider>
                                    <v-row>
                                        <v-col>
                                            <v-card class="ma-3">
                                                <v-card-title>
                                                    Office Account
                                                </v-card-title>
                                                <v-simple-table dark>
                                                    <template v-slot:default>
                                                    <thead>
                                                        <tr>
                                                            <th class="text-left">
                                                                Office Type
                                                            </th>
                                                            <th class="text-left">
                                                                Username
                                                            </th>
                                                            <th class="text-left">
                                                                Name
                                                            </th>
                                                            <th>
                                                                Actions
                                                            </th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr v-for="(item, index) in accounts"
                                                            :key="index"
                                                        >
                                                            <td>{{ item.role }}</td>
                                                            <td>{{ item.username }}</td>
                                                            <td>{{ item.lname }}, {{  item.fname }} {{ item.mname }}</td>
                                                            <td>
                                                                <v-icon small class="mr-2" @click="editOffice(item.user_id)">
                                                                    mdi-pencil
                                                                </v-icon>
                                                                <v-icon small @click="deleteOffice(item.user_id)">
                                                                    mdi-delete
                                                                </v-icon>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                    </template>
                                                </v-simple-table>
                                            </v-card>
                                        </v-col>
                                    </v-row>
                                </v-card-text>
                            </v-card>
                        </v-tab-item>
                    </v-tabs-items> <!-- close tabs -->

                </v-card> <!-- card -->
            </v-app>

        </div>

        <!-- Modals! -->

        <!-- Delete Office -->
        <template>
            <v-row justify="center">
                <v-dialog
                    v-model="deleteOfficeDialog"
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
                                    Are you sure you want to delete this office account?
                                </div>
                            </div>
                        </v-card-text>
                        <v-divider></v-divider>
                        <v-card-actions>
                            <v-spacer></v-spacer>
                            <v-btn
                                text
                                @click="deleteOfficeDialog=false"
                            >
                                Cancel
                            </v-btn>
                            <v-btn

                                text
                                @click="submitDelete"
                            >
                                Proceed
                            </v-btn>
                            <v-spacer></v-spacer>
                        </v-card-actions>
                    </v-card>
                </v-dialog>
            </v-row>
        </template>



        <!-- modals for view vehicle list -->
        <template>
            <v-row justify="center">
                <v-dialog
                    v-model="addVehicleDialog"
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


                            <div class="form-registration">
                                <v-row>
                                    <v-col
                                        cols="12"
                                        md="3"
                                        sm="6">
                                        <button class="dev-buttons">
                                            <svg height="24" width="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M0 0h24v24H0z" fill="none"></path><path d="M5 13c0-5.088 2.903-9.436 7-11.182C16.097 3.564 19 7.912 19 13c0 .823-.076 1.626-.22 2.403l1.94 1.832a.5.5 0 0 1 .095.603l-2.495 4.575a.5.5 0 0 1-.793.114l-2.234-2.234a1 1 0 0 0-.707-.293H9.414a1 1 0 0 0-.707.293l-2.234 2.234a.5.5 0 0 1-.793-.114l-2.495-4.575a.5.5 0 0 1 .095-.603l1.94-1.832C5.077 14.626 5 13.823 5 13zm1.476 6.696l.817-.817A3 3 0 0 1 9.414 18h5.172a3 3 0 0 1 2.121.879l.817.817.982-1.8-1.1-1.04a2 2 0 0 1-.593-1.82c.124-.664.187-1.345.187-2.036 0-3.87-1.995-7.3-5-8.96C8.995 5.7 7 9.13 7 13c0 .691.063 1.372.187 2.037a2 2 0 0 1-.593 1.82l-1.1 1.039.982 1.8zM12 13a2 2 0 1 1 0-4 2 2 0 0 1 0 4z" fill="currentColor"></path></svg>
                                            <span>Generate QR</span>
                                        </button>
                                    </v-col>
                                    <v-col
                                        cols="12"
                                        md="2"
                                        sm="6">
                                        <label class="switch">
                                            <input type="checkbox" class="inputer">
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
                                            clearable
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

                                            :items="['Motocycle', 'Tricycle','Truck','Car']"
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

                                    <v-col cols="12" md="6" sm="6">
                                        <v-file-input
                                            v-model="fields.picture"
                                            counter
                                            multiple
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
                                @click="addVehicleDialog = false"
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
        <!-- add edit offices account -->
        <template>
            <v-row justify="center">
                <v-dialog
                    v-model="officeDialog"
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
                                Office Account Information
                            </h5>
                            <v-spacer></v-spacer>
                        </v-card-title>
                        <v-card-text>
                            <v-divider></v-divider>


                            <div class="form-registration">

                                <v-row>
                                    <v-col
                                        cols="12" md="4" sm="6">
                                        <v-select v-model="fields.role"
                                            :items="['TASK FORCE', 'LEGAL COUNSEL', 'TOURISM',
                                                'LOCAL LEGISLATIVE', 'TREASURY']"
                                            outlined
                                        ><template v-slot:label>
                                            <v-icon style="vertical-align: middle">
                                                mdi-office-building
                                            </v-icon>
                                            Office Type
                                        </template></v-select>
                                    </v-col>
                                    <v-col
                                        cols="12" md="4" sm="4">
                                        <v-text-field outlined clearable v-model="fields.username">
                                            <template v-slot:label>
                                                <v-icon style="vertical-align: middle">
                                                    mdi-account-check
                                                </v-icon>
                                                Username
                                            </template>
                                        </v-text-field>
                                    </v-col>
                                    <v-col cols="12" md="4" sm="6" v-if="user_id < 1">
                                        <v-text-field v-model="fields.password"
                                            :append-icon="show.password ? 'mdi-eye' : 'mdi-eye-off'"
                                            :type="show.password ? 'text' : 'password'"
                                            label="Not visible"
                                            class="input-group--focused"
                                            @click:append="show.password = !show.password"
                                            outlined>
                                            <template v-slot:label>
                                                <v-icon style="vertical-align: middle">
                                                    mdi-lock-question
                                                </v-icon>
                                                Enter password
                                            </template>
                                        </v-text-field>
                                    </v-col>
                                </v-row>

                                <v-row>
                                    <v-col>
                                        <v-text-field outlined clearable v-model="fields.lname">
                                            <template v-slot:label>
                                                <v-icon style="vertical-align: middle">
                                                    mdi-account-check
                                                </v-icon>
                                                Last Name
                                            </template>
                                        </v-text-field>
                                    </v-col>
                                    <v-col>
                                        <v-text-field outlined clearable v-model="fields.fname">
                                            <template v-slot:label>
                                                <v-icon style="vertical-align: middle">
                                                    mdi-account-check
                                                </v-icon>
                                                First Name
                                            </template>
                                        </v-text-field>
                                    </v-col>
                                </v-row>
                                <v-row>
                                    <v-col>
                                        <v-text-field outlined clearable v-model="fields.mname">
                                            <template v-slot:label>
                                                <v-icon style="vertical-align: middle">
                                                    mdi-account-check
                                                </v-icon>
                                                Middle Name
                                            </template>
                                        </v-text-field>
                                    </v-col>
                                    <v-col>
                                        <v-text-field outlined clearable v-model="fields.suffix">
                                            <template v-slot:label>
                                                <v-icon style="vertical-align: middle">
                                                    mdi-account-check
                                                </v-icon>
                                                Suffix
                                            </template>
                                        </v-text-field>
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
                                @click="officeDialog = false"
                            >
                                Cancel
                            </v-btn>
                            <v-btn
                                outlined
                                text
                                @click="submitAccount"
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
    </div>




</template>

<script>

export default {

    data () {
        return {
            show: {
                password: false,
                repeat_password: false
            },

            accounts: [],

            user_id: 0,



            show3: false,

            fields: {},
            errors: {},

            drivers: [],

            provinces: [],
            cities: [],
            barangays: [],
            street: '',

            tab: null,
            drawer: null,


            promptDeleteDialog: false,
            deleteRegistrationDialog: false,

            deleteLicenseDialog: false,
            deleteOfficeDialog: false,
            addVehicleDialog: false,
            driverDialog: false,
            registrationDialog: false,
            licenseDialog: false,
            officeDialog: false,


        }
    },

    computed: {


        numberOfPagesVreq () {
            return Math.ceil(this.registrationReq.length / this.itemsPerPageVreq)
        },
        filteredKeysVreq () {
            return this.keysVreq.filter(key => key !== 'Name')
        },

        numberOfPagesLreq () {
            return Math.ceil(this.licenseReq.length / this.itemsPerPageLreq)
        },
        filteredKeysLreq () {
            return this.keysLreq.filter(key => key !== 'Name')
        },
    },


    methods: {

        getAccounts(){
            axios.get('/get-accounts-tourism').then(res=>{
                this.accounts = res.data
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

        nextPageVreq () {
            if(this.pageVreq + 1 <= this.numberOfPagesVreq) this.pageVreq += 1
        },
        formerPageVreq () {
            if(this.pageVreq - 1 >= 1) this.pageVreq -= 1
        },
        updateItemsPerPageVreq (numberVreq) {
            this.itemsPerPageVreq = numberVreq
        },

        nextPageLreq () {
            if(this.pageLreq + 1 <= this.numberOfPagesLreq) this.pageLreq += 1
        },
        formerPageLreq () {
            if(this.pageLreq - 1 >= 1) this.pageLreq -= 1
        },
        updateItemsPerPageLreq (numberLreq) {
            this.itemsPerPageLreq = numberLreq
        },


        logout(){
            axios.post('/logout').then(()=>{
                window.location = '/'
            })
        },

        submitAccount(){
            if(this.user_id > 0){
                axios.put('/accounts/'+ this.user_id, this.fields).then(res=>{
                    if(res.data.status === 'updated'){
                        alert('Successfully updated')
                    }
                    this.officeDialog = false
                    this.getAccounts()

                }).catch(err=>{
                    if(err.response.status === 422){
                        this.errors = err.response.data.errors
                    }
                })
            }else{
                axios.post('/accounts', this.fields).then(res=>{
                    if(res.data.status === 'saved'){
                        alert('Successfully saved')
                    }
                    this.officeDialog = false
                    this.getAccounts()

                }).catch(err=>{
                    if(err.response.status === 422){
                        this.errors = err.response.data.errors
                    }
                })
            }

        },

        getData(itemId){
            axios.get('/accounts/' + itemId).then(res=>{
                this.fields = res.data
            })
        },

        editOffice(itemId){

            this.fields = {}
            this.errors = {}


            this.officeDialog = true
            this.user_id = itemId;

            if(this.user_id > 0){

                this.getData(itemId)
            }
        },



        deleteOffice(itemId){
            this.deleteOfficeDialog = true
            this.user_id = itemId;
        },

        submitDelete(){
            axios.delete('/accounts/' + this.user_id).then(res=>{
                if(res.data.status === 'deleted'){
                    alert('Deleted successfully successfully.')

                    this.deleteOfficeDialog = false
                    this.getAccounts()
                }
            })
        }


    },
    mounted() {
        this.getAccounts()
        //this.getOfficeAccounts()
    }

}


</script>

<style lang="scss" scoped>

::v-deep .v-application--wrap {
    min-height: fit-content;
}
.register-fills{
    display: flex;
    justify-content: center;
    align-items: center;
    margin: 5px;
}
.tourism-body{
    width: 95%;
    font-family: monospace;
    color: white;
    font-size: 15px;
    opacity: .8;
    border-radius: 10px;
}
.max-content{
    max-height: fit-content;
    min-height: 650px;
}
.navs{
    position: absolute;
    height: 200px;
}
.table-text{
    background-color: rgb(41, 41, 41);
    color: rgb(255, 255, 255);
    font-family: monospace;
}
.profile{
    width: 80px;
    height: 80px;
    object-fit: contain;
    border-radius: 4px;
    border: 2px solid rgb(151, 151, 151);
    margin-right: 10px;
}
.text-white{
    color: white;
}
.centered{
    display: flex;
    justify-content: center;
    align-items: center;
    color: blanchedalmond;
    border-radius: 10px;
}
.button-tourism{
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    position: relative;
}
.driver-icon{
    width: 40px;
    height: 40px;
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
.w-button-container{
        display: flex;
        margin: 30px 0 10px 30px;
    }
label{
    font-size: 12px;
}
.icons{
    font-size: 25px;
}
.button-detail{
    font-family: Arial, Helvetica, sans-serif;
    font-size: 15px;
    color: white;
    border: 1px solid white;
}
.form-registration{
    padding: 30px;

}
.v-text-field, ::v-deep label {
    font-size: 0.9em;
    font-family: monospace;
}
@media only screen and (max-width: 750px){
    .button-tourism{
        flex-direction: row;
        left: -10%;
        margin-top: 3%;
    }

}
@media only screen and (max-width: 450px){
    .button-tourism{
        flex-direction: row;
        left: -25%;
        margin-top: 3%;
    }

}
@media only screen and (max-width: 400px){
    .button-tourism{
        flex-direction: row;
        left: -30%;
        margin-top: 3%;
    }

}
</style>
