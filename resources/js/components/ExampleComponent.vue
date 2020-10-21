<template>
    <div>
        <form @submit.prevent = "saveOpportunity" class="user">
            <div>
                <div class="form-group">
                <input v-model="form.clientName" type="text" name="title" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Name of Customer" required>
                <input type="hidden" name="user_id" v-model="user_id">
            </div>
            <div class="form-group">
                 <input v-model="form.companyName"  type="text" name ="company" class="form-control form-control-user" id="exampleInputPassword" placeholder="Company Trading Name">
            </div>

            <div class="form-group">
                 <input v-model="form.companyRegId"  type="text" name ="company" class="form-control form-control-user" id="exampleInputPassword" placeholder="Company Reg I.D">
            </div>

            <div class="form-group">
                 <input v-model="form.vat"  type="text" name ="vat" class="form-control form-control-user" id="exampleInputPassword" placeholder="V.A.T Number" required>
            </div>

            <div class="form-group">
                 <input v-model="form.physicalAddress"  type="text" name ="physical_address" class="form-control form-control-user" id="exampleInputPassword" placeholder="Physical Address" >
            </div>

            <div class="form-group">
                 <input v-model="form.postalAddress"  type="text" name ="postal_address" class="form-control form-control-user" id="exampleInputPassword" placeholder="Postal Address" >
            </div>

            <div class="form-group">
                 <input v-model="form.billingAddress"  type="text" name ="billing_address" class="form-control form-control-user" id="exampleInputPassword" placeholder="Billing Address" >
            </div>
            
            <hr>
            </div>

            <div class="">
                <h5 class="text-center pb-2" style="font-size: 12px;">Past Credit History (Existing Customers)</h5>
                <div class="row d-flex justify-content-between">
                    <div class="col-lg-6">
                        <div>
                            <div class="form-group">
                                    <input v-model="form.servicesRequested" type="text" name="title" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Services Required">
                            </div>

                            <div class="form-group">
                                    <input v-model="form.quoteSigned" type="text" name="title" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Has Qoute Been Signed" >
                            </div>

                            <div class="form-group">
                                    <input v-model="form.quoteSigner" type="text" name="title" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Name and Surname of Signer" >
                            </div>

                            <div class="form-group">
                                    <input v-model="form.authorizedSigner" type="text" name="title" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Who has authority to sign" >
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                                <input v-model="form.customerOrderForm" type="text" name="title" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Custom Order Form">
                        </div>
                        <div class="form-group">
                                <input v-model="form.MRC" type="text" name="title" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="MRC" >
                        </div>
                        <div class="form-group">
                                <input v-model="form.creditLimit" type="text" name="title" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Proposed Credit Limit" >
                        </div>
                        <div class="form-group">
                                <input v-model="form.comments" type="text" name="title" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Comments(Credit Manager)">
                        </div>
                    </div>
                </div>
                <hr>
            </div>

            <div class="">
                <h5 class="text-center pb-2" style="font-size: 12px;">New Customer Order Information</h5>
                <div class="row d-flex justify-content-between">
                    <div class="col-lg-6">
                        <div>
                            <div class="form-group">
                                    <input v-model="form.servicesRequested2" type="text" name="title" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Services Required">
                            </div>

                            <div class="form-group">
                                    <input v-model="form.quoteSigned2" type="text" name="title" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Has Qoute Been Signed" >
                            </div>

                            <div class="form-group">
                                    <input v-model="form.quoteSigner2" type="text" name="title" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Name and Surname of Signer" >
                            </div>

                            <div class="form-group">
                                    <input v-model="form.authorizedSigner2" type="text" name="title" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Who has authority to sign" >
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                                <input v-model="form.customerOrderForm2" type="text" name="title" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Custom Order Form">
                        </div>
                        <div class="form-group">
                                <input v-model="form.MRC2" type="text" name="title" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="MRC" >
                        </div>
                        <div class="form-group">
                                <input v-model="form.creditLimit2" type="text" name="title" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Proposed Credit Limit" >
                        </div>
                        <div class="form-group">
                                <input v-model="form.cycle" type="text" name="title" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Customer Billing Cycle">
                        </div>
                    </div>
                </div>
                <hr>
            </div>

            <div class="">
                
                <div class="row d-flex justify-content-between">
                    <div class="col-lg-6">
                        <h5 class="text-center pb-2" style="font-size: 12px;"> Credit Manager </h5>
                        <div>
                            <div class="form-group">
                                    <input v-model="form.managerName" type="text" name="title" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Name Of Credit Manager">
                            </div>

                            <div class="form-group">
                                    <input v-model="form.refNo" type="text" name="title" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Credit Check Ref No:" >
                            </div>

                            <div class="form-group">
                                    <input v-model="form.vettingSuccessful" type="text" name="title" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Credit Vetting Successful?" >
                            </div>

                            <div class="form-group">
                                    <input v-model="form.depositRequired" type="text" name="title" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Deposit Required" >
                            </div>

                             <div class="form-group">
                                    <input v-model="form.comments2" type="text" name="title" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Comments" >
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <h5 class="text-center pb-2" style="font-size: 12px;"> Credit Escalations </h5>
                        <div class="form-group">
                                <input v-model="form.reason" type="text" name="title" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Reason For Escalation">
                        </div>
                        <div class="form-group">
                                <input v-model="form.approval" type="text" name="title" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Approval of CFO" >
                        </div>
                        <div class="form-group">
                                <input v-model="form.approvalMD" type="text" name="title" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Approval by MD" >
                        </div>
           
                    </div>
                </div>
                <hr>
            </div>

            <button type="submit" class="btn btn-primary btn-user btn-block">
                 Submit
            </button>

        </form>
    </div>
</template>

<script>
    export default {

        data(){
            return{
                form: new Form({
                    clientName: '',
                    companyRegId: '',
                    companyName: '',
                    vat: '',
                    physicalAddress: '',
                    postalAddress: '',
                    billingAddress: '',

                    servicesRequested: '',
                    quoteSigned: '',
                    quoteSigner: '',
                    authorizedSigner: '',
                    customerOrderForm: '',
                    MRC: '',
                    creditLimit: '',
                    comments: '',

                    servicesRequested2: '',
                    quoteSigned2: '',
                    quoteSigner2: '',
                    authorizedSigner2: '',
                    customerOrderForm2: '',
                    MRC2: '',
                    creditLimit2: '',
                    cycle: '',
                    user_id: this.$userId,

                    managerName: '',
                    refNo: '',
                    vettingSuccessful: '',
                    depositRequired: '',
                    comments2: '',
                    reason: '',
                    approval: '',
                    approvalMD: '',

                })
            }
        },

        methods:{
            saveOpportunity(){
                let data = new FormData();
                data.append('clientName', this.form.clientName)
                data.append('companyRegId', this.form.companyRegId)
                data.append('companyName', this.form.companyName)
                data.append('vat', this.form.vat)
                data.append('physicalAddress', this.form.physicalAddress)
                data.append('postalAddress', this.form.postalAddress)
                data.append('billingAddress', this.form.billingAddress)

                //

                data.append('servicesRequested', this.form.servicesRequested)
                data.append('quoteSigned', this.form.quoteSigned)
                data.append('quoteSigner', this.form.quoteSigner)
                data.append('authorizedSigner', this.form.authorizedSigner)
                data.append('customerOrderForm', this.form.customerOrderForm)
                data.append('MRC', this.form.MRC)
                data.append('creditLimit', this.form.creditLimit)
                data.append('comments', this.form.comments)
                
                //
               
                data.append('servicesRequested2', this.form.servicesRequested2)
                data.append('quoteSigned2', this.form.quoteSigned2)
                data.append('quoteSigner2', this.form.quoteSigner2)
                data.append('authorizedSigner2', this.form.authorizedSigner2)
                data.append('customerOrderForm2', this.form.customerOrderForm2)
                data.append('MRC2', this.form.MRC2)
                data.append('creditLimit2', this.form.creditLimit2)
                data.append('cycle', this.form.cycle)

                //
                
                data.append('managerName', this.form.managerName)
                data.append('refNo', this.form.refNo)
                data.append('vettingSuccessful', this.form.vettingSuccessful)
                data.append('depositRequired', this.form.depositRequired)
                data.append('comments2', this.form.comments2)
                data.append('reason', this.form.reason)
                data.append('approval', this.form.approval)
                data.append('approvalMD', this.form.approvalMD)
                


                //
                data.append('user_id', this.form.user_id)


                axios.post('/api/opportunity/add', data).then ((res)=>{
                    this.form.reset()
                    alert('Opportunity Saved Successfully')
                    window.location.href = '/opportunity/total';
                }).catch((error)=> {
                   this.form.errors.record(error.response.data.errors)
               })
            }
        },

        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
