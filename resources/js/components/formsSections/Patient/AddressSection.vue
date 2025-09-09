<script setup>
import styles from '@/assets/css/mainform/sections/step1/AddressSection.module.css'

// ✅ รับ props และใช้ default ปลอดภัย
const props = defineProps({
  modelValue: {
    type: Object,
    default: () => ({
      houseNo: '',
      subDistrict: '',
      district: '',
      province: ''
    })
  }
})

const emit = defineEmits(['update:modelValue'])

function updateField(key, value) {
  const updated = { ...props.modelValue, [key]: value }
  emit('update:modelValue', updated)
}
</script>

<template>
  <fieldset :class="styles.section">
    <legend :class="styles.legend">ที่อยู่</legend>

    <div :class="styles.row">
      <label :class="styles.label">บ้านเลขที่:</label>
      <input
        type="text"
        :value="props.modelValue.houseNo"
        @input="e => updateField('houseNo', e.target.value)"
        :class="styles.input"
      />
    </div>

    <div :class="styles.row">
      <label :class="styles.label">ตำบล:</label>
      <input
        type="text"
        :value="props.modelValue.subDistrict"
        @input="e => updateField('subDistrict', e.target.value)"
        :class="styles.input"
      />
    </div>

    <div :class="styles.row">
      <label :class="styles.label">อำเภอ:</label>
      <input
        type="text"
        :value="props.modelValue.district"
        @input="e => updateField('district', e.target.value)"
        :class="styles.input"
      />
    </div>

    <div :class="styles.row">
      <label :class="styles.label">จังหวัด:</label>
      <input
        type="text"
        :value="props.modelValue.province"
        @input="e => updateField('province', e.target.value)"
        :class="styles.input"
      />
    </div>
  </fieldset>
</template>
