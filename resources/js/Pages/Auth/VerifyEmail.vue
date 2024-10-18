<script setup>
import { computed } from 'vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import {Button} from "@/shadcn/ui/button/index.js";

const props = defineProps({
    status: {
        type: String,
    },
});

const form = useForm({});

const submit = () => {
    form.post(route('verification.send'));
};

const verificationLinkSent = computed(
    () => props.status === 'verification-link-sent',
);
</script>

<template>
    <GuestLayout>
        <Head title="Confirme seu e-mail" />

        <div class="mx-auto grid w-[350px] gap-6">

            <div class="grid gap-2 text-center">
                <h1 class="text-3xl font-bold">
                    Criar conta
                </h1>
                <p class="text-balance text-muted-foreground text-left text-sm text-pretty">
                    Obrigado por se inscrever! Antes de começar, você poderia verificar
                    seu endereço de e-mail clicando no link que acabamos de enviar para
                    você por e-mail?
                </p>
                <p class="text-balance text-muted-foreground text-left text-sm text-pretty">Se você não recebeu o e-mail, teremos prazer em enviar outro.</p>
            </div>


        <div
            class="mb-4 text-sm font-medium text-green-600 dark:text-green-400 text-pretty"
            v-if="verificationLinkSent"
        >
            Uma nova mensagem de verificação foi enviada para o endereço de e-mail
            que você forneceu durante o registro.
        </div>

        <form @submit.prevent="submit">
            <div class="grid gap-4">
                <Button
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                    class="w-full">
                    Reenviar e-mail de verificação
                </Button>

                <Link
                    :href="route('logout')"
                    method="post"
                    as="button"
                    class="rounded-md text-sm text-gray-600 underline hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:text-gray-400 dark:hover:text-gray-100 dark:focus:ring-offset-gray-800"
                    >Sair
                </Link
                >
            </div>
        </form>
        </div>
    </GuestLayout>
</template>
