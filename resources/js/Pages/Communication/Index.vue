<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link } from '@inertiajs/vue3'
import { Button } from '@/shadcn/ui/button'
import { Checkbox } from '@/shadcn/ui/checkbox'
import { Input } from '@/shadcn/ui/input'
import {
    Table,
    TableBody,
    TableCell,
    TableHead,
    TableHeader,
    TableRow,
} from '@/shadcn/ui/table'
import { valueUpdater } from '@/lib/utils'
import {
    FlexRender,
    getCoreRowModel,
    getExpandedRowModel,
    getFilteredRowModel,
    getPaginationRowModel,
    getSortedRowModel,
    useVueTable,
} from '@tanstack/vue-table'
import {ArrowUpDown, CircleEllipsis, SquareArrowOutUpRight} from 'lucide-vue-next'
import { h, ref } from 'vue'
import DropdownAction from './DataTableDropDown.vue'

const props = defineProps({
    data : Array,
})

const data = props.data;

const columns = [
    {
        id: 'select',
        header: ({ table }) => h(Checkbox, {
            'checked': table.getIsAllPageRowsSelected() || (table.getIsSomePageRowsSelected() && 'indeterminate'),
            'onUpdate:checked': value => table.toggleAllPageRowsSelected(!!value),
            'ariaLabel': 'Select all',
        }),
        cell: ({ row }) => h(Checkbox, {
            'checked': row.getIsSelected(),
            'onUpdate:checked': value => row.toggleSelected(!!value),
            'ariaLabel': 'Select row',
        }),
        enableSorting: false,
        enableHiding: false,
    },
    {
        accessorKey: 'numeroprocessocommascara',
        header: ({ column }) => {
            return h(Button, {
                variant: 'ghost',
                onClick: () => column.toggleSorting(column.getIsSorted() === 'asc'),
            }, () => ['Nº do Processo', h(ArrowUpDown, { class: 'ml-2 h-4 w-4' })])
        },
        cell: ({ row }) => h('div', row.getValue('numeroprocessocommascara')),
    },
    {
        accessorKey: 'nome_orgao',
        header: 'ORGÃO',
        cell: ({ row }) => h('div', row.getValue('nome_orgao')),
    },
    {
        accessorKey: 'tipo_comunicacao',
        header: 'TIPO',
        cell: ({ row }) => h('div', row.getValue('tipo_comunicacao')),
    },
    {
        accessorKey: 'link',
        header: 'TEOR',
        cell: ({ row }) => h('a', {
            href: row.getValue('link'),
            target: '_blank',
            class: 'text-blue-500 underline' },
        [
            h(SquareArrowOutUpRight, {class: 'h-4 w-4'}),
        ]),
    },
    {
        accessorKey: 'data_disponibilizacao',
        header: 'DATA',
        cell: ({ row }) => h('div', row.getValue('data_disponibilizacao')),
    },
    {
        id: 'actions',
        enableHiding: false,
        cell: ({ row }) => h(Link, {
            href: route('communication.show', row.original.id),
            class: 'text-blue-500 underline',
        }, () => h(CircleEllipsis, { class: 'h-4 w-4' })),
    },
]

const sorting = ref([])
const columnFilters = ref([])
const columnVisibility = ref({})
const rowSelection = ref({})
const expanded = ref({})

const table = useVueTable({
    data,
    columns,
    getCoreRowModel: getCoreRowModel(),
    getPaginationRowModel: getPaginationRowModel(),
    getSortedRowModel: getSortedRowModel(),
    getFilteredRowModel: getFilteredRowModel(),
    getExpandedRowModel: getExpandedRowModel(),
    onSortingChange: updaterOrValue => valueUpdater(updaterOrValue, sorting),
    onColumnFiltersChange: updaterOrValue => valueUpdater(updaterOrValue, columnFilters),
    onColumnVisibilityChange: updaterOrValue => valueUpdater(updaterOrValue, columnVisibility),
    onRowSelectionChange: updaterOrValue => valueUpdater(updaterOrValue, rowSelection),
    onExpandedChange: updaterOrValue => valueUpdater(updaterOrValue, expanded),
    state: {
        get sorting() { return sorting.value },
        get columnFilters() { return columnFilters.value },
        get columnVisibility() { return columnVisibility.value },
        get rowSelection() { return rowSelection.value },
        get expanded() { return expanded.value },
    },
})

const breadcrumbs = [
    {
        text: "Dashboard",
        link: route('dashboard'),
    },
    {
        text: "Comunicações",
    },
];
</script>

<template>
    <Head title="Comunicações"/>
    <AuthenticatedLayout :breadcrumbs="breadcrumbs">

            <div class="w-full">
                <div class="flex gap-2 items-center py-4">
                    <Input
                        class="max-w-sm"
                        placeholder="Filtra por Nº do Processo"
                        :model-value="table.getColumn('numeroprocessocommascara')?.getFilterValue()"
                        @update:model-value=" table.getColumn('numeroprocessocommascara')?.setFilterValue($event)"
                    />
                </div>
                <div class="rounded-lg border bg-card shadow-sm">
                    <Table>
                        <TableHeader>
                            <TableRow v-for="headerGroup in table.getHeaderGroups()" :key="headerGroup.id">
                                <TableHead v-for="header in headerGroup.headers" :key="header.id">
                                    <FlexRender v-if="!header.isPlaceholder" :render="header.column.columnDef.header" :props="header.getContext()" />
                                </TableHead>
                            </TableRow>
                        </TableHeader>
                        <TableBody>
                            <template v-if="table.getRowModel().rows?.length">
                                <template v-for="row in table.getRowModel().rows" :key="row.id">
                                    <TableRow :data-state="row.getIsSelected() && 'selected'">
                                        <TableCell v-for="cell in row.getVisibleCells()" :key="cell.id">
                                            <FlexRender :render="cell.column.columnDef.cell" :props="cell.getContext()" />
                                        </TableCell>
                                    </TableRow>
                                    <TableRow v-if="row.getIsExpanded()">
                                        <TableCell :colspan="row.getAllCells().length">
                                            {{ JSON.stringify(row.original) }}
                                        </TableCell>
                                    </TableRow>
                                </template>
                            </template>

                            <TableRow v-else>
                                <TableCell
                                    :colspan="columns.length"
                                    class="h-24 text-center"
                                >
                                    Sem resultados
                                </TableCell>
                            </TableRow>
                        </TableBody>
                    </Table>
                </div>

                <div class="flex items-center justify-end space-x-2 py-4">
                    <div class="flex-1 text-sm text-muted-foreground">
                        {{ table.getFilteredSelectedRowModel().rows.length }} of
                        {{ table.getFilteredRowModel().rows.length }} {{ table.getFilteredRowModel().rows.length > 1 ? 'registros selecionados': 'registro selecionado'}}
                    </div>
                    <div class="space-x-2">
                        <Button
                            variant="outline"
                            size="sm"
                            :disabled="!table.getCanPreviousPage()"
                            @click="table.previousPage()"
                        >
                            Anterior
                        </Button>
                        <Button
                            variant="outline"
                            size="sm"
                            :disabled="!table.getCanNextPage()"
                            @click="table.nextPage()"
                        >
                            Próximo
                        </Button>
                    </div>
                </div>
            </div>

    </AuthenticatedLayout>
</template>
