
修改语句：
set中如果把逗号写成and，不会报错，只执行前半句
导入：
source d:/erp.sql;

mysql:软件 的系统   
sqlserver、oracle、access、sqlite、db2、GBASE
sql:structured query language 结构化查询语言
    =》数据进行沟通的语言

DBA：对数据的操作、对数据的维护、数据库系统的稳定、安全
     数据的搬迁、数据的规划

数据库：有序的存储数据的仓库
关系型数据库：存储的对象是有关联关系的
非关系型数据库：

数据：查询-》分析-》产生效益
数羊-》养羊-》卖羊

启动服务：x-> 勾 ->start->config->my.ini->路径 C:/xampp->保存->start->右边shell->welcom....
系统搜索cmd->E:->cd E:/xampp/mysql/bin/->mysql

mysql操作步骤：
0:设置密码：
	mysqladmin -u root -p password 新密码
	enter password:
	mysqladmin -u root -p password 123
1.登陆: (注意：提示符是#)
	1)mysql游客身份
	2)mysql -u root -p
	  enter passworld:***
		验证：show databases;//大概有7个数据库
	3)mysql -u root -h 172.16.0.10 -p 远程访问
	4）mysql -u root -p database
	   mysql -u root -p test
	   mysql -u root -h localhost -p test
	登入进来之后：提示符：  mysql>正常敲命令
				->命令没有输入完，请继续输入;
				'>';
	\c撤销操作 \h帮助 \g分号  \G按行显示
2.查看：
	show databases;查看所有的数据库的名称
	use dbname;    选择数据库/使用数据库
	show tables;查看当前数据库下的所有的表的名称
	select database();返回当前所在数据库的名称
	show columns from tbname;//查看表结构
	desc tbname;//查看表结构
	show create table tbname;//查看表的创建过程
	show index from tbname;//查看索引
	show engines;
3.数据库：
	查看：show databases;
	select database();
	创建数据库：create database dbname;
	删除数据库：drop database dbname;
4.数据库对象：
	表 table
	veiw：视图
	index:索引
	function:函数
	program unit：程序处理单元
		
5.登出：quit; exit;

6.SQL的操作命令有哪些：
	1.查找，显示结果：   select 
	2.数据操作/操纵语言：DML   增删改查
		insert/delete/update/select
	3.数据定义语言DDL
		创建：create
		删除：drop
		修改：alter
		清空：truncate
		重命名：rename
	4.存储单元program unit
	5.事务：
	开启事务：start transaction；
	撤销/回滚：rollback
	设置回滚点：savepoint
	提交：commit;
	6.权限：
		授权：grant
		回收：revoke

	1.查找，显示结果：   select简单看一下
		select count(*) from tbname;//查看一共有多少条
		select * from tbname;//查看表内所有信息
					（数据内容）
		select 函数名(..);
		select password(123);
		select now();
		select sysdate();
		select sleep();
		

三章、数据类型
	整型：
	1B = 8bit    10000000  2^7       0~255  -128~127
		     11111111  2^8-1
	实际存储的位数：
	tinyint  1B
	smallint 2B  
	mediumint 3B
	int	  4B
	bigint    8B

	tinyint(M)  M:显示的位数
	create table test1(id tinyint(2));
	show create table test1;
	insert into test1(id) values(1);
	select * from test1;
	insert into test1(id) values(11);
	insert into test1(id) values(111);
	select * from test1;
	insert into test1(id) values(128);
	 insert into test2(id) values(128);
	insert into test2(id) values(-100);
	insert into test3(id) values(1);
	select * from test3;

	浮点型：
	float/double(M,D) M:总长度，D：小数的长度
			规定多少就是存储的多少，
			但是不能超过最大值
	create table test1(id float(4,2)); -99.99~99.99
	
	字符型：	
	M：存储字符的个数
	1个字母-》1个字符-》1个字节
	1个数字-》1个字符-》1个字节
	1个汉字-》1个字符-》utf8  3个字节
	char(M)   char(4) 固定长度
	varchar(M)varchar(4)可变长度
	'aa'


	enum('10','100','200'):选择一个结果去存储
	set('10','20')   10	20 	10 20  空



mysql> create table test4(name char(4));
Query OK, 0 rows affected (0.17 sec)

mysql> insert into test4(name) values(100);
Query OK, 1 row affected (0.14 sec)

mysql> select * from test4;
+------+
| name |
+------+
| 100  |
+------+
1 row in set (0.00 sec)

mysql> insert into test4(name) values('aaa');
Query OK, 1 row affected (0.08 sec)

mysql> select * from test4;
+------+
| name |
+------+
| 100  |
| aaa  |
+------+
2 rows in set (0.00 sec)

mysql> insert into test4(name) values('aaaaaa');
ERROR 1406 (22001): Data too long for column 'name' at row 1
mysql> create table test5(birthday date);
Query OK, 0 rows affected (0.12 sec)

mysql> insert into test5 values(100);
ERROR 1292 (22007): Incorrect date value: '100' for column 'birthday'
mysql> insert into test5 values(20150821);
Query OK, 1 row affected (0.07 sec)

mysql> select * from test5;
+------------+
| birthday   |
+------------+
| 2015-08-21 |
+------------+
1 row in set (0.00 sec)

mysql> insert into test5 values('20150821');
Query OK, 1 row affected (0.07 sec)

mysql> insert into test5 values('2015-08-21');
Query OK, 1 row affected (0.04 sec)

mysql> insert into test5 values('2015/08/21');
Query OK, 1 row affected (0.04 sec)

mysql> select * from test5;
+------------+
| birthday   |
+------------+
| 2015-08-21 |
| 2015-08-21 |
| 2015-08-21 |
| 2015-08-21 |
+------------+
4 rows in set (0.00 sec)

mysql>

==========================================================================================================================
day02:
DDL:create drop truncate alter rename
对象：database/table/index/view/

一、database
	1.创建：create database dbname;
		use dbname;
	2.删除：drop database dbname;
	3.查看：show databases;
		模糊查询：关键字like,
		两个通配符：% 多个  _一个
		show databases like 't%';
二、table
	1.创建create
		create table tbname;//error
           create [TEMPORARY] table [IF NOT EXISTS] 表名(
			列的定义1,
			列的定义2,
			列名 数据类型 列的约束条件,
			.....
			列的定义N,
			表的约束条件
		)表的选项;

	a)简单的表（没有约束条件，没有表的选项）
		表名t1   
		列1：id,整型
		列2：name ,字符型
		create table t1(
			id int,
			name varchar(30));
	b)temporary临时表：临时处理数据，不经常使用的大数据
		生效：本次连接内
		失效：关闭连接
		create temporary table t2(id int);
	c)if not exists
		program unit1：
		create table t1(id int);
		create table t1(id int);//error
		insert into t1(id) values(3);
		空表t1
		program unit2:
		create table if not exists t2(id int);
		create table if not exists t2(id int);
		create table if not exists t2(id int);
		insert into t2(id) values(3);
		有数据的表t2
	   create table  t1(id int);//error
           create table if not exists t1(id int);//不会报错
	
	约束条件：
	d)非空not null/可空null
	  create table t2(id int null);
	  create table t3(id int,name varchar(30) not null);
	e)default value默认值
	  default 100
	  default 'famale'
	  create table t4(id int,
		name varchar(30) not null default 'briup');
	  t5:姓名(非空)和性别(男male）
		create table t5(
			name varchar(30) not null,
			gender enum('male','famale') 
				default 'male'
		);
		insert into t5(name) values('zhangsan');
		insert into t5(name,gender) values('lisi','famle');
	f)唯一unique
	  t6:姓名(唯一非空)和性别(男male）
		列级约束：  列名 数据类型 unique
		create table t6(
			name varchar(30) unique not null,
			gender enum('male','famale') default 'male');
	insert into t6(name) values('zhangsan');
		表级约束：  unique(列名)
		create table t7(
			name varchar(30) not null,
	gender enum('male','famale') default 'male',
			unique(name));

		t8:
		create table t8(//等价
			id int unique,
			name varchar(30) unique);
		100，zs
		100,lisi //error
		200,zs//error
		200,lisi
		create table t8(//等价
			id int,
			name varchar(30),
			unique(id),
			unique(name));
		create table t8(//不等价
			id int,
			name varchar(30),
			unique(id,name));//联合唯一
		100,zs
		100,lisi//ok
		200,zs//ok
		200,lisi//ok
	g)primary key 主键：一个表中只能有一个主人
	  主键的特性：非空唯一索引
	  速度、不经常改动
	   建表的三大范式
	  唯一：可空 多个 唯一 联合唯一
	  主键：非空 一个 唯一 联合主键
		create table t9(
			id int primary key,//列级约束
			name varchar(30));
		create table t9(
			id int ,
			name varchar(30),
			primary key(id));//表级约束
			关键字(列名1,列名2)
		create table t10(//error 一个
			id int primary key,
			name varchar(30) primary key));	
		create table t11(
			id int,
			name varchar(30),
			primary key(id,name));//联合主键
	h)foreign key：外键:表级约束
		foreign key(外表中列名) 
		references 主表的表名(主表中的列名)
		1.foreign key：必须是表级约束
		2.引擎必须是innodb
		3.参照完整性：外表中不能出现主表以外的数据
			      外表中的数据<=主表的数据
		4.数据类型要一致
		5.不能直接删除在外表有对应关系的主表中的数据
			先删除外表中的数据
			再删除主表中的数据
		6.主表中对应的列是主键，外表中对应的列是外键
		  主表中也可以对应的列是 非空、唯一、索引
		7.外键中对应的列名的个数等于主表中主键的个数
		create table t9(//主表
			id int primary key,//列级约束
			name varchar(30))engine=innodb;
		create table t10(//外表
			id int ,
			name varchar(30),
			id2 int,
			foreign key(id2) references t9(id)
			)engine=innodb;
		江湖排名表：
		高手1      排名    机构
		孙悟空     13	  西游记
		//东方不败   10     笑傲江湖
		张无忌	   9	  倚天屠龙记
		乔峰	   8	  天龙八部
		
		江湖信息表：江湖百晓生
		高手2     地址  武器  信用等级
		//东方不败  黑木崖 针	100
		张无忌	  光明顶 手	200
		乔峰	  丐帮	手	300 
		岳不群	 华山	君子剑	-100//error

		create table pk_rank(
			name varchar(30) primary key,
			no   int not null unique,
			org  varchar(30) 
		)engine=innodb default charset=gbk;
		create table fk_detail(
			name varchar(30),
			address varchar(30),
			weapon varchar(30),
			credit int,
			foreign key(name) 
			references pk_rank(name)
		)engine=innodb default charset=gbk;
		insert into pk_rank(name,no,org) 
			values('孙悟空',13,'西游记');
		insert into 
			fk_detail(name,address,weapon,credit) 
			values('岳不群','华山','君子剑',-100);
	i)自增：auto_increment
		a[] = 1;
		a[] = 'a';
		a[] =  'b';
		a[11] = 'c';
		a[] = 12;
		1.数据类型：整型
		2.默认起始值是1，先录入数据，再每次增加1
		3.从最大值开始加1；
		4.必须是primary key/非空唯一索引
		create table t14(
			id int primary key auto_increment,
			name varchar(30));
		在定义的时候给定默认值的起始值
		create table t16(
			id int primary key auto_increment,
			name varchar(30)
			) auto_increment=10000;
	j)table_opiton
		create table tbname(
		....
		...)engine=myisam auto_increment=100 
			default charset=utf8;
	总结：	
	列级约束：列的定义中，作用对象：只是该列
	表级约束: 所有定义之后，作用对象：所有列
	联合约束：是表级约束的一种，选取多个列
		 联合唯一：全部一样才是重复的

			列级约束	 表级约束 联合约束   多个
	not null/null	Y	 N		N	Y
	default		Y	N		N	Y
	unqiue		Y	Y		Y	Y
	primary key	Y	Y		Y	N	
	foreign key	N	Y		Y	Y
	key		Y	Y		Y	Y
	index		N	Y create	Y	Y  
	auto_increment  Y	N		N	N

	学生信息表s_info
	编号  自增1 主键
	学号no 自增20150000
	姓名  非空
	性别  默认值：男male
	===》不可以两个自增，因为会自动翻译成两个主键，不行的

RDBS
	练习题：
	学生信息表s_info
	学号no 自增20150000
	姓名  非空
	性别  默认值：男male
	
	学生成绩表：
	编号：id 递增：1
	科目：type
	成绩：mark
	学号

	2.销毁drop
		drop table tbname;
	3.清空truncate，将自增恢复初始值1
		truncate tb_name;
	4.修改alter
	5.重命名rename
		rename old_tbname to new_tbname;
三、index：必须依赖于表
	index/key
	key:列级约束、表级约束
	index:表级约束、独立建立
	1.创建
		a)create table tbname(
			列的完整的定义1 key,
			列的完整的定义1,
			....,
			列的完整的定义N,
			key k_name(列的名字),
			index idx_name(列名)
		 );
		b)create index idx_name on tbname(列名);
	2.删除：
		drop index idx_name on tbname;
四、view视图
	create view v_name as select id,name from test;
	drop view v_name;


====================================================================================
day03:
一、database
二、table
	1.创建create
	2.销毁drop
	3.清空truncate
	4.修改alter
	语法：ALTER [IGNORE] TABLE tbl_name alter_spec [, alter_spec ...] 
	help alter table;

	a. 创建一张alter_test表，列id int   
	需求1：往alter_test表中增加一列name varchar(20) 非空唯一  
	目的：增加列
	create table alter_test(id int);
	show create table alter_test;
	alter table alter_test 
	add column name varchar(20) not null unique; 

	需求2：将name列设置为索引列，索引名字为name_index  
	目的：增加索引
	alter table alter_test add index name_index(name);
	create index name_index on alter_test(name);

	需求3：将id列设置为主键列  
	目的：增加主键
	alter table alter_test add primary key(id);

	需求4：往alter_test表中先增加一列no int,
	       然后用alter语句更新表中的no列，加上唯一约束。
	目的：增加唯一性  
	alter table alter_test add column no int;
	alter table alter_test add unique(no);

	需求5：将name列的默认值设置为'aaa'  
	目的：单独修改已经存在列属性：新增默认值
 	alter table alter_test 
	alter column name set default 'aaa';

	需求6：将name的默认值删除  
	目的：单独修改已经存在列属性：删除默认值
	alter table alter_test
	alter column name drop default;

===========================
面试常考：
	注意：用change和modify的时候会将原来的约束覆盖，因此可以通过show create table tb_name获得原有的约束，
		一定要将原有的约束原封不动的加上，不然会丢失。

=========================== 
	需求7：将no列修改成alter_test_no int(20) not null unique. 
	目的：整体修改已经存在列属性（同时重命名列） 
	altert table alter_test 
	change no 
	alter_test_no int(20) not null unique;
	
	已知表名t1中列：name varchar(30) unique; 
	要求：增加not null的约束
	alter table t1 
	change name 
	name varchar(30) not null unqiue;
	alter table t1
	modify name varchar(30) not null unique;

	需求8：将alter_test_no列数据类型修改成int(21)
	目的：整体修改已经存在列属性
	show create table alter_test;
	---alter_test_no int(20) not null unique;
	alter table alter_test
	modify alter_test_no int(21);//error
	show create table alter_test;
	---alter_test_no int(21);

	alter table alter_test
	modify alter_test_no int(21) not null unique;

	需求9:删除alter_test_no列  
	目的：删除列
	alter table alter_test drop column alter_test_no;

	需求10：删除name列的索引约束  
	目的：删除索引
	alter table alter_test drop index name_index;
	show create table alter_test;
	show index from alter_test;

	需求11：删除id的主键约束  
	目的：删除主键
	alter table alter_test drop primary key;

	需求12：将表的名字alter_test改成alter_test2  
	目的：修改表名
	rename alter_test to alter_test2;
	alter table alter_test rename as alter_test2;

	需求13：将表alter_test2的数据引擎改成myisam
	目的：修改数据引擎
	alter table alter_test engine=myisam;
	alter table alter_test default charset=gbk;//不建议
	建议在create的时候给定好

	b.创建一张alter_test表，列id int   
          插入重复数据 insert into ai_test values(1),(1),(1),(2),(3); 
	需求14：将id列设置为主键列  
	目的：去重复数据，增加主键
	alter table alter_test add primary key(id);//error
	alter ignore table alter_test add primary key(id);

	c.怎样增加外键约束？  
	实现：创建两张表
		create table alter_test_pk(id int primary key);  
		create table alter_test_fk(id int primary key,fk_id int); 
	需求15：将alter_test_fk中的fk_id列外键关联alter_test_pk表中的id列  
	1.引擎：
	alter table alter_test_pk engine=innodb;
	alter table alter_test_fk engine=innodb;
	2.主表：加key
	3.数据类型是否一样
	alter table alter_test_fk
	add foreign key(fk_id) references alter_test_pk(id);

	需求16：将alter_test表重命名alter_test2

	表1=》表2
	注意：	
		使用ALTER TABLE要极为小心，应该在进行改动前做一个完整的备份
		（模式和数据的备份）。
		数据库表的更改不能撤销，如果增加了不需要的列，可能不能删除它们。
		类似地，如果删除了不应该删除的列，可能会丢失该列中的所有数据。

	5.重命名rename
三、index：必须依赖于表
四、view


===========================================================
ch04:dml:增insert删delete改update查select
	对象：table里面的数据：记录
	CRUD：'create' retrieve update delete
一、增加insert
	1.insert into tbname(列名1,列名2,...)
		 values(值1,值2..);
	  列名是表中新建时候对应的列，可以不按新建顺序写，
	  可以不写全
	  不写的列名：可以空，或者有默认值
	  列名和值的个数相同，并且一一对应
	2.insert into tbname(列名1,列名2,...)
		 values(值1,值2..),(值1,值2..),...(值1,值2..);
	  一次插入多条数据，所需的注意事项和1是一样的
	3.insert into tbname
		 values(值1,值2..);
	  不写列名：代表所有的列都要插入
		顺序：show create 
		风险：顺序就弄错了，表结构变了（新增/删除）
	4.insert into tbname
		 values(值1,值2..),(值1,值2..),...(值1,值2..);
	  一次插入多条数据，所需的注意事项和3是一样的
	5.insert into tbname(列名1,列名2,...)
		select ....;拷贝、备份、指定数据的移动
	  insert into t2 as select * from t1;
	  insert into t3(n,a) as select name,address from t1;
	
	a)要满足数据的完整性：
		实体完整性、参照完整性、用户自定义完整性
	  	inset into t1(id) values(1),(1),(1);		
	  	inset into t1(id,fk_id) values(1,2);
		'briup' 'BRIUP' '杰普'
	b)插入的数据：除了整型、浮点型以外都要加单引号
	练习：用户信息表 info
		编号id 整型 自增 主键
		姓名name不定长30 非空唯一
	   	性别gender枚举1 0
		年龄age无符号的整型 默认值0
		地址address 不定长50 默认值是空字符串
		插入数据：
		id name gender age address
		1  zs	1	0	''
		2  li	1	0	''
		3  si	0	0	''
		4  wang 0	20	'ks'
		5  wu	0	23	'sh'
		6  chen	1	23	'ks'
		7  liu	1	24	'sh'
		create table if not exists info(
			id int auto_increment primary key,
			name varchar(30) not null unique,
			gender enum('1','0'),
			age  int unsigned default 0,
			address varchar(50) default ''
		);
		//指定单独几个列的多条插入方法4
		insert into info(name,gender) 
		values('zs','1'),('li','1'),('si','0');
		//方法1
		insert into info(id,name,gender,age,address) 
		values('wang','0',20,'ks');//error
		insert into info(id,name,gender,age,address) 
		values(,'wang','0',20,'ks');//error
		insert into info(id,name,gender,age,address) 
		values(null,'wang','0',20,'ks');
		//方法3
		insert into info 
		values('wu','0',23,'sh');//error
		insert into info 
		values(null,'wu','0',23,'sh');
		//方法2
		insert into info
		values(null,'chen','1',23,'ks'),
		(null,'liu','1',24,'sh');


二、删除delete
	delete from tbname;//清空所有的数据
		三者之间的不同：
		delete from t1;
		truncate t1;
		drop t1;
	清空指定的数据:
	delete from tbname where 表达式;
	算术操作符、逻辑操作符
	表达式的组成：逻辑操作符 
	表达式的结果：布尔、范围
	逻辑操作符：
		逻辑比较操作符：> < = != >= <=
		逻辑连接操作符：and && or || ! 
	习惯：查看你要删除的结果是否是你想删除的
	重要：select * from tbname where 表达式
	删除24岁的人：
	delete from info where age=24;
	删除大于22岁的人
	delete from info where age>22;
	delete from info where age+1>22;
	删除大于22岁的人小于24岁的人
	delete from info where age>22 and  age<24;
	删除大于22岁的人并且不等于24岁的人
	delete from info where age>22 and  age!=24;
	删除大于23岁的人或者没有地址的人
	select * from info where age>23 or address='';
	delete from info where age>23 or address='';
三、修改update
	update tbname set 列名=值;//1.所有的内容
	update info set address='shanghai';
	2.指定想修改的记录：
	update tbname set 列名=值 where 表达式;
	将空字符串的地址统一都修改成shanghai
	重要：select * from info where address='';
	update info set address='shanghai' where address='';
	3.一次同时修改多个列的值
	update tbname set 列名=值,列名1=值2,..,列名N=值N;
	update tbname
		set 列名=值,列名1=值2,..,列名N=值N where ..;

	将值姓名=》姓名id 需要函数
	id name  name
	1  zs    zs1
	2  li    li2
	update info set name=name+id;

	将所有人的年龄增加1
	update info set age=age+1;
	将空字符串的地址统一变成'shanghai'，姓名变成'zs'
	update info set address='shanghai',gender='0' 
	where address='';

四、查询select:函数、where

========
cmd: set names gbk;
php: set names utf8;
========
========================================================================================================================
day04:select
一、简单的语法：
	select * from tbname;//*指代所有列名的快捷方式
	select 列名1,列名2,...,列名N from tbname;
	select 选择列名 from tbname where 表达式;//限制
二、选择列
	1.distinct:去除重复数据，紧挨着select
	  查看员工表中部门编号有哪些
	  select distinct dept_id from s_emp;
	  查看员工的部门编号和职位，不重复的出现
		44 sales
		44 dba
		43 sales
	  select distinct dept_id,title  from s_emp
	2.简单的算术操作符 + - * / mod() abs() round()
		查看员工的工资
		select last_name,salary from s_emp;
		select last_name,salary*12 from s_emp;
		select salary from s_emp;
		select sum(salary) from s_emp;//所有人的总工资
		select avg(salary) from s_emp;
	3.字符串相关的函数
		concat(参数1,参数2,...,参数N)
		select first_name,last_name from s_emp;
		 select concat(first_name,'#',last_name)
			 from s_emp;
	4.重名名列、起别名
		列名1 new列名1 , 列名2 as new列名2
		获得员工的全名name:
		select concat(first_name,'#',last_name) 
			as name from s_emp;
		获得每个员工的编号，月工资month_salary，
			年工资year_salary:
		 select id,salary as month_salary,
			salary*12 as year_salary from s_emp;
	5.对于NULL显示的处理 ifnull(列名,指定的值)
		select id,salary from s_emp where id=26;
		select id,ifnull(salary,0) 
			from s_emp where id=26;
		select id,ifnull(salary,0) as month_salary,
			ifnull(salary*12,0) as year_salary 				from s_emp;
	6.时间函数：
		秒数-》日期
		日期-》指定格式日期
		日期-》秒数
		日期进行加减法
		select 
		date_format(now(),'%Y %m %d %h:%i:%s');
三、WHERE
	where 表达式;
	表达式的组成：
	where  (列名 操作符 值) 
		and (列名 操作符 值) 
		or (列名 操作符 值) 
		&& (列名 操作符 值) 
		|| (列名 操作符 值) 
	1.算术操作符：
		NULL:一定要特殊处理，不参与任何其他的操作符比较
		> < = >= <= 
		= 判断是否相等:数值/字符串
		!= 不等  <>不等
		<=>判断是否相等：NULL
		select id,salary from s_emp
		where salary<=>NULL
		select id,salary from s_emp where salary<500;
	2.逻辑操作符
		a)列名 between 值1 and 值2  [值1,值2]
		  列名 not between ..  and .. 
			（-无穷,值1)或者(值2,+无穷)
			$a<750 ||  $a>1400
		b) 列名 in(值1,值2,值3)在这个范围枚举的值里面
	           列名 not in(值1,值2,值3)
			$a==1 or $a==2 or $a==3
			列名=1 or 列名=2 or 列名=3
			列名!=1 and 列名!=2 and 列名!=3
		    求客户的总人数,不是由员工编号11和12负责的
		     select count(*) from s_customer
			where sales_rep_id not in(11,12);
		     select id from s_emp where dept_id=41;
		c) is null
		    is not null
		d)like:模糊匹配的结果
		  not like:模糊匹配的结果
			匹配符号：
			%:0至多个
			_:一个
			\:转义
		 where name like 'a';
		 where name='a';
		  找员工名以c开头
		  select last_name from s_emp
			where last_name like 'c%';
		  找员工，员工的职位是五位字符以上
		  select id,title from s_emp
			where title like '_____%';
		  找员工名，名字中含有引号'
		  select id,last_name from s_emp
			where last_name like '%\'%';
	3.逻辑连接符 
		and  &&  并且，同时满足
	  	or  ||  或，只要满足一个即可
		优先级：and>or
		要主动加上圆括号
		部门编号是41号工资大于1000元或者
		部门编号是42号工资小于2000的员工有哪些：
		select id,last_name,dept_id,salary
		from s_emp
		where (dept_id=41 and  salary>1000)
			or
		      (dept_id=42  and salary<2000);
四、group by：分组  以。。。来分组
	分组之后要显示的数据，只能是组的概念的
	
	对个人要显示的话，用where去限制
	//查看41号部门的员工有哪些->where
	//查看每个部门的人数
		select dept_id,count(*) from s_emp
			group by dept_id;
	1.用来分组的列
		部门和职位来分组，对应的总人数
		select dept_id,title,count(*)
		from s_emp
		group by dept_id,title;
	2.组函数:select后面，havig后面
		count(*)个数
		sum()：
		求每个部门的总工资：
		select dept_id,sum(salary) as sumsalary
		from s_emp
		group by dept_id;
		avg():
		select dept_id,avg(salary) as avgsalary
		from s_emp
		group by dept_id;
		max():
		min():		
		select dept_id,max(salary),min(salary),
			avg(salary)
		from s_emp
		group by dept_id;
五、having:过滤分组后的条件
	   分组之前、个体，限制：where
		select dept_id,sum(salary) as sumsalary
		from s_emp
		group by dept_id;
		select dept_id,sum(salary) as sumsalary
		from s_emp
		group by dept_id
		having sum(salary)<2000;
		select dept_id,count(*) num
		from s_emp
		group by dept_id
		having count(*)<=1;

		//select name from s_dept where id in ();
六、order by:排序 asc升序   desc降序
	order by 列名 asc;
	order by 列名 [asc],列名 [desc/asc];
	要求对员工表进行排序，按部门号升序，在部门内按职位降序
	select id,dept_id,title
	from s_emp
	order by dept_id asc,title desc;
1.汇总部门平均工资大于1000,结果按平均工资降序排序
	select dept_id,avg(salary) as avgss
	from s_emp
	group by dept_id
		having avg(salary)>1000
	order by avgss desc ;
2.汇总部门平均工资大于1000,并且职位不是以VP开头的，结果按平均工资降序排序
	验证where:
	select dept_id,titlte,id from s_emp
	where title not like 'VP%';

	select dept_id,avg(salary)
	from s_emp
	where title not like 'VP%'
	group by dept_id
	 having avg(salary)>1000
	order by avg(salary) desc;

七、limit:限制行数、条数
	纯数字，不做运算，
	limit num;num显示的条数，长度
	limit start,num;start:起始位置，num：长度
	limit 2;
	limit 4,2;
	 id= 1 2 3 4 5
 	 po= 0 1 2 3 4

	limit start,num;分页
	s_emp:id 1~26
	      位置：  0~25
	      总个数： 26  count(*)
	      每页显示5条
	      第1页：   0~4
		2	5~9
		3	10~14

	select id from s_emp order by id
	$start = ($current_page-1)*$every_num
	limit $start,$every_num;


	Select  列名1,列名2	← 查询要显示的列结果
	
From  表名 		← 数据库中表名
  
	Where  查询条件	← 条件表达式
  
	GROUP BY 列名	← 列进行分类（分组）
    
		HAVING 分组条件	← 列进行分组满足的条件表达式
  	ORDER BY 列名	← 列进行排序：升序/降序	
	LIMIT start,num
========================================================================================================================================================================
day05:
一、子查询方式：
	查询的结果是另一个查询的条件
select ...
from ...
where 列名 比较操作符 (select ... from ...wgo)
group by ..
	having 组函数 比较操作符 (select .. from .. wgo)
order by
limit
	需求：查询和'Chang'员工一样的职位的员工信息
	1.父句
		select id,last_name,title from s_emp 
		where title=(?) ;
	2.子句
		验证//select title,last_name from s_emp 
		where last_name='Chang';
		select title from s_emp 
		where last_name='Chang';
	3.组合
		select id,last_name,title from s_emp 
		where title=(select title from s_emp 
		where last_name='Chang')
	需求：查询比平均工资低的员工信息有哪些？
	1.父句：
		select id,last_name,salary from s_emp
		where salary<(?);
	2.子句：
		select avg(salary) from s_emp;
	3.组合：
		select id,last_name,salary from s_emp
		where salary<(select avg(salary) from s_emp);

	需求：3.查看部门与员工名字为Chang的员工所在部门相同，或者与区域为2的部门相同的部门所有员工的id和名字
	1.父句：
		select id,last_name,dept_id from s_emp
		where dept_id=(?) or dept_id in (?)
	2.子句1：
		select dept_id from s_emp 
		where last_name='Chang';
	3.子句2：
		select id  from s_dept where region_id=2;
	4.组合：
		select id,last_name,dept_id from s_emp
		where dept_id=(select dept_id from s_emp 
		where last_name='Chang')  or dept_id in 
		(select id  from s_dept where region_id=2);
	需求：4.查看部门平均工资大于32号部门平均工资的部门id
	1.父句
		select dept_id,avg(salary) from s_emp
		group by dept_id 
		having avg(salary)>(?);
	2.子句：
		select avg(salary) from s_emp 
		where dept_id=32;
	3.组合：
		select dept_id,avg(salary) from s_emp
		group by dept_id 
		having avg(salary)>
		(select avg(salary) from s_emp 
		where dept_id=32);

	需求：5.查看工资大于Smith所在部门平均工资的员工id和姓名
	1.父句：查看员工id和姓名和工资，工资大于？
		select id,last_name,salary where salary>(?);
	2.子句：某个部门的平均工资，部门编号=？
		select avg(salary) from s_emp 
		where dept_id=(?)
	3.子子句：Smith所在的部门编号
		select dept_id from s_emp 
		where last_name='Smith';
	4.组合
		select id,last_name,salary where salary>(
		select avg(salary) from s_emp 
		where dept_id=(
			select dept_id from s_emp 
			where last_name='Smith'));

	练习：查看薪资高于Chang员工经理薪资的员工信息


	1.父句：查看员工信息，薪资高于XXX
		select id,last_name,salary from s_emp
		where salary>(?);
	2.子句：经理的薪资，某个人的薪资，id=?	
		select salary from s_emp where id=(?)
	3.子子句：Chang员工的上级编号
		select manager_id from s_emp where 
		last_name='Chang'
	4.组合：

	练习：查看薪资高于（Chang员工经理的经理所在区域的）最低工资的员工的信息


	1.父句：查看员工信息，薪资高于XXX
	2.子句：求最低工资，给定的几个部门编号
	3.子子句：求好几个部门编号，给定某个区域编号
	4.子子子句：求区域编号，给定某个部门编号
	5.求某个部门编号，给定某个人的编号id=manger_id
	6.Chang员工经理的编号

	练习：查看所有负责客户的员工的总工资
	1.父句：查看总工资，给定几个员工编号
		select sum(salary) from s_emp
		where id in(?)
	2.子句：客户表中的销售员编号
		select distinct sales_rep_id from s_customer
		where sales_rep_id is not null;
	3.组合
		select sum(salary) from s_emp
		where id in(
		select distinct sales_rep_id from s_customer
		where sales_rep_id is not null);

	练习：查看所有负责客户的员工的最高工资
	select max(salary) from s_emp
		where id in(
		select distinct sales_rep_id from s_customer
		where sales_rep_id is not null);
	练习：查看工资大于客户负责员工最高工资的员工信息
	1.父句：查看员工信息，工资大于XX
	2.子句：上个练习
	3.组合：
		select id,last_name,salary from s_emp
		where salary>(select max(salary) from s_emp
		where id in(
		select distinct sales_rep_id from s_customer
		where sales_rep_id is not null));


	练习：查看客户负责员工中工资大于Chang员工的工资的员工信息

	1.父句：查看员工信息，工资大于>XX  并且  id in (销售员)
	2.子句：	Chang员工的工资
	3.子句：有客户的销售员的编号	

	练习：查看部门平均工资大于Chang所在部门平均工资的部门id

	1.父句：查看部门编号、平均工资，平均工资》？
	2.子句：某个部门的平均工资
	3.子子句：Chang所在的部门编号

	练习：查看Chang员工所在部门其他员工薪资总和

	1.父句：某个部门的其他员工薪资总和
，不包含Chang
	2.子句：Chang员工所在部门
	3.组合：
		select sum(salary) from s_emp
		where last_name!='Chang' and
		dept_id = (
			select dept_id from s_emp
			where last_name='Chang'
		)

	练习：查询工资大于41号部门平均工资的员工,
	并且该员工所在部门的平均工资也要大于41号部门的平均工资

	1.父句：员工，限制条件：工资>?,  某个部门内的
		select id,last_name,salary,dept_id from s_emp
		where salary>(?) and dept_id in ()
	2.子句：41号部门平均工资
		select avg(salary) from s_emp
		where dept_id=41;
	2.子句：查看部门编号、平均工资，平均工资》？
		select dept_id,avg(salary) from s_emp
		group by dept_id
		having avg(salary)>(?)
	3.子子句：41号部门的平均工资
		select avg(salary) from s_emp
		where dept_id=41;
	4.组合：
		select id,last_name,salary,dept_id from s_emp
		where salary>(
			select avg(salary) from s_emp
			where dept_id=41
		) and dept_id in (
		select dept_id from s_emp
		group by dept_id
		having avg(salary)>(
			select avg(salary) from s_emp
			where dept_id=41
		)
		)

二、子查询：
	查询的结果是主查询的对象
	select .. from (select .. from ..wgo) as 别名表
	where
	group by
		having
	order by
	
	需求：1.求平均薪水最高的部门的id
	1.父句：求部门编号、平均薪水，平均薪水=最高
		select dept_id,avg(salary) from s_emp
		group by dept_id
		having avg(salary)=(最高薪水)
	2.子句：	
		select max(平均工资) from ...
	3.子子句：求每个部门的平均工资
		select avg(salary) as avgsss from s_emp
		group by dept_id;
	4.组合
		select max(a.avgsss) from (
		select avg(salary) as avgsss from s_emp
		group by dept_id)as a
	
	需求：2.求平均薪水最高的部门的部门名称
	1.父句：求部门名称，条件：部门编号
		select id,name from s_dept
		where id=(?);
	1.5子句：根据某个平均薪水，求出部门编号
		select dept_id,avg(salary) from s_emp
		group by dept_id
		having avg(salary)=?
	2.子句：求最高平均薪水
		对象：部门编号dept_id、平均薪水avgs   a表
		select max(avgs) from ()a;
	3.子子句：a表每个部门的平均薪水
		select dept_id,avg(salary) as avgs from s_emp
		group by dept_id
	4.组合：
		select id,name from s_dept
		where id=(
			select dept_id from s_emp
			group by dept_id
			having avg(salary)=(
				select max(avgs) from 
				(select dept_id,
			avg(salary) as avgs from s_emp
				group by dept_id)
				a)
		);
	

三、多表查询-连接

	a = {1,2,3}   a = {列1，列2，列3}
	b = {4,5,6}   b= {列1，列2，列3}
	a和b的组合方式：3*3
	select ... from tbnamea as a,tbnameb b,tbnamec
	....

1.等值连接
	select ... from tbnamea as a,tbnameb b,tbnamec
	where a.xx = b.yy and b.zz=c.xx
		and last_name='Chang'
	肯定有表与表之间的关联关系
	列名进行连接，列名和列名最好是同一个数据类型
	
	需求：查看部门编号、部门名称，和对应的区域名称
	1.列出所有关联的表名
	2.列出表和表之间的关联关系
	3.其他限制条件where或者分组、排序
	4.select的选择的列有哪些

	1.s_dept d  s_region r
	2.d.region_id = r.id
	3.NULL
	4.d.id  d.name r.name

	select d.id,d.name,r.name 
	from s_dept d,s_region as r
	where d.region_id = r.id;

	需求：查看所有员工的所在部门的名称
	需求：查看所有员工的所在区域名称.
	1.列出所有关联的表名
	2.列出表和表之间的关联关系
	3.其他限制条件where或者分组、排序
	4.select的选择的列有哪些
	1.s_emp e s_dept d s_region r
	2.e.dept_id=d.id  and  d.region_id=r.id
	3.NULL
	4.e.id e.last_name r.name
	select e.id,e.last_name,r.name
	from s_emp e,s_dept d,s_region r
	where e.dept_id=d.id  and  d.region_id=r.id


	练习：1查看员工名字为Chang的员工所在的部门名称
	1.列出所有关联的表名
	2.列出表和表之间的关联关系
	3.其他限制条件where或者分组、排序
	4.select的选择的列有哪些
	1.s_emp e ,s_dept d
	2.e.dept_id=d.id
	3.e.last_name='Chang'
	4.d.name[,e.last_name,e.dept_id,d.id]
	select d.name,e.last_name,e.dept_id,d.id
	from s_emp e ,s_dept d
	where e.dept_id=d.id and e.last_name='Chang'
	
	2查看所有员工的所在区域名称.
	3查看员工的id，last_name，salary，部门名字，区域名字，
	 这些员工有如下条件：薪资大于Chang所在区域的平均工资或者跟Chang员工不在同个部门
	

	1.列出所有关联的表名
	2.列出表和表之间的关联关系
	3.(其他限制条件where)或者分组、排序
	4.select的选择的列有哪些
	1.s_emp e,s_dept d,s_region r
	2.e.dept_id = d.id and d.region_id=r.id
	3.(e.salary>(?)  or dept_id!=(?))
	  3.1 Chang所在区域的平均工资
		select avg(salary) from s_emp 
		where dept_id=(?)
		select dept_id from s_emp
		where last_name='Chang'
	  3.2Chang员工的部门编号
		select dept_id from s_emp
		where last_name='Chang'
	4.e.id,e.last_name,e.salary,d.name,r.name,e.dept_id
	select e.id,e.last_name,e.salary,d.name,r.name,e.dept_id
	from s_emp e,s_dept d,s_region r
	where e.dept_id = d.id and d.region_id=r.id and
	(e.salary>(
		select avg(salary) from s_emp 
		where dept_id=(select dept_id from s_emp
		where last_name='Chang')
		)  or dept_id!=(select dept_id from s_emp
		where last_name='Chang'))
	
	3查看区域id和名字和平均工资
	select r.id,r.name,avg(e.salary)
	from s_emp e,s_dept d,s_region r
	where e.dept_id = d.id and d.region_id = r.id
	group by r.id,r.name
	3查看区域id和名字和总工资
	select r.id,r.name,sum(e.salary) as sums
	from s_emp e,s_dept d,s_region r
	where e.dept_id = d.id and d.region_id = r.id
	group by r.id,r.name
	4查看区域总工资最高的区域id和名字
	select r.id,r.name,sum(e.salary) as sums
	from s_emp e,s_dept d,s_region r
	where e.dept_id = d.id and d.region_id = r.id
	group by r.id,r.name
	having sum(e.salary) = 最大值
	select max(sums) from ()region_sum;
	(select r.id,r.name,sum(e.salary) as sums
	from s_emp e,s_dept d,s_region r
	where e.dept_id = d.id and d.region_id = r.id
	group by r.id,r.name)  region_sum
	组合：
	select r.id,r.name,sum(e.salary) as sums
	from s_emp e,s_dept d,s_region r
	where e.dept_id = d.id and d.region_id = r.id
	group by r.id,r.name
	having sum(e.salary) = (select max(sums) from (select r.id,r.name,sum(e.salary) as sums
	from s_emp e,s_dept d,s_region r
	where e.dept_id = d.id and d.region_id = r.id
	group by r.id,r.name)region_sum);
	另一种做法：
	select r.id,r.name,sum(e.salary) as sums
	from s_emp e,s_dept d,s_region r
	where e.dept_id = d.id and d.region_id = r.id
	group by r.id,r.name
	order by sums desc
	limit 1

	每个区域的部门数量：
		select region_id,count(*) from s_dept
		group by region_id;
	5查看部门数量最多的区域id和名字

	1.列出所有关联的表名
	2.列出表和表之间的关联关系
	3.(其他限制条件where)或者分组、排序
	4.select的选择的列有哪些
	1.s_dept d,s_region r
	2.d.region_id=r.id
	3.NULL
	4.d.region_id,r.name

	select d.region_id,r.name,count(*)
 	from s_dept d,s_region r
	where d.region_id=r.id
	group by d.region_id,r.name
	order by count(*) desc
	limit 1;

	部门平均工资tbavg：
	select dept_id,avg(salary) avgs from s_emp
	group by dept_id

	6查看员工工资高于所在部门平均工资的员工的id和名字
	1.s_emp e,tbavg
	2.e.dept_id=tbavg.dept_id
	3.e.salary>tbavg.avgs
	4.e.id,e.last_name,e.salary,tbavg.avgs
	select e.id,e.last_name,e.salary,tbavg.avgs
	from s_emp e,
		(select dept_id,avg(salary) avgs from s_emp
	group by dept_id)tbavg
	where e.dept_id=tbavg.dept_id and e.salary>tbavg.avgs
	
	7查询工资大于41号部门平均工资的员工,并且该员工所在部门的平均工资也要大于41号部门的平均工资,
	      显示出当前员工所在部门的平均工资以及该员工所在部门的名字
.
	1.s_emp e,tbavg,s_dept d
	2.e.dept_id=tbavg.dept_id
		and d.id=e.dept_id
	3.e.salary>(?) and tbavg.avgs>(?)
		3.23.1select avg(salary) 
		from s_emp where dept_id=41;
		
	4.tbavg.avgs,d.name
	select e.last_name,tbavg.avgs,d.name from 
	s_emp e,(select dept_id,avg(salary) avgs from s_emp
	group by dept_id)tbavg,s_dept d
	where e.dept_id=tbavg.dept_id
		and d.id=e.dept_id and 
	e.salary>(select avg(salary) 
		from s_emp where dept_id=41) and tbavg.avgs>(select avg(salary) 
		from s_emp where dept_id=41);

         8查询工资大于Ngao所在部门平均工资的员工,
	      并且该员工所在部门的平均工资也要大于Ngao所在部门的平均工资,
	      显示出当前员工所在部门的平均工资以及该员工所在部门的名字
.

	1.s_emp e,tbavg,s_dept d
	2.e.dept_id=tbavg.dept_id
		and d.id=e.dept_id
	3.e.salary>(?) and tbavg.avgs>(?)
		Ngao所在部门平均工资
		3.23.1select avg(salary) 
		from s_emp where dept_id=(?);
		select dept_id from s_emp
		where last_name='Ngao';
		
	4.tbavg.avgs,d.name

	查看客户名以及其对应的销售人员名
	1.s_customer c,s_emp e
	2.c.sales_rep_id = e.id
	3.NULL
	4.c.name,e.last_name
	select c.name,e.last_name from s_customer c,s_emp e
	where c.sales_rep_id = e.id

等值连接/内连接 inner join
外连接：左[外]连接、右[外]连接
全连接
外连接：
	左：
	select ... from 左表名 left [outer] join 右表名
	on 左表和右表的关联关系
	where ...
	group by ..
		having..
	order by..
	limit...

	right：
	select ... from 左表名 right [outer] join 右表名
	on 左表和右表的关联关系
	where ...
	group by ..
		having..
	order by..
	limit...
	
	需求：查看客户名以及其对应的销售人员名
	select c.name,e.last_name
	from s_customer c left join  s_emp e
	on c.sales_rep_id=e.id;
	select c.name,e.last_name
	from s_emp e right join  s_customer c
	on c.sales_rep_id=e.id

	练习：学生信息
	学生信息表：stu_info
		id int pk
		name varchar(20) 姓名
	学生成绩表：stu_mark
		id int pk
		name varchar(20) 科目
		stu_no int 外键关联信息表中id列
		mark	int(3) 成绩
	学生信息表：(1,'zs'),(2,'ls'),(3,'ww'),(4,'zl');
	学生成绩表：(1,'english',1,100),(2,'chinese',1,80),
		(3,'english',2,90),(4,'chinese',2,0),
		(5,'english',3,100),(6,'chinese',3,100);
	查看所有学生的成绩信息：采用外连接
	create table stu_info(
		id int primary key auto_increment,
		name varchar(20) not null
	)engine=innodb auto_increment=1 default charset=gbk;
	create table stu_mark(
		id int primary key,
		name varchar(20) not null,
		stu_no int,
		mark int(3),
		constraint fkstuno foreign key(stu_no) references stu_info(id)
	)engine=innodb;
	alter table stu_mark drop foreign key fkstuno;
	insert into stu_info(id,name)
	 values(1,'zs'),(2,'ls'),(3,'ww'),(4,'zl');
	insert into stu_mark(id,name,stu_no,mark)
	values(1,'english',1,100),(2,'chinese',1,80),
		(3,'english',2,90),(4,'chinese',2,0),
		(5,'english',3,100),(6,'chinese',3,100);
	1.等值查询：
		select info.id,info.name,
			mark.name,mark.mark
		from stu_info info,stu_mark mark
		where info.id = mark.stu_no
	2.左外连接：
		select info.id,info.name,
			mark.name,mark.mark
		from stu_info info
			left outer join 
			stu_mark mark
		on info.id = mark.stu_no
	3.右外连接：
		select info.id,info.name,
			mark.name,mark.mark
		from stu_mark mark
			right outer join 
			stu_info info			
		on info.id = mark.stu_no
================================
面试常考知识点：外连接！
关键字：任何，所有，等具有全局的映射外连接考点的关键字。
================================

自连接：
	需求：查看所有员工名字以及其对应的经理名字
	1.s_emp ygb , s_emp jlb
	2.ygb.manager_id = jlb.id
	3.NULL
	4.ygb.last_name,jlb.last_name
	select ygb.last_name,jlb.last_name
	from s_emp ygb , s_emp jlb
	where ygb.manager_id = jlb.id;
	select ygb.last_name,jlb.last_name
	from s_emp ygb left join s_emp jlb
	on ygb.manager_id = jlb.id;


	需求：subqueries中的需求5
	需求：查看员工的姓名、部门号、工资、所在部门工资排名，部门号按照升序排列，工资按照降序排列	
	1.已知：41号部门的Smith
		s_emp me
		dept_id=41,id=17
		s_emp other
		dept_id=41
		select me.id,me.last_name,me.salary,
			other.salary
		from s_emp me, s_emp other
		where me.dept_id=41 and me.id=17 
			and other.dept_id=41
	2.查看一个人在给定一个部门的排名：
		select me.id,me.last_name,me.salary,
			count(*)
		from s_emp me, s_emp other
		where me.dept_id=41 and me.id=17 
			and other.dept_id=41
		group by  me.id,me.last_name,me.salary
	3.查看41号部门所有人的排名：
		select me.id,me.last_name,me.salary,
			count(*)
		from s_emp me, s_emp other
		where me.dept_id=41 and other.dept_id=41
			and me.salary<=other.salary
		group by  me.id,me.last_name,me.salary
	4.查看所有部门的在本部门内的排名	
		select me.id,me.last_name,
		me.dept_id,me.salary,
			count(*)
		from s_emp me, s_emp other
		where me.dept_id=other.dept_id
			and me.salary<=other.salary
		group by  me.id,me.last_name,me.dept_id,me.salary	
	5.排序
		select me.id,me.last_name,
		me.dept_id,me.salary,
			count(*)
		from s_emp me, s_emp other
		where me.dept_id=other.dept_id
			and me.salary<=other.salary
		group by  		me.id,me.last_name,me.dept_id,me.salary	
		order by me.dept_id asc,me.salary desc;
	

	练习：查询每一个管理者手下的最低工资的员工,没有管理者的员工不算并显示出管理者的名字
		s_emp ygb , s_emp jlb



select ygb.last_name,ygb.salary,jlb.last_name
	from s_emp ygb , s_emp jlb
	where ygb.manager_id = jlb.id;

select min(ygb.salary),jlb.last_name
	from s_emp ygb , s_emp jlb
	where ygb.manager_id = jlb.id
	group by jlb.last_name

