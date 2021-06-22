  

<template>
  
  <div>


<br>
   <input type="text" v-model="searchTerm" class="form-control" style="width: 300px;" placeholder="Tìm kiếm">


<br>

   <div class="row">
            <div class="col-lg-12 mb-4">
              <!-- Simple Tables -->
              <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Danh sách nhóm món</h6>
                </div>
                <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th>Tên nhóm món</th>
                          <th> </th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="category in filtersearch" :key="category.id">
                        <td> {{ category.category_name }} </td>
                       
            <td>
   <router-link :to="{name: 'edit-category', params:{id:category.id}}" class="btn btn-sm btn-primary">Sửa</router-link>

 <a @click="deleteCategory(category.id)" class="btn btn-sm btn-danger"><font color="#ffffff">Xóa</font></a>
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
        categories:[],
        searchTerm:''
      }
    },
    computed:{
      filtersearch(){
      return this.categories.filter(category => {
         return category.category_name.match(this.searchTerm)
      }) 
      }
    },
 
  methods:{
    allCategory(){
      axios.get('/api/category/')
      .then(({data}) => (this.categories = data))
      .catch()
    },
  deleteCategory(id){
             Swal.fire({
              title: 'Xác nhận xóa?',
             
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Xóa'
            }).then((result) => {
              if (result.value) {
                axios.delete('/api/category/'+id)
               .then(() => {
                this.categories = this.categories.filter(category => {
                  return category.id != id
                })
               })
               .catch(() => {
                this.$router.push({name: 'category'})
               })
                Swal.fire(
                  'Đã xóa thành công!',
              
                 
                )
              }
            })

  } 

  },
  created(){
    this.allCategory();
  } 
  

  } 
</script>


<style type="text/css">
  #em_photo{
    height: 40px;
    width: 40px;
  }
</style>