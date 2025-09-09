<script setup>
const props = defineProps({ modelValue: Array })
const emit = defineEmits(['update:modelValue'])

const togglePlan = (item) => {
  const value = props.modelValue || []
  const updated = value.includes(item)
    ? value.filter(i => i !== item)
    : [...value, item]
  emit('update:modelValue', updated)
}

const options = ['ผ่าตัด', 'เคมีบำบัด', 'รังสีรักษา', 'ติดตามอาการ', 'อื่น ๆ']
</script>

<template>
  <fieldset style="border: 1px solid #ccc; padding: 1rem; margin-bottom: 2rem">
    <legend>แนวทางการรักษา</legend>
    <div v-for="item in options" :key="item">
      <label>
        <input
          type="checkbox"
          :value="item"
          :checked="(modelValue || []).includes(item)"
          @change="() => togglePlan(item)"
        />
        {{ item }}
      </label>
    </div>
  </fieldset>
</template>
