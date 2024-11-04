<script setup lang="ts">
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import {Head, useForm} from "@inertiajs/vue3";
import {Card, CardContent, CardDescription, CardHeader, CardTitle} from '@/shadcn/ui/card';
import {Label} from "@/shadcn/ui/label";
import {Input} from '@/shadcn/ui/input';
import {Textarea} from '@/shadcn/ui/textarea'
import {Checkbox} from "@/shadcn/ui/checkbox";
import {Button} from "@/shadcn/ui/button";
import {CircleX} from "lucide-vue-next";

const breadcrumbs = [
    {text: 'Dashboard', link: route('dashboard')},
    {text: 'Peças Jurídicas'},
];

const form = useForm({
    requerimentos: [
        {id: 1, value: ''}
    ],
    advogados: [
        {id: 1, nome: '', oab: ''}
    ]
});

function submit() {

}

const addRequerimento = () => {
    form.requerimentos.push({id: form.requerimentos.length + 1, value: ''});
};

const addAdvogado = () => {
    form.advogados.push({id: form.advogados.length + 1, nome: '', oab: ''});
};

const removeRequerimento = (index: number) => {
    form.requerimentos.splice(index, 1);
};

const removeAdvogado = (index: number) => {
    form.advogados.splice(index, 1);
};

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
                <form @submit.prevent="submit">
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
                                <Label for="first-name">Endereçamento</Label>
                                <Input id="first-name" class="placeholder:uppercase" required autofocus
                                       placeholder="Exemplo: AO Juiz de Direito da XXº Vara Criminal do Município XXXX Estado de XXX"/>
                                <!--                            <InputError class="mt-2" :message="form.errors.first_name"/>-->
                            </div>

                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <Label for="first-name">Número do Processo</Label>
                                    <Input id="first-name" class="placeholder:uppercase" required
                                           placeholder="Exemplo: 0000000-00.2024.0.00.0000"/>
                                </div>
                                <div>
                                    <Label for="first-name">Nome do Acusado</Label>
                                    <Input id="first-name" class="placeholder:uppercase" required
                                           placeholder="Exemplo: John Doe"/>
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
                    <CardContent class="grid grid-cols-5 gap-6">
                        <div>
                            <Label for="first-name">+ Inquerito Policial</Label>
                            <Input id="first-name" type="file" class="placeholder:uppercase"/>
                        </div>

                        <div>
                            <Label for="first-name">+ Denúncia</Label>
                            <Input id="first-name" type="file" class="placeholder:uppercase"/>
                        </div>

                        <div>
                            <Label for="first-name">+ Resposta à Acusação</Label>
                            <Input id="first-name" type="file" class="placeholder:uppercase"/>
                        </div>

                        <div>
                            <Label for="first-name">+ Recebimento da Denúncia</Label>
                            <Input id="first-name" type="file" class="placeholder:uppercase"/>
                        </div>

                        <div>
                            <Label for="first-name">+ Alegações Finais MP</Label>
                            <Input id="first-name" type="file" class="placeholder:uppercase"/>
                        </div>
                    </CardContent>

                    <CardContent>
                        <div>
                            <Label for="first-name">Dinamica dos Fatos</Label>
                            <Textarea/>
                        </div>
                        <div>
                            <Label for="first-name">Preliminares de Mérito</Label>
                            <Textarea/>
                        </div>
                    </CardContent>

                    <CardHeader class="uppercase">
                        <CardTitle class="text-sm font-medium mr-2 text-primary">
                            Selecione as teses utilizadas nas preliminares de mérito
                        </CardTitle>
                    </CardHeader>
                    <CardContent class="grid grid-cols-5 gap-6">
                        <div class="flex inline-flex items-center gap-2">
                            <Checkbox id="terms1"/>
                            <label
                                for="terms2"
                                class="text-xs font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70 uppercase"
                            >
                                Invasão Domiciliar
                            </label>
                        </div>

                        <div class="flex inline-flex items-center gap-2">
                            <Checkbox id="terms1"/>
                            <label
                                for="terms2"
                                class="text-xs font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70 uppercase"
                            >
                                Abordagem/Busca Pessoal
                            </label>
                        </div>

                        <div class="flex inline-flex items-center gap-2">
                            <Checkbox id="terms1"/>
                            <label
                                for="terms2"
                                class="text-xs font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70 uppercase"
                            >
                                Cerceamento de Defesa
                            </label>
                        </div>

                        <div class="flex inline-flex items-center gap-2">
                            <Checkbox id="terms1"/>
                            <label
                                for="terms2"
                                class="text-xs font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70 uppercase"
                            >
                                Reconhecimento Ilegal
                            </label>
                        </div>

                        <div class="flex inline-flex items-center gap-2">
                            <Checkbox id="terms1"/>
                            <label
                                for="terms2"
                                class="text-xs font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70 uppercase"
                            >
                                Ausência de Fundamentação
                            </label>
                        </div>

                    </CardContent>

                    <CardContent>
                        <div>
                            <Label for="first-name">Mérito Processual</Label>
                            <Textarea/>
                        </div>
                    </CardContent>

                    <CardHeader class="uppercase">
                        <CardTitle class="text-sm font-medium mr-2 text-primary">
                            Selecione as teses utilizadas no mérito processual
                        </CardTitle>
                    </CardHeader>
                    <CardContent class="grid grid-cols-5 gap-6">
                        <div class="flex inline-flex items-center gap-2">
                            <Checkbox id="terms1"/>
                            <label
                                for="terms2"
                                class="text-xs font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70 uppercase"
                            >
                                Insuficiência Probatória
                            </label>
                        </div>

                        <div class="flex inline-flex items-center gap-2">
                            <Checkbox id="terms1"/>
                            <label
                                for="terms2"
                                class="text-xs font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70 uppercase"
                            >
                                Indubio Pro Réo
                            </label>
                        </div>

                        <div class="flex inline-flex items-center gap-2">
                            <Checkbox id="terms1"/>
                            <label
                                for="terms2"
                                class="text-xs font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70 uppercase"
                            >
                                Negativa de Autoria
                            </label>
                        </div>

                        <div class="flex inline-flex items-center gap-2">
                            <Checkbox id="terms1"/>
                            <label
                                for="terms2"
                                class="text-xs font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70 uppercase"
                            >
                                Perda de uma Chance Probatória
                            </label>
                        </div>

                        <div class="flex inline-flex items-center gap-2">
                            <Checkbox id="terms1"/>
                            <label
                                for="terms2"
                                class="text-xs font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70 uppercase"
                            >
                                Testemunho de Ouvi Dizer
                            </label>
                        </div>

                    </CardContent>

                    <CardHeader class="uppercase">
                        <CardTitle class="text-sm font-medium mr-2 text-primary">
                            Dos Pedidos e Requerimentos
                        </CardTitle>
                    </CardHeader>

                    <CardContent>
                        <div v-for="(requerimento, index) in form.requerimentos" :key="requerimento.id" class="mb-3">
                            <Label :for="`requerimento-${requerimento.id}`">
                                Pedido/Requerimento {{ index + 1 }}
                            </Label>
                            <div class="flex items-center">
                                <Input id="`requerimento-${requerimento.id}`"
                                       v-model="requerimento.value"
                                       class="mt-1"/>

                                <CircleX
                                    v-if="index > 0"
                                    @click="removeRequerimento(index)"
                                    class="text-red-500 ml-4 cursor-pointer"/>

                            </div>
                        </div>
                        <div>
                            <Button variant="secondary"
                                    type="button"
                                    @click="addRequerimento"
                                    class="mt-2">+ Pedido/Requeimento
                            </Button>
                        </div>
                    </CardContent>

                    <CardHeader class="uppercase">
                        <CardTitle class="text-sm font-medium mr-2 text-primary">
                            Dados do Advogado
                        </CardTitle>
                    </CardHeader>
                    <CardContent>
                        <div v-for="(advogado, index) in form.advogados" key="advogado.id">
                            <div class="flex items-center">
                            <div class="grid grid-cols-2 gap-4 mb-3 w-full">
                                <div>
                                    <Label :for="`advogado-${advogado.nome}`">Nome do Advogado</Label>
                                    <Input :id="`advogado-${advogado.nome}`" required/>
                                </div>
                                <div>
                                    <Label :for="`advogado-${advogado.oab}`">Número da OAB</Label>
                                    <Input :id="`advogado-${advogado.oab}`" required/>
                                </div>
                            </div>
                            <CircleX
                                v-if="index > 0"
                                @click="removeAdvogado(index)"
                                class="text-red-500 ml-4 mt-3 cursor-pointer"/>
                            </div>
                        </div>

                        <div>
                            <Button
                                @click="addAdvogado"
                                type="button"
                                variant="secondary" class="mt-2">+ Advogado
                            </Button>
                        </div>


                        <div class="mt-6 w-full flex inline-flex items-center justify-end">
                            <Button>Criar Petição</Button>
                        </div>

                    </CardContent>

                </form>
            </Card>

        </div>

    </AuthenticatedLayout>
</template>
