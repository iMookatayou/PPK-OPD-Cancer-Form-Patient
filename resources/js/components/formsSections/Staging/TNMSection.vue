<script setup>
defineProps({ modelValue: Object })
defineEmits(['update:modelValue'])

const updateField = (key, value) => {
  const updated = { ...modelValue, [key]: value }
  emit('update:modelValue', updated)
}
</script>

<template>
  <fieldset style="margin-bottom: 2rem; border: 1px solid #ccc; padding: 1rem">
    <legend>ค่า TNM</legend>
    <div>
      <label>T:</label>
      <input type="text" :value="modelValue?.T" @input="e => updateField('T', e.target.value)" />
    </div>
    <div>
      <label>N:</label>
      <input type="text" :value="modelValue?.N" @input="e => updateField('N', e.target.value)" />
    </div>
    <div>
      <label>M:</label>
      <input type="text" :value="modelValue?.M" @input="e => updateField('M', e.target.value)" />
    </div>
  </fieldset>
</template>
