<template>
    <div>

        <v-card flat>
            <v-card-text>
                <v-row>
                    <v-col>
                        <div class="card-header">
                            <div class="card-section-text">
                                Driver Information
                            </div>
                        </div>
                    </v-col>
                </v-row>
                <v-row>
                    <v-col cols="12" md="3" sm="6">
                        <v-text-field
                            outlined
                            clearable
                            v-model="fields.fname"
                        >

                            <template v-slot:label>
                                <v-icon style="vertical-align: middle">
                                    mdi-account
                                </v-icon>
                                First Name
                            </template>
                        </v-text-field>
                    </v-col>

                    <v-col cols="12" md="3" sm="6">
                        <v-text-field
                            outlined
                            clearable
                            v-model="fields.mname"
                        >
                            <template v-slot:label>
                                <v-icon style="vertical-align: middle">
                                    mdi-account
                                </v-icon>
                                Middle Name
                            </template>
                        </v-text-field>
                    </v-col>

                    <v-col cols="12" md="3" sm="6">
                        <v-text-field
                            outlined
                            clearable
                            v-model="fields.lname"

                        >
                            <template v-slot:label>
                                <v-icon style="vertical-align: middle">
                                    mdi-account
                                </v-icon>
                                Last Name
                            </template>
                        </v-text-field>
                    </v-col>

                    <v-col cols="12" md="3" sm="6">
                        <v-text-field
                            hint="leave blank if none"
                            outlined
                            clearable
                            v-model="fields.suffix"
                        >
                            <template v-slot:label>
                                <v-icon style="vertical-align: middle">
                                    mdi-account
                                </v-icon>
                                Suffix
                            </template>
                        </v-text-field>
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
                        >
                            <template v-slot:label>
                                <v-icon style="vertical-align: middle">
                                    mdi-map-marker
                                </v-icon>
                                Province
                            </template>
                        </v-select>
                    </v-col>

                    <v-col cols="12" md="3" sm="6">
                        <v-select
                            item-value="citymunCode"
                            item-text="citymunDesc"
                            :items="cities"
                            outlined
                            @change="loadBarangays"
                            v-model="fields.city"
                        >
                            <template v-slot:label>
                                <v-icon style="vertical-align: middle">
                                    mdi-map-marker
                                </v-icon>
                                City
                            </template>
                        </v-select>
                    </v-col>
                    <v-col cols="12" md="3" sm="6">
                        <v-select
                            item-value="brgyCode"
                            item-text="brgyDesc"
                            :items="barangays"
                            outlined
                            v-model="fields.barangay"
                        >
                            <template v-slot:label>
                                <v-icon style="vertical-align: middle">
                                    mdi-map-marker
                                </v-icon>
                                Barangay
                            </template>
                        </v-select>
                    </v-col>

                    <v-col cols="12" md="3" sm="6">
                        <v-text-field
                            outlined
                            v-model="fields.street"
                        >
                            <template v-slot:label>
                                <v-icon style="vertical-align: middle">
                                    mdi-map-marker
                                </v-icon>
                                Street
                            </template>
                        </v-text-field>
                    </v-col>
                </v-row>
                <v-row>
                    <v-col cols="12" md="4" sm="6">
                        <v-text-field
                            outlined
                            clearable
                            v-model="fields.model"
                        >
                            <template v-slot:label>
                                <v-icon style="vertical-align: middle">
                                    mdi-ticket-confirmation
                                </v-icon>
                                Model
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
                            v-model="fields.plate_no"
                            :error-messages="errors.plate_no ? errors.plate_no[0] : ''"
                        >
                            <template v-slot:label>
                                <v-icon style="vertical-align: middle">
                                    mdi-ticket-confirmation
                                </v-icon>
                                Plate No.
                            </template>
                        </v-text-field>
                    </v-col>
                </v-row>

                <v-row>
                    <v-col cols="12" md="6">
                        <v-text-field outlined clearable v-model="fields.citation_no">
                            <template v-slot:label>
                                <v-icon style="vertical-align: middle">
                                    mdi-card
                                </v-icon>
                                Citation No
                            </template>
                        </v-text-field>
                    </v-col>
                </v-row>

                <div v-for="(citation, ix) in citations" :key="ix">
                    <v-row class="centered">
                        <v-col
                            cols="12"
                            md="5"
                            sm="6">

                            <v-select
                                :items="ordinances"
                                item-value="ordinance_id"
                                item-text="ordinance_name"
                                outlined
                                @change="getOrdinancePenalty(citation, ix)"
                                v-model="citation.ordinance_id"
                            ><template v-slot:label>
                                <v-icon style="vertical-align: middle">
                                    mdi-card
                                </v-icon>
                                add Violations
                            </template>
                            </v-select>
                        </v-col>

                        <v-col
                            cols="12"
                            md="5"
                            sm="6">
                            <v-select
                                :items="citation.ordinance_penalties"
                                item-value="ordinance_penalty_id"
                                item-text="offense_order"
                                outlined
                                v-model="citation.ordinance_penalty_id"
                            ><template v-slot:label>
                                <v-icon style="vertical-align: middle">
                                    mdi-card
                                </v-icon>
                                Penalty Cost
                            </template></v-select>
                        </v-col>
                    </v-row>
                    <div>
                        <v-btn @click="removeCitation(ix)">
                            Delete Citation
                        </v-btn>
                    </div>
                </div>



                <!-- signature-->
               <div>

                	<!-- Content -->
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <h1>E-Signature</h1>
                                <p>Sign in the canvas below and save your signature as an image!</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <canvas id="sig-canvas" 
                                    @mousedown="canvasMouseDown"
                                    @mouseup="canvasMouseUp"
                                    @mousemove="canvasMouseMove"
                                    @touchstart="canvasTouchStart"
                                    @touchmove="canvasTouchMove"
                                    @touchend="canvasTouchEnd"
                                width="620" height="160">
                                    Get a better browser, bro.
                                </canvas>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <button class="btn btn-primary" id="sig-submitBtn">Submit Signature</button>
                                <button class="btn btn-default" id="sig-clearBtn">Clear Signature</button>
                            </div>
                        </div>
                        <br/>
                        <div class="row">
                            <div class="col-md-12">
                                <textarea id="sig-dataUrl" class="form-control" rows="5">Data URL for your signature will go here!</textarea>
                            </div>
                        </div>
                        <br/>
                        <div class="row">
                            <div class="col-md-12">
                                <img id="sig-image" src="" alt="Your signature will go here!"/>
                            </div>
                        </div>
                    </div>
                
               </div> <!--end signature-->

                <div>
                    <v-btn @click="addCitation">Add Citation</v-btn>
                </div>

                <v-divider></v-divider>
                <v-card-actions>
                    <v-spacer></v-spacer>
                    <v-btn
                        outlined
                        text
                        @click="violationDialog = false"
                    >
                        Cancel
                    </v-btn>
                    <v-btn
                        outlined
                        text
                        @click="submitCitation"
                        class="ml-3"
                    >
                        Proceed to Citation
                    </v-btn>
                    <v-spacer></v-spacer>
                </v-card-actions>
            </v-card-text>
        </v-card>

    </div>
</template>

<script>
    

   


export default{
    
    data(){
        const canvas = document.getElementById("sig-canvas")
     

        return{
            citations: [],
            fields: {},
            errors: {},


            ordinances: [],

            provinces:[],
            cities: [],
            barangays: [],

            
        }


    },

    methods: {
        addCitation(){
            this.citations.push({
                user_id: 0,
                ordinance_id: 0,
                ordinance_penalty_id: 0,
                ordinance_penalties: [],
                ordinance_name: ''
            });
        },
        removeCitation(index){
            this.citations.splice(index, 1);
        },

        getOrdinances(){
            axios.get(`/get-all-ordinances`).then(res=>{
                this.ordinances = res.data
            })
        },

        getOrdinancePenalty(row, ix){
            console.log('hoi ngano ka' + row)
            let id = row.ordinance_id

            axios.get(`/get-ordinance-penalties/${id}`).then(res=>{
                this.citations[ix].ordinance_penalties = res.data
            })
        },

        loadProvinces: function(){
            axios.get('/load-provinces').then(res=>{
                this.provinces = res.data;
            })
        },
        loadCities: function(){
            axios.get('/load-cities?prov=' + this.fields.province).then(res=>{
                this.cities = res.data;
            })
        },

        loadBarangays: function(){
            axios.get('/load-barangays?prov=' + this.fields.province + '&city_code='+this.fields.city).then(res=>{
                this.barangays = res.data;
            })
        },

        submitCitation(){
            console.log(this.citations)
            this.fields.citations = this.citations

            axios.post('/submit-citation-manual', this.fields).then(res=>{
                if(res.data.status === 'saved'){
                    alert('Citation saved')
                    this.violationDialog = false;
                    this.clearFields()
                    this.modal
                }
            }).catch(err=>{
            })
        },

        canvasMouseDown(e){
            drawing = true;
            lastPos = getMousePos(canvas, e)
        },

        canvasMouseUp(e){
            drawing = false;
        },
        canvasMouseMove(e){
            mousePos = getMousePos(canvas, e);
        },

        // Add touch event support for mobile
        canvasTouchStart(){

        },

        canvasTouchMove(e){
            var touch = e.touches[0];
            var me = new MouseEvent("mousemove", {
                clientX: touch.clientX,
                clientY: touch.clientY
            });
            this.canvas.dispatchEvent(me);
        },

        canvasTouchStart(e){
            mousePos = getTouchPos(canvas, e);
            var touch = e.touches[0];
            var me = new MouseEvent("mousedown", {
                clientX: touch.clientX,
                clientY: touch.clientY
            });
            this.canvas.dispatchEvent(me);
        },

        canvasTouchEnd(e){
            var me = new MouseEvent("mouseup", {});
            this.canvas.dispatchEvent(me);
        },

        getMousePos(canvasDom, mouseEvent) {
            var rect = canvasDom.getBoundingClientRect();
            return {
                x: mouseEvent.clientX - rect.left,
                y: mouseEvent.clientY - rect.top
            }
        },

        getTouchPos(canvasDom, touchEvent) {
            var rect = canvasDom.getBoundingClientRect();
            return {
            x: touchEvent.touches[0].clientX - rect.left,
            y: touchEvent.touches[0].clientY - rect.top
            }
        },

        renderCanvas() {
            let ctx =  canvas.getContext("2d")
            if (drawing) {
                ctx.moveTo(lastPos.x, lastPos.y);
                ctx.lineTo(mousePos.x, mousePos.y);
                ctx.stroke();
                lastPos = mousePos;
            }
        },



        initData(){
            clearBtn.addEventListener("click", function(e) {
                clearCanvas();
                sigText.innerHTML = "Data URL for your signature will go here!";
                sigImage.setAttribute("src", "");
                }, false);

            submitBtn.addEventListener("click", function(e) {
                var dataUrl = canvas.toDataURL();
                sigText.innerHTML = dataUrl;
                sigImage.setAttribute("src", dataUrl);
            }, false);




            window.requestAnimFrame = (function(callback) {
            return window.requestAnimationFrame ||
            window.webkitRequestAnimationFrame ||
            window.mozRequestAnimationFrame ||
            window.oRequestAnimationFrame ||
            window.msRequestAnimaitonFrame ||
            function(callback) {
                window.setTimeout(callback, 1000 / 60);
            };
            })();

            let ctx =  canvas.getContext("2d")
            ctx.strokeStyle = "#222222";
            ctx.lineWidth = 4;

            var drawing = false;

            var mousePos = {
                x: 0,
                y: 0
            };

            var lastPos = mousePos;


            // Prevent scrolling when touching the canvas
            document.body.addEventListener("touchstart", function(e) {
                if (e.target == canvas) {
                e.preventDefault();
                }
            }, false);
            document.body.addEventListener("touchend", function(e) {
                if (e.target == canvas) {
                e.preventDefault();
                }
            }, false);
            
            document.body.addEventListener("touchmove", function(e) {
                if (e.target == canvas) {
                e.preventDefault();
                }
            }, false);

            (function drawLoop() {
                requestAnimFrame(drawLoop);
                renderCanvas();
            })();

            function clearCanvas() {
                canvas.width = canvas.width;
            }

            // Set up the UI
            var sigText = document.getElementById("sig-dataUrl");
            var sigImage = document.getElementById("sig-image");
            var clearBtn = document.getElementById("sig-clearBtn");
            var submitBtn = document.getElementById("sig-submitBtn");
            
        }


    },

    mounted(){
        this.initData()
        this.getOrdinances()
        this.loadProvinces()
    }
}
</script>


<style scoped>
    #sig-canvas {
        border: 2px dotted #CCCCCC;
        border-radius: 15px;
        cursor: crosshair;
        background: white;
    }

</style>
