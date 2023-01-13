<template>
    <div class="container-fluid max-content mb-4">
        <div class="container tourism-body mt-3 mb-4">
            <v-card >
                <v-navigation-drawer v-model="drawer" temporary class="navs">
                    <v-divider></v-divider>

                    <v-list-item>
                        <v-list-item-avatar>
                            <img src="../../../pics/perm_identity_white_36dp.svg" class="card-img-top" alt="...">
                        </v-list-item-avatar>

                        <v-list-item-content>
                            <v-list-item-title><h5>Task Force</h5> </v-list-item-title>
                        </v-list-item-content>
                    </v-list-item>
                    <v-divider></v-divider>
                </v-navigation-drawer>

                <v-toolbar color="grey darken-4" dark flat>
                    <v-app-bar-nav-icon @click.stop="drawer = !drawer"></v-app-bar-nav-icon>
                    <v-toolbar-title>
                        <v-list-item-avatar>
                            <img src="../../../pics/perm_identity_white_36dp.svg" class="card-img-top" alt="...">
                        </v-list-item-avatar>
                        Task Force
                    </v-toolbar-title>
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
                            <v-tab>Scan QR</v-tab>
                            <v-tab>Manual Input</v-tab>
                        </v-tabs>
                    </template>
                </v-toolbar>

                <v-tabs-items v-model="tab">
                    <!--                    this is for the scan QR-->
                    <v-tab-item>
                        <v-card flat>
                            <v-card-text>
                                <div class="camera-container">
                                    <div class="camera">
                                        <qrcode-stream :camera="camera" @decode="onDecode" @init="onInit">
                                            <div v-if="validationSuccess" class="validation-success">
                                                Scanned successfully.
                                            </div>

                                            <div v-if="validationFailure" class="validation-failure">
                                                Nothing found.
                                            </div>

                                            <div v-if="validationPending" class="validation-pending">
                                                Processing...
                                            </div>
                                        </qrcode-stream>
                                    </div>

                                    <div class="camera-button mt-1">
                                        <v-btn @click="turnCameraOn">TURN ON</v-btn>
                                        <v-btn @click="turnCameraOff">TURN OFF</v-btn>

                                    </div>


                                </div>
                            </v-card-text>
                        </v-card>
                    </v-tab-item>

                    <v-tab-item>
                        <manual-citation></manual-citation>
                    </v-tab-item>
                </v-tabs-items>
            </v-card>
        </div>


        <v-row justify="center">
            <v-dialog v-model="violationDialog" scrollable persistent max-width="90%">
                <v-card>
                    <v-card-title>
                        <v-icon style="vertical-align: middle"> mdi-alert-circle</v-icon>
                        <h5 class="modal-title text-white" id="staticBackdropLabel">Add Violation</h5>
                        <v-spacer></v-spacer>
                    </v-card-title>
                    <v-card-text style="height: 500px;">
                        <v-divider></v-divider>
                        <div class="">
                            <v-row>
                                <v-col cols="12" md="12" sm="12">
                                    <v-row>
                                        <v-col>
                                            <div class="card-header" v-if="data.driver">
                                                <div class="card-section-text">
                                                    <img :src="`/storage/avatars/${data.driver.avatar}`" class="profile-icon" alt="...">
                                                </div>
                                            </div>
                                        </v-col>
                                    </v-row>


                                    <v-row>
                                        <v-col cols="12">
                                            <div class="info-container">
                                                <div class="container-text"><h2> Driver Information</h2></div>
                                                <table class="info-table">
                                                    <tr>
                                                        <td>Name: </td>
                                                        <td> {{  data.driver.lname  }}, {{  data.driver.fname }} {{ data.driver.mname }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Sex: </td>
                                                        <td> {{  data.driver.sex  }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Address: </td>
                                                        <td> {{  data.driver.province.provDesc  }}, {{ data.driver.city.citymunDesc }} {{ data.driver.city.brgyDesc }} {{ data.driver.street }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>License Expiration: </td>
                                                        <td> {{  data.driver.expr_date  }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Vehicle Expiration: </td>
                                                        <td> {{  data.expr_date  }}</td>
                                                    </tr>

                                                </table>



                                                <div class="violation-container">
                                                    <div class="container-text"><h2>Violation History</h2></div>
                                                    <v-simple-table dark>
                                                        <template v-slot:default>
                                                            <thead>
                                                            <tr>
                                                                <th class="text-left">Citation No</th>
                                                                <th class="text-left"> Plate No.</th>
                                                                <th> Violation </th>
                                                                <th>Penalty</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr
                                                                v-for="(item, index) in violations"
                                                                :key="index"
                                                            >
                                                                <td>{{ item.citation_no }}</td>
                                                                <td>{{ item.plate_no }}</td>
                                                                <td>{{ item.ordinance.ordinance_name }}</td>
                                                                <td>{{ item.ordinance_penalty.cost }}</td>
                                                            </tr>
                                                            </tbody>
                                                        </template>
                                                    </v-simple-table>

                                                </div>
                                            </div>
                                        </v-col>
                                    </v-row>

                                    <v-row class="centered">
                                        <v-col cols="12" md="6">
                                            <v-text-field outlined clearable v-model="fields.citation_no">
                                                    <template v-slot:label>
                                                        <v-icon style="vertical-align: middle">
                                                            mdi-card
                                                        </v-icon>
                                                        Citation No
                                                    </template>
                                            </v-text-field>
                                        </v-col>
                                    </v-row>

                                    <div v-for="(citation, ix) in citations" :key="ix">
                                        <v-row class="centered">
                                            <v-col
                                                cols="12"
                                                md="5"
                                                sm="6">

                                                <v-select
                                                    :items="ordinances"
                                                    item-value="ordinance_id"
                                                    item-text="ordinance_name"
                                                    outlined
                                                    @change="getOrdinancePenalty(citation, ix)"
                                                    v-model="citation.ordinance_id"
                                                    ><template v-slot:label>
                                                        <v-icon style="vertical-align: middle">
                                                            mdi-card
                                                        </v-icon>
                                                        Add Violations
                                                    </template>
                                                </v-select>
                                            </v-col>

                                            <v-col
                                                cols="12"
                                                md="5"
                                                sm="6">
                                                <v-select
                                                    :items="citation.ordinance_penalties"
                                                    item-value="ordinance_penalty_id"
                                                    item-text="offense_order"
                                                    outlined
                                                    v-model="citation.ordinance_penalty_id"
                                                ><template v-slot:label>
                                                    <v-icon style="vertical-align: middle">
                                                        mdi-card
                                                    </v-icon>
                                                    Penalty Cost
                                                </template></v-select>
                                            </v-col>
                                        </v-row>
                                        <div>
                                            <v-btn @click="removeCitation(ix)">
                                                Delete Citation
                                            </v-btn>
                                        </div>
                                    </div>

                                    <div>
                                        <v-btn @click="addCitation">Add Citation</v-btn>
                                    </div>

                                </v-col>
                            </v-row>
                            <v-divider></v-divider>

                        </div>

                    </v-card-text>
                    <v-divider></v-divider>
                    <v-card-actions>
                        <v-spacer></v-spacer>
                        <v-btn
                            outlined
                            text
                            @click="violationDialog = false"
                        >
                            Cancel
                        </v-btn>
                        <v-btn
                            outlined
                            text
                            @click="submitCitation"
                            class="ml-3"
                        >
                            Proceed to Citation
                        </v-btn>
                        <v-spacer></v-spacer>
                    </v-card-actions>

                </v-card>
            </v-dialog>
        </v-row>

    </div>


</template>

<script>
export default {

    data () {
        return {

            isValid: undefined,
            camera: 'off',
            result: null,
            isProcessing: false,

            isModalValidModal: false,

            data: {
                driver: {
                    lname: '',
                    fname: '',
                    sex: '',
                    mobile_no: '',
                    avatar: '',

                    province: {
                        provDesc: '',
                    },
                    city: {
                        citymunDesc: '',
                    },
                    barangay: {
                        brgyDesc: '',
                    }
                }
            },

            fields: {},
            errors: {},

            tab: null,
            drawer: null,
            violationDialog : false,


            violations: [],
            ordinances: [],
           // ordinance_penalties: [],
            citations: [{
                user_id: 0,
                ordinance_id: 0,
                ordinance_penalty_id: 0,
                ordinance_penalties: [],
            }],
        }
    },



    computed: {
        //for qr scanner computed
        validationPending() {
            return this.isProcessing;
        },

        validationSuccess() {

            return this.isValid === true
        },

        validationFailure() {
            return this.isValid === false
        },
    },


    methods: {

        clearFields(){
            this.citations = [{
                user_id: 0,
                ordinance_id: 0,
                ordinance_penalty_id: 0,
                ordinance_penalties: [],
            }];
        },


        logout(){
            axios.post('/logout').then(()=>{
                window.location = '/'
            })
        },

        getViolations(){
            const params = [
                `driver=${this.data.driver.user_id}`
            ].join('&')


            axios.get(`/get-driver-violations?${params}`).then(res=>{
                this.violations = res.data
            })
        },

        //for qr scanner
        onInit (promise) {
            promise
                .catch(console.error)
                .then(this.resetValidationState)
        },

        resetValidationState () {
            this.isValid = undefined
        },

        async onDecode (content) {
            //console.log(content);
            this.result = content;
            this.turnCameraOff();

            // pretend it's taking really long
            this.isProcessing = true;
            //await this.timeout(3000);

            axios.get('/validate-qr/' + content).then(res=>{
                this.user = res.data;
                console.log(this.user)



                this.isProcessing = false;

                if(res.data !== ''){
                    this.isValid = true;
                    this.data = res.data;
                    //this.loadAsyncData();
                    //this.submitTrack();
                    this.violationDialog = true;

                    this.getViolations()
                }else{
                    this.isProcessing = false;
                    this.isValid = false;
                    this.data = {};
                }
            }).catch(err=>{
                this.isProcessing = false;
                this.data = {};
            })
            //this.isValid = content.startsWith('http') //this will return boolean value

            // some more delay, so users have time to read the message
            await this.timeout(2000);
            this.turnCameraOn()
        },


        turnCameraOn () {
            this.camera = 'auto';
        },

        turnCameraOff () {
            this.camera = 'off'
        },

        timeout (ms) {
            return new Promise(resolve => {
                window.setTimeout(resolve, ms)
            })
        },

        addCitation(){
            this.citations.push({
                user_id: 0,
                ordinance_id: 0,
                ordinance_penalty_id: 0,
                ordinance_penalties: [],
            });
        },

        //load data from db
        getOrdinances(){
            const params = [
                `driver=${this.data.driver.user_id}`
            ].join('&')

            axios.get(`/get-all-ordinances`).then(res=>{
                this.ordinances = res.data
            })
        },

        getOrdinancePenalty(row, ix){
            console.log(row)
            let id = row.ordinance_id

            axios.get(`/get-ordinance-penalties/${id}`).then(res=>{
                this.citations[ix].ordinance_penalties = res.data
            })
        },

        removeCitation(index){
            this.citations.splice(index, 1);
        },

        submitCitation(){

            this.fields.driver_id = this.data.driver.user_id;
            this.fields.citations = this.citations

            console.log(this.fields)

            axios.post('/submit-citation', {
                plate_no: this.data.plate_no,
                citation_no: this.fields.citation_no,
                driver_id: this.data.driver.user_id,
                citations: this.citations
            }).then(res=>{
                if(res.data.status === 'saved'){
                    alert('Citation saved')
                    this.violationDialog = false;
                    this.clearFields()
                }
            }).catch(err=>{

            })
        },


    },

    mounted(){
        //this.onDecode('b6ef2d6e64');
        this.getOrdinances();
    }

}


</script>

<style scoped>

.camera-button{
    display: flex;
    justify-content: center;
}
::v-deep .v-application--wrap {
    min-height: fit-content;
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
    min-height: 500px;
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

.driver-icon{
    width: 40px;
    height: 40px;
}
.profile-icon{
    height: 150px;
    width: 150px;
    object-fit: contain;
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
.icons{
    font-size: 25px;
}

.input:focus::placeholder {
    color: #fa4753;
}
label{
    font-size: 12px;
}
.justified{
    text-align: justify;
}
.font12{
    font-size: 13px;
}
.form-registration{
    padding: 30px;

}
.v-text-field, ::v-deep label {
    font-size: 0.9em;
    font-family: monospace;
}
.card-header{
    padding: 15px;
    margin: 15px 0;
}
.font-top{
    font-family: monospace;
    font-size: .8em;
}
.card-section-text{
    text-align: center;
    font-size: 1em;
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







.validation-success,
.validation-failure,
.validation-pending {
    position: absolute;
    width: 100%;
    height: 100%;

    background-color: rgba(255, 255, 255, .8);
    text-align: center;
    font-weight: bold;
    font-size: 1.4rem;
    padding: 10px;

    display: flex;
    flex-flow: column nowrap;
    justify-content: center;
}
.validation-success {
    color: green;
}
.validation-failure {
    color: red;
}

.camera{
    margin: auto;
    width: 240px;
    height: 320px;
    border: 1px solid gray;
}

.decode-result{
    text-align: center;
}


.info-container{
    color: white;
}

.info-table{
    margin: auto;
}
.info-table td{
    font-size: 15px;
}

.container-text{
    font-weight: bold;
    margin: 5px;
    text-align: center;
    padding: 20px;
}
.violation-container{
    margin: 15px 0;
}
.violation-table{
    margin: 0 auto;
}

</style>
