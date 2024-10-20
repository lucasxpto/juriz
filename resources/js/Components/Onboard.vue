<script setup>
import {Button} from "@/shadcn/ui/button";
import {Link, usePage} from "@inertiajs/vue3";

const props = defineProps({
    title: String
})

const user = usePage().props.auth.user;

</script>

<template>

        <div
            v-if="!user.numero_oab || !user.uf_oab || !user.telefone"
            class="flex flex-1 p-10 items-center justify-center rounded-lg border border-dashed shadow-sm bg-card">

            <div class="flex flex-col items-center gap-1 text-center">
                <h3 class="text-2xl font-bold tracking-tight">
                    Receber notificações
                </h3>
                <p class="text-sm text-muted-foreground">
                    Complete seu perfil para começar a receber notificações.
                </p>
                <Link :href="route('profile.edit')">
                    <Button class="mt-4">
                        Completar perfil
                    </Button>
                </Link>
            </div>
        </div>

</template>
