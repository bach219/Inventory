<template>
    <div>
        <!-- Container-fluid starts -->
        <div class="container-fluid">
            <div class="row">
                <!-- <div class="col-sm-1"></div> -->
                <div class="col-sm-10">
                    <!-- Authentication card start -->
                    <div
                        class="login-card card-block auth-body mr-auto ml-auto"
                    >
                        <form class="md-float-material" @submit.prevent="login">
                            <div class="text-center">
                                <img
                                    src="backend/assets/images/auth/logo-dark.png"
                                    alt="logo.png"
                                />
                            </div>
                            <div class="auth-box">
                                <div class="row m-b-20">
                                    <div class="col-md-12">
                                        <h3
                                            class="text-left txt-primary text-center"
                                        >
                                            Đăng nhập
                                        </h3>
                                    </div>
                                </div>
                                <hr />
                                <div class="input-group">
                                    <input
                                        type="email"
                                        class="form-control"
                                        id="exampleInputEmail"
                                        aria-describedby="emailHelp"
                                        placeholder="Địa chỉ email"
                                        v-model="form.email"
                                    />
                                </div>
                                <div class="input-group">
                                    <small
                                        class="text-danger md-line"
                                        v-if="errors.email"
                                    >
                                        {{ errors.email[0] }}
                                    </small>
                                </div>

                                <div class="input-group">
                                    <input
                                        type="password"
                                        class="form-control"
                                        id="exampleInputPassword"
                                        placeholder="Mật khẩu"
                                        v-model="form.password"
                                    />
                                </div>
                                <div class="input-group">
                                    <small
                                        class="text-danger md-line"
                                        v-if="errors.password"
                                    >
                                        {{ errors.password[0] }}
                                    </small>
                                </div>

                                <div class="row m-t-25 text-left">
                                    <div class="col-sm-7 col-xs-12">
                                        <div
                                            class="checkbox-fade fade-in-primary"
                                        ></div>
                                    </div>
                                    <div
                                        class="col-sm-5 col-xs-12 forgot-phone text-right"
                                    >
                                        <a
                                            href=""
                                            class="text-right f-w-600 text-inverse"
                                            ><router-link
                                                to="/forget"
                                                class="font-weight-bold small"
                                                >Quên mật khẩu</router-link
                                            ></a
                                        >
                                    </div>
                                </div>
                                <div class="row m-t-30">
                                    <div class="col-md-12">
                                        <button
                                            type="submit"
                                            class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20"
                                        >
                                            Đăng nhập
                                        </button>
                                    </div>
                                </div>
                                <hr />
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="text-center">
                                            <router-link
                                                to="/register"
                                                class="font-weight-bold small"
                                                >Tạo tài khoản mới</router-link
                                            >
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- end of form -->
                    </div>
                    <!-- Authentication card end -->
                </div>
                <div class="col-sm-2"></div>
                <!-- end of col-sm-12 -->
            </div>
            <!-- end of row -->
        </div>
        <!-- end of container-fluid -->
    </div>
</template>

<script type="text/javascript">
export default {
    created() {
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
            // let level = "warning";
            // let message = "message";

            // let errToastr = () => toastr.error("Oops! An error encountered");

            // axios
            //     .post("/api/push", { message, level })
            //     .then(r =>
            //         r.data.status
            //             ? Toast.fire({
            //                 icon: "error",
            //                 title: "Ok!"
            //             })
            //             : Toast.fire({
            //                 icon: "error",
            //                 title: "Oops! An error encountered!"
            //             })
            //     )
            //     .catch(errToastr);

            return new Promise((resolve, reject) => {
                axios
                    .post("/api/auth/login", this.form)
                    .then(res => {
                        resolve(res);
                        console.log(res);
                        User.responseAfterLogin(res);
                        Toast.fire({
                            icon: "success",
                            title: "Đăng nhập thành công!"
                        });

                        this.$router.push({ name: "home" });
                    })

                    .catch(error => {
                        reject(error);
                        this.errors = error.response.data.errors;
                        console.log(this.errors);
                        Toast.fire({
                            icon: "error",
                            title: "Email hoặc mật khẩu không đúng!"
                        });
                    })
                    .catch(
                        Toast.fire({
                            icon: "info",
                            title: "Đang xử lý..."
                        })
                    );
            });
        }
    }
};
</script>

<style type="text/css">
.page-wrapper {
    display: flex;
    justify-content: center;
}
.pcoded-main-container {
    margin-top: 0px;
    margin-bottom: 0px;
}
</style>
