<?php
//hàm tạo slug từ chuỗi có dấu
function to_slug($str)
{
    $str = remove_accents($str);
    // replace non letter or digits by -
    $str = preg_replace('~[^\pL\d]+~u', '-', $str);

    // transliterate
    $str = iconv('utf-8', 'us-ascii//TRANSLIT', $str);

    // remove unwanted characters
    $str = preg_replace('~[^-\w]+~', '', $str);

    // trim
    $str = trim($str, '-');

    // remove duplicate -
    $str = preg_replace('~-+~', '-', $str);

    // lowercase
    $str = strtolower($str);

    if (empty($str)) {
        return 'n-a';
    }

    return $str;
}



//hàm xoá dấu tiếng việt
function remove_accents($str)
{

    $unicode = array(

        'a' => 'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',

        'd' => 'đ',

        'e' => 'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',

        'i' => 'í|ì|ỉ|ĩ|ị',

        'o' => 'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',

        'u' => 'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',

        'y' => 'ý|ỳ|ỷ|ỹ|ỵ',

        'A' => 'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',

        'D' => 'Đ',

        'E' => 'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',

        'I' => 'Í|Ì|Ỉ|Ĩ|Ị',

        'O' => 'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',

        'U' => 'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',

        'Y' => 'Ý|Ỳ|Ỷ|Ỹ|Ỵ',

    );

    foreach ($unicode as $nonUnicode => $uni) {

        $str = preg_replace("/($uni)/i", $nonUnicode, $str);
    }
    $str = str_replace(' ', '_', $str);

    return $str;
}


//check and create folder
function checkAndCreateFolder($path)
{
    if (!file_exists($path)) {
        mkdir($path, 0777, true);
    }
}

//limit word
function limitWord($str, $limit = 50)
{
    $str = strip_tags($str);
    if (strlen($str) > $limit) {
        $strCut = substr($str, 0, $limit);
        $str = substr($strCut, 0, strrpos($strCut, ' ')) . '...';
    }
    return $str;
}
