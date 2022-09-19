<template>
  <section class="h-screen">
      <div class="flex justify-center items-center p-[3%]">
        <div class="md:w-8/12 lg:w-6/12 md:mb-0">
          <img
            src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg"
            class="w-full"
            alt="Phone image"
          />
        </div>
        <div class="md:w-8/12 lg:w-5/12 lg:ml-20 p-[5%] px-5 mr-[10%] shadow-xl">
          <form>
            <div
              class="w-full mb-10 flex justify-center py-3 bg-blue-500 text-white font-medium"
            >
              REGISTER
            </div>
            <div class="grid grid-cols-2 gap-4 w-[90%] m-auto">
              <div class="mb-6">
                <input
                  type="text"
                  class="w-full px-3 py-1.5 border border-gray-300 rounded focus:border-blue-600 focus:outline-none"
                  placeholder="First name"
                />
              </div>
              <div class="mb-6">
                <input
                  type="text"
                  class="w-full px-3 py-1.5 border border-gray-300 rounded focus:border-blue-600 focus:outline-none"
                  placeholder="Last name"
                />
              </div>
            </div>
            <div class="mb-6 w-[90%] m-auto">
              <input
                type="email"
                class="w-full px-3 py-1.5 border rounded focus:border-blue-600 focus:outline-none"
                placeholder="Email address"
              />
            </div>
            <div class="mb-6 m-auto w-[90%]">
              <input
                type="password"
                class="w-full px-3 py-1.5 border rounded focus:border-blue-600 focus:outline-none"
                placeholder="Password"
              />
            </div>
            <div class="mb-3 flex justify-between m-auto w-[90%]">
              <select
                class="px-4 border rounded"
              >
                <option selected>Gender</option>
                <option value="male">Male</option>
                <option value="male">Female</option>
              </select>
              <button
              type="submit"
              class="flex justify-center m-auto bg-blue-500 text-white w-[40%] py-1 border rounded ml-[30%]"
            >
              CREATE
            </button>
            </div>
            
          </form>
        </div>
      </div>
  </section>
</template>

<script>
export default {};
</script>

<style></style>
