<script setup lang="ts">
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import {Head, useForm} from "@inertiajs/vue3";
import {Card, CardContent, CardDescription, CardHeader, CardTitle} from '@/shadcn/ui/card';
import {marked} from "marked";
import {computed} from "vue";

const props = defineProps({
    document: String
});


marked.setOptions({
    breaks: true,
    gfm: true,
});

const formattedDocument = computed(() => {
    if (!props.document) return '';
    return marked(props.document);
});

const breadcrumbs = [
    {text: 'Dashboard', link: route('dashboard')},
    {text: 'Peças Jurídicas', link: route('final-statement.index')},
    {text: 'Documento'}
];

</script>
<template>
    <Head title="Peças Jurídicas"/>
    <AuthenticatedLayout :breadcrumbs="breadcrumbs">

        <div class="grid grid-cols-1 gap-6 max-w-7xl pb-12">
            <Card>
                <CardHeader>
                    <CardTitle class="text-sm font-medium text-primary">
                        Informações
                    </CardTitle>
                    <CardDescription>
                        Para uma melhor experiência no desenvolvimento de alegações finais, nossa equipe desenvolveu um
                        vídeo onde demostramos a melhor forma de preencher os campos para que assim possa ter uma
                        petição mais combativa!
                    </CardDescription>
                </CardHeader>
            </Card>

            <Card>
                <CardContent>
                    <div class="pt-4 prose prose-sm max-w-none dark:prose-invert" v-html="formattedDocument"></div>
                </CardContent>
            </Card>

        </div>

    </AuthenticatedLayout>
</template>
