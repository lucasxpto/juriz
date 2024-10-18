<script setup>
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import {Link, useForm, usePage} from '@inertiajs/vue3';
import {Input} from '@/shadcn/ui/input'
import {Label} from '@/shadcn/ui/label'
import {Checkbox} from '@/shadcn/ui/checkbox'

defineProps({
    mustVerifyEmail: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const user = usePage().props.auth.user;

const form = useForm({
    first_name: user.first_name,
    last_name: user.last_name,
    telefone: user.telefone,
    numero_oab: user.numero_oab,
    uf_oab: user.uf_oab,
    notificar_email: user.notificar_email,
    notificar_whatsapp: user.notificar_whatsapp,
    email: user.email,
});
</script>

<template>
    <section>
        <header>
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                Informações do Perfil
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                Atualize as informações do seu perfil e endereço de e-mail.
            </p>
        </header>

        <form
            @submit.prevent="form.patch(route('profile.update'))"
            class="mt-6 space-y-6"
        >

            <div class="grid grid-cols-3 gap-4">
                <div class="grid gap-2">
                    <Label for="first-name">Nome</Label>
                    <Input id="first-name" v-model="form.first_name" required autofocus/>
                    <InputError class="mt-2" :message="form.errors.first_name"/>
                </div>
                <div class="grid gap-2 col-span-2">
                    <Label for="last-name">Sobrenome</Label>
                    <Input id="last-name" v-model="form.last_name" required/>
                    <InputError class="mt-2" :message="form.errors.last_name"/>
                </div>
            </div>
            <div class="grid grid-cols-2 lg:grid-cols-5 gap-4">
                <div class="grid gap-2">
                    <Label for="numero_oab">Nº da OAB</Label>
                    <Input id="numero_oab" v-model="form.numero_oab" required/>
                    <InputError class="mt-2" :message="form.errors.numero_oab"/>
                </div>
                <div class="grid gap-2">
                    <Label for="uf_oab">UF da OAB</Label>
                    <Input id="uf_oab" v-model="form.uf_oab" required/>
                    <InputError class="mt-2" :message="form.errors.uf_oab"/>
                </div>

                <div class="text-pretty text-xs col-span-full lg:col-span-3 lg:mt-6">
                    O número da OAB deve estar igual ao cadastrado no PJ-e.
                    Exemplo: SP123456 é diferente de 123456.
                </div>
            </div>



            <div>
                <Label for="telefone">Celular</Label>
                <Input
                    class="mt-1"
                    id="telefone"
                    type="phone"
                    v-model="form.telefone"
                    required
                />
                <InputError class="mt-2" :message="form.errors.telefone"/>
            </div>

            <div>
                <Checkbox id="notificar_whatsapp"
                          v-model:checked="form.notificar_whatsapp"/>
                <label
                    for="notificar_whatsapp"
                    class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                >
                    Desejo receber notificações pelo WhatsApp
                </label>
            </div>

            <div>
                <Label for="email">E-mail</Label>
                <Input
                    class="mt-1"
                    id="email"
                    type="email"
                    v-model="form.email"
                    placeholder="m@example.com"
                    required
                />
                <InputError class="mt-2" :message="form.errors.email"/>
            </div>

            <div class="inline-flex items-center space-x-3">
                <Checkbox id="notificar_email"
                          v-model:checked="form.notificar_email"/>
                <label
                    for="notificar_email"
                    class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                >
                    Desejo receber notificações por e-mail
                </label>
            </div>

            <div v-if="mustVerifyEmail && user.email_verified_at === null">
                <p class="mt-2 text-sm text-gray-800 dark:text-gray-200">
                    Seu endereço de e-mail não foi verificado.
                    <Link
                        :href="route('verification.send')"
                        method="post"
                        as="button"
                        class="rounded-md text-sm text-gray-600 underline hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:text-gray-400 dark:hover:text-gray-100 dark:focus:ring-offset-gray-800"
                    >
                        Clique aqui para reenviar o e-mail de verificação.
                    </Link>
                </p>

                <div
                    v-show="status === 'verification-link-sent'"
                    class="mt-2 text-sm font-medium text-green-600 dark:text-green-400"
                >
                    Um novo link de verificação foi enviado para o seu endereço de e-mail.
                </div>
            </div>

            <div class="flex items-center gap-4">
                <PrimaryButton :disabled="form.processing">Salvar</PrimaryButton>

                <Transition
                    enter-active-class="transition ease-in-out"
                    enter-from-class="opacity-0"
                    leave-active-class="transition ease-in-out"
                    leave-to-class="opacity-0"
                >
                    <p
                        v-if="form.recentlySuccessful"
                        class="text-sm text-gray-600 dark:text-gray-400"
                    >
                        Salvo.
                    </p>
                </Transition>
            </div>
        </form>
    </section>
</template>
