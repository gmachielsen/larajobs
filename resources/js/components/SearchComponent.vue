<template>
    <div>
        <input style="width: 90%; text-align:center; display: flex; margin: auto;" type="text" v-model="keyword" placeholder="Search jobs..." v-on:keyup="Searchjobs()" class="from-control">
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        methods:{
            Searchjobs(){

            }
        }
    }
</script>
