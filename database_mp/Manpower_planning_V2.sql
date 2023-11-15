-- This script was generated by the ERD tool in pgAdmin 4.
-- Please log an issue at https://redmine.postgresql.org/projects/pgadmin4/issues/new if you find any bugs, including reproduction steps.
BEGIN;


DROP TABLE IF EXISTS internal.tbm_emp;

CREATE TABLE IF NOT EXISTS internal.tbm_emp
(
    gid text,
    local_emp_id text,
    sfid text,
    full_name text,
    job_family text,
    job_position text,
    dept text,
    job_title text,
    hay_grade text,
    cc_code text,
    cc_payroll text,
    company text,
    "grouping" text,
    start text,
    "end" text,
    dob text,
    jog text,
    gender text,
    eoc text,
    contract_status text,
    contract_type text,
    hod1 text,
    hod1_email text,
    hod2 text,
    hod2_email text,
    hod3 text,
    hod3_email text
);

DROP TABLE IF EXISTS internal.tb_temp_emp;

CREATE TABLE IF NOT EXISTS internal.tb_temp_emp
(
    gid text,
    local_emp_id text,
    sfid text,
    full_name text,
    job_family text,
    job_position text,
    dept text,
    job_title text,
    hay_grade text,
    cc_code text,
    cc_payroll text,
    company text,
    "grouping" text,
    start text,
    "end" text,
    dob text,
    jog text,
    gender text,
    eoc text,
    contract_status text,
    contract_type text,
    hod1 text,
    hod1_email text,
    hod2 text,
    hod2_email text,
    hod3 text,
    hod3_email text
);

DROP TABLE IF EXISTS internal.tbm_rev;

CREATE TABLE IF NOT EXISTS internal.tbm_rev
(
    rev_id bigserial,
    year character varying(4),
    rev_no integer,
    date_start date,
    date_end date,
    status smallint,
    created_by text,
    created_date timestamp without time zone,
    modified_by text,
    modified_date timestamp without time zone,
    is_dlt bit,
    PRIMARY KEY (rev_id)
);

COMMENT ON COLUMN internal.tbm_rev.status
    IS '0 = draft, 1 = new, 2 = on going, 3 = completed';

DROP TABLE IF EXISTS internal.tbm_rev_sch;

CREATE TABLE IF NOT EXISTS internal.tbm_rev_sch
(
    rev_sch_id bigserial,
    rev_id bigint,
    hod1 bit,
    hod2 bit,
    hod3 bit,
    start date,
    "end" date,
    status smallint,
    created_by text,
    created_date timestamp without time zone,
    modified_by text,
    modified_date timestamp without time zone,
    is_dlt bit,
    PRIMARY KEY (rev_sch_id)
);

DROP TABLE IF EXISTS internal.tb_draft_m_planning;

CREATE TABLE IF NOT EXISTS internal.tb_draft_m_planning
(
    m_planning_id bigserial,
    rev_id bigint,
    position_no smallint,
    sfid text,
    special bit,
    local_emp_id text,
    full_name text,
    dept text,
    job_title text,
    job_family text,
    job_position text,
    hay_grade text,
    cc_code text,
    cc_payroll_code text,
    company text,
    "grouping" text,
    start smallint,
    "end" smallint,
    remark text,
    notes text,
    approval smallint,
    hod1 text,
    hod1_email text,
    hod2 text,
    hod2_email text,
    hod3 text,
    hod3_email text,
    created_by text,
    created_date timestamp without time zone,
    modified_by text,
    modified_date timestamp without time zone,
    is_dlt bit,
    PRIMARY KEY (m_planning_id)
);

COMMENT ON COLUMN internal.tb_draft_m_planning.approval
    IS '0 => HRBP, 1 => HOD1, 2 => HOD2, 3 => HOD3';

DROP TABLE IF EXISTS internal.tb_m_planning;

CREATE TABLE IF NOT EXISTS internal.tb_m_planning
(
    m_planning_id bigserial,
    rev_id bigint,
    position_no smallint,
    sfid text,
    special bit,
    local_emp_id text,
    full_name text,
    dept text,
    job_title text,
    job_family text,
    job_position text,
    hay_grade text,
    cc_code text,
    cc_payroll_code text,
    company text,
    "grouping" text,
    start smallint,
    "end" smallint,
    remark text,
    notes text,
    hod1 text,
    hod1_email text,
    hod2 text,
    hod2_email text,
    hod3 text,
    hod3_email text,
    created_by text,
    approval smallint,
    created_date timestamp without time zone,
    modified_by text,
    modified_date timestamp without time zone,
    is_dlt bit,
    PRIMARY KEY (m_planning_id)
);

COMMENT ON COLUMN internal.tb_m_planning.approval
    IS '0 => HRBP, 1 => HOD , 2 => HOD2, 3 => HOD3';

DROP TABLE IF EXISTS internal.tb_m_user;

CREATE TABLE IF NOT EXISTS internal.tb_m_user
(
    username text,
    gid text,
    email text,
    user_type smallint,
    level_user smallint,
    password text,
    status smallint,
    created_by text,
    created_date timestamp without time zone,
    modified_by text,
    modified_date timestamp without time zone,
    is_dlt bit,
    PRIMARY KEY (username)
);

DROP TABLE IF EXISTS internal.tbm_modules;

CREATE TABLE IF NOT EXISTS internal.tbm_modules
(
    modules_id bigserial,
    modules_code text,
    parents_code text,
    modules_name text,
    description text,
    PRIMARY KEY (modules_id)
);

DROP TABLE IF EXISTS internal.tbm_level_access;

CREATE TABLE IF NOT EXISTS internal.tbm_level_access
(
    level_access_id bigserial,
    level_user smallint,
    user_type smallint,
    description text,
    PRIMARY KEY (level_access_id)
);

DROP TABLE IF EXISTS internal.tb_access_modules;

CREATE TABLE IF NOT EXISTS internal.tb_access_modules
(
    access_module_id bigserial,
    level_access_id bigint,
    modules_id bigint,
    read bit,
    edit bit,
    add bit,
    delete bit,
    print bit,
    PRIMARY KEY (access_module_id)
);

DROP TABLE IF EXISTS internal.tb_user_modules;

CREATE TABLE IF NOT EXISTS internal.tb_user_modules
(
    user_modules_id bigserial,
    username text,
    modules_id bigint,
    read bit,
    edit bit,
    add bit,
    delete bit,
    print bit,
    created_by text,
    created_date timestamp without time zone,
    modified_by text,
    modified_date timestamp without time zone,
    is_dlt bit,
    PRIMARY KEY (user_modules_id)
);

ALTER TABLE IF EXISTS internal.tbm_rev_sch
    ADD FOREIGN KEY (rev_id)
    REFERENCES internal.tbm_rev (rev_id) MATCH SIMPLE
    ON UPDATE NO ACTION
    ON DELETE NO ACTION
    NOT VALID;


ALTER TABLE IF EXISTS internal.tb_draft_m_planning
    ADD FOREIGN KEY (rev_id)
    REFERENCES internal.tbm_rev (rev_id) MATCH SIMPLE
    ON UPDATE NO ACTION
    ON DELETE NO ACTION
    NOT VALID;


ALTER TABLE IF EXISTS internal.tb_m_planning
    ADD FOREIGN KEY (rev_id)
    REFERENCES internal.tbm_rev (rev_id) MATCH SIMPLE
    ON UPDATE NO ACTION
    ON DELETE NO ACTION
    NOT VALID;

END;