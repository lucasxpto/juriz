<script setup lang="ts">
import {ref} from "vue";
import {useForm} from "@inertiajs/vue3";
import {Label} from "@/shadcn/ui/label";
import {Input} from '@/shadcn/ui/input';

const props = defineProps({
    label: String, // Label para o campo
    field: String, // Nome do campo no formulário pai
    onFileUploaded: Function, // Callback para enviar o file_id ao formulário pai
});

const form = useForm({
    file: null,
});

const isUploading = ref(false);

function handleFileChange(event) {
    const file = event.target.files[0];
    if (!file) return;

    form.file = file;
    isUploading.value = true;

    form.post(route('upload.store'), {
        forceFormData: true, // Necessário para enviar arquivos
        headers: {
            'X-Inertia': false, // Informa ao backend que não será tratado como Inertia
        },
        onSuccess: ({ props }) => {
            if (props.file_id) {
                // Envia o file_id para o formulário pai
                props.onFileUploaded(props.field, props.file_id);
            }
        },
        onError: () => {
            console.error("Upload failed");
        },
        onFinish: () => {
            isUploading.value = false;
            form.reset('file');
        },
    });
}

function resetFile() {
    form.file = null;
    props.onFileUploaded(props.field, null); // Remove o file_id no formulário pai
}
</script>

<template>
    <div class="flex flex-col">
        <Label :for="field" class="font-medium">{{ label }}</Label>
        <div class="inline-flex items-center gap-2 mt-2">
            <Input type="file" @change="handleFileChange" :id="field" />
            <progress v-if="isUploading" max="100"></progress>
            <button v-if="form.file" @click="resetFile" class="text-red-500">Remover</button>
        </div>
    </div>
</template>
