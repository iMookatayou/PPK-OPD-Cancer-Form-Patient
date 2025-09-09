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
    <legend>ข้อมูลชิ้นเนื้อ</legend>
    <div>
      <label>ชนิดชิ้นเนื้อ:</label>
      <input type="text" :value="modelValue?.type" @input="e => updateField('type', e.target.value)" />
    </div>
    <div>
      <label>วันที่เก็บ:</label>
      <input type="date" :value="modelValue?.date" @input="e => updateField('date', e.target.value)" />
    </div>
  </fieldset>
</template>
