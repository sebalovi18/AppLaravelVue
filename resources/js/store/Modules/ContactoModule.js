const ContactoModule = {
    namespaced : true,
    state:{
        response : null,
        error : null,
    },
    actions:{
        async automaticFormResponse({state} , formContacto)
        {
            await axios.post(`${window.location.origin}/api/contacto` , formContacto)
            .then((res) => {
                state.response = res
            }).catch((err) => {
                state.error = err
            });
        }
    },
}
export default ContactoModule;