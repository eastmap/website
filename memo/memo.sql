create table memo(
	num int not null primary key auto_increment,
	id char(15) not null,
	name char(10) not null,
	nick char(10) not null,
	content text not null,
	regist_day char(20)
);