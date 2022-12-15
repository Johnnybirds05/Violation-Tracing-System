<template>
        <div class="container-fluid max-content">
            <div class="container tourism-body mt-3">
                <v-app>
                    <v-card >
                        <v-navigation-drawer
                        v-model="drawer"
                        temporary
                        class="navs"
                        >
                        <v-list-item>
                            <v-list-item-avatar>
                            <v-img src="https://randomuser.me/api/portraits/men/78.jpg"></v-img>
                            </v-list-item-avatar>

                            <v-list-item-content>
                            <v-list-item-title>John Leider</v-list-item-title>
                            </v-list-item-content>
                        </v-list-item>

                        <v-divider></v-divider>

                        <v-list dense>
                            <v-list-item
                            v-for="item in items"
                            :key="item.title"
                            link
                            >
                            <v-list-item-icon>
                                <v-icon>{{ item.icon }}</v-icon>
                            </v-list-item-icon>

                            <v-list-item-content>
                                <v-list-item-title>{{ item.title }}</v-list-item-title>
                            </v-list-item-content>
                            </v-list-item>
                        </v-list>
                        </v-navigation-drawer>
                        <v-toolbar
                        color="grey darken-3"
                        dark
                        flat
                        >
                        <v-app-bar-nav-icon @click.stop="drawer = !drawer"></v-app-bar-nav-icon>
                        
                        

                        <v-toolbar-title>CTO Dashboard</v-toolbar-title>

                        <v-spacer></v-spacer>


                        <template v-slot:extension>
                            <v-tabs
                            v-model="tab"
                            align-with-title
                            >
                            <v-tabs-slider color="yellow"></v-tabs-slider>

                            <v-tab>
                                Drivers
                            </v-tab>
                            <v-tab>
                                Driving Requirement
                            </v-tab>
                            <v-tab>
                                Accounts
                            </v-tab>
                            </v-tabs>
                        </template>
                        </v-toolbar>

                        <v-tabs-items v-model="tab">
                        <v-tab-item>
                            <v-card flat>
                            <v-card-text >
                                hello  <br><br><br><br><br><br></br>
                            </v-card-text>
                            </v-card>
                        </v-tab-item>

                        <v-tab-item>
                            <v-card flat>
                            <v-card-text>
                                hi
 
          
    

                            </v-card-text>
                            </v-card>
                        </v-tab-item>

                        <v-tab-item>
                            <v-card flat>
                            <v-card-text>
                                bro
                            </v-card-text>
                            </v-card>
                        </v-tab-item>
                        </v-tabs-items>
                    </v-card>
                </v-app>

            </div>
        </div>
   
    
</template>

<script>

    export default {
    data () {
      return {
        tab: null,
        drawer: null,
      }
    }
    }
  
</script>

<style lang="scss" scoped>

::v-deep .v-application--wrap {
    min-height: fit-content;
  }
  .tourism-body{
    width: 95%;
    font-family: monospace;
    color: white;
    font-size: 15px;
    opacity: .8;
    border-radius: 10px;
}
.max-content{
    height: 600px;
}
.navs{
    position: absolute;
    height: 200px;
}
</style>
