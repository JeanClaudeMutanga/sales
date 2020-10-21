<template>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">My Opportunities</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Client Name</th>
                        <th>Company Reg I.D</th>
                        <th>Company Name</th>
                        <th>Physical Address</th>
                        <th>Postal Address</th>
                        <th>Billing Address</th>
                        <th>Options</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Client Name</th>
                        <th>Company Name</th>
                        <th>Company Reg I.D</th>
                        <th>Physical Address</th>
                        <th>Postal Address</th>
                        <th>Billing Address</th>
                        <th>Options</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    <tr v-for="opportunity in opportunities" v-bind:key="opportunity.id">
                        <td>{{opportunity.clientName}}</td>
                        <td>{{opportunity.companyRegId}}</td>
                        <td>{{opportunity.companyName}}</td>
                        <td>{{opportunity.physicalAddress}}</td>
                        <td>{{opportunity.postalAddress}}</td>
                        <td>{{opportunity.billingAddress}}</td>
                        <td><button @click="openOpportunity(opportunity.id)" data-toggle="modal" data-target=".bd-example-modal-lg" class="btn btn-success btn-sm">Open</button></td>
                    </tr>
                    </tbody>
                </table>
                </div>
            </div>

            
        <!---Modal--->
           <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content card w-100">

                        <div class="row d-flex justify-content-between">
                            <div class="card col-lg-6">
                                <h5 class="text-center">Opportunity Details</h5>
                                <div class="card-header">Client Details</div>
                                <div class="card-body">
                                    <p><strong>Client Name </strong>: {{items.clientName}}</p>
                                        <hr>
                                    <p><strong>Company Trading Name</strong>: {{items.companyName}}</p>
                                        <hr>
                                    <p><strong>Company Reg ID</strong> :{{items.companyRegId}}</p>
                                        <hr>
                                    <p><strong>V.A.T Number</strong> : {{items.vat}}</p>
                                        <hr>
                                    <p><strong>Physical Address</strong> : {{items.physicalAddress}}</p>
                                        <hr>
                                    <p><strong>Postal Address </strong>: {{items.postalAddress}}</p>
                                        <hr>
                                    <p><strong>Billing Address </strong>: {{items.billingAddress}}</p>
                                        <hr>
                                </div>
                            </div>
                
                            <div class="card col-lg-6" style="padding-top:29px;">
                                <div class="card-header">Past History</div>
                                <div class="card-body">
                                    <p>Company Name : {{items.companyName}}</p>
                                </div>
                            </div>
                        </div>

                        <div class="row d-flex justify-content-between">
                            <div class="card col-lg-6">
                                <div class="card-header">Past Credit History</div>
                                <div class="card-body">
                                    <p><strong>Types of Services Requested </strong>: {{items.clientName}}</p>
                                        <hr>
                                    <p><strong>Has Quote Been Signed</strong>: {{items.companyName}}</p>
                                        <hr>
                                    <p><strong>Name of Signer</strong> :{{items.companyRegId}}</p>
                                        <hr>
                                    <p><strong>V.A.T Number</strong> : {{items.vat}}</p>
                                        <hr>
                                    <p><strong>Physical Address</strong> : {{items.physicalAddress}}</p>
                                        <hr>
                                    <p><strong>Postal Address </strong>: {{items.postalAddress}}</p>
                                        <hr>
                                    <p><strong>Billing Address </strong>: {{items.billingAddress}}</p>
                                        <hr>
                                </div>
                            </div>
                
                            <div class="card col-lg-6">
                                <div class="card-header">Payment Profile</div>
                                <div class="card-body">
                                    <p>Company Name : {{items.companyName}}</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>    
        <!---Modal--->
        </div>

</template>

<script>
    export default {

        data(){
            return{
                opportunities: '',
                opportunity:'',
                items: '',
                user_id: this.$userId,
            }
        },

        methods:{
            getOpportunities(user_id){
                axios.get(`/api/opportunity/all/${this.user_id}`).then((res)=>{
                    this.opportunities = res.data
                }).catch((error)=>{
                    console.log(error)
                })
            },
            openOpportunity(key)
            {
                axios.get(`/api/opportunity/${key}`).then((res)=>{
                    this.items = res.data  
                }).catch((error)=>{
                    console.log(error)
                }) 
            }
            

        },

        mounted() {
           this.getOpportunities()
        }
    }
</script>
