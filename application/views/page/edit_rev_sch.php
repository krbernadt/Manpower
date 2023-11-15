<!--begin::Content-->
<style>
    .form-input {
        width: 20%;
        margin-right: 20px;
        border-radius: 5px;
        border-width: thin;
        padding-left: 5px;
        padding-right: 5px;
        margin-left: 5px;
        height: 30px;
        border-color: #A0A0A0;
        border-style: solid;
    }

    .form-dis {
        width: 20%;
        margin-right: 20px;
        border-radius: 5px;
        border-width: 0.5px;
        padding-left: 5px;
        padding-right: 5px;
        margin-left: 5px;
        height: 30px;
        background-color: #E2E5E4;
        border-color: #A0A0A0;
        border-style: solid;
    }


    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: inline-block;
        width: 150px;
    }

    .form-group .input-1 {
        margin-left: 10px;
    }

    .form-group select {
        margin-left: 10px;
    }
</style>
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Container-->
    <div class="container-xxl" id="kt_content_container">
        <!--begin::Navbar-->
        <div class="card mb-8">
            <div class="card-body pt-9 pb-0">

                <!--end::Navbar-->
                <h3 class="text-end">Edit Revision Schedule</h3>

                <!--begin::Toolbar-->
                <div class="flex-wrap flex-stack pb-7">
                    <!--begin::Title-->

                    <!--end::Toolbar-->
                    <!--begin::Tab Content-->
                    <div class="tab-content">
                        <!--begin::Tab pane-->
                        <div id="kt_project_users_card_pane" class="tab-pane fade show active" style="margin-top: 2%;">
                            <!--begin::Row-->
                            <div class="row g-6 g-xl-12">
                                <!--begin::Col-->
                                <div class="col-md-12 col-xxl-12">
                                    <!--begin::Card-->
                                    <form action="" id="" enctype="multipart/form-data" method="POST">

                                        <div class="form-group">
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label for="year">Year* :</label>
                                                    <input type="text" name="year" id="year" class="form-input input-1" placeholder="" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="rev_no">Revision No* :</label>
                                                    <select type="text" name="rev_no" id="rev_no" class="form-input " required>
                                                        <option value="0">0</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                    </select>
                                                    <input type="text" name="rev_year" id="rev_year" class="form-dis" placeholder="Year - Revision No" disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label for="start">Start Date* :</label>
                                                    <input type="date" name="start" id="start" class="form-input input-1" required>
                                                    <label for="end" style="width: 70px">End Date* :</label>
                                                    <input type="date" name="end" id="end" class="form-input input-1" required>
                                                </div>
                                                <div class="form-group"> <label for="status">Status* :</label>
                                                    <select type="text" name="status" id="status" class="form-input input-1">
                                                        <option value="0">Close</option>
                                                        <option value="1">Open</option>
                                                    </select>
                                                </div>

                                            </div>
                                        </div><br>
                                        <table id="kt_datatable" class="table table-striped table-row-bordered gy-5 gs-7 border rounded">
                                            <thead>
                                                <tr class="fw-bold fs-6 text-gray-800 px-7 text-center">
                                                    <th>Entities</th>
                                                    <th>HOD 1</th>
                                                    <th>HOD 2</th>
                                                    <th>HOD 3</th>
                                                    <th>Start Date</th>
                                                    <th>End Date</th>
                                                    <th>Status</th>
                                                    <th>Option</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($rev_sch as $dt) : ?> <tr class="text-center" style="word-wrap: break-word;">
                                                        <input type="text" value="<?php echo $dt->rev_id; ?>" name="rev_id" id="rev_id" hidden>
                                                        <td><?php echo $dt->ent; ?></td>
                                                        <td>
                                                            <?php if ($dt->hod1 == 1) : ?> <i class="fa fa-check" style="font-size:24px; color:green"></i>
                                                            <?php else : ?><i class="fa fa-close" style="font-size:24px; color: red"></i>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td>
                                                            <?php if ($dt->hod2 == 1) : ?> <i class="fa fa-check" style="font-size:24px; color:green"></i>
                                                            <?php else : ?><i class="fa fa-close" style="font-size:24px; color: red"></i>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td>
                                                            <?php if ($dt->hod3 == 1) : ?> <i class="fa fa-check" style="font-size:24px; color:green"></i>
                                                            <?php else : ?><i class="fa fa-close" style="font-size:24px; color: red"></i>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td><?php echo $dt->start; ?></td>
                                                        <td><?php echo $dt->end; ?></td>
                                                        <td>
                                                            <?php if ($dt->status == 1) : ?><?php echo "Open" ?>
                                                            <?php else : ?><?php echo "Closed"; ?>
                                                        <?php endif; ?>
                                                        </td>
                                                        <td>
                                                            <span onclick="editRevSch('<?php echo $dt->rev_sch_id; ?>','<?php echo $dt->hod1; ?>','<?php echo $dt->hod2; ?>','<?php echo $dt->hod3; ?>','<?php echo $dt->start; ?>','<?php echo $dt->end; ?>','<?php echo $dt->status; ?>')" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal">EDIT</span>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>

                                        </table>

                                        <div class="modal-footer" id="add_footer">
                                            <img id="loader" style="display: none;" src="<?php echo prefix_url; ?>assets/loading.gif" alt="" width="10%"></a>
                                            <button id="add_btn" type="button" onclick="submitAll()" class="btn btn-primary">Submit</button>
                                        </div>
                                    </form>



                                    <script>
                                        // Get references to the input elements
                                        var yearInput = document.getElementById('year');
                                        var revNoInput = document.getElementById('rev_no');
                                        var revYearInput = document.getElementById('rev_year');

                                        // Add event listeners to both year and rev_no inputs
                                        yearInput.addEventListener('input', updateRevYearPlaceholder);
                                        revNoInput.addEventListener('change', updateRevYearPlaceholder);

                                        function updateRevYearPlaceholder() {
                                            var yearValue = yearInput.value;
                                            var revNoValue = revNoInput.value;

                                            // Concatenate year and rev_no values and set as placeholder
                                            var placeholderValue = yearValue + ' - ' + revNoValue;
                                            revYearInput.placeholder = placeholderValue;
                                        }

                                        document.getElementById('end').addEventListener('input', function() {
                                            var startDate = new Date(document.getElementById('start').value);
                                            var endDate = new Date(this.value);

                                            if (endDate <= startDate) {
                                                alert("End Date must be greater than Start Date");
                                                this.value = '';
                                            }
                                        });

                                        function editRevSch(rev_sch_id, hod1, hod2, hod3, start, end, status) {
                                            console.log(rev_sch_id);
                                            document.getElementById('start_mod').value = start;
                                            document.getElementById('end_mod').value = end;
                                            document.getElementById('status_mod').value = status;
                                            document.getElementById('rev_sch_id_mod').value = rev_sch_id;

                                            // Show the modal
                                            $('#editModal').modal('show');
                                        }

                                        function save_edit(rev_sch_id, start_mod, end_mod) {
                                            var start = document.getElementById('start_mod').value;
                                            var end = document.getElementById('end_mod').value;
                                            var status = document.getElementById('status_mod').value;
                                            var rev_sch_id = document.getElementById('rev_sch_id_mod').value;


                                            $.ajax({
                                                url: '<?php echo prefix_url; ?>app/editRevSch',
                                                method: 'post',
                                                data: {
                                                    rev_sch_id_edit: rev_sch_id,
                                                    start_edit: start,
                                                    end_edit: end,
                                                    status_edit: status
                                                },
                                                success: function(response) {
                                                    var data = JSON.parse(response);
                                                    console.log(data);

                                                    if (data.msg === 'true') {
                                                        alert('Update Success');
                                                        $('#editModal').modal('hide');
                                                        window.location.reload()
                                                    } else {
                                                        alert('Update count: ' + data.update + '\nNew data count: ' + data.new_dat);
                                                        window.location.reload()
                                                    }

                                                },

                                            });
                                        }

                                        function submitAll() {
                                            var rev_data = {
                                                rev_id: document.getElementById('rev_id').value,
                                                rev_year: document.getElementById('year').value,
                                                rev_no: document.getElementById('rev_no').value,
                                                rev_start: document.getElementById('start').value,
                                                rev_end: document.getElementById('end').value,
                                                rev_status: document.getElementById('status').value
                                            }

                                            $.ajax({
                                                url: '<?php echo prefix_url; ?>app/submit_rev_sch',
                                                type: 'POST',
                                                data: {
                                                    rev_data: rev_data,
                                                },
                                                success: function(response) {
                                                    response = JSON.parse(response);
                                                    console.log(response);
                                                    if (response.msg === 'true') {
                                                        alert('Submission Success');
                                                        console.log(response.msg);
                                                    } else {
                                                        alert('Submission Failed');
                                                        console.log(response.msg);
                                                    }
                                                    setTimeout(
                                                        function() {
                                                            window.location.href = '<?php echo prefix_url; ?>app/';
                                                        }, 1800);
                                                },

                                                error: function(error) {
                                                    alert('fetch-error')
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
                    <div class="modal fade" id="editModal">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Edit Revisi Schedule</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                                    </button>
                                </div>
                                <div class="modal-body" id="body-edit">
                                    <div class="form-group">
                                        <label for="start_mod" style="width: 80px">Start Date* :</label>
                                        <input type="date" name="start_mod" id="start_mod" class="form-input input-1">
                                        <label for="end_mod" style="width: 80px">End Date* :</label>
                                        <input type="date" name="end_mod" id="end_mod" class="form-input  input-1">
                                    </div>
                                    <div class="form-group"> <label for="status_mod" style="width: 80px">Status* :</label>
                                        <select type="text" name="status_mod" id="status_mod" class="form-input  input-1">
                                            <option value="0">Close</option>
                                            <option value="1">Open</option>
                                        </select>
                                    </div>
                                </div>
                                <input type="hidden" id="rev_sch_id_mod">
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary" onclick="save_edit()">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end::Modals-->
                </div>
                <!--end::Container-->
            </div>
            <!--end::Content-->


        </div>
    </div>