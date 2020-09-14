<template>

<form  class="form">
<div class="form-group">
<label for="con_saldo">Depósito</label>
<input type="text" class="form-control" name="con_saldo" id="con_saldo"  v-model="con_saldo">
</div>
<button type="button" v-on:click="onSubmit" class="btn btn-success ml-auto">Enviar</button>
</form>
                
</template>


<script>

    export default {
        data() {
            return {
           con_saldo:null
            };
        },
        props   : ['id'],
  methods: {
    onSubmit(event) {
        console.log(this.con_saldo);
            if (this.con_saldo === null) {
        this.$swal('Campo Depósito deve ser preenchido.');
      } else {
        axios.post('/api/contas/deposito', {
                con_user_id: this.id,
                con_saldo: this.con_saldo 
            }).then((response)=>{
              document.querySelector('#saldo b').textContent = this.formatPrice(response.data.con_saldo);
              this.con_saldo = null;
              this.$swal('Depósito realizado com sucesso!');
            })
            
            .catch(() => {
                console.log('failed');
                 this.$swal('Depósito não realiado');
            });
        }
    },
     formatPrice(value) {
                        let val = (value/1).toFixed(2).replace('.', ',')
                        return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")
                    }
  }
};
    
</script>
