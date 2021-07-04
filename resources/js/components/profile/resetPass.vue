<template>
    <div>
        <div class="row">
            <!-- <router-link to="/employee" class="btn btn-primary"
                >Xem nhân viên
            </router-link>
            <p style="margin: 10px;"></p> -->
            <router-link to="/edit-profile" class="btn btn-primary"
                >Thông tin cá nhân
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
                                            Đổi mật khẩu
                                        </h1>
                                    </div>

                                    <form
                                        class="user"
                                        @submit.prevent="passwordInsert"
                                        enctype="multipart/form-data"
                                    >
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-md-12">
                                                    <input
                                                        type="password"
                                                        class="form-control"
                                                        id="exampleInputFirstName"
                                                        placeholder="Mật khẩu hiện tại"
                                                        v-model="
                                                            form.passwordnow
                                                        "
                                                    />
                                                    <small
                                                        class="text-danger"
                                                        v-if="
                                                            errors.passwordnow
                                                        "
                                                    >
                                                        {{
                                                            errors
                                                                .passwordnow[0]
                                                        }}
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
                                                        placeholder="Mật khẩu mới"
                                                        v-model="
                                                            form.passwordnew
                                                        "
                                                    />
                                                    <small
                                                        class="text-danger"
                                                        v-if="
                                                            errors.passwordnew
                                                        "
                                                    >
                                                        {{
                                                            errors
                                                                .passwordnew[0]
                                                        }}
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
                                                        placeholder="Xác nhận mật khẩu mới"
                                                        v-model="
                                                            form.passwordverify
                                                        "
                                                    />
                                                    <small
                                                        class="text-danger"
                                                        v-if="
                                                            errors.passwordverify
                                                        "
                                                    >
                                                        {{
                                                            errors
                                                                .passwordverify[0]
                                                        }}
                                                    </small>
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
                passwordnow: null,
                passwordnew: null,
                passwordverify: null
            },
            errors: {}
        };
    },

    methods: {
        passwordInsert() {
            axios
                .post("/api/auth/reset", this.form, {
                    headers: {
                        Authorization: "Bearer " + localStorage.getItem("token")
                    }
                })
                .then(res => {
                    if (res.status == 200)
                        Toast.fire({
                            icon: "success",
                            title: "Thay mật khẩu thành công!"
                        });
                    this.errors = {};
                    this.$router.push({ name: "reset-pass" });
                    // Notification.success();
                })
                .catch(error => {
                    if (error.response.status == 401) {
                        Toast.fire({
                            icon: "error",
                            title: "Mật khẩu hiện tại không đúng!"
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
