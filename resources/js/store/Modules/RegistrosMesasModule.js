const RegistrosMesasModule = {
    namespaced: true,
    state: {
        registros: [],
        error: null
    },
    getters: {
        getRegistros(state) {
            return state.registros;
        }
    },
    actions: {
        async getAllRegistrosMesasDb({ state }) {
            await axios
                .get(`${window.location.origin}/api/registro`)
                .then(res => {
                    state.registros = res.data;
                })
                .catch(err => {
                    state.registros = [];
                    state.error = err.data;
                });
        },
        async setNuevoRegistroDb({ state }, registro) {
            await axios
                .post(`${window.location.origin}/api/registro`, registro)
                .then(res => {
                    state.registros = res.data;
                })
                .catch(err => {
                    state.registros = [];
                    state.error = err.data;
                });
        },
        async updateRegistroDb({ state }, registro) {
            await axios
                .put(`${window.location.origin}/api/registro/${registro.id}` , registro)
                .then(res => {
                    console.log(res);
                    state.registros = res.data;
                })
                .catch(err => {
                    state.registros = [];
                    state.error = err.data;
                });
        },
        async borrarRegistroDb({ state }, registro) {
            await axios
                .delete(`${window.location.origin}/api/registro/${registro}`)
                .then(res => {
                    state.registros = res.data;
                })
                .catch(err => {
                    state.registros = [];
                    state.error = err.data;
                });
        }
    }
};
export default RegistrosMesasModule;
