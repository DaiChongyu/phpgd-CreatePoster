<?php
namespace CreatePoster;

/**
 *  生成海报图
 *  @author daichongweb
 *  @url daichongweb.cn,daichongweb.com
 */

class CreateHelper
{
    public static function start()
    {
        echo ('<h2>欢迎使用：)</h2>');
        echo '<hr />';
        echo '海报图制作步骤:';
        echo '<br />';
        echo '<br />';
        echo '&emsp;&emsp;1.创建画板(普通画板用CreatePalette;图像画板用CreateImage)';
        echo '<br />';
        echo '&emsp;&emsp;2.合并图片(ImagesMerge)';
        echo '<br />';
        echo '&emsp;&emsp;3.插入文字(CreateChars)';
        echo '<br />';
        echo '&emsp;&emsp;4.插入划线(CreateLine)';
        echo '<br />';
        echo '&emsp;&emsp;5.下载或查看';
        echo '<br />';
        echo ('<h2>注意事项:</h2>');
        echo '<hr />';
        echo "<font color='red'>注意事项：主图尽量改为png格式，这样的话图片会很清晰，在浏览器中直接查看效果不是很好，下载下来就会很清晰的。</font>";
    }

    /**
     * [CreatePalette 新建一个画板]
     * @author DaiChong
     * @DateTime 2019-05-23
     * @param    array      $config     数据配置
     * @param    int        $x_size     画板的宽度
     * @param    int        $y_size     画板的高度
     * @param    int        $red        红色
     * @param    int        $green      绿色
     * @param    int        $blue       蓝色
     */
    public static function CreatePalette($config)
    {
        $Palette = imagecreate($config['x_size'], $config['y_size']);
        imagecolorallocate($Palette, $config['red'], $config['green'], $config['blue']);
        return $Palette;
    }

    /**
     * [OrthogonBr 画一个矩形边框]
     * @author DaiChong
     * @DateTime 2019-05-23
     * @param    resource   $mainBg     画布资源
     * @param    array      $config     数据配置
     * @param    int        $x1         x坐标
     * @param    int        $y1         y坐标
     *
     * @param    int       $red         红色
     * @param    int       $green       绿色
     * @param    int       $blue        蓝色
     */
    public static function OrthogonBr($mainBg, $config)
    {
        $color = imagecolorallocate($mainBg, $config['red'], $config['green'], $config['blue']);
        imagerectangle($mainBg, $config['x1'], $config['y1'], $config['x2'], $config['y2'], $color);
    }

    /**
     * [OrthogonBg 画一个矩形实体]
     * @author DaiChong
     * @DateTime 2019-05-23
     * @param    resource   $mainBg     画布资源
     * @param    array      $config     数据配置
     * @param    int        $x1         x坐标
     * @param    int        $y1         y坐标
     *
     * @param    int        $red        红色
     * @param    int        $green      绿色
     * @param    int        $blue       蓝色
     */
    public static function OrthogonBg($mainBg, $config)
    {
        $color = imagecolorallocate($mainBg, $config['red'], $config['green'], $config['blue']);
        imagefilledrectangle($mainBg, $config['x1'], $config['y1'], $config['x2'], $config['y2'], $color);
    }

    /**
     * [CircleBr 画一个椭圆边框]
     * @author DaiChong
     * @DateTime 2019-05-23
     * @param    resource   $mainBg     画布资源
     * @param    array      $config     数据配置
     * @param    int        $left       距离左边的距离
     * @param    int        $top        距离上边的距离
     * @param    int        $width      宽度
     * @param    int        $height     高度
     * @param    int        $red        红色
     * @param    int        $green      绿色
     * @param    int        $blue       蓝色
     */
    public static function CircleBr($mainBg, $config)
    {
        $color = imagecolorallocate($mainBg, $config['red'], $config['green'], $config['blue']);
        imageellipse($mainBg, $config['left'], $config['top'], $config['width'], $config['height'], $color);
    }

    /**
     * [CircleBg 画一个实体椭圆]
     * @author DaiChong
     * @DateTime 2019-05-23
     * @param    resource   $mainBg     画布资源
     * @param    array      $config     数据配置
     * @param    int        $left       距离左边的距离
     * @param    int        $top        距离上边的距离
     * @param    int        $width      宽度
     * @param    int        $red        红色
     * @param    int        $green      绿色
     * @param    int        $blue       蓝色
     */
    public static function CircleBg($mainBg, $config)
    {
        $color = imagecolorallocate($mainBg, $config['red'], $config['green'], $config['blue']);
        imagefilledellipse($mainBg, $config['left'], $config['top'], $config['width'], $config['height'], $color);
    }

    /**
     * [StarBr 画一个五角星边框]
     * @author DaiChong
     * @DateTime 2019-05-23
     * @param    resource   $mainBg     画布资源
     * @param    array      $config     数据配置
     * @param    int        $r          半径
     * @param    int        $left       距离左边的距离
     * @param    int        $top        距离上边的距离
     */
    public static function StarBr($mainBg, $config)
    {
        $r = $config['r'];
        $degree36 = deg2rad(36);
        $l = 2 * $r * sin($degree36);
        $a = $l * cos($degree36);
        $b = $l * sin($degree36);
        $c = $l / 2;
        $d = $r * cos($degree36);

        $px1 = $config['left'];
        $py1 = $config['top'];

        $px2 = $px1 + $a;
        $py2 = $py1 + $b;
        $px3 = $px1 + $c;
        $py3 = $py1 + $r + $d;
        $px4 = $px1 - $c;
        $py4 = $py1 + $r + $d;
        $px5 = $px1 - $a;
        $py5 = $py1 + $b;

        $color = imagecolorallocate($mainBg, $config['red'], $config['green'], $config['blue']);

        imageline($mainBg, $px2, $py2, $px5, $py5, $color);
        imageline($mainBg, $px1, $py1, $px3, $py3, $color);
        imageline($mainBg, $px1, $py1, $px4, $py4, $color);
        imageline($mainBg, $px2, $py2, $px4, $py4, $color);
        imageline($mainBg, $px3, $py3, $px5, $py5, $color);
    }

    /**
     * [CreateImage 新建一个图像画板]
     * @author DaiChong
     * @DateTime 2019-05-23
     * @param    url        $palette    图像的地址
     * @param    string     $dst_w      目标图片的宽度
     * @param    string     $dst_h      目标图片的高度
     * @param    string     $bgWidth    画板的宽度
     * @param    string     $bgHeight   画板的高度    这两项决定了图片如果小了是否会被拉伸
     */
    public static function CreateImage($palette, $dst_w = '', $dst_h = '', $bgWidth = '', $bgHeight = '')
    {

        $info = getimagesize($palette);

        $backgroundFun = 'imagecreatefrom' . image_type_to_extension($info[2], false);
        $background = $backgroundFun($palette);

        $backgroundWidth = imagesx($background);
        $backgroundHeight = imagesy($background);

        $imageRes = imageCreatetruecolor($bgWidth ? $bgWidth : $backgroundWidth, $bgHeight ? $bgHeight : $backgroundHeight);
        $color = imagecolorallocate($imageRes, 255, 255, 255);
        // 正式使用 这个定要注释
        // imagecolortransparent($imageRes, $color);
        imagefill($imageRes, 0, 0, $color);

        imagecopyresized($imageRes, $background, 0, 0, 0, 0, $dst_w ? $dst_w : imagesx($background), $dst_h ? $dst_h : imagesy($background), imagesx($background), imagesy($background));

        return $imageRes;
    }

    /**
     * [CreateChars 在画板中插入文字]
     * @author DaiChong
     * @DateTime 2019-05-23
     * @param    resource   $image      图片源
     * @param    array      $config     配置信息
     * @param    int        $red        红色
     * @param    int        $green      绿色
     * @param    int        $blue       蓝色
     * @param    int        $num        次数越多文字越粗
     * @param    int        $size       文字大小
     * @param    int        $angle      旋转的角度 默认不旋转为0
     * @param    int        $x          文字的坐标x
     * @param    int        $y          文字的坐标y
     * @param    int        $font       字体文件 这里一般为绝对路径
     * @param    int        $text       文字内容
     *
     */
    public static function CreateChars($image, $config)
    {
        //设置文字颜色
        $color = imagecolorexactalpha($image, $config['red'], $config['green'], $config['blue'], $config['alpha']);
        //循环多次为了加粗字体
        for ($i = 1; $i <= $config['num']; $i++) {

            imagettftext($image, $config['size'], $config['angle'], $config['x'], $config['y'], $color, $config['font'], $config['text']);
        }
        return $image;
    }

    /**
     * [CreateLine 画一条实线]
     * @author DaiChong
     * @DateTime 2019-05-23
     * @param    resource   $image      图片源
     * @param    array      $config     数据配置
     * @param    int        $red        红色
     * @param    int        $green      绿色
     * @param    int        $blue       蓝色
     * @param    int        $alpha      透明度 0不透明
     * @param    int        $x1 x2      坐标x
     * @param    int        $y1 y2      坐标y
     */
    public static function CreateLine($image, $config)
    {
        //设置线条颜色
        $color = imagecolorexactalpha($image, $config['red'], $config['green'], $config['blue'], $config['alpha']);
        //划线
        imageline($image, $config['x1'], $config['y1'], $config['x2'], $config['y2'], $color);
        return $image;
    }
    /**
     * [functionName 图片合并]
     * @author DaiChong
     * @DateTime 2019-05-23
     * 将 src_im 图像中坐标从 src_x，src_y 开始，宽度为 src_w，高度为 src_h 的一部分拷贝到 dst_im 图像中坐标为 dst_x 和 dst_y 的位置上。两图像将根据 pct
     * 来决定合并程度，其值范围从 0 到 100。当 pct = 0 时，实际上什么也没做，当为 100 时对于调色板图像本函数和 imagecopy() 完全一样，它对真彩色图像实现了 alpha *
     * 透明。
     * @return
     */
    public static function ImagesMerge($mainBg, $second, $config)
    {
        imagecopymerge($mainBg, $second, $config['dst_x'], $config['dst_y'], $config['src_x'], $config['src_y'], $config['src_w'], $config['src_h'], $config['pct']);
    }
    /**
     * [AutoWrap 文字换行]
     * @author DaiChong
     * @DateTime 2019-05-23
     * @param    int        $fontsize   字体大小
     * @param    int        $angle      角度大小
     * @param    int        $fontface   字体文件
     * @param    string     $string     文字内容
     * @param    width      $width      最大宽度 也就是达到这个宽度之后会换行
     */
    public static function AutoWrap($fontsize, $angle, $fontface, $string, $width)
    {

        $content = "";
        // 将字符串拆分成一个个单字 保存到数组 letter 中
        for ($i = 0; $i < mb_strlen($string); $i++) {
            $letter[] = mb_substr($string, $i, 1);
        }

        foreach ($letter as $l) {
            $teststr = $content . "" . $l;
            $testbox = imagettfbbox($fontsize, $angle, $fontface, $teststr);
            // 判断拼接后的字符串是否超过预设的宽度
            if (($testbox[2] > $width) && ($content !== "")) {
                $content .= "\n";
            }
            $content .= $l;
        }

        $content = mb_convert_encoding($content, "html-entities", "utf-8");

        return $content;
    }

    /**
     * [getInfo 获取图片信息]
     * @author DaiChong
     * @DateTime 2019-05-23
     * @param    url        $name       图片地址
     * @return   array
     */
    public static function getInfo($name)
    {
        $info = getimagesize($name);

        $width = $info[0];
        $height = $info[1];
        $mime = $info['mime'];
        switch ($mime) {
            case 'image/jpeg':
                $res = imagecreatefromjpeg($name);
                break;
            case 'image/gif':
                $res = imagecreatefromgif($name);
                break;
            case 'image/png':
                $res = imagecreatefrompng($name);
                break;
            case 'image/wbmp':
                $res = imagecreatefromwbmp($name);
                break;
        }
        return array('width' => $width, 'height' => $height, 'res' => $res);
    }

    /**
     * [look 在浏览器中显示图片]
     * @author DaiChong
     * @DateTime 2019-05-23
     * @param    resource   $imageRes   图片源
     * @return
     */
    public static function look($imageRes)
    {
        header("Content-type:image/png");
        imagejpeg($imageRes);
        imagedestroy($imageRes);
    }

    /**
     * [load 下载图片]
     * @author DaiChong
     * @DateTime 2019-05-23
     * @param    resource   $img    图片源
     * @param    url        $name   主图地址
     * @param    url        $path   下载地址
     * @return
     */
    public static function load($img, $name,$path='./')
    {

        $info = self::getInfo($name);

        $ext = pathinfo($name, PATHINFO_EXTENSION);
        $file_path = $path . date('Y-m-d');

        if (!file_exists($file_path)) {
            mkdir($file_path, 0777, true);
        }

        $rand_name = $file_path . '/' . md5(mt_rand() . time()) . "." . $ext;

        switch ($ext) {
            case 'jpg':
            case 'jpeg':
            case 'jpe':
                imagejpeg($img, $rand_name);
                break;
            case 'png':
                imagepng($img, $rand_name);
                break;
            case 'gif':
                imagegif($img, $rand_name);
                break;
            case 'bmp':
            case 'wbmp':
                imagewbmp($img, $rand_name);
                break;
        }
        //销毁资源
        imagedestroy($info['res']);
        imagedestroy($img);
    }
}
