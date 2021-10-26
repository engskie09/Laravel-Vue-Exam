<template>
	<div class="Login">
        <div class="card" style="width: 20rem;">
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
                    <img alt="Image" :src="Exit" width="13" height="13">
                </div>
            </div>
            <div class="text-center pt-2">
                <img alt="Image" :src="Logo" width="85" height="70">
            </div>
            <br>
            <div class="card-body">
                <form @submit.prevent="Login">
                    <div class="form-group">
                        <input name="username" type="text" class="form-control" placeholder="Username">
                    </div>
                    <br>
                    <div class="form-group" style="padding-bottom: 50px;">
                        <input name="password" type="password" class="form-control" placeholder="Password">
                    </div>
                    <button type="submit" class="login-button w-100 gradient-button button-orange">
                        Login
                    </button>

                    <div class="row pt-2" style="font-size: 12px;">
                        <div class="col text-start">
                            <a>&nbsp;&nbsp;&nbsp;&nbsp;Forgot Password</a>
                        </div>

                        <div class="col text-end">
                            <a>Register&nbsp;&nbsp;&nbsp;&nbsp;</a>
                        </div>
                    </div>
                    
                </form>
            </div>
        </div>
	</div>
</template>

<script>

//import router from '../router/index'

export default
{
    'name' : 'Login',
    data()
    {
        return {
            Logo : require('./../assets/logo.png'),
            Cellular : require('./../assets/cellular_dark.png'),
            Wifi : require('./../assets/wifi_dark.png'),
            Battery : require('./../assets/battery_dark.png'),
            Exit : require('./../assets/exit_dark.png')
            
        }
    },

    methods :
    {
        Login(event)
        {
            fetch(`http://localhost:8000/api/login?username=${event.target.elements.username.value}&password=${event.target.elements.password.value}`)
            .then(response =>
            {
                response.json().then(data =>
                {
                    if (data.length > 0)
                    {
                        alert('success')
                        this.$router.push({ 'name' : 'Account', params: { user_id: data[0]['id'] } })
                    }
                    
                    else
                        alert('failed')
                })
            })
            .catch(err =>
            {
                console.log('Fetch Error :-S', err);
            })
        }
    }
    
}
</script>

<style>

.Login .card
{
    margin: auto;
}

.login-button
{
    font-size: 15px;
    height: 30px;
}

.Login .alert
{

}

</style>