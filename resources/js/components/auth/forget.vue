<template>
    <div>
        <div class="container-fluid">
            <div class="row">
                <!-- <div class="col-sm-1"></div> -->
                <div class="col-sm-10">
                    <!-- Authentication card start -->
                    <div
                        class="login-card card-block auth-body mr-auto ml-auto"
                    >
                        <form
                            class="md-float-material"
                            @submit.prevent="forget"
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
                                        <h3
                                            class="text-left txt-primary text-center"
                                        >
                                            Quên mật khẩu
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

                                <div class="row m-t-30">
                                    <div class="col-md-12">
                                        <button
                                            type="submit"
                                            class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20"
                                        >
                                            Lấy mật khẩu mới
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
                                                >Quay lại đăng nhập</router-link
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
                email: null
            },
            errors: {}
        };
    },
    methods: {
        forget() {
            return new Promise((resolve, reject) => {
                axios
                    .post("/api/forget", this.form)
                    .then(res => {
                        resolve(res);
                        console.log(res);
                        User.responseAfterLogin(res);
                        Toast.fire({
                            icon: "success",
                            title:
                                "Mật khẩu mới đã được gửi trong Email của bạn!"
                        });
                        this.$router.push({ name: "home" });
                    })

                    .catch(error => {
                        reject(error);
                        this.errors = error.response.data.errors;
                        console.log(this.errors);
                        Toast.fire({
                            icon: "error",
                            title: "Địa chỉ Email không tồn tại!"
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
