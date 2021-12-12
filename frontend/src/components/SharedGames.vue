<template>
    <div class="w3-container">
        <span>Shared Games</span>
        <div class="w3-row-padding">
            <div class="w3-third w3-margin-bottom" v-for="game in sharedGames" :key="game.game.appid">
                <div class="w3-card w3-display-container" style="min-height:140px;">
                    <img :src="gameImage(game.game)" style="width:100%; max-height:90px;">
                    <div class="w3-container w3-cell-bottom">
                        {{game.game.name}}
                    </div>                    
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name: "SharedGames",    
    props: {
        profiles: {}
    },
    methods: {
        gameImage: function(game) {
            return `http://media.steampowered.com/steamcommunity/public/images/apps/${game.appid}/${game.img_logo_url}.jpg`
        }
    },
    computed: {
        ownedGames: function() {            
            let profiles = this.profiles;
            return Object
                .values(profiles)
                .reduce((total, current) => {
                    current.games.games.forEach(g => 
                    {
                        if(total[g.appid]  === undefined)
                            total[g.appid] = { game: g, profiles: []};
                        
                        total[g.appid].profiles.push(current.steamid);
                    });
                
                    return total;
                }, 
            {});
        },
        sharedGames: function() {
            let profileCount = Object.keys(this.profiles).length;
            return Object
                .values(this.ownedGames)
                .filter(g => g.profiles.length === profileCount);
        }
    }
}
</script>
// https://steamcommunity.com/profiles/76561197983277301/