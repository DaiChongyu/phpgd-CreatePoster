<?php
use \CreatePoster\CreateHelper;
require '../gd.php';

$typeface = "D:\\PHPTutorial\\WWW\\create_img\\demo\\simkai.ttf";
$mainUrl = 'bg.png';
$codeUrl = 'code.png';
$goodUrl = 'good.png';

$mainBg = CreateHelper::CreateImage($mainUrl);
$codeBg = CreateHelper::CreateImage($codeUrl, 91, 91);
$goodBg = CreateHelper::CreateImage($goodUrl, 409, 389, 409, 389);

CreateHelper::ImagesMerge($mainBg, $codeBg, [
    'dst_x' => 31,
    'dst_y' => 695,
    'src_x' => 0,
    'src_y' => 0,
    'src_w' => 91,
    'src_h' => 91,
    'pct' => 100,
]);

CreateHelper::ImagesMerge($mainBg, $goodBg, [
    'dst_x' => 21,
    'dst_y' => 86,
    'src_x' => 0,
    'src_y' => 0,
    'src_w' => 409,
    'src_h' => 389,
    'pct' => 100,
]);

CreateHelper::CreateChars($mainBg, [
    'text' => '抢购时间',
    'num' => 3,
    'size' => 10,
    'angle' => 0,
    'x' => 108,
    'y' => 56,
    'font' => $typeface,
    'red' => 255,
    'green' => 255,
    'blue' => 255,
    'alpha' => 0,
]);

CreateHelper::CreateChars($mainBg, [
    'text' => '05-20 11:00至05-24 23:59',
    'num' => 1,
    'size' => 10,
    'angle' => 0,
    'x' => 180,
    'y' => 56,
    'font' => $typeface,
    'red' => 0,
    'green' => 0,
    'blue' => 0,
    'alpha' => 0,
]);

CreateHelper::CreateChars($mainBg, [
    'text' => CreateHelper::AutoWrap(12, 0, $typeface, '年度大促！【88元儿童自助晚餐★海外海皇冠大酒店】价值108元儿童自助晚餐，周末通用，超长有效期至2020年3月31日，囤券爆品！市区五...', 352),
    'num' => 1,
    'size' => 12,
    'angle' => 0,
    'x' => 50,
    'y' => 510,
    'font' => $typeface,
    'red' => 0,
    'green' => 0,
    'blue' => 0,
    'alpha' => 0,
]);

CreateHelper::CreateChars($mainBg, [
    'text' => '￥88.00',
    'num' => 3,
    'size' => 18,
    'angle' => 0,
    'x' => 100,
    'y' => 595,
    'font' => $typeface,
    'red' => 216,
    'green' => 67,
    'blue' => 37,
    'alpha' => 0,
]);

CreateHelper::CreateChars($mainBg, [
    'text' => '￥108.00 |',
    'num' => 3,
    'size' => 10,
    'angle' => 0,
    'x' => 190,
    'y' => 595,
    'font' => $typeface,
    'red' => 116,
    'green' => 116,
    'blue' => 116,
    'alpha' => 0,
]);

CreateHelper::CreateChars($mainBg, [
    'text' => '奖励4.5元',
    'num' => 2,
    'size' => 12,
    'angle' => 0,
    'x' => 265,
    'y' => 595,
    'font' => $typeface,
    'red' => 250,
    'green' => 179,
    'blue' => 61,
    'alpha' => 0,
]);

CreateHelper::CreateChars($mainBg, [
    'text' => '长按二维码进入产品页，',
    'num' => 3,
    'size' => 13,
    'angle' => 0,
    'x' => 185,
    'y' => 710,
    'font' => $typeface,
    'red' => 255,
    'green' => 255,
    'blue' => 255,
    'alpha' => 0,
]);

CreateHelper::CreateChars($mainBg, [
    'text' => '将产品分享至微信群或朋友圈，',
    'num' => 3,
    'size' => 13,
    'angle' => 0,
    'x' => 160,
    'y' => 740,
    'font' => $typeface,
    'red' => 255,
    'green' => 255,
    'blue' => 255,
    'alpha' => 0,
]);

CreateHelper::CreateChars($mainBg, [
    'text' => '好友购买成功后,您将获得现金奖励哦~',
    'num' => 3,
    'size' => 13,
    'angle' => 0,
    'x' => 140,
    'y' => 770,
    'font' => $typeface,
    'red' => 255,
    'green' => 255,
    'blue' => 255,
    'alpha' => 0,
]);

CreateHelper::CreateLine($mainBg, [
    'x1' => 188,
    'y1' => 590,
    'x2' => 250,
    'y2' => 590,
    'red' => 116,
    'green' => 116,
    'blue' => 116,
    'alpha' => 0,
]);
// CreateHelper::load($mainBg, $mainUrl);
CreateHelper::look($mainBg);
