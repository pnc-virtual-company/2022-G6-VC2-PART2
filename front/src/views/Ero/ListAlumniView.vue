<template>
  <div class="mt-[3.5rem] w-[80%] mx-auto">
    <div>
      <div class="flex justify-between items-center w-full m-auto">
        <div class="flex justify-between items-center m-auto w-full">
          <select
            v-model="filterBatch"
            id="bacthSelection"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 m-1 focus:border-blue-500 block p-2.5 w-full outline-none"
          >
            <option value="All">Choose a bacth</option>
            <option value="2007">2007</option>
            <option value="2008">2008</option>
            <option value="2009">2009</option>
            <option value="2010">2010</option>
            <option value="2011">2011</option>
            <option value="2012">2012</option>
            <option value="2013">2013</option>
            <option value="2014">2014</option>
            <option value="2015">2015</option>
            <option value="2016">2016</option>
            <option value="2017">2017</option>
            <option value="2018">2018</option>
            <option value="2019">2019</option>
            <option value="2020">2020</option>
            <option value="2021">2021</option>
            <option value="2022">2022</option>
            <option value="2023">2023</option>
          </select>
        </div>
        <select
          v-model="filterCompany"
          id="majorSelection"
          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 w-full outline-none"
        >
          <option value="All">Choose a company</option>
          <option value="pnc">PNC</option>
          <option value="cam">Cam Solution</option>
          <option value="other">Other</option>
        </select>
          <select
            v-model="filterMajor"
            id="majorSelection"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 w-full m-1 outline-none"
          >
            <option value="All">Choose a Major</option>
            <option value="web">Web</option>
            <option value="sna">SNA</option>
            <option value="other">DMO</option>
          </select>
        <div class="flex items-center w-[55%] m-1">
          <label
            for="default-search"
            class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-gray-300"
            >Search</label
          >
          <div class="relative w-full">
            <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none" >
              <svg
                aria-hidden="true"
                class="w-5 text-gray-500 dark:text-gray-400"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
                ></path>
              </svg>
            </div>
            <Search @update-keyword="updateKeyword" />
          </div>
        </div>
      </div>
      <div class="flex justify-between items-end mx-auto mt-3">
        <div class="rounded bg-slate-50 w-[30%] p-7 flex items-end">
          <div class="rounded-full w-14 h-14 ring-8 ring-gray-300 dark:ring-gray-500 flex justify-center items-center">
            {{totalCount}}
          </div>
          <h3 class="ml-3">Total</h3>
        </div>
        <div class="rounded bg-slate-50 w-[30%] p-7 flex items-end">
          <div
            class="rounded-full w-14 h-14 ring-8 ring-gray-300 dark:ring-gray-500 flex justify-center items-center"
          >
          {{paddingCount}}
          </div>
          <h3 class="ml-3">Padding</h3>
        </div>
        <div class="rounded bg-slate-50 w-[30%] p-7 flex items-end">
          <div class="rounded-full w-14 h-14 ring-8 ring-gray-300 dark:ring-gray-500 flex justify-center items-center"> {{approveCount}} </div>
          <h3 class="ml-3">Approved</h3>
        </div>
        <div>
          <button
            type="button"
            class="focus:outline-none text-white bg-blue-600 hover:bg-blue-500 font-medium rounded-lg text-sm px-5 py-2.5"
            @click="show = true"
          >
            INVITE
          </button>
        </div>
      </div>
    </div>
    <div class="mt-4 mx-auto bg-slate-50 rounded-lg p-2.5">
      <div class="mt-4 mx-auto bg-slate-50 rounded-lg p-2.5">
        <h1 class="text-3xl text-gray-900 dark:text-white ml-7">Alumni List</h1>
        <CardAlumni
          v-for="alumni of fitlerAlumni"
          :key="alumni"
          :alumni="alumni"
          @toDeleteAlumni="removeAlumni"
          @onClickProfile="onClickProfile"
        />
      </div>
      <div
        v-if="fitlerAlumni.length <= 0"
        class="flex flex-col items-center mt-8 mb-3"
      >
        <!-- <img class="w-32" src="./../../../assets/no_requests_found.png" alt="Image not found"> -->
        <h1 class="text-stone-500">Don't have alumni yet !!</h1>
      </div>
    </div>

    <section v-if="show" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full flex items-center z-50">
      <InvitAlumniForm
        @hideForm="hide"
        @CreateAndInviteAlumni="CreateAndInviteAlumni"
      />
    </section>
    <section v-if="isSpin" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full flex items-center z-10">
      <div class="grid m-auto">
        <fa
          icon="spinner"
          class="text-[5rem] m-auto animate-spin text-[#fff]"
        />
        <p class="text-[#fff] text-[2rem]">Sending email..</p>
      </div>
    </section>
    <section v-if="show" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full flex items-center">
      <InviteAlumniForm
        :isExisted="isexisted"
        @hideForm="hide"
        @CreateAndInviteAlumni="CreateAndInviteAlumni"
      />
    </section>
    <section v-if="showDetail" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full flex items-center z-50 pt-[5rem]">
        <AlumniDetail   @hideAlumniDetail="showDetail=false" :AlumniDetail="oneAlunmni" class="mb-3" /> 
    </section>
  </div>
</template>
<script>
import axios from "../../axios-http";
import CardAlumni from "../Ero/ListALumniCard.vue";
import InviteAlumniForm from "./InviteAlumniForm.vue";
import swal from "sweetalert2";
import Search from "../../components/search/SearchBar.vue";
import AlumniDetail from "./AlumniDetail.vue";

export default {
  components: { CardAlumni, InviteAlumniForm ,Search,AlumniDetail},
  data() {
    return {
      alumniData: [],
      show: false,
      isSpin: false,
      filterBatch: "All",
      filterCompany: "All",
      filterMajor: "All",
      keyword: "",
      isexisted: false,
      showDetail: false,
      oneAlunmni:[],
      paddingCount: 0,
      approveCount: 0,
      totalCount: 0,
    };
  },
  methods: {
    countUserStatus() {
      axios.get('user').then((res) => {
        this.paddingCount = res.data.filter(data=>(data.role == 'alumni' && data.status == 'padding')).length;
        this.totalCount = res.data.filter(data=>(data.role == 'alumni')).length;
        this.approveCount = res.data.filter(data=>(data.role == 'alumni' && data.status == 'approve')).length;
      })
    },
    getAlumni() {
      axios
        .get("alumni")
        .then((res) => {
          this.alumniData = res.data;
          console.log(this.alumniData);
          this.countUserStatus();
        })
        .catch((error) => {
          console.log(error);
        });
    },
    onClickProfile(status,Alumni){
        this.showDetail=status;
        this.oneAlunmni=Alumni
    },
    hide(value) {
      this.show = value;
    },

    CreateAndInviteAlumni(email) {
      this.isSpin = true;
      let passwords =
        "01234567890123456789012345678901234567890123456789123456789";
      let password_length = 8;
      let random_string = "";
      for (let i = 0; i < password_length; i++) {
        let rnum = Math.floor(Math.random() * passwords.length);
        random_string += passwords.substring(rnum, rnum + 1);
      }
      let user = {
        email: email,
        password: random_string,
        role: "alumni",
        status:'approve'
      };
      axios
        .post("user", user)
        .then(() => {
          this.show = false;
          this.isSpin = false;
          this.getAlumni();
        })
        .catch((error) => {
          this.isSpin = false;
          this.isexisted = true;
          console.log(error.response.data.message);
        });
    },
    updateKeyword(keyword) {
      this.keyword = keyword;
    },
    removeAlumni(userId) {
      swal
        .fire({
          title: "Are you sure to delete?",
          text: "You won't be able to revert this!",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#0062ff",
          cancelButtonColor: "#d33",
          confirmButtonText: "Yes",
        })
        .then((result) => {
          if (result.isConfirmed) {
            axios.delete("user/" + userId).then(() => {
              this.getAlumni();
            });
          }
        });
    },
  },
  computed: {
    fitlerAlumni() {
      let allAlumni = this.alumniData;
      if (this.keyword) {
        allAlumni = this.alumniData.filter((alumni) =>
          (alumni.user.firstName + " " + alumni.user.lastName)
            .toLowerCase()
            .includes(this.keyword.toLowerCase())
        );
      }
      if (this.filterBatch != "All") {
        console.log(this.filterBatch)
        allAlumni = allAlumni.filter(
          (alumni) =>
            alumni.batch.toLowerCase() == this.filterBatch.toLowerCase()
        );
      }
      if (this.filterCompany != "All") {
        allAlumni = allAlumni.filter((alumni) =>
          alumni.work_experience.some(
            (work) =>
              work.company.toLowerCase() === this.filterCompany.toLowerCase()
          )
        );
      }
      if (this.filterMajor != "All") {
        allAlumni = allAlumni.filter(
          (alumni) =>
            alumni.major.toLowerCase() == this.filterMajor.toLowerCase()
        );
      }
      return allAlumni;
    }
  },
  created() {
    this.getAlumni();
  },
};
</script>
