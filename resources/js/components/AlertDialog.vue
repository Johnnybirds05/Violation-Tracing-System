<template>
    <v-app>
        <div class="text-center">
            <v-dialog
                v-model="dialog"
                width="500"
            >

                <v-card>
                    <v-card-title class="text-h5">
                        {{ title }}
                    </v-card-title>

                    <v-card-text>
                        {{ bodyMsg }}
                    </v-card-text>

                    <v-divider></v-divider>

                    <v-card-actions>
                        <v-spacer></v-spacer>
                        <v-btn
                            color="primary"
                            text
                            @click="dialog = false"
                        >
                            Ok
                        </v-btn>
                    </v-card-actions>
                </v-card>
            </v-dialog>
        </div>
    </v-app>


</template>

<script>

export default{


    data() {
        return {
            dialog: false,
            title: '',
            bodyMsg: '',
        }
    },

    methods: {
        openAlert(obj){
            this.dialog = true
            this.title = obj.title
            this.bodyMsg = obj.message
        }
    },

    computed: {

        // title(){
        //     return this.propTitle
        // },
        //
        // bodyMsg() {
        //     return this.propMsg
        // },


    }
}
</script>
