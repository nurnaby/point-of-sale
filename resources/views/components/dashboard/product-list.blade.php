<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Products </div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">All Products</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">Customer Create</button>


                </div>
            </div>
        </div>
        <!--end breadcrumb-->
        <div class="row">
            <div class="col-xl-12 mx-auto">

                <div class="card">
                    <div class="card-body">
                        <table class="table mb-0" id="tableData">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Unit</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody id="tableList">


                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
        <!--end row-->
    </div>
</div>
<script>
    $(document).ready(function() {
        getList();
    });
    async function getList() {
        showLoader();
        let res = await axios.get("/list-product");
        hideLoader();

        let tableList = $("#tableList");
        let tableData = $("#tableData");

        tableData.DataTable().destroy();
        tableList.empty();



        res.data.forEach(function(item, index) {
            let row = `<tr>
                    <td><img style="width: 70px; height:40px" alt="" src="${item['img_url']}"></td>
                    <td>${item['name']}</td>
                    <td>${item['price']}</td>
                    <td>${item['unit']}</td>
                    <td>
                        <button data-path="${item['img_url']}" data-id="${item['id']}" class="btn editBtn btn-primary">Edit</button>
                        <button data-path="${item['img_url']}" data-id="${item['id']}" class="btn deleteBtn btn-sm btn-danger">Delete</button>
                    </td>
                 </tr>`
            tableList.append(row)
        })

        $('.deleteBtn').on('click', function() {
            let id = $(this).data('id');
            let path = $(this).data('path');

            $("#delete-modal").modal('show');
            $("#deleteID").val(id);
            $("#deleteFilePath").val(path)

        })


        $('.editBtn').on('click', async function() {
            let id = $(this).data('id');
            let filePath = $(this).data('path');
            await FillUpUpdateForm(id, filePath)
            $("#update-modal").modal('show');
        })












        tableData.DataTable();



    }
</script>
