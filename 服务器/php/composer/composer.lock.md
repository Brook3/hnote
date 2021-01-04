# 1. composer.lock

* 在`composer install`时，会根据`composer.json`里边的内容，进行安装依赖包，并生成`composer.lock`文件。
* 当`composer.lock`文件存在时，`composer install`则不会关心`composer.json`里边的内容，会按照`composer.lock`里边的内容进行安装。所有人都可保持一致。
* 当使用`composer update`的时候，会根据`composer.json`里边的内容，对依赖包进行更新操作，更新完成后会更新`composer.lock`文件，保持最新的`lock`

Composer的基本使用

在项目中使用composer.json

在项目中使用composer，你需要有一个composer.json文件，此文件的作用主要用来声明包之间的相互关系和其他的一些元素标签。


require 关键字

第一件事情在composer.json就是使用require关键字了，你将告诉composer哪些包是你项目所需要的

复制代码 代码如下:

{
    "require": {
        "monolog/monolog": "1.0.*"
    }
}

如你所见，require的对象将会映射包的名称（ monolog/monolog）和包的版本是1.0.*


包的命名

基本上包的命名是 主名/项目名称（ monolog/monolog），主名必须唯一，但是项目也就是我们的包的名称可以有相同的，例如: igorw/json,和seldaek/json

包的版本

我们需要使用monolog的版本是1.0.*，他的意思是只要版本是1.0分支即可，例如1.0.0，1.0.2或者1.0.99

版本定义的两种方式：

1. 标准的版本：定义保准的版本包文件，如：1.0.2
2. 一定范围的版本：使用比较符号来定义有效的版本的范围，有效的符号有>, >=, <,<=, !=
3. 通配符：特别的匹配符号*，例如1.0.*就相当于>=1.0,<1.1版本的即可
4. 下一个重要的版本：~符号最好的解释就是，~1.2就相当于>1.2,<2.0，但~1.2.3就相当于>=1.2.3,<1.3版本。  

安装包

在项目文件路径下运行
复制代码 代码如下:

$ composer install

这样子他会自动下载monolog/monolog文件到你的vendor目录下面。

接下来需要说明一件事情就是

composer.lock - 锁定文件

在安装完所有需要的包之后，composer会生成一张标准的包版本的文件在composer.lock文件中。这将锁定所有包的版本。

使用composer.lock（当然是和composer.json一起）来控制你的项目的版本

这一点非常的重要，我们使用install命令来处理的时候，它首先会判断composer.lock文件是否存在，如果存在，将会下载相对应的版本(不会在于composer.json里面的配置)，这意味着任何下载项目的人都将会得到一样的版本。

如果不存在composer.lock，composer将会通过composer.json来读取需要的包和相对的版本，然后创建composer.lock文件

这样子就可以在你的包有新的版本之后，你不会自动更新了，升级到新的版本，使用update命令即可，这样子就能获取最新版本的包并且也更新了你的composer.lock文件。

$ php composer.phar update
或者
$ composer update

Packagist（这应该就是composer，感觉有点像python的包，虽然没那么强大，呵呵，有了这种标准以后，以后大家开发网站绝对会很轻松，可以借鉴很多人的代码了，并且更加方便了！）
Packagist是composer的主要仓库，大家可以去看看，composer仓库的基础是包的源码，你可以随意的获取，Packagist的目的建成一个任何人都可以使用的仓库，这就意味着在你的文件中任意的require包了。

关于自动加载

为了方便的加载包文件，Composer自动生成了一个文件 vendor/autoload.php，你可以方便只有的使用它在任何你需要使用的地方
require 'vendor/autoload.php';

这意味着你可以非常非常方便的使用第三方代码了，假设你的项目需要使用monlog，你直接使用吧，他们都已经自动加载了的!

复制代码 代码如下:

$log = new Monolog\Logger('name');
$log->pushHandler(new Monolog\Handler\StreamHandler('app.log', Monolog\Logger::WARNING));
$log->addWarning('Foo');

当然你也可以在composer.json中加载自己的代码：

复制代码 代码如下:

{
    "autoload": {
        "psr-0": {"Acme": "src/"}
    }
}

composer将会把psr-0注册为Acme的命名空间

你可以定义一个映射通过命名空间到文件目录，src目录是你的根目录，vendor是同一级别的目录，例如一个文件为：src/Acme/Foo.php就包含了Acme\Foo类

当你在增加autoload之后，你必须要重新install来生成vendor/autoload.php文件

在我们引用此文件的时候，将会返回一个autoloader类的实力，所以你可以把返回的值放入一个变量，然后在增加更多的命名空间，如果在开发环境下这是非常方便的，例如：
复制代码 代码如下:

$loader = require 'vendor/autoload.php';
$loader->add('Acme\Test', __DIR__);

composer.lock文件的作用

install 命令从当前目录读取 composer.json 文件，处理了依赖关系，并把其安装到 vendor 目录下。

复制代码 代码如下:

composer install

如果当前目录下存在 composer.lock 文件，它会从此文件读取依赖版本，而不是根据 composer.json 文件去获取依赖。这确保了该库的每个使用者都能得到相同的依赖版本。

如果没有 composer.lock 文件，composer 将在处理完依赖关系后创建它。

为了获取依赖的最新版本，并且升级 composer.lock 文件，你应该使用 update 命令。

复制代码 代码如下:

composer update

这将解决项目的所有依赖，并将确切的版本号写入 composer.lock。

如果你只是想更新几个包，你可以像这样分别列出它们：

复制代码 代码如下:

composer update vendor/package vendor/package2

你还可以使用通配符进行批量更新：

复制代码 代码如下:

composer update vendor/*