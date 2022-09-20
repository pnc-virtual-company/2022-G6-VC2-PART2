import axios from "axios";
import VueCookies from 'vue-cookies'

export default axios.create({
  baseURL: process.env.VUE_APP_API_URL,
  
  headers: {
    Authorization: 'Bearer ' + VueCookies.get('token'),
    "Content-type": "application/json",
    'Access-Control-Allow-Origin': '*'
  }
});