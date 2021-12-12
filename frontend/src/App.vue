<template>
  <div class="w3-row-padding">
    <nav class="w3-quarter">
      &nbsp;
    </nav>
    <main class="w3-half">
      <steam-account-input @loadedprofile="addProfile"></steam-account-input>
      <div>&nbsp;</div>      
      <steam-account-list :profiles="steamProfiles"></steam-account-list>
      <div>&nbsp;</div>      
      <shared-games :profiles="steamProfiles"></shared-games>
    </main>
    <nav class="w3-quarter">
      &nbsp;
    </nav>    
  </div>
</template>

<script>
import SharedGames from './components/SharedGames.vue';
import SteamAccountInput from './components/SteamAccountInput.vue'
import SteamAccountList from './components/SteamAccountList.vue';

export default {
  name: 'App',
  data: function() {
    return {
      steamProfiles: Object(),
    }
  },
  components: {
    SharedGames,
    SteamAccountInput,
    SteamAccountList
  },
  methods: {
    addProfile: function(ev) {
        this.steamProfiles[ev.steamid] = ev;
        console.log(this.steamProfiles);
    }
  }
}
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
