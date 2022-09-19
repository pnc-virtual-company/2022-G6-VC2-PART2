<template>
    <div class="mt-10 block p-5 rounded-lg shadow-lg bg-white max-w-md m-auto">
      <form>
        <div
          class="w-full mb-10 flex justify-center py-3 bg-blue-500 text-white font-medium rounded"
        >
          REGISTER
        </div>
        <div class="grid grid-cols-2 gap-4">
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
        <div class="mb-6">
          <input
            type="email"
            class="w-full px-3 py-1.5 border rounded focus:border-blue-600 focus:outline-none"
            placeholder="Email address"
          />
        </div>
        <div class="mb-6">
          <input
            type="password"
            class="w-full px-3 py-1.5 border rounded focus:border-blue-600 focus:outline-none"
            placeholder="Password"
          />
        </div>
          <div class="mb-3 flex justify-between">
            <select
              class="px-2 py-1 text-sm border border-gray-300 rounded focus:text-gray-700 focus:border-blue-600"
            >
              <option selected>Gender</option>
              <option value="male">Male</option>
              <option value="male">Female</option>
            </select>
              <input
                type="radio"
                name="inlineRadioOptions"
                value="option1"
              />
              <label>ERO</label
              >
              <input
                type="radio"
                name="inlineRadioOptions"
                value="option2"
              />
              <label>ALUMNI</label
              >
        </div>
        <button
          type="submit"
          class="flex justify-center m-auto bg-blue-500 text-white w-[40%] py-2 border rounded"
        >
          CREATE
        </button>
      </form>
    </div>
  </template>
  
  <script>
  export default {};
  </script>
  
  <style></style>