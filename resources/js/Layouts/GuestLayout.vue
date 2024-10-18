<template>
    <div class="w-full h-screen lg:flex lg:min-h-[600px] xl:min-h-[800px]">

            <BgImage />

        <div class="flex items-center justify-center py-12 lg:w-1/2">
            <slot/>
        </div>
    </div>
</template>
<script setup lang="ts">
import BgImage from "@/Pages/Auth/BgImage.vue";
</script>
