<template>
    <div class="bg-[#fff] mx-auto p-5 shadow-lg mt-3 rounded-md">
        <h1 class="text-2xl font-bold text-[#0062ff]">General Information</h1>
        <div class="text-left mt-3">
            <p class="mt-2 text-lg"> <fa class="text-[#0062ff] mr-[0.6rem]" icon="graduation-cap" />{{alumniData.batch}} {{alumniData.major}}</p>
            <p class="mt-2 text-lg"> <fa class="text-[#0062ff] mr-[0.8rem]" icon="transgender-alt" />{{alumniData.gender}}</p>
            <p class="mt-2 text-lg"> <fa class="text-[#0062ff] mr-[0.6rem]" icon="home-alt" />From {{alumniData.placeOfBirth}}</p>
            <p class="mt-2 text-lg"> <fa class="text-[#0062ff] ml-1 mr-3" icon="map-marker-alt" />Live in the{{alumniData.address}}</p>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            alumniData: Object,
        }
    }
</script>