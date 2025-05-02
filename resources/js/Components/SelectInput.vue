<script setup>
import { defineProps, defineEmits } from 'vue';

// Definir las props
defineProps({
    modelValue: {
        type: String, // O el tipo que necesites (String, Number, etc.)
        required: true,
    },
    options: {
        type: Array,
        required: true,
        default: () => [],
    },
});

// Emitir eventos
const emit = defineEmits(['update:modelValue']);

// Función para manejar el cambio de valor
const updateValue = (event) => {
    emit('update:modelValue', event.target.value); // Emitir el nuevo valor seleccionado
};
</script>

<template>
    <select
        class="rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
        :value="modelValue"
        @change="updateValue"
    >
        <!-- Opción predeterminada -->
        <option disabled value="">Seleccione una opción</option>

        <!-- Opciones dinámicas -->
        <option
            v-for="(option, index) in options"
            :key="index"
            :value="option.value"
        >
            {{ option.label }}
        </option>
    </select>
</template>
