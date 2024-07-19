<form action="/courses" method="GET" class="my-3">
    <div class="input-group mb-3">
      @if(request('category'))
      <input
        name="category"
        type="hidden"
        value="{{ request('category') }}"
      />
      @endif
      @if(request('username'))
      <input
        name="username"
        type="hidden"
        value="{{ request('username') }}"
      />
      @endif
      <input
        name="searchCourse"
        type="text"
        value="{{ request('searchCourse') }}"
        autocomplete="false"
        class="form-control"
        placeholder="Search Courses..."
      />
      <button
        class="input-group-text bg-primary text-light"
        id="basic-addon2"
        type="submit"
      >
        Search
      </button>
    </div>
  </form>