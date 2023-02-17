export default {
    getTags: state => state.tags,
    getDataFromState: state => state.dataTable,
    getResource: state => state.resource,
    getLabel: (state) => {
        return state.label.filter(
            (item) => !["created_at", "updated_at","status"].find((e) => e == item)
        );
    }

}
