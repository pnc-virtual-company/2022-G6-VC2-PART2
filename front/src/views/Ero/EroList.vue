<template>
  <div class="bg-[#fff] w-[60%] m-auto p-5 rounded-lg shadow-xl">
    <div
      class="flex justify-between font-bold text-center text-[#0062ff] text-2xl"
    >
      Ero List
      <fa
        icon="plus"
        class="w-[1rem] h-[1rem] text-white bg-[gray] p-2 rounded-full"
      />
    </div>
    <div class="m-auto w-[100%] flex justify-end"></div>
    <div class="m-auto w-[100%]" v-for:="ero in eros">
      <div
        class="shadow-xl bg-[#eee] mt-4 py-5 px-10 rounded-md border-l-4 border-l-blue-600"
      >
        <div class="flex justify-between">
          <div>
            Name
            <p class="font-medium text-lg">
              {{ ero.user.firstName }} {{ ero.user.lastName }}
            </p>
          </div>
          <div>
            Email
            <p class="font-medium text-lg">{{ ero.user.email }}</p>
          </div>
          <div>
            <fa
              icon="trash-alt"
              class="fa fa-trash text-[#e04] p-2 text-[1rem] rounded-full shadow-lg bg-[#ddd]"
            />
            <!--==================== Edit alumni experience ================= -->
            <fa
              icon="pencil"
              class="fa fa-pencil text-[#0062ff] text-[1rem] p-2 rounded-full ml-3 shadow-lg bg-[#ddd]"
            />
          </div>
        </div>
        <div class="flex justify-end">
          <fa @click="show = !show" :icon="!show ? 'angle-down' : 'angle-up'" />
        </div>
        <div v-show="show" class="flex justify-between">
          <div>
            Gender
            <p class="font-medium text-lg">{{ ero.gender }}</p>
          </div>
          <div class="">
            Phone
            <p class="font-medium text-lg">{{ ero.phone }}</p>
          </div>
          <div>
            Telegram
            <p class="font-medium text-lg">{{ ero.telegram }}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
export default {
  data() {
    return {
      eros: [],
      show: false,
    };
  },
  methods: {
    //=====================getdata  form functions =================
    getData() {
      axios.get("http://127.0.0.1:8000/api/ero").then((res) => {
        console.log(res.data);
        this.eros = res.data;
      });
    },
  },
  created() {
    this.getData();
  },
};
</script>
