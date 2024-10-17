<script setup>
import Checkbox from '@/Components/Checkbox.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import {Head, Link, useForm} from '@inertiajs/vue3';
import {Button} from '@/shadcn/ui/button'
import {Input} from '@/shadcn/ui/input'
import {Label} from '@/shadcn/ui/label'

defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Log in"/>

        <div class="mx-auto grid w-[350px] gap-6">
            <div class="grid gap-2 text-center">
                <h1 class="text-3xl font-bold">
                    Login
                </h1>
                <p class="text-balance text-muted-foreground text-pretty">
                    Entre com seu e-mail e senha para acessar sua conta
                </p>
            </div>


            <div v-if="status" class="mb-4 text-sm font-medium text-green-600">
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

                    <div class="grid gap-2">
                        <div class="flex items-center">
                            <Label for="password">Senha</Label>
                            <Link
                                v-if="canResetPassword"
                                :href="route('password.request')"
                                class="ml-auto inline-block text-sm underline"
                            >
                                Esqueceu sua senha?
                            </Link>
                        </div>
                        <Input
                            id="password"
                            type="password"
                            v-model="form.password"
                            required
                            autocomplete="current-password"
                        />

                        <InputError :message="form.errors.password"/>
                    </div>

                    <div>
                        <label class="flex items-center">
                            <Checkbox name="remember" v-model:checked="form.remember"/>
                            <span class="ms-2 text-sm text-gray-600 dark:text-gray-400"
                            >Manter conectado</span>
                        </label>
                    </div>

                    <Button type="submit" class="w-full"
                            :class="{ 'opacity-25': form.processing }"
                            :disabled="form.processing"
                    >
                        Entrar
                    </Button>
                </div>
            </form>
            <div class="mt-4 text-center text-sm">
                Não tem uma conta?
                <Link :href="route('register')" class="underline">
                    Registre-se
                </Link>
            </div>
        </div>
    </GuestLayout>
</template>
