/*
mysqladmin --version
mysql -u root -p
create databese qihao;
mysql -u root -p < /home/qihao/html/mysql/qihao.sql;
foreign key (position) references wage(position),
show tables;
desc allowance;
*/

use qihao;

/*
drop table if exists wage;
drop table if exists attendance;
drop table if exists salary;
drop table if exists allowance;
drop table if exists employee;
*/
/*

create table employee
(
	id varchar(8) not null,
	name varchar(16) not null,
	sex varchar(8) not null,
	position varchar(32) not null,
	department varchar(32) not null,
	pass varchar(16) not null,
	primary key (id),

	check (sex in ('man', 'woman'))
);

create table wage
(
	position varchar(16) not null,
	money int not null,
	primary key (position),
	check (2000 <= money and money <= 20000)
);

create table attendance
(
	id varchar(8) not null,
	year int not null,
	_month int not null,
	rate float not null,
	primary key (id, _month),
	foreign key (id) references employee(id),
	check (1 <= _month and _month <= 12),
	check (0.0 <= rate and rate <= 1.0)
);

create table salary 
(
	id varchar(8) not null,
	year int not null,
	_month int not null,
	money float not null,
	primary key (id, year, _month),
	foreign key (id) references employee(id),
	check (1 <= _month and _month <= 12),
	check (1000.0 <= money and money <= 20000.0)
);

create table allowance
(
	id varchar(8) not null,
	year int not null,
	hours int not null,
	types varchar(16) not null,
	money int not null,
	primary key (id, year, hours, types),
	foreign key (id) references employee(id),
	check (1 <= hours and hours <= 100),
	check (100 <= money and money <= 5000)
);



insert into employee 
values("001", "qihao", "man", "worker", "code", "001"); 

*/
delimiter ||
drop trigger if exists salary_after_insert_attendance ||
create trigger salary_after_insert_attendance
after insert on attendance
for each row
begin
	set @myposition = (select position from employee where id = new.id);
	set @mybase = (select money from wage where position = @myposition);
	insert into salary values(new.id, new.year, new._month, @mybase*new.rate);
end||
delimiter ;

delimiter ||
drop trigger if exists salary_after_update_attendance ||
create trigger salary_after_update_attendance
after update on attendance
for each row
begin
	set @myposition = (select position from employee where id = new.id);
	set @mybase = (select money from wage where position = @myposition);
	update salary set money=@mybase*new.rate where id=new.id and year=new.year and _month=new._month;
end||
delimiter ;

delimiter ||
drop trigger if exists salary_after_delete_attendance ||
create trigger salary_after_delete_attendance
after delete on attendance
for each row
begin
	delete from salary where id = old.id and year = old.year and _month = old._month;
end||
delimiter ;

/*
DROP TABLE IF EXISTS tab1_qihao;
CREATE TABLE tab1_qihao(
    tab1_id varchar(11)
);
DROP TABLE IF EXISTS tab2_qihao;
CREATE TABLE tab2_qihao(
    tab2_id varchar(11)
);
*/

/*
CREATE TRIGGER t_afterinsert_on_tab1
AFTER INSERT ON tab1_qihao
FOR EACH ROW
BEGIN
	insert into tab2_qihao values(new.tab1_id);
END;
INSERT INTO tab1_qihao(tab1_id) values('0001');
*/

/*
delimiter ||
DROP TRIGGER IF EXISTS t_afterinsert_on_tab1 ||
CREATE TRIGGER t_afterinsert_on_tab1
AFTER INSERT ON tab1_qihao
FOR EACH ROW
BEGIN
	insert into tab2_qihao values(new.tab1_id);
END||
delimiter ;

INSERT INTO tab1_qihao(tab1_id) values('0001');
SELECT * FROM tab1_qihao;
SELECT * FROM tab2_qihao;
*/
/*
drop trigger if exists salary_after_insert_attendance;
create trigger salary_after_insert_attendance
after insert on attendance
for each row
BEGIN
	insert into employee values ("002","qihao","man","worker","code","001");
END;
*/
/*
	declare @myposition varchar(32);
	declare @mybase int(10);
	set @myposition = (select position from employee where id = new.id);
	set @mybase = (select money from wage where position = @myposition);
DROP TRIGGER IF EXISTS t_afterinsert_on_tab1;
insert into salary values(new.id, new.year, new._month, 1000);
CREATE TRIGGER t_afterinsert_on_tab1 

AFTER INSERT ON tab1

FOR EACH ROW

BEGIN

insert into tab2(tab2_id) values(new.tab1_id);

END;
*/







/*
DROP TRIGGER IF EXISTS t_afterdelete_on_tab1;
CREATE TRIGGER t_afterdelete_on_tab1
AFTER DELETE ON tab1
FOR EACH ROW
BEGIN
      delete from tab2 where tab2_id=old.tab1_id;
END;
*/