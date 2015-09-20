基础
===
* ##布尔类型
Python把0、空字符串''和None看成 False，其他数值和非空字符串都看成 True
 * 短路计算:
     1. 在计算 a and b 时，如果 a 是 False，则根据与运算法则，整个结果必定为 False，因此返回 a；如果 a 是 True，则整个计算结果必定取决与 b，因此返回 b。
     1. 在计算 a or b 时，如果 a 是 True，则根据或运算法则，整个计算结果必定为 True，因此返回 a；如果 a 是 False，则整个计算结果必定取决于 b，因此返回 b。
 * 所以Python解释器在做布尔运算时，只要能提前确定计算结果，它就不会往后算了，直接返回结果。

* ##字符串方法
 - s.capitalize() 将字符串s转化为首字母为大写
 - s.lower()将字符串s全部转换为小写
 - s.uper()将字符串s全部转换为大写
 - s.strip(rm) 删除 s 字符串中开头、结尾处的 rm 序列的字符。

* ##list
  - list的 append()总是把新的元素添加到 list 的尾部。
  - list的 insert()方法，它接受两个参数，第一个参数是索引号，第二个参数是待添加的新元素：
  - range
   + range(1,5) #代表从1到5(不包含5)
   [1, 2, 3, 4]
   + range(1,5,2) #代表从1到5，间隔2(不包含5)
   [1, 3]
   + range(5) #代表从0到5(不包含5)
[0, 1, 2, 3, 4]

* ##map
 - map()是 Python 内置的高阶函数，它接收一个函数 f 和一个 list，并通过把函数 f 依次作用在 list 的每个元素上，得到一个新的 list 并返回。

* ##reduce
 - reduce()函数也是Python内置的一个高阶函数。reduce()函数接收的参数和 map()类似，一个函数 f，一个list，但行为和 map()不同，reduce()传入的函数 f 必须接收两个参数，reduce()对list的每个元素反复调用函数f，并返回最终结果值。
 - reduce()还可以接收第3个可选参数，作为计算的初始值。

* ##filter
 - filter()函数是 Python 内置的另一个有用的高阶函数，filter()函数接收一个函数 f 和一个list，这个函数 f 的作用是对每个元素进行判断，返回 True或 False，filter()根据判断结果自动过滤掉不符合条件的元素，返回由符合条件元素组成的新list。

* ##sorted
 - Python内置的 sorted()函数可对list进行排序,但 sorted()也是一个高阶函数，它可以接收一个比较函数来实现自定义排序，比较函数的定义是，传入两个待比较的元素 x, y，如果 x 应该排在 y 的前面，返回 -1，如果 x 应该排在 y 的后面，返回 1。如果 x 和 y 相等，返回 0。

* ##lambda
 - 关键字lambda 表示匿名函数，冒号前面的 x 表示函数参数。匿名函数有个限制，就是只能有一个表达式，不写return，返回值就是该表达式的结果。

* ##time
 - 输出调用当前方法的时间
  time.strftime('%Y-%m-%d',time.localtime(time.time()))

* ##获得对象的信息
 - 用 isinstance() 判断它是否是某种类型的实例
 - 用 type() 函数获取变量的类型
 - 用 dir() 函数获取变量的所有属性
 - dir()返回的属性是字符串列表，如果已知一个属性名称，要获取或者设置对象的属性，就需要用 getattr() 和 setattr( )函数了

* ##占位符
 - '(%s: %s)' % (self.name, self.score)

面向对象
===
 * ##基础对象
     1. 在Python中，类通过 class 关键字定义。以 Person 为例，定义一个Person类如下：
```python
class Person(object):
 pass
xiaoming = Person()
xiaohong = Person()
print xiaoming
print xiaohong
print xiaoming==xiaohong
```
     1. 初始化时绑定未指明的属性
```python
class Person(object):
 def __init__(self,name,gender,birth,**kw):
  self.name=name
  self.gender=gender
  for k,v in kw.iteritems():
   setattr(self,k,v)
xiaoming = Person('Xiao Ming', 'Male', '1990-1-1', job='Student')
print xiaoming.name
print xiaoming.job
```
     1. Python对属性权限的控制是通过属性名来实现的，如果一个属性由双下划线开头(_),该属性就无法被外部访问。
```python
class Person(object):
    def __init__(self, name, score):
        self.name=name
        self.__score=score
p = Person('Bob', 59)
print p.name
print p.__score
```
     1. 绑定在一个实例上的属性不会影响其他实例，但是，类本身也是一个对象，如果在类上绑定一个属性，则所有实例都可以访问类的属性，并且，所有实例访问的类属性都是同一个！也就是说，实例属性每个实例各自拥有，互相独立，而类属性有且只有一份。
```python
class Person(object):
    count = 0
    def __init__(self,name):
        Person.count=Person.count+1
p1 = Person('Bob')
print Person.count
p2 = Person('Alice')
print Person.count
p3 = Person('Tim')
print Person.count
```
     1. 当实例属性和类属性重名时，实例属性优先级高，它将屏蔽掉对类属性的访问。
     1. 实例的方法就是在类中定义的函数，它的第一个参数永远是 self，指向调用该方法的实例本身，其他参数和一个普通函数是完全一样的

 * ##对象的继承性
   1. 一定要用 super(Student, self).__init__(name, gender) 去初始化父类，否则，继承自 Person 的 Student 将没有 name 和 gender。
```python
class Person(object):
    def __init__(self, name, gender):
        self.name = name
        self.gender = gender
class Teacher(Person):
    def __init__(self, name, gender, course):
        super(Teacher,self).__init__(name,gender)
        self.course=course
t = Teacher('Alice', 'Female', 'English')
print t.name
print t.course
```
  1. **python支持多重继承**,多重继承的目的是从两种继承树中分别选择并继承出子类，以便组合功能使用。

python的特殊方法
===
1. Python 定义了__str__()和__repr__()两种方法，__str__()用于显示给用户，而__repr__()用于显示给开发人员。
  * print s 默认调用的是__str__()方法
  * s 调用的是__rept__() 方法
1. 实现了__cmp__()方法，__cmp__用实例自身self和传入的实例 s 进行比较，如果 self 应该排在前面，就返回 -1，如果 s 应该排在前面，就返回1，如果两者相当，返回 0。
1. 由于Python是动态语言，任何实例在运行期都可以动态地添加属性。如果要限制添加的属性，例如，Student类只允许添加 name、gender和score 这3个属性，就可以利用Python的一个特殊的__slots__来实现。
 * __slots__ = ('name', 'gender', 'score')
1. 一个类实例也可以变成一个可调用对象，只需要实现一个特殊方法__call__()。
```python
class Person(object):
    def __init__(self, name, gender):
        self.name = name
        self.gender = gender
    def __call__(self, friend):
        print 'My name is %s...' % self.name
        print 'My friend is %s...' % friend
>>> p = Person('Bob', 'male')
>>> p('Tim')
My name is Bob...
My friend is Tim..
```

Python文件操作
===
* ##python自带文件打开的方法
```python
@ name 文件名字
@ mode 文件打开方式
@ buf 读取的大小
file = open(name,[mode[buf]])
```
返回一个file类型的对象
```python
>>> type(file)
<type 'file'>
```
file对象的所有属性有以下:
```python
>>> dir(file)
['__class__', '__delattr__', '__doc__', '__enter__', '__exit__', '__format__',
__getattribute__', '__hash__', '__init__', '__iter__', '__new__', '__reduce__'
'__reduce_ex__', '__repr__', '__setattr__', '__sizeof__', '__str__', '__subcla
hook__', 'close', 'closed', 'encoding', 'errors', 'fileno', 'flush', 'isatty',
mode', 'name', 'newlines', 'next', 'read', 'readinto', 'readline', 'readlines'
'seek', 'softspace', 'tell', 'truncate', 'write', 'writelines', 'xreadlines']
```
其中读文件的方法有:
  * 默认读取整个文件，如果写明了size，则只会读取最多size大小的数据
read(size)
  * 读取某一行的前size个字节 的数据，读取的时候会一直追加
readline(size)
  * 读取(io.DEFAULT_BUFFER_SIZE,默认值为8192)的数据,返回每一行所组成的列表
readlines(line)
  * 迭代器读取方式,可以以省内存的方式读取到整个文件
iter(file)

 写文件的方法有:
  * 写入一行数据
write(str)
  * 写入多行数据到文件中,sequence_of_strings为可迭代的字符串对象
writelines(sequence_of_strings)
  * 写缓存数据
flush()
默认调用write等方法，会将写入的数据先写入到缓存中,需要等到一下条件成立后才会写到文件中:
    - 主动调用close()或者flush()方法
    - 写入数据量大于或者等于写缓存

* 文件的打开方式
|| *打开方式* || *说明* || *注意* ||
|| r || 只读方式 || 文件必须存在 ||
|| w || 只写方式 || 文件不存在则创建文件,写入时会擦除之前的所有数据 ||
|| a || 追加方式 || 文件不存在则创建文件,写入的数据会追加到文件末尾 ||
|| r+ || 读写方式 || 文件不存在则创建文件,写入时从最开始的第一个字节写入，会覆盖之前的数据,并且文件可读 ||
|| w+ || 写读方式 || 文件不存在则创建文件,写入时会擦除之前的所有数据,并且文件可读 ||
|| a+ || 追加读写方式 ||文件不存在则创建文件,写入的数据会追加到文件末尾,并且文件可读 ||
|| rb,wb,ab,rb+,wb+,ab+ || 二进制方式打开 ||

* ##文件指针
当读写文件时,只能按顺序读写，这其中记录位置偏移量的对象，便是**文件指针**,文件指针有两个方法:
 + 返回当前文件指针相对于文件起始的位置
```python
file.tell()
```
 +  移动文件指针的位置,当偏移量超过文件的边沿则会报错
```python
@ index 相对偏移量
@ mode 偏移模式
file.seek(offset,[mode])
```
   - 偏移模式有以下几种:
      1. os.SEEK_SET : 相对文件起始位置
      2. os.SEEK_CUR : 相对文件当前位置
      3. os.SEEK_END : 相对文件结尾位置
* ##文件属性
 + file.fileno  文件描述符
 + file.mode  文件打开权限
 + file.encoding  文件编码格式
 + file.closed  文件是否关闭

* ##文件的标准格式:
    + sys.stdin : 文件标准输入
    + sys.stdout : 文件标准输出
    + sys.stderr : 文件标准错误
* ##文件命令行参数
 + sys模块提供sys.argv属性，通过该属性可以得到命令行参数
 + sys.argv :字符串组成的列表
```python
index.py文件
import sys
if __name__ = ‘__main__’
	for arg in sys.argv:
    	print arg
```
执行以下命令:
```python
python index.py 0 1 2
```
输出的结果为:
```python
index.py
0
1
2
```
此时输出了四个数据，即python 后面的四个参数

* ##文件中文乱码
 + python默认提供的open方法的文件编码为ascii编码，此时写入中文会出错,解决方法有两种:
    1. 将unicode转换为utf-8
```python
a = unicode.encode(u'马克','utf-8')
file.write(a)
```
    1. 打开文件时使用utf-8编码打开,此时需要使用到codecs模块,codecs模块提供方法创建指定编码格式文件
```python
@ fname: 文件名字
@ mode: 打开文件的模式,默认为rb
@ encoding: 编码格式,默认为ascii编码
@ errors
@ buf
open(fname,[mode],[encoding],[errors],[buf])
```
* ##使用os模块对文件的操作
 + 文件的打开
```python
@ fname:文件名字
@ flag:打开方式
@ mode
fd=os.open(fname,flag,[mode])
```
flag:打开方式
	* os.O_CREAT : 创建文件
	* os.O_RDONLY : 只读方式
	* os.O_WRONLY : 只写方式
	* os.O_RDWR : 读写方式

 + 使用os模块对文件进行操作
   - os.read(fd,buf) : 读取文件
   - os.write(fd,string) : 写入文件
   - os.lseek(fd,pos,how) : 文件指针操作,其中how为偏移方式
   - os.close(fd) : 关闭文件

   || *os方法* || *说明* ||
   || access(path,mode) || 判断文件权限,F_OK存在,权限R_OK,W_OK,X_OK ||
   || listdir(path) || 返回当前目录下所有文件组成的列表 ||
   || remove(path) || 删除文件 ||
   || rename(old,new) || 修改文件或者目录名 ||
   || mkdir(path,[mode]) || 创建目录 ||
   || makedirs(path,[mode]) || 创建多级目录 ||
   || removedirs(path) || 删除多级目录 ||
   || rmdir(path) || 删除目录(目录必须为空目录) ||
 + os.path模块方法介绍
  || *os.path方法* || *说明* ||
  || exists(path) ||当前路径是否存在  ||
  || isdir(s) || 是否是一个目录 ||
  || isfile(path) || 是否是一个文件 ||
  || getsize(fname) || 返回文件大小 ||
  || dirname(path) || 返回路径的目录 ||
  || basename(path) || 返回路径的文件名 ||

* ##ConfigParser模块读写ini配置信息

 + ini配置文件格式
节 ：         [session]
参数(键=值) :  name=value
```ini
[port]
 port1 = 8001
 port2 = 8002
```
 + 使用ConfigParset模块加载ini配置文件
```python
cfg = ConfigParser.ConfigParser()
cfg.read('config.ini')
```
 + cfg的方法有以下：
```python
>>> dir(cfg)
['OPTCRE', 'OPTCRE_NV', 'SECTCRE', '_KEYCRE', '__doc__', '__init__', '__modul
, '_get', '_interpolate', '_interpolation_replace', '_read', 'add_section', '
oolean', 'getfloat', 'getint', 'has_option', 'has_section', 'items', 'options
', 'readfp', 'remove_option', 'remove_section', 'sections', 'set', 'write']
```
 + 读取ini配置信息
```python
for se in cfg.sections()
   print se
   print cfg.items(se)
```
 + 新建或者修改键值
```python
@ section : 节
@ key : 键
@ value : 值
cfg.set(section,key,value)
```
 + 删除键值
```python
@ section : 节
@ key : 键
cfg.remove_option(section,key)
```

正则表达式
===
1. 正则符号与方法
	+ 常用符号
	 * .：匹配任意字符，换行符\n除外
	 * *：匹配前一个字符0次或无限次
	 * ?：匹配前一个字符0次或一次
	 * .*：贪心算法,匹配前面字符尽量长的
	 * .*?：非贪心算法,匹配前面字符尽量短可能
	 * ()：括号内的数据作为结果返回
	+ 常用方法
	 * findall：匹配所有符合规律的内容,返回包含结果的列表
	 * Search：匹配并提取第一个符合规律的内容,返回一个正则表达式对象
	 * Sub：替换符合规律的内容,返回替换后的值

XPath
===
所用到的第三方库lxml
from lxml import etree
* 应用XPath提取内容
 + //定位跟节点
 + /往下层寻找
 + 提取文本内容:/text()
 + 提取属性内容:/@xxx
* 特殊用法
 + 以相同的字符开头
   starts-with(@属性名称,属性字符相同部分)
 + 标签套标签
   string(.)