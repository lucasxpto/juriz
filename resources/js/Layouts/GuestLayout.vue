<template>
    <div class="w-full h-screen lg:flex lg:min-h-[600px] xl:min-h-[800px]">
        <div class="hidden lg:block lg:w-1/2 bg-muted bg-red-200">
            <img
                src="https://www.shadcn-vue.com/placeholder.svg"
                alt="Image"
                class="h-full w-full object-cover dark:brightness-[0.2] dark:grayscale"
            >
        </div>
        <div class="flex items-center justify-center py-12 lg:w-1/2">
            <slot/>
        </div>
    </div>
</template>
