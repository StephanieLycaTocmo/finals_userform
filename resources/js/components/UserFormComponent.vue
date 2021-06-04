<template>
    <div>
        <h1>List of Users</h1>
        <table class="table table-hover">
            <thead>
                <th>Last Name</th>
                <th>First Name</th>
                <th>Phone</th>
                <th>Email</th>
            </thead>
    
        <tbody>
            <tr v-for="(item, index) in userList" :key="item.id">
                <td>{{ item.last_name }}</td>
                <td>{{ item.first_name }}</td>
                <td>{{ item.phone }}</td>
                <td>{{ item.email }}</td>
                <td>
                    <button class="btn btn-secondary btn-sm" @click="edit(item)"><i class="fa fa-edit"></i></button>
                    <button class="btn btn-danger btn-sm" @click="remove(item,index)"><i class="fa fa-trash"></i></button>
                </td>
            </tr>
        </tbody>
            
        <tfoot>
            <tr>
                <td>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Input Last Name" v-model="form.last_name">
                    </div>
                </td>
                <td>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Input First Name" v-model="form.first_name">
                    </div>
                </td>
             
                <td>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Input Phone" v-model="form.phone">
                    </div>
                </td>
                <td>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Input Email" v-model="form.email">
                    </div>
                </td>
                <td>
                    <div class="form-group">
                        <button class="btn btn-primary btn-sm" @click="submit"><i class="fa fa-plus"></i></button>
                    </div>
                </td>
            </tr>
        </tfoot>
        </table>
        
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Edit Form</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Last Name</label>
                        <input type="text" class="form-control" placeholder="Input Last Name" v-model="formEdit.last_name">
                    </div>
                    <div class="form-group">
                        <label for="">First Name</label>
                        <input type="text" class="form-control" placeholder="Input First Name" v-model="formEdit.first_name">
                    </div>
                   
                     <div class="form-group">
                        <label for="">Phone</label>
                        <input type="text" class="form-control" placeholder="Input Phone" v-model="formEdit.phone">
                    </div>
                     <div class="form-group">
                        <label for="">Email</label>
                        <input type="text" class="form-control" placeholder="Input Email" v-model="formEdit.email">
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" @click="save()">Save changes</button>
                </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['user'],
    data() {
        return {
            userList: this.user,
            form: {
                last_name: null,
                first_name: null,
                phone: null,
                email: null
            },
            formEdit: {
                last_name: null,
                first_name: null,  
                phone: null,
                email: null
            },
        }
    },
    methods: {
        submit() {
            const vm = this;
            axios.post('/user_form', this.form)
            .then(function (response) {
                vm.userList.push(response.data.data);
                vm.form.last_name = null
                vm.form.first_name = null
                vm.form.phone = null
                vm.form.email = null
            })
            .catch(error => {
    console.log(error.response)
});
            
        },
        remove(item,index) {
            const vm = this;
            axios.delete(`/user_form/${item.id}`)
            .then(function (response) {
               vm.userList.splice(index,1)
            })
            .catch(function (error) {
                console.log(error)
            });
        },
        edit(item) {
            console.log(item)
            this.formEdit.last_name = item.last_name;
            this.formEdit.first_name = item.first_name;
            this.formEdit.phone = item.phone;
            this.formEdit.email = item.email;
            this.selectedId = item.id
            $('#editModal').modal('show');

        },
        save() {
            const vm = this;
            axios.put(`/user_form/${vm.selectedId}`, this.formEdit)
            .then(function (response) {
                alert('User has been sucessfully saved')
                location.reload();
            })
            .catch(function (error) {
                console.log(error)
            });
        }
    }
}
</script>
