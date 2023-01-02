<template>
    <v-container>
        <div class="container driver-body mt-3">
            <v-row class="row rowleft p-2">

                <v-col class="col driver-picbox" cols="12" md="2" sm="6">
                      <img src="../../../pics/John Michael Cagadas_.jpg" alt="profile" class="profile">
                      <button class="button btn button-detail text-center mt-2" style="vertical-align:middle" @click="editDialog = true">
                        <span><b>Edit </b></span>
                      </button>
                </v-col>

                <v-col class="cols-name mt-5" cols="12" md="6" sm="6">
                    <h3>NAme</h3>
                    <span>ID: ahdsajsd
                        <b class="status ml-2 p-1" v-if="user.is_verified === 0"> ! Unverified Account</b>
                    </span> <br>
                    <span>Expiration Date:  {{ user.expr_date }}</span> <br>
                    <span>{{ driverAddress }}</span> <br>
                    <span>{{ user.email }}</span> <br>
                    <span>{{ user.mobile_no  }}</span>
                </v-col>

                 <v-col class="col-md-3 logout-button" cols="12"
                            md="2"
                            sm="6">
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
              <template>
                <v-expansion-panels focusable>
                  <v-expansion-panel
                    v-for="(item,i) in 3"
                    :key="i"
                  >
                    <v-expansion-panel-header color="grey darken-4">
                      <v-row class="centers">
                        <v-col
                            cols="12"
                            md="2"
                            sm="6">
                            <img src="../../../pics/truck.jpg" class="vehicle-img">
                        </v-col>
                        <v-col
                            cols="12"
                            md="4"
                            sm="6">
                            
                            <h3 class="vehicle-name mt-3">Model - BodyType</h3> <br>
                            <h5>[platenumber]</h5>
                        </v-col>
                        <v-spacer></v-spacer>
                        <v-col
                            cols="12"
                            md="3"
                            sm="6">
                            
                            <div>
                              <v-alert type="success" class="text-type"> Verified!</v-alert>
                            </div>
                            <!-- <div>
                              <v-alert type="warning" alt="Go to the City Tourism Office" class="text-type"> Unverified!</v-alert>
                            </div> -->
                        </v-col>                                
                    </v-row>
                    </v-expansion-panel-header>
                    <v-expansion-panel-content>
                        <v-row class="vehicle-accord  pa-3">
                          <v-col cols="12" md="9" sm="6">
                              <v-row>
                                <v-col cols="12" md="3" sm="6">
                                  <b> Serial: </b>
                                </v-col>
                                <v-col cols="12" md="2" sm="6">
                                  <b>Color: </b> 
                                </v-col>
                                <v-col cols="12" md="3" sm="6">
                                  <b>Reciept No:</b>
                                </v-col>
                                <v-col cols="12" md="3" sm="6">
                                  <b>Expiration Date: </b>
                                </v-col>
                              </v-row> 
                          </v-col>
                          <v-col cols="2" md="2" sm="6">
                            <button class="noselect" @click="deleteDialog = true">
                              <span class="text">Delete</span><span class="icone"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z"></path></svg></span>
                            </button>
                          </v-col>
                        </v-row> 
                        <v-card class="d-flex align-stretch mt-6" color="warning" dense>
                          <b class="pa-5"> Note: To verify your vehicle information. Please go to the Tangub City, City Tourism Office!</b>
                        </v-card>         
                    </v-expansion-panel-content>
                  </v-expansion-panel>
                </v-expansion-panels>
              </template>
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
              <template>
                <v-expansion-panels focusable>
                  <v-expansion-panel>
                    <v-expansion-panel-header color="grey darken-4">
                      <v-row class="marginNeg">
                        <v-col cols="12" md="2" sm="6">
                            <img src="./../../../pics/no_crash_white_24dp.svg" class="vehicle-img mr-5"> 
                        </v-col>
                        <v-col cols="12" md="6" sm="6">
                            <h3 class="mt-6">Vehicle Registration Requirement</h3>
                        </v-col>                     
                    </v-row>
                    </v-expansion-panel-header>
                    <v-expansion-panel-content>
                      <template>
                        <v-card color="blue darken-4" class="mt-2">
                          <v-card-title>
                            <v-icon class="mr-2">
                              mdi-clipboard-list-outline
                            </v-icon>
                            Requirements
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
                            :items="registrationReq"
                            :search="search"
                          ></v-data-table>
                        </v-card>
                      </template>
                    </v-expansion-panel-content>
                  </v-expansion-panel>
                </v-expansion-panels>
              </template>
            <!-- license Requirement Side -->
              <template>
                <v-expansion-panels focusable>
                  <v-expansion-panel>
                    <v-expansion-panel-header color="grey darken-4">
                      <v-row class="centers marginNeg margin-left">
                        <v-col cols="12" md="2" sm="6">
                          <img src="./../../../pics/how_to_reg_white_24dp.svg" class="vehicle-img mr-5">
                        </v-col>
                        <v-col cols="12" md="6" sm="6">
                            <h3 class="mt-6"> Driver's License</h3>
                        </v-col>                     
                    </v-row>
                    </v-expansion-panel-header>
                    <v-expansion-panel-content>
                      <template>
                        <v-card color="blue darken-4" class="mt-2">
                          <v-card-title>
                            <v-icon class="mr-2">
                              mdi-clipboard-list-outline
                            </v-icon>
                            Requirements
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
                            :headers="headersLicense"
                            :items="licenseReq"
                            :search="search"
                          ></v-data-table>
                        </v-card>
                      </template>
                    </v-expansion-panel-content>
                  </v-expansion-panel>
                </v-expansion-panels>
              </template>
            </v-container>
          </v-card-text>
        </v-card>
      </v-tab-item>


      <!-- this is for the Violation tab -->
      <v-tab-item>
        <v-card flat>
          <v-card-text>
            <template>
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
            </template>
            <v-alert dense
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
            <template>
                <v-expansion-panels focusable>
                  <v-expansion-panel
                    v-for="(item,i) in ordinances"
                    :key="i"
                  >
                    <v-expansion-panel-header color="grey darken-4">
                      <v-row class="centers marginNeg margin-left">
                        <v-col
                            cols="12"
                            md="1"
                            sm="6">
                            <img src="./../../../pics/feed_white_24dp.svg" class="ordinance-img mr-5 mt-3">
                        </v-col>
                        <v-col
                            cols="12"
                            md="4"
                            sm="6">
                            
                            <h3 class="vehicle-name mt-5">{{ item.name }}</h3>
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

                      <v-row>
                        <v-col cols="12" md="3" sm="6">
                          <b> First Offense: </b> 
                        </v-col>
                        <v-col cols="12" md="2" sm="2">
                          Php {{ item.offense1 }}
                        </v-col>
                        <v-col cols="12" md="2" sm="2">
                          {{ item.additional1 }} 
                        </v-col>
                      </v-row> 

                      <v-row>
                        <v-col cols="12" md="3" sm="6">
                          <b> Second Offense: </b> 
                        </v-col>
                        <v-col cols="12" md="2" sm="2">
                          Php {{ item.offense2 }}
                        </v-col>
                        <v-col cols="12" md="2" sm="2">
                          {{ item.additional2 }}
                        </v-col>
                      </v-row>

                      <v-row>
                        <v-col cols="12" md="3" sm="6">
                          <b> Third Offense: </b> 
                        </v-col>
                        <v-col cols="12" md="2" sm="2">
                          Php {{ item.offense3 }}
                        </v-col>
                        <v-col cols="12" md="2" sm="2">
                          {{ item.additional3 }}
                        </v-col>
                      </v-row> 
                               
                    </v-expansion-panel-content>
                  </v-expansion-panel>
                </v-expansion-panels>
              </template>
          </v-card-text>
        </v-card>
      </v-tab-item>
                    </v-tabs>
                  </v-card>
            </v-app>
        </div>

<!-- Modals -->
<!-- modals for edit -->
        <template>
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
      </template>
<!-- modals for delete -->
      <template>
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
                          @click="deleteDialog=false"
                      >
                          Proceed
                      </v-btn>
                      <v-spacer></v-spacer>
                  </v-card-actions>
              </v-card>
              </v-dialog>
          </v-row>
      </template>


      <!-- Modal for Add Vehicle -->
                <template>
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
                                <v-col
                                    cols="12"
                                    md="4"
                                    sm="6">
                                    <v-text-field
                                        :rules="validate.modelRules"
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
                                        :rules="validate.bTypeRules"
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
                                        :rules="validate.colorRules"
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
                                        :rules="validate.serialRules"
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
                                        :rules="validate.colorRules"
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
                                        :rules="validate.colorRules"
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
      </v-container>

</template>

<script>
export default {

    mounted(){
        this.intiData()

        this.getUser()
        $(function() {
                $('#expiration').datepicker();
            });
    },

    data () {
        return {
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


            fields: {},
            errors: {},

            search: '',
            headers: [
              {
                text: 'Name',
                align: 'start',
                sortable: false,
                value: 'name',
              },
              { text: 'Location', value: 'location' },
              { text: 'Cost', value: 'cost' },
            ],

            registrationReq: [
            {
              name : 'Barangay Clearance',
              location : 'Current Address',
              cost : 0,
            },
            {
              name : 'Insurance',
              location : 'LTO',
              cost : 750
            },
            {
              name : 'Smoke Test',
              location : 'LTO',
              cost : 500
            },
            {
              name : 'Smoke Test',
              location : 'LTO',
              cost : 500
            }
          ],
          headersLicense: [
              {
                text: 'Name',
                align: 'start',
                sortable: false,
                value: 'name',
              },
              { text: 'Location', value: 'location' },
              { text: 'Cost', value: 'cost' },
            ],
            licenseReq: [
            {
              name : 'PSA Birth Certificate',
              location : 'Gaisano Ozamis City',
              cost : '120'
            },
            {
              name : 'Driving School',
              location : 'LTO',
              cost : '0'
            },

          ],

          headers: [
              {
                text: 'Name',
                align: 'start',
                sortable: false,
                value: 'name',
              },
              { text: 'Location', value: 'location' },
              { text: 'Cost', value: 'cost' },
            ],
            headersViolations: [
              {
                text: 'Name',
                align: 'start',
                sortable: false,
                value: 'name',
              },
              { text: 'Date', value: 'date' },
              { text: 'Fines', value: 'fines' },
              { text: 'Day Left', value: 'dayLeft' },
              { text: 'Status', value: 'status' },
            ],


          violations : [
            {
              name : 'Wearing of Slippers',
              date : '12/26/22',
              fines : 120,
              dayLeft : 2,
              status : false,

            },
            {
              name : 'No Helmet',
              date : '12/23/22',
              fines : 500,
              dayLeft : 2,
              Status : true,
            },
            {
              name : 'No License',
              date : '12/23/22',
              fines : 200,
              dayLeft : 2,
              status : true,
            }
          ],
          ordinances : [
            {
              name: 'Wearing of Slippers',
              description : 'Wearing of slippers while riding will violate the city ordinance code 1237 that states that all the driver must wear shoes!',
              dateCreated: '12/12/12', 
              offense1: 100,
              additional1: '' ,
              offense2: 500,
              additional2: '' ,
              offense3: 1000,
              additional3: '' ,
            },
            {
              name: 'No Helmet',
              description : "All driver's must wear helmet all the time to protect their head from collision caused by accident and etc. ",
              dateCreated: '12/12/12',
              offense1: 500,
              additional1: '' ,
              offense2: 1000,
              additional2: 'impounding' ,
              offense3: 1000,
              additional3: 'impounding' ,
            },
            {
              name: "No Driver's License",
              description : "All driver's must obtain a license before driving a vehicle to ensure that he is capable of observing the road policy and guidelines",
              dateCreated: '12/12/11',
              offense1: 500,
              additional1: '' ,
              offense2: 1000,
              additional2: 'impounding' ,
              offense3: 1000,
              additional3: 'impounding' ,
            },
            {
              name: "No Vehicle Registration",
              description : "All vehicle must be registered to the LTO to ensure that the vehicle is rightfully owned by the driver and not from car nap.",
              dateCreated: '09/05/12', 
              offense1: 500,
              additional1: '' ,
              offense2: 1000,
              additional2: 'impounding' ,
              offense3: 1000,
              additional3: 'impounding' ,
            },
            {
              name: "No Side Mirror",
              description : "The vehicle must be equipped with a side mirror to ensure that the driver will be able to detect what's happening in his back view to avoid collision.",
              dateCreated: '07/17/12', 
              offense1: 500,
              additional1: '' ,
              offense2: 1000,
              additional2: 'impounding' ,
              offense3: 1000,
              additional3: 'impounding' ,
            },
            {
              name: "No Back Light",
              description : "The vehicle must be equipped with a backlight for the rider following them during night will be able to detect the driver's presence and avoid collision.",
              dateCreated: '02/11/12', 
              offense1: 500,
              additional1: '' ,
              offense2: 1000,
              additional2: 'impounding' ,
              offense3: 1000,
              additional3: 'impounding' ,
            },
            {
              name: "No Rear Light",
              description : "The vehicle must be equipped with a rear light to have a vision during night time and in dark places to avoid collision.",
              dateCreated: '12/12/12', 
              offense1: 500,
              additional1: '' ,
              offense2: 1000,
              additional2: 'impounding' ,
              offense3: 1000,
              additional3: 'impounding' ,
            },
            {
              name: "No Signal Light",
              description : "The vehicle must be equipped with a signal light for the other driver to be aware when the said driver will change its direction.",
              dateCreated: '05/12/16',
              offense1: 500,
              additional1: '' ,
              offense2: 1000,
              additional2: 'impounding' ,
              offense3: 1000,
              additional3: 'impounding' ,
            },
          ],

          editDialog:false,
          deleteDialog:false,
          addVehicleDialog: false,

          validate: {
                modelRules: [
                    v => !!v || 'Model is required',
                ],
                bTypeRules: [
                    v => !!v || 'Body Type is required',
                ],
                colorRules: [
                    v => !!v || 'Model is required',
                ],
                recieptRules: [
                    v => !!v || 'Model is required',
                ],
                serialRules: [
                    v => !!v || 'Model is required',
                ],
                photoRules: [
                    v => !!v || 'Model is required',
                ],
                plateRules: [
                    v => !!v || 'Model is required',
                ],
                exprRules: [
                    v => !!v || 'Model is required',
                ],
          }

        }
        
    },

    methods: {

        intiData(){
            // var myModal = document.getElementById('myModal')
            // var myInput = document.getElementById('myInput')

            // myModal.addEventListener('shown.bs.modal', function () {
            //     myInput.focus()
            // })

            $('#expiration').datepicker();

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

        submitVehicle(){
            axios.post('/').then(res=>{
            
            }).catch(err=>{
            
            })
        }
    },

    computed: {

        fullName(){
            return this.user.fname + ' ' + this.user.mname + ' ' + this.user.lname + ' ' + this.user.suffix;
        },

        driverAddress(){
            return this.user.province.provDesc+ ', ' + this.user.city.citymunDesc + ' ' + this.user.barangay.brgyDesc + ' ' + this.user.street;
        }
    }



}


</script>

<style lang="scss" scoped>
h3{
  font-family:Helvetica;
  top: 10px;
}
.vehicle-accord{
  color: rgb(255, 255, 255);
  font-family: monospace;
  font-size: .9em;
}
.driver-body{
    width: 100%;
    background-color: rgb(46, 46, 46);
    font-family: monospace;
    color: white;
    font-size: 15px;
    opacity: .8;
}
.profile{
  width: 130px;
  height: 130px;
  object-fit: contain;
  border-radius: 100px;
  border: 5px solid rgb(156, 156, 156);
}
.driver-picbox{
    width: 250px;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    overflow: hidden;
    flex-direction: column;

}
.rowleft{
    position: relative;
    left: 0px;
    width: 100%;
}

.drivers-links{
    width: 100%;
    min-height: 400px;
    font-family: monospace;
    position: relative;
    margin-bottom: 20px;
}
::v-deep .v-application--wrap {
    min-height: fit-content;
  }
.logout-button{
    position: absolute;
    top: 50px;
    right: 50px;
    width: 150px;
}
.tabs-title{
    font-size: 12px;
}
.overflowing{
  max-height: 500px;
  overflow-y: auto;
  overflow-x: auto;
}

.vehicle-img{
  width: 60px;
  height: 60px;
  object-fit: contain;
  border-radius: 10px;
  border: 2px solid rgb(80, 80, 80);
}
.text-type{
  font-size: 13px;
  height: 55px;
  width: 140px;
}
.ordinance-img{
  width: 30px;
}
.status{
  width: 200px;
  height: 40px;
  font-size: 11px;
  background-color: rgb(107, 11, 11);
}
.button-detail{
  font-family: Arial, Helvetica, sans-serif;
  font-size: 15px;
  color: white;
  border: 1px solid white;
}
.text-white{
  color: white;
}
.tab-size{
  width: 10%;
}
.centered{
    display: flex;
    justify-content: center;
    align-items: center;
    color: blanchedalmond;
    border-radius: 10px;
}
.icons{
    font-size: 25px;
  }
  .form-registration{
    padding-left: 20px;
    padding-right: 20px;
    padding-bottom: 20px;
  }
  .card-header{
    padding: 15px;
    margin: 15px 0;
  }
  .card-section-text{
    text-align: center;
    font-size: 1em;
    font-family: monospace;
  }
  .v-text-field, ::v-deep label {
  font-size: .9em;
  font-family: monospace;
}
.marginNeg{
  margin-top: -30px;
}
@media only screen and (max-width: 500px){
    .cols-name{
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 100px;
    }
    .logout-button{
        top: 5px;
        right: 5px;
        font-size: 10px;
        width: 100px;
    }
    .drivers-links{
        width: 100%;
    }
    .driver-body{
        width: 100%;
    }
    .vehicle-img{
      width: 30px;
      height: 30px;
    }

}
</style>
