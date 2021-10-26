<template>
    <div class="Navigation">
        <div class="d-flex justify-content-center">
            <img alt="Image" :src="Checkin" width="20" height="20"/>
            <img alt="Image" :src="TaskWhite" width="20" height="20"/>
            <img alt="Image" :src="OrderWhite" width="20" height="20"/>
            <img alt="Image" :src="TeamsWhite" width="20" height="20"/>
            <img alt="Image" :src="MeWhite" width="20" height="20"/>
        </div>
    </div>
</template>

<script>
export default
{
    'name' : 'Login',
    data()
    {
        return {
            Checkin : require('./../assets/checkin.png'),
            CheckinWhite : require('./../assets/checkin_white.png'),
            TaskWhite : require('./../assets/task_white.png'),
            OrderWhite : require('./../assets/order_white.png'),
            TeamsWhite : require('./../assets/teams_white.png'),
            MeWhite : require('./../assets/me_white.png')
        }
    }
    
}
</script>

<style>
    
.Navigation img
{
    margin: 20px;
}

</style>