<template>
  <div class="shadow-xl bg-[#eee] mt-4 py-5 px-10 rounded-md border-l-4 border-l-blue-600">
    <div class="flex justify-between">
      <div>Name<p class="font-medium text-lg">{{ ero.user.firstName }} {{ ero.user.lastName }}</p></div>
      <div> Email <p class="font-medium text-lg">{{ ero.user.email }}</p></div>
      <div>
        <fa icon="trash-alt" class="fa fa-trash text-[#e04] p-2 text-[1rem] rounded-full shadow-lg bg-[#ddd]" @click="onDelete(ero.user.id,ero.id)"/>
      </div>
    </div>
    <div class="flex justify-end">
      <fa class="cursor-pointer" @click="show = !show" :icon="!show ? 'angle-down' : 'angle-up'" />
    </div>
    <div v-show="show" class="flex justify-between mt-5">
      <div class='text-sm'> Gender <p class="text-md">{{ ero.gender }}</p></div>
      <div class="text-sm">Phone <p class="text-md">{{ ero.phone }}</p> </div>
      <div class="text-sm"> Telegram<p class="text-md">{{ ero.telegram }}</p></div>
    </div>
  </div>
</template>

<script>
import Swal from "sweetalert2";
export default {
  props: {
    ero: Object,
  },
  data() {
    return {
      show: false,
    };
  },
  methods:{
    onDelete(userId,eroId){
      Swal.fire({
        title: 'Are you sure?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#0062ff',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, sure'
      }).then((result) => {
        if (result.isConfirmed) {
          this.$emit('deleteEro',userId,eroId)
        }
      })
  }
  }
};
</script>
