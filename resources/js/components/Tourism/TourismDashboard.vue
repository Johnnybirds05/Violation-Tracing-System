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

                <v-tabs-items v-model="tab">

<!-- This is for the driver's data -->
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
                                                    <button class="button ma-1" @click="driverDialog= true"> Edit Details</button>
                                                    <button class="noselect mt-1" @click="deleteAccountDialog= true">
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
            <template>
                <v-expansion-panels focusable>
                  <v-expansion-panel
                  >
                    <v-expansion-panel-header color="grey darken-4">
                      <v-row>
                        <v-col
                            cols="12"
                            md="1"
                            sm="6">
                            <img src="./../../../pics/no_crash_white_24dp.svg" class="vehicle-img mr-5">
                        </v-col>
                        <v-col
                            cols="12"
                            md="4"
                            sm="6">
                            
                            <h3 class="vehicle-name mt-1"> Vehicle Registration</h3>
                        </v-col>                            
                    </v-row>
                    </v-expansion-panel-header>
                    <v-expansion-panel-content>
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
                                    <h4>Vehicle Registration Requirement List</h4>
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
                                        <button class="icon-btn add-btn" @click="registrationDialog = true">
                                            <div class="add-icon"></div>
                                            <div class="btn-txt"><b>Add Requirement</b></div>
                                        </button>
                                    
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
                                                                <v-icon small class="m-1" @click="registrationDialog = true">
                                                                mdi-pencil
                                                            </v-icon> 
                                                            <v-icon small class="m-1" @click="deleteRegistrationDialog= true"
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

                    </v-expansion-panel-content>
                  </v-expansion-panel>
                </v-expansion-panels>
              </template>

<!-- this is for the driver's license -->
            <template>
                <v-expansion-panels focusable>
                  <v-expansion-panel
                  >
                    <v-expansion-panel-header color="grey darken-4">
                      <v-row>
                        <v-col
                            cols="12"
                            md="1"
                            sm="6">
                            <img src="./../../../pics/how_to_reg_white_24dp.svg" class="vehicle-img mr-5">
                        </v-col>
                        <v-col
                            cols="12"
                            md="4"
                            sm="6">
                            
                            <h3 class="vehicle-name mt-1"> Driver's License</h3>
                        </v-col>                            
                    </v-row>
                    </v-expansion-panel-header>
                    <v-expansion-panel-content>
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
                                    <h4 class="ml-2">Driver's License Requirement List</h4>
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
                                        <button class="icon-btn add-btn" @click="licenseDialog = true">
                                            <div class="add-icon"></div>
                                            <div class="btn-txt"><b>Add Requirement</b></div>
                                        </button>
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
                                                                <v-icon small class="m-1" @click="licenseDialog = true">
                                                                mdi-pencil
                                                            </v-icon> 
                                                            <v-icon small class="m-1" @click="deleteLicenseDialog= true"
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

                    </v-expansion-panel-content>
                  </v-expansion-panel>
                </v-expansion-panels>
              </template>

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
                                        <button class="icon-btn add-btn"  @click="officeDialog = true">
                                            <div class="add-icon"></div>
                                            <div class="btn-txt"><b>Add Account</b></div>
                                        </button>
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
                                                    <button class="button ma-1" @click="officeDialog = true"> Edit Details</button>
                                                    <button class="noselect ma-1" @click="deleteOfficeDialog= true">
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
<!-- Delete Account -->
<template>
          <v-row justify="center">
              <v-dialog
              v-model="deleteAccountDialog"
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
                            Are you sure you want to delete this account?
                          </div>          
                      </div>                             
                  </v-card-text>
                  <v-divider></v-divider>
                  <v-card-actions>
                      <v-spacer></v-spacer>
                      <v-btn
                          text
                          @click="deleteAccountDialog=false"
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
<!-- Delete Registration Requirement -->
<template>
          <v-row justify="center">
              <v-dialog
              v-model="deleteRegistrationDialog"
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
                            Are you sure you want to delete this vehicle Registration Requirement?
                          </div>          
                      </div>                             
                  </v-card-text>
                  <v-divider></v-divider>
                  <v-card-actions>
                      <v-spacer></v-spacer>
                      <v-btn
                          text
                          @click="deleteRegistrationDialog=false"
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

      <!-- Delete License -->
      <template>
          <v-row justify="center">
              <v-dialog
              v-model="deleteLicenseDialog"
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
                            Are you sure you want to delete this driver's license requirement?
                          </div>          
                      </div>                             
                  </v-card-text>
                  <v-divider></v-divider>
                  <v-card-actions>
                      <v-spacer></v-spacer>
                      <v-btn
                          text
                          @click="deleteLicenseDialog=false"
                      >
                          Cancel
                      </v-btn>
                      <v-btn

                          text
                          @click="deleteLicenseDialog=false"
                      >
                          Proceed
                      </v-btn>
                      <v-spacer></v-spacer>
                  </v-card-actions>
              </v-card>
              </v-dialog>
          </v-row>
      </template>

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

    <!-- modals for view detail and update driver account -->
            <template>
                    <v-row justify="center">
                        <v-dialog
                        v-model="driverDialog"
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
                                                <input type="checkbox" class="inputer">
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
                                        :rules="validate.fnameRules"
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
                                        :rules="validate.mnameRules"
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
                                        :rules="validate.lnameRules"
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
                                        :rules="validate.sexRules"
                                        :items="['Male', 'Female']"
                                        outlined
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
                                                :rules="validate.bdateRules"
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

                                <v-col cols="12" md="4" sm="6">
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

                            <v-row>
                                <v-col cols="12" md="3" sm="6">
                                    <v-select
                                        item-value="provCode"
                                        item-text="provDesc"
                                        :items="provinces"
                                        outlined
                                        @change="loadCities"
                                        v-model="fields.province"
                                        :rules="validate.provRules"
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
                                        :rules="validate.cityRules"
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
                                        :rules="validate.streetRules"
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
                                        :rules="validate.emailRules"
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
                                        :rules="validate.mobileNo"
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
                                    ><template v-slot:label>
                                        <v-icon style="vertical-align: middle">
                                            mdi-account
                                        </v-icon>
                                        Sex
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
                            </v-row>
                            <v-row class="centers">
                                <v-col
                                    cols="12"
                                    md="6"
                                    sm="4">
                                    <v-text-field
                                        v-model="fields.username"
                                        outlined
                                        clearable
                                    >
                                    <template v-slot:label>
                                        <v-icon style="vertical-align: middle">
                                            mdi-account-check
                                        </v-icon>
                                        username
                                    </template>
                                </v-text-field>
                                </v-col>
                                <v-col
                                    cols="12"
                                    md="6"
                                    sm="6">
                                        <v-text-field
                                        :append-icon="show3 ? 'mdi-eye' : 'mdi-eye-off'"
                                        :rules="validate.usernameRules"
                                        :type="show3 ? 'text' : 'password'"
                                        label="Not visible"
                                        class="input-group--focused"
                                        @click:append="show3 = !show3"
                                                v-model="fields.password"
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
                            </v-row>
                            

                        </div>
                                
                            </v-card-text>
                            <v-divider></v-divider>
                            <v-card-actions>
                                <v-spacer></v-spacer>
                                <v-btn
                                    outlined
                                    text
                                    @click="driverDialog = false"
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
                                <v-btn
                                    outlined
                                    text
                                    @click="addVehicleDialog = true"
                                    class="ml-3"
                                >
                                    View Vehicles
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

            <!-- modals for edit vehicle registration Requirements -->
            <template>
                    <v-row justify="center">
                        <v-dialog
                        v-model="registrationDialog"
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
                                    Vehicle Registration Requirement
                                </h5>
                                <v-spacer></v-spacer>
                            </v-card-title>
                            <v-card-text style="height: 200px;">
                                <v-divider></v-divider>


                            <div class="form-registration">
                              <v-row>
                                <v-col
                                    cols="12"
                                    md="4"
                                    sm="6">
                                    <v-text-field
                                        :rules="validate.nameRules"
                                        outlined
                                        clearable
                                    >
                                    <template v-slot:label>
                                        <v-icon style="vertical-align: middle">
                                          mdi-car-multiple
                                        </v-icon>
                                        Name
                                    </template>
                                </v-text-field>
                                </v-col>
                                <v-col
                                    cols="12"
                                    md="4"
                                    sm="6">
                                    <v-text-field
                                        :rules="validate.locationRules"
                                        outlined
                                        clearable
                                    >
                                    <template v-slot:label>
                                        <v-icon style="vertical-align: middle">
                                          mdi-car-multiple
                                        </v-icon>
                                        Location
                                    </template>
                                </v-text-field>
                                </v-col>
                                <v-col
                                    cols="12"
                                    md="4"
                                    sm="6">
                                    <v-text-field
                                        :rules="validate.costRules"
                                        outlined
                                        clearable
                                    >
                                    <template v-slot:label>
                                        <v-icon style="vertical-align: middle">
                                          mdi-car-multiple
                                        </v-icon>
                                        Cost
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
                                    @click="registrationDialog = false"
                                >
                                    Cancel
                                </v-btn>
                                <v-btn
                                    outlined
                                    text
                                    @click="registrationDialog = false"
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
            <!-- modals for edit license requirement -->
            <template>
                    <v-row justify="center">
                        <v-dialog
                        v-model="licenseDialog"
                        scrollable
                        persistent
                        max-width="800px"
                        >
                        <v-card>
                            <v-card-title>
                                <v-icon style="vertical-align: middle">
                                    mdi-card-bulleted
                                </v-icon>
                                <h5 class="modal-title text-white" id="staticBackdropLabel">
                                    Driver's License Requirement
                                </h5>
                                <v-spacer></v-spacer>
                            </v-card-title>
                            <v-card-text style="height: 200px;">
                                <v-divider></v-divider>


                            <div class="form-registration">
                              <v-row>
                                <v-col
                                    cols="12"
                                    md="4"
                                    sm="6">
                                    <v-text-field
                                        :rules="validate.nameRules"
                                        outlined
                                        clearable
                                    >
                                    <template v-slot:label>
                                        <v-icon style="vertical-align: middle">
                                          mdi-car-multiple
                                        </v-icon>
                                        Name
                                    </template>
                                </v-text-field>
                                </v-col>
                                <v-col
                                    cols="12"
                                    md="4"
                                    sm="6">
                                    <v-text-field
                                        :rules="validate.locationRules"
                                        outlined
                                        clearable
                                    >
                                    <template v-slot:label>
                                        <v-icon style="vertical-align: middle">
                                          mdi-car-multiple
                                        </v-icon>
                                        Location
                                    </template>
                                </v-text-field>
                                </v-col>
                                <v-col
                                    cols="12"
                                    md="4"
                                    sm="6">
                                    <v-text-field
                                        :rules="validate.costRules"
                                        outlined
                                        clearable
                                    >
                                    <template v-slot:label>
                                        <v-icon style="vertical-align: middle">
                                          mdi-car-multiple
                                        </v-icon>
                                        Cost
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
                                    @click="licenseDialog = false"
                                >
                                    Cancel
                                </v-btn>
                                <v-btn
                                    outlined
                                    text
                                    @click="registrationDialog = false"
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
                                    Office Account
                                </h5>
                                <v-spacer></v-spacer>
                            </v-card-title>
                            <v-card-text style="height: 400px;">
                                <v-divider></v-divider>


                            <div class="form-registration">
                                <v-row>
                                    <v-col
                                        cols="12"
                                        md="3"
                                        sm="6">
                                        <v-text-field
                                            :rules="validate.fnameRules"
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
                                            :rules="validate.mnameRules"
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
                                            :rules="validate.lnameRules"
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
                                        :items="['Task Force', 'Legal Counsel', 'City Tourism', 'Local Legislative', 'City Treasurer']"
                                        outlined
                                    ><template v-slot:label>
                                        <v-icon style="vertical-align: middle">
                                            mdi-office-building
                                        </v-icon>
                                        Office Type
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
                                                mdi-card
                                            </v-icon>
                                            Position
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
                                                mdi-card
                                            </v-icon>
                                            ID no
                                        </template></v-text-field>
                                    </v-col>
                                </v-row>

                                <v-row>
                                    <v-col cols="12" md="4" sm="6">
                                    <v-file-input
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
                                    <v-col
                                        cols="12"
                                        md="4"
                                        sm="4">
                                        <v-text-field
                                            outlined
                                            clearable
                                        >
                                        <template v-slot:label>
                                            <v-icon style="vertical-align: middle">
                                                mdi-account-check
                                            </v-icon>
                                            username
                                        </template>
                                    </v-text-field>
                                    </v-col>
                                    <v-col
                                        cols="12"
                                        md="4"
                                        sm="6">
                                            <v-text-field
                                            :append-icon="show3 ? 'mdi-eye' : 'mdi-eye-off'"
                                            :rules="validate.usernameRules"
                                            :type="show3 ? 'text' : 'password'"
                                            label="Not visible"
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
                                    @click="registrationDialog = false"
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

        fields: {},
        errors: {},

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
           




          ],
          deleteAccountDialog: false,
          deleteRegistrationDialog: false,
          deleteLicenseDialog: false,
          deleteOfficeDialog: false,
          addVehicleDialog: false,
          driverDialog: false,
          registrationDialog: false,
          licenseDialog: false,
          officeDialog: false,

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
                fnameRules: [
                    v => !!v || 'Firstname is required',
                ],
                mnameRules: [
                    v => !!v || 'Middlename is required',
                ],
                lnameRules: [
                    v => !!v || 'Lastname is required',
                ],
                sexRules: [
                    v => !!v || 'Sex is required',
                ],
                bdateRules: [
                    v => !!v || 'Birthdate is required',
                ],
                picRules: [
                    v => !!v || 'Picture is required',
                ],
                provRules: [
                    v => !!v || 'Province is required',
                ],
                cityRules: [
                    v => !!v || 'City is required',
                ],
                brgyRules: [
                    v => !!v || 'Barangay is required',
                ],
                streetRules: [
                    v => !!v || 'Street is required',
                ],
                emailRules: [
                    v => !!v || 'E-mail is required',
                    v => /.+@.+\..+/.test(v) || 'E-mail must be valid',
                ],
                mobileNo: [
                    v => !!v || 'Mobile Number is required',
                   
                    v => /((^(\+)(\d){12}$)|(^\d{11}$))/.test(v) || 'Invalid mobile no.',
                ],
                usernameRules: [
                    v => !!v || 'username is required',
                ],
                passwordRules: [
                    v => !!v || 'password is required',
                ],
                nameRules: [
                    v => !!v || 'name is required',
                ],
                locationRules: [
                    v => !!v || 'password is required',
                ],
                costRules: [
                    v => !!v || 'password is required',
                ],
          }
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
