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
                                            ĐĂNG KÝ
                                        </h1>
                                    </div>
                                    <form class="user" @submit.prevent="signup">
                                        <div class="form-group">
                                            <input
                                                type="text"
                                                class="form-control"
                                                id="exampleInputFirstName"
                                                placeholder="Họ tên"
                                                v-model="form.name"
                                            />
                                            <small
                                                class="text-danger"
                                                v-if="errors.name"
                                            >
                                                {{ errors.name[0] }}
                                            </small>
                                        </div>

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

                                        <div class="form-group">
                                            <input
                                                type="password"
                                                class="form-control"
                                                id="exampleInputPasswordRepeat"
                                                placeholder="Nhập lại mật khẩu"
                                                v-model="
                                                    form.password_confirmation
                                                "
                                            />
                                            <small
                                                class="text-danger"
                                                v-if="
                                                    errors.password_confirmation
                                                "
                                            >
                                                {{
                                                    errors
                                                        .password_confirmation[0]
                                                }}
                                            </small>
                                        </div>
                                        <div class="form-group">
                                            <button
                                                type="submit"
                                                class="btn btn-primary btn-block"
                                            >
                                                Đăng ký
                                            </button>
                                        </div>
                                    </form>
                                    <hr />
                                    <div class="text-center">
                                        <router-link
                                            to="/"
                                            class="font-weight-bold small"
                                            >Đã có tài khoản?</router-link
                                        >
                                    </div>
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

<style type="text/css"></style>
