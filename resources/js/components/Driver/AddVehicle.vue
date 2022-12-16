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
                                <input type="text" class="form-control input" id="driver-firstname">
                            </div>

                            <div class="col-md-3">
                                <label class="form-label">Body Type: </label>
                                <select class="form-select input" name="sex" aria-label="Default select example">
                                    <option selected disabled>Select</option>
                                    <option value="1">Motocycle</option>
                                    <option value="2">Tricycle</option>
                                    <option value="3">Car</option>
                                    <option value="2">Truck</option>
                                </select>
                            </div>

                            <div class="col-md-3">
                                <label class="form-label"> Color: </label>
                                <input type="text" class="form-control input" id="driver-firstname">
                            </div>

                            </div>

                            <div class="row g-3 centered">

                                <div class="col-md-3">
                                    <label class="form-label"> Plate No: </label>
                                    <input type="text" class="form-control input" id="driver-firstname">
                                </div>

                                <div class="col-md-3">
                                    <label class="form-label"> Serial No: </label>
                                    <input type="text" class="form-control" id="driver-firstname">
                                </div>

                                <div class="col-md-3">
                                    <label class="form-label"> Receipt No: </label>
                                    <input type="text" class="form-control input" id="driver-firstname">
                                </div>

                            </div>

                            <div class="row g-3 centered mb-3">

                                <div class="col-md-3">
                                    <label for="date" class="form-label">Expiration Date: </label>
                                    <div class="input-group date" id="expiration">
                                        <input type="text" class="form-control input">
                                        <span class="input-group-append">
                                            <span class="input-group-text bg-white">
                                                <i class="fa fa-calendar icons"></i>
                                            </span>
                                        </span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label for="formFileSm" class="form-label input">Vehicle Photo:</label>
                                    <input class="form-control" id="formFile" type="file" accept="image/png, image/gif, image/jpeg">
                                </div>


                                </div>
                    </div>
                    <div class="container centered">
                        <a href="/driver-dashboard" class="btn">
                            <button class="button-back btn-login">
                                    <div class="svg-wrapper-1">
                                        <div class="svg-wrapper">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                            <path fill="none" d="M0 0h24v24H0z"></path>
                                            <path fill="currentColor" d="M1.946 9.315c-.522-.174-.527-.455.01-.634l19.087-6.362c.529-.176.832.12.684.638l-5.454 19.086c-.15.529-.455.547-.679.045L12 14l6-8-8 6-8.054-2.685z"></path>
                                        </svg>
                                        </div>
                                    </div>
                                    <span>Save</span>
                                </button>
                        </a>
                            
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