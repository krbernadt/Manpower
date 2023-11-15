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




    .dropdown-btn {
        background-color: #2C294B;
        width: 10%;
        margin-bottom: 5px;
        border-radius: 10px;
        border: 0;
        box-shadow: rgba(1, 60, 136, .5) 0 -1px 3px 0 inset, rgba(0, 44, 97, .1) 0 3px 6px 0;
        box-sizing: border-box;
        color: #fff;
        cursor: pointer;
        display: inherit;
        font-family: "Space Grotesk", -apple-system, system-ui, "Segoe UI", Roboto, Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
        font-size: 18px;
        font-weight: 700;
        line-height: 24px;

        min-height: 40px;
        min-width: 120px;
        padding: 16px 20px;
        position: relative;
        text-align: start;
        user-select: none;
        -webkit-user-select: none;
        touch-action: manipulation;
        vertical-align: baseline;
        transition: all .2s cubic-bezier(.22, .61, .36, 1);
    }

    .dropdown-btn:hover {
        background-color: #D1CFE1;
        transform: translateY(-2px);
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


    .fa-solid.fa-chevron-down {
        color: #fff;
        transition: color 0.2s;
    }

    .btn.dropdown-btn:hover .fa-solid.fa-chevron-down {
        color: #2C294B;
    }

    @media (min-width: 768px) {
        .dropdown-btn {
            padding: 16px 44px;
            min-width: 150px;
        }
    }

    .dropdown-content {
        display: none;
        padding: 10px;
    }
</style>
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Container-->
    <div class="container-xxl" id="kt_content_container">
        <!--begin::Navbar-->
        <div class="card mb-8">

            <div class="card-body pt-9 pb-0">

                <!--end::Navbar-->

                <h3 class="text-end">Add Revision Schedule</h3>
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
                                    <form action="" enctype="multipart/form-data" id="main_form" method="POST">

                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="year">Year* :</label>
                                                <input type="text" name="year" id="year" class="form-input input-1" placeholder="">
                                            </div>
                                            <div class="form-group">
                                                <label for="rev_no">Revision No* :</label>
                                                <select type="text" name="rev_no" id="rev_no" class="form-input ">
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
                                                <input type="date" name="start" id="start" class="form-input input-1">
                                                <label for="end" style="width: 70px">End Date* :</label>
                                                <input type="date" name="end" id="end" class="form-input input-1">
                                            </div>
                                            <div class="form-group"> <label for="status">Status* :</label>
                                                <select type="text" name="status" id="status" class="form-input input-1">
                                                    <option value="0">Close</option>
                                                    <option value="1">Open</option>
                                                </select>
                                            </div>
                                            <div>
                                                <label for="ent">Select a value :</label>
                                                <select id="ent" name="ent" onchange="toggleDiv()" class="form-input">
                                                    <option value="all">All</option>
                                                    <option value="ptct">PTCT</option>
                                                    <option value="scn">SCN</option>
                                                    <option value="sg">SG</option>
                                                </select>
                                            </div>
                                        </div><br>
                                        <div class="form-group" id="div_ptct">
                                            <table id="table1" class="table table-striped table-row-bordered gy-5 gs-7 border rounded">
                                                <thead>
                                                    <tr class="fw-bold fs-6 text-gray-800 px-7 text-center">
                                                        <th>Entities</th>
                                                        <th>HOD 1</th>
                                                        <th>HOD 2</th>
                                                        <th>HOD 3</th>
                                                        <th>Start Date</th>
                                                        <th>End Date</th>
                                                        <th>Status</th>
                                                        <th class="action-column">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($rev_dat as $dat_rev) : ?> <tr class="text-center data-row" id="row_<?php echo $dat_rev->temp_rev_id; ?>" style="word-wrap: break-word;">
                                                            <td class="ent_td" data-value="<?php echo $dat_rev->ent; ?>"><?php echo $dat_rev->ent; ?></td>
                                                            <td class="hod1_rev" data-index="<?php echo $dat_rev->temp_rev_id; ?>" data-value="<?php echo $dat_rev->hod1; ?>">
                                                                <?php if ($dat_rev->hod1 == 1) : ?> <i class="fa fa-check" style="font-size:24px; color:green"></i>
                                                                <?php else : ?><i class="fa fa-close" style="font-size:24px; color: red"></i>
                                                                <?php endif; ?>
                                                            </td>
                                                            <td class="hod2_rev" data-index="<?php echo $dat_rev->temp_rev_id; ?>" data-value="<?php echo $dat_rev->hod2; ?>">
                                                                <?php if ($dat_rev->hod2 == 1) : ?> <i class="fa fa-check" style="font-size:24px; color:green"></i>
                                                                <?php else : ?><i class="fa fa-close" style="font-size:24px; color: red"></i>
                                                                <?php endif; ?>
                                                            </td>
                                                            <td class="hod3_rev" data-index="<?php echo $dat_rev->temp_rev_id; ?>" data-value="<?php echo $dat_rev->hod3; ?>">
                                                                <?php if ($dat_rev->hod3 == 1) : ?> <i class="fa fa-check" style="font-size:24px; color:green"></i>
                                                                <?php else : ?><i class="fa fa-close" style="font-size:24px; color: red"></i>
                                                                <?php endif; ?>
                                                            </td>
                                                            <td class="start_rev" data-index="<?php echo $dat_rev->temp_rev_id; ?>" data-value="<?php echo $dat_rev->start; ?>"><?php echo $dat_rev->start; ?></td>
                                                            <td class="end_rev" data-index="<?php echo $dat_rev->temp_rev_id; ?>" data-value="<?php echo $dat_rev->end; ?>"><?php echo $dat_rev->end; ?></td>
                                                            <td class="status_rev" data-index="<?php echo $dat_rev->temp_rev_id; ?>" data-value="<?php echo $dat_rev->status; ?>">
                                                                <?php if ($dat_rev->status == 1) : ?><?php echo "Open" ?>
                                                                <?php else : ?><?php echo "Closed"; ?>
                                                            <?php endif; ?>

                                                            </td>
                                                            <td class="action-column">
                                                                <span data-temp-rev-id="<?php echo $dat_rev->temp_rev_id; ?>" data-table-id="table1" class="btn btn-warning btn-sm edit-btn" onclick="editModalClicked('<?php echo $dat_rev->temp_rev_id; ?>', '<?php echo $dat_rev->start; ?>', '<?php echo $dat_rev->end; ?>', '<?php echo $dat_rev->status; ?>','table1')">EDIT</span>

                                                            </td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>

                                            </table>
                                        </div>

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

                                        function editModalClicked(tempRevId, start, end, status, tableId) {
                                            // Populate the modal fields with the values
                                            document.getElementById('start_mod').value = start;
                                            document.getElementById('end_mod').value = end;
                                            document.getElementById('status_mod').value = status;

                                            console.log(tempRevId);
                                            console.log(tableId);

                                            // Store the tempRevId and table ID in the hidden input fields
                                            document.getElementById('rev_sch_id').value = tempRevId;
                                            document.getElementById('table_id').value = tableId;


                                            // Show the modal
                                            $('#editModal').modal('show');
                                        }

                                        function saveChanges() {
                                            // Get the updated values from the modal
                                            var start = document.getElementById('start_mod').value;
                                            var end = document.getElementById('end_mod').value;
                                            var status = document.getElementById('status_mod').value;

                                            // Get the tableId from the hidden input field
                                            var tableId = document.getElementById('table_id').value;
                                            var tempRevId = document.getElementById('rev_sch_id').value;

                                            // Update the <td> elements
                                            var table = document.querySelector('#' + tableId);
                                            var row = table.querySelector('#row_' + tempRevId);
                                            var tds = row.getElementsByTagName('td');

                                            tds[4].setAttribute('data-value', start);
                                            tds[5].setAttribute('data-value', end);
                                            tds[6].setAttribute('data-value', status);

                                            tds[4].textContent = start;
                                            tds[5].textContent = end;
                                            tds[6].textContent = status === '1' ? 'Open' : 'Closed';

                                            $('#editModal').modal('hide');
                                            // Close the modal

                                        }

                                        function submitAll() {
                                            var rev_data = {
                                                rev_year: document.getElementById('year').value,
                                                rev_no: document.getElementById('rev_no').value,
                                                rev_start: document.getElementById('start').value,
                                                rev_end: document.getElementById('end').value,
                                                rev_status: document.getElementById('status').value
                                            }

                                            var rev_sch = [];

                                            document.querySelectorAll('.data-row').forEach(function(row) {
                                                var ent = row.dataset.ent;
                                                var rowData = {};

                                                rowData.hod1 = row.querySelector('.hod1_rev').getAttribute('data-value');
                                                rowData.hod2 = row.querySelector('.hod2_rev').getAttribute('data-value');
                                                rowData.hod3 = row.querySelector('.hod3_rev').getAttribute('data-value');
                                                rowData.ent = row.querySelector('.hod3_rev').getAttribute('data-value');
                                                rowData.start = row.querySelector('.start_rev').getAttribute('data-value');
                                                rowData.end = row.querySelector('.end_rev').getAttribute('data-value');
                                                rowData.status = row.querySelector('.status_rev').getAttribute('data-value');
                                                rowData.ent = row.querySelector('.ent_td').getAttribute('data-value');


                                                rev_sch.push(rowData);
                                            });


                                            $.ajax({
                                                url: '<?php echo prefix_url; ?>app/add_rev_dat',
                                                type: 'POST',
                                                data: {
                                                    rev_data: rev_data,
                                                    rev_sch: rev_sch
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

                                    <script>
                                        function toggleDiv() {
                                            var selectedValue = document.getElementById('ent').value;
                                            filterRows(selectedValue);
                                            console.log(selectedValue);
                                        }

                                        function filterRows(ent) {
                                            var table = document.getElementById('table1');
                                            var rows = table.querySelectorAll('.data-row');

                                            rows.forEach(function(row) {
                                                var revEnt = row.querySelector('.ent_td').getAttribute('data-value');

                                                var actionColumn = row.querySelector('.action-column');

                                                if (ent === 'all' || revEnt === ent) {
                                                    row.style.display = 'table-row';
                                                    actionColumn.style.display = 'table-cell';
                                                } else {
                                                    row.style.display = 'none';
                                                    actionColumn.style.display = 'none';
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
                                        <input type="date" name="end_mod" id="end_mod" class="form-input input-1">
                                    </div>
                                    <div class="form-group"> <label style="width: 80px" for="status_mod">Status* :</label>
                                        <select type="text" name="status_mod" id="status_mod" class="form-input input-1">
                                            <option value="0">Close</option>
                                            <option value="1">Open</option>
                                        </select>
                                    </div>
                                </div>
                                <input type="hidden" id="rev_sch_id"> <!-- Add a hidden input field to store the rev_sch_id -->
                                <input type="hidden" id="table_id">
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" onclick="saveChanges()">Save changes</button>
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