import './bootstrap'

import AlertComponent from './components/partials/Alert.vue'
import DashboardComponent from './components/Dashboard.vue'

Vue.component('dashboard-component', DashboardComponent)
Vue.component('alert-component', AlertComponent)

// Register Vue app
const app = new Vue({
    el: '#app',

    data: {
        displayNavigation: false
    },

    methods: {
        logout() {
            this.$refs.logoutForm.submit()
        },

        switchVisibility(target) {
            var pf = document.getElementById(target);
            if (pf.getAttribute('type') === 'password') {
                pf.setAttribute('type', 'text');
            } else {
                pf.setAttribute('type', 'password');
            }
        }
    }
})

// PWA Service Worker
if ('serviceWorker' in navigator) {
    window.addEventListener('load', function() {
        navigator.serviceWorker.register('/sw.js').then(function(registration) {
            console.log('ServiceWorker registration successful with scope: ', registration.scope);
        }).catch(function(err) {
            console.log('ServiceWorker registration failed: ', err);
        });
    });
}