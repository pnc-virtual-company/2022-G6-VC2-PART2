<template>
  <div
    class="w-[75%] m-auto shadow-2xl border-[1px] border-slate-200 p-[30px] cursor-pointer bg-[#ffffffaf] mb-[20px] rounded-md"
  >
    <div class="flex justify-end">
      <div
        class="bg-[#34B3F1] w-[50px] h-[50px] flex justify-center items-center shadow-indigo-500/40 rounded-full"
      >
      <!--================== option content create form ============= -->
        <svg
          @click="showForm('create')"
          xmlns="http://www.w3.org/2000/svg"
          fill="none"
          viewBox="0 0 24 24"
          stroke-width="1.5"
          stroke="currentColor"
          class="w-10 h-10 text-[#fff]"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            d="M12 4.5v15m7.5-7.5h-15"
          />
        </svg>
      </div>
    </div>
    <div v-for:="workExperience in workExperiences" class="border-b-[2px] border-gray-400 p-[10px] flex justify-center">
      <div class="w-[83%] ml-[3%]">
        <div>
          <p class="text-[1.5rem]">
            <strong>Position : </strong>{{ workExperience.position }}
          </p>
          <div class="ml-[8%]">
            <p class="mt-[15px] text-[1.2rem]">
              <strong>Company  : </strong>{{ workExperience.company }}
            </p>
            <p class="mt-[14px] text-[1.2rem]">
              <strong>Start work : </strong>{{ workExperience.start_year }}
            </p>
            <p class="mt-[14px] text-[1.2rem]">
              <strong>End work : </strong>{{ workExperience.end_year }}
            </p>
          </div>
        </div>
      </div>
      <div class="w-[15%] flex justify-end">
        <ul class="absolute float-right pa-5 flex text-left mr-10">
        <li class="p-3 rounded-full shadow-lg">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke-width="1.5"
            stroke="currentColor"
            class="w-5 h-5"
             @click="deleteExperience(workExperience.id)" 
          >
            <fa icon="trash-alt" class="text-red-500" />
          </svg>
        </li>
      <!--==================== Edit alumni experience ================= -->
        <li class="p-3 rounded-full ml-3 shadow-lg">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke-width="1.5"
            stroke="currentColor"
            class="w-5 h-5"
            @click="showForm('edit', workExperiences)"
          >
            <fa icon="pen" class="text-[#34B3F1] text-dark-500 m-5" />
          </svg>
        </li>
        </ul>
      </div>
    </div>
  </div>
</template>

<script>
import Swal from 'sweetalert2'
export default {
  props: {
    workExperiences: [],
  },
  emits: ['show','deleteExperience'],
  data() {
    return {
      show: false,
    };
  },

  methods:{
  //===================== show  form functions =================
    showForm(type, experience) {
      this.$emit('show', true, type, experience);
    },
  //===================== delete experience one by one ===========
    deleteExperience(id) {
      Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
          this.$emit('deleteExperience', id);
        }
      })
    },
  },
  }
</script>

<style ></style>
