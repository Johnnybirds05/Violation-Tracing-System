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

      <v-tab-item>
        <v-card flat>
          <v-card-text>
            <p>
              Sed aliquam ultrices mauris. Donec posuere vulputate arcu. Morbi ac felis. Etiam feugiat lorem non metus. Sed a libero.
            </p>

            <p>
              Nam ipsum risus, rutrum vitae, vestibulum eu, molestie vel, lacus. Aenean tellus metus, bibendum sed, posuere ac, mattis non, nunc. Aliquam lobortis. Aliquam lobortis. Suspendisse non nisl sit amet velit hendrerit rutrum.
            </p>

            <p class="mb-0">
              Phasellus dolor. Fusce neque. Fusce fermentum odio nec arcu. Pellentesque libero tortor, tincidunt et, tincidunt eget, semper nec, quam. Phasellus blandit leo ut odio.
            </p>
          </v-card-text>
        </v-card>
      </v-tab-item>
      <v-tab-item>
        <v-card flat>
          <v-card-text>
            <p>
              Morbi nec metus. Suspendisse faucibus, nunc et pellentesque egestas, lacus ante convallis tellus, vitae iaculis lacus elit id tortor. Sed mollis, eros et ultrices tempus, mauris ipsum aliquam libero, non adipiscing dolor urna a orci. Curabitur ligula sapien, tincidunt non, euismod vitae, posuere imperdiet, leo. Nunc sed turpis.
            </p>

            <p>
              Suspendisse feugiat. Suspendisse faucibus, nunc et pellentesque egestas, lacus ante convallis tellus, vitae iaculis lacus elit id tortor. Proin viverra, ligula sit amet ultrices semper, ligula arcu tristique sapien, a accumsan nisi mauris ac eros. In hac habitasse platea dictumst. Fusce ac felis sit amet ligula pharetra condimentum.
            </p>

            <p>
              Sed consequat, leo eget bibendum sodales, augue velit cursus nunc, quis gravida magna mi a libero. Nam commodo suscipit quam. In consectetuer turpis ut velit. Sed cursus turpis vitae tortor. Aliquam eu nunc.
            </p>

            <p>
              Etiam ut purus mattis mauris sodales aliquam. Ut varius tincidunt libero. Aenean viverra rhoncus pede. Duis leo. Fusce fermentum odio nec arcu.
            </p>

            <p class="mb-0">
              Donec venenatis vulputate lorem. Aenean viverra rhoncus pede. In dui magna, posuere eget, vestibulum et, tempor auctor, justo. Fusce commodo aliquam arcu. Suspendisse enim turpis, dictum sed, iaculis a, condimentum nec, nisi.
            </p>
          </v-card-text>
        </v-card>
      </v-tab-item>
      <v-tab-item>
        <v-card flat>
          <v-card-text>
            <p>
              Fusce a quam. Phasellus nec sem in justo pellentesque facilisis. Nam eget dui. Proin viverra, ligula sit amet ultrices semper, ligula arcu tristique sapien, a accumsan nisi mauris ac eros. In dui magna, posuere eget, vestibulum et, tempor auctor, justo.
            </p>

            <p class="mb-0">
              Cras sagittis. Phasellus nec sem in justo pellentesque facilisis. Proin sapien ipsum, porta a, auctor quis, euismod ut, mi. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nam at tortor in tellus interdum sagittis.
            </p>
          </v-card-text>
        </v-card>
      </v-tab-item>

      <v-tab-item>
        <v-card flat>
          <v-card-text>
            <p>
              Fusce a quam. Phasellus nec sem in justo pellentesque facilisis. Nam eget dui. Proin viverra, ligula sit amet ultrices semper, ligula arcu tristique sapien, a accumsan nisi mauris ac eros. In dui magna, posuere eget, vestibulum et, tempor auctor, justo.
            </p>

            <p class="mb-0">
              Cras sagittis. Phasellus nec sem in justo pellentesque facilisis. Proin sapien ipsum, porta a, auctor quis, euismod ut, mi. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nam at tortor in tellus interdum sagittis.
            </p>
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
      return {
        tab: null,
        text: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
      }
    },
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