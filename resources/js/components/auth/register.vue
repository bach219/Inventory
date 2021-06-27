<template id="login">
    <div class="p-fixed d-flex text-center">
        <!-- Container-fluid starts -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-10">
                    <!-- Authentication card start -->
                    <div
                        class="signup-card card-block auth-body mr-auto ml-auto"
                    >
                        <form
                            class="md-float-material user"
                            @submit.prevent="signup"
                        >
                            <div class="text-center">
                                <img
                                    src="backend/assets/images/auth/logo-dark.png"
                                    alt="logo.png"
                                />
                            </div>
                            <div class="auth-box">
                                <div class="row m-b-20">
                                    <div class="col-md-12">
                                        <h3 class="text-center txt-primary">
                                            Đăng ký
                                        </h3>
                                    </div>
                                </div>
                                <hr />
                                <div class="input-group">
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="exampleInputFirstName"
                                        placeholder="Họ tên"
                                        v-model="form.name"
                                    />
                                </div>
                                <div class="input-group">
                                    <small
                                        class="text-danger md-line"
                                        v-if="errors.name"
                                    >
                                        {{ errors.name[0] }}
                                    </small>
                                </div>

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

                                <div class="input-group">
                                    <input
                                        type="password"
                                        class="form-control"
                                        id="exampleInputPasswordRepeat"
                                        placeholder="Nhập lại mật khẩu"
                                        v-model="form.password_confirmation"
                                    />
                                </div>
                                <div class="input-group">
                                    <small
                                        class="text-danger md-line"
                                        v-if="errors.password_confirmation"
                                    >
                                        {{ errors.password_confirmation[0] }}
                                    </small>
                                </div>

                                <div class="row m-t-30">
                                    <div class="col-md-12">
                                        <button
                                            type="submit"
                                            class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20"
                                        >
                                            Đăng ký
                                        </button>
                                    </div>
                                </div>
                                <hr />
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="text-center">
                                            <router-link
                                                to="/"
                                                class="font-weight-bold small"
                                                >Đã có tài khoản</router-link
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
                name: null,
                email: null,
                password: null,
                password_confirmation: null
            },
            errors: {}
        };
    },
    methods: {
        signup() {
            return new Promise((resolve, reject) => {
                axios
                    .post("/api/auth/signup", this.form)
                    .then(res => {
                        resolve(res);
                        console.log(res);
                        User.responseAfterLogin(res);
                        Toast.fire({
                            icon: "success",
                            title: "Đăng ký tài khoản thành công!"
                        });
                        this.$router.push({ name: "home" });
                    })

                    .catch(error => {
                        reject(error);
                        this.errors = error.response.data.errors;
                        // console.log(error.response);
                        Toast.fire({
                            icon: "error",
                            title: "Đã xảy ra lỗi khi đăng ký!"
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
