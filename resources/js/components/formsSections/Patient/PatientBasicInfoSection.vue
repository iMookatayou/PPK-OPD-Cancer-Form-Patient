<script setup>
import styles from '@/assets/css/mainform/sections/step1/PatientBasicInfoSection.module.css'

const emit = defineEmits(['update:modelValue'])
const props = defineProps({
  modelValue: {
    type: Object,
    default: () => ({})
  }
})

function updateField(key, value) {
  const updated = { ...props.modelValue, [key]: value }
  emit('update:modelValue', updated)
}
</script>

<template>
  <fieldset :class="styles.section">
    <legend :class="styles.legend">ข้อมูลผู้ป่วย</legend>

    <div :class="styles.row">
      <label :class="styles.label">ชื่อ:</label>
      <input type="text" :value="modelValue.name" @input="e => updateField('name', e.target.value)" :class="styles.input" />
    </div>

    <div :class="styles.row">
      <label :class="styles.label">นามสกุล:</label>
      <input type="text" :value="modelValue.lastname" @input="e => updateField('lastname', e.target.value)" :class="styles.input" />
    </div>

    <div :class="styles.row">
      <label :class="styles.label">เพศ:</label>
      <select :value="modelValue.sex" @change="e => updateField('sex', e.target.value)" :class="styles.input">
        <option value="">เลือก</option>
        <option value="male">ชาย</option>
        <option value="female">หญิง</option>
      </select>
    </div>

    <div :class="styles.row">
      <label :class="styles.label">อายุ:</label>
      <input type="number" :value="modelValue.age" @input="e => updateField('age', e.target.value)" :class="styles.input" />
    </div>
  </fieldset>
</template>
