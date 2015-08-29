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
 - time.strftime('%Y-%m-%d',time.localtime(time.time()))输出调用当前方法的时间

* ##class对象
 - 在Python中，类通过 class 关键字定义。以 Person 为例，定义一个Person类如下：
<pre><code>
class Person(object):
    pass
xiaoming = Person()
xiaohong = Person()
print xiaoming
print xiaohong
print xiaoming==xiaohong
</code></pre>
