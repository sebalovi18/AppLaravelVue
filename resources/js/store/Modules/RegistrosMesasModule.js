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
    mutations:{
        setRegistro(state , registro){
            state.registros.push(registro);
        }
    },
    actions:{
        async setRegistroDb({state},registro){
            await axios.post(`${window.location.origin}/api/registro`,registro)
            .then(res=>{
                console.log(res);
            })
            .catch(err=>{
                state.error = err.data
            })
        }
    }
}
export default RegistrosMesasModule;