<template>
	<div class="container">
        <router-view></router-view>
	</div>
</template>

<script>

export default
{
    name : 'Main',
    components : {}
}

</script>

<style>

.container
{
    margin: auto;
}

.gradient-button
{
    transition: 0.5s;
    background-size: 200% auto;
    color: #FFF;
    height: 35px;
    border: none;
    border-radius: 47px;
}
.gradient-button:hover
{
    box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);
    margin-top: -10px;
    margin-bottom: 10px;
}

.button-orange
{
    background-image: linear-gradient(to right, #FD8D02 0%, #fd8c02c4 51%, #FE7500 100%)
}

.button-violet
{
    background-image: linear-gradient(to right, #6732CF 0%, #7070EA 51%, #9c9cf5 100%)
}

.Login .form-control:focus,
.Account .form-control:focus
{
    background-color: #fff;
    border-color: #ffb760;
    outline: 0;
    box-shadow: 0 0 0 0.25rem #f5cd9d;
}
</style>
