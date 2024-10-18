<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import {Card, CardDescription, CardHeader, CardTitle} from "@/shadcn/ui/card/index.js";
const breadcrumbs = [
    {
        text: "Dashboard",
        link: route('dashboard'),
    },
    {
        text: "Comunicações",
    },
];
</script>

<template>
    <AuthenticatedLayout :breadcrumbs="breadcrumbs">
        <Card>
            <CardHeader>
                <CardTitle>
                    Comunicações
                </CardTitle>
                <CardDescription>
                    Aqui você pode visualizar todas as comunicações que foram enviadas para você.
                </CardDescription>
            </CardHeader>
        </Card>
    </AuthenticatedLayout>
</template>
