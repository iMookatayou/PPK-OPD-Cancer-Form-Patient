<template>
  <div class="login-page">

    <video class="bg-video" autoplay muted playsinline>
      <source src="/storage/app/public/videos/videos01.mp4" type="video/mp4" />
      Your browser does not support the video tag.
    </video>
    
    <!-- โลโก้หมุนด้านซ้าย -->
    <div class="login-left">
      <motion-div
        class="logo-spin"
        :initial="{ rotate: 0 }"
        :animate="{ rotate: 360 }"
        transition="repeat: Infinity; duration: 6; easing: 'linear'">
        <KeyRound size="140" />
      </motion-div>
    </div>

    <!-- ฟอร์มเปลี่ยนรหัสผ่าน -->
    <div class="login-right">
      <h1>Change Password</h1>
      <p class="subtitle">Update your account password</p>

      <form @submit.prevent="handleChange">
        <label for="email">Email</label>
        <div class="input-wrapper">
          <Mail class="input-icon" />
          <input v-model="email" type="email" id="email" placeholder="Enter your email" required />
        </div>

        <label for="current">Current Password</label>
        <div class="input-wrapper">
          <Lock class="input-icon" />
          <input v-model="current" type="password" id="current" placeholder="Enter current password" required />
        </div>

        <label for="newpass">New Password</label>
        <div class="input-wrapper">
          <Lock class="input-icon" />
          <input v-model="newpass" type="password" id="newpass" placeholder="Enter new password" required />
        </div>

        <button class="btn primary" type="submit">Change Password</button>

        <p class="signup">
          <router-link to="/login">← Back to Login</router-link>
        </p>

        <p v-if="message" class="info">{{ message }}</p>
        <p v-if="error" class="error">{{ error }}</p>
      </form>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue'
import axios from 'axios'
import { Mail, Lock, KeyRound } from 'lucide-vue-next'

const email = ref('')
const current = ref('')
const newpass = ref('')
const error = ref('')
const message = ref('')

const handleChange = async () => {
  error.value = ''
  message.value = ''
  try {
    await axios.post('/api/change-password', {
      email: email.value,
      current_password: current.value,
      new_password: newpass.value
    }, { withCredentials: true })

    message.value = '✅ Password changed successfully'
    current.value = ''
    newpass.value = ''
  } catch (err) {
    error.value = err?.response?.data?.message || '❌ Failed to change password'
  }
}
</script>

<style src="@/assets/css/loginform/login.css"></style>
