<template>
  <div :class="styles.printPage">
    <div :class="styles.formHeader">
      <img src="/storage/app/public/images/LogoPPK.png" alt="Hospital Logo" :class="styles.logo" />
      <h1>ใบคัดกรองผู้ป่วย</h1>
      <p>โรงพยาบาลพระปกเกล้าจันทบุรี</p>
    </div>

    <div :class="styles.formContent">
      <p><strong>ชื่อ-สกุล:</strong> ____________________________________</p>
      <p><strong>อายุ:</strong> ______ ปี</p>
      <p><strong>วันที่:</strong> _____ / _____ / ______</p>
      <p><strong>เวลา:</strong> _______ น.</p>
      <p><strong>บริการที่ต้องการ:</strong></p>
      <ul>
        <li><input type="checkbox" /> ตรวจรักษาโรคทั่วไป</li>
        <li><input type="checkbox" /> รับยาเดิม</li>
        <li><input type="checkbox" /> เจาะเลือด</li>
        <li><input type="checkbox" /> อื่น ๆ __________________________</li>
      </ul>
    </div>

    <div :class="styles.formFooter">
      <p>ลงชื่อผู้คัดกรอง: __________________________</p>
      <p>หมายเหตุ: กรุณานำแบบฟอร์มนี้ไปยื่นที่ช่องเวชระเบียน</p>
    </div>

    <button :class="styles.printBtn" @click="handlePrint">พิมพ์ฟอร์ม</button>
  </div>
</template>

<script setup>
import styles from '@/assets/css/mainform/print/printform.module.css'

function handlePrint() {
  window.print()
}
</script>
