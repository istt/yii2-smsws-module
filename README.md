Yii2 Smsws Module
==============

SMS Web Service Module used in pair with Kannel SMPP Gateway.

## Specs

Tài liệu mô tả kết nối kỹ thuật với hệ thống SMS Gateway dành cho các doanh nghiệp 
hoặc CP để gửi tin nhắn Chăm sóc khách hàng (CSKH). 
 
Mô tả hàm kết nối: 
 
- Phương thức kết nối: Webservice (axis) 
- Đường truyền: Internet public hoặc Internet VPN, yêu cầu băng thông tối thiểu 2 Mps. 
- Cơ chế xác thực: xác thực bằng IP và tài khoản đăng nhập username/password. 
- Địa chỉ URL của Webservice: 
 http://g3g4.vn/smsws/services/SendMT?wsdl 
 
1. Gửi tin nhắn từ đầu số 
Tên hàm: sendFromServiceNumber 
 
public String sendFromServiceNumber (String username, String password, 
String receiver, String content, String target) 
 
Chi tiết các biến: 
 Bảng 1: Các tham số đầu vào hàm gửi tin nhắn từ đầu số: 
 
TT Tên tham số Kiểu dữ liệu Mô tả 
1 username * String Tên truy cập 
2 password * String Mật khẩu 
3 receiver * String Thuê bao nhận: 
- Dạng 849xxxxxxxx, 09xxxxxxxx, 9xxxxxxxx, 
841xxxxxxxxx, 01xxxxxxxxx hoặc 1xxxxxxxxx 
4 content * String Nội dung tin nhắn, độ dài không vượt quá 1000 ký 
tự 
5 target * String Mã gửi tin do đối tác truyền vào, mã này là duy nhất 
 
 Ghi chú: Các tham số được đánh dấu * là bắt buộc 
 
Kết quả: Xem bảng 3 

2. Gửi tin nhắn từ brandname 
Tên hàm: sendFromBrandname 
 
public String sendFromBrandname(String username, String password, String 
receiver, String brandname, String content, String target) 
 
Chi tiết các biến: 
 Bảng 2: Các tham số đầu vào hàm gửi tin nhắn từ brandname: 
 
TT Tên tham số Kiểu dữ liệu Mô tả 
1 username * String Tên truy cập 
2 password * String Mật khẩu 
3 receiver * String Thuê bao nhận: 
- Dạng 849xxxxxxxx, 09xxxxxxxx, 9xxxxxxxx, 
841xxxxxxxxx, 01xxxxxxxxx hoặc 1xxxxxxxxx 
4 brandname * String Brandname dùng để gửi tin nhắn 
5 content * String Nội dung tin nhắn 
6 target * String Mã gửi tin do đối tác truyền vào, mã này là duy nhất 
 
 Ghi chú: Các tham số được đánh dấu * là bắt buộc 
 
Kết quả: Xem bảng 3 
 
Bảng 3: Kết quả gửi tin nhắn: 
 
TT Tên tham số Kiểu dữ liệu Mô tả 
1 Response String Kết quả gửi tin 
 
 Trong đó: 
- Response: Kết quả của việc gửi tin 
- “0|…”: Xem bảng mã lỗi (bảng 4) 
 
Bảng 4: Mã lỗi: 
 
Mã lỗi Mô tả 
0 Success 
1 Username or Password is null 
2 <Chi tiết lỗi đăng nhập hệ thống không thành công> 
3 Receiver is null 
4 Invalid receiver 
5 Target is null 
6 Error: <chi tiết lỗi gửi tin> 
99 Error in processing: <chi tiết lỗi hệ thống> 
## Usage

Use github to fork this repository.

To create the message, navigate on the module directory after clone then run the following command:

~~~
../../../yii message/extract message-config.php
~~~

To install the schema after writing your migration:

~~~
../../../yii migrate/up --migrationPath=@vendor/istt/yii2-template-module/migrations
~~~

## Install

Modify the composer.json of your project:

~~~
[json]
 "repositories": [
        ...
        {
          "type": "vcs",
          "url": "https://github.com/istt/yii2-template-module",
          "reference":"master"
        },
        ...
],
"require": {
                ...
                "istt/yii2-template-module":"*",
                ...
        },
~~~

Then run the following commands:

~~~
[bash]
php composer.phar update
./yii migrate/up --migrationPath=@vendor/istt/yii2-template-module/migrations
~~~

Last, add the module to your config file

~~~
[php]
	'modules' => [
		...
		'project' => 'istt\template\TemplateModule',
		...
	],
~~~

In your main layout file:

~~~
[php]
$items =  [
        ['label' => 'Home', 'url' => ['/site/index']],
        ['label' => 'About', 'url' => ['/site/about']],
        ['label' => 'Contact', 'url' => ['/site/contact']],
        Yii::$app->user->isGuest ?
            ['label' => 'Login', 'url' => ['/site/login']] :
            ['label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                'url' => ['/site/logout'],
                'linkOptions' => ['data-method' => 'post']],
    ];
 foreach (\Yii::$app->modules as $id => $child) {
	$module = \Yii::$app->getModule($id);
	if ($module && (file_exists($phpFile = $module->getViewPath() . '/layouts/_menu' . ucfirst($id) . '.php'))) {
		$items = array_merge_recursive($items, require($phpFile));
	}
}
~~~



