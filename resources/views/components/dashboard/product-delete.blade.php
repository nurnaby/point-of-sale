<div class="modal animated zoomIn" id="delete-modal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center">
                <h3 class=" mt-3 text-warning">Delete !</h3>
                <p class="mb-3">Once delete, you can't get it back.</p>
                <input id="deleteID" />
                <input id="deleteFilePath" />
            </div>
            <div class="modal-footer justify-content-end">
                <div>
                    <button type="button" id="delete-modal-close" class="btn btn-secondary"
                        data-bs-dismiss="modal">Cancel</button>
                    <button onclick="itemDelete()" id="confirmDelete" class="btn btn-danger">Delete</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    async function itemDelete() {
        let id = document.getElementById('deleteID').value;
        let deleteFilePath = document.getElementById('deleteFilePath').value;
        // alert(id);
        document.getElementById('delete-modal-close').click();

        showLoader();
        let res = await axios.post("/delete-product", {
            id: id,
            file_path: deleteFilePath
        })

        hideLoader();
        if (res.data = 1) {
            successToast('Request completed');
            await getList();

        } else {
            errorToast('Request Fail');
        }


    }
</script>
