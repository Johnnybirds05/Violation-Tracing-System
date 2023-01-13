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
                    <v-toolbar-title>
                            <v-list-item>
                                <button class="cssbuttons-io-button button-back" @click="logout"> Logout
                                    <div class="icon">
                                        <svg height="24" width="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M0 0h24v24H0z" fill="none"></path><path d="M16.172 11l-5.364-5.364 1.414-1.414L20 12l-7.778 7.778-1.414-1.414L16.172 13H4v-2z" fill="currentColor"></path></svg>
                                    </div>
                                </button>
                            </v-list-item>
                    </v-toolbar-title>


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
                                        <button class="icon-btn add-btn" @click="openModalOrdinance(0)">
                                            <div class="add-icon"></div>
                                            <div class="btn-txt"><b>Add Ordinance</b></div>
                                        </button>
                                    
                                </v-toolbar>
                            </template>

                            <template v-slot:default="props">
                                <v-row>
                                    <v-col v-for="item in props.items" :key="item.name" cols="12" sm="10" md="8" lg="6">
                                        <v-card class="table-text" color="brown darken-4">
                                            <v-card-title class="subheading font-weight-bold"> 
                                                <img src="./../../../pics/task_alt_white_24dp.svg" class="vehicle-img mr-5">
                                                <h6> <b>{{ item.ordinance_name }}</b> </h6>
                                                <v-spacer></v-spacer>
                                                <v-card color="warning">
                                                    <v-icon small class="m-1" @click="openModalOrdinance(item.ordinance_id)">
                                                        mdi-pencil
                                                    </v-icon> 
                                                    <v-icon small class="m-1" @click="openDeleteDialog(item.ordinance_id)">
                                                        mdi-delete
                                                    </v-icon>
                                                </v-card>
                                            </v-card-title>

                                            <v-list dense class="table-text">
                                                <v-list-item>
                                                    <div class="container-fluid">
                                                        <div class="row g-2">
                                                            <div class="col-md-3">
                                                                <h4> <b>Description:</b> </h4>
                                                            </div>
                                                            <div class="col-md-9 justified font12">
                                                                <b>{{item.description}}</b>
                                                            </div>
                                                        </div>

                                                        <div class="container ml-0 mt-3">
                                                           
                                                            <div class="row g-0 font12" v-for="(i, index) in item.ordinance_penalties" 
                                                                :key="index">
                                                                <div class="col-md-4">
                                                                    <b>Offense No. {{ i.offense_order }}: {{ i.cost }}</b>
                                                                </div>

                                                                <div class="col-md-5" v-if="i.is_impound === 1">
                                                                    <span>Impound</span>
                                                                    <span></span>
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




             <!-- modals for edit ordinance -->
             <template>
                    <v-row justify="center">
                        <v-dialog
                        v-model="modalOrdinance"
                        scrollable
                        persistent
                        max-width="860px"
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
                                    <v-col cols="12" md="6" sm="6">
                                        <v-text-field v-model="fields.ordinance_name"
                                            outlined
                                            clearable
                                        >
                                        <template v-slot:label>
                                            <v-icon style="vertical-align: middle">
                                            mdi-view-list
                                            </v-icon>
                                            Ordinance Name
                                        </template>
                                    </v-text-field>
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
                                            v-model="fields.description"
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


                                <!--dynamic inputs-->


                                <v-row v-for="(item, index) in fields.ordinance_penalties" :key="index">

                                    <v-col cols="12" md="4" sm="4">
                                        <v-text-field outlined clearable v-model="item.offense_order">
                                            <template v-slot:label>
                                                <v-icon style="vertical-align: middle">
                                                mdi-cash
                                                </v-icon>
                                                Order No.
                                            </template>
                                        </v-text-field>
                                    </v-col>

                                    <v-col cols="12" md="4" sm="4">
                                        <v-text-field outlined clearable v-model="item.cost">
                                            <template v-slot:label>
                                                <v-icon style="vertical-align: middle">
                                                mdi-cash
                                                </v-icon>
                                                Cost
                                            </template>
                                        </v-text-field>
                                    </v-col>

                                    <v-col cols="12" md="4" sm="4">
                                        <v-checkbox
                                            v-model="item.is_impound"
                                            label="Impound"
                                            ></v-checkbox>
                                    </v-col>

                                    <v-col cols="12" md="1" sm="4">
                                        <v-btn class="ma-1" @click="removePenalty(index)">X</v-btn>
                                    </v-col>

                                </v-row><!--dere ra ang loop-->

                                <v-btn @click="addPenalty">New</v-btn>

                            </div>
                                
                            </v-card-text>
                            <v-divider></v-divider>
                            <v-card-actions>
                                <v-spacer></v-spacer>
                                <v-btn
                                    outlined
                                    text
                                    @click="modalOrdinance = false"
                                >
                                    Cancel
                                </v-btn>
                                <v-btn
                                    outlined
                                    text
                                    @click="submitOrdinance"
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

        modalOrdinance: false,

        ordinance_id: 0,

        tab: null,
        drawer: null,
        itemsPerPageArray: [2, 4, 8],
        search: '',
        filter: {},
        sortDesc: false,
        page: 1,
        itemsPerPage: 2,
        sortBy: '',
       
        ordinances : [],

          fields: {
            ordinance_penalties: []
          },
          errors: {},

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
            
            
            addPenalty(){
                this.fields.ordinance_penalties.push({
                    ordinance_penalty_id: 0,
                    ordinance_id: 0,
                    order_no: 0,
                    cost: 0,
                    is_impound: 0
                });
            },

            removePenalty(ix){
                
                if(this.fields.ordinance_penalties[ix].ordinance_penalty_id){
                    let id = this.fields.ordinance_penalties[ix].ordinance_penalty_id;
                    axios.delete('/ordinance-penalty/' + id).then(res=>{
                        alert('Successfully removed.')
                    })
                }

                this.fields.ordinance_penalties.splice(ix, 1);
                //console.log('delete with id use axios')
            },

            logout(){
                axios.post('/logout').then(()=>{
                    window.location = '/'
                })
            },

            loadOrdinances(){
                axios.get('/load-ordinances').then(res=>{
                    this.ordinances = res.data
                }).catch(err=>{
                
                })
            },

            openModalOrdinance(itemId){
                this.fields = {
                    ordinance_penalties: []
                }

                this.ordinance_id = 0
                console.log(itemId)
                this.ordinance_id = itemId;
                this.modalOrdinance = true;
                

                if(itemId > 0){
                    this.getData(itemId)
                }
            },


            submitOrdinance(){
                if(this.ordinance_id > 0){
                    //update
                    axios.put('/legislative-ordinance/'+ this.ordinance_id, this.fields).then(res=>{
                        if(res.data.status === 'updated'){
                            this.modalOrdinance = false
                            alert('Successfully updated.')
                        }
                        this.loadOrdinances();
                       
                    }).catch(err=>{
                        if(err.response.status === 422){
                            this.errors = err.response.data.errors;
                        }
                    })
                }else{
                    //insert
                    axios.post('/legislative-ordinance', this.fields).then(res=>{
                        if(res.data.status === 'saved'){
                            this.modalOrdinance = false
                            alert('Successfully saved.')
                        }
                        this.loadOrdinances();
                       
                    }).catch(err=>{
                        if(err.response.status === 422){
                            this.errors = err.response.data.errors;
                        }
                    })
                }
            },


            getData(itemId){
                axios.get('/legislative-ordinance/' + itemId).then(res=>{
                    this.fields = res.data
                })
            },


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
        this.loadOrdinances()
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
