<template>
    <div>
        <div>

         
            <div class="w-button-container">
               <v-btn @click="editItem(0)">New</v-btn>
            </div>

            <v-divider></v-divider>
           
            <v-row>
                <v-col md="6">
                    <v-row>
                        <v-col>
                            <v-card class="ma-3">
                                <v-card-title>
                                    License Verification Requirements
                                </v-card-title>
                                <v-simple-table dark>
                                    <template v-slot:default>
                                    <thead>
                                        <tr>
                                            <th class="text-left">
                                                ID
                                            </th>
                                            <th class="text-left">
                                                Requirements
                                            </th>
                                            <th>
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="item in license_requirements"
                                            :key="item.name"
                                        >
                                            <td>{{ item.requirement_id }}</td>
                                            <td>{{ item.requirement_name }}</td>
                                            <td>
                                                <v-icon small class="mr-2" @click="editItem(item.requirement_id)">
                                                    mdi-pencil
                                                </v-icon>
                                                <v-icon small @click="deleteItem(item.requirement_id)">
                                                    mdi-delete
                                                </v-icon>
                                            </td>
                                        </tr>
                                    </tbody>
                                    </template>
                                </v-simple-table>
                            </v-card>
                        </v-col>
                    </v-row>
                    
                </v-col>

                <v-col md="6">
                    <v-row>
                        <v-col>
                            <v-card class="ma-3">
                                <v-card-title>
                                    Vehicle Registration Verification Requirements
                                </v-card-title>
                                <v-simple-table dark>
                                    <template v-slot:default>
                                    <thead>
                                        <tr>
                                            <th class="text-left">
                                                ID
                                            </th>
                                            <th class="text-left">
                                                Requirements
                                            </th>
                                            <th>
                                                Action
                                            </th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="item in registration_requirements"
                                            :key="item.name"
                                        >
                                            <td>{{ item.requirement_id }}</td>
                                            <td>{{ item.requirement_name }}</td>
                                            <td>
                                                <v-icon small class="mr-2" @click="editItem(item.requirement_id)">
                                                    mdi-pencil
                                                </v-icon>
                                                <v-icon small @click="deleteItem(item.requirement_id)">
                                                    mdi-delete
                                                </v-icon>
                                            </td>
                                        </tr>
                                    </tbody>
                                    </template>
                                </v-simple-table>
                            </v-card>
                        </v-col>
                    </v-row>
                </v-col>
            </v-row>
            
        </div>



        <v-dialog v-model="dialogDelete" max-width="500px">
          <v-card>
            <v-card-title class="text-h5">Are you sure you want to delete this item?</v-card-title>
                <v-card-actions>
                    <v-spacer></v-spacer>
                    <v-btn color="blue darken-1" text @click="dialogDelete = false">Cancel</v-btn>
                    <v-btn color="blue darken-1" text @click="submitDelete">OK</v-btn>
                    <v-spacer></v-spacer>
                </v-card-actions>
            </v-card>
        </v-dialog>


        <v-dialog v-model="dialogSuccess" max-width="500px">
          <v-card>
            <v-card-title class="text-h5">Successfully Saved.</v-card-title>
                <v-card-actions>
                    <v-spacer></v-spacer>
                    <v-btn color="blue darken-1" text @click="dialogSuccess = false">OK</v-btn>
                    <v-spacer></v-spacer>
                </v-card-actions>
            </v-card>
        </v-dialog>


        <v-row justify="center">
            <v-dialog v-model="editFormDialog" persistent max-width="600">
            <v-card>
                <v-card-title class="text-h5">
                    
                </v-card-title>
                <v-card-text>
                    <v-row>
                        <v-col>
                            <v-select
                                item-value="requirement_type_id"
                                item-text="requirement_type"
                                :items="requirement_types"
                                filled
                                v-model="fields.requirement_type_id"
                                label="Requirement Type"
                                ></v-select>

                            <v-text-field
                                label="Requirement Name"
                                :rules="[]"
                                v-model="fields.requirement_name"
                                outlined
                                hide-details="auto"
                            ></v-text-field>
                        </v-col>
                    </v-row>
                </v-card-text>

                <v-card-actions>
                    <v-spacer></v-spacer>
                    <v-btn color="green darken-1" text @click="editFormDialog = false">
                        Close
                    </v-btn>
                    <v-btn
                        color="green darken-1"
                        text
                        @click="submit"
                    >
                        Save
                    </v-btn>
                </v-card-actions>
            </v-card>
            </v-dialog>
        </v-row>

    </div>
</template>

<script>

export default{
    data(){
        return {
            license_requirements: [],
            registration_requirements: [],
            requirement_types: [],

            editFormDialog: false,
            dialogDelete: false,
            dialogSuccess: false,
            closeDelete: false,

            requirement_id: 0,

            fields: {},
            errors: {},
        }
    },

    methods: {
        getLicenseRequirements(){
            axios.get('/get-requirements?req_type=1').then(res=>{
                this.license_requirements = res.data
            })
        },

        getRegistrationRequirements(){
            axios.get('/get-requirements?req_type=2').then(res=>{
                this.registration_requirements = res.data
            })
        },

        getRequirementTypes(){
            axios.get('/get-requirement-types').then(res=>{
                this.requirement_types = res.data
            })
        },

        getData(itemId){
            axios.get('/requirements/' + itemId).then(res=>{
                this.fields = res.data
            })
        }, 

        editItem(itemId){
            this.fields = {}
            this.errors = {}
            this.requirement_id = itemId
            this.editFormDialog = true;

            if(itemId > 0){
                this.getData(itemId);
            }
        },

        submit(){
            
            if(this.requirement_id > 0){
                //update
                axios.put('/requirements/' + this.requirement_id, this.fields).then(res=>{
                    if(res.data.status === 'updated'){
                        this.editFormDialog = false
                        this.getLicenseRequirements()
                        this.getRegistrationRequirements()
                    }
                }).catch(err=>{
                    if(err.response.status === 422){
                        this.errors = err.response.data.errors
                    }
                })
            }else{
                //insert
                axios.post('/requirements', this.fields).then(res=>{
                    this.editFormDialog = false
                    this.getLicenseRequirements()
                    this.getRegistrationRequirements()
                }).catch(err=>{
                    if(err.response.status === 422){
                        this.errors = err.response.data.errors
                    }
                })
            }
            
        },



        deleteItem(itemId){
            this.requirement_id = 0;
            this.dialogDelete = true;
            this.requirement_id = itemId;
        },

        submitDelete(){
            axios.delete('/requirements/' + this.requirement_id).then(res=>{
                if(res.data.status === 'deleted'){
                    this.dialogDelete = false
                    this.getLicenseRequirements()
                    this.getRegistrationRequirements()
                }
            }).catch(err=>{
            
            })
        }
        


    },

    mounted(){
        this.getRequirementTypes()
        this.getLicenseRequirements()
        this.getRegistrationRequirements()
    }
}
</script>

<style scoped>
    .w-button-container{
        display: flex;
        margin: 30px 0 10px 30px;
    }
</style>