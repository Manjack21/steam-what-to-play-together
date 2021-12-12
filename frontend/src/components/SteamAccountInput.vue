<template>
    <div class="w3-container">
        <label class="w3-text-blue" for="profileUrl">Add Steam Profile URL: </label>
        <input class="w3-input w3-border w3-round" type="url" name="profileUrl" @input="validateProfile">

    </div>
</template>
<script>
export default {
    name: "SteamAccountInput",
    data: function() {
        return {
            apiHost: "/"
        };
    },
    methods: {
        validateProfile: async function(ev) {
            let profileExpression = /^https:\/\/steamcommunity\.com\/profiles\/(\d{10,20})\/?/;
            let profileMatch = ev.target.value.match(profileExpression);
            if(profileMatch !== null) 
            {
                let profile = await (await fetch(this.apiHost + "api.php?action=profile&id=" + profileMatch[1])).json();
                profile = profile.response.players[0];
                let games = await (await fetch(this.apiHost + "api.php?action=ownedGames&id=" + profileMatch[1])).json();
                profile.games = games.response;
                
                this.$emit("loadedprofile", profile);
            }            
        }
    }
}
</script>