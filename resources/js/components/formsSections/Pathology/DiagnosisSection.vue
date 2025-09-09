<script setup>
defineProps({ modelValue: Object })
defineEmits(['update:modelValue'])

function updateField(key, value) {
  const updated = { ...modelValue, [key]: value }
  emit('update:modelValue', updated)
}
</script>

<template>
  <fieldset style="margin-bottom: 2rem; border: 1px solid #ccc; padding: 1rem">
    <legend>การวินิจฉัย</legend>
    <div>
      <label>ICD10:</label>
      <input type="text" :value="modelValue?.icd10" @input="e => updateField('icd10', e.target.value)" />
    </div>
    <div>
      <label>รายละเอียดเพิ่มเติม:</label>
      <textarea :value="modelValue?.description" @input="e => updateField('description', e.target.value)" />
    </div>
  </fieldset>
</template>
