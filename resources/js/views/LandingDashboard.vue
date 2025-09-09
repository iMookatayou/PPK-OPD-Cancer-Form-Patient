<template>
  <div :class="styles.pageWrapper">
    <div :class="styles.heroWrapper">
      <div :class="styles.backgroundImage" />
      <div :class="styles.landingPage">
        <HeaderBar />
        <section :class="styles.hero">
          <div :class="styles.heroContent">
            <h1>Cancer Center of Excellence Building</h1>
            <p>อาคารศูนย์ความเป็นเลิศด้านมะเร็ง</p>
          </div>
        </section>
      </div>
    </div>

    <!-- ✅ เหลือเฉพาะ Step Form -->
    <section :class="styles.formStepSection">
      <div :class="styles.stepContainer">
        <h2>บันทึกข้อมูลผู้ป่วยทีละขั้น</h2>
        <p>สามารถเลือกกรอกตามลำดับขั้นได้ตามสถานะที่มี</p>
        <div :class="styles.menuGrid">
          <RouterLink to="/cancer-form/step1" :class="styles.menuCard">ขั้นตอนที่ 1: ข้อมูลทั่วไป</RouterLink>
          <RouterLink to="/cancer-form/step2" :class="styles.menuCard">ขั้นตอนที่ 2: ข้อมูลคลินิก</RouterLink>
          <RouterLink to="/cancer-form/step3" :class="styles.menuCard">ขั้นตอนที่ 3: พยาธิวิทยา</RouterLink>
          <RouterLink to="/cancer-form/step4" :class="styles.menuCard">ขั้นตอนที่ 4: Staging</RouterLink>
          <RouterLink to="/cancer-form/step5" :class="styles.menuCard">ขั้นตอนที่ 5: แผนการรักษา</RouterLink>
        </div>
      </div>
    </section>
  </div>
</template>

<script setup>
import HeaderBar from '@/views/layoutbardashboard/HeaderBar.vue'
import styles from '@/assets/css/mainform/landing.module.css'
</script>
