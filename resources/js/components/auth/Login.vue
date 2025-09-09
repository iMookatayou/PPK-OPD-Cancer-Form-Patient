<template>
  <div class="login-page">
    <video class="bg-gif" autoplay muted loop playsinline>
      <source src="/storage/app/public/videos/videos01.mp4" type="video/mp4" />
      Your browser does not support the video tag.
    </video>

    <div class="logo-absolute">
      <img class="logo-spin" src="/storage/app/public/images/LogoPPK.png" alt="Logo" />
    </div>

    <div class="login-right">
      <h1>Welcome back</h1>
      <p class="subtitle">Sign in to access the system</p>

      <form @submit.prevent="handleLogin">
        <p v-if="errorMessage" class="error-msg">{{ errorMessage }}</p>

        <label for="email">Email</label>
        <div class="input-wrapper">
          <Mail class="input-icon" />
          <input v-model="email" type="email" id="email" placeholder="Enter your email" required />
        </div>

        <label for="password">Password</label>
        <div class="input-wrapper">
          <Lock class="input-icon" />
          <input v-model="password" type="password" id="password" placeholder="Enter your password" required />
        </div>

        <div class="options">
          <label><input type="checkbox" /> Remember me</label>
          <router-link to="/change-password">Forgot password?</router-link>
        </div>

        <button class="btn primary" type="submit" :disabled="loading">
          <span v-if="!loading">Sign in</span>
          <span v-else>Signing in...</span>
        </button>

        <p class="signup">
          Don't have an account? <router-link to="/register">Sign up</router-link>
        </p>
      </form>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue'
import { useRouter } from 'vue-router'
import axios from 'axios'
import { Mail, Lock } from 'lucide-vue-next'

const email = ref('')
const password = ref('')
const loading = ref(false)
const errorMessage = ref('')
const router = useRouter()

const handleLogin = async () => {
  loading.value = true
  errorMessage.value = ''
  try {
    // ดึง CSRF cookie จาก Laravel Sanctum
    await axios.get('/sanctum/csrf-cookie')

    // ส่งข้อมูล login พร้อมคุกกี้ (axios.defaults.withCredentials = true อยู่แล้ว)
    await axios.post('/api/login', {
      email: email.value,
      password: password.value,
    })

    // ถ้าสำเร็จไปหน้า dashboard
    router.push('/landingdashboard')
  } catch (err) {
    errorMessage.value = 'อีเมลหรือรหัสผ่านไม่ถูกต้อง'
  } finally {
    loading.value = false
  }
}
</script>

<style src="@/assets/css/loginform/login.css"></style>
