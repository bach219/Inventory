<template>
    <div>
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Thống kê</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <router-link to="/">Trang chủ</router-link>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    Thống kê
                </li>
            </ol>
        </div>

        <div class="row mb-3">
            <!-- Earnings (Monthly) Card Example -->
            <!-- <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-uppercase mb-1">
                  Doanh thu hôm nay
                </div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">
                  $ {{ todaysell }}
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-calendar fa-2x text-primary"></i>
              </div>
            </div>
          </div>
        </div>
      </div> -->
            <!-- Earnings (Annual) Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div
                                    class="text-xs font-weight-bold text-uppercase mb-1"
                                >
                                    Thu nhập hôm nay
                                </div>
                                <div
                                    class="h5 mb-0 font-weight-bold text-gray-800"
                                >
                                    {{ income }} đ
                                </div>
                                <!-- <div class="mt-2 mb-0 text-muted text-xs">
                        <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 12%</span>
                        <span>Doanh thu 1 năm</span>
                      </div> -->
                            </div>
                            <div class="col-auto">
                                <i
                                    class="fas fa-shopping-cart fa-2x text-success"
                                ></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- New User Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div
                                    class="text-xs font-weight-bold text-uppercase mb-1"
                                >
                                    Hoàn trả
                                </div>
                                <div
                                    class="h5 mb-0 mr-3 font-weight-bold text-gray-800"
                                >
                                    {{ due }} đ
                                </div>
                                <!-- <div class="mt-2 mb-0 text-muted text-xs">
                  <span class="text-success mr-2"
                    ><i class="fas fa-arrow-up"></i> 20.4%</span
                  >
                  <span>Since last month</span>
                </div> -->
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-2x text-info"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Pending Requests Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div
                                    class="text-xs font-weight-bold text-uppercase mb-1"
                                >
                                    Chi phí hôm nay
                                </div>
                                <div
                                    class="h5 mb-0 font-weight-bold text-gray-800"
                                >
                                    {{ expense }} đ
                                </div>
                                <!-- <div class="mt-2 mb-0 text-muted text-xs">
                  <span class="text-danger mr-2"
                    ><i class="fas fa-arrow-down"></i> 1.10%</span
                  >
                  <span>Chi phí hôm qua</span>
                </div> -->
                            </div>
                            <div class="col-auto">
                                <i
                                    class="fas fa-comments fa-2x text-warning"
                                ></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

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
                            Sản phẩm hết hàng
                        </h6>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th>Tên</th>
                                    <th>Mã món</th>
                                    <th>Ảnh</th>

                                    <th>Giá mua vào</th>
                                    <th>Trạng thái</th>
                                    <th>Số lượng</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr
                                    v-for="product in products"
                                    :key="product.id"
                                >
                                    <td>{{ product.product_name }}</td>
                                    <td>{{ product.product_code }}</td>
                                    <td>
                                        <img
                                            :src="product.image"
                                            id="em_photo"
                                        />
                                    </td>

                                    <td>{{ product.buying_price }}</td>
                                    <td v-if="product.product_quantity >= 1">
                                        <span class="badge badge-success"
                                            >Còn hàng
                                        </span>
                                    </td>
                                    <td v-else>
                                        <span class="badge badge-danger"
                                            >Stock Out
                                        </span>
                                    </td>
                                    <td>{{ product.product_quantity }}</td>
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
        // console.log(localStorage.getItem("user"));
        // checkLogin();
        // nameAdmin = localStorage.getItem("user");
        if (!User.loggedIn()) {
            this.$router.push({ name: "/" });
        }
    },

    data() {
        return {
            todaysell: "",
            income: "",
            due: "",
            expense: "",
            products: "",
            nameAdmin: ""
        };
    },
    mounted() {
        this.TodaySell();
        this.TodayIncome();
        this.TodayDue();
        this.TodayExpense();
        this.StockOut();
    },
    methods: {
        checkLogin() {
            axios
                .post(
                    "/api/auth/me",
                    {},
                    {
                        headers: {
                            Authorization:
                                "Bearer " + localStorage.getItem("token")
                        }
                    }
                )
                .then(({ data }) => {
                    console.log(data);
                })
                .catch(() => {
                    localStorage.removeItem("token");
                    localStorage.removeItem("user");
                    Toast.fire({
                        icon: "success",
                        title: "Đã đăng xuất!"
                    });
                    this.$router.push({ name: "/" });
                });
        },
        TodaySell() {
            axios
                .get("/api/today/sell")
                .then(({ data }) => (this.todaysell = data))
                .catch();
        },
        TodayIncome() {
            axios
                .get("/api/today/income")
                .then(({ data }) => (this.income = data))
                .catch();
        },
        TodayDue() {
            axios
                .get("/api/today/due")
                .then(({ data }) => (this.due = data))
                .catch();
        },
        TodayExpense() {
            axios
                .get("/api/today/expense")
                .then(({ data }) => (this.expense = data))
                .catch();
        },

        StockOut() {
            axios
                .get("/api/today/stockout")
                .then(({ data }) => (this.products = data))
                .catch();
        }
    }
};
</script>

<style type="text/css"></style>
