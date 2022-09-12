<template>
  <div class="w-[75%] m-auto shadow-2xl mt-[4%] bg-[rgba(245, 245, 245, 0.67)] border-[1px] border-slate-200 bg-[#ffffffaf]" >
    <div class="text-end w-[99%] ">
        <fa :icon="['fas', 'user-pen']" class="text-[2rem] text-sky-500 m-2 shadow-lg shadow-indigo-500/40 p-[5px] cursor-pointer" />
    </div>
    <div class="home flex justify-center border-green-300 w-[90%]">
      <div class="image w-[24%] h-[45vh] text-center">
        <img
          v-if="alumniData.gender=='Male'"
          class="w-[70%] h-[60%] m-auto mb-[20px] shadow-2xl border-cyan-400 border-4"
          src="../../assets/boyUser.jpg"
          alt=""
        />
        <img
          v-if="alumniData.gender=='Female'"
          class="w-[70%] h-[60%] m-auto mb-[20px] shadow-2xl border-cyan-400 border-4"
          src="../../assets/girlUser.jpg"
          alt=""
        />
        <strong class="text-[2rem]">{{alumniData.user.firstName + ' '+alumniData.user.lastName}}</strong>
      </div>
      <div class="detail flex justify-between mt-5 text-start w-[70%]">
        <div>
          <div class="major p-[0.5rem] text-[1.2rem]">
            <p><strong>Gender:</strong> {{alumniData.gender}}</p>
          </div>
          <div class="generation p-[0.5rem] text-[1.2rem]">
            <p><strong>Major: </strong>{{alumniData.major}}</p>
          </div>
          <div class="position p-[0.5rem] text-[1.2rem]">
            <p> <strong>Address: </strong>{{alumniData.address}}</p>
          </div>
        </div>
        <div>
          <div class="company p-[0.5rem] text-[1.2rem]">
            <p> <strong>Bacth: </strong> {{alumniData.batch}}</p>
          </div>
          <div class="place p-[0.5rem] text-[1.2rem]">
            <p><strong>Place of birth: </strong>{{alumniData.placeOfBirth}} </p>
          </div>
          <div class="date p-[0.5rem] text-[1.2rem]">
            <p> <strong>Date of birth: </strong>{{alumniData.dateOfBirth}}</p>
          </div>
        </div>
      </div>
    </div>
    <div
      class="socail flex justify-evenly items-center ml-[0%] bg-teal-200 w-[100%] h-[10vh]">
      <div>
        <p> <fa icon="phone" class="text-sky-500 text-2xl" /> 0887872301</p>
      </div>
      <div>
        <p> <fa :icon="['fas', 'envelope']" class="text-sky-500 text-2xl" /> heakheng06@gmail.com</p>
      </div>
      <div>
        <p> <fa :icon="['fab', 'linkedin']" class="text-sky-500 text-2xl" /> hengheak@gmail.com</p>
      </div>
      <div>
        <p> <fa :icon="['fab', 'telegram']" class="text-sky-500 text-2xl" /> heak heng</p>
      </div>
    </div>
  </div>
  <h1 class=" font-bold text-center m-[20px] underline text-[1.5rem] text-[#0062ff]">WORK EXPERIENCE</h1>
  <WorkExperienceVue
    :alumniExperience = "alumniData.work_experience"
  />
</template>

<script>
// @ is an alias to /src
import axios from "axios";
import WorkExperienceVue from "@/components/Alumni/WorkExperience.vue";
export default {
  components: {
    WorkExperienceVue
  },
  data() {
    return {
      alumniData:{},
    };
  },
  methods: {
    getData() {
      axios.get("http://127.0.0.1:8000/api/alumni/1").then((res) => {
        this.alumniData = res.data;
        console.log(this.alumniData);
      });
    },
  },
  created() {
    this.getData();
  },
};
</script>
