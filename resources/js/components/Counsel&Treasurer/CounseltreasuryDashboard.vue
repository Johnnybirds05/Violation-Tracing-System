<template>
    <div class="container-fluid max-content mb-4">
        <div class="container tourism-body mt-3 mb-4">
        <v-app>
            <v-card >
                <v-navigation-drawer v-model="drawer" temporary class="navs">
                    <v-divider></v-divider>
                <v-list-item>
                    <v-list-item-avatar>
                        <img src="../../../pics/account.svg" class="card-img-top" alt="...">
                    </v-list-item-avatar>

                    <v-list-item-content>
                        <v-list-item-title><h5>City Treasurer's Office</h5> </v-list-item-title>
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
                            <img src="../../../pics/user.svg" class="card-img-top" alt="...">
                        </v-list-item-avatar>
                        City Treasurer's Office
                    </v-toolbar-title>
                    <v-spacer></v-spacer>
                        <template v-slot:extension>
                            <v-tabs v-model="tab" align-with-title>
                            <v-tabs-slider color="white"></v-tabs-slider>
                                <v-tab>Violators</v-tab>
                                <v-tab>Overdues</v-tab>
                            </v-tabs>
                        </template>
                </v-toolbar>

    <v-tabs-items v-model="tab">


    <!-- tO BE SETTLED -->
        <v-tab-item>
            <v-card flat>
                <v-card-text>
                            <template>
                                <v-container fluid>
                                    <v-data-iterator
                                        :items="violators"
                                        :items-per-page.sync="itemsPerPage"
                                        :page.sync="page"
                                        :search="search"
                                        :sort-by="sortBy.toLowerCase()"
                                        :sort-desc="sortDesc"
                                        hide-default-footer
                                    >
                            <template v-slot:header>
                                <v-toolbar color="dark" class="mb-3">
                                    <img src="./../../../pics/warning_amber_white_24dp.svg" class="vehicle-img mr-5">
                                    <h6 class="ml-2">Ordinance Violators List</h6>
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
                                    <v-col v-for="item in props.items" :key="item.name" cols="12" sm="10" md="8" lg="6">
                                        <v-card class="table-text" color="brown darken-4">
                                            <v-card-title class="subheading font-weight-bold"> 
                                                <img src="../../../pics/perm_identity_white_36dp.svg" alt="profile" class="profile">
                                                    <h6>{{ item.name }}</h6>
                                                    <v-spacer></v-spacer>
                                                            <v-card color="warning">
                                                                <v-icon small class="m-1" data-bs-toggle="modal" data-bs-target="#edit-ordinance">
                                                                mdi-pencil
                                                            </v-icon> 
                                                            <v-icon small class="m-1" data-bs-toggle="modal" data-bs-target="#delete-ordinance"
                                                            >
                                                                mdi-delete
                                                            </v-icon>
                                                            </v-card>
                                    
                                            </v-card-title>

                                            <v-list dense class="table-text">
                                                    <div class="container-fluid overflowing table-responsive">
                                                            <table class="table table-dark table-striped table-hover">
                                                                <thead>
                                                                <tr class="table-dark">
                                                                    <th scope="col">#</th>
                                                                    <th scope="col">Violation</th>
                                                                    <th scope="col">Date</th>
                                                                    <th scope="col">Fines</th>
                                                                    <th scope="col">Warning</th>
                                                                    <th scope="col">Status</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody v-for="(violation, index) in item.violations">
                                                                <tr v-if="index>=0">
                                                                    <th scope="row">{{index+1}}</th>
                                                                    <td>{{violation.name}}</td>
                                                                    <td>{{violation.Date}}</td>
                                                                    <td>{{violation.fines}}</td>
                                                                    <td>{{violation.DayLeft}} Day(s) left </td>
                                                                    <td><label class="switcher">
                                                                        <input type="checkbox" class="inputers">
                                                                        <span class="sliders"></span>
                                                                    </label></td>
                                                                </tr>
                                                                </tbody>
                                                            </table>


                                                    </div>
                                                    
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

    <!-- The unpaids -->
        <v-tab-item>
            <v-card flat>
                <v-card-text>
                            <template>
                                <v-container fluid>
                                    <v-data-iterator
                                        :items="violators"
                                        :items-per-page.sync="itemsPerPage"
                                        :page.sync="page"
                                        :search="search"
                                        :sort-by="sortBy.toLowerCase()"
                                        :sort-desc="sortDesc"
                                        hide-default-footer
                                    >
                            <template v-slot:header>
                                <v-toolbar color="dark" class="mb-3">
                                    <img src="./../../../pics/warning_amber_white_24dp.svg" class="vehicle-img mr-5">
                                    <h6 class="ml-2">Overdue List</h6>
                                <v-spacer></v-spacer>
                                <button class="button-back mt-2 mr-3" style="vertical-align:middle" data-bs-toggle="modal" data-bs-target="#insertDriver" data-bs-dismiss="modal">
                                            <span><b> Print </b></span>
                                </button>
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
                                    <v-col v-for="item in props.items" :key="item.name" cols="12" sm="10" md="8" lg="6">
                                        <v-card class="table-text" color="black">
                                            <v-card-title class="subheading font-weight-bold"> 
                                                <img src="../../../pics/perm_identity_white_36dp.svg" alt="profile" class="profile">
                                                    <h6>{{ item.name }}</h6>
                                                    <v-spacer></v-spacer>
                                                            <v-card color="warning">
                                                                <v-icon small class="m-1" data-bs-toggle="modal" data-bs-target="#edit-ordinance">
                                                                mdi-pencil
                                                            </v-icon> 
                                                            <v-icon small class="m-1" data-bs-toggle="modal" data-bs-target="#delete-ordinance"
                                                            >
                                                                mdi-delete
                                                            </v-icon>
                                                            </v-card>
                                    
                                            </v-card-title>

                                            <v-list dense class="table-text">
                                                    <div class="container-fluid overflowing table-responsive">
                                                            <table class="table table-dark table-striped table-hover">
                                                                <thead>
                                                                <tr class="table-dark">
                                                                    <th scope="col">#</th>
                                                                    <th scope="col">Violation</th>
                                                                    <th scope="col">Date</th>
                                                                    <th scope="col">Fines</th>
                                                                    <th scope="col">Warning</th>
                                                                    <th scope="col">Status</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody v-for="(violation, index) in item.violations">
                                                                <tr v-if="index>=0">
                                                                    <th scope="row">{{index+1}}</th>
                                                                    <td>{{violation.name}}</td>
                                                                    <td>{{violation.Date}}</td>
                                                                    <td>{{violation.fines}}</td>
                                                                    <td>{{violation.DayLeft}} Day(s) left </td>
                                                                    <td><label class="switcher">
                                                                        <input type="checkbox" class="inputers">
                                                                        <span class="sliders"></span>
                                                                    </label></td>
                                                                </tr>
                                                                </tbody>
                                                            </table>


                                                    </div>
                                                    
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
                <div class="modal fade" id="delete-ordinance" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content bg-dark">
                        <div class="modal-header">
                            <h5 class="modal-title  text-white" id="exampleModalLabel">Warning!</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-white">
                            Are you sure you want delete this ordinance?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="button-back btn-success" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="button-back btn-danger">Save changes</button>
                        </div>
                        </div>
                    </div>
                </div>


            <!-- modals for edit vehicle registration Requirements -->
            <div class="modal fade" id="edit-ordinance" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
                        <div class="modal-content bg-dark">
                        <div class="modal-header">
                            <h5 class="modal-title text-white" id="staticBackdropLabel">
                                <img src="../../../pics/stacked_bar_chart_white_24dp.svg" class="driver-icon" alt="...">
                                Ordinance Details</h5>
                                <v-spacer></v-spacer>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-white">
                            <div class="row g-0 centered">
                                <div class="col-md-5">
                                    <label class="form-label"> Title: </label>
                                    <input type="text" class="form-control input" id="driver-firstname">
                                </div>
                                <div class="col-md-3">
                                        <label for="date" class="form-label">Date Created: </label>
                                        <div class="input-group date input" id="birthdate">
                                            <input type="text" class="form-control">
                                            <span class="input-group-append">
                                                <span class="input-group-text bg-white">
                                                    <i class="fa fa-calendar icons"></i>
                                                </span>
                                            </span>
                                        </div>
                                    </div>  
                                    <div class="col-md-2"></div>
                            </div> 
                            <div class="row g-0 centered">
                                <div class="col-md-10">
                                    <label class="form-label"> Description: </label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                </div>
                            </div>
                            <hr>
                            <h5 class="centered">Fines</h5>
                            <hr> 
                            <div class="row g-0 centered">
                                <div class="col-md-5">
                                    <label class="form-label"> First Offense: </label>
                                    <input type="text" class="form-control input" id="driver-firstname">
                                </div>
                                <div class="col-md-5">
                                    <label class="form-label"> Additional: </label>
                                    <input type="text" class="form-control input" id="driver-firstname">
                                </div>
                            </div>
                            <div class="row g-0 centered">
                                <div class="col-md-5">
                                    <label class="form-label"> Second Offense: </label>
                                    <input type="text" class="form-control input" id="driver-firstname">
                                </div>
                                <div class="col-md-5">
                                    <label class="form-label"> Additional: </label>
                                    <input type="text" class="form-control input" id="driver-firstname">
                                </div>
                            </div>
                            <div class="row g-0 centered">
                                <div class="col-md-5">
                                    <label class="form-label"> Third Offense: </label>
                                    <input type="text" class="form-control input" id="driver-firstname">
                                </div>
                                <div class="col-md-5">
                                    <label class="form-label"> Additional: </label>
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
        violators : [
            {
              name: 'Jake Cuenca',
              violations: [
            {
              name : 'Wearing of Slippers',
              Date : '12/26/22',
              fines : 120,
              DayLeft : 2,
              Status : false,

            },
            {
              name : 'No Helmet',
              Date : '12/23/22',
              fines : 500,
              DayLeft : 2,
              Status : true,
            },
            {
              name : 'No License',
              Date : '12/23/22',
              fines : 200,
              DayLeft : 2,
              Status : true,
            }
          ],
            },
            {
              name: 'Tom Hanks',
              violations: [
            {
              name : 'No Helmet',
              Date : '12/23/22',
              fines : 500,
              DayLeft : 2,
              Status : true,
            },
            {
              name : 'No License',
              Date : '12/23/22',
              fines : 200,
              DayLeft : 2,
              Status : true,
            }
          ],
            },
            {
              name: "Kyle Toms",
              violations: [
            {
              name : 'Wearing of Slippers',
              Date : '12/26/22',
              fines : 120,
              DayLeft : 2,
              Status : false,

            },
            {
              name : 'No License',
              Date : '12/23/22',
              fines : 200,
              DayLeft : 2,
              Status : true,
            }
          ],

            },
            {
              name: "JAne Fins",
              violations: [
            {
              name : 'No License',
              Date : '12/23/22',
              fines : 200,
              DayLeft : 2,
              Status : true,
            }
          ],
            },
            {
              name: "Cris Bernal",
              violations: [
            {
              name : 'Wearing of Slippers',
              Date : '12/26/22',
              fines : 120,
              DayLeft : 2,
              Status : false,

            },
          ],
            },
            {
              name: "Nessa Smith",
              violations: [
            {
              name : 'Wearing of Slippers',
              Date : '12/26/22',
              fines : 120,
              DayLeft : 2,
              Status : false,

            },
            {
              name : 'No Helmet',
              Date : '12/23/22',
              fines : 500,
              DayLeft : 2,
              Status : true,
            },
            {
              name : 'No License',
              Date : '12/23/22',
              fines : 200,
              DayLeft : 2,
              Status : true,
            }
          ],
            },
          ],
      }
    },
    


        computed: {
            numberOfPages () {
                return Math.ceil(this.violators.length / this.itemsPerPage)
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
  .overflowing{
  max-height: 500px;
  overflow-y: auto;
  overflow-x: auto;

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
.profile{
  width: 80px;
  height: 80px;
  object-fit: contain;
  border-radius: 4px;
  border: 2px solid rgb(151, 151, 151);
  margin-right: 10px;
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
