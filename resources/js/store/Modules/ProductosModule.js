import Axios from "axios";

const ProductosModule = {
    namespaced : true,
    state : {
        productos : [],
    },
    getters : {
        getProductos(state)
        {
            return state.productos;
        }
    },
    actions: {
        async getAllProductos({state})
        {
            await axios.get(`${window.location.origin}/api/productos`)
                .then(res=>state.productos = res.data.data)
                .catch(err=>console.log(err.data))
        },
        async createProducto({state} , producto)
        {
            await axios.post(`${window.location.origin}/api/productos` , producto)
                .then(res=>state.productos = res.data.data)
                .catch(err=>console.log(err.data))
        },
        async updateProducto({state} , producto)
        {
            await axios.put(`${window.location.origin}/api/productos/${producto.id}` , producto)
                .then(res=>state.productos = res.data.data)
                .catch(err=>console.log(err.data))
        },
        async deleteProducto({state} , producto)
        {
            await axios.delete(`${window.location.origin}/api/productos/${producto.id}`)
                .then(res=>state.productos = res.data.data)
                .catch(err=>console.log(err.data))
        }
    }
}
export default ProductosModule;