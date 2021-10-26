<template>
	<div class="Account">
        <div class="card m-auto" style="width: 20rem;">
            <div class="alert">
                <div class="d-flex w-100">
                    <div class="text-start w-100" style="margin-left: 7px;">
                        <b style="font-size: 10px;">09:15</b>
                    </div>
                    <div class="text-end w-100">
                        <img alt="Image" :src="Cellular" width="18" height="12">
                        <span style="padding-left: 3px; padding-right: 3px"/>
                        <img alt="Image" :src="Wifi" width="17" height="12">
                        <span style="padding-left: 3px; padding-right: 3px"/>
                        <img alt="Image" :src="Battery" width="18" height="8">
                    </div>
                </div>
                <div class="text-start" style="padding-top: 7px;">
                    <img alt="Image" :src="Arrowleft" width="8" height="16">
                </div>
                <div class="d-flex">
                    <div class="text-center w-100" style="margin-left: 60px">My Earnings</div>
                    <div>
                        <img alt="Image" :src="Settings" width="72" height="27">
                    </div>
                </div>                
            </div>
            <div class="card-body">
            <ul v-for="Account in Accounts" :key="Account.name" class="list-group text-start">
                <li class="list-group-item d-flex">
                    <div class="text-start w-100">
                        <b>{{ Account.name }}</b>
                        <br>
                        <span v-on:click="selectAccount(Account.id)" style="font-weight: 100;">Use this account</span>
                    </div>
                    <div class="text-end w-100 pt-2" data-bs-toggle="modal" data-bs-target="#modal">
                        <img alt="Image" :src="Arrowright" width="8" height="14">
                    </div>
                </li>
            </ul>
            <br><br><br><br><br>
            <button type="button" class="login-button w-100 gradient-button button-orange" data-bs-toggle="modal" data-bs-target="#modal">
                Add Account
            </button>
            </div>
        </div>

        <div class="modal fade" id="modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="">Edit/Delete</div>
                        <br>
                        <form>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Change Account Name">
                            </div>
                            <br><br>    
                            <button type="button" class="login-button w-100 gradient-button button-orange">
                                Add/Edit
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <img data-bs-dismiss="modal" alt="Image" :src="ExitCircle" width="35" height="35">
        </div>
	</div>
</template>

<script>

//import router from '../router/index'

export default
{
    name : 'Account',
    data : () =>
    {
        return {
            Cellular : require('./../assets/cellular_white.png'),
            Wifi : require('./../assets/wifi_white.png'),
            Battery : require('./../assets/battery_white.png'),
            Arrowleft : require('./../assets/arrowleft_white.png'),
            Arrowright : require('./../assets/arrowright_dark.png'),
            Settings : require('./../assets/settings_white.png'),
            ExitCircle : require('./../assets/exitcircle_white.png'),
            Accounts : []
        }
    },

    methods :
    {
        selectAccount(id)
        {
            alert(id)
            this.$router.push({ 'name' : 'Daily', params: { account_id: id } })
        },

        getAccounts()
        {
            fetch(`http://localhost:8000/api/accounts?user_id=${this.$route.params.user_id}`)
            .then(response =>
            {
                response.json().then(data =>
                {
                    this.Accounts = data
                    console.log(data)
                });
            })
            .catch(err =>
            {
                console.log('Fetch Error :-S', err);
            })
        }
    },

    beforeMount()
    {
        console.log(this.$route.params)

        if (this.$route.params.user_id === undefined)
        {
            alert('Plase Login again')
            this.$router.push('/')
            return
        }
        this.getAccounts()
    }
}

</script>

<style>


.Account .alert
{
    color: white;
    background-color: #242426;
}

.list-group-item:hover
{
    background-color: #24242650;
}

</style>