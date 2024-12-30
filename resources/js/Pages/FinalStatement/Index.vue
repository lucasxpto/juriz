<script setup lang="ts">
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import {Head, useForm} from "@inertiajs/vue3";
import {Card, CardContent, CardDescription, CardHeader, CardTitle} from '@/shadcn/ui/card';
import {Label} from "@/shadcn/ui/label";
import {Input} from '@/shadcn/ui/input';
import {Textarea} from '@/shadcn/ui/textarea'
import {Checkbox} from "@/shadcn/ui/checkbox";
import {Button} from "@/shadcn/ui/button";
import {CircleX, X} from "lucide-vue-next";
import InputError from "@/Components/InputError.vue";
import FileUpload from "@/Pages/FinalStatement/FileUpload.vue";

const breadcrumbs = [
    {text: 'Dashboard', link: route('dashboard')},
    {text: 'Peças Jurídicas'},
];

const form = useForm({
    file_ids: {
        anexo_inquerito: '',
        anexo_denuncia: '',
        anexo_resposta_acusacao: '',
        anexo_recebimento_denuncia: '',
        anexo_alegacoes_finais_mp: '',
    },
});

function onFileUploaded(field, fileId) {
    form.file_ids[field] = fileId;
}

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
                <form>
                    <CardHeader class="uppercase flex flex-row">
                        <CardTitle class="text-sm font-medium mr-2 text-primary">
                            Anexos
                        </CardTitle>
                        <CardDescription class="text-muted-foreground">
                            Anexe os documentos necessários - PDF
                        </CardDescription>
                    </CardHeader>
                    <CardContent class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-6">
                        <pre>
                            {{ form.file_ids }}
                        </pre>

                        <FileUpload
                            label="+ Inquérito Policial"
                            field="anexo_inquerito"
                            :onFileUploaded="onFileUploaded"
                        />
                        <FileUpload
                            label="+ Denúncia"
                            field="anexo_denuncia"
                            :onFileUploaded="onFileUploaded"
                        />
                        <FileUpload
                            label="+ Resposta à Acusação"
                            field="anexo_resposta_acusacao"
                            :onFileUploaded="onFileUploaded"
                        />
                        <FileUpload
                            label="+ Recebimento da Denúncia"
                            field="anexo_recebimento_denuncia"
                            :onFileUploaded="onFileUploaded"
                        />
                        <FileUpload
                            label="+ Alegações Finais MP"
                            field="anexo_alegacoes_finais_mp"
                            :onFileUploaded="onFileUploaded"
                        />
                    </CardContent>

                    <CardContent>
                        <div class="mt-6 w-full inline-flex items-center justify-end">
                            <Button type="submit">Criar Petição</Button>
                        </div>
                    </CardContent>

                </form>
            </Card>

        </div>

    </AuthenticatedLayout>
</template>
