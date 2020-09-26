require('./bootstrap');

import Vue from 'vue'
import VueMqtt from 'vue-mqtt'
import MqttExample from './components/MqttExample.vue';
import ClientComponent from './components/ClientComponent.vue';

Vue.use(VueMqtt, 'ws://localhost:9001', {clientId: 'WebClient-' + parseInt(Math.random() * 100000)})
Vue.config.productionTip = false
Vue.config.productionTip = false
Vue.component('mqtt-example',  MqttExample);
Vue.component('client-component',  ClientComponent);

const app = new Vue({
    el: '#app'
});

