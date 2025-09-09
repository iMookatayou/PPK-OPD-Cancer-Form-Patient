<template>
  <button @click="logout" class="button-logout">Logout</button>
</template>

<script setup>
import axios from 'axios'
import { useRouter } from 'vue-router'
import '@/assets/css/buttoncss/logoutbutton.css'

const router = useRouter()

const logout = async () => {
  try {
    await axios.post('/api/logout', {}, { withCredentials: true })
    document.cookie = 'XSRF-TOKEN=;expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;'
    document.cookie = 'backend_api_session=;expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;'
    await router.push('/login')
  } catch (err) {
    console.error('Logout failed:', err)
  }
}
</script>
