<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import {Head, Link, useForm} from '@inertiajs/vue3';
import {Button} from '@/shadcn/ui/button'
import {Input} from '@/shadcn/ui/input'
import {Label} from '@/shadcn/ui/label'

const form = useForm({
    first_name: '',
    last_name: '',
    email: '',
    password: '',
    password_confirmation: '',
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Register"/>

        <div class="mx-auto grid w-[350px] gap-6">

            <div class="grid gap-2 text-center">
                <h1 class="text-3xl font-bold">
                    Criar conta
                </h1>
                <p class="text-balance text-muted-foreground">
                    Preencha os campos abaixo para criar sua conta
                </p>
            </div>

            <form @submit.prevent="submit">
                <div class="grid gap-4">

                    <div class="grid grid-cols-3 gap-4">
                        <div class="grid gap-2">
                            <Label for="first-name">Nome</Label>
                            <Input id="first-name" v-model="form.first_name" required autofocus/>
                            <InputError :message="form.errors.first_name"/>
                        </div>
                        <div class="grid gap-2 col-span-2">
                            <Label for="last-name">Sobrenome</Label>
                            <Input id="last-name" v-model="form.last_name" required/>
                            <InputError :message="form.errors.last_name"/>
                        </div>
                    </div>

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
                        <Label for="password">Senha</Label>

                        <Input
                            id="password"
                            type="password"
                            v-model="form.password"
                            required
                            autocomplete="current-password"
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
                        Criar conta
                    </Button>
                </div>
            </form>

            <div class="mt-4 text-center text-sm">
                Já possui uma conta?

                <Link :href="route('login')" class="underline">
                    Entrar
                </Link>
            </div>

        </div>
    </GuestLayout>
</template>
