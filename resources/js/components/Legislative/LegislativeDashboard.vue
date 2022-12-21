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


<!-- This is for the requirement Side -->
        <v-tab-item>
            <v-card flat>
                <v-card-text>
<!-- this is for the vehicle registration -->
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
                                    <img src="./../../../pics/no_crash_white_24dp.svg" class="vehicle-img mr-5">
                                    <h6 class="ml-2">Tangub City Ordinances List</h6>
                                <v-spacer></v-spacer>
                                <div class="containered">
                                        <input placeholder="Type to search..." required="" class="inputted" name="text" type="text" v-model="searchVreq">
                                        <div class="icon">
                                            <svg viewBox="0 0 512 512" class="ionicon" xmlns="http://www.w3.org/2000/svg">
                                                <title>Search</title>
                                                <path stroke-width="32" stroke-miterlimit="10" stroke="currentColor" fill="none" d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z"></path>
                                                <path d="M338.29 338.29L448 448" stroke-width="32" stroke-miterlimit="10" stroke-linecap="round" stroke="currentColor" fill="none"></path>
                                            </svg>
                                        </div>
                                    </div>
                                        <button class="icon-btn add-btn" data-bs-toggle="modal" data-bs-target="#editRegistration">
                                            <div class="add-icon"></div>
                                            <div class="btn-txt"><b>Add Requirement</b></div>
                                        </button>
                                    
                                </v-toolbar>
                            </template>
                            <template v-slot:default="props">
                                <v-row>
                                    <v-col v-for="item in props.items" :key="item.name" cols="12" sm="10" md="8" lg="6">
                                        <v-card class="table-text" color="blue darken-4">
                                            <v-card-title class="subheading font-weight-bold">  
                                                    <h6>{{ item.name }}</h6>
                                                    <v-spacer></v-spacer>
                                                            <v-card color="warning">
                                                                <v-icon small class="m-1" data-bs-toggle="modal" data-bs-target="#editRegistration">
                                                                mdi-pencil
                                                            </v-icon> 
                                                            <v-icon small class="m-1" data-bs-toggle="modal" data-bs-target="#delete-Vreq"
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
                                                        <h7> Description: </h7>
                                                        </div>
                                                        <div class="col-md-9">
                                                        <b>{{item.description}}</b>
                                                        </div>
                                                    </div>

                                                    <div class="container ml-0 mt-3">
                                                        <div class="row g-0" v-if="item.offense1 != ''">
                                                        <div class="col-md-3">
                                                        <b>Date Created: </b>
                                                        </div>
                                                        <div class="col-md-4">
                                                        <span>Php {{item.dateCreated}}</span>
                                                        </div>
                                                    </div>
                                                        <div class="row g-0" v-if="item.offense1 != ''">
                                                        <div class="col-md-3">
                                                        <b>First Offense: </b>
                                                        </div>
                                                        <div class="col-md-5">
                                                        <span>Php {{item.offense1}}</span>
                                                        <span v-if="item.additional1 != ''"> {{item.additional1}}</span>
                                                        </div>
                                                    </div>

                                                    <div class="row g-0" v-if="item.offense2 != ''">
                                                        <div class="col-md-3">
                                                        <b> Second Offense: </b>
                                                        </div>
                                                        <div class="col-md-5">
                                                        <span>Php {{item.offense2}}</span>
                                                        <span v-if="item.additional2 != ''"> {{item.additional2}}</span>
                                                        </div>
                                                    </div>

                                                    <div class="row g-0" v-if="item.offense3 != ''">
                                                        <div class="col-md-3">
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
        </v-tab-item>

        </v-tabs-items>
                        
            </v-card>
        </v-app>

        </div>

<!-- Modals! -->

            <!-- modal for delete account -->
                <div class="modal fade" id="delete-account" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content bg-dark">
                        <div class="modal-header">
                            <h5 class="modal-title  text-white" id="exampleModalLabel">Warning!</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-white">
                            Are you sure you want delete this Account?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="button-back btn-success" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="button-back btn-danger">Save changes</button>
                        </div>
                        </div>
                    </div>
                </div>


            <!-- modals for edit vehicle registration Requirements -->
            <div class="modal fade" id="editRegistration" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
                        <div class="modal-content bg-dark">
                        <div class="modal-header">
                            <h5 class="modal-title text-white" id="staticBackdropLabel">
                                <img src="../../../pics/no_crash_white_24dp.svg" class="driver-icon" alt="...">
                                Registration Requirement</h5>
                                <v-spacer></v-spacer>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-white">
                            <div class="row g-3 centered">
                                <div class="col-md-3">
                                    <label class="form-label"> Name: </label>
                                    <input type="text" class="form-control input" id="driver-firstname">
                                </div>

                                <div class="col-md-3">
                                    <label class="form-label"> Location: </label>
                                    <input type="text" class="form-control input" id="driver-firstname">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label"> Cost: </label>
                                    <input type="text" class="form-control input" id="driver-firstname">
                                </div>

                            </div>  
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="button-back btn-primary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="button-back btn-success">Save</button>
                        </div>
                        </div>
                    </div>
            </div>


        </div>
        
        
   
    
</template>

<script>

    export default {
        
    data () {
      return {
        tab: null,
        drawer: null,
        itemsPerPageArray: [3, 6, 9],
        search: '',
        filter: {},
        sortDesc: false,
        page: 1,
        itemsPerPage: 3,
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
    min-height: 550px;
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
.justified{
    text-align: justify;
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
