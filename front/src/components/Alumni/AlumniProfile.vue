<template>
  <div class="w-[70%] m-auto shadow-2xl">
    <div class="text-end">
      <fa 
        :icon="['fas', 'user-pen']" 
        class="text-[1.5rem] cursor-pointer text-sky-500 m-2" 
        @click="isShow"
      />
    </div>
    <div class="flex justify-center border-green-300 w-[90%]">
      <div class="images w-[24%]">
        <img
          class="w-[70%] m-auto mb-[0.5rem]"
          src="../../assets/manager.jpg"
          alt=""
        />
        <strong>
          <!-- {{ alumniData.user.firstName }}
          {{ alumniData.user.lastName }} -->
        </strong>
      </div>
      <div class="detail flex justify-between text-start w-[70%]">
        <div>
          <div class="major p-[0.5rem]">
            <p><strong>Gender:</strong> {{ alumniData.gender }}</p>
          </div>
          <div class="generation p-[0.5rem]">
            <p><strong>Major: </strong> {{ alumniData.major }}</p>
          </div>
          <div class="position p-[0.5rem]">
            <p><strong>Address: </strong> {{ alumniData.address }}</p>
          </div>
        </div>
        <div>
          <div class="company p-[0.5rem]">
            <p><strong>Bacth: </strong>{{ alumniData.batch }}</p>
          </div>
          <div class="place p-[0.5rem]">
            <p><strong>Place of birth: </strong> BMC</p>
          </div>
          <div class="date p-[0.5rem]">
            <p><strong>Date of birth: </strong>{{ alumniData.dateOfBirth }}</p>
          </div>
        </div>
      </div>
    </div>
    <div
      class="socail flex justify-evenly items-center ml-[0%] bg-blue-100 w-[100%] h-[10vh]"
    >
      <div class="phone">
        <p><fa icon="phone" class="text-sky-500" /> {{ alumniData.phone }}</p>
      </div>
      <div class="email">
        <p>
          <fa :icon="['fas', 'envelope']" class="text-sky-500" />
          heakheng06@gmail.com
        </p>
      </div>
      <div class="linkedline">
        <p>
          <fa :icon="['fab', 'linkedin']" class="text-sky-500" />
          hengheak@gmail.com
        </p>
      </div>
      <div class="telegram">
        <p><fa :icon="['fab', 'telegram']" class="text-sky-500" /> heak heng</p>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
export default {
  components: {},
  data() {
    return {
      alumniData: {},
    };
  },
  // emits: ['edit'],
  methods: {
    getData() {
      axios.get("http://127.0.0.1:8000/api/alumni/1").then((res) => {
        this.alumniData = res.data;
        console.log(this.alumniData);
      });
    },
    isShow() {
      this.$emit('edit', true);
    }
  },
  mounted() {
    this.getData();
  },
};
</script>
