<template>
	<div id="app">
		<Main/>
	</div>
</template>

<script>
import Main from './components/Main.vue'

export default{
	name: 'App',
	components:
	{
		Main
	}
}
</script>

<style>

@import url('~bootstrap/dist/css/bootstrap.css');
@import url(//db.onlinewebfonts.com/c/05e476e067ffef74ca5686f229c40a63?family=PingFang+SC);

body
{
    background-color: #F2F2F2;
}

#app
{
	font-family: PingFangSC;
	-webkit-font-smoothing: antialiased;
	-moz-osx-font-smoothing: grayscale;
	text-align: center;
	margin-top: 60px;
    margin-bottom: 60px;
}


</style>
