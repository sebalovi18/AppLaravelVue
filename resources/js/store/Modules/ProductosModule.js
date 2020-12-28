const ProductosModule = {
    namespaced: true,
    state: {
        productos: []
    },
    getters: {
        getProductos(state) {
            return state.productos;
        }
    },
    actions: {
        async getAllProductos({ state }) {
            await axios(`${window.location.origin}/api/productos`)
                .then(res => {
                    if (res.status === 200) {
                        state.productos = res.data;
                    }
                })
                .catch(err => console.log(err.data));
        },
        async createProducto(context, producto) {
            await axios
                .post(`${window.location.origin}/api/productos`, producto)
                .then(res => {
                    if (res.status === 201) {
                        context.dispatch("getAllProductos");
                    }
                })
                .catch(err => console.log(err.data));
        },
        async updateProducto(context, producto) {
            await axios
                .put(
                    `${window.location.origin}/api/productos/${producto.id}`,
                    producto
                )
                .then(res => {
                    if (res.status === 201) {
                        context.dispatch("getAllProductos");
                    }
                })
                .catch(err => console.log(err.data));
        },
        async deleteProducto(context, producto) {
            await axios
                .delete(
                    `${window.location.origin}/api/productos/${producto.id}`
                )
                .then(res => {
                    if (res.status === 204) {
                        context.dispatch("getAllProductos");
                    }
                })
                .catch(err => console.log(err.data));
        }
    }
};
export default ProductosModule;
