<script setup>
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';
import {Label} from "@/shadcn/ui/label/index.js";
import {Input} from "@/shadcn/ui/input/index.js";
import {Card, CardContent, CardDescription, CardHeader, CardTitle} from "@/shadcn/ui/card/index.js";


const passwordInput = ref(null);
const currentPasswordInput = ref(null);

const form = useForm({
    current_password: '',
    password: '',
    password_confirmation: '',
});

const updatePassword = () => {
    form.put(route('password.update'), {
        preserveScroll: true,
        onSuccess: () => form.reset(),
        onError: () => {
            if (form.errors.password) {
                form.reset('password', 'password_confirmation');
                passwordInput.value.focus();
            }
            if (form.errors.current_password) {
                form.reset('current_password');
                currentPasswordInput.value.focus();
            }
        },
    });
};
</script>

<template>

    <Card>
        <CardHeader>
            <CardTitle>Alterar Senha</CardTitle>
            <CardDescription>
                Certifique-se de que sua conta esteja usando uma senha longa e aleatória para se manter segura.
            </CardDescription>
        </CardHeader>
        <CardContent>
            <form @submit.prevent="updatePassword" class="space-y-6">
                <div>
                    <Label for="current_password">Senha Atual</Label>
                    <Input
                        class="mt-1"
                        id="current_password"
                        type="password"
                        v-model="form.current_password"
                        required
                    />

                    <InputError
                        :message="form.errors.current_password"
                        class="mt-2"
                    />
                </div>

                <div>
                    <Label for="password">Nova Senha</Label>
                    <Input
                        class="mt-1"
                        id="password"
                        type="password"
                        v-model="form.password"
                        required
                    />

                    <InputError :message="form.errors.password" class="mt-2" />
                </div>

                <div>
                    <Label for="password_confirmation">Repita a Nova Senha</Label>
                    <Input
                        class="mt-1"
                        id="password_confirmation"
                        type="password"
                        v-model="form.password_confirmation"
                        required
                    />

                    <InputError
                        :message="form.errors.password_confirmation"
                        class="mt-2"
                    />
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
        </CardContent>
    </Card>
</template>
