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
            await axios(`${window.location.origin}/api/registro`)
                .then(res => {
                    if (res.status === 200) {
                        state.registros = res.data;
                    }
                })
                .catch(err => {
                    state.registros = [];
                    console.log(err);
                });
        },
        async setNuevoRegistroDb(context, registro) {
            await axios
                .post(`${window.location.origin}/api/registro`, registro)
                .then(res => {
                    if (res.status === 201) {
                        context.dispatch('getAllRegistrosMesasDb');
                    }
                })
                .catch(err => {
                    state.registros = [];
                    state.error = err.data;
                });
        },
        async updateRegistroDb(context, registro) {
            await axios
                .put(
                    `${window.location.origin}/api/registro/${registro.id}`,
                    registro
                )
                .then(res => {
                    if (res.status === 201) {
                        context.dispatch('getAllRegistrosMesasDb');
                    }
                })
                .catch(err => {
                    state.registros = [];
                    state.error = err.data;
                });
        },
        async borrarRegistroDb(context, registro) {
            await axios
                .delete(`${window.location.origin}/api/registro/${registro}`)
                .then(res => {
                    if (res.status === 204) {
                        context.dispatch('getAllRegistrosMesasDb');
                    }
                })
                .catch(err => {
                    state.registros = [];
                    state.error = err.data;
                });
        }
    }
};
export default RegistrosMesasModule;
