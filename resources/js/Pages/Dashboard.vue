<script setup lang="ts">
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import {Head, Link } from "@inertiajs/vue3";
import {Button} from "@/shadcn/ui/button";
import Onboard from "@/Components/Onboard.vue";

const breadcrumbs = [
    {
        text: 'Dashboard',
    },
];

</script>
<template>
    <Head title="Dashboard"/>
    <AuthenticatedLayout :breadcrumbs="breadcrumbs">
        <Onboard />

    </AuthenticatedLayout>
</template>
