<template>
    <div class="container-fluid">
        <div class="container driver-body mt-3">
            <div class="row rowleft p-2">
                <div class="col driver-picbox">
                      <img src="../../../pics/John Michael Cagadas_.jpg" alt="profile" class="profile">
                      <button class="button btn button-detail text-center mt-2" style="vertical-align:middle" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <span><b>Edit </b></span>
                      </button>

                </div>
                <div class="col-md-7 cols-name">
                    <h3>{{ fullName }}</h3>
                    <span>ID: {{ user.driver_license_no }}
                        <b class="status ml-2 p-1" v-if="user.is_verified === 0"> ! Unverified Account</b>
                    </span>
                    <span>Expiration Date:  {{ user.expr_date }}</span>
                    <span>{{ driverAddress }}</span>
                    <span>{{ user.email }}</span>
                    <span>{{ user.mobile_no  }}</span>

                </div>
                <div class="col">

                </div>
                 <div class="col-md-3 logout-button">
                  <div class="row">
                    <div class="col">
                      <button class="button-back btn-warning"
                        @click="logout"
                        role="button">Logout
                        <img src="../../../pics/logout_white_24dp.svg">
                      </button>
                    </div>
                  </div>
                 </div>

            </div>


        </div>
        <div class="container drivers-links">
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
          <v-card-text class="bg-dark">


            <!-- Modals for vehicle information -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content bg-dark">
                      <div class="modal-header">
                        <h5 class="modal-title text-white" id="exampleModalLabel">Information: </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body text-white">
                        Please go to the City Tourism Office of Tangub City to be able to edit the details of your profile or vehicle!
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="button-back" data-bs-dismiss="modal">okay</button>
                       </div>
                    </div>
                </div>
            </div>

            <!-- modals for delete -->
            <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content bg-dark">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel text-white">Warning!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body text-white">
                    Are you sure you want to continue?
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="button-back btn-success" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="button-back btn-danger">Save changes</button>
                  </div>
                </div>
              </div>
            </div>


            <!-- Modals for Insert Vehicle -->
            <div class="modal fade" id="vehiclelist" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
                        <div class="modal-content bg-dark">
                        <div class="modal-header">
                            <h5 class="modal-title text-white" id="staticBackdropLabel">
                                <img src="../../../pics/sports_motorsports_white_24dp.svg" class="driver-icon" alt="...">
                                Driver's Vehicle List</h5>
                                <v-spacer></v-spacer>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-white">
                            <div class="row g-3 centered">
                                <div class="col-md-3">
                                    <label class="form-label"> Model: </label>
                                    <input type="text" v-model="fields.model" class="form-control input" id="driver-firstname">
                                </div>

                                <div class="col-md-3">
                                    <label class="form-label">Body Type: </label>
                                    <select class="form-select input" v-model="fields.body_type" aria-label="Default select example">
                                        <option selected disabled>Select</option>
                                        <option value="1">Motocycle</option>
                                        <option value="2">Tricycle</option>
                                        <option value="3">Car</option>
                                        <option value="2">Truck</option>
                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <label class="form-label"> Color: </label>
                                    <input type="text" v-model="fields.color" class="form-control input" id="driver-firstname">
                                </div>

                            </div>

                            <div class="row g-3 centered">

                                <div class="col-md-3">
                                    <label class="form-label"> Plate No: </label>
                                    <input type="text" v-model="fields.plate" class="form-control input" id="driver-firstname">
                                </div>

                                <div class="col-md-3">
                                    <label class="form-label"> Serial No: </label>
                                    <input type="text" v-model="fields.serial" class="form-control" id="driver-firstname">
                                </div>

                                <div class="col-md-3">
                                    <label class="form-label"> Receipt No: </label>
                                    <input type="text" v-model="fields.receipt_no" class="form-control input" id="driver-firstname">
                                </div>

                            </div>

                            <div class="row g-3 centered mb-3">

                                <div class="col-md-3">
                                    <label for="date" class="form-label">Expiration Date: </label>
                                    <div class="input-group date" id="expiration">
                                        <input v-model="fields.expiration" type="text" class="form-control input">
                                        <span class="input-group-append">
                                            <span class="input-group-text bg-white">
                                                <i class="fa fa-calendar icons"></i>
                                            </span>
                                        </span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label for="formFileSm" class="form-label input">Vehicle Photo:</label>
                                    <input class="form-control" id="vehicle_img" type="file" accept="image/png, image/gif, image/jpeg">
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="button-back btn-primary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="button-back btn-success" @click="submitVehicle">Save</button>
                        </div>
                        </div>
                    </div>
                </div>

            <!-- Driver Details -->

            <div class="container-fluid overflowing me-3">
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="heading">
                        <button class="accordion-button vehicle-body collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse" aria-expanded="true" aria-controls="collapse">
                          <div class="row ">
                            <div class="col-md-2">
                                  <img src="../../../pics/truck.jpg" class="vehicle-img">
                            </div>
                            <div class="col-md-7">
                              <div class="row">
                                <div class="col p-0 mt-6">
                                  
                                </div>
                              </div>
                              <div class="row">
                                <div class="col p-0">
                                  
                                </div>
                              </div>
                            </div>
                            <div class="col-md-3">
                                    <div>
                                      <v-alert type="success" class="text-type"> Verified!</v-alert>
                                    </div>
                                    <!-- <div>
                                      <v-alert type="warning" alt="Go to the City Tourism Office" class="text-type"> Unverified!</v-alert>
                                    </div> -->
                            </div>
                          </div>
                        </button>
                      </h2>
                      <div id="collapse" class="accordion-collapse collapse vehicle-accord" aria-labelledby="heading" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <div class="row g-2">
                                <div class="col-md-3">
                                  <b> Serial: </b>
                                </div>

                                <div class="col-md-2">
                                  <b>Color: </b>
                                </div>

                                <div class="col-md-2">
                                  <b>Reciept No:</b>
                                </div>

                                <div class="col-md-2">
                                  <b>Expiration Date: </b>
                                </div>
                                <div class="col-md-3">
                                  <button class="noselect" data-bs-toggle="modal" data-bs-target="#exampleModal2">
                                    <span class="text">Delete</span><span class="icone"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z"></path></svg></span>
                                  </button>
                                </div>

                                <div class="col-md-12 bg-danger text-white">
                                    <b> Note: To verify your vehicle information. Please go to the Tangub City, City Tourism Office!</b>
                                </div>
                            </div>
                        </div>
                      </div>
                    </div>
                </div>

                <div class="container">
                    <button class="icon-btn add-btn" data-bs-toggle="modal" data-bs-target="#vehiclelist" data-bs-dismiss="modal">
                      <div class="add-icon"></div>
                      <div class="btn-txt"><b>Add Vehicle</b></div>
                  </button>

                </div>
            </div>
          </v-card-text>
        </v-card>

      <!-- for the requirement tab -->
      </v-tab-item>
      <v-tab-item>
        <v-card flat>
          <v-card-text>
            <div class="container-fluid overflowing me-3">
              <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                  <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button collapsed vehicle-body" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                      <img src="./../../../pics/no_crash_white_24dp.svg" class="vehicle-img mr-5"> Vehicle Registration
                    </button>
                  </h2>
                  <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                      <table class="table table-striped table-hover table-light">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Requirement</th>
                            <th scope="col">Location</th>
                            <th scope="col">Cost</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th scope="row"></th>
                            <td></td>
                            <td></td>
                            <td></td>

                          </tr>
                        </tbody>
                        <tbody>
                          <tr>
                            <th scope="row" colspan="3">total</th>
                            <td></td>
                          </tr>
                        </tbody>

                      </table>
                    </div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed vehicle-body" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                      <img src="./../../../pics/how_to_reg_white_24dp.svg" class="vehicle-img mr-5"> Driver's License
                    </button>
                  </h2>
                  <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                      <table class="table table-striped table-hover table-light">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Requirement</th>
                            <th scope="col">Location</th>
                            <th scope="col">Cost</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th scope="row"></th>
                            <td></td>
                            <td></td>
                            <td></td>
                          </tr>
                        </tbody>
                        <tbody>
                          <tr>
                            <th scope="row" colspan="3">total</th>
                            <td>I dont know how</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </v-card-text>
        </v-card>
      </v-tab-item>


      <!-- this is for the Violation tab -->
      <v-tab-item>
        <v-card flat>
          <v-card-text>
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
                  <tr">
                    <th scope="row"></th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td> Day(s) left </td>
                    <td></td>
                  </tr>
                </tbody>
                <tbody >
                  <tr>
                    <th colspan="6">
                      <div class="container bg-primary">
                        No pending violation! Keep it up!
                      </div>
                    </th>
                  </tr>
                  <tr>
                    <th colspan="6">
                      <div class="container bg-danger">
                        <b>Note: </b> Please Settle your violation before the warning date! You may settle your violation
                          in the City Treasurer's Office by paying the fines or in the legal counsel by doing community
                          service.
                      </div>
                    </th>
                  </tr>
                </tbody>
              </table>

            </div>
          </v-card-text>
        </v-card>
      </v-tab-item>


      <v-tab-item>
        <v-card flat>
          <v-card-text>
            <div class="container-fluid overflowing me-3">
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item ">
                      <h2 class="accordion-header" id="heading">
                        <button class="accordion-button vehicle-body collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse" aria-expanded="true" aria-controls="collapse">
                            <img src="./../../../pics/feed_white_24dp.svg" class="ordinance-img mr-5"><h5></h5>
                        </button>
                      </h2>
                      <div id="collapse" class="accordion-collapse collapse vehicle-accord" aria-labelledby="heading" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                          <div class="row g-2">
                            <div class="col-md-2">
                              <h6> Description: </h6>
                            </div>
                            <div class="col-md-10">
                              <b></b>
                            </div>
                          </div>

                          <div class="container ml-0 mt-3">
                            <div class="row g-0">
                            <div class="col-md-2">
                              <b>Date Created: </b>
                            </div>
                            <div class="col-md-4">
                              <span>Php </span>
                            </div>
                          </div>
                            <div class="row g-0">
                            <div class="col-md-2">
                              <b>First Offense: </b>
                            </div>
                            <div class="col-md-4">
                              <span>Php </span>
                              <span> </span>
                            </div>
                          </div>

                          <div class="row g-0">
                            <div class="col-md-2">
                              <b> Second Offense: </b>
                            </div>
                            <div class="col-md-4">
                              <span>Php </span>
                              <span></span>
                            </div>
                          </div>

                          <div class="row g-0">
                            <div class="col-md-2">
                              <b>Third Offense: </b>
                            </div>
                            <div class="col-md-4">
                              <span>Php </span>
                              <span></span>
                            </div>
                          </div>
                          </div>



                        </div>
                      </div>
                    </div>
                </div>
            </div>
          </v-card-text>
        </v-card>
      </v-tab-item>
                    </v-tabs>
                  </v-card>
            </v-app>
        </div>

    </div>

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
.driver-body{
    width: 75%;
    background-color: rgb(46, 46, 46);
    font-family: monospace;
    color: white;
    font-size: 15px;
    opacity: .8;
    border-radius: 10px;
}
.profile{
  width: 130px;
  height: 130px;
  object-fit: contain;
  border-radius: 100px;
  border: 5px solid rgb(156, 156, 156);
}
.blued{
    background-color: aqua;
}
.driver-picbox{
    width: 140px;
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
}
h3{
    font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
    position: relative;
    top: 10px;
}
.cols-name{
    display: flex;
    flex-direction: column;
}
.drivers-links{
    width: 76%;
    height: 540px;
    font-family: monospace;
    position: relative;
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
.vehicle-accord{
  background-color: rgb(207, 207, 207);
  color: rgb(0, 0, 0);
  font-size: 13px;
}
.vehicle-body{
  background-color: rgb(22, 22, 22);
  color: rgb(236, 236, 236);
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
@media only screen and (max-width: 500px){
    .cols-name{
        display: flex;
        justify-content: center;
        align-items: center;
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
