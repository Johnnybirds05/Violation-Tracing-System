<template>
    <div>
        <p>Ctrl + p to print</p>
        <div class="printarea">
            <qrcode :value="qrCode" :options="{ width: 200 }"></qrcode>
        </div>
    </div>
</template>

<script>
export default {
    props: ['propQr'],

    data() {
        return{
            qr: null,
        }
    },
    
    computed: {

        qrCode(){
            return this.propQr;
        }
    }

}
</script>
<style scoped>
p{
    margin: 15px;
}
    @media print {
        p {
            display: none;
        }
    }
</style>
