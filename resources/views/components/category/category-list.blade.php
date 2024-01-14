<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Category </div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">All Category</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">Category Create</button>


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
                                    <th scope="col">No</th>
                                    <th scope="col">Category Name</th>

                                    <th scope="col">Action</th>

                                </tr>
                            </thead>
                            <tbody id="tableList">
                                {{-- <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>
                                        <a href="#" class="btn btn-primary text-center">Edit</a>
                                        <a href="#" class="btn btn-danger text-center" id="delete">Delete</a>

                                    </td>

                                </tr> --}}

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
        let res = await axios.get("/list-category");
        hideLoader();
        let tableList = $("#tableList");
        let tableData = $("#tableData");

        tableData.DataTable().destroy();
        tableList.empty();

        res.data.forEach(function(item, index) {
            let row = `<tr>
                    <td>${index+1}</td>
                    <td>${item['name']}</td>
                    
                    <td>
                        
                        <button data-id="${item['id']}" class="btn editBtn btn-primary text-center">Edit</button>
                        <button data-id="${item['id']}" class="btn deleteBtn btn-danger text-center">Delete</button>
                    </td>
                </tr>`

            tableList.append(row)
        })

        $('.editBtn').on('click', async function() {
            let id = $(this).data('id');
            await FillUpUpdateForm(id);
            $('#update-Modal').modal('show');


        })
        $('.deleteBtn').on('click', function() {
            let id = $(this).data('id');
            $('#delete-modal').modal('show');
            $('#deleteID').val(id);
        })


        tableData.DataTable();
        // new DataTable('#tableData', {
        //     order: [
        //         [0, 'desc']
        //     ],
        //     lengthMenu: [5, 10, 15, 20, 30]


        // });


    }
</script>
