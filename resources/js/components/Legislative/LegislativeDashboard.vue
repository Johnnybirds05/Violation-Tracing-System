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
                        <v-list-item-title><h5>Legislative Office</h5> </v-list-item-title>
                    </v-list-item-content>
                </v-list-item>

                <v-list dense>
                    <v-list-item>
                        <a href="#" class="btn">
                            <button class="cssbuttons-io-button button-back"> Logout
                                <div class="icon">
                                    <svg height="24" width="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M0 0h24v24H0z" fill="none"></path><path d="M16.172 11l-5.364-5.364 1.414-1.414L20 12l-7.778 7.778-1.414-1.414L16.172 13H4v-2z" fill="currentColor"></path></svg>
                                </div>
                            </button>
                        </a>
                    </v-list-item>
                            
                    </v-list>
                        <v-divider></v-divider>
                </v-navigation-drawer>

                <v-toolbar color="grey darken-4" dark flat>
                    <v-app-bar-nav-icon @click.stop="drawer = !drawer"></v-app-bar-nav-icon>
                    <v-toolbar-title>
                        <v-list-item-avatar>
                            <img src="../../../pics/city tourism.jpg" class="card-img-top" alt="...">
                        </v-list-item-avatar>
                        Local Legislative Office
                    </v-toolbar-title>
                    <v-spacer></v-spacer>
                        <template v-slot:extension>
                            <v-tabs v-model="tab" align-with-title>
                            <v-tabs-slider color="white"></v-tabs-slider>
                                <v-tab>Ordinances</v-tab>
                            </v-tabs>
                        </template>
                </v-toolbar>

                <v-tabs-items v-model="tab">



        <v-tab-item>
            <v-card flat>
                <v-card-text>
                            <template>
                                <v-container fluid>
                                    <v-data-iterator
                                        :items="ordinances"
                                        :items-per-page.sync="itemsPerPage"
                                        :page.sync="page"
                                        :search="search"
                                        :sort-by="sortBy.toLowerCase()"
                                        :sort-desc="sortDesc"
                                        hide-default-footer
                                    >
                            <template v-slot:header>
                                <v-toolbar color="dark" class="mb-3">
                                    <img src="./../../../pics/note_alt_white_24dp.svg" class="vehicle-img mr-5">
                                    <h4 class="ml-2">Tangub City Ordinances List</h4>
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
                                        <button class="icon-btn add-btn" @click="ordinanceDialog = true">
                                            <div class="add-icon"></div>
                                            <div class="btn-txt"><b>Add Requirement</b></div>
                                        </button>
                                    
                                </v-toolbar>
                            </template>
                            <template v-slot:default="props">
                                <v-row>
                                    <v-col v-for="item in props.items" :key="item.name" cols="12" sm="10" md="8" lg="6">
                                        <v-card class="table-text" color="brown darken-4">
                                            <v-card-title class="subheading font-weight-bold"> 
                                                <img src="./../../../pics/task_alt_white_24dp.svg" class="vehicle-img mr-5">
                                                    <h6> <b>{{ item.name }}</b> </h6>
                                                    <v-spacer></v-spacer>
                                                            <v-card color="warning">
                                                                <v-icon small class="m-1" @click="ordinanceDialog=  true">
                                                                mdi-pencil
                                                            </v-icon> 
                                                            <v-icon small class="m-1" @click="deleteOrdinanceDialog = true"
                                                            >
                                                                mdi-delete
                                                            </v-icon>
                                                            </v-card>
                                    
                                            </v-card-title>

                                            <v-list dense class="table-text">
                                                <v-list-item>
                                                    <div class="container-fluid">
                                                        <div class="row g-2">
                                                        <div class="col-md-3">
                                                        <h7> <b>Description:</b> </h7>
                                                        </div>
                                                        <div class="col-md-9 justified font12">
                                                        <b>{{item.description}}</b>
                                                        </div>
                                                    </div>

                                                    <div class="container ml-0 mt-3">
                                                        <div class="row g-0 font12" v-if="item.offense1 != ''">
                                                        <div class="col-md-4">
                                                        <b>Date Created: </b>
                                                        </div>
                                                        <div class="col-md-4">
                                                        <span>Php {{item.dateCreated}}</span>
                                                        </div>
                                                    </div>
                                                        <div class="row g-0 font12" v-if="item.offense1 != ''">
                                                        <div class="col-md-4">
                                                        <b>First Offense: </b>
                                                        </div>
                                                        <div class="col-md-5">
                                                        <span>Php {{item.offense1}}</span>
                                                        <span v-if="item.additional1 != ''"> {{item.additional1}}</span>
                                                        </div>
                                                    </div>

                                                    <div class="row g-0 font12" v-if="item.offense2 != ''">
                                                        <div class="col-md-4">
                                                        <b> Second Offense: </b>
                                                        </div>
                                                        <div class="col-md-5">
                                                        <span>Php {{item.offense2}}</span>
                                                        <span v-if="item.additional2 != ''"> {{item.additional2}}</span>
                                                        </div>
                                                    </div>

                                                    <div class="row g-0 font12" v-if="item.offense3 != ''">
                                                        <div class="col-md-4">
                                                        <b>Third Offense: </b>
                                                        </div>
                                                        <div class="col-md-5">
                                                        <span>Php {{item.offense3}}</span>
                                                        <span v-if="item.additional3 != ''"> {{item.additional3}}</span>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    </div>
                                                    
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
        </v-tab-item>

        </v-tabs-items>
                        
            </v-card>

<!-- Modals! -->

            <!-- modal for delete ordinance -->
            <template>
                <v-row justify="center">
                    <v-dialog
                    v-model="deleteOrdinanceDialog"
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
                                    Are you sure you want to delete this ordinance?
                                </div>          
                            </div>                             
                        </v-card-text>
                        <v-divider></v-divider>
                        <v-card-actions>
                            <v-spacer></v-spacer>
                            <v-btn
                                text
                                @click="deleteOrdinanceDialog=false"
                            >
                                Cancel
                            </v-btn>
                            <v-btn

                                text
                                @click="deleteOrdinanceDialog=false"
                            >
                                Proceed
                            </v-btn>
                            <v-spacer></v-spacer>
                        </v-card-actions>
                    </v-card>
                    </v-dialog>
                </v-row>
            </template>

             <!-- modals for edit vehicle registration Requirements -->
             <template>
                    <v-row justify="center">
                        <v-dialog
                        v-model="ordinanceDialog"
                        scrollable
                        persistent
                        max-width="800px"
                        >
                        <v-card>
                            <v-card-title>
                                <v-icon style="vertical-align: middle">
                                    mdi-clipboard-list
                                </v-icon>
                                <h5 class="modal-title text-white" id="staticBackdropLabel">
                                    Ordinance Details
                                </h5>
                                <v-spacer></v-spacer>
                            </v-card-title>
                            <v-card-text style="height: 500px;">
                                <v-divider></v-divider>


                            <div class="form-registration">
                        
                              <v-row>
                                <v-col
                                    cols="12"
                                    md="6"
                                    sm="6">
                                    <v-text-field
                                        outlined
                                        clearable
                                    >
                                    <template v-slot:label>
                                        <v-icon style="vertical-align: middle">
                                          mdi-view-list
                                        </v-icon>
                                        Name
                                    </template>
                                </v-text-field>
                                </v-col>
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
                                                persistent-hint
                                                v-bind="attrs"
                                                v-on="on"
                                            > 
                                            <template v-slot:label>
                                                <v-icon style="vertical-align: middle">
                                                    mdi-calendar
                                                </v-icon>
                                                Date Created
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
                                <v-col
                                    cols="12"
                                    md="12"
                                    sm="6">
                                    <v-textarea
                                        outlined
                                        name="input-7-4"
                                        label="Description"
                                    ></v-textarea>
                                </v-col>
                                
                              </v-row>
                              <v-divider></v-divider>
                            <div class="card-header">
                                <div class="card-section-text">
                                    Fines
                                </div>          
                            </div>
                            <v-divider></v-divider>
                            <v-row>
                                <v-col
                                    cols="12"
                                    md="6"
                                    sm="6">
                                    <v-text-field
                                        outlined
                                        clearable
                                    >
                                    <template v-slot:label>
                                        <v-icon style="vertical-align: middle">
                                          mdi-cash
                                        </v-icon>
                                        First Offense
                                    </template>
                                    </v-text-field>
                                </v-col>

                                <v-col
                                    cols="12"
                                    md="6"
                                    sm="6">
                                    <v-text-field
                                        outlined
                                        clearable
                                    >
                                    <template v-slot:label>
                                        Additional
                                    </template>
                                    </v-text-field>
                                </v-col>
                            </v-row>
                            <v-row>
                                <v-col
                                    cols="12"
                                    md="6"
                                    sm="6">
                                    <v-text-field
                                        outlined
                                        clearable
                                    >
                                    <template v-slot:label>
                                        <v-icon style="vertical-align: middle">
                                          mdi-cash
                                        </v-icon>
                                        Second Offense
                                    </template>
                                    </v-text-field>
                                </v-col>

                                <v-col
                                    cols="12"
                                    md="6"
                                    sm="6">
                                    <v-text-field
                                        outlined
                                        clearable
                                    >
                                    <template v-slot:label>
                                        Additional
                                    </template>
                                    </v-text-field>
                                </v-col>
                            </v-row>

                            <v-row>
                                <v-col
                                    cols="12"
                                    md="6"
                                    sm="6">
                                    <v-text-field
                                        outlined
                                        clearable
                                    >
                                    <template v-slot:label>
                                        <v-icon style="vertical-align: middle">
                                          mdi-cash
                                        </v-icon>
                                        Third Offense
                                    </template>
                                    </v-text-field>
                                </v-col>

                                <v-col
                                    cols="12"
                                    md="6"
                                    sm="6">
                                    <v-text-field
                                        outlined
                                        clearable
                                    >
                                    <template v-slot:label>
                                        Additional
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
                                    @click="ordinanceDialog = false"
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
        </v-app>

        </div>

        </div>
        
        
   
    
</template>

<script>

    export default {
        
    data () {
      return {
        tab: null,
        drawer: null,
        itemsPerPageArray: [2, 4, 8],
        search: '',
        filter: {},
        sortDesc: false,
        page: 1,
        itemsPerPage: 2,
        sortBy: 'name',
        keys: [
          'Name',
          'Description',
          'Datecreated',
          'Offense1',
          'Additional1',
          'Offense2',
          'Additional2',
          'Offense3',
          'Additional3'
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

          fields: [],
          error: [],

          deleteOrdinanceDialog: false,
          ordinanceDialog: false,
      }
    },
    


        computed: {
            numberOfPages () {
                return Math.ceil(this.ordinances.length / this.itemsPerPage)
            },
            filteredKeys () {
                return this.keys.filter(key => key !== 'Name')
            },
        },

            
        methods: {


            nextPage () {
                if(this.page + 1 <= this.numberOfPages) this.page += 1
            },
            formerPage () {
                if(this.page - 1 >= 1) this.page -= 1
            },
            updateItemsPerPage (number) {
                this.itemsPerPage = number
            },

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

<style lang="scss" scoped>

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
    min-height: 680px;
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
</style>
