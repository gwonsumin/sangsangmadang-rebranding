<?php
/**
 * KT&G 상상마당 공통 메타(기본·OG·Twitter)
 *
 * 포함 전에 선택적으로 설정:
 * @var string $page_meta_title       <title>과 동일 권장
 * @var string $page_meta_description 페이지 요약(미설정 시 사이트 기본값)
 */
if (!isset($page_meta_title) || $page_meta_title === '') {
    $page_meta_title = 'KT&G 상상마당';
}
if (!isset($page_meta_description) || $page_meta_description === '') {
    $page_meta_description = 'KT&G 상상마당은 공연·영화·전시·교육이 어우러진 복합문화공간입니다. 홍대·논산·춘천·대치·부산 등 지역별 프로그램과 소식을 만나보세요.';
}

$meta_keywords = 'KT&G 상상마당,상상마당,KT&G,복합문화공간,공연,영화,전시,교육,문화공간,홍대,논산,춘천,대치,부산';
$meta_author = '권수민';
$meta_generator = 'Visual Studio Code';

$scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
$host = isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : '';
$request_uri = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '/';
$script_name = isset($_SERVER['SCRIPT_NAME']) ? $_SERVER['SCRIPT_NAME'] : '';

$base_url = ($host !== '') ? ($scheme . '://' . $host) : '';
$og_url = ($base_url !== '') ? ($base_url . $request_uri) : '';

$dir = rtrim(str_replace('\\', '/', dirname($script_name)), '/');
if ($dir === '' || $dir === '.') {
    $og_image_rel_path = '/img/og/sangsangmadang-og.jpg';
} else {
    $og_image_rel_path = $dir . '/img/og/sangsangmadang-og.jpg';
}
$og_image = ($base_url !== '') ? ($base_url . $og_image_rel_path) : './img/og/sangsangmadang-og.jpg';

$h = static function ($s) {
    return htmlspecialchars((string) $s, ENT_QUOTES, 'UTF-8');
};
?>
<meta name="description" content="<?php echo $h($page_meta_description); ?>">
<meta name="keywords" content="<?php echo $h($meta_keywords); ?>">
<meta name="author" content="<?php echo $h($meta_author); ?>">
<meta name="generator" content="<?php echo $h($meta_generator); ?>">
<meta name="format-detection" content="telephone=no">
<meta property="og:type" content="website">
<meta property="og:site_name" content="<?php echo $h('KT&G 상상마당'); ?>">
<meta property="og:title" content="<?php echo $h($page_meta_title); ?>">
<meta property="og:description" content="<?php echo $h($page_meta_description); ?>">
<meta property="og:image" content="<?php echo $h($og_image); ?>">
<?php if ($og_url !== '') { ?>
<meta property="og:url" content="<?php echo $h($og_url); ?>">
<?php } ?>
<meta property="og:locale" content="ko_KR">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="<?php echo $h($page_meta_title); ?>">
<meta name="twitter:description" content="<?php echo $h($page_meta_description); ?>">
<meta name="twitter:image" content="<?php echo $h($og_image); ?>">
