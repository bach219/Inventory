<template>
    <div>
        <div class="row">
            <!-- <router-link to="/employee" class="btn btn-primary"
                >Xem nhân viên
            </router-link>
            <p style="margin: 10px;"></p> -->
            <router-link to="/reset-pass" class="btn btn-primary"
                >Đổi mật khẩu
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
                                            Thông tin quản lý
                                        </h1>
                                    </div>

                                    <form
                                        class="user"
                                        @submit.prevent="profileInsert"
                                        enctype="multipart/form-data"
                                    >
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-md-12">
                                                    <input
                                                        type="text"
                                                        class="form-control"
                                                        id="exampleInputFirstName"
                                                        placeholder="Tên quản lý"
                                                        v-model="form.name"
                                                    />
                                                    <small
                                                        class="text-danger"
                                                        v-if="errors.name"
                                                    >
                                                        {{ errors.name[0] }}
                                                    </small>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-md-12">
                                                    <input
                                                        type="email"
                                                        class="form-control"
                                                        id="exampleInputFirstEmail"
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
                                                <div class="col-md-12">
                                                    <input
                                                        type="text"
                                                        class="form-control"
                                                        id="exampleInputFirstAddress"
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
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-md-12">
                                                    <input
                                                        type="text"
                                                        class="form-control"
                                                        id="exampleInputFirstPhone"
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
    created() {
        axios
            .post(
                "/api/auth/me",
                {},
                {
                    headers: {
                        Authorization: "Bearer " + localStorage.getItem("token")
                    }
                }
            )
            .then(({ data }) => {
                console.log(data);
                this.form = data;
            })
            .catch(() => {
                localStorage.removeItem("token");
                localStorage.removeItem("user");
                Toast.fire({
                    icon: "success",
                    title: "Hết phiên đăng nhập!"
                });
                this.$router.push({ name: "/" });
            });
    },

    data() {
        return {
            form: {
                name: null,
                email: null,
                phone: null,
                address: null,
                photo: null
            },
            errors: {}
        };
    },

    methods: {
        onFileSelected(event) {
            let file = event.target.files[0];
            if (file.size > 1048770) {
                Notification.image_validation();
            } else {
                let reader = new FileReader();
                reader.onload = event => {
                    this.form.photo = event.target.result;
                    // console.log(event.target.result);
                };
                reader.readAsDataURL(file);
            }
        },
        profileInsert() {
            axios
                .post("/api/auth/profile", this.form, {
                    headers: {
                        Authorization: "Bearer " + localStorage.getItem("token")
                    }
                })
                .then(res => {
                    if (res.status == 200) {
                        Toast.fire({
                            icon: "success",
                            title: "Cập nhật dữ liệu thành công!"
                        });
                        this.errors = {};
                    }

                    this.$router.push({ name: "edit-profile" });
                })
                .catch(error => {
                    if (error.response.status != 200) {
                        Toast.fire({
                            icon: "error",
                            title: "Đã xảy ra lỗi!"
                        });
                        this.errors = {};
                    }

                    this.errors = error.response.data.errors;
                });
        }
    }
};
</script>

<style type="text/css"></style>
