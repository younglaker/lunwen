#一些补充
自行根据需求修改模板

## 权限
1. 分为超级管理员、管理员、普通。 
2. 超管可以任命超管、管理员。
3. 超管和管理员可以管理论文和人员。

## 关于论文发表
1. 所有用户都可以上传论文，但普通权限的需要管理员审核发布。管理员上传的直接发布。
2. 论文状态分为审核中、被拒绝、已发布
3. 管理员审核过程：进入待审核列表，进入文章编辑页面（使用upload.php模板页面应多一个填写编号的输入框、去掉上传按钮、增加发布和拒绝按钮。上传资料的地方改为下载资料供管理员查看），填写编号方可发布。
4. 个人主页里面，没有发布的论文编号写“无”

## 关于编号
见./res/ziliao
