
<template>
    <div class="container">
        <div class="row mt-5">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">

                <div class="card-tools text-right">
                    <button class="btn btn-success" data-toggle="modal" data-target="#addNew" @click="openModalWindow">Add Employee</button>
                </div>
              </div>
             
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <tbody>
                    <tr>
                        <th><input type="checkbox" width="30px" height="30px" id="customCheck"></th>
                        <th></th>
                        <th>Employee <i class="fa fa-arrow-up"></i></th>
                        <th>Salary <i class="fa fa-arrow-up"></i></th>
                        <th>Status <i class="fa fa-arrow-down text-success"></i></th>
                        <th>Manage</th>
                  </tr> 

                  <tr v-for="user in users" :key="user.id">
                    <td><input type="checkbox" width="30px" height="30px" :id="user.id"></td>
                    <td><img width="45px" height="45px" class="rounded-circle header-profile-user" :src="'https://themesbrand.com/veltrix/layouts/vertical/assets/images/users/user-'+user.id+'.jpg'" alt="Header Avatar"></td>
                    <td><strong>{{ user.name }}</strong><br>{{ user.role }}</td>
                    <td><strong>{{ user.salary }}</strong><br>{{ user.employment_type }}</td>
                    <td><strong>{{ user.employment_status }}</strong><br>{{ user.duration }}</td>
                    
                    <td>
                        <a href="#" data-id="user.id" @click="editModalWindow(user)">
                            <i class="fa fa-edit blue fa-2x"></i>
                        </a>
                        |
                        <a href="#" @click="deleteUser(user.id)">
                            <i class="fa fa-trash text-danger fa-2x"></i>
                        </a>

                    </td>
                  </tr>
                </tbody></table>
              </div>
            
              <div class="card-footer">
                 
              </div>
            </div>
           
          </div>
        </div>


            <div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="addNewLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">

                    <h5 v-show="!editMode" class="modal-title" id="addNewLabel">Add New Employee</h5>
                    <h5 v-show="editMode" class="modal-title" id="addNewLabel">Update Employee</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>

<form @submit.prevent="editMode ? updateUser() : createUser()">
<div class="modal-body">

     <div class="form-group">
        <input v-model="form.name" type="text" name="name"
            placeholder="Employee's Name"
            class="form-control" :class="{ 'is-invalid': form.errors.has('name') }">
        <has-error :form="form" field="name"></has-error>
    </div>

     <div class="form-group">
        <input v-model="form.role" type="text" name="role"
            placeholder="Role"
            class="form-control" :class="{ 'is-invalid': form.errors.has('role') }">
        <has-error :form="form" field="role"></has-error>
    </div>

    <div class="form-group">
        <input v-model="form.salary" type="text" name="salary"
            placeholder="Salary"
            class="form-control" :class="{ 'is-invalid': form.errors.has('salary') }">
        <has-error :form="form" field="salary"></has-error>
    </div>
    
    <div class="form-group">
        <select name="employment_type" v-model="form.employment_type" id="employment_type" class="form-control" :class="{ 'is-invalid': form.errors.has('employment_type') }">
            <option selected value="Full Time">Full Time</option>
            <option value="Part Time">Part Time</option>
        </select>
        <has-error :form="form" field="employment_type"></has-error>
    </div>

    <div class="form-group">
        <input v-model="form.employment_status" type="text" name="employment_status"
            placeholder="Employment Status"
            class="form-control" :class="{ 'is-invalid': form.errors.has('employment_status') }">
        <has-error :form="form" field="employment_status"></has-error>
    </div>

    <div class="form-group">
        <input v-model="form.duration" type="text" name="duration"
            placeholder="Duration"
            class="form-control" :class="{ 'is-invalid': form.errors.has('duration') }">
        <has-error :form="form" field="duration"></has-error>
    </div>

</div>
<div class="modal-footer">
    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
    <button v-show="editMode" type="submit" class="btn btn-primary">Update</button>
    <button v-show="!editMode" type="submit" class="btn btn-primary">Create</button>
</div>

</form>

                </div>
            </div>
            </div>
    </div>

</template>

<script>
    export default {
        data() {
            return {
                editMode: false,
                users: {},
                form: new Form({
                    id: '',
                    role: '',
                    name : '',
                    salary: '',
                    employment_type: '',
                    employment_status: '',
                    duration: '',

                })
            }
        },
        methods: {
        
        editModalWindow(user){
           this.form.clear();
           this.editMode = true
           this.form.reset();
           $('#addNew').modal('show');
           this.form.fill(user)
        },
        updateUser(){
           this.form.put('api/user/'+this.form.id)
               .then(()=>{

                   Toast.fire({
                      icon: 'success',
                      title: 'Employee updated successfully'
                    })

                    Fire.$emit('AfterCreatedUserLoadIt');

                    $('#addNew').modal('hide');
               })
               .catch(()=>{
                  console.log("Error.....")
               })
        },
        openModalWindow(){
           this.editMode = false
           this.form.reset();
           $('#addNew').modal('show');
        },

        loadUsers() {

        axios.get("api/user").then( data => (this.users = data.data));

          //pick data from controller and push it into users object

        },

        createUser(){

            this.$Progress.start()

            this.form.post('api/user')
                .then(() => {
                   
                    Fire.$emit('AfterCreatedUserLoadIt'); //custom events

                        Toast.fire({
                          icon: 'success',
                          title: 'Employee created successfully'
                        })

                        this.$Progress.finish()

                        $('#addNew').modal('hide');

                })
                .catch(() => {
                   console.log("Error......")
                })

     

            //this.loadUsers();
          },
          deleteUser(id) {
            Swal.fire({
              title: 'Are you sure?',
              text: "You won't be able to revert this!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                
              if (result.value) {
                //Send Request to server
                this.form.delete('api/user/'+id)
                    .then((response)=> {
                            Swal.fire(
                              'Deleted!',
                              'User deleted successfully',
                              'success'
                            )
                    this.loadUsers();

                    }).catch(() => {
                        Swal.fire({
                          icon: 'error',
                          title: 'Oops...',
                          text: 'Something went wrong!',
                          footer: '<a href>Why do I have this issue?</a>'
                        })
                    })
                }

            })
          }
        },

        created() { 
            this.loadUsers();

            Fire.$on('AfterCreatedUserLoadIt',()=>{ //custom events fire on
                this.loadUsers();
            });

        }
    }
</script> 