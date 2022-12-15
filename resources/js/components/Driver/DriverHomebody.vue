<template>
    <div class="container-fluid">
        <div class="container driver-body mt-3">
            <div class="row rowleft p-2" v-for="license in License">
                <div class="col driver-picbox">
                      <img src="../../../pics/John Michael Cagadas_.jpg" alt="profile" class="profile">
                      <button type="button" class="btn btn-dark button-detail text-center mt-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                  Edit Details
                      </button>
                </div>
                <div class="col-md-7 cols-name">
                    <h3>John Michael Cagadas </h3>
                    <span>ID: {{license.id}} <b v-if="license.verified === false" class="status ml-2 p-1"> ! Unverified Account</b></span>
                    <span>Expiration Date: {{license.Expiration}} </span>
                    <span>Kauswagan Tangub City</span>
                    <span>johnmichaelcagadas@gmail.com</span>
                    <span>09683013603</span> 
                    
                </div>
                <div class="col">
                    
                </div>
                 <div class="col-md-3 logout-button">
                  <div class="row">
                    <div class="col">
                      <button class="btn btn-dark" 
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
            <!-- Modal -->
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
                        <button type="button" class="btn btn-primary text-white" data-bs-dismiss="modal">okay</button>
                       </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid overflowing me-3">
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item " v-for="(plate, index) in plates" :key="plate.id">
                      <h2 class="accordion-header" :id="'heading'+plate">
                        <button class="accordion-button vehicle-body" :class="{ 'collapsed': index !== 0 }" type="button" data-bs-toggle="collapse" :data-bs-target="'#collapse'+plate" aria-expanded="true" :aria-controls="'collapse'+plate">
                          <div class="row ">
                            <div class="col-md-2">
                                  <img src="../../../pics/truck.jpg" class="vehicle-img">
                            </div>
                            <div class="col-md-7">
                              <div class="row">
                                <div class="col p-0 mt-6">
                                  {{models[index]}} - {{Btypes[index]}}
                                </div>
                              </div>
                              <div class="row">
                                <div class="col p-0">
                                  [{{plate}}]
                                </div>
                              </div>
                            </div>
                            <div class="col-md-3">
                                    <div v-if="verified[index] == true">
                                      <v-alert type="success" class="text-type"> Verified!</v-alert>
                                    </div>
                                    <div v-else>
                                      <v-alert type="error" alt="Go to the City Tourism Office" class="text-type"> Unverified!</v-alert>
                                    </div>
                            </div>
                          </div>
                        </button>
                      </h2>
                      <div :id="'collapse'+plate" class="accordion-collapse collapse vehicle-accord" :aria-labelledby="'heading'+plate" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <div class="row g-2">
                                <div class="col-md-3">
                                  <b> Serial: {{serial[index]}} </b>
                                </div>

                                <div class="col-md-2">
                                  <b>Color: {{color[index]}}</b> 
                                </div>

                                <div class="col-md-3">
                                  <b>Reciept No: {{ReceiptNo[index]}}</b> 
                                </div>
                                
                                <div class="col-md-3">
                                  <b>Expiration Date: {{Expiration[index]}}</b> 
                                </div>

                                <div class="col-md-12 bg-danger text-white"  v-if="verified[index] == false">
                                    <b> Note: To verify your vehicle information. Please go to the Tangub City, City Tourism Office!</b> 
                                </div>
                            </div>
                        </div>
                      </div>
                    </div>
                </div>
                
                <div class="container">
                  <v-btn color="primary" href="/addvehicle">
                    Add Vehicle
                  </v-btn>
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
                        <tbody v-for="(req , index)  in registrationReq" :key="req.name">
                          <tr>
                            <th scope="row">{{index+1}}</th>
                            <td>{{req.name}}</td>
                            <td>{{req.location}}</td>
                            <td>{{req.cost}}</td>
                          </tr>
                        </tbody>
                        <tbody>
                          <tr>
                            <th scope="row" colspan="3">total</th>
                            <td>{{subtotal}}</td>
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
                        <tbody v-for="(lreq , index)  in LicenseReq" :key="lreq.name">
                          <tr>
                            <th scope="row">{{index+1}}</th>
                            <td>{{lreq.name}}</td>
                            <td>{{lreq.location}}</td>
                            <td>{{lreq.cost}}</td>
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
                <tbody v-for="(violation, index) in violations">
                  <tr v-if="index>=0">
                    <th scope="row">{{index+1}}</th>
                    <td>{{violation.name}}</td>
                    <td>{{violation.Date}}</td>
                    <td>{{violation.fines}}</td>
                    <td>{{violation.DayLeft}} Day(s) left </td>
                    <td v-if="violation.Status === true">Settled</td>
                    <td v-else>Unsettled</td>
                  </tr>
                </tbody>
                <tbody >
                  <tr v-if="index>0" >
                    <th colspan="6">
                      <div class="container bg-primary">
                        No pending violation! Keep it up!
                      </div>
                    </th>
                  </tr>
                  <tr v-else>
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
                    <div class="accordion-item " v-for="(ordinance, index) in ordinances" :key="ordinance.name">
                      <h2 class="accordion-header" :id="'heading'+index">
                        <button class="accordion-button vehicle-body" :class="{ 'collapsed': index !== 0 }" type="button" data-bs-toggle="collapse" :data-bs-target="'#collapse'+index" aria-expanded="true" :aria-controls="'collapse'+index">
                            <img src="./../../../pics/feed_white_24dp.svg" class="ordinance-img mr-5"><h5>{{ordinance.name}}</h5>
                        </button>
                      </h2>
                      <div :id="'collapse'+index" class="accordion-collapse collapse vehicle-accord" :aria-labelledby="'heading'+index" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                          <div class="row g-2">
                            <div class="col-md-2">
                              <h6> Description: </h6>
                            </div>
                            <div class="col-md-10">
                              <span>{{ordinance.description}}</span>
                            </div>
                          </div>

                          <div class="container ml-0 mt-3">
                            <div class="row g-0" v-if="ordinance.offense1 != ''">
                            <div class="col-md-2">
                              <b>First Offense: </b>
                            </div>
                            <div class="col-md-4">
                              <span>Php {{ordinance.offense1}}</span>
                              <span v-if="ordinance.additional != ''"> {{ordinance.additional}}</span>
                            </div>
                          </div>

                          <div class="row g-0" v-if="ordinance.offense2 != ''">
                            <div class="col-md-2">
                              <b> Second Offense: </b>
                            </div>
                            <div class="col-md-4">
                              <span>Php {{ordinance.offense2}}</span>
                              <span v-if="ordinance.additional2 != ''"> {{ordinance.additional2}}</span>
                            </div>
                          </div>

                          <div class="row g-0" v-if="ordinance.offense3 != ''">
                            <div class="col-md-2">
                              <b>Third Offense: </b>
                            </div>
                            <div class="col-md-4">
                              <span>Php {{ordinance.offense3}}</span>
                              <span v-if="ordinance.additional3 != ''"> {{ordinance.additional3}}</span>
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
        var myModal = document.getElementById('myModal')
        var myInput = document.getElementById('myInput')

        myModal.addEventListener('shown.bs.modal', function () {
          myInput.focus()
        })
      },
    data () {
        return{
          plates: [
            '2532KD',
            '23YDJD',
            'SA2021K',

          ],
          models: [
            'Honda',
            'Ruster',
            'Tesla'
          ],
          Btypes: [
            'Motor',
            'Car',
            'Truck'
          ],
          serial: [
            'Kvsdghaj',
            'dsjahjsad',
            'jashdkjhas'
          ],
          color: [
            'red',
            'blue',
            'green'
          ],
          Expiration: [
            '11/21/22',
            '02/23/24',
            '05/24/25'
          ],
          ReceiptNo: [
            '1272132',
            '12y38123',
            '71267123'
          ],
          vehiclepics: [
            'motor.png',
            'car.jpg',
            'truck.jpg',
          ],
          verified: [
            false,
            true,
            false
          ],
          registrationReq: [
            {
              name : 'Barangay Clearance',
              location : 'Current Address',
              cost : 0
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
            }
          ],
          LicenseReq: [
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
          ordinances : [
            {
              name: 'Wearing of Slippers',
              description : 'Wearing of slippers while riding will violate the city ordinance code 1237 that states that all the driver must wear shoes!',
              offense1: 100,
              additional: '' ,
              offense2: 500,
              additional2: '' ,
              offense3: 1000,
              additional2: '' ,
            },
            {
              name: 'No Helmet',
              description : "All driver's must wear helmet all the time to protect their head from collision caused by accident and etc. ",
              offense1: 500,
              additional2: '' ,
              offense2: 1000,
              additional2: 'impounding' ,
              offense3: 1000,
              additional3: 'impounding' ,
            },
            {
              name: "No Driver's License",
              description : "All driver's must obtain a license before driving a vehicle to ensure that he is capable of observing the road policy and guidelines",
              offense1: 500,
              additional2: '' ,
              offense2: 1000,
              additional2: 'impounding' ,
              offense3: 1000,
              additional3: 'impounding' ,
            },
            {
              name: "No Vehicle Registration",
              description : "All vehicle must be registered to the LTO to ensure that the vehicle is rightfully owned by the driver and not from car nap.",
              offense1: 500,
              additional2: '' ,
              offense2: 1000,
              additional2: 'impounding' ,
              offense3: 1000,
              additional3: 'impounding' ,
            },
            {
              name: "No Side Mirror",
              description : "The vehicle must be equipped with a side mirror to ensure that the driver will be able to detect what's happening in his back view to avoid collision.",
              offense1: 500,
              additional2: '' ,
              offense2: 1000,
              additional2: 'impounding' ,
              offense3: 1000,
              additional3: 'impounding' ,
            },
            {
              name: "No Back Light",
              description : "The vehicle must be equipped with a backlight for the rider following them during night will be able to detect the driver's presence and avoid collision.",
              offense1: 500,
              additional2: '' ,
              offense2: 1000,
              additional2: 'impounding' ,
              offense3: 1000,
              additional3: 'impounding' ,
            },
            {
              name: "No Rear Light",
              description : "The vehicle must be equipped with a rear light to have a vision during night time and in dark places to avoid collision.",
              offense1: 500,
              additional2: '' ,
              offense2: 1000,
              additional2: 'impounding' ,
              offense3: 1000,
              additional3: 'impounding' ,
            },
            {
              name: "No Signal Light",
              description : "The vehicle must be equipped with a signal light for the other driver to be aware when the said driver will change its direction.",
              offense1: 500,
              additional2: '' ,
              offense2: 1000,
              additional2: 'impounding' ,
              offense3: 1000,
              additional3: 'impounding' ,
            },
          ],
          License: [
            {
              id: '2923jsaj82',
              Expiration: '12/12/25',
              verified: false
            }
          ]
        }
      

   },

   methods: {
    logout(){
      axios.post('/logout').then(()=>{
        window.location = '/'
      })
    }
    

    
   },
   

  
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
    height: 430px;
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
  max-height: 400px;
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
@media only screen and (max-width: 1000px){
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
        width: 90%;
    }
}
</style>