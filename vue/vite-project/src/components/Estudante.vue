<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <h3 class="text-center text-dark mt-2">Laravel 10 Vue JS Vite CRUD ( Create Read Update and Delete)</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="card-header">
                    Add Record
                </div>
                <div class="card-body">
                    <form @submit.prevent="save">
                     
                    <div class="form-group">
                        <label>estudante name</label>
                        <input type="text" v-model="estudante.nome" class="form-control"  placeholder="estudante name">
                     
                    </div>
                    <div class="form-group">
                        <label>estudante Address</label>
                        <input type="text" v-model="estudante.endereco" class="form-control"  placeholder="estudante Address">
                     
                    </div>
                     
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" v-model="estudante.telefone" class="form-control"  placeholder="Phone">
                     
                    </div>
                     
                    <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
            <div class="col-md-8">
                <h2>estudante List</h2>
                    <table class="table table-dark">
                    <thead>
                        <tr>
                        <th scope="col">ID</th>
                        <th scope="col">estudante Name</th>
                        <th scope="col">Address</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="estudante in result" v-bind:key="estudante.id">
                             
                            <td>{{ estudante.id }}</td>
                            <td>{{ estudante.nome }}</td>
                            <td>{{ estudante.endereco }}</td>
                            <td>{{ estudante.telefone }}</td>
                            <td>
                                <button type="button" class="btn btn-warning" @click="edit(estudante)">Edit</button>
                                <button type="button" class="btn btn-danger"  @click="remove(estudante)">Delete</button>
                            </td>
                            </tr>
                         
                    </tbody>
                    </table>
            </div>
        </div>
    </div>    
</template>
<script>
import axios from 'axios';
  
export default {
    name: 'estudante',
    data () {
      return {
        result: {},
        estudante:{
                   id: '',
                   nome: '',
                   endereco: '',
                   telefone: ''
  
  
        }
      }
    },
    created() { 
        this.estudanteLoad();
    },
    mounted() {
          console.log("mounted() called.......");
    },
  
    methods: {
           estudanteLoad()
           {
                 var page = "http://127.0.0.1:8000/api/estudantes";
                 axios.get(page)
                  .then(
                      ({data})=>{
                        console.log(data);
                        this.result = data;
                      }
                  );
           },
            
           save()
           {
            if(this.estudante.id == '')
              {
                this.saveData();
              }
              else
              {
                this.updateData();
              }       
  
           },
           saveData()
           {
            axios.post("http://127.0.0.1:8000/api/cadastramento", this.estudante)
            .then(
              ({data})=>{
                alert("saved");
                this.estudanteLoad();
                this.estudante.nome = '';
                this.estudante.endereco = '',
                this.estudante.telefone = ''
                this.id = ''
              }
            )
  
           },
           edit(estudante)
           {
            this.estudante = estudante;
           },
           updateData()
           {
              var editrecords = 'http://127.0.0.1:8000/api/editar_estudante/'+ this.estudante.id;
              axios.put(editrecords, this.estudante)
              .then(
                ({data})=>{
                  this.estudante.nome = '';
                  this.estudante.endereco = '',
                  this.estudante.telefone = ''
                  this.id = ''
                  alert("Updated!!!");
                  this.estudanteLoad();
                }
              );
  
           },
  
           remove(estudante){
              var url = `http://127.0.0.1:8000/api/delecao/${estudante.id}`;
              // var url = 'http://127.0.0.1:8000/api/estudante/'+ estudante.id;
              axios.delete(url);
              alert("Deleted");
              this.estudanteLoad();
            }
      }
  }
  </script>