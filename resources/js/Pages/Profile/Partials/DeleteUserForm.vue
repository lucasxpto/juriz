<script setup>
import DangerButton from '@/Components/DangerButton.vue';
import InputError from '@/Components/InputError.vue';
import Modal from '@/Components/Modal.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';
import {Label} from "@/shadcn/ui/label/index.js";
import {Input} from "@/shadcn/ui/input/index.js";
import {Card, CardContent, CardDescription, CardHeader, CardTitle} from "@/shadcn/ui/card/index.js";


const confirmingUserDeletion = ref(false);
const passwordInput = ref(null);

const form = useForm({
    password: '',
});

const confirmUserDeletion = () => {
    confirmingUserDeletion.value = true;

    // nextTick(() => passwordInput.value.focus());
};

const deleteUser = () => {
    form.delete(route('profile.destroy'), {
        preserveScroll: true,
        onSuccess: () => closeModal(),
        onError: () => passwordInput.value.focus(),
        onFinish: () => form.reset(),
    });
};

const closeModal = () => {
    confirmingUserDeletion.value = false;

    form.clearErrors();
    form.reset();
};
</script>

<template>

    <Card>
        <CardHeader>
            <CardTitle>Remover Conta</CardTitle>
            <CardDescription>
                Uma vez que sua conta é excluída, todos os seus recursos e dados
                serão excluídos permanentemente. Antes de excluir sua conta,
                faça o download de quaisquer dados ou informações que deseja
                reter.
            </CardDescription>
        </CardHeader>
        <CardContent>
            <DangerButton @click="confirmUserDeletion">Delete Account</DangerButton>

            <Modal :show="confirmingUserDeletion" @close="closeModal">
                <div class="p-6">
                    <h2
                        class="text-lg font-medium text-gray-900 dark:text-gray-100"
                    >
                        Você tem certeza que deseja excluir sua conta?

                    </h2>

                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                        Uma vez que sua conta é excluída, todos os seus recursos e
                        dados serão excluídos permanentemente. Por favor, insira sua
                        senha para confirmar que você deseja excluir permanentemente
                        sua conta.
                    </p>

                    <div class="mt-6">

                        <Label for="password" class="sr-only">Senha</Label>
                        <Input
                            class="mt-1"
                            id="password"
                            type="password"
                            v-model="form.password"
                            placeholder="Senha"
                            @keyup.enter="deleteUser"
                            required
                        />

                        <InputError :message="form.errors.password" class="mt-2" />
                    </div>

                    <div class="mt-6 flex justify-end">
                        <SecondaryButton @click="closeModal">
                            Cancelar
                        </SecondaryButton>

                        <DangerButton
                            class="ms-3"
                            :class="{ 'opacity-25': form.processing }"
                            :disabled="form.processing"
                            @click="deleteUser"
                        >
                            Deletar Conta
                        </DangerButton>
                    </div>
                </div>
            </Modal>
        </CardContent>
    </Card>

</template>
