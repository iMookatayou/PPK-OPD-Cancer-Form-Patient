<script setup>
defineProps({ modelValue: Array })
defineEmits(['update:modelValue'])

function toggleValue(value) {
  const updated = Array.isArray(modelValue) ? [...modelValue] : []

  const index = updated.indexOf(value)
  if (index === -1) {
    updated.push(value)
  } else {
    updated.splice(index, 1)
  }

  emit('update:modelValue', updated)
}
</script>

<template>
  <fieldset>
    <legend>การแพร่กระจาย (Metastasis)</legend>

    <label>
      <input
        type="checkbox"
        value="lung"
        :checked="Array.isArray(modelValue) && modelValue.includes('lung')"
        @change="toggleValue('lung')"
      />
      ปอด
    </label>

    <label>
      <input
        type="checkbox"
        value="liver"
        :checked="Array.isArray(modelValue) && modelValue.includes('liver')"
        @change="toggleValue('liver')"
      />
      ตับ
    </label>

    <label>
      <input
        type="checkbox"
        value="bone"
        :checked="Array.isArray(modelValue) && modelValue.includes('bone')"
        @change="toggleValue('bone')"
      />
      กระดูก
    </label>
  </fieldset>
</template>
