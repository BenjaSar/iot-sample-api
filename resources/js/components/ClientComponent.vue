<template>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Clients List</div>
                
                <div class="card-body">

                <table class="table">

                    <tr>
                        <th width="30%">Name</th>
                        <th width="30%">Email</th>
                        <th width="20%">Cellphone</th>
                        <th width="5%">Action</th>
                    </tr>

                    <tr v-for="client in clients" :key="client.id">
                        <td>{{ client.name }}</td>
                        <td>{{ client.email }}</td>
                        <td>{{ client.cellphone }}</td>
                        <td></span><span class="glyphicon glyphicon-trash"></span></td>
                    </tr>
                </table>

                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
    export default {

        data() {
            return {
              clients: [],
            }
        },
        methods: {
            getclient(){
                axios.get('api/client')
                     .then((response)=>{
                       this.clients = response.data.data,
                       console.log(response.data.data);
                     })
            }
        },
        created() {
            this.getclient()
        }
    }
</script> 

<style>

</style>