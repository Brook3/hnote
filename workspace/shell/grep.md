# 1. grep
## 1.1. 简介
### 1.1.1. 作用
Linux系统中grep命令是一种强大的文本搜索工具，它能使用正则表达式搜索文本，并把匹配的行打印出来。 grep全称是Global Regular Expression Print，表示全局正则表达式版本，它的使用权限是所有用户。

### 1.1.2. 格式
```shell
grep [options]
```

### 1.1.3. 主要参数
```shell
[options]主要参数：

-c：只输出匹配行的计数。

－I：不区分大 小写(只适用于单字符)。

－E：将样式为延伸的正则表达式来使用。

－h：查询多文件时不显示文件名。

－l：查询多文件时只输出包含匹配字符的文件名。

－n：显示匹配行及 行号。

－s：不显示不存在或无匹配文本的错误信息。

－v：显示不包含匹配文本的所有行。

pattern正则表达式主要参数：

\： 忽略正则表达式中特殊字符的原有含义。

^：匹配正则表达式的开始行。

$: 匹配正则表达式的结束行。

<：从匹配正则表达 式的行开始。

>：到匹配正则表达式的行结束。

[ ]：单个字符，如[A]即A符合要求 。

[ - ]：范围，如[A-Z]，即A、B、C一直到Z都符合要求 。

.：所有的单个字符。

* ：有字符，长度可以为0。
```

## 1.2. 示例
```shell
下面还有一些有意思的命令行参数：
grep -i pattern files ：不区分大小写地搜索。默认情况区分大小写，
grep -l pattern files ：只列出匹配的文件名，
grep -L pattern files ：列出不匹配的文件名，
grep -w pattern files ：只匹配整个单词，而不是字符串的一部分(如匹配’magic’，而不是’magical’)，
grep -C number pattern files ：匹配的上下文分别显示[number]行，
grep pattern1 | pattern2 files ：显示匹配 pattern1 或 pattern2 的行，
grep pattern1 files | grep pattern2 ：显示既匹配 pattern1 又匹配 pattern2 的行。

grep -E 'docker|USER' 包含docker或者USER

grep -n pattern files  即可显示行号信息

grep -c pattern files  即可查找总行数

这里还有些用于搜索的特殊符号：
\< 和 \> 分别标注单词的开始与结尾。
例如：
grep man * 会匹配 ‘Batman’、’manic’、’man’等，
grep ‘\<man’ * 匹配’manic’和’man’，但不是’Batman’，
grep ‘\<man\>’ 只匹配’man’，而不是’Batman’或’manic’等其他的字符串。
‘^’：指匹配的字符串在行首，
‘$’：指匹配的字符串在行 尾，
```