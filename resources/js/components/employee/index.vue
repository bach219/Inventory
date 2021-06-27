<template>
    <div>
        <div class="row">
            <router-link to="/store-employee" class="btn btn-primary"
                >Thêm nhân viên
            </router-link>
        </div>
        <br />
        <input
            type="text"
            v-model="searchTerm"
            class="form-control"
            style="width: 300px"
            placeholder="Tìm kiếm"
        />

        <br />

        <div class="row">
            <div class="col-lg-12 mb-4">
                <!-- Simple Tables -->
                <div class="card">
                    <div
                        class="
              card-header
              py-3
              d-flex
              flex-row
              align-items-center
              justify-content-between
            "
                    >
                        <h6 class="m-0 font-weight-bold text-primary">
                            Danh sách nhân viên
                        </h6>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th>Tên</th>
                                    <th>Ảnh</th>
                                    <th>SĐT</th>
                                    <th>Mức lương(giờ)</th>
                                    <th>Ngày bắt đầu làm</th>
                                    <th>Chức vụ</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr
                                    v-for="employee in filtersearch"
                                    :key="employee.id"
                                >
                                    <td>{{ employee.name }}</td>
                                    <td>
                                        <img
                                            :src="employee.photo"
                                            id="em_photo"
                                        />
                                    </td>
                                    <td>{{ employee.phone }}</td>
                                    <td>{{ employee.sallery }}</td>
                                    <td>{{ employee.joining_date }}</td>

                                    <td
                                        v-for="position in positions"
                                        :key="position.id"
                                        v-if="
                                            position.id == employee.position_id
                                        "
                                    >
                                        {{ position.position_name }}
                                    </td>
                                    <td>
                                        <router-link
                                            :to="{
                                                name: 'edit-employee',
                                                params: { id: employee.id }
                                            }"
                                            class="btn btn-sm btn-primary"
                                            >Sửa</router-link
                                        >

                                        <a
                                            @click="deleteEmployee(employee.id)"
                                            class="btn btn-sm btn-danger"
                                            ><font color="#ffffff">Xóa</font></a
                                        >
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer"></div>
                </div>
            </div>
        </div>
        <!--Row-->
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
            employees: [],
            positions: [],
            searchTerm: ""
        };
    },
    computed: {
        filtersearch() {
            return this.employees.filter(employee => {
                return employee.name.match(this.searchTerm);
            });
        }
    },

    methods: {
        allEmployee() {
            axios
                .get("/api/employee/")
                .then(({ data }) => (this.employees = data))
                .catch();
        },
        allPosition() {
            axios
                .get("/api/position/")
                .then(({ data }) => (this.positions = data))
                .catch();
        },
        deleteEmployee(id) {
            Swal.fire({
                title: "Xác nhận xóa?",

                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Xóa",
                cancelButtonText: "Hủy"
            }).then(result => {
                if (result.value) {
                    axios
                        .delete("/api/employee/" + id)
                        .then(() => {
                            this.employees = this.employees.filter(employee => {
                                return employee.id != id;
                            });
                        })
                        .catch(() => {
                            this.$router.push({ name: "employee" });
                        });
                    Swal.fire("Đã xóa");
                }
            });
        }
    },
    created() {
        this.allEmployee();
        this.allPosition();
    }
};
</script>

<style type="text/css">
#em_photo {
    height: 40px;
    width: 40px;
}
</style>
