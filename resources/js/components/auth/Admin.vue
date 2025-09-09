<template>
  <div class="admin-container" v-if="isAdmin">
    <h1>🔧 Admin Panel</h1>
    <p>Only users with admin role can access this page.</p>

  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import { useRouter } from 'vue-router'
import axios from 'axios'
import '@/assets/css/form/admin.css' 

const router = useRouter()
const isAdmin = ref(false)

onMounted(async () => {
  try {
    const res = await axios.get('/api/user', { withCredentials: true })
    if (res.data.role === 'admin') {
      isAdmin.value = true
    } else {
      await router.push('/CancerFormPage')
    }
  } catch (err) {
    console.error('Access denied or not logged in', err)
    await router.push('/login')
  }
})
</script>
