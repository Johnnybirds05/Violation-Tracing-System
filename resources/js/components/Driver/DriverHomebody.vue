<template>
    <div class="container-fluid">
        <div class="container driver-body mt-3">
            <div class="row ml-2 rowleft p-2">
                <div class="col driver-picbox">
                    <img src="../../../pics/John Michael Cagadas_.jpg" alt="profile" class="profile">
                </div>
                <div class="col-md-8 cols-name">
                    <h3>John Michael Cagadas</h3>
                    <span>Purok 1, Kauswagan Tangub City</span>
                    <span>johnmichaelcagadas@gmail.com</span>
                    <span>09683013603</span> 
                </div>
                <div class="col">
                    
                </div>
     
                <a class="btn btn-dark logout-button" href="/logindriver" role="button">Logout <img src="../../../pics/logout_white_24dp.svg"></a> 
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
          <v-card-text>
            <div class="container-fluid overflowing">
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item vehicle-body" v-for="(plate, index) in plates" :key="plate.id">
                      <h2 class="accordion-header" :id="'heading'+plate">
                        <button class="accordion-button" :class="{ 'collapsed': index !== 0 }" type="button" data-bs-toggle="collapse" :data-bs-target="'#collapse'+plate" aria-expanded="true" :aria-controls="'collapse'+plate">
                          <div class="row">
                            <div class="col-md-2">
                              <h1>hah</h1>
                                  <img :src="`../../../pics/${vehicle.img}`">
                            </div>
                            <div class="col-md-6">
                              <div class="row">
                                <div class="col p-0 mt-3">
                                  <b>{{models[index]}} - {{Btypes[index]}}</b>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col p-0">
                                  [{{plate}}]
                                </div>
                              </div>
                            </div>
                          </div>
                        </button>
                      </h2>
                      <div :id="'collapse'+plate" class="accordion-collapse collapse" :class="{ 'show': index === 0 }" :aria-labelledby="'heading'+plate" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                          {{codes[index]}}
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
          </v-card-text>
        </v-card>


      </v-tab-item>
      <v-tab-item>
        <v-card flat>
          <v-card-text>
            hellow
          </v-card-text>
        </v-card>
      </v-tab-item>
      <v-tab-item>
        <v-card flat>
          <v-card-text>
            bro
          </v-card-text>
        </v-card>
      </v-tab-item>

      <v-tab-item>
        <v-card flat>
          <v-card-text>
            Bruh
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
    data () {
        return{
          vehicles: [
            {
              plates : '2532KD',
              models : 'Honda',
              Btypes : 'Motorcycle',
              Expiration: '/12/21/2023',
              picture: 'motor.png'
            }
          ],
          plates: [
            
            '23YDJD',
            'SA2021K',

          ],
          models: [
            
            'Ruster',
            'Tesla'
          ],
          Btypes: [
            
            'Car',
            'Truck'
          ],
          codes: [
            'basdghasd',
            'dsjahjsad',
            'jashdkjhas'
          ],
          vehiclepics: [
            '../../../pics/motor.png',
            '../../../pics/car.jpg',
            '../../../pics/truck.jpg',
          ]
        }
   }
  }
</script>

<style scoped lang="scss">
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
    height: 140px;
    display: flex;
    justify-content: center;
    align-items: center;
    overflow: hidden;

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
}
::v-deep .v-application--wrap {
    min-height: fit-content;
  }
.logout-button{
    position: absolute;
    top: 50px;
    right: 50px;
    width: 130px;
}
.tabs-title{
    font-size: 12px;
}
.overflowing{
  max-height: 400px;
  overflow-y: scroll;

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
    .tabs-title{
        font-size: 11px;
    }
}
</style>