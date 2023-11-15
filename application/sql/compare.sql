CREATE TEMPORARY TABLE temp_result AS
SELECT 
    t_gid, t_local_emp_id, t_sfid, t_full_name, t_job_family, t_job_position, t_dept, t_job_title, t_hay_grade, t_cc_code, t_cc_payroll, t_company, t_grouping, t_dob, t_jog, t_gender, t_eoc, t_contract_status, t_contract_type, t_hod1, t_hod1_email, t_hod2, t_hod2_email, t_hod3, t_hod3_email 
FROM internal.tb_temp_emp
EXCEPT
SELECT 
    gid, local_emp_id, sfid, full_name, job_family, job_position, dept, job_title, hay_grade, cc_code, cc_payroll, company, "grouping", dob, jog, gender, eoc, contract_status, contract_type, hod1, hod1_email, hod2, hod2_email, hod3, hod3_email  
FROM internal.tbm_emp;

UPDATE internal.tbm_emp cur
SET
    local_emp_id = tr.t_local_emp_id,
    sfid = tr.t_sfid,
    full_name = tr.t_full_name,
    job_family = tr.t_job_family,
    job_position = tr.t_job_position,
    dept = tr.t_dept,
    job_title = tr.t_job_title,
    hay_grade = tr.t_hay_grade,
    cc_code = tr.t_cc_code,
    cc_payroll = tr.t_cc_payroll,
    company = tr.t_company,
    "grouping" = tr.t_grouping,
    dob = tr.t_dob,
    jog = tr.t_jog,
    gender = tr.t_gender,
    eoc = tr.t_eoc,
    contract_status = tr.t_contract_status,
    contract_type = tr.t_contract_type,
    hod1 = tr.t_hod1,
    hod1_email = tr.t_hod1_email,
    hod2 = tr.t_hod2,
    hod2_email = tr.t_hod2_email,
    hod3 = tr.t_hod3,
    hod3_email = tr.t_hod3_email
FROM temp_result tr
WHERE cur.gid = tr.t_gid;


INSERT INTO internal.tbm_emp (gid, local_emp_id, sfid, full_name, job_family, job_position, dept, job_title, hay_grade, cc_code, cc_payroll, company, "grouping", dob, jog, gender, eoc, contract_status, contract_type, hod1, hod1_email, hod2, hod2_email, hod3, hod3_email  )
SELECT
    t_gid, t_local_emp_id, t_sfid, t_full_name, t_job_family, t_job_position, t_dept, t_job_title, t_hay_grade, t_cc_code, t_cc_payroll, t_company, t_grouping, t_dob, t_jog, t_gender, t_eoc, t_contract_status, t_contract_type, t_hod1, t_hod1_email, t_hod2, t_hod2_email, t_hod3, t_hod3_email 
FROM temp_result tr
WHERE NOT EXISTS (
    SELECT 1
    FROM internal.tbm_emp cur
    WHERE cur.gid = tr.t_gid
);

DROP TABLE temp_result;
