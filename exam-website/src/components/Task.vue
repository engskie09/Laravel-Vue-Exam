<template>
	<div class="Task">
        <div class="card m-auto" style="width: 20rem;">
            <div class="alert" v-bind:style="{ backgroundImage:  `url(${HeaderBlack})` }" style="background-color: #F2F2F2;">
                <div class="d-flex w-100">
                    <div class="text-start w-100" style="margin-left: 7px;">
                        <b style="font-size: 10px;">09:15</b>
                    </div>
                    <div class="text-end w-100">
                        <img alt="Image" :src="Cellular" width="18" height="12"/>
                        <span style="padding-left: 3px; padding-right: 3px"/>
                        <img alt="Image" :src="Wifi" width="17" height="12"/>
                        <span style="padding-left: 3px; padding-right: 3px"/>
                        <img alt="Image" :src="Battery" width="18" height="8"/>
                    </div>
                </div>
                <div class="d-flex pt-3">
                    <div class="text-start w-100">Account A</div>
                    <div>
                        <img alt="Image" :src="Settings" width="72" height="27"/>
                    </div>
                </div>
                <br>
                <br>
                <div style="background-color: white; color: black; border-radius: 15px;">
                    <div class="d-flex justify-content-center pt-3">
                        <div style="margin: 5px;">
                            <b>{{ Finished }}</b>
                            <p>Released</p>
                        </div>

                        <div style="margin: 5px;">
                            <b>{{ Pending }}</b>
                            <p>Pending</p>
                        </div>

                        <div style="margin: 5px;">
                            <b>{{ Finished }}</b>
                            <p>Released</p>
                        </div>

                        <div style="margin: 5px;">
                            <b>{{ Pending }}</b>
                            <p>Pending</p>
                        </div>

                    </div>
                </div>
            </div>
            <div class="card-body" style="background-color: #F2F2F2; color: black;">
                <div v-for="Task in Tasks" :key="Task.id">
                    <div style="background-color: white; border-radius: 10px;">
                        <div class="d-flex w-100 pt-2">
                            <div class="text-start w-100" style="padding-left: 10px;    ">
                                <img alt="Image" :src="BarOrange" width="5" height="14" style="margin-bottom: 5px;"/>
                                <span>&nbsp;Task No.{{ Task.id }}</span>
                            </div>
                            <div class="text-end w-100" style="margin-right: 15px;">
                                <span class="text-end" style="color: #FF9B00;">
                                    {{ Task.status === 0 ? 'In Progress' : 'Finished' }}
                                </span>
                            </div>
                        </div>
                        <hr style="margin-left: 10px; margin-right: 10px;">
                        <div class="d-flex w-100 m-auto">
                            <div class="text-start" style="padding-left: 10px; margin-top: 10px;">
                                <img alt="Image" :src="Coin" width="30" height="30" style="margin-bottom: px;"/>
                            </div>
                            <div class="text-start w-100" style="padding-left: 5px;">
                                <span>{{ Task.points }} Coins</span>
                                <br>
                                <span><span style="color: #FF9B00;">{{ Math.floor(Math.random() * 30) }}</span> days to go</span>
                            </div>
                            <div class="text-end w-100" style="margin-right: 15px; margin-top: 10px;">
                                <button type="button" class="login-button gradient-button button-orange" style="width: 50px;">
                                    Done
                                </button>
                            </div>
                            <br>
                            <br>
                            <br>
                        </div>
                    </div>
                    <br>
                </div>
            </div>
        </div>
	</div>
</template>

<script>

export default
{
    name : 'Task',
    data : () =>
    {
        return {
            Cellular : require('./../assets/cellular_white.png'),
            Wifi : require('./../assets/wifi_white.png'),
            Battery : require('./../assets/battery_white.png'),
            Settings : require('./../assets/settings_white.png'),
            HeaderBlack : require('./../assets/header_black.png'),
            BarOrange : require('./../assets/bar_orange.png'),
            Coin : require('./../assets/coin.png'),
            Tasks : 0,
            Finished : 0,
            Pending : 0
        }
    },

    methods :
    {
        getTasks()
        {
            fetch(`http://localhost:8000/api/tasks?account_id=${this.$route.params.account_id}`)
            .then(response =>
            {
                response.json().then(data =>
                {
                    this.Tasks = data

                    this.Finished = data.reduce(function(index, key) {
                        return index + (key['status'] === 1);
                    }, 0);

                    this.Pending = data.reduce(function(index, key) {
                        return index + (key['status'] === 0);
                    }, 0);

                    console.log(this.Tasks)
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

        if (this.$route.params.account_id === undefined)
        {
            alert('Plase Login again')
            this.$router.push('/')
            return
        }

        this.getTasks()
    }
    
}

</script>

<style>

.Task
{
    color: white;
    background-color: #F8F8F8;
}

.Task .card
{
    background-color: #F8F8F8;
}

.Task .alert
{
    margin: auto;
    background-size: 100% 100%;
    background-repeat: no-repeat;
    background-color: white;
    width: 100%;
}

</style>