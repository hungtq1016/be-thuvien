import axios from "axios"
const config = {
    headers: {
        Authorization: `Bearer ${localStorage.getItem('token-admin')}`,
    }
}
export default {
    async getData({ commit, getters }, payload) {
        await axios.get(`/api/${getters.getResource}?page=${payload.page}`, config)
            .then((response) => {
                commit('SET_TAGS', response.data.data)
            })
    },

    async destroyData({ getters, dispatch }, payload) {
        await axios.delete(`/api/${getters.getResource}/${payload.id}`, config)
        dispatch(`getData`, { page: payload.page })
    },

    async updateStatus({ getters, dispatch }, payload) {
        payload.status == 1 ? (payload.status = 0) : (payload.status = 1);
        await axios.put(`/api/${getters.getResource}/${payload.id}/update`, { status: payload.status }, config);
        dispatch(`getData`, { page: payload.page })
    },

    async getDataLabel({ commit, getters }) {
        console.log(getters.getResource);
        await axios.get(`/api/get-col-name/${getters.getResource}`, config)
            .then((response) => {
                console.log(response);
                commit('SET_LABEL', response.data)
            })
    }
}
