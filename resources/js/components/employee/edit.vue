<template>
    <div>
        <div class="row">
            <router-link to="/employee" class="btn btn-primary"
                >Xem nhân viên
            </router-link>
            <p style="margin: 10px;"></p>
            <router-link to="/store-position" class="btn btn-primary"
                >Thêm chức vụ
            </router-link>
        </div>

        <div class="row justify-content-center">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="card shadow-sm my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="login-form">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">
                                            Chỉnh sửa thông tin nhân viên
                                        </h1>
                                    </div>

                                    <form
                                        class="user"
                                        @submit.prevent="employeeUpdate"
                                        enctype="multipart/form-data"
                                    >
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <input
                                                        type="text"
                                                        class="form-control"
                                                        id="exampleInputFirstName"
                                                        placeholder="Tên nhân viên"
                                                        v-model="form.name"
                                                    />
                                                    <small
                                                        class="text-danger"
                                                        v-if="errors.name"
                                                    >
                                                        {{ errors.name[0] }}
                                                    </small>
                                                </div>

                                                <div class="col-md-6">
                                                    <input
                                                        type="email"
                                                        class="form-control"
                                                        id="exampleInputFirstName"
                                                        placeholder="Địa chỉ email"
                                                        v-model="form.email"
                                                    />
                                                    <small
                                                        class="text-danger"
                                                        v-if="errors.email"
                                                    >
                                                        {{ errors.email[0] }}
                                                    </small>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <input
                                                        type="text"
                                                        class="form-control"
                                                        id="exampleInputFirstName"
                                                        placeholder="Địa chỉ"
                                                        v-model="form.address"
                                                    />
                                                    <small
                                                        class="text-danger"
                                                        v-if="errors.address"
                                                    >
                                                        {{ errors.address[0] }}
                                                    </small>
                                                </div>

                                                <div class="col-md-6">
                                                    <input
                                                        type="text"
                                                        class="form-control"
                                                        id="exampleInputFirstName"
                                                        placeholder="Mức lương"
                                                        v-model="form.sallery"
                                                    />
                                                    <small
                                                        class="text-danger"
                                                        v-if="errors.sallery"
                                                    >
                                                        {{ errors.sallery[0] }}
                                                    </small>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <input
                                                        type="date"
                                                        class="form-control"
                                                        id="exampleInputFirstName"
                                                        placeholder="Ngày bắt đầu làm việc"
                                                        v-model="
                                                            form.joining_date
                                                        "
                                                    />
                                                    <small
                                                        class="text-danger"
                                                        v-if="
                                                            errors.joining_date
                                                        "
                                                    >
                                                        {{
                                                            errors
                                                                .joining_date[0]
                                                        }}
                                                    </small>
                                                </div>

                                                <div class="col-md-6">
                                                    <input
                                                        type="password"
                                                        class="form-control"
                                                        id="exampleInputFirstName"
                                                        placeholder="Mật khẩu khi cấp tài khoản"
                                                        v-model="form.password"
                                                    />
                                                    <small
                                                        class="text-danger"
                                                        v-if="errors.password"
                                                    >
                                                        {{ errors.password[0] }}
                                                    </small>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <input
                                                        type="text"
                                                        class="form-control"
                                                        id="exampleInputFirstName"
                                                        placeholder="Số điện thoại"
                                                        v-model="form.phone"
                                                    />
                                                    <small
                                                        class="text-danger"
                                                        v-if="errors.phone"
                                                    >
                                                        {{ errors.phone[0] }}
                                                    </small>
                                                </div>
                                                <div class="col-md-6">
                                                    <select
                                                        class="form-control"
                                                        v-model="
                                                            form.position_id
                                                        "
                                                    >
                                                        <option
                                                            :value="position.id"
                                                            v-for="position in positions"
                                                            :key="position.id"
                                                            :selected="
                                                                position.id ===
                                                                    form.position_id
                                                            "
                                                            >{{
                                                                position.position_name
                                                            }}</option
                                                        >
                                                        <!-- <option
                                                            :value="position.id"
                                                            v-for="position in positions"
                                                            :key="position.id"
                                                            v-if="
                                                                position.id !=
                                                                    form.position_id
                                                            "
                                                        >
                                                            {{
                                                                position.position_name
                                                            }}
                                                        </option> -->
                                                    </select>
                                                    <small
                                                        class="text-danger"
                                                        v-if="errors.position"
                                                    >
                                                        {{ errors.position[0] }}
                                                    </small>
                                                </div>

                                                <div class="col-md-6"></div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <input
                                                        type="file"
                                                        class="custom-file-input"
                                                        id="customFile"
                                                        @change="onFileSelected"
                                                    />

                                                    <small
                                                        class="text-danger"
                                                        v-if="errors.photo"
                                                    >
                                                        {{ errors.photo[0] }}
                                                    </small>
                                                    <label
                                                        class="custom-file-label"
                                                        for="customFile"
                                                        >Chọn ảnh</label
                                                    >
                                                </div>

                                                <div class="col-md-6">
                                                    <img
                                                        :src="form.photo"
                                                        style="height: 40px; width: 40px"
                                                    />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <button
                                                type="submit"
                                                class="btn btn-primary btn-block"
                                            >
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
                joining_date: ""
            },
            positions: "",
            errors: {}
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
                reader.onload = event => {
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
                .catch(error => (this.errors = error.response.data.errors));
        }
    }
};
</script>

<style type="text/css"></style>
