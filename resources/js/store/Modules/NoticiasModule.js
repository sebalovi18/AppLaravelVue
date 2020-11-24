const Noticias = {
    namespaced: true,
    state: {
        noticiasjson:{}
    },
    actions: {
        async setNoticias({state}) {
            await axios(`${window.location.origin}/api/noticias`)
                .then(resp => {
                    state.noticiasjson = resp.data;
                })
                .catch(err => {
                    console.error(err);
                });
        }
    }
};

export default Noticias;
