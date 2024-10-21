<template>
    <div class="hidden lg:block lg:w-1/2 bg-muted relative">

        <div class="absolute inset-0 w-full h-full">
            <div class="flex p-3">
                <Link :href="route('home')">
                    <h1 class="font-bold text-3xl drop-shadow-lg text-white border px-3 py-6 rounded-lg">Juriz</h1>
                </Link>
            </div>
        </div>
        <img
            src="https://images.pexels.com/photos/5668473/pexels-photo-5668473.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
            alt="Image"
            class="h-full w-full object-cover dark:brightness-[0.2] dark:grayscale"
        >
    </div>
</template>
<script setup lang="ts">
import {Link} from '@inertiajs/vue3';
</script>
