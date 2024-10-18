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

const props = defineProps({
    email: {
        type: String,
        required: true,
    },
    token: {
        type: String,
        required: true,
    },
});

const form = useForm({
    token: props.token,
    email: props.email,
    password: '',
    password_confirmation: '',
});

const submit = () => {
    form.post(route('password.store'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Criar nova senha"/>

        <div class="mx-auto grid w-[350px] gap-6">
            <div class="grid gap-2 text-center">
                <h1 class="text-3xl font-bold">
                    Redefinir Senha
                </h1>
                <p class="text-balance text-muted-foreground">
                    Informe sua nova senha para acessar sua conta
                </p>
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

                    <div class="grid gap-2">
                        <Label for="password">Nova Senha</Label>

                        <Input
                            id="password"
                            type="password"
                            v-model="form.password"
                            required
                        />

                        <InputError :message="form.errors.password"/>
                    </div>

                    <div class="grid gap-2">
                        <Label for="password_confirmation">Confirme a Senha</Label>

                        <Input
                            id="password_confirmation"
                            type="password"
                            v-model="form.password_confirmation"
                            required
                        />

                        <InputError :message="form.errors.password_confirmation"
                        />
                    </div>

                    <Button
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                        class="w-full">
                        Redefinir Senha
                    </Button>
                </div>
            </form>

        </div>
    </GuestLayout>
</template>
