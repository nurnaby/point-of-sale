<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Customer</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="save-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label class="form-label">Product Category *</label>
                                <select type ="text" class="form-select" name="brand_id" id="productCategory">
                                    <option value="">Select Category</option>




                                </select>
                            </div>
                            <div class="col-12 p-1">
                                <label class="form-label">Product Name *</label>
                                <input type="text" class="form-control" id="customerName">
                            </div>
                            <div class="col-12 p-1">
                                <label class="form-label">Price *</label>
                                <input type="text" class="form-control" id="customerMobile">
                            </div>
                            <div class="col-12 p-1">
                                <label class="form-label">Unit *</label>
                                <input type="text" class="form-control" id="customerMobile">
                            </div>
                            <div class="col-12 p-1">

                                <img style="width: 100px; height:80px" id="newImg"
                                    src="{{ asset('images/default.jpg') }}" />

                            </div>
                            <div class="col-12 p-1">
                                <label class="form-label">Image *</label>
                                <input oninput="newImg.src=window.URL.createObjectURL(this.files[0])" type="file"
                                    class="form-control" id="productImg">
                            </div>


                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="costomer-modal-close" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button onclick="Save()" id="save-btn" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<script>
    FillCategoryDropDown();
    async function FillCategoryDropDown() {
        let res = await axios.get("list-category");
        res.data.forEach(function(item, i) {

            let option = `<option value="${item['id']}">${item['name']}</option>`
            $('#productCategory').append(option);
        })

    }
</script>
