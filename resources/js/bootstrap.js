// resources/js/bootstrap.js
import axios from 'axios'
window.axios = axios

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'
axios.defaults.baseURL = 'http://localhost:8000'
axios.defaults.withCredentials = true
