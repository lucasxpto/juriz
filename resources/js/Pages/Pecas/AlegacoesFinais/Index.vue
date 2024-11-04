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
import InputError from "@/Components/InputError.vue";

const breadcrumbs = [
    {text: 'Dashboard', link: route('dashboard')},
    {text: 'Peças Jurídicas'},
];

const form = useForm({
    enderecamento: '',
    numero_processo: '',
    nome_acusado: '',
    anexo_inquerito: '',
    anexo_denuncia: '',
    anexo_resposta_acusacao: '',
    anexo_recebimento_denuncia: '',
    anexo_alegacoes_finais_mp: '',
    dinamica_fatos: '',
    preliminares_merito: '',
    teses_preliminares_merito: {
        invasao_domiciliar: false,
        abordagem_busca_pessoal: false,
        cerceamento_defesa: false,
        reconhecimento_ilegal: false,
        ausencia_fundamentacao: false,
    },
    merito_processual: '',
    teses_merito_processual: {
        insuficiencia_probatória: false,
        indubio_pro_reo: false,
        negativa_autoria: false,
        perda_chance_probatória: false,
        testemunho_ouvi_dizer: false,
    },
    requerimentos: [
        {id: 1, value: ''}
    ],
    advogados: [
        {id: 1, nome: '', oab: ''}
    ]
});

function onSubmit() {
    form.post(route('pecas.alegacoes-finais.store'), {
        preserveScroll: true,
        onSuccess: () => {
            // Do something
        },
        onError: () => {
            // Do something
        }
    });
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
                <form @submit.prevent="onSubmit">
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

                            <div class="grid grid-cols-2 gap-4">
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
                                        v-model="form.nome_acusado"
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
                    <CardContent class="grid grid-cols-3 gap-6">
                        <div>
                            <Label for="anexo_inquerito">+ Inquerito Policial</Label>
                            <Input
                                v-model="form.anexo_inquerito"
                                id="anexo_inquerito" type="file" class="placeholder:uppercase"/>
                            <InputError class="mt-1" :message="form.errors.anexo_inquerito"/>
                        </div>

                        <div>
                            <Label for="anexo_denuncia">+ Denúncia</Label>
                            <Input
                                v-model="form.anexo_denuncia"
                                id="anexo_denuncia" type="file" class="placeholder:uppercase"/>
                            <InputError class="mt-1" :message="form.errors.anexo_denuncia"/>
                        </div>

                        <div>
                            <Label for="anexo_resposta_acusacao">+ Resposta à Acusação</Label>
                            <Input
                                v-model="form.anexo_resposta_acusacao"
                                id="anexo_resposta_acusacao" type="file" class="placeholder:uppercase"/>
                            <InputError class="mt-1" :message="form.errors.anexo_resposta_acusacao"/>
                        </div>

                        <div>
                            <Label for="anexo_recebimento_denuncia">+ Recebimento da Denúncia</Label>
                            <Input
                                v-model="form.anexo_recebimento_denuncia"
                                id="anexo_recebimento_denuncia" type="file" class="placeholder:uppercase"/>
                            <InputError class="mt-1" :message="form.errors.anexo_recebimento_denuncia"/>
                        </div>

                        <div>
                            <Label for="anexo_alegacoes_finais_mp">+ Alegações Finais MP</Label>
                            <Input
                                v-model="form.anexo_alegacoes_finais_mp"
                                id="anexo_alegacoes_finais_mp" type="file" class="placeholder:uppercase"/>
                            <InputError class="mt-1" :message="form.errors.anexo_alegacoes_finais_mp"/>
                        </div>
                    </CardContent>

                    <CardHeader class="uppercase">
                        <CardTitle class="text-sm font-medium mr-2 text-primary">
                            Dinamica dos Fatos
                        </CardTitle>
                        <CardDescription>
                            Descreva a dinâmica dos fatos até a presente fase processual.
                        </CardDescription>
                    </CardHeader>

                    <CardContent>
                        <div>
                            <Label class="hidden" for="dinamica_fatos">Dinamica dos Fatos</Label>
                            <Textarea id="dinamica_fatos" v-model="form.dinamica_fatos"/>
                            <InputError class="mt-1" :message="form.errors.dinamica_fatos"/>
                        </div>
                    </CardContent>

                    <CardHeader class="uppercase">
                        <CardTitle class="text-sm font-medium mr-2 text-primary">
                            Preliminares de Mérito
                        </CardTitle>
                        <CardDescription>
                            Descreva os argumentos das nulidades de mérito, preferencialmente mencionando a página ou id
                            dos documentos que as evidenciam.
                        </CardDescription>
                    </CardHeader>

                    <CardContent>
                        <div>
                            <Label class="hidden" for="preliminar_merito">Preliminares de Mérito</Label>
                            <Textarea id="preliminar_merito" v-model="form.preliminar_merito"/>
                            <InputError class="mt-1" :message="form.errors.preliminar_merito"/>
                        </div>
                    </CardContent>

                    <CardHeader class="uppercase">
                        <CardTitle class="text-sm font-medium mr-2 text-primary">
                            Selecione as teses utilizadas nas preliminares de mérito
                        </CardTitle>
                    </CardHeader>
                    <CardContent>
                        <div class="grid grid-cols-5 gap-6">
                            <div class="flex inline-flex items-center gap-2">
                                <Checkbox id="invasao_domiciliar"
                                          v-model:checked="form.teses_preliminares_merito.invasao_domiciliar"/>
                                <label
                                    for="invasao_domiciliar"
                                    class="text-xs font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70 uppercase"
                                >
                                    Invasão Domiciliar
                                </label>
                            </div>

                            <div class="flex inline-flex items-center gap-2">
                                <Checkbox id="abordagem_busca_pessoal"
                                          v-model:checked="form.teses_preliminares_merito.abordagem_busca_pessoal"/>
                                <label
                                    for="abordagem_busca_pessoal"
                                    class="text-xs font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70 uppercase"
                                >
                                    Abordagem/Busca Pessoal
                                </label>
                            </div>

                            <div class="flex inline-flex items-center gap-2">
                                <Checkbox id="cerceamento_defesa"
                                          v-model:checked="form.teses_preliminares_merito.cerceamento_defesa"/>
                                <label
                                    for="cerceamento_defesa"
                                    class="text-xs font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70 uppercase"
                                >
                                    Cerceamento de Defesa
                                </label>
                            </div>

                            <div class="flex inline-flex items-center gap-2">
                                <Checkbox id="reconhecimento_ilegal"
                                          v-model:checked="form.teses_preliminares_merito.reconhecimento_ilegal"/>
                                <label
                                    for="reconhecimento_ilegal"
                                    class="text-xs font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70 uppercase"
                                >
                                    Reconhecimento Ilegal
                                </label>
                            </div>

                            <div class="flex inline-flex items-center gap-2">
                                <Checkbox id="ausencia_fundamentacao"
                                          v-model:checked="form.teses_preliminares_merito.ausencia_fundamentacao"/>
                                <label
                                    for="ausencia_fundamentacao"
                                    class="text-xs font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70 uppercase"
                                >
                                    Ausência de Fundamentação
                                </label>
                            </div>
                        </div>
                        <InputError class="mt-1" :message="form.errors.teses_preliminares_merito"/>
                    </CardContent>
                    <CardHeader class="uppercase">
                        <CardTitle class="text-sm font-medium mr-2 text-primary">
                            Mérito Processual
                        </CardTitle>
                        <CardDescription>
                            Descreva os argumentos de mérito, preferencialmente mencionando a página ou id dos
                            documentos que as evidenciam.
                        </CardDescription>
                    </CardHeader>

                    <CardContent>
                        <div>
                            <Label class="hidden" for="merito_processual">Mérito Processual</Label>
                            <Textarea id="merito_processual" v-model="form.merito_processual"/>
                            <InputError class="mt-1" :message="form.errors.merito_processual"/>
                        </div>
                    </CardContent>

                    <CardHeader class="uppercase">
                        <CardTitle class="text-sm font-medium mr-2 text-primary">
                            Selecione as teses utilizadas no mérito processual
                        </CardTitle>
                    </CardHeader>
                    <CardContent class="">
                        <div class="grid grid-cols-5 gap-6">
                            <div class="flex inline-flex items-center gap-2">
                                <Checkbox id="insuficiencia_probatória"
                                          v-model:checked="form.teses_merito_processual.insuficiencia_probatória"/>
                                <label
                                    for="insuficiencia_probatória"
                                    class="text-xs font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70 uppercase"
                                >
                                    Insuficiência Probatória
                                </label>
                            </div>

                            <div class="flex inline-flex items-center gap-2">
                                <Checkbox id="indubio_pro_reo"
                                          v-model:checked="form.teses_merito_processual.indubio_pro_reo"/>
                                <label
                                    for="indubio_pro_reo"
                                    class="text-xs font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70 uppercase"
                                >
                                    Indubio Pro Réo
                                </label>
                            </div>

                            <div class="flex inline-flex items-center gap-2">
                                <Checkbox id="negativa_autoria"
                                          v-model:checked="form.teses_merito_processual.negativa_autoria"/>
                                <label
                                    for="negativa_autoria"
                                    class="text-xs font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70 uppercase"
                                >
                                    Negativa de Autoria
                                </label>
                            </div>

                            <div class="flex inline-flex items-center gap-2">
                                <Checkbox id="perda_chance_probatória"
                                          v-model:checked="form.teses_merito_processual.perda_chance_probatória"/>
                                <label
                                    for="perda_chance_probatória"
                                    class="text-xs font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70 uppercase"
                                >
                                    Perda de uma Chance Probatória
                                </label>
                            </div>

                            <div class="flex inline-flex items-center gap-2">
                                <Checkbox id="testemunho_ouvi_dizer"
                                          v-model:checked="form.teses_merito_processual.testemunho_ouvi_dizer"/>
                                <label
                                    for="testemunho_ouvi_dizer"
                                    class="text-xs font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70 uppercase"
                                >
                                    Testemunho de Ouvi Dizer
                                </label>
                            </div>
                        </div>
                        <InputError class="mt-1" :message="form.errors.teses_merito_processual"/>
                    </CardContent>

                    <CardHeader class="uppercase">
                        <CardTitle class="text-sm font-medium mr-2 text-primary">
                            Dos Pedidos e Requerimentos
                        </CardTitle>
                    </CardHeader>

                    <CardContent>
                        <div v-for="(requerimento, index) in form.requerimentos" :key="requerimento.id" class="mb-3">
                            <Label :for="`requerimento-${requerimento.id}`">
                                Pedido/Requerimento {{ index + 1 > 1 ? `(${index + 1})` : '' }}
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
                            <InputError class="mt-1" :message="form.errors[`requerimentos.${index}.value`]"/>
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
                                        <Label :for="`advogado-${advogado.nome}`">Nome do Advogado
                                            {{ index + 1 > 1 ? `(${index + 1})` : '' }}</Label>
                                        <Input :id="`advogado-${advogado.nome}`"/>
                                        <InputError class="mt-1" :message="form.errors[`advogados.${index}.nome`]"/>
                                    </div>
                                    <div>
                                        <Label :for="`advogado-${advogado.oab}`">Número da OAB
                                            {{ index + 1 > 1 ? `(${index + 1})` : '' }}</Label>
                                        <Input :id="`advogado-${advogado.oab}`"/>
                                        <InputError class="mt-1" :message="form.errors[`advogados.${index}.oab`]"/>
                                    </div>
                                </div>
                                <CircleX
                                    v-if="index > 0"
                                    @click="removeAdvogado(index)"
                                    class="text-red-500 ml-4 mt-3 cursor-pointer"/>
                            </div>
                            <InputError class="mt-1" :message="form.errors.advogados"/></div>

                        <div>
                            <Button
                                @click="addAdvogado"
                                type="button"
                                variant="secondary" class="mt-2">+ Advogado
                            </Button>
                        </div>


                        <div class="mt-6 w-full flex inline-flex items-center justify-end">
                            <Button type="submit">Criar Petição</Button>
                        </div>

                    </CardContent>

                </form>
            </Card>

        </div>

    </AuthenticatedLayout>
</template>
