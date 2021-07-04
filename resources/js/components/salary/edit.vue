<template>
    <div>
        <div class="row">
            <router-link to="/salary" class="btn btn-primary"
                >Quay lại
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
                                            Chỉnh sửa thông tin lương
                                        </h1>
                                    </div>

                                    <form
                                        class="user"
                                        @submit.prevent="SalaryUpdate"
                                    >
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <label
                                                        for="exampleFormControlSelect1"
                                                        ><b
                                                            >Tên nhân viên</b
                                                        ></label
                                                    >
                                                    <input
                                                        type="text"
                                                        class="form-control"
                                                        id="exampleInputFirstName"
                                                        placeholder=""
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
                                                    <label
                                                        for="exampleFormControlSelect1"
                                                        ><b>Email</b></label
                                                    >
                                                    <input
                                                        type="email"
                                                        class="form-control"
                                                        id="exampleInputFirstName"
                                                        placeholder=""
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
                                                    <label
                                                        for="exampleFormControlSelect1"
                                                        ><b>Tháng</b></label
                                                    >

                                                    <select
                                                        class="form-control"
                                                        id="exampleFormControlSelect1"
                                                        v-model="
                                                            form.salary_month
                                                        "
                                                    >
                                                        <option value="Tháng 1">
                                                            Tháng 1
                                                        </option>
                                                        <option value="Tháng 2">
                                                            Tháng 2
                                                        </option>
                                                        <option value="Tháng 3">
                                                            Tháng 3
                                                        </option>
                                                        <option value="Tháng 4">
                                                            Tháng 4
                                                        </option>
                                                        <option value="Tháng 5">
                                                            Tháng 5
                                                        </option>
                                                        <option value="Tháng 6">
                                                            Tháng 6
                                                        </option>
                                                        <option value="Tháng 7">
                                                            Tháng 7
                                                        </option>
                                                        <option value="Tháng 8">
                                                            Tháng 8
                                                        </option>
                                                        <option value="Tháng 9">
                                                            Tháng 9
                                                        </option>
                                                        <option
                                                            value="Tháng 10"
                                                        >
                                                            Tháng 10
                                                        </option>
                                                        <option
                                                            value="Tháng 11"
                                                        >
                                                            Tháng 11
                                                        </option>
                                                        <option
                                                            value="Tháng 12"
                                                        >
                                                            Tháng 12</option
                                                        >
                                                    </select>
                                                    <small
                                                        class="text-danger"
                                                        v-if="
                                                            errors.salary_month
                                                        "
                                                    >
                                                        {{
                                                            errors
                                                                .salary_month[0]
                                                        }}
                                                    </small>
                                                </div>

                                                <input
                                                    type="hidden"
                                                    v-model="form.employee_id"
                                                />

                                                <div class="col-md-6">
                                                    <label
                                                        for="exampleFormControlSelect1"
                                                        ><b>Mức lương</b></label
                                                    >
                                                    <input
                                                        type="text"
                                                        class="form-control"
                                                        id="exampleInputFirstName"
                                                        placeholder=""
                                                        v-model="form.amount"
                                                    />
                                                    <small
                                                        class="text-danger"
                                                        v-if="errors.amount"
                                                    >
                                                        {{ errors.amount[0] }}
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
                name: "",
                email: "",
                salary_month: "",
                amount: "",
                employee_id: ""
            },
            errors: {}
        };
    },
    created() {
        let id = this.$route.params.id;
        axios
            .get("/api/edit/salary/" + id)
            .then(({ data }) => (this.form = data))
            .catch(console.log("error"));
    },

    methods: {
        SalaryUpdate() {
            let id = this.$route.params.id;
            axios
                .post("/api/salary/update/" + id, this.form)
                .then(() => {
                    this.$router.push({ name: "salary" });
                    Notification.success();
                })
                .catch(error => (this.errors = error.response.data.errors));
        }
    }
};
</script>

<style type="text/css"></style>
