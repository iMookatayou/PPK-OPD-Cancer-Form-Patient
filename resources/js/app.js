import './bootstrap'
import { createApp } from 'vue'
import router from './router'
import { RouterView } from 'vue-router'
import { MotionPlugin } from '@vueuse/motion'
import axios from 'axios'
import './assets/css/fonts/fonts.css'

// กำหนดค่า axios
axios.defaults.withCredentials = true
axios.defaults.baseURL = 'http://localhost:8000'  // เปลี่ยนเป็น IP backend ของคุณ

const app = createApp({})

// ลงทะเบียน component router-view เพื่อใช้ใน template
app.component('router-view', RouterView)

// ใช้ plugin อื่นๆ ที่ต้องการ
app.use(MotionPlugin)

// ใช้ router ของ Vue Router
app.use(router)

// ติดตั้งแอป Vue ลงใน element ที่มี id="app"
app.mount('#app')
