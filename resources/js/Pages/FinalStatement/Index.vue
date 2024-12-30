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
    enderecamento: '',
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

function handleSubmit() {
    form.post(route('final-statement.store'), {
        preserveScroll: true,
        onSuccess: () => {
            form.reset();
        },
    });
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
                <form @submit.prevent="handleSubmit">
                    <CardHeader class="uppercase flex flex-row">
                        <CardTitle class="text-sm font-medium mr-2 text-primary">
                            Qualificação
                        </CardTitle>
                        <CardDescription class="text-muted-foreground">
                            Preencha os campos abaixo
                        </CardDescription>
                    </CardHeader>
                    <CardContent>

                        <div class="grid gap-4">
                            <div>
                                <Label for="enderecamento">Endereçamento</Label>
                                <Input
                                    v-model="form.enderecamento"
                                    id="enderecamento" class="placeholder:uppercase" autofocus
                                    placeholder="Exemplo: AO Juiz de Direito da XXº Vara Criminal do Município XXXX Estado de XXX"/>
                                <InputError class="mt-1" :message="form.errors.enderecamento"/>
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div>
                                    <Label for="numero_processo">Número do Processo</Label>
                                    <Input
                                        v-model="form.numero_processo"
                                        id="numero_processo" class="placeholder:uppercase"
                                        placeholder="Exemplo: 0000000-00.2024.0.00.0000"/>
                                    <InputError class="mt-1" :message="form.errors.numero_processo"/>
                                </div>
                                <div>
                                    <Label for="nome_do_acusado">Nome do Acusado</Label>
                                    <Input
                                        v-model="form.nome_do_acusado"
                                        id="nome_do_acusado" class="placeholder:uppercase"
                                        placeholder="Exemplo: John Doe"/>
                                    <InputError class="mt-1" :message="form.errors.nome_do_acusado"/>
                                </div>
                            </div>
                        </div>

                    </CardContent>
                    <CardHeader class="uppercase flex flex-row">
                        <CardTitle class="text-sm font-medium mr-2 text-primary">
                            Anexos
                        </CardTitle>
                        <CardDescription class="text-muted-foreground">
                            Anexe os documentos necessários - PDF
                        </CardDescription>
                    </CardHeader>
                    <CardContent class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-6">
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
