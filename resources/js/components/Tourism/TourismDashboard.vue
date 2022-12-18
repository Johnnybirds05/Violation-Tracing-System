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
                        Tourism Office
                    </v-toolbar-title>
                    <v-spacer></v-spacer>
                        <template v-slot:extension>
                            <v-tabs v-model="tab" align-with-title>
                            <v-tabs-slider color="white"></v-tabs-slider>
                                <v-tab>Drivers</v-tab>
                                <v-tab>Requirements</v-tab>
                                <v-tab>Accounts</v-tab>
                            </v-tabs>
                        </template>
                </v-toolbar>

            <!-- This is for the driver's data -->
                <v-tabs-items v-model="tab">
                    <v-tab-item>
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
                                    <v-col v-for="item in props.items" :key="item.name" cols="12" sm="10" md="8" lg="6">
                                        <v-card class="table-text" color="grey darken-3">
                                            <v-card-title class="subheading font-weight-bold">
                                                <img src="../../../pics/perm_identity_white_36dp.svg" alt="profile" class="profile">
                                                    <h6>{{ item.name }}</h6>
                                                    <v-spacer></v-spacer> 
                                                <div class=" ml-10 button-tourism">
                                                    <button class="button m-1" data-bs-toggle="modal" data-bs-target="#insertDriver"> View Details</button>
                                                    <button class="noselect m-1" data-bs-toggle="modal" data-bs-target="#exampleModal3">
                                                        <span class="text">Delete</span><span class="icone"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z"></path></svg></span>
                                                    </button>
                                                </div>
                                            </v-card-title>

                                            <v-list dense class="table-text">
                                                <v-list-item v-for="(key, index) in filteredKeys" :key="index">
                                                    <v-list-item-content :class="{ 'blue--text': sortBy === key }">
                                                        {{ key }}:
                                                    </v-list-item-content>
                                                    <v-list-item-content class="align-end" :class="{ 'blue--text': sortBy === key }">
                                                        {{ item[key.toLowerCase()] }}
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
                </v-tab-item>


<!-- This is for the requirement Side -->
        <v-tab-item>
            <v-card flat>
                <v-card-text>
<!-- this is for the vehicle registration -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button collapsed vehicle-body" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            <img src="./../../../pics/no_crash_white_24dp.svg" class="vehicle-img mr-5"> Vehicle Registration
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <template>
                                <v-container fluid>
                                    <v-data-iterator
                                        :items="registrationReq"
                                        :items-per-page.sync="itemsPerPageVreq"
                                        :page.sync="pageVreq"
                                        :search="searchVreq"
                                        :sort-by="sortByVreq.toLowerCase()"
                                        :sort-desc="sortDescVreq"
                                        hide-default-footer
                                    >
                            <template v-slot:header>
                                <v-toolbar color="dark" class="mb-3">
                                    <img src="./../../../pics/no_crash_white_24dp.svg" class="vehicle-img mr-5">
                                    <h6 class="ml-2">Vehicle Requirement List</h6>
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
                                    <a href="/addvehicle" class="ml-2 mr-2">
                                        <button class="icon-btn add-btn">
                                            <div class="add-icon"></div>
                                            <div class="btn-txt"><b>Add Vehicle</b></div>
                                        </button>
                                    </a>
                                    
                                </v-toolbar>
                            </template>
                            <template v-slot:default="props">
                                <v-row>
                                    <v-col v-for="item in props.items" :key="item.name" cols="12" sm="8" md="6" lg="4">
                                        <v-card class="table-text" color="blue darken-4">
                                            <v-card-title class="subheading font-weight-bold">  
                                                    <h6>{{ item.name }}</h6>
                                                    <v-spacer></v-spacer>
                                                            <v-card color="warning">
                                                                <v-icon small class="m-1" @click="editItem(item)">
                                                                mdi-pencil
                                                            </v-icon> 
                                                            <v-icon small class="m-1" data-bs-toggle="modal" data-bs-target="#delete-Account"
                                                            >
                                                                mdi-delete
                                                            </v-icon>
                                                            </v-card>
                                    
                                            </v-card-title>

                                            <v-list dense class="table-text">
                                                <v-list-item v-for="(key, index) in filteredKeysVreq" :key="index">
                                                    <v-list-item-content :class="{ 'blue--text': sortByVreq === key }">
                                                        {{ key }}:
                                                    </v-list-item-content>
                                                    <v-list-item-content class="align-end" :class="{ 'blue--text': sortByVreq === key }">
                                                        {{ item[key.toLowerCase()] }}
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
                                                    {{ itemsPerPageVreq }}
                                                    <v-icon>mdi-chevron-down</v-icon>
                                                </v-btn>
                                            </template>
                                            <v-list>
                                                <v-list-item v-for="(numberVreq, index) in itemsPerPageArrayVreq" :key="index" @click="updateItemsPerPageVreq(numberVreq)">
                                                    <v-list-item-title>{{ numberVreq }}</v-list-item-title>
                                                </v-list-item>
                                            </v-list>
                                        </v-menu>

                                        <v-spacer></v-spacer>

                                    <span class="mr-4 grey--text">
                                        Page {{ pageVreq }} of {{ numberOfPagesVreq }}
                                    </span>

                                    <v-btn fab dark color="blue darken-3" class="mr-1" @click="formerPageVreq">
                                        <v-icon>mdi-chevron-left</v-icon>
                                    </v-btn>
                                    <v-btn fab dark color="blue darken-3" class="ml-1" @click="nextPageVreq">
                                                <v-icon>mdi-chevron-right</v-icon>
                                    </v-btn>
                                </v-row>
                            </template>

                                </v-data-iterator>
                                
                            </v-container>
                                </template>

                            </div>
                        </div>
                 
                        
                    </div>




<!-- this is for the driver's license -->
                <div class="accordion-item">
                  <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed vehicle-body" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                      <img src="./../../../pics/how_to_reg_white_24dp.svg" class="vehicle-img mr-5"> Driver's License
                    </button>
                  </h2>
                  <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <template>
                                <v-container fluid>
                                    <v-data-iterator
                                        :items="licenseReq"
                                        :items-per-page.sync="itemsPerPageLreq"
                                        :page.sync="pageLreq"
                                        :search="searchLreq"
                                        :sort-by="sortByLreq.toLowerCase()"
                                        :sort-desc="sortDescLreq"
                                        hide-default-footer
                                    >
                            <template v-slot:header>
                                <v-toolbar color="dark" class="mb-3">
                                    <img src="./../../../pics/no_crash_white_24dp.svg" class="vehicle-img mr-5">
                                    <h6 class="ml-2">Driver's License Requirement List</h6>
                                <v-spacer></v-spacer>
                                    <div class="containered">
                                        <input placeholder="Type to search..." required="" class="inputted" name="text" type="text" v-model="searchLreq">
                                        <div class="icon">
                                            <svg viewBox="0 0 512 512" class="ionicon" xmlns="http://www.w3.org/2000/svg">
                                                <title>Search</title>
                                                <path stroke-width="32" stroke-miterlimit="10" stroke="currentColor" fill="none" d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z"></path>
                                                <path d="M338.29 338.29L448 448" stroke-width="32" stroke-miterlimit="10" stroke-linecap="round" stroke="currentColor" fill="none"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <a href="/addvehicle" class="ml-2 mr-2">
                                        <button class="icon-btn add-btn">
                                            <div class="add-icon"></div>
                                            <div class="btn-txt"><b>Add Vehicle</b></div>
                                        </button>
                                    </a>
                                </v-toolbar>
                            </template>
                            <template v-slot:default="props">
                                <v-row>
                                    <v-col v-for="item in props.items" :key="item.name" cols="12" sm="6" md="4" lg="4">
                                        <v-card class="table-text" color="blue darken-4">
                                            <v-card-title class="subheading font-weight-bold">  
                                                    <h6>{{ item.name }}</h6>
                                                    <v-spacer></v-spacer>
                                                            <v-card color="warning">
                                                                <v-icon small class="m-1" @click="editItem(item)">
                                                                mdi-pencil
                                                            </v-icon> 
                                                            <v-icon small class="m-1" data-bs-toggle="modal" data-bs-target="#delete-Lreq"
                                                            >
                                                                mdi-delete
                                                            </v-icon>
                                                            </v-card>
                                    
                                            </v-card-title>

                                            <v-list dense class="table-text">
                                                <v-list-item v-for="(key, index) in filteredKeysLreq" :key="index">
                                                    <v-list-item-content :class="{ 'blue--text': sortByLreq === key }">
                                                        {{ key }}:
                                                    </v-list-item-content>
                                                    <v-list-item-content class="align-end" :class="{ 'blue--text': sortByLreq === key }">
                                                        {{ item[key.toLowerCase()] }}
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
                                                    {{ itemsPerPageLreq }}
                                                    <v-icon>mdi-chevron-down</v-icon>
                                                </v-btn>
                                            </template>
                                            <v-list>
                                                <v-list-item v-for="(numberLreq, index) in itemsPerPageArrayLreq" :key="index" @click="updateItemsPerPageLreq(numberLreq)">
                                                    <v-list-item-title>{{ numberLreq }}</v-list-item-title>
                                                </v-list-item>
                                            </v-list>
                                        </v-menu>

                                        <v-spacer></v-spacer>

                                    <span class="mr-4 grey--text">
                                        Page {{ pageLreq }} of {{ numberOfPagesLreq }}
                                    </span>

                                    <v-btn fab dark color="blue darken-3" class="mr-1" @click="formerPageLreq">
                                        <v-icon>mdi-chevron-left</v-icon>
                                    </v-btn>
                                    <v-btn fab dark color="blue darken-3" class="ml-1" @click="nextPageLreq">
                                                <v-icon>mdi-chevron-right</v-icon>
                                    </v-btn>
                                </v-row>
                            </template>

                                </v-data-iterator>
                                
                            </v-container>
                                </template>
                    </div>
                  </div>
                </div>
    

                </v-card-text>
            </v-card>
        </v-tab-item>

<!-- This is for the office Account -->
        <v-tab-item>
            <v-card flat>
                <v-card-text>
                         <template>
                                <v-container fluid>
                                    <v-data-iterator
                                        :items="offices"
                                        :items-per-page.sync="itemsPerPageO"
                                        :page.sync="pageO"
                                        :search="searchO"
                                        :sort-by="sortByO.toLowerCase()"
                                        :sort-desc="sortDescO"
                                        hide-default-footer
                                    >
                            <template v-slot:header>
                                <v-toolbar color="dark" class="mb-3">
                                    <img src="../../../pics/sports_motorsports_white_24dp.svg" class="driver-icon" alt="...">
                                    <h4 class="ml-2">Offices Account List</h4>
                                <v-spacer></v-spacer>
                                    <div class="containered">
                                        <input placeholder="Type to search..." required="" class="inputted" name="text" type="text" v-model="searchO">
                                        <div class="icon">
                                            <svg viewBox="0 0 512 512" class="ionicon" xmlns="http://www.w3.org/2000/svg">
                                                <title>Search</title>
                                                <path stroke-width="32" stroke-miterlimit="10" stroke="currentColor" fill="none" d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z"></path>
                                                <path d="M338.29 338.29L448 448" stroke-width="32" stroke-miterlimit="10" stroke-linecap="round" stroke="currentColor" fill="none"></path>
                                            </svg>  
                                        </div>
                                    </div>
                                    <a href="/addvehicle" class="ml-2 mr-2">
                                        <button class="icon-btn add-btn">
                                            <div class="add-icon"></div>
                                            <div class="btn-txt"><b>Add Vehicle</b></div>
                                        </button>
                                    </a>
                                </v-toolbar>
                            </template>

                            <template v-slot:default="props">
                                <v-row>
                                    <v-col v-for="item in props.items" :key="item.name" cols="12" sm="10" md="8" lg="6">
                                        <v-card class="table-text">
                                            <v-card-title class="subheading font-weight-bold">
                                                <img src="../../../pics/perm_identity_white_36dp.svg" alt="profile" class="profile">
                                                    <h6>{{ item.name }}</h6>
                                                    <v-spacer></v-spacer> 
                                                <div class=" ml-10 button-tourism">
                                                    <button class="button m-1" > View Details</button>
                                                    <button class="noselect m-1" data-bs-toggle="modal" data-bs-target="#exampleModal3">
                                                        <span class="text">Delete</span><span class="icone"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z"></path></svg></span>
                                                    </button>
                                                </div>
                                            </v-card-title>

                                            <v-divider></v-divider>

                                            <v-list dense class="table-text">
                                                <v-list-item v-for="(keyO, index) in filteredKeysO" :key="index">
                                                    <v-list-item-content :class="{ 'blue--text': sortByO === keyO }">
                                                        {{ keyO }}:
                                                    </v-list-item-content>
                                                    <v-list-item-content class="align-end" :class="{ 'blue--text': sortByO === keyO }">
                                                        {{ item[keyO.toLowerCase()] }}
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
                                                    {{ itemsPerPageO }}
                                                    <v-icon>mdi-chevron-down</v-icon>
                                                </v-btn>
                                            </template>
                                            <v-list>
                                                <v-list-item v-for="(numberO, index) in itemsPerPageArrayO" :key="index" @click="updateItemsPerPageO(numberO)">
                                                    <v-list-item-title>{{ numberO }}</v-list-item-title>
                                                </v-list-item>
                                            </v-list>
                                        </v-menu>

                                        <v-spacer></v-spacer>

                                    <span class="mr-4 grey--text">
                                        Page {{ pageO }} of {{ numberOfPagesO }}
                                    </span>

                                    <v-btn fab dark color="blue darken-3" class="mr-1" @click="formerPageO">
                                        <v-icon>mdi-chevron-left</v-icon>
                                    </v-btn>
                                    <v-btn fab dark color="blue darken-3" class="ml-1" @click="nextPageO">
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
            <!-- modal for delete driver-->
            <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content bg-dark">
                        <div class="modal-header">
                            <h5 class="modal-title  text-white" id="exampleModalLabel">Warning!</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-white">
                            Are you sure you want to delete this driver's profile?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="button-back btn-success" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="button-back btn-danger">Save changes</button>
                        </div>
                        </div>
                    </div>
                </div>
                <!-- modals for delete vehicle req -->
                <div class="modal fade" id="delete-Vreq" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content bg-dark">
                        <div class="modal-header">
                            <h5 class="modal-title  text-white" id="exampleModalLabel">Warning!</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-white">
                            Are you sure you want delete this registration requirement?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="button-back btn-success" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="button-back btn-danger">Save changes</button>
                        </div>
                        </div>
                    </div>
                </div>

                <!-- modals for delete License req -->
                <div class="modal fade" id="delete-Lreq" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content bg-dark">
                        <div class="modal-header">
                            <h5 class="modal-title  text-white" id="exampleModalLabel">Warning!</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-white">
                            Are you sure you want delete this license requirement?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="button-back btn-success" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="button-back btn-danger">Save changes</button>
                        </div>
                        </div>
                    </div>
                </div>

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
                <!-- modals for view detail and update driver account -->

                <div class="modal fade" id="insertDriver" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
                        <div class="modal-content bg-dark">
                        <div class="modal-header">
                            <h5 class="modal-title text-white" id="staticBackdropLabel">
                                <img src="../../../pics/sports_motorsports_white_24dp.svg" class="driver-icon" alt="...">
                                Driver Details</h5>
                                <v-spacer></v-spacer>
                                <button class="button btn button-detail text-center mt-2 mr-3" style="vertical-align:middle" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    <span><b>Vehicle </b></span>
                                </button>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-white">
                            <div class="container-fluid">
                                <div class="row g-2">
                                    <div class="col-md-3">
                                        <label class="form-label"> First Name: </label>
                                        <input type="text" class="form-control input" id="driver-firstname">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label"> Last Name: </label>
                                        <input type="text" class="form-control input" id="driver-lastname">
                                    </div>

                                    <div class="col-md-3">
                                        <label class="form-label">Middle Name: </label>
                                        <input type="text" class="form-control input" id="driver-middlename">
                                    </div>

                                    <div class="col-md-2">
                                        <label class="form-label">Suffix: </label>
                                        <input type="text" class="form-control input" id="driver-suffix" placeholder="SR." maxlength="3">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <label class="form-label">Sex: </label>
                                        <select class="form-select input" name="sex" aria-label="Default select example">
                                            <option selected disabled>Select</option>
                                            <option value="1">male</option>
                                            <option value="2">female</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="date" class="form-label">Birthdate: </label>
                                        <div class="input-group date input" id="birthdate">
                                            <input type="text" class="form-control">
                                            <span class="input-group-append">
                                                <span class="input-group-text bg-white">
                                                    <i class="fa fa-calendar icons"></i>
                                                </span>
                                            </span>
                                        </div>
                                    </div>                  
                                    <div class="col-md-4">
                                        <label for="formFileSm" class="form-label input">Picture(2by2):</label>
                                        <input class="form-control  bg-dark" id="formFile" type="file" accept="image/png, image/gif, image/jpeg">
                                    </div>               
                                </div>
                                <hr>
                                <div class="container-fluid register-fills">
                                    Current Address
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="form-label">Province:</label>
                                        <select class="form-select input" name="province" aria-label="Default select example">
                                            <option selected disabled>Select</option>
                                        </select>
                                    </div>

                                    <div class="col-md-3">
                                        <label class="form-label">City:</label>
                                        <select class="form-select input" name="city" aria-label="Default select example">
                                            <option selected disabled>Select</option>
                                        </select>
                                    </div>

                                    <div class="col-md-3">
                                        <label class="form-label">Barangay:</label>
                                        <select class="form-select input" name="barangay" aria-label="Default select example">
                                            <option selected disabled>Select</option>
                                        </select>
                                    </div>
                                </div>
                                <hr>
                                    <div class="container-fluid register-fills">
                                        <b>Contact Information</b>
                                    </div>
                                <hr>
                                <div class="row g-2">
                                    <div class="col-md-4">
                                        <label class="form-label">Email:</label>
                                        <input type="email" class="form-control input" id="driver-email">
                                    </div>

                                    <div class="col-md-3">
                                        <label class="form-label">Mobile Number:</label>
                                        <input type="number" class="form-control input" id="driver-number">
                                    </div>
                                </div>
                                <hr>
                                    <div class="container-fluid register-fills">
                                        <b>Driver's License Information</b>
                                    </div>
                                <hr>
                                <div class="row g-2">
                                    <div class="col-md-3">
                                        <label class="form-label"> ID Type: </label>
                                            <select class="form-select input" name="id-type" aria-label="Default select example">
                                                <option selected disabled>Select</option>
                                                <option value="1">Non-professional</option>
                                                <option value="2">Professional</option>
                                            </select>
                                    </div>

                                    <div class="col-md-4">
                                        <label class="form-label">ID No:</label>
                                        <input type="text" class="form-control input" id="license-ID">
                                    </div>

                                    <div class="col-md-3">
                                            <label for="date" class="form-label">Expiration Date: </label>
                                            <div class="input-group date" id="license">
                                                <input type="text" class="form-control">
                                                <span class="input-group-append">
                                                    <span class="input-group-text bg-white">
                                                        <i class="fa fa-calendar icons"></i>
                                                    </span>
                                                </span>
                                            </div>
                                    </div>
                                </div>
                                <hr>
                                    <div class="container-fluid register-fills">
                                        <b>Account Information</b>
                                    </div>
                                <hr>
                                <div class="row g-2">
                                    <div class="col-md-5">
                                        <label class="form-label"> Username: </label>
                                        <input type="text" class="form-control input" id="driver-firstname">
                                    </div>
                                    <div class="col-md-5">
                                    <label class="form-label"> Password: </label>
                                    <input type="password" class="form-control input" id="driver-password">
                                </div>
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
        itemsPerPageArray: [2, 4, 6],
        search: '',
        filter: {},
        sortDesc: false,
        page: 1,
        itemsPerPage: 2,
        sortBy: 'name',
        keys: [
          'Name',
          'Email',
          'Number',
          'Status',
        ],
        drivers: [
          {
            name: 'John Michael Cagadas',
            email: 'johnmichaelcagadas@gmail.com',
            number: '0905123212',
            status: 'unverified',
          },
          {
            name: 'Mary Rose Ann Yow',
            email: 'ksjdsah@gmail.com',
            number: '09052323212',
            status: 'unverified',
          },
          {
            name: 'John Doe',
            email: 'joasdjlkjasd.com',
            number: '0903133312',
            status: 'verified',
          },
          {
            name: 'Helvic Judason',
            email: 'john@gmail.com',
            number: '003223212',
            status: 'verified',
          },
          {
            name: 'Anna Banana',
            email: 'cagadas@gmail.com',
            number: '090322123212',
            status: 'unverified',
          },
          {
            name: 'Barbie Doll',
            email: 'michael@gmail.com',
            number: '0905123212',
            status: 'unverified',
          },
          
        ],
        itemsPerPageArrayVreq: [3, 6, 9],
        searchVreq: '',
        filter: {},
        sortDescVreq: false,
        pageVreq: 1,
        itemsPerPageVreq: 3,
        sortByVreq: 'name',
        keysVreq: [
          'Name',
          'Location',
          'Cost',
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
            itemsPerPageArrayLreq: [3, 6, 9],
            searchLreq: '',
            filter: {},
            sortDescLreq: false,
            pageLreq: 1,
            itemsPerPageLreq: 3,
            sortByLreq: 'name',
            keysLreq: [
            'Name',
            'Location',
            'Cost',
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
          itemsPerPageArrayO: [2, 4, 6, 8],
            searchO: '',
            filter: {},
            sortDescO: false,
            pageO: 1,
            itemsPerPageO: 2,
            sortByO: 'name',
            keysO: [
            'Name',
            'Office',
            'Position',
            'Id',
            'Username'
            ],
          offices: [
            {
                name: 'Andrew Chua',
                office: 'Task Force',
                position: 'Spo1',
                id: '12676asbksd',
                username: 'andrew2',
            },
            {
                name: 'Mike Lee',
                office: 'Legal Counsel',
                position: 'admin',
                id: '54676ajshdj',
                username: 'leeb45',
            },
            {
                name: 'Mike Lee',
                office: 'Legal Counsel',
                position: 'admin',
                id: '54676ajshdj',
                username: 'leeb45',
            },
            {
                name: 'Mary Rose Ann',
                office: 'Legal Counsel',
                position: 'admin',
                id: '5136582sadg',
                username: 'mary2541',
            },
            {
                name: 'Philip Charles',
                office: 'City Tourism Office',
                position: 'admin',
                id: '1235abhsad',
                username: 'Phil2342',
            },
            {
                name: 'Karen Davilla',
                office: 'Local Legislative Office',
                position: 'admin',
                id: '321271saj',
                username: 'karne2163',
            },




          ]
      }
    },
    


        computed: {
            numberOfPages () {
                return Math.ceil(this.drivers.length / this.itemsPerPage)
            },
            filteredKeys () {
                return this.keys.filter(key => key !== 'Name')
            },
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

            numberOfPagesO () {
                return Math.ceil(this.offices.length / this.itemsPerPageO)
            },
            filteredKeysO () {
                return this.keysO.filter(key => key !== 'Name')
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

            nextPageO () {
                if(this.pageO + 1 <= this.numberOfPagesO) this.pageO += 1
            },
            formerPageO () {
                if(this.pageO - 1 >= 1) this.pageO -= 1
            },
            updateItemsPerPageO (numberO) {
                this.itemsPerPageO = numberO
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
