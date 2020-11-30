const ClienteModule = {
    namespaced : true,
    state: {
        clientes: [],
        error:null
    },
    actions: {
        //Clientes CRUD
        async getClientes({ state }) {
            await axios.get(`${window.location.origin}/api/clientes`)
            .then(res=>{state.clientes = res.data;})
            .catch(err=>console.error(`Error de Aplicacion!!! : ${err.response.data.message}`));
        },
        async updateCliente({ state }, cliente) {
            await axios.put(`${window.location.origin}/api/clientes/${cliente.id}`,cliente)
            .then(res=>{state.clientes = res.data;})
            .catch(err=>console.error(`Error de Aplicacion!!! : ${err.response.data.message}`));
        },
        async deleteCliente({ state }, cliente) {
            await axios.delete(`${window.location.origin}/api/clientes/${cliente.id}`)
            .then(res=>{state.clientes = res.data;})
            .catch(err=>console.error(`Error de Aplicacion!!! : ${err.response.data.message}`));
        },
        async createCliente({ state }, cliente) {
            await axios.post(`${window.location.origin}/api/clientes`,cliente)
            .then(res=>{state.clientes = res.data;})
            .catch(err=>{
                state.error = err.response.data;
                console.error(`Error de Aplicacion!!! : ${err.response.data.message}`)
            })
        }
        //////////////////////////////////////////////////////
    }
};

export default ClienteModule;
