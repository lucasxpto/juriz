<script setup lang="ts">
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import {Head} from "@inertiajs/vue3";
import {Card, CardContent, CardDescription, CardHeader, CardTitle} from '@/shadcn/ui/card';
import {Label} from "@/shadcn/ui/label";
import {Input} from '@/shadcn/ui/input';
import {Textarea} from '@/shadcn/ui/textarea'
import {Checkbox} from "@/shadcn/ui/checkbox";
import {Button} from "@/shadcn/ui/button";

const breadcrumbs = [
    {text: 'Dashboard', link: route('dashboard')},
    {text: 'Peças Jurídicas'},
];

</script>
<template>
    <Head title="Peças Jurídicas"/>
    <AuthenticatedLayout :breadcrumbs="breadcrumbs">

        <div class="grid grid-cols-1 gap-6 max-w-7xl">
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

                    <CardContent>
                        <div>
                            <Label for="first-name">Dos Pedidos e Requerimentos</Label>
                            <Input id="first-name" class="mt-2"/>
                            <Input id="first-name" class="mt-2"/>
                        </div>
                        <div>
                            <Button variant="secondary" class="mt-2">Adicionar mais Pedido/Requeimento</Button>
                        </div>
                    </CardContent>

                    <CardHeader class="uppercase">
                        <CardTitle class="text-sm font-medium mr-2 text-primary">
                            Dados do Advogado
                        </CardTitle>
                    </CardHeader>
                    <CardContent>


                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <Label for="first-name">Nome do Advogado</Label>
                                <Input id="first-name" required/>
                            </div>
                            <div>
                                <Label for="first-name">Número da OAB</Label>
                                <Input id="first-name" required/>
                            </div>
                        </div>

                        <div>
                            <Button variant="secondary"  class="mt-2">Adicionar Advogado</Button>
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
