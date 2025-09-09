<script setup>
const emit = defineEmits(['update:modelValue'])
const props = defineProps({ modelValue: Object })

const updateDoctorField = (key, value) => {
  const updatedDoctor = { ...props.modelValue.doctor, [key]: value }
  emit('update:modelValue', {
    ...props.modelValue,
    doctor: updatedDoctor,
    note: props.modelValue.note
  })
}

const updateNote = (value) => {
  emit('update:modelValue', {
    ...props.modelValue,
    doctor: props.modelValue.doctor,
    note: value
  })
}
</script>

<template>
  <fieldset style="border: 1px solid #ccc; padding: 1rem">
    <legend>แพทย์ / หมายเหตุ</legend>
    <div>
      <label>ชื่อแพทย์:</label>
      <input type="text" :value="modelValue.doctor?.name" @input="e => updateDoctorField('name', e.target.value)" />
    </div>
    <div>
      <label>รพ.ที่ส่งต่อ:</label>
      <input type="text" :value="modelValue.doctor?.hospital" @input="e => updateDoctorField('hospital', e.target.value)" />
    </div>
    <div>
      <label>หมายเหตุเพิ่มเติม:</label>
      <textarea :value="modelValue.note?.text" @input="e => updateNote({ text: e.target.value })" />
    </div>
  </fieldset>
</template>
