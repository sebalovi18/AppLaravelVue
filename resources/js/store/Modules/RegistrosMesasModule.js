const RegistrosMesasModule = {
    namespaced:true,
    state:{
        registros:[],
        error:null
    },
    getters:{
        getRegistros(state){
            return state.registros;
        }
    },
    actions:{
        async getAllRegistrosMesasDb({state}){
            await axios.get(`${window.location.origin}/api/registro`)
            .then(res=>{
                state.registros = res.data;
            })
            .catch(err=>{
                state.registros = [];
                state.error = err.data;
            })
        },
        async setRegistroDb({state},registro){
            await axios.post(`${window.location.origin}/api/registro`,registro)
            .then(res=>{
                state.registros = res.data;
            })
            .catch(err=>{
                state.registros = [];
                state.error = err.data;
            })
        }
    }
}
export default RegistrosMesasModule;