<template>

        <div class="container-fluid mt-3">
            <div class="container bg-dark wrapper" >
                    <hr>
                        <h4 class="text-center"> <B>ADD VEHICLE</B> </h4>
                    <hr>
                    <div class="container inner-body p-4">
                        <div class="row g-3 centered">

                            <div class="col-md-3">
                                <label class="form-label"> Model: </label>
                                <input type="text" class="form-control" id="driver-firstname">
                            </div>

                            <div class="col-md-3">
                                <label class="form-label">Body Type: </label>
                                <select class="form-select" name="sex" aria-label="Default select example">
                                    <option selected disabled>Select</option>
                                    <option value="1">Motocycle</option>
                                    <option value="2">Tricycle</option>
                                    <option value="3">Car</option>
                                    <option value="2">Truck</option>
                                </select>
                            </div>

                            <div class="col-md-3">
                                <label class="form-label"> Color: </label>
                                <input type="text" class="form-control" id="driver-firstname">
                            </div>

                            </div>

                            <div class="row g-3 centered">

                                <div class="col-md-3">
                                    <label class="form-label"> Plate No: </label>
                                    <input type="text" class="form-control" id="driver-firstname">
                                </div>

                                <div class="col-md-3">
                                    <label class="form-label"> Serial No: </label>
                                    <input type="text" class="form-control" id="driver-firstname">
                                </div>

                                <div class="col-md-3">
                                    <label class="form-label"> Receipt No: </label>
                                    <input type="text" class="form-control" id="driver-firstname">
                                </div>

                            </div>

                            <div class="row g-3 centered mb-3">

                                <div class="col-md-3">
                                    <label for="date" class="form-label">Expiration Date: </label>
                                    <div class="input-group date" id="expiration">
                                        <input type="text" class="form-control">
                                        <span class="input-group-append">
                                            <span class="input-group-text bg-white">
                                                <i class="fa fa-calendar icons"></i>
                                            </span>
                                        </span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label for="formFileSm" class="form-label">Vehicle Photo:</label>
                                    <input class="form-control" id="formFile" type="file" accept="image/png, image/gif, image/jpeg">
                                </div>


                                </div>
                    </div>
                    <div class="container centered">
                        <div class="save-button">
                            <v-app>
                                <v-btn color="primary" href="/homedriver">
                                    Save
                                </v-btn>
                            </v-app>
                        </div>
                    </div>
                    
                    
            </div>
        </div>

   
    
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
            $(function() {
            $('#expiration').datepicker();
            }
            )
        }
    }

</script>

<style lang="scss" scoped>
.form-control,.form-select,.input-group,label{
    font-size: 13px;
    font-family: Verdana, Geneva, Tahoma, sans-serif;
}
::v-deep .v-application--wrap {
    min-height: fit-content;
  }
.centered{
    display: flex;
    justify-content: center;
    align-items: center;
    color: blanchedalmond;
    border-radius: 10px;
}
.container-fluid{
    height: 570px;
}
.wrapper{
    width: 65%;
    color: aliceblue;
    border-radius: 10px;
    opacity: .7;
}
.inner-body{
    width: 85%;
    background-color: black;
    padding-bottom: 30px;
}

.icons{
    font-size: 25px;
  }
.save-button{
    width: 30%;
    margin: 10px;
    
}
@media only screen and (max-width: 1000px){

}
 

</style>