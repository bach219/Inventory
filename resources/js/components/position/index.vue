<template>
    <div>
        <div class="row">
            <router-link to="/store-position" class="btn btn-primary"
                >Thêm chức vụ</router-link
            >
        </div>
        <br />
        <input
            type="text"
            v-model="searchTerm"
            class="form-control"
            style="width: 300px;"
            placeholder="Tìm kiếm"
        />

        <br />

        <div class="row">
            <div class="col-lg-12 mb-4">
                <!-- Simple Tables -->
                <div class="card">
                    <div
                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between"
                    >
                        <h6 class="m-0 font-weight-bold text-primary">
                            Danh sách chức vụ
                        </h6>
                    </div>
                    <div class="card-block table-border-style">
                        <div class="table-responsive">
                            <table class="table ">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Tên chức vụ</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr
                                        v-for="position in filtersearch"
                                        :key="position.id"
                                    >
                                        <td>{{ position.position_name }}</td>

                                        <td>
                                            <router-link
                                                :to="{
                                                    name: 'edit-position',
                                                    params: { id: position.id }
                                                }"
                                                class="btn btn-sm btn-primary"
                                                >Sửa</router-link
                                            >

                                            <a
                                                @click="
                                                    deleteposition(position.id)
                                                "
                                                class="btn btn-sm btn-danger"
                                                ><font color="#ffffff"
                                                    >Xóa</font
                                                ></a
                                            >
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
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
            categories: [],
            searchTerm: ""
        };
    },
    computed: {
        filtersearch() {
            return this.categories.filter(position => {
                return position.position_name.match(this.searchTerm);
            });
        }
    },

    methods: {
        allposition() {
            axios
                .get("/api/position/")
                .then(({ data }) => {
                    console.log(data);
                    this.categories = data;
                })
                .catch();
        },
        deleteposition(id) {
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
                        .delete("/api/position/" + id)
                        .then(() => {
                            this.categories = this.categories.filter(
                                position => {
                                    return position.id != id;
                                }
                            );
                        })
                        .catch(() => {
                            this.$router.push({ name: "position" });
                        });
                    Swal.fire("Đã xóa thành công!");
                }
            });
        }
    },
    created() {
        this.allposition();
    }
};
</script>

<style type="text/css">
#em_photo {
    height: 40px;
    width: 40px;
}
</style>
