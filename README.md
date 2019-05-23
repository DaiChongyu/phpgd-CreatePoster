# 欢迎使用 phpgd-CreatePoster

------

关于phpgd-CreatePoster，这个类是前几天从实际项目中提取出来的，经过几个小时的整理和测试，到此终于发布了！简单的介绍一下我实际工作时使用此类生成海报图的流程：

> * 1.创建画板(普通画板用CreatePalette;图像画板用CreateImage)
> * 2.合并图片(ImagesMerge)
> * 3.插入文字(CreateChars)
> * 4.插入划线(CreateLine)
> * 5.下载或查看

**最后的效果：**
![enter description here](https://github.com/DaiChongyu/phpgd-CreatePoster/demo/success.png)

## 主要方法

 1. 创建画板CreatePalette
 2. 画一个矩形边框OrthogonBr
 3. 画一个矩形实体OrthogonBg
 4. 画一个椭圆边框CircleBr
 5. 画一个实体椭圆CircleBg
 6. 画一个五角星边框StarBr
 7. 新建一个图像画板CreateImage
 8. 在画板中插入文字CreateChars
 9. 画一条实线CreateLine
 10. 图片合并ImagesMerge
 11. 文字换行AutoWrap
 12. 获取图片信息getInfo
 13. 在浏览器中显示图片look
 14. 下载图片load

# 如何使用

``` <?php
use \CreatePoster\CreateHelper;
require './gd.php';
CreateHelper::start();
```
