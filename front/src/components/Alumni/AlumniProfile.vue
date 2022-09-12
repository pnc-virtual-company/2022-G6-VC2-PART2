<template>
    <div class="w-[75%] m-auto shadow-2xl mt-[5%] bg-[rgba(245, 245, 245, 0.67)] border-[1px] border-slate-200" >
    <HelloWorld />
    <div class="text-end w-[97%] ">
        <fa :icon="['fas', 'user-pen']" class="text-[2rem] text-sky-500 m-2 shadow-lg shadow-indigo-500/40 p-[5px] cursor-pointer" />
    </div>
    <div class="home flex justify-center border-green-300 w-[90%]">
      
      <div class="image w-[24%] h-[45vh] text-center">
        <img v-if="previewImage != null" :src="previewImage"  class="w-[70%] h-[60%] m-auto mb-[20px] shadow-2xl border-cyan-400 border-4" alt=""/>
        <img
        v-if="previewImage == null"
        class="w-[70%] h-[60%] m-auto mb-[20px] shadow-2xl border-cyan-400 border-4"
        src="../../assets/boyUser.jpg"
        alt="" 
        />
        <img
          v-if="alumniData.gender=='Female' && alumniData.profile == null && previewImage == null"
          class="w-[70%] h-[60%] m-auto mb-[20px] shadow-2xl border-cyan-400 border-4"
          src="../../assets/girlUser.png"
          alt=""
        />
        <img
          v-if="alumniData.gender=='Male' && alumniData.profile == null && previewImage == null"
          class="w-[70%] h-[60%] m-auto mb-[20px] shadow-2xl border-cyan-400 border-4"
          src="../../assets/boyUser.jpg"
          alt=""
        />
        <div class="bg-[#fcfcfc60] w-[11%] flex justify-center absolute z-1 ml-[35px] mt-[-50px] p-[3px] text-white text-bold">
          <label for="imageFile">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 015.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 00-1.134-.175 2.31 2.31 0 01-1.64-1.055l-.822-1.316a2.192 2.192 0 00-1.736-1.039 48.774 48.774 0 00-5.232 0 2.192 2.192 0 00-1.736 1.039l-.821 1.316z" />
              <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12.75a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zM18.75 10.5h.008v.008h-.008V10.5z" />
            </svg>
          </label>
        </div>
        <input type="file" @change="uploadImage" hidden id="imageFile">
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
</template>

<script>
// @ is an alias to /src
import axios from "axios";
export default {
  components: {},
  data() {
    return {
      alumniData: {},
      previewImage:null,  
      profile:""     
    };
  },
  methods: {
    uploadImage(e){
      this.profile=e.target.files[0]
      this.previewImage = URL.createObjectURL(this.profile);
      let newAlumni = new FormData();
      newAlumni.append("profile", this.profile);
        axios.put("profile/1" , newAlumni).then(() => {
          console.log(newAlumni);
        })
    },
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
