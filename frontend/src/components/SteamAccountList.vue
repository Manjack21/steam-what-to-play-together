<template>
    <div class="w3-container">
        <span>Steam Accounts</span>
        <ul class="w3-ul w3-border">
            <li class="w3-bar" v-for="p in profiles" :key="p.steamid">
                <img class="w3-bar-item w3-circle" style="width:70px;" :src="p.avatarmedium">
                <div class="w3-bar-item">
                    <strong>{{p.personaname}}</strong><br>
                </div>
            </li>
        </ul>
    </div>
</template>
<script>
export default {
    name: "SteamAccountInput",
    props: {
        profiles: {}
    },
    methods: {
    }
}
</script>
// https://steamcommunity.com/profiles/76561197983277301/