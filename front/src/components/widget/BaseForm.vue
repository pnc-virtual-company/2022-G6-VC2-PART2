<template>
    <div class="w-2/5 shadow-lg shadow-indigo-500/40 m-8 rounded-lg">
        <header class="bg-[#1da1f2] text-white font-medium rounded-t-lg p-3 text-2xl text-center">
            <slot name="header"></slot>
        </header>
        <body class="px-8 py-5">
            <slot name="form"></slot>
        </body>
    </div>
</template>