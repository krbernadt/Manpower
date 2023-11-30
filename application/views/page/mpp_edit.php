<!--begin::Content-->
<style>
    .form-input {
        width: 20%;
        margin-right: 20px;
        border-radius: 5px;
        border-width: thin;
        padding-left: 5px;
        padding-right: 5px;
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

    .group-2 {
        display: flex;
        flex-direction: row;
        align-items: center;
    }

    .group-3 {
        display: flex;
        flex-direction: row;
        right: 0;
        justify-content: flex-end;
        align-items: center;
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

    .form-group .label-2 {
        display: inline-block;
        width: 150px;
        margin-left: 5%;
    }

    .form-group .input-1 {
        margin-left: 10px;
    }

    .form-group .input-5 {
        margin-left: 10px;
        width: 65%;
    }

    .form-group .input-2 {
        margin-right: 0;
        padding: 10px;
        height: auto;
        width: auto;
        column-count: 3;
        justify-items: flex-start;
    }

    .form-group .input-3 {
        padding: 10px;
        flex-grow: 8;
    }

    .form-group select {
        margin-left: 10px;
    }

    .end-section {
        float: right;
        margin-left: 20px;
        align-items: center;
    }

    .fa-solid.fa-chevron-down {
        color: #fff;
        transition: color 0.2s;
    }

    .btn.dropdown-btn:hover .fa-solid.fa-chevron-down {
        color: #2C294B;
    }

    .checkbox-container {
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
        flex-wrap: wrap;
    }

    .cbox-comp {
        margin-right: 5px;
        width: 20px;
        height: 13px;
        margin-bottom: 10px;
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

    .select-disabled {
        pointer-events: none;
        background-color: #E2E5E4;
    }
</style>
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Container-->
    <div class="container-xxl" id="kt_content_container">
        <!--begin::Navbar-->
        <div class="card mb-8">

            <div class="card-body pt-9 pb-0">

                <!--end::Navbar-->

                <h3 class="text-end">Add Manpower Planning</h3>
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

                                        <div>
                                            <div class="form-group group-2">
                                                <?php
                                                $latest_year = 0;
                                                foreach ($edit_mmp as $data) {
                                                    if ($data->year > $latest_year) {
                                                        $latest_year = $data->year;
                                                    }
                                                }
                                                ?>
                                                <label for="year">Year* :</label>
                                                <select list="yearlist" name="year" id="year" class="form-input">
                                                    <datalist id="yearlist">
                                                        <?php
                                                        $unique_years = array();
                                                        foreach ($edit_mmp as $data) {
                                                            if (!in_array($data->year, $unique_years)) {
                                                                $unique_years[] = $data->year;
                                                                echo '<option value="' . $data->year . '">' . $data->year . '</option>';
                                                            }
                                                        }
                                                        ?>
                                                    </datalist>
                                                </select>
                                            </div>
                                            <div class="form-group group-2">
                                                <label for="rev_no">Revision No* :</label>
                                                <select type="text" name="rev_no" id="rev_no" class="form-input">
                                                    <?php
                                                    $latest_year_data = array_filter($edit_mmp, function ($item) use ($latest_year) {
                                                        return $item->year == $latest_year;
                                                    });
                                                    $latest_rev_nos = array_map(function ($item) {
                                                        return $item->rev_no;
                                                    }, $latest_year_data);
                                                    foreach ($latest_rev_nos as $rev_no) {
                                                        echo '<option value="' . $rev_no . '">' . $rev_no . '</option>';
                                                    }
                                                    ?>
                                                </select>
                                                <input type="text" name="rev_year" id="rev_year" class="form-dis" placeholder="Year - Revision No" readonly required>
                                            </div>
                                            <div class="form-group group-2">
                                                <label for="start">Start Date* :</label>
                                                <input type="date" name="start" id="start" class="form-input input-1" value="" readonly required>
                                                <label for="end" style="width: 70px">End Date* :</label>
                                                <input type="date" name="end" id="end" class="form-input input-1" readonly required>
                                            </div>
                                            <div class="form-group group-2">
                                                <label for="status">Status* :</label>
                                                <select type="text" name="status" id="status" class="form-input input-1" readonly required>
                                                    <option value="0">Draft</option>
                                                    <option value="1">Planning</option>
                                                    <option value="2">Locked</option>
                                                </select>
                                            </div>
                                            <h5>Filter :</h5>
                                            <div class="form-group group-2">
                                                <div><label for="ent">Select a value :</label></div>
                                                <div class="form-input input-2" style="flex-grow:2; margin-right:10%;margin-left:0.8%;">
                                                    <div style="width: fit-content;"><input class="cbox-comp" type="checkbox" id="ent1" value="Entity1">PTCT</div>
                                                    <div style="width: fit-content;"><input class="cbox-comp" type="checkbox" id="ent2" value="Entity2">SCN</div>
                                                    <div style="width: fit-content;"><input class="cbox-comp" type="checkbox" id="ent3" value="Entity3">CPPI</div>
                                                    <div style="width: fit-content;"><input class="cbox-comp" type="checkbox" id="ent4" value="Entity4">CMC</div>
                                                    <div style="width: fit-content;"><input class="cbox-comp" type="checkbox" id="ent5" value="Entity5">VAPC</div>
                                                    <div style="width: fit-content;"><input class="cbox-comp" type="checkbox" id="ent6" value="Entity6">CSV</div>
                                                    <div style="width: fit-content;"><input class="cbox-comp" type="checkbox" id="ent7" value="Entity7">VFE</div>
                                                </div>
                                                <div class="form-group group-3" style="flex-grow:10; width: 20%;">
                                                    <div style="width: 40%; ">
                                                        <label for="name_filter" style="width  : 50px">Name : </label>
                                                        <input type="text" name="" id="" class="form-input input-3" style="width: 70%;">
                                                    </div>
                                                    <span class="btn btn-success btn-sm" style="margin-right:10px; " data-bs-toggle="modal">Sync MPP</span>
                                                    <span class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addModal">Add</span>
                                                </div>

                                            </div>

                                        </div><br>
                                        <div class="form-group " style="overflow: auto;">
                                            <table id="table1 " class="table table-striped table-row-bordered gy-5 gs-7 border rounded">
                                                <thead>
                                                    <tr class="fw-bold fs-6 text-gray-800 px-7 text-center" style="text-align: center;">
                                                        <th>GID</th>
                                                        <th>NIK</th>
                                                        <th>SFID</th>
                                                        <th>Position</th>
                                                        <th>Full Name</th>
                                                        <th>Job Family</th>
                                                        <th>Job Title</th>
                                                        <th>Dept</th>
                                                        <th>Job Position</th>
                                                        <th>Grade</th>
                                                        <th>Company</th>
                                                        <th>CC</th>
                                                        <th>CC Desc</th>
                                                        <th>CC Payroll</th>
                                                        <th>Grouping</th>
                                                        <th>Start</th>
                                                        <th>End</th>
                                                        <th>Remark</th>
                                                        <th>Notes</th>
                                                        <th class="action-column">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tableBody">
                                                    <?php foreach ($edit_mmp as $plan_dat) : ?>
                                                        <tr class="text-center data-row" style="word-wrap: break-word;">
                                                            <td class="" data-value="<?php echo $plan_dat->rev_id; ?>" hidden><?php echo $plan_dat->rev_id; ?></td>
                                                            <td class="" data-value="<?php echo $plan_dat->gid; ?>"><?php echo $plan_dat->gid; ?></td>
                                                            <td class="" data-value="<?php echo $plan_dat->local_emp_id; ?>"><?php echo $plan_dat->local_emp_id; ?></td>
                                                            <td class="" data-value="<?php echo $plan_dat->sfid; ?>"><?php echo $plan_dat->sfid; ?></td>
                                                            <td class="" data-value="<?php echo $plan_dat->position_no; ?>"><?php echo $plan_dat->position_no; ?></td>
                                                            <td class="" data-value="<?php echo $plan_dat->full_name; ?>"><?php echo $plan_dat->full_name; ?></td>
                                                            <td class="" data-value="<?php echo $plan_dat->job_family; ?>"><?php echo $plan_dat->job_family; ?></td>
                                                            <td class="" data-value="<?php echo $plan_dat->job_title; ?>"><?php echo $plan_dat->job_title; ?></td>
                                                            <td class="" data-value="<?php echo $plan_dat->dept; ?>"><?php echo $plan_dat->dept; ?></td>
                                                            <td class="" data-value="<?php echo $plan_dat->job_position; ?>"><?php echo $plan_dat->job_position; ?></td>
                                                            <td class="" data-value="<?php echo $plan_dat->hay_grade; ?>"><?php echo $plan_dat->hay_grade; ?></td>
                                                            <td class="" data-value="<?php echo $plan_dat->company; ?>"><?php echo $plan_dat->company; ?></td>
                                                            <td class="" data-value="<?php echo $plan_dat->cc_code; ?>"><?php echo $plan_dat->cc_code; ?></td>
                                                            <td>-</td>
                                                            <td class="" data-value="<?php echo $plan_dat->cc_payroll_code; ?>"><?php echo $plan_dat->cc_payroll_code; ?></td>
                                                            <td class="" data-value="<?php echo $plan_dat->grouping; ?>"><?php echo $plan_dat->grouping; ?></td>
                                                            <td class="" data-value="<?php echo $plan_dat->start; ?>"><?php echo $plan_dat->start; ?></td>
                                                            <td class="" data-value="<?php echo $plan_dat->end; ?>"><?php echo $plan_dat->end; ?></td>
                                                            <td class="" data-value="<?php echo $plan_dat->remark; ?>"><?php echo $plan_dat->remark; ?></td>
                                                            <td class="" data-value="<?php echo $plan_dat->notes; ?>"><?php echo $plan_dat->notes; ?></td>
                                                            <td class="action-column">
                                                                <span data-temp-rev-id="<?php echo $plan_dat->rev_id; ?>" data-table-id="table1" class="btn btn-warning btn-sm edit-btn" onclick="">EDIT</span>
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
                                        document.addEventListener('DOMContentLoaded', function() {
                                            const yearInput = document.getElementById('year');
                                            const revNoInput = document.getElementById('rev_no');
                                            const startInput = document.getElementById('start');
                                            const endInput = document.getElementById('end');

                                            yearInput.addEventListener('change', updateFormValues);
                                            revNoInput.addEventListener('change', updateFormValues);
                                        });

                                        function updateFormValues() {
                                            const selectedYear = yearInput.value;
                                            const selectedRevNo = revNoInput.value;
                                            const edit_mmp = <?php echo json_encode($edit_mmp); ?>;
                                            const processedRevId = localStorage.getItem('processing_rev');
                                            const revPlan = edit_mmp.find(data => data.rev_id == processedRevId);
                                            const selectedPlan = edit_mmp.find(data => data.year == selectedYear && data.rev_no == selectedRevNo);


                                            if (processedRevId === null) {
                                                document.getElementById('rev_no').value = selectedRevNo;
                                                document.getElementById('rev_year').value = selectedYear + ' - ' + selectedRevNo;
                                                document.getElementById('start').value = selectedPlan.date_start;
                                                document.getElementById('end').value = selectedPlan.date_end;
                                                document.getElementById('status').value = selectedPlan.status;
                                            } else {
                                                document.getElementById('year').value = revPlan.year;
                                                document.getElementById('rev_no').value = revPlan.rev_no;
                                                document.getElementById('rev_year').value = revPlan.year + ' - ' + revPlan.rev_no;
                                                document.getElementById('start').value = revPlan.date_start;
                                                document.getElementById('end').value = revPlan.date_end;
                                                document.getElementById('status').value = revPlan.status;
                                            }

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

                                            var placeholderValue = yearValue + ' - ' + revNoValue;
                                            revYearInput.placeholder = placeholderValue;

                                        }

                                        document.addEventListener('DOMContentLoaded', function() {
                                            const yearInput = document.getElementById('year');
                                            const revNoSelect = document.getElementById('rev_no');
                                            const processedRevId = localStorage.getItem('processing_rev');

                                            yearInput.value = "<?php echo $latest_year; ?>";

                                            function updateRevNoOptions(selectedYear) {
                                                revNoSelect.innerHTML = '';

                                                const uniqueRevNos = [];

                                                <?php foreach ($edit_mmp as $data) : ?>
                                                    if ("<?php echo $data->year; ?>" === selectedYear && uniqueRevNos.indexOf("<?php echo $data->rev_no; ?>") === -1) {
                                                        uniqueRevNos.push("<?php echo $data->rev_no; ?>");
                                                        const option = document.createElement('option');
                                                        option.value = "<?php echo $data->rev_no; ?>";
                                                        option.text = "<?php echo $data->rev_no; ?>";
                                                        revNoSelect.appendChild(option);
                                                    }
                                                <?php endforeach; ?>
                                            }

                                            if (processedRevId !== null) {
                                                const yearForProcessedRev = <?php echo json_encode($edit_mmp); ?>.find(data => data.rev_id == processedRevId).year;
                                                yearInput.value = yearForProcessedRev;
                                                updateRevNoOptions(yearForProcessedRev);
                                            }

                                            yearInput.dispatchEvent(new Event('change'));

                                            yearInput.addEventListener('change', function() {
                                                updateRevNoOptions(this.value);
                                                revNoSelect.dispatchEvent(new Event('change'));
                                            });
                                        });


                                        updateRevYearPlaceholder();
                                        updateFormValues();



                                        function saveChanges() {

                                            const yearInput = document.getElementById('year');
                                            const revNoInput = document.getElementById('rev_no');
                                            const selectedYear = yearInput.value;
                                            const selectedRevNo = revNoInput.value;
                                            const edit_mmp = <?php echo json_encode($edit_mmp); ?>;
                                            const selectedPlan = edit_mmp.find(data => data.year == selectedYear && data.rev_no == selectedRevNo);

                                            var emp_mpp = {
                                                rev_id: selectedPlan.rev_id,
                                                rev_no: revNoInput.value,
                                                rev_year: yearInput.value,
                                                gid: document.getElementById('gid_mod').value,
                                                local_emp_id: document.getElementById('nik_mod').value,
                                                sfid: document.getElementById('sfid_mod').value,
                                                position_no: document.getElementById('pos_mod').value,
                                                full_name: document.getElementById('full_name_mod').value,
                                                job_family: document.getElementById('job_family_mod').value,
                                                job_title: document.getElementById('job_title_mod').value,
                                                dept: document.getElementById('dept_mod').value,
                                                job_position: document.getElementById('job_pos_mod').value,
                                                hay_grade: document.getElementById('grade_mod').value,
                                                company: document.getElementById('ent_mod').value,
                                                cc_code: document.getElementById('cc_mod').value,
                                                cc_payroll_code: document.getElementById('cc_pay_mod').value,
                                                grouping: document.getElementById('grouping_mod').value,
                                                start: document.getElementById('start_mod').value,
                                                end: document.getElementById('end_mod').value,
                                                remark: document.getElementById('remark_mod').value,
                                                notes: document.getElementById('note_mod').value,
                                                ent: document.getElementById('ent_mod').value,
                                            }

                                            $.ajax({
                                                url: '<?php echo prefix_url; ?>app/submit_emp_mpp',
                                                type: 'POST',
                                                data: {
                                                    emp_mpp: emp_mpp,
                                                },
                                                success: function(response) {
                                                    response = JSON.parse(response);
                                                    console.log(response);
                                                    if (response.msg === 'true') {
                                                        alert('Submission Success');
                                                        localStorage.setItem('year_disabled', 'true');
                                                        localStorage.setItem('rev_no_disabled', 'true');
                                                        localStorage.setItem('processing_rev', selectedPlan.rev_id);
                                                        console.log(response.msg);
                                                    } else {
                                                        alert('Submission Failed');
                                                        console.log(response.msg);
                                                    }
                                                    setTimeout(function() {
                                                        location.reload();
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
                    <div class="modal fade" id="addModal">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Edit Revisi Schedule</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                                    </button>
                                </div>
                                <div class="modal-body" id="body-edit">
                                    <input type="text" name="rev_id" id="rev_id" value="<?php ?>" hidden>
                                    <div class="form-group">
                                        <label class="label-2" for="gid_mod">GID :</label>
                                        <input type="text" name="gid_mod" id="gid_mod" class="form-input input-5">
                                    </div>
                                    <div class="form-group">
                                        <label class="label-2" for="nik_mod">NIK :</label>
                                        <input type="text" name="nik_mod" id="nik_mod" class="form-input input-5">
                                    </div>
                                    <div class="form-group">
                                        <label class="label-2" for="sfid_mod">SFID :</label>
                                        <input type="text" name="sfid_mod" id="sfid_mod" class="form-input input-5">
                                    </div>
                                    <div class="form-group">
                                        <label class="label-2" for="full_name_mod">Full Name :</label>
                                        <input type="text" name="full_name_mod" id="full_name_mod" class="form-input input-5">
                                    </div>
                                    <div class="form-group">
                                        <label class="label-2" for="job_family_mod">Job Family :</label>
                                        <input type="text" name="job_family_mod" id="job_family_mod" class="form-input input-5" placeholder="Following Corporate Job Family">
                                    </div>
                                    <div class="form-group">
                                        <label class="label-2" for="job_title_mod">Job Title :</label>
                                        <input type="text" name="job_title_mod" id="job_title_mod" class="form-input input-5" placeholder="Following Corporate Job Title">
                                    </div>
                                    <div class="form-group">
                                        <label class="label-2" for="dept_mod">Dept :</label>
                                        <input type="text" name="dept_mod" id="dept_mod" class="form-input input-5" placeholder="Following Corporate Dept">
                                    </div>
                                    <div class="form-group">
                                        <label class="label-2" for="pos_mod">Position :</label>
                                        <input type="text" name="pos_mod" id="pos_mod" class="form-input input-5" placeholder="Following Corporate Job Position">
                                    </div>
                                    <div class="form-group">
                                        <label class="label-2" for="grade_mod">Grade :</label>
                                        <input type="text" name="grade_mod" id="grade_mod" class="form-input input-5">
                                    </div>
                                    <div class="form-group">
                                        <label class="label-2" for="cc_mod">Cost Center :</label>
                                        <input type="text" name="cc_mod" id="cc_mod" class="form-input input-5">
                                    </div>
                                    <div class="form-group ">
                                        <label class="label-2" for="start_mod">Start :</label>
                                        <select type="text" name="start_mod" id="start_mod" class="form-input input-5">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                        </select>
                                    </div>
                                    <div class="form-group ">
                                        <label class="label-2" for="end_mod">End :</label>
                                        <select type="text" name="end_mod" id="end_mod" class="form-input input-5">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="label-2" for="cc_pay_mod">Cost Center Payroll:</label>
                                        <input type="text" name="cc_pay_mod" id="cc_pay_mod" class="form-input input-5">
                                    </div>
                                    <div class="form-group">
                                        <label class="label-2" for="grouping_mod">Grouping :</label>
                                        <input type="text" name="grouping_mod" id="grouping_mod" class="form-input input-5">
                                    </div>
                                    <div class="form-group">
                                        <label class="label-2" for="job_pos_mod">Job Position :</label>
                                        <input type="text" name="job_pos_mod" id="job_pos_mod" class="form-input input-5">
                                    </div>
                                    <div class="form-group">
                                        <label class="label-2" for="ent_mod">Entity :</label>
                                        <input type="text" name="ent_mod" id="ent_mod" class="form-input input-5">
                                    </div>
                                    <div class="form-group">
                                        <label class="label-2" for="remark_mod">Remark :</label>
                                        <input type="text" name="remark_mod" id="remark_mod" class="form-input input-5">
                                    </div>
                                    <div class="form-group">
                                        <label class="label-2" for="note_mod">Notes :</label>
                                        <input type="text" name="note_mod" id="note_mod" class="form-input input-5">
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