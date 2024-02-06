<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Invoice </div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">All Invoice</li>
                    </ol>
                </nav>
            </div>
            {{-- <div class="ms-auto">
                <div class="btn-group">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">Customer Create</button>


                </div>
            </div> --}}
        </div>
        <!--end breadcrumb-->
        <div class="row">
            <div class="col-xl-12 mx-auto">

                <div class="card">
                    <div class="card-body">
                        <table class="table mb-0" id="tableData">
                            <thead>
                                <tr>
                                    <th>Ns</th>
                                    <th>Customer Name</th>
                                    <th>Customer Mobile</th>
                                    <th>Total</th>

                                    <th>Discount</th>
                                    <th>Payable</th>
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
    getList();


    async function getList() {


        showLoader();
        let res = await axios.get("/invoice-select");
        hideLoader();

        let tableList = $("#tableList");
        let tableData = $("#tableData");

        tableData.DataTable().destroy();
        tableList.empty();

        res.data.forEach(function(item, index) {
            let row = `<tr>
                        <td>${index+1}</td>
                        <td>${item['customer']['name']}</td>
                        <td>${item['customer']['mobile']}</td>
                        <td>${item['total']}</td>
                      
                        <td>${item['discount']}</td>
                        <td>${item['payable']}</td>
                        <td>
                           


                            <button data-id="${item['id']}" data-cus="${item['customer']['id']}"  class="btn editBtn btn-primary text-center">view</button>
                            <button data-id="${item['id']}" data-cus="${item['customer']['id']}"  class="btn deleteBtn btn-danger text-center">Delete</button>
                        </td>
                     </tr>`
            tableList.append(row)
        })

        // $('.viewBtn').on('click', async function() {
        //     let id = $(this).data('id');
        //     let cus = $(this).data('cus');
        //     await InvoiceDetails(cus, id)
        // })

        // $('.deleteBtn').on('click', function() {
        //     let id = $(this).data('id');
        //     document.getElementById('deleteID').value = id;
        //     $("#delete-modal").modal('show');
        // })

        new DataTable('#tableData', {
            order: [
                [0, 'desc']
            ],
            lengthMenu: [5, 10, 15, 20, 30]
        });

    }
</script>
