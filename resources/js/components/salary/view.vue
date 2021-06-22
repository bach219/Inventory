

<template>
  
  <div>

 <div class="row">
  <router-link to="/salary" class="btn btn-primary">Quay lại</router-link>
   
 </div>
<br>
   <input type="text" v-model="searchTerm" class="form-control" style="width: 300px;" placeholder="Tìm kiếm">


<br>

   <div class="row">
            <div class="col-lg-12 mb-4">
              <!-- Simple Tables -->
              <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">CHI TIẾT LƯƠNG</h6>
                </div>
                <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th>Tên nhân viên</th>
                        <th>Tháng</th>
                        <th>Lương</th>
                        <th>Ngày nhận lương</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="salary in filtersearch" :key="salary.id">
                        <td> {{ salary.name }} </td>
                        
                        <td>{{ salary.salary_month }}</td>
                        <td>{{ salary.amount }}</td>
                        <td>{{ salary.salary_date }}</td>
            <td>
   <router-link :to="{name: 'edit-salary', params:{id:salary.id}}" class="btn btn-sm btn-primary">Sửa</router-link>

  
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
    created(){
      if (!User.loggedIn()) {
        this.$router.push({name: '/'})
      }
    },
    data(){
      return{
        salaries:[],
        searchTerm:''
      }
    },
    computed:{
      filtersearch(){
      return this.salaries.filter(salary => {
         return salary.name.match(this.searchTerm)
      }) 
      }
    },
 
  methods:{
    viewSalary(){
     let id = this.$route.params.id
       axios.get('/api/salary/view/'+id)
       .then(({data}) => (this.salaries = data))
       .catch(error =>this.errors = error.response.data.errors)
     },
    
  },
  created(){
    this.viewSalary();
  } 
  

  } 
</script>


<style type="text/css">
  #em_photo{
    height: 40px;
    width: 40px;
  }
</style>