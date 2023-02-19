export default {
    getResource: state => state.resource,
    getLimit: state => state.limit,
    getDataFromState: state => state.dataTable,
    getLinks: state => state.links,
    getMeta: state => state.meta,
    getUpdateData: state => state.updateData,
    isModalOpen: state=>state.openModal,
    isUpdate:state=>state.isUpdate
}
