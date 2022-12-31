<template>
    <div class="container-fluid max-content mb-4">
        <div class="container tourism-body mt-3 mb-4">
        <v-app>
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
                            <img src="../../../pics/perm_identity_white_36dp.svg" class="card-img-top" alt="...">
                        </v-list-item-avatar>
                        Task Force
                    </v-toolbar-title>
                    <v-spacer></v-spacer>
                        <template v-slot:extension>
                            <v-tabs v-model="tab" align-with-title>
                            <v-tabs-slider color="white"></v-tabs-slider>
                                <v-tab>Violation</v-tab>
                                <v-tab>Ordinances</v-tab>
                            </v-tabs>
                        </template>
                </v-toolbar>

                <v-tabs-items v-model="tab">
<!-- this is for the add violation tab -->
        <v-tab-item>
            <v-card flat>
                <v-card-text>
                            <div class="row centered g-3 mb-5">
                                    <div class="col-md-3">
                                        <button class="continue-application" data-bs-toggle="modal" data-bs-target="#add-violation">
                                            <div>
                                                <div class="pencil"></div>
                                                <div class="folder">
                                                    <div class="top">
                                                        <svg viewBox="0 0 24 27">
                                                            <path d="M1,0 L23,0 C23.5522847,-1.01453063e-16 24,0.44771525 24,1 L24,8.17157288 C24,8.70200585 23.7892863,9.21071368 23.4142136,9.58578644 L20.5857864,12.4142136 C20.2107137,12.7892863 20,13.2979941 20,13.8284271 L20,26 C20,26.5522847 19.5522847,27 19,27 L1,27 C0.44771525,27 6.76353751e-17,26.5522847 0,26 L0,1 C-6.76353751e-17,0.44771525 0.44771525,1.01453063e-16 1,0 Z"></path>
                                                        </svg>
                                                    </div>
                                                    <div class="paper"></div>
                                                </div>
                                            </div>
                                            Scan QR Code
                                        </button>
                                    </div> 

                                    <div class="col-md-3">
                                        <button class="continue-application" data-bs-toggle="modal" data-bs-target="#add-violation">
                                            <div>
                                                <div class="pencil"></div>
                                                <div class="folder">
                                                    <div class="top">
                                                        <svg viewBox="0 0 24 27">
                                                            <path d="M1,0 L23,0 C23.5522847,-1.01453063e-16 24,0.44771525 24,1 L24,8.17157288 C24,8.70200585 23.7892863,9.21071368 23.4142136,9.58578644 L20.5857864,12.4142136 C20.2107137,12.7892863 20,13.2979941 20,13.8284271 L20,26 C20,26.5522847 19.5522847,27 19,27 L1,27 C0.44771525,27 6.76353751e-17,26.5522847 0,26 L0,1 C-6.76353751e-17,0.44771525 0.44771525,1.01453063e-16 1,0 Z"></path>
                                                        </svg>
                                                    </div>
                                                    <div class="paper"></div>
                                                </div>
                                            </div>
                                            Manual Input
                                        </button>
                                    </div>

                            </div>               
                </v-card-text>
            </v-card>
        </v-tab-item>



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
                                    <h6 class="ml-2">Tangub City Ordinances List</h6>
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
                                        <v-card class="table-text" color="blue darken-4">
                                            <v-card-title class="subheading font-weight-bold"> 
                                                <img src="./../../../pics/task_alt_white_24dp.svg" class="vehicle-img mr-5">
                                                    <h6> <b>{{ item.name }}</b> </h6>
                                                    <v-spacer></v-spacer>
                                    
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



            <!-- modals for add violation -->
            <div class="modal fade" id="add-violation" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-xl modal-dialog-scrollable">
                        <div class="modal-content bg-dark">
                        <div class="modal-header">
                            <h5 class="modal-title text-white" id="staticBackdropLabel">
                                <img src="../../../pics/stacked_bar_chart_white_24dp.svg" class="driver-icon" alt="...">
                                Driver's Violation</h5>
                                <v-spacer></v-spacer>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-white">
                            <div class="row g-1">
                                <div class="col-md-8">
                                    <div class="row g-1 centered">
                                        <div class="col-md-3">
                                            <img src="../../../pics/user.svg" class="profile-icon" alt="...">
                                        </div>
                                    </div>
                                    <hr>
                                        <h5 class="centered">Owner Information</h5>
                                    <hr> 
                                    <div class="row g-1">
                                        <div class="col-md-3">
                                            <label class="form-label"> Firstname: </label>
                                            <input type="text" class="form-control input" id="driver-firstname">
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label"> Middlename: </label>
                                            <input type="text" class="form-control input" id="driver-firstname">
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label"> Lastname: </label>
                                            <input type="text" class="form-control input" id="driver-firstname">
                                        </div>
                                        <div class="col-md-3">
                                        <label class="form-label">Suffix: </label>
                                        <input type="text" class="form-control input" id="driver-suffix" placeholder="SR." maxlength="3">
                                    </div>
                                    </div>
                                    <div class="row g-1">
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
                                        <div class="col-md-3">
                                            <label class="form-label">Street: </label>
                                            <input type="text" class="form-control input" id="driver-middlename">
                                        </div>
                                    </div>
                                    <div class="row g-1">
                                        <div class="col-md-4">
                                            <label class="form-label">Mobile Number:</label>
                                            <input type="number" class="form-control input" id="driver-number">
                                        </div>
                                    </div>
                                    <div class="row g-1">
                                        <div class="col-md-4">
                                            <input type="checkbox" id="myCheck1" @click="showViolations">
                                            <label for="myCheck1">Show Violation History of the owner?</label> 
                                        </div>
                                    </div>
                                    <div class="container-fluid" id="text1" style="display:none">
                                        <hr>
                                        <h5 class="centered">Violation History</h5>
                                    <hr> 
                                    <div class="container overflowing table-responsive">
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
                                            <tbody>
                                                <tr v-for="(violation, index) in violations" :key="index">
                                                    <th scope="row">{{index+1}}</th>
                                                    <td>{{violation.name}}</td>
                                                    <td>{{violation.Date}}</td>
                                                    <td>{{violation.fines}}</td>
                                                    <td>{{violation.DayLeft}} Day(s) left </td>
                                                    <td>
                                                        <span v-if="violation.Status === true">
                                                            Settled
                                                        </span>
                                                        <span v-else>Unsettled</span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>

                                    </div>
                                    </div>
                                    

                                    <div class="row g-1">
                                        <div class="col-md-4">
                                            <input type="checkbox" id="myCheck" @click="showDriver">
                                            <label for="myCheck">Not the owner?</label> 
                                        </div>
                                    </div>
                                    <div class="container-fluid" id="text" style="display:none">
                                        <hr>
                                        <h5 class="centered">Driver Information</h5>
                                    <hr> 
                                    <div class="row g-1">
                                        <div class="col-md-3">
                                            <label class="form-label"> Firstname: </label>
                                            <input type="text" class="form-control input" id="driver-firstname">
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label"> Middlename: </label>
                                            <input type="text" class="form-control input" id="driver-firstname">
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label"> Lastname: </label>
                                            <input type="text" class="form-control input" id="driver-firstname">
                                        </div>
                                        <div class="col-md-3">
                                        <label class="form-label">Suffix: </label>
                                        <input type="text" class="form-control input" id="driver-suffix" placeholder="SR." maxlength="3">
                                    </div>
                                    </div>
                                    <div class="row g-1">
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
                                        <div class="col-md-3">
                                            <label class="form-label">Street: </label>
                                            <input type="text" class="form-control input" id="driver-middlename">
                                        </div>
                                    </div>
                                    <div class="row g-1">
                                        <div class="col-md-4">
                                            <label class="form-label">Mobile Number:</label>
                                            <input type="number" class="form-control input" id="driver-number">
                                        </div>
                                    </div>
                                    </div>

                                    <div class="row g-1">
                                        <div class="col-md-4">
                                            <input type="checkbox" id="myCheck2" @click="showGuadians">
                                            <label for="myCheck2">Minor?</label> 
                                        </div>
                                    </div>

                                    <div class="container-fluid" id="text2" style="display:none">
                                        <hr>
                                        <h5 class="centered">Guardian Information</h5>
                                    <hr> 
                                    <div class="row g-1">
                                        <div class="col-md-3">
                                            <label class="form-label"> Firstname: </label>
                                            <input type="text" class="form-control input" id="driver-firstname">
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label"> Middlename: </label>
                                            <input type="text" class="form-control input" id="driver-firstname">
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label"> Lastname: </label>
                                            <input type="text" class="form-control input" id="driver-firstname">
                                        </div>
                                        <div class="col-md-3">
                                        <label class="form-label">Suffix: </label>
                                        <input type="text" class="form-control input" id="driver-suffix" placeholder="SR." maxlength="3">
                                    </div>
                                    </div>
                                    <div class="row g-1">
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
                                        <div class="col-md-3">
                                            <label class="form-label">Street: </label>
                                            <input type="text" class="form-control input" id="driver-middlename">
                                        </div>
                                    </div>
                                    <div class="row g-1">
                                        <div class="col-md-4">
                                            <label class="form-label">Mobile Number:</label>
                                            <input type="number" class="form-control input" id="driver-number">
                                        </div>
                                    </div>
                                    </div>
                                    
                                </div>

                                <div class="col-md-4">
                                    <v-app>
                                        <v-card flat> 
                                        <v-card-text>
                                                    <template>
                                                        <v-container fluid>
                                                            <v-data-iterator
                                                                :items="ordinances"
                                                                :items-per-page.sync="itemsPerPageViolation"
                                                                :page.sync="page"
                                                                :search="search"
                                                                :sort-by="sortBy.toLowerCase()"
                                                                :sort-desc="sortDesc"
                                                                hide-default-footer
                                                            >
                                                    <template v-slot:header>
                                                        <v-toolbar color="dark" class="mb-3">
                                                            Add Violations
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
                                                            <v-col v-for="item in props.items" :key="item.name" cols="15" sm="15" md="13" lg="12">
                                                                <v-card class="table-text" color="grey darken-4">
                                                                    <v-card-title class="subheading font-weight-bold"> 
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                                            <label class="form-check-label" for="flexCheckDefault">
                                                                                <h6> <b>{{ item.name }}</b> </h6>
                                                                            </label>
                                                                        </div>
                                                                            
                                                                            <v-spacer></v-spacer>
                                                                    </v-card-title>
                                                                </v-card>
                                                            </v-col>
                                                        </v-row>
                                                    </template>

                                                    <template v-slot:footer>
                                                        <v-row class="mt-2" align="center" justify="center">
                                                                <v-menu offset-y>
                                                                    <v-list>
                                                                        <v-list-item v-for="(number, index) in itemsPerPageArrayViolation" :key="index" @click="updateItemsPerPageViolation(number)">
                                                                            <v-list-item-title>{{ number }}</v-list-item-title>
                                                                        </v-list-item>
                                                                    </v-list>
                                                                </v-menu>

                                                                <v-spacer></v-spacer>

                                                            <span class="mr-4 grey--text">
                                                                Page {{ page }} of {{ numberOfPagesViolation }}
                                                            </span>

                                                            <v-btn fab dark color="blue darken-3" class="mr-1" @click="formerPageViolation">
                                                                <v-icon>mdi-chevron-left</v-icon>
                                                            </v-btn>
                                                            <v-btn fab dark color="blue darken-3" class="ml-1" @click="nextPageViolation">
                                                                        <v-icon>mdi-chevron-right</v-icon>
                                                            </v-btn>
                                                        </v-row>
                                                    </template>

                                                        </v-data-iterator>
                                                        
                                                    </v-container>
                                                    </template>

                                        </v-card-text>
                                    </v-card>
                                    </v-app>
                                </div>

                            </div>
                           
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="button-back btn-primary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="button-back btn-success">Citation</button>
                        </div>
                        </div>
                    </div>
            </div>
            <!-- modal for citation reciept -->
             <div class="modal fade" id="citation" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
                        <div class="modal-content bg-dark">
                        <div class="modal-header">
                            <h5 class="modal-title text-white" id="staticBackdropLabel">
                                Citation Reciept</h5>
                                <v-spacer></v-spacer>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-white">
                            
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
        itemsPerPageArrayViolation: [5, 8, 10],
        search: '',
        filter: {},
        sortDesc: false,
        page: 1,
        itemsPerPage: 2,
        itemsPerPageViolation: 5,
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
      }
    },
    


        computed: {
            numberOfPages () {
                return Math.ceil(this.ordinances.length / this.itemsPerPage)
            },
            numberOfPagesViolation () {
                return Math.ceil(this.ordinances.length / this.itemsPerPageViolation)
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
            nextPageViolation () {
                if(this.page + 1 <= this.numberOfPagesViolation) this.page += 1
            },
            formerPageViolation () {
                if(this.page - 1 >= 1) this.page -= 1
            },
            updateItemsPerPageViolation (number) {
                this.itemsPerPageViolation = number
            },

            showDriver() {
            // Get the checkbox
            var checkBox = document.getElementById("myCheck");
            // Get the output text
            var text = document.getElementById("text");

            // If the checkbox is checked, display the output text
            if (checkBox.checked == true){
                text.style.display = "block";
            } else {
                text.style.display = "none";
            }
            },

            showViolations() {
            // Get the checkbox
            var checkBox = document.getElementById("myCheck1");
            // Get the output text
            var text = document.getElementById("text1");

            // If the checkbox is checked, display the output text
            if (checkBox.checked == true){
                text.style.display = "block";
            } else {
                text.style.display = "none";
            }
            },
            showGuadians() {
            // Get the checkbox
            var checkBox = document.getElementById("myCheck2");
            // Get the output text
            var text = document.getElementById("text2");

            // If the checkbox is checked, display the output text
            if (checkBox.checked == true){
                text.style.display = "block";
            } else {
                text.style.display = "none";
            }
            }

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
