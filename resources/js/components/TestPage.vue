<template>

    <div>
        <qrcode :value="JSON.stringify(value)" :options="{ width: 400 }"></qrcode>

    </div>
</template>

<script>

export default {

    data(){
        return{
            value: {
                fname: 'John Michael',
                lname: 'Cagadas',
                sex: '3 times a day'
            }
        }
    }
}
</script>
