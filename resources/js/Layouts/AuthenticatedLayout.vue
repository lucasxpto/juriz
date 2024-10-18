<script setup lang="ts">
import Aside from "@/Layouts/Aside.vue";
import Header from "@/Layouts/Header.vue";

const props = defineProps({
    breadcrumbs: {
        type: Array,
        required: true,
    },
});

</script>

<template>

    <div class="flex min-h-screen w-full flex-col bg-muted/40">
        <Aside/>
        <div class="flex flex-col sm:gap-4 sm:py-4 sm:pl-60">
            <Header :breadcrumbs="breadcrumbs"/>
            <main class="grid flex-1 items-start gap-4 p-4 sm:px-6 sm:py-0 md:gap-8">
                <slot/>
            </main>
        </div>
    </div>

</template>
