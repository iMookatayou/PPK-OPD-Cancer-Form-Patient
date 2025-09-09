<template>
  <header :class="$style.topbar">
    <div :class="$style.topbarInner">
      <!-- โลโก้ -->
      <div :class="$style.topbarLeft">
        <img :class="$style.logoImg" src="/storage/app/public/images/LogoPPK.png" alt="logo" />
        <div :class="$style.logoText">
          <strong>PHRAPOKKLAO HOSPITAL</strong>
          <span>โรงพยาบาลพระปกเกล้าจันทบุรี</span>
        </div>
      </div>

      <!-- เมนู -->
      <nav :class="$style.topbarCenter">
        <div v-for="item in menu" :key="item.name" :class="$style.menuItem">
          <router-link :to="item.link" active-class="active">{{ item.name }}</router-link>
          <div v-if="item.sub" :class="$style.dropdown">
            <router-link
              v-for="sub in item.sub"
              :key="sub.name"
              :to="sub.link"
              active-class="active"
            >
              {{ sub.name }}
            </router-link>
          </div>
        </div>
      </nav>

      <!-- Logout -->
      <div :class="$style.topbarRight">
        <LogoutButton />
      </div>
    </div>
  </header>
</template>

<script setup>
import LogoutButton from '@/components/button/LogoutButton.vue'

const menu = [
  { name: 'ลงทะเบียน', link: '/cancer-form' },
  { name: 'รายชื่อ', link: '/patient-list' },
  {
    name: 'อ้างอิง',
    link: '#',
    sub: [
      { name: 'ICD10', link: '/master/icd10' },
      { name: 'Topology', link: '/master/topology' },
      { name: 'Stage', link: '/master/stage' },
    ],
  },
  { name: 'ผู้ดูแล', link: '/admin' },
  { name: 'ค้นหา', link: '/search' },
  { name: 'รายงาน', link: '/report' },
]
</script>

<style module src="@/assets/css/mainform/HeaderBar.module.css" />
