<template>
  <div class="login-page">

    <video class="bg-video" autoplay muted playsinline>
      <source src="/storage/app/public/videos/videos01.mp4" type="video/mp4" />
      Your browser does not support the video tag.
    </video>
    
    <!-- โลโก้ซ้าย -->
    <div class="login-left">
      <motion-div
        class="logo-spin"
        :initial="{ rotate: 0 }"
        :animate="{ rotate: 360 }"
        transition="repeat: Infinity; duration: 6; easing: 'linear'"
      >
        <UserPlus size="140" />
      </motion-div>
    </div>

    <!-- ฟอร์มลงทะเบียน -->
    <div class="login-right">
      <h1>Create Account</h1>
      <p class="subtitle">Fill in your details to register</p>

      <form @submit.prevent="handleRegister">
        <label for="name">Name</label>
        <div class="input-wrapper">
          <User class="input-icon" />
          <input v-model="name" type="text" id="name" placeholder="Enter your name" required />
        </div>

        <label for="email">Email</label>
        <div class="input-wrapper">
          <Mail class="input-icon" />
          <input v-model="email" type="email" id="email" placeholder="Enter your email" required />
        </div>

        <label for="password">Password</label>
        <div class="input-wrapper">
          <Lock class="input-icon" />
          <input v-model="password" type="password" id="password" placeholder="Create a password" required />
        </div>

        <button class="btn primary" type="submit">Register</button>

        <p class="signup">
          Already have an account? <router-link to="/login">Back to Login</router-link>
        </p>

        <p v-if="error" class="error">{{ error }}</p>
      </form>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue'
import { useRouter } from 'vue-router'
import axios from 'axios'
import { User, Mail, Lock, UserPlus } from 'lucide-vue-next'

const name = ref('')
const email = ref('')
const password = ref('')
const error = ref('')
const router = useRouter()

const handleRegister = async () => {
  try {
    await axios.get('/sanctum/csrf-cookie')
    await axios.post('/api/register', {
      name: name.value,
      email: email.value,
      password: password.value,
    }, { withCredentials: true })
    await router.push('/CancerFormPage')
  } catch (err) {
    error.value = '❌ Register failed'
    console.error(err)
  }
}
</script>

<style src="@/assets/css/loginform/login.css"></style>
