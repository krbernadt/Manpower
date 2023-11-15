<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content" onload="alert_compare()">

    <!--begin::Container-->
    <div class="container-xxl" id="kt_content_container">
        <!--begin::Navbar-->
        <div class="card mb-8">
            <div class="card-body pt-9 pb-0">

                <!--end::Navbar-->

                <!--begin::Toolbar-->
                <div class="d-flex flex-wrap flex-stack pb-7">
                    <!--begin::Title-->

                    <!--end::Toolbar-->
                    <!--begin::Tab Content-->
                    <div class="tab-content">
                        <!--begin::Tab pane-->
                        <div id="kt_project_users_card_pane" class="tab-pane fade show active">

                            <!--begin::Row-->
                            <div class="row g-6 g-xl-9">
                                <!--begin::Col-->
                                <div class="col-md-12 col-xxl-12">
                                    <!--begin::Card-->


                                    <table id="kt_datatable_dom_positioning" class="table table-striped table-row-bordered gy-5 gs-7 border rounded">

                                        <thead>
                                            <tr class="fw-bold fs-6 text-gray-800 px-7">
                                                <th>No</th>
                                                <th>id_scan</th>
                                                <th>emp_nik</th>
                                                <th>QR-Token</th>
                                                <th>Datetime Rec</th>
                                                <th>Name</th>
                                                <th>Department</th>
                                                <th>Status</th>
                                                <th>Date Rec</th>
                                                <th>Time Rec</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1; ?>z
                                            <?php foreach ($update as $dt) : ?>
                                                <tr>
                                                    <td><?php echo $i++; ?></td>
                                                    <td><?php echo $dt->id_scan; ?></td>
                                                    <td><?php echo $dt->emp_nik; ?></td>
                                                    <td><?php echo $dt->qrToken; ?></td>
                                                    <td><?php echo $dt->datetime_rec; ?></td>
                                                    <td><?php echo $dt->emp_name; ?></td>
                                                    <td><?php echo $dt->emp_dept; ?></td>

                                                    <td>
                                                        <?php if ($dt->status == 1) : ?><?php echo "IN" ?>
                                                        <?php else : ?><?php echo "OUT"; ?>
                                                    <?php endif; ?>
                                                    </td>
                                                    <td><?php echo $dt->date_rec; ?></td>
                                                    <td><?php echo $dt->time_rec; ?></td>
                                                    <td><span onclick="" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_1_edit">EDIT</span></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>


                                    <script>
                                        function alert_compare() {
                                            $.ajax({
                                                url: '<?php echo prefix_url; ?>home/dbcompare',
                                                type: "GET",
                                                data: {
                                                    update: new_data
                                                },
                                                success: function(data) {
                                                    if (data != null) {
                                                        alert('new update')
                                                    } else {
                                                        alert('No Update')
                                                    }
                                                }
                                            });
                                        }
                                    </script>

                                    <!--end::Card-->
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Row-->

                        </div>
                        <!--end::Tab pane-->

                    </div>
                    <!--end::Tab Content-->
                    <!--begin::Modals-->


                    <!--end::Modals-->
                </div>
                <!--end::Container-->
            </div>
            <!--end::Content-->
        </div>
    </div>

</div>
<!--end::Modal-->