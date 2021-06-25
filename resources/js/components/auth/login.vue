<template>
    <div>
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card shadow-sm my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="login-form">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">
                                            ĐĂNG NHẬP
                                        </h1>
                                    </div>
                                    <form class="user" @submit.prevent="login">
                                        <div class="form-group">
                                            <input
                                                type="email"
                                                class="form-control"
                                                id="exampleInputEmail"
                                                aria-describedby="emailHelp"
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
                                        <div class="form-group">
                                            <input
                                                type="password"
                                                class="form-control"
                                                id="exampleInputPassword"
                                                placeholder="Mật khẩu"
                                                v-model="form.password"
                                            />
                                            <small
                                                class="text-danger"
                                                v-if="errors.password"
                                            >
                                                {{ errors.password[0] }}
                                            </small>
                                        </div>
                                        <!-- <div class="form-group">
                                            <div
                                                class="custom-control custom-checkbox small"
                                                style="line-height: 1.5rem;"
                                            >
                                                <input
                                                    type="checkbox"
                                                    class="custom-control-input"
                                                    id="customCheck"
                                                />
                                                <label
                                                    class="custom-control-label"
                                                    for="customCheck"
                                                    >Lưu đăng nhập</label
                                                >
                                            </div>
                                        </div> -->
                                        <div class="form-group">
                                            <button
                                                type="submit"
                                                class="btn btn-primary btn-block"
                                            >
                                                Đăng nhập
                                            </button>
                                        </div>
                                        <hr />
                                    </form>
                                    <hr />
                                    <div class="text-center">
                                        <router-link
                                            to="/register"
                                            class="font-weight-bold small"
                                            >Tạo tài khoản mới</router-link
                                        >
                                    </div>
                                    <div class="text-center">
                                        <router-link
                                            to="/forget"
                                            class="font-weight-bold small"
                                            >Quên mật khẩu</router-link
                                        >
                                    </div>
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
        // let level = "info";
        // let message = "message";

        // // let errToastr = () => toastr.error("Oops! An error encountered");

        // axios
        //     .post("/api/push", { message, level })
        //     .then(r =>
        //         r.data.status
        //             ? toastr.success("Log dispatch successful")
        //             : toastr.error("Oops! An error encountered")
        //     )
        //     .catch(errToastr);

        if (User.loggedIn()) {
            this.$router.push({ name: "home" });
        }
    },

    data() {
        return {
            form: {
                email: null,
                password: null
            },
            errors: {},
            errorAlert: 0
        };
    },
    methods: {
        login() {
            let level = "info";
            let message = "message";

            let errToastr = () => toastr.error("Oops! An error encountered");

            axios
                .post("/api/push", { message, level })
                .then(r =>
                    r.data.status
                        ? toastr.success("Log dispatch successful")
                        : toastr.error("Oops! An error encountered")
                )
                .catch(errToastr);

            // return new Promise((resolve, reject) => {
            //     axios
            //         .post("/api/auth/login", this.form)
            //         .then(res => {
            //             resolve(res);
            //             console.log(res);
            //             User.responseAfterLogin(res);
            //             Toast.fire({
            //                 icon: "success",
            //                 title: "Đăng nhập thành công!"
            //             });
            //             this.$router.push({ name: "home" });
            //         })

            //         .catch(error => {
            //             reject(error);
            //             this.errors = error.response.data.errors;
            //             Toast.fire({
            //                 icon: "error",
            //                 title: "Email hoặc mật khẩu không đúng!"
            //             });
            //         })
            //         .catch(
            //             Toast.fire({
            //                 icon: "info",
            //                 title: "Đang xử lý..."
            //             })
            //         );
            // });
        }
    }
};
</script>

<style type="text/css"></style>
