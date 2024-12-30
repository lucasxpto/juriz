<script setup lang="ts">
import axios from 'axios';
import {ref} from 'vue';
import {Label} from "@/shadcn/ui/label";
import {Input} from '@/shadcn/ui/input';

const props = defineProps({
    label: String,
    field: String,
    onFileUploaded: Function,
});

const isUploading = ref(false);
const progress = ref(0);

function handleFileChange(event) {
    const file = event.target.files[0];
    if (!file) return;

    const formData = new FormData();
    formData.append('file', file);

    isUploading.value = true;

    axios.post(route('upload.store'), formData, {
        headers: {
            'Content-Type': 'multipart/form-data',
        },
        onUploadProgress: (progressEvent) => {
            progress.value = Math.round((progressEvent.loaded / progressEvent.total) * 100);
        },
    })
        .then((response) => {
            if (response.data.success) {
                props.onFileUploaded(props.field, response.data.file_id);
            }
        })
        .catch((error) => {
            console.error('Upload failed:', error);
        })
        .finally(() => {
            isUploading.value = false;
            progress.value = 0;
        });
}

function resetFile() {
    props.onFileUploaded(props.field, null);
}
</script>

<template>
    <div class="flex flex-col">
        <Label :for="field" class="font-medium">{{ label }}</Label>
        <div class="inline-flex items-center gap-2 mt-2">
            <Input type="file" @change="handleFileChange" :id="field" />
            <progress v-if="isUploading" :value="progress" max="100">{{ progress }}%</progress>
            <button v-if="isUploading" @click="resetFile" class="text-red-500">Cancelar</button>
        </div>
    </div>
</template>
