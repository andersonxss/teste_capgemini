<template>
    <div class="container">
     


          <ul class="list-itens">
        <li>
             <router-link :to="{ name: 'home' }">Home</router-link> 
             <router-link :to="{ name: 'deposito' }">Deposito</router-link> 
             <router-link :to="{ name: 'saque' }">Saque</router-link> 
        
        </li>
    </ul>

        <div class="container">
              <div class="card card-home">
                    <div class="card-header">
                        <div class="nome">
                           
                        </div>
                    <div class="saldo" id="saldo">
                        Saldo: <b>{{formatPrice(saldo)}} </b>
                    </div>   
                      
                    </div>
                      
                    <div class="dados_pessoais">
                        <span>{{nome}}</span>
                       <div class="dados-conta">
                           <span>Agência: {{agencia}}</span>
                           <span>Conta: {{conta}}</span>
                       </div>
                    </div>

                    <div class="card-body">
                        <router-view :id="this.id"></router-view>
                    </div>
                </div>
           
        </div>
    </div>
</template>
<script>
import axios from 'axios';


export default {
    data() {
        return {
            loading: false,
            saldo: null,
            nome: null,
            agencia: null,
            conta: null,
        };
    },
     props   : ['id'],
    created() {
    
        this.fetchData();
    },
    methods: {
       
        fetchData() {
            this.error = this.users = null;
            this.loading = true;
            axios
                .get(`/api/contas/dados/${this.id}`)
                .then(response => {
                    this.saldo = response.data.con_saldo;
                    this.nome = response.data.name;
                    this.agencia = response.data.con_agencia;
                    this.conta = response.data.con_conta;
                    console.log(response);
                });
        },
        formatPrice(value) {
                        let val = (value/1).toFixed(2).replace('.', ',')
                        return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")
                    }
    }
}
</script>

