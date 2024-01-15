<div class="modal fade" id="update-Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Customer</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="update-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label class="form-label">Customer Name *</label>
                                <input type="text" class="form-control" id="customerNameUpdate">
                                <input id="updateID" />
                            </div>
                            <div class="col-12 p-1">
                                <label class="form-label">Customer Email *</label>
                                <input type="text" class="form-control" id="customerEmailUpdate">
                            </div>
                            <div class="col-12 p-1">
                                <label class="form-label">Customer Mobile Number *</label>
                                <input type="text" class="form-control" id="customerMobileUpdate">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="update-modal-close" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button onclick="Update()" id="save-btn" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<script>
    async function CustomerByID(id) {
        document.getElementById('updateID').value = id;
        showLoader();
        let res = await axios.post("/customer-by-id", {
            id: id
        })
        hideLoader();
        document.getElementById('customerNameUpdate').value = res.data['name'];
        document.getElementById('customerEmailUpdate').value = res.data['email'];
        document.getElementById('customerMobileUpdate').value = res.data['mobile'];
    }


    async function Update() {
        let customerName = document.getElementById('customerNameUpdate').value;
        let customerEmail = document.getElementById('customerEmailUpdate').value;
        let customerMobile = document.getElementById('customerMobileUpdate').value;
        let updateID = document.getElementById('updateID').value;
        if (customerName.length === 0) {
            errorToast("Customer Required !")
        } else if (customerEmail.length === 0) {
            errorToast("Customer Email Required !")
        } else if (customerMobile.length === 0) {
            errorToast("Customer mobile Required !")
        } else {
            document.getElementById('update-modal-close').click();

            showLoader();

            let res = await axios.post("/update-customer", {
                name: customerName,
                email: customerEmail,
                mobile: customerMobile,
                id: updateID
            })

            hideLoader();

            if (res.status === 200 && res.data === 1) {

                successToast('Request completed');

                document.getElementById("update-form").reset();

                await getList();
            } else {
                errorToast("Request fail !")
            }


        }
    }
</script>
