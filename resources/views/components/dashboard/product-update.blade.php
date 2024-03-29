<!-- Modal -->
<div class="modal fade" id="update-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Product Update</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="update-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label class="form-label">Product Category *</label>
                                <select type ="text" class="form-select" name="brand_id" id="productCategoryUpdate">
                                    <option value="">Select Category</option>




                                </select>
                            </div>
                            <div class="col-12 p-1">
                                <label class="form-label">Product Name *</label>
                                <input type="text" class="form-control" id="productNameUpdate">
                            </div>
                            <div class="col-12 p-1">
                                <label class="form-label">Price *</label>
                                <input type="text" class="form-control" id="productPriceUpdate">
                            </div>
                            <div class="col-12 p-1">
                                <label class="form-label">Unit *</label>
                                <input type="text" class="form-control" id="productUnitUpdate">
                            </div>
                            <div class="col-12 p-1">

                                <img style="width: 100px; height:80px" id="oldImg"
                                    src="{{ asset('images/default.jpg') }}" />

                            </div>
                            <div class="col-12 p-1">
                                <label class="form-label">Image *</label>
                                <input oninput="newImg.src=window.URL.createObjectURL(this.files[0])" type="file"
                                    class="form-control" id="productImgUpdate">
                            </div>
                            <input type="text" class="d-none" id="updateID">
                            <input type="text" class="d-none" id="filePath">

                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="update-modal-close" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button onclick="update()" id="save-btn" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<script>
    async function UpdateFillCategoryDropDown() {
        let res = await axios.get("list-category");
        res.data.forEach(function(item, i) {

            let option = `<option value="${item['id']}">${item['name']}</option>`
            $('#productCategoryUpdate').append(option);
        })

    }

    async function FillUpUpdateForm(id, filePath) {

        document.getElementById('updateID').value = id;
        document.getElementById('filePath').value = filePath;
        document.getElementById('oldImg').src = filePath;


        showLoader();
        await UpdateFillCategoryDropDown();

        let res = await axios.post("/product-by-id", {
            id: id
        })
        hideLoader();

        document.getElementById('productNameUpdate').value = res.data['name'];
        document.getElementById('productPriceUpdate').value = res.data['price'];
        document.getElementById('productUnitUpdate').value = res.data['unit'];
        document.getElementById('productCategoryUpdate').value = res.data['category_id'];

    }


    async function update() {

        let productCategoryUpdate = document.getElementById('productCategoryUpdate').value;
        let productNameUpdate = document.getElementById('productNameUpdate').value;
        let productPriceUpdate = document.getElementById('productPriceUpdate').value;
        let productUnitUpdate = document.getElementById('productUnitUpdate').value;
        let updateID = document.getElementById('updateID').value;
        let filePath = document.getElementById('filePath').value;
        let productImgUpdate = document.getElementById('productImgUpdate').files[0];


        if (productCategoryUpdate.length === 0) {
            errorToast("Product Category Required !")
        } else if (productNameUpdate.length === 0) {
            errorToast("Product Name Required !")
        } else if (productPriceUpdate.length === 0) {
            errorToast("Product Price Required !")
        } else if (productUnitUpdate.length === 0) {
            errorToast("Product Unit Required !")
        } else {

            document.getElementById('update-modal-close').click();

            let formData = new FormData();
            formData.append('img', productImgUpdate)
            formData.append('id', updateID)
            formData.append('name', productNameUpdate)
            formData.append('price', productPriceUpdate)
            formData.append('unit', productNameUpdate)
            formData.append('category_id', productCategoryUpdate)
            formData.append('file_path', filePath)

            const config = {
                headers: {
                    'content-type': 'multipart/form-data'
                }
            }

            showLoader();
            let res = await axios.post("/update-product", formData, config)
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
