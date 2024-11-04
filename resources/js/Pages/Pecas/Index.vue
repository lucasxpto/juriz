<script setup lang="ts">
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import {Head, Link} from "@inertiajs/vue3";
import {Card, CardContent, CardHeader, CardTitle} from '@/shadcn/ui/card';

const breadcrumbs = [
    {text: 'Dashboard', link: route('dashboard')},
    {text: 'Peças Jurídicas'},
];

</script>
<template>
    <Head title="Peças Jurídicas"/>
    <AuthenticatedLayout :breadcrumbs="breadcrumbs">

        <div class="grid gap-4 md:grid-cols-2 md:gap-8 lg:grid-cols-4">
            <Link :href="route('pecas.alegacoes-finais.index')">
                <Card class="hover:border-indigo-600">
                    <CardHeader class="flex flex-row items-center justify-between space-y-0 pb-2">
                        <CardTitle class="text-sm font-medium">
                            Alegações Finais
                        </CardTitle>
                    </CardHeader>
                    <CardContent>
                        <p class="text-sm text-muted-foreground">
                            Elabore suas alegações finais.
                        </p>
                    </CardContent>
                </Card>
            </Link>
        </div>

    </AuthenticatedLayout>
</template>
