<template>
    <div>
        <div class="row">
            <router-link to="/position" class="btn btn-primary"
                >Xem chức vụ</router-link
            >
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
                                            Thêm chức vụ
                                        </h1>
                                    </div>

                                    <form
                                        class="user"
                                        @submit.prevent="positionInsert"
                                    >
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-md-12">
                                                    <input
                                                        type="text"
                                                        class="form-control"
                                                        id="exampleInputFirstName"
                                                        placeholder="Tên chức vụ mới"
                                                        v-model="
                                                            form.position_name
                                                        "
                                                    />
                                                    <small
                                                        class="text-danger"
                                                        v-if="
                                                            errors.position_name
                                                        "
                                                    >
                                                        {{
                                                            errors
                                                                .position_name[0]
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
                position_name: null
            },
            errors: {}
        };
    },

    methods: {
        positionInsert() {
            axios
                .post("/api/position", this.form)
                .then(() => {
                    this.$router.push({ name: "position" });
                    Notification.success();
                })
                .catch(error => (this.errors = error.response.data.errors));
        }
    }
};
</script>

<style type="text/css"></style>
