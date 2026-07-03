<?php

//初期設定
$body = "";

//投稿日付を取得
$date = date("Y年m月d日");

if ($_POST['sendsubmit']) {
	//入力フォーム文字からHTMLタグに変換
	include("module/change_str.php");
	$company = re_change_html($_POST['company'],0);
	$name = re_change_html($_POST['name'],0);
	$furigana = re_change_html($_POST['ruby'],0);
	$url = re_change_html($_POST['url'],0);
	$tel = re_change_html($_POST['tel'],0);
	$mail = re_change_html($_POST['mail'],0);
	$comment = re_change_html($_POST['comment'],1);

	//担当者に投稿通知メール送信
	include("module/sendmail.php");
	$to = "info@roots-c.com";
	$from = "info@roots-c.com";

	$mailsub = "【お問い合わせ】新規お問い合わせがありました";
	$mailbody = <<<EOM
【問い合わせ日時】
$date

【企業名】
$company

【担当者名】
$name

【フリガナ】
$furigana

【ホームページ】
$url

【電話番号】
$tel

【メールアドレス】
$mail

【お問い合わせ内容】
$comment

EOM;
	$rst = sendmail("UTF-8",$from,$to,$mailsub,$mailbody);

if ($mail) {
	$to = $mail;
	$from = "info@roots-c.com";
	$mailsub = "【自動返信メール】お問い合わせありがとうございます";
	$mailbody = <<<EOM
お問い合わせありがとうございました。
お問い合わせ内容に対しましては、
改めて担当者からご連絡差し上げます。
なお、本メールにお心当たりのない場合は、
入力されたメールアドレスが
間違っていた可能性があります。


ご不明な点がございましたら、
メールにてお問い合わせください。
info@roots-c.com

゜+.――゜+.――゜+.――゜+.――゜+.――゜+.+.――゜+.
ルーツ・オブ・コミュニケーション株式会社

[事務所]
〒104-0033
東京都中央区新川2丁目1-10 八重洲早川第2ビル5F
TEL:03-3553-7878　FAX:03-3553-7879
Web : http://www.roots-c.com/
゜+.――゜+.――゜+.――゜+.――゜+.――゜+.+.――゜+.
EOM;
	$rst = sendmail("UTF-8",$from,$to,$mailsub,$mailbody);

}

		if ($rst) {
			$body .= "<div class=\"text560\"><p><strong>お問い合わせありがとうございました。</strong></p><p>お問い合わせ内容を受付ました。改めて担当者からご連絡差し上げます。<br>メールアドレスをご記入の場合、自動返信メールをお送りいたしましたのでご確認ください。<br>自動返信メールが届かない場合、お手数ですが下記までご連絡くださいますようお願い申し上げます。<br>お問い合わせ先：<a href=\"mailto:info@roots-c.com\">info@roots-c.com</a></p><p class=\"totop\"><a href=\"https://www.roots-c.com/contact/\"><img src=\"images/btn_return.gif\" alt=\"お問い合わせのトップページに戻る\"></a></p></div>";
		}


//重複データがあればエラー
} else {
	$body .="<div class=\"text560\"><p>すでに送信された内容です。<br><a href=\"http://www.roots-c.com/\">ホームに戻る</a></p></div>";
}

include("header.html");
print <<<EOM
   <div class="freecenter">
   <img src="images/lbl_title_contact.gif" width="560" height="45" alt="お問合せ contact" />
  </div>
  <div class="text560">
EOM;
print $body;

print <<<EOM
EOM;
include("footer.php");
?>
