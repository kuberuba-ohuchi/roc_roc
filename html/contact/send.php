<?php
if(strpos($_SERVER['HTTP_REFERER'],'roots-c.com') !== false){
?>
<?php

mb_internal_encoding("UTF-8");

$company = htmlspecialchars($_POST['company'],ENT_QUOTES, 'UTF-8');
$name = htmlspecialchars($_POST['name'],ENT_QUOTES, 'UTF-8');
$phonetic = htmlspecialchars($_POST['phonetic'],ENT_QUOTES, 'UTF-8');
$url = htmlspecialchars($_POST['url'],ENT_QUOTES, 'UTF-8');
$tel = htmlspecialchars($_POST['tel'],ENT_QUOTES, 'UTF-8');
$mail = htmlspecialchars($_POST['mail'],ENT_QUOTES, 'UTF-8');
$comment = htmlspecialchars($_POST['comment'],ENT_QUOTES, 'UTF-8');


$message .= $name .' 様。'."\n\n";
$message .= 'この度はお問い合わせいただきありがとうございました。'."\n";
$message .= '以下の内容が送信されました。'."\n\n";

$message .= '【貴社名】'."\n";
$message .= $company ."\n\n";

$message .= '【担当者名】'."\n";
$message .= $name ."\n\n";

$message .= '【フリガナ】'."\n";
$message .= $phonetic ."\n\n";

$message .= '【貴社ホームページ】'."\n";
$message .= $url ."\n\n";

$message .= '【電話番号】'."\n";
$message .= $tel ."\n\n";

$message .= '【メールアドレス】'."\n";
$message .= $mail ."\n\n";

$message .= '【お問い合わせ内容】'."\n";
$message .= $comment ."\n\n";


$message .= "\n" ."-------------------------------------------------------" ."\n";
$message .= "ルーツ・オブ・コミュニケーション株式会社"."\n";
$message .= "〒104-0033 東京都中央区 新川2丁目1-10 八重洲早川第2ビル5F"."\n";
$message .= "TEL：03-3553-7878（平日：10:00～17:00）"."\n";
$message .= "MAIL : info@roots-c.com"."\n";
$message .= "-------------------------------------------------------" ."\n";



mb_send_mail($mail, '【ルーツ・オブ・コミュニケーション株式会社】問い合わせいただきありがとうございます。', $message,'From:info@roots-c.com');

mb_send_mail('info@roots-c.com', '【ルーツ・オブ・コミュニケーション株式会社】webサイトより問い合わせがありました。', $message,'From:info@roots-c.com');



header("Location: thanks.html");
?>

<?php

}else{
header("Location: https://roots-c.com");
}

?>
