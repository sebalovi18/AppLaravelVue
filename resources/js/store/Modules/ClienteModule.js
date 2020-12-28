const ClienteModule = {
    namespaced: true,
    state: {
        clientes: [],
        error: null
    },
    actions: {
        //Clientes CRUD
        async getClientes({ state }) {
            await axios(`${window.location.origin}/api/clientes`, {
                method: "get",
                header: {
                    Accept: "application/json",
                    "Content-Type": "application/json"
                }
            })
                .then(res => {
                    if (res.status === 200) {
                        state.clientes = res.data;
                    }
                })
                .catch(err =>
                    console.error(
                        `Error de Aplicacion!!! : ${err.response.status}`
                    )
                );
        },
        async updateCliente(context, cliente) {
            await axios
                .put(
                    `${window.location.origin}/api/clientes/${cliente.id}`,
                    cliente
                )
                .then(res => {
                    if (res.status === 201) {
                        context.dispatch("getClientes");
                    }
                })
                .catch(err => {
                    console.error(`Error de Aplicacion!!! : ${err.response.status}`);
                });
        },
        async deleteCliente(context, cliente) {
            await axios
                .delete(`${window.location.origin}/api/clientes/${cliente.id}`)
                .then(res => {
                    if (res.status === 204) {
                        context.dispatch("getClientes");
                    }
                })
                .catch(err =>
                    console.error(
                        `Error de Aplicacion!!! : ${err.response.status}`
                    )
                );
        },
        async createCliente(context, cliente) {
            await axios
                .post(`${window.location.origin}/api/clientes`, cliente)
                .then(res => {
                    if (res.status === 201) {
                        context.dispatch("getClientes");
                    }
                })
                .catch(err => {
                    console.error(
                        `Error de Aplicacion!!! : ${err.response.status}`
                    );
                });
        }
        //////////////////////////////////////////////////////
    }
};

export default ClienteModule;
