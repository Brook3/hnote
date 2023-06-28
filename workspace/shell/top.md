# 1. top
[参考](https://www.cnblogs.com/niuben/p/12017242.html)

界面如下：

```shell
⏱ 10:56:53 Brook3@centos7 /workspace/demo/Brook3.api.php$ top
top - 11:13:40 up 217 days, 17:54,  1 user,  load average: 0.00, 0.01, 0.05
Tasks: 167 total,   1 running, 166 sleeping,   0 stopped,   0 zombie
%Cpu(s):  0.7 us,  1.0 sy,  0.0 ni, 98.0 id,  0.3 wa,  0.0 hi,  0.0 si,  0.0 st
KiB Mem :  1014892 total,    82756 free,   486972 used,   445164 buff/cache
KiB Swap:        0 total,        0 free,        0 used.   367564 avail Mem 

  PID USER      PR  NI    VIRT    RES    SHR S %CPU %MEM     TIME+ COMMAND                                                                                                                                                                 
 6314 root      10 -10  130576  13548   5948 S  1.0  1.3 696:23.22 AliYunDun                                                                                                                                                               
 1722 polkitd   20   0 1580204  72168   3976 S  0.7  7.1 345:23.82 mongod                                                                                                                                                                  
 2452 polkitd   20   0   40804   2124    796 S  0.3  0.2 173:35.02 redis-server                                                                                                                                                            
13817 polkitd   20   0 1148880 184304   1476 S  0.3 18.2  82:16.27 mysqld                                                                                                                                                                  
    1 root      20   0   43656   2928   1496 S  0.0  0.3   5:05.16 systemd                                                                                                                                                                 
    2 root      20   0       0      0      0 S  0.0  0.0   0:01.28 kthreadd                                                                                                                                                                
    3 root      20   0       0      0      0 S  0.0  0.0   3:02.43 ksoftirqd/0                                                                                                                                                             
    5 root       0 -20       0      0      0 S  0.0  0.0   0:00.00 kworker/0:0H                                                                                                                                                            
    7 root      rt   0       0      0      0 S  0.0  0.0   0:00.06 migration/0                                                                                                                                                             
    8 root      20   0       0      0      0 S  0.0  0.0   0:00.00 rcu_bh                                                                                                                                                                  
    9 root      20   0       0      0      0 S  0.0  0.0  67:40.48 rcu_sched                                                                                                                                                               
   10 root       0 -20       0      0      0 S  0.0  0.0   0:00.00 lru-add-drain                                                                                                                                                           
   11 root      rt   0       0      0      0 S  0.0  0.0   1:33.44 watchdog/0                                                                                                                                                              
   13 root      20   0       0      0      0 S  0.0  0.0   0:00.06 kdevtmpfs                                                                                                                                                               
   14 root       0 -20       0      0      0 S  0.0  0.0   0:00.00 netns                                                                                                                                                                   
   15 root      20   0       0      0      0 S  0.0  0.0   0:11.00 khungtaskd                                                                                                                                                              
   16 root       0 -20       0      0      0 S  0.0  0.0   0:00.00 writeback                                                                                                                                                               
   17 root       0 -20       0      0      0 S  0.0  0.0   0:00.00 kintegrityd                                                                                                                                                             
   18 root       0 -20       0      0      0 S  0.0  0.0   0:00.00 bioset                                                                                                                                                                  
   19 root       0 -20       0      0      0 S  0.0  0.0   0:00.00 bioset                                                                                                                                                                  
   20 root       0 -20       0      0      0 S  0.0  0.0   0:00.00 bioset                                                                                                                                                                  
   21 root       0 -20       0      0      0 S  0.0  0.0   0:00.00 kblockd                                                                                                                                                                 
   22 root       0 -20       0      0      0 S  0.0  0.0   0:00.00 md                                                                                                                                                                      
   23 root       0 -20       0      0      0 S  0.0  0.0   0:00.00 edac-poller                                                                                                                                                             
   24 root       0 -20       0      0      0 S  0.0  0.0   0:00.00 watchdogd                                                                                                                                                               
   30 root      20   0       0      0      0 S  0.0  0.0   0:54.71 kswapd0                                                                                                                                                                 
   31 root      25   5       0      0      0 S  0.0  0.0   0:00.00 ksmd                                                                                                                                                                    
   32 root      39  19       0      0      0 S  0.0  0.0   0:27.36 khugepaged                                                                                                                                                              
   33 root       0 -20       0      0      0 S  0.0  0.0   0:00.00 crypto                                                                                                                                                                  
   41 root       0 -20       0      0      0 S  0.0  0.0   0:00.00 kthrotld                                                                                                                                                                
   43 root       0 -20       0      0      0 S  0.0  0.0   0:00.00 kmpath_rdacd                                                                                                                                                            
   44 root       0 -20       0      0      0 S  0.0  0.0   0:00.00 kaluad                                                                                                                                                                  
   45 root       0 -20       0      0      0 S  0.0  0.0   0:00.00 kpsmoused                                                                                                                                                               
   46 root       0 -20       0      0      0 S  0.0  0.0   0:00.00 ipv6_addrconf                                                                                                                                                           
   59 root       0 -20       0      0      0 S  0.0  0.0   0:00.00 deferwq                                                                                                                                                                 
   91 root      20   0       0      0      0 S  0.0  0.0   0:03.27 kauditd                                                                                                                                                                 
  234 root       0 -20       0      0      0 S  0.0  0.0   0:00.00 ata_sff                                                                                                                                                                 
  246 root      20   0       0      0      0 S  0.0  0.0   0:00.00 scsi_eh_0                                                                                                                                                               
  248 root       0 -20       0      0      0 S  0.0  0.0   0:00.00 scsi_tmf_0                                                                                                                                                              
  249 root      20   0       0      0      0 S  0.0  0.0   0:00.00 scsi_eh_1                                                                                                                                                               
  250 root       0 -20       0      0      0 S  0.0  0.0   0:00.00 scsi_tmf_1                                                                                                                                                              
  253 root       0 -20       0      0      0 S  0.0  0.0   0:00.00 ttm_swap                                                                                                                                                                
  259 root       0 -20       0      0      0 S  0.0  0.0   1:21.74 kworker/0:1H                                                                                                                                                            

```

## 1.1. 界面详解
### 1.1.1. 第一行top，任务队列信息，同 uptime 命令的执行结果
系统时间：07:27:05
运行时间：up 1:57 min,
当前登录用户：  3 user
负载均衡(uptime)  load average: 0.00, 0.00, 0.00
     average后面的三个数分别是1分钟、5分钟、15分钟的负载情况。
load average数据是每隔5秒钟检查一次活跃的进程数，然后按特定算法计算出的数值。如果这个数除以逻辑CPU的数量，结果高于5的时候就表明系统在超负荷运转了

### 1.1.2. 第二行，Tasks — 任务（进程）
总进程:150 total, 运行:1 running, 休眠:149 sleeping, 停止: 0 stopped, 僵尸进程: 0 zombie

### 1.1.3. 第三行，cpu状态信息
0.0%us【user space】— 用户空间占用CPU的百分比。
0.3%sy【sysctl】— 内核空间占用CPU的百分比。
0.0%ni【】— 改变过优先级的进程占用CPU的百分比
99.7%id【idolt】— 空闲CPU百分比
0.0%wa【wait】— IO等待占用CPU的百分比
0.0%hi【Hardware IRQ】— 硬中断占用CPU的百分比
0.0%si【Software Interrupts】— 软中断占用CPU的百分比

### 1.1.4. 第四行,内存状态
1003020k total,   234464k used,   777824k free,    24084k buffers【缓存的内存量】

### 1.1.5. 第五行，swap交换分区信息
2031612k total,      536k used,  2031076k free,   505864k cached【缓冲的交换区总量】

### 1.1.6. 第六行，空行

### 1.1.7. 第七行以下：各进程（任务）的状态监控
PID — 进程id
USER — 进程所有者
PR — 进程优先级
NI — nice值。负值表示高优先级，正值表示低优先级
VIRT — 进程使用的虚拟内存总量，单位kb。VIRT=SWAP+RES
RES — 进程使用的、未被换出的物理内存大小，单位kb。RES=CODE+DATA
SHR — 共享内存大小，单位kb
S —进程状态。D=不可中断的睡眠状态 R=运行 S=睡眠 T=跟踪/停止 Z=僵尸进程
%CPU — 上次更新到现在的CPU时间占用百分比
%MEM — 进程使用的物理内存百分比
TIME+ — 进程使用的CPU时间总计，单位1/100秒
COMMAND — 进程名称（命令名/命令行）

## 1.2. 常用操作
### 1.2.1. 查看多个CPU的状态
按数字“1”即可！效果如下：
```shell
top - 11:40:06 up 236 days, 18:13,  1 user,  load average: 0.18, 0.18, 0.18
Tasks: 183 total,   1 running, 181 sleeping,   0 stopped,   1 zombie
Cpu0  : 81.1%us, 17.2%sy,  0.0%ni,  1.3%id,  0.0%wa,  0.0%hi,  0.3%si,  0.0%st
Cpu1  :  2.0%us,  0.7%sy,  0.0%ni, 97.0%id,  0.3%wa,  0.0%hi,  0.0%si,  0.0%st
Cpu2  :  0.0%us,  0.0%sy,  0.0%ni,100.0%id,  0.0%wa,  0.0%hi,  0.0%si,  0.0%st
Cpu3  :  0.3%us,  0.3%sy,  0.0%ni, 99.3%id,  0.0%wa,  0.0%hi,  0.0%si,  0.0%st
Mem:   8193024k total,  7456032k used,   736992k free,   299500k buffers
Swap:        0k total,        0k used,        0k free,  5122684k cached

```
### 1.2.2. 交互命令
```shell
P 大写，结果按CPU占用降序排序
M 大写，结果按内存占用降序排序
N 大写，结果按PID降序排序
u 小写，结果显示筛选后的user进程
```