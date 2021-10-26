<template>
	<div class="Daily">
        <div class="card m-auto" style="width: 20rem;">
            <div class="alert">
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
            </div>
            <div class="card-body">
                <div class="Daily DailyVideo1 mb-3" v-bind:style="{ backgroundImage:  `url(${DailyVideo1})` }">
                    <h5 class="title"><b>Public Title</b></h5>
                    <div class="name mb-2">Product solicitation</div>
                    <button class="button gradient-button button-violet mb-2" type="button">
                        Click Here
                    </button>    
                </div>

                <div class="d-flex">
                    <img style="margin-left: 3px; margin-top: 5px;" alt="Image" :src="SoundOn" width="15" height="13"/>
                    <p style="color: #C87E2B; font-size: 15px;">&nbsp;&nbsp;Listen to the Announcement</p>
                </div>

                <div class="d-flex pb-2">
                    <div class="Daily DailyVideo2 d-flex align-items-center justify-content-center" v-bind:style="{ backgroundImage:  `url(${DailyVideo2})` }">
                        <span>Common Problem</span>
                    </div>
                    <div class="Daily DailyVideo3 d-flex align-items-center justify-content-center" v-bind:style="{ backgroundImage:  `url(${DailyVideo3})` }">
                        <span>XX Academy</span>
                    </div>
                </div>

                <div class="text-start">
                    <h5>&nbsp;<b>Today's video</b></h5>
                </div>

                <div class="d-flex pb-2">
                    <div class="Daily DailyVideo4 text-start" v-bind:style="{ backgroundImage:  `url(${DailyVideo4})` }">
                        <div class="title mb-2"><b>&nbsp;&nbsp;{{ Pending }}</b></div>
                        <div class="name mb-2">&nbsp;&nbsp;To Be Released Today</div>
                    </div>
                    <div class="Daily DailyVideo5 text-start" v-bind:style="{ backgroundImage:  `url(${DailyVideo5})` }">
                        <div class="title mb-2"><b>&nbsp;&nbsp;{{ Finished }}</b></div>
                        <div class="name mb-2">&nbsp;&nbsp;Released Today</div>
                    </div>
                </div>
                <br>
                <div class="text-start mb-3">
                    <h5>Today's Video</h5>
                    <img alt="Image" :src="DailyVideo6" width="100%" height="160"/>
                </div>

                <button v-on:click="viewTask()" type="button" class="login-button w-100 gradient-button button-orange">
                    Click to start signing in and get the Video
                </button>
                <br>
                <br>
                <br>
                <Navigation/>
            </div>
        </div>
	</div>
</template>

<script>

import Navigation from './Navigation'

export default
{
    name : 'DailyVideo',
    components: { Navigation },
    data : () =>
    {
        return {
            Cellular : require('./../assets/cellular_white.png'),
            Wifi : require('./../assets/wifi_white.png'),
            Battery : require('./../assets/battery_white.png'),
            Arrowleft : require('./../assets/arrowleft_white.png'),
            Arrowright : require('./../assets/arrowright_dark.png'),
            Settings : require('./../assets/settings_white.png'),
            DailyVideo1 : require('./../assets/dailyvideo_1.png'),
            DailyVideo2 : require('./../assets/dailyvideo_2.png'),
            DailyVideo3 : require('./../assets/dailyvideo_3.png'),
            DailyVideo4 : require('./../assets/dailyvideo_4.png'),
            DailyVideo5 : require('./../assets/dailyvideo_5.png'),
            SoundOn : require('./../assets/soundon_orange.png'),
            DailyVideo6 : require('./../assets/dailyvideo_6.png'),
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
                    this.Finished = data.reduce(function(index, key) {
                        return index + (key['status'] === 1);
                    }, 0);

                    this.Pending = data.reduce(function(index, key) {
                        return index + (key['status'] === 0);
                    }, 0);

                });
            })
            .catch(err =>
            {
                console.log('Fetch Error :-S', err);
            })
        },

        viewTask()
        {
            this.$router.push({ 'name' : 'Task', params: { account_id: this.$route.params.account_id } })
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


.Daily .alert
{
    color: white;
    background-color: #242426;
}

.list-group-item:hover
{
    background-color: #24242650;
}

.Daily
{
    margin: auto;
    background-size: 100% 100%;
    background-repeat: no-repeat;
}

.DailyVideo1 .title
{
    color: #393C8F;
    margin-right: 150px;
    padding-top: 20px;
}

.DailyVideo1 .name
{
    color: #7475D2;
    margin-right: 120px;    
}

.DailyVideo1 .button
{
    margin-right: 165px;
    height: 30px;
    width: 85px;
    font-size: 13px;
}

.DailyVideo2, .DailyVideo3
{
    width: 100%;
    color: white;
    font-size: 20px;
    margin: 5px;
    height: 70px;
}

.DailyVideo4, .DailyVideo5
{
    width: 100%;
    color: black;
    font-size: 20px;
    margin: auto;
}

.DailyVideo4 .title, .DailyVideo5 .title
{
    font-size: 17px;
    color: black;
    margin-right: 20px;
    padding-top: 20px;
}

.DailyVideo4 .name, .DailyVideo5 .name
{
    font-size: 13px;
    color: black;
    margin-right: 20px;    
}
</style>