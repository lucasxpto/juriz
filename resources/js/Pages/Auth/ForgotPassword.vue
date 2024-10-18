<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import {Head, useForm} from '@inertiajs/vue3';
import {Label} from "@/shadcn/ui/label/index.js";
import {Input} from "@/shadcn/ui/input/index.js";
import {Button} from "@/shadcn/ui/button/index.js";

defineProps({
    status: {
        type: String,
    },
});

const form = useForm({
    email: '',
});

const submit = () => {
    form.post(route('password.email'));
};
</script>

<template>
    <GuestLayout>
        <Head title="Esqueceu a Senha"/>

        <div class="mx-auto grid w-[350px] gap-6">
            <div class="grid gap-2 text-center">
                <h1 class="text-3xl font-bold">
                    Recuperar Senha
                </h1>
                <p class="text-balance text-sm text-muted-foreground text-left text-pretty">
                    Esqueceu sua senha? Sem problemas. Apenas nos informe seu endereço de e-mail
                    e enviaremos um link de redefinição de senha por e-mail que permitirá
                    que você escolha uma nova.
                </p>
            </div>

            <div
                v-if="status"
                class="mb-4 text-sm font-medium text-green-600 dark:text-green-400"
            >
                {{ status }}
            </div>

            <form @submit.prevent="submit">

                <div class="grid gap-4">

                    <div class="grid gap-2">
                        <Label for="email">E-mail</Label>

                        <Input
                            id="email"
                            type="email"
                            v-model="form.email"
                            required
                            autofocus
                            autocomplete="username"
                        />

                        <InputError :message="form.errors.email"/>
                    </div>

                    <Button
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                        class="w-full">
                        Link de redefinição de senha por e-mail
                    </Button>

                </div>
            </form>
        </div>
    </GuestLayout>
</template>
