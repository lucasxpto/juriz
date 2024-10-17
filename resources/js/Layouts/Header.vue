<script setup>

import {Link} from '@inertiajs/vue3';

import {Button} from '@/shadcn/ui/button'
import {
    DropdownMenu,
    DropdownMenuContent,
    DropdownMenuItem,
    DropdownMenuLabel,
    DropdownMenuSeparator,
    DropdownMenuTrigger
} from '@/shadcn/ui/dropdown-menu'

import {Sheet, SheetContent, SheetTrigger} from '@/shadcn/ui/sheet'
import {
    LayoutDashboard,
    Scale,
    Activity,
    Brain,
    AudioLines,
    BotMessageSquare,
    PanelLeft,
    CircleUser,
} from "lucide-vue-next";
import BreadcrumbLayout from "@/Layouts/BreadcrumbLayout.vue";
</script>

<template>
    <header
        class="sticky top-0 z-30 flex h-14 items-center gap-4 border-b bg-background px-4 sm:static sm:h-auto sm:border-0 sm:bg-transparent sm:px-6">
        <Sheet>
            <SheetTrigger as-child>
                <Button size="icon" variant="outline" class="sm:hidden">
                    <PanelLeft class="h-5 w-5"/>
                    <span class="sr-only">Toggle Menu</span>
                </Button>
            </SheetTrigger>
            <SheetContent side="left" class="sm:max-w-xs">
                <nav class="grid gap-6 text-lg font-medium">
                    <a
                        href="#"
                        class="group flex h-10 w-10 shrink-0 items-center justify-center gap-2 rounded-full bg-primary text-lg font-semibold text-primary-foreground md:text-base"
                    >
                        <Brain class="h-5 w-5 transition-all group-hover:scale-110"/>
                        <span class="sr-only">Juriz</span>
                    </a>
                    <a
                        href="#"
                        class="flex items-center gap-4 px-2.5 text-muted-foreground hover:text-foreground"
                    >
                        <LayoutDashboard class="h-5 w-5"/>
                        Dashboard
                    </a>
                    <a
                        href="#"
                        class="flex items-center gap-4 px-2.5 text-muted-foreground hover:text-foreground"
                    >
                        <AudioLines class="h-5 w-5"/>
                        Comunicações
                    </a>
                    <a
                        href="#"
                        class="flex items-center gap-4 px-2.5 text-foreground"
                    >
                        <Activity class="h-5 w-5"/>
                        Movimentações
                    </a>
                    <a
                        href="#"
                        class="flex items-center gap-4 px-2.5 text-muted-foreground hover:text-foreground"
                    >
                        <BotMessageSquare class="h-5 w-5"/>
                        Assistentes
                    </a>
                    <a
                        href="#"
                        class="flex items-center gap-4 px-2.5 text-muted-foreground hover:text-foreground"
                    >
                        <Scale class="h-5 w-5"/>
                        Peças Jurídicas
                    </a>
                </nav>
            </SheetContent>
        </Sheet>

        <BreadcrumbLayout/>

        <div class="w-full flex justify-end items-center">
            <DropdownMenu>
                <DropdownMenuTrigger as-child>
                    <Button variant="secondary" size="icon" class="rounded-full">
                        <CircleUser class="h-5 w-5"/>
                        <span class="sr-only">Toggle user menu</span>
                    </Button>
                </DropdownMenuTrigger>
                <DropdownMenuContent align="end">
                    <DropdownMenuLabel>{{ $page.props.auth.user.first_name }}</DropdownMenuLabel>
                    <DropdownMenuSeparator/>
                    <Link :href="route('profile.edit')">
                        <DropdownMenuItem class="cursor-pointer">
                            Perfil
                        </DropdownMenuItem>
                    </Link>
                    <DropdownMenuItem>Suporte</DropdownMenuItem>
                    <DropdownMenuSeparator/>

                    <Link
                        class="w-full"
                        :href="route('logout')"
                        as="button"
                        method="post"
                    >
                        <DropdownMenuItem class="cursor-pointer">Sair</DropdownMenuItem>
                    </Link>

                </DropdownMenuContent>
            </DropdownMenu>
        </div>


    </header>
</template>
