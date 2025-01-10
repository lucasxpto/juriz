<script setup lang="ts">
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import {Head, useForm} from "@inertiajs/vue3";
import {Card, CardContent, CardDescription, CardHeader, CardTitle} from '@/shadcn/ui/card';
import {Label} from "@/shadcn/ui/label";
import {Input} from '@/shadcn/ui/input';
import {Textarea} from '@/shadcn/ui/textarea'
import {Button} from "@/shadcn/ui/button";
import InputError from "@/Components/InputError.vue";
import FileUpload from "@/Pages/FinalStatement/FileUpload.vue";

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
                
            </Card>

        </div>

    </AuthenticatedLayout>
</template>
