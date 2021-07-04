<template>
  <div>
    <!-- <div class="row">
            <router-link to="/employee" class="btn btn-primary"
                >Xem nhân viên
            </router-link>
            <p style="margin: 10px;"></p>
            <router-link to="/store-position" class="btn btn-primary"
                >Thêm chức vụ
            </router-link>
        </div> -->

    <div class="row justify-content-center">
      <div class="col-xl-12 col-lg-12 col-md-12">
        <div class="card shadow-sm my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">
                <div class="login-form">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Thông tin cửa hàng</h1>
                  </div>

                  <form
                    class="user"
                    @submit.prevent="editStore"
                    enctype="multipart/form-data"
                  >
                    <div class="form-group">
                      <div class="form-row">
                        <div class="col-md-12">
                          <input
                            type="password"
                            class="form-control"
                            id="exampleInputFirstName"
                            placeholder="Tên cửa hàng"
                            v-model="form.password"
                          />
                          <small class="text-danger" v-if="errors.password">
                            {{ errors.password[0] }}
                          </small>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="form-row">
                        <div class="col-md-12">
                          <input
                            type="password"
                            class="form-control"
                            id="exampleInputFirstName"
                            placeholder="Địa chỉ"
                            v-model="form.password"
                          />
                          <small class="text-danger" v-if="errors.password">
                            {{ errors.password[0] }}
                          </small>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="form-row">
                        <div class="col-md-12">
                          <input
                            type="password"
                            class="form-control"
                            id="exampleInputFirstName"
                            placeholder="Số điện thoại cửa hàng"
                            v-model="form.password"
                          />
                          <small class="text-danger" v-if="errors.password">
                            {{ errors.password[0] }}
                          </small>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="form-row">
                        <div class="col-md-12">
                          <input
                            type="password"
                            class="form-control"
                            id="exampleInputFirstName"
                            placeholder="Vat"
                            v-model="form.password"
                          />
                          <small class="text-danger" v-if="errors.password">
                            {{ errors.password[0] }}
                          </small>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary btn-block">
                        Lưu
                      </button>
                    </div>
                  </form>
                  <hr />
                  <div class="text-center"></div>
                  <div class="text-center"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script type="text/javascript">
export default {
  created() {
    if (!User.loggedIn()) {
      this.$router.push({ name: "/" });
    }
  },

  data() {
    return {
      form: {
        name: "",
        email: "",
        phone: "",
        sallery: "",
        address: "",
        photo: "",
        newphoto: "",
        password: "",
        position_id: "",
        joining_date: "",
      },
      positions: "",
      errors: {},
    };
  },
  created() {
    let id = this.$route.params.id;
    axios
      .get("/api/employee/" + id)
      .then(({ data }) => (this.form = data))
      .catch(console.log("error"));
    axios
      .get("/api/position/")
      .then(({ data }) => (this.positions = data))
      .catch(console.log("error"));
  },
  // created() {
  //     axios
  //         .get("/api/position/")
  //         .then(({ data }) => (this.positions = data))
  //         .catch(console.log("error"));
  // },

  methods: {
    onFileSelected(event) {
      let file = event.target.files[0];
      if (file.size > 1048770) {
        Notification.image_validation();
      } else {
        let reader = new FileReader();
        reader.onload = (event) => {
          this.form.newphoto = event.target.result;
          this.form.photo = this.form.newphoto;
          console.log(event.target.result);
        };
        reader.readAsDataURL(file);
      }
    },
    employeeUpdate() {
      let id = this.$route.params.id;
      axios
        .patch("/api/employee/" + id, this.form)
        .then(() => {
          this.$router.push({ name: "employee" });
          Notification.success();
        })
        .catch((error) => (this.errors = error.response.data.errors));
    },
  },
};
</script>

<style type="text/css"></style>
