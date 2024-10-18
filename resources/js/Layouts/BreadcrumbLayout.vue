<script setup>
import { Link } from '@inertiajs/vue3'
import {
    Breadcrumb,
    BreadcrumbItem,
    BreadcrumbLink,
    BreadcrumbList,
    BreadcrumbPage,
    BreadcrumbSeparator,
} from '@/shadcn/ui/breadcrumb'

const props = defineProps({
    breadcrumbs : {
        type: Array,
        required: true,
    }
});


</script>

<template>


    <Breadcrumb class="hidden md:flex items-center w-full">
        <BreadcrumbList>
            <BreadcrumbItem v-for="(breadcrumb, index) in breadcrumbs" :key="index">
                <BreadcrumbLink v-if="breadcrumb.link" as-child>
                    <Link :href="breadcrumb.link">{{ breadcrumb.text }}</Link>
                </BreadcrumbLink>
                <BreadcrumbPage v-else>{{ breadcrumb.text }}</BreadcrumbPage>
                <BreadcrumbSeparator v-if="index < breadcrumbs.length - 1"/>
            </BreadcrumbItem>
        </BreadcrumbList>
    </Breadcrumb>
</template>
