<script setup>
defineProps({ modelValue: Object })
</script>

<template>
  <div style="padding: 2rem">
    <h2>สรุปข้อมูลทั้งหมด (Preview)</h2>

    <!-- Step 1 -->
    <h3>ข้อมูลผู้ป่วย</h3>
    <p>ชื่อ: {{ modelValue.step1.patientInfo.name }}</p>
    <p>นามสกุล: {{ modelValue.step1.patientInfo.lastname }}</p>
    <p>เพศ: {{ modelValue.step1.patientInfo.sex }}</p>
    <p>อายุ: {{ modelValue.step1.patientInfo.age }}</p>

    <h4>ที่อยู่:</h4>
    <p>บ้านเลขที่: {{ modelValue.step1.address.houseNo }}</p>
    <p>ตำบล: {{ modelValue.step1.address.subDistrict }}</p>
    <p>อำเภอ: {{ modelValue.step1.address.district }}</p>
    <p>จังหวัด: {{ modelValue.step1.address.province }}</p>

    <!-- Step 2 -->
    <h3>ข้อมูลชิ้นเนื้อ</h3>
    <p>Specimen: {{ modelValue.step2.specimen.name }}</p>
    <p>Laterality: {{ modelValue.step2.laterality }}</p>

    <!-- Step 3 -->
    <h3>พยาธิวิทยา</h3>
    <p>Diagnosis: {{ modelValue.step3.diagnosis.text }}</p>
    <p>Grade: {{ modelValue.step3.grade }}</p>

    <!-- Step 4 -->
    <h3>Staging</h3>
    <p>T: {{ modelValue.step4.tnm.T }}</p>
    <p>N: {{ modelValue.step4.tnm.N }}</p>
    <p>M: {{ modelValue.step4.tnm.M }}</p>
    <p>Metastasis: {{ modelValue.step4.metastasis.join(', ') }}</p>

    <!-- Step 5 -->
    <h3>แผนการรักษา</h3>
    <p>แนวทาง: {{ modelValue.step5.plan.join(', ') }}</p>
    <p>แพทย์: {{ modelValue.step5.doctor.name }}</p>
    <p>โรงพยาบาล: {{ modelValue.step5.doctor.hospital }}</p>
    <p>หมายเหตุ: {{ modelValue.step5.note?.text }}</p>

    <hr />

    <router-link to="/cancer-form/print">
      <button>ถัดไป: พิมพ์ฟอร์ม</button>
    </router-link>
  </div>
</template>
