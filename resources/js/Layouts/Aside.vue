<script setup>
import {Link} from '@inertiajs/vue3';
import {Activity, AudioLines, BotMessageSquare, Brain, LayoutDashboard, Scale} from "lucide-vue-next";
</script>

<template>
    <aside class="fixed inset-y-0 left-0 z-10 hidden w-60 flex-col border-r bg-background md:flex">
        <nav class="grid items-start px-2 text-sm font-medium lg:px-4">
            <div class="flex items-center px-3 h-16 mt-1 mb-3">
                <Link :href="route('dashboard')" class="flex items-center gap-2 font-semibold">
                    <Brain class="h-6 w-6"/>
                    <span class="">Juriz</span>
                </Link>
            </div>
            <Link
                :href="route('dashboard')"
                class="flex items-center gap-3 rounded-lg px-3 py-2 transition-all hover:text-primary"
                :class="route().current('dashboard') ? 'bg-muted text-primary' : 'text-muted-foreground'"
            >
                <LayoutDashboard class="h-4 w-4"/>
                Dashboard
            </Link>
            <Link
                :href="route('communication.index')"
                class="flex items-center gap-3 rounded-lg px-3 py-2 transition-all hover:text-primary"
                :class="route().current('communication.*') ? 'bg-muted text-primary' : 'text-muted-foreground'"
            >
                <AudioLines class="h-4 w-4"/>
                Comunicações
<!--                <Badge class="ml-auto flex h-6 w-6 shrink-0 items-center justify-center rounded-full">-->
<!--                    6-->
<!--                </Badge>-->
            </Link>
            <a
                href="#"
                class="flex items-center gap-3 rounded-lg px-3 py-2 text-muted-foreground transition-all hover:text-primary"
            >
                <Activity class="h-4 w-4"/>
                Movimentações
            </a>
            <a
                href="#"
                class="flex items-center gap-3 rounded-lg px-3 py-2 text-muted-foreground transition-all hover:text-primary"
            >
                <BotMessageSquare class="h-4 w-4"/>
                Assistentes
            </a>
            <Link
                :href="route('pecas.index')"
                class="flex items-center gap-3 rounded-lg px-3 py-2 transition-all hover:text-primary"
                :class="route().current('pecas.*') ? 'bg-muted text-primary' : 'text-muted-foreground'"
            >
                <Scale class="h-4 w-4"/>
                Peças Jurídicas
            </Link>
        </nav>
    </aside>
</template>
