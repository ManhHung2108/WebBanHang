<?php

/**
 * 
 * Format Class 
 * 
 */
class Format
{
    public function formatDate($date)
    {
        return date('F j, Y, g:i a', strtotime($date));
    }

    public function textShorten($text, $limit = 400)
    {
        $text = $text . " ";
        $text = substr($text, 0, $limit);
        $text = substr($text, 0, strrpos($text, ' '));
        $text = $text . "......";
        return $text;
    }

    public function validation($data)
    {
        $data = trim($data);           //Xóa khoảng trắng ở 2 đầu phía chuỗi
        $data = stripcslashes($data);  //Loại bỏ dấu "\" được thêm bởi addcslashes
        $data = htmlspecialchars($data); //Chuyển đổi một số ký tự được xác định trước thành các thực thể HTML.
        return $data;
    }

    public function title()
    {
        $path = $_SERVER['SCRIPT_FILENAME'];
        $title = basename($path, '.php');
        if ($title == 'index') {
            $title = 'home';
        } elseif ($title == 'contact') {
            $title = 'contact';
        }
        return $title = ucfirst($title); //Chuyển đổi ký tự đầu tiên thành chữ hoa
    }
}