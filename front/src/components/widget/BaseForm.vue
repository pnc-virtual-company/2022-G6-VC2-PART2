<template>
    <div class="w-2/5 shadow-lg shadow-indigo-500/40 m-8 rounded-lg">
        <header class="font-medium rounded-t-lg px-7 py-3 text-2xl text-left">
            <slot name="header"></slot>
        </header>
        <body class="px-8 py-5">
            <slot name="form"></slot>
        </body>
    </div>
</template>