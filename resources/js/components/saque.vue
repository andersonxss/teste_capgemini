<template>


        <form  class="form">
        <div class="form-group">
            <label for="con_saldo">Saque</label>
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
         if (this.con_saldo === null) {
        this.$swal('Campo saque deve ser preenchido.');
      } else {
        axios.post('/api/contas/saque', {
                con_user_id: this.id,
                con_saldo: this.con_saldo 
            }).then((response)=>{
                console.log(response);
              document.querySelector('#saldo b').textContent =  this.formatPrice(response.data.con_saldo);
              this.con_saldo = null;
               this.$swal('Saque realizado com sucesso!');
            })
            
            .catch((error) => {
                console.log(error);
                 this.$swal('Saque não realiado');
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
