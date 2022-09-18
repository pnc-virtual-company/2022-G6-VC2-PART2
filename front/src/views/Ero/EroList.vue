<template>
  <div class="shadow-xl bg-[#eee] mt-4 py-5 px-10 rounded-md border-l-4 border-l-blue-600">
    <div class="flex justify-between">
      <div>
        Name
        <p class="font-medium text-lg">{{ ero.user.firstName }} {{ ero.user.lastName }}</p>
      </div>
      <div>
        Email
        <p class="font-medium text-lg">{{ ero.user.email }}</p>
      </div>
      <div>
        <fa icon="trash-alt" class="fa fa-trash text-[#e04] p-2 text-[1rem] rounded-full shadow-lg bg-[#ddd]"/>
        <fa icon="pencil" class="fa fa-pencil text-[#0062ff] text-[1rem] p-2 rounded-full ml-3 shadow-lg bg-[#ddd]"/>
      </div>
    </div>
    <div class="flex justify-end">
      <fa class="cursor-pointer" @click="show = !show" :icon="!show ? 'angle-down' : 'angle-up'" />
    </div>
    <div v-show="show" class="flex justify-between">
      <div>
        Gender
        <p class="font-medium text-lg">{{ ero.gender }}</p>
      </div>
      <div >
        Phone
        <p class="font-medium text-lg">{{ ero.phone }}</p>
      </div>
      <div>
        Telegram
        <p class="font-medium text-lg">{{ ero.telegram }}</p>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    ero: Object,
  },
  data() {
    return {
      show: false,
    };
  },
};
</script>
