git简易使用
===
##解决git中文乱码问题 进入git安装目录，改一下配置就可以基本解决

1. etc\gitconfig：

        [gui] encoding = utf-8 [i18n] commitencoding = utf-8 [svn] pathnameencoding = utf-8 说明：打开 Git 环境中的中文支持。pathnameencoding设置了文件路径的中文支持。

1. etc\git-completion.bash：

        alias ls='ls --show-control-chars --color=auto' 说明：使得在 Git Bash 中输入 ls 命令，可以正常显示中文文件名。

1. etc\inputrc：

        set output-meta on set convert-meta off 说明：使得在 Git Bash 中可以正常输入中文，比如中文的 commit log。

1. etc\profile：

        export LESSCHARSET=utf-8

##配置本地git信息

1. 配置用户名:

        git config --global user.name "yejianjie"

1. 配置用户邮箱:

        git config --global user.email "yejianjie@appvv.com"

1. 禁用自动转换(windows中的换行符为 CRLF， 而在linux下的换行符为LF):

        git config --global core.autocrlf false


##git基础命令 首先配置本地git的信息

1. 下载playhub代码

        git clone git@gitlab.appvv.com:sz-android-development/playhub.git

1. 查看本地和远程分支（*为当前所处分支）

        git branch -a

1. 新建分支

        git branch “branchname”
 
1. 切换分支

        git checkout “branchname”\
 
1. 基于当前分支创建一个新的分支并切换到该分支

        git checkout -b “branchname”

1. 查看本地代码与git库代码的差异文件列表

        git status

1. 查看git库的历史提交记录

        git log

1. 查看git库的详细历史提交记录

        gitk

1. 提交文件到git库

        git add “filename”

1. 提交当前全部差异文件到git库(慎用)

        git add .

1. 确认当前的代码提交

        git commit -m “commit message”

1. 提交代码到远程分支

        git push origin “branchname”

1. 拉取git库最新的代码

        git pull origin “branchname”

1. 回滚git版本到某个log节点

        git reset --hard “commit hashcode”

1. 列出所有的tag

        git tag

1. 给git版本打tag

        git tag “tag_name”

1. 将本地tag推送到git库

        git push origin “tag name”