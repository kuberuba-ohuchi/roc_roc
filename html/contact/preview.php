<?php

//初期設定
$body = "";
//入力エラーフラグ
$e_flag = 0;
//入力エラーチェック
include("module/input_check.php");

//入力フォーム内容
$items = Array(
"貴社名" => $_POST['company'],
"担当者名" => $_POST['name'],
"フリガナ" => $_POST['ruby'],
"電話番号" => $_POST['tel'],
"メールアドレス" => $_POST['mail'],
"お問い合わせ内容" => $_POST['comment'],
);
$errormsg = input_check($items);

//エラーフラグが立っていればエラー出力
if ($errormsg) {
	$body .= $errormsg;
	$e_flag = 1;
}


//フリガナチェック
if ($_POST['ruby']) {
	//ひらがなをカタカナに変換
	$_POST['ruby'] = mb_convert_kana($_POST['ruby'], "KVC","UTF-8");

	$errormsg = katakana_check($_POST['ruby']);
	if ($errormsg) {
		$body .= $errormsg;
		$e_flag = 1;
	}
}


//フォーマットチェック（電話番号）
if ($_POST['tel']) {
	$errormsg = tel_check($_POST['tel']);
	if ($errormsg) {
		$body .= $errormsg;
		$e_flag = 1;
	}
}

//フォーマットチェック（メールアドレス）
$_POST['vmail'] = $_POST['mail'];
if ($_POST['mail'] && $_POST['vmail']) {
	$errormsg = mail_check($_POST['mail'],$_POST['vmail']);
	if ($errormsg) {
		$body .= $errormsg;
		$e_flag = 1;
	}
}

//エラーの場合は戻るボタン設置
if ($e_flag > 0) {
//	$body .= "<p class=\"btn\"><input type=\"button\" name=\"back\" value=\"お問い合わせ入力画面に戻る\" onClick=\"history.back()\"></p>";
	$body .= "<br /><div class=\"handling_btn\"><input type=\"image\" src=\"images/btn_back.gif\" name=\"back\" value=\"お問い合わせ入力画面に戻る\" onClick=\"history.back()\"></div></div><!--text560-->";
}

//入力エラーでなければプレビュー表示
if ($e_flag < 1) {
	//入力フォーム文字からHTMLタグに変換
	include("module/change_str.php");

	$company = change_html($_POST['company'],"UTF-8",0);
	$name = change_html($_POST['name'],"UTF-8",0);
	$ruby = change_html($_POST['ruby'],"UTF-8",0);
	$url = change_html($_POST['url'],"UTF-8",0);
	$tel = change_html($_POST['tel'],"UTF-8",0);
	$mail = change_html($_POST['mail'],"UTF-8",0);
	$comment = change_html($_POST['comment'],"UTF-8",1);

	//不可視フィールドを作成する
	include("module/form_generated.php");
	$items = Array(
		"company" => $company,
		"name" => $name,
		"ruby" => $ruby,
		"url" => $url,
		"tel" => $tel,
		"mail" => $mail,
		"comment" => $comment
		);

	$hidden = hidden_generated($items);

	$body .=<<<EOM
 <div class="text560">
  <div id="contactbox">
   <form action="completed.php" method="post" name="form1">
   <table border="0" cellspacing="0" cellpadding="0">
          <tr>
            <th>貴社名<span class="must">（必須）</span></th>
            <td width="400">$company</td>
          </tr>
          <tr class="even">
            <th>担当者名<span class="must">（必須）</span></th>
            <td>$name</td>
          </tr>
          <tr>
            <th>フリガナ<span class="must">（必須）</span></th>
            <td>$ruby</td>
          </tr>
           <tr class="even">
            <th>貴社ホームページ</th>
            <td>$url</td>
          </tr>
          <tr>
            <th>電話番号<span class="must">（必須）</span></th>
            <td>$tel</td>
          </tr>
          <tr class="even">
            <th>メールアドレス<span class="must">（必須）</span></th>
            <td>$mail</td>
          </tr>
          <tr>
            <th>お問合せ内容<span class="must">（必須）</span></th>
            <td>$comment</td>
          </tr>
          <tr class="even">
            <th colspan="2" class="btn">$hidden
              <table border="0" cellspacing="0" cellpadding="0">
                <tr class="even"><td>
<a href="#"  onClick="history.back();return false;"><img src="images/btn_back.gif" alt="お問い合わせ入力画面に戻る" style="width: 224px;display:inline;"></a>
                </td>
                <td><a href="#" onClick="document.form1.submit();return false;"><img src="images/btn_send.gif" alt="上記内容で問い合わせする" style="width: 211px;"></a><input type="hidden" name="sendsubmit" value="submit">
                </td></tr>
              </table>
            </th>
          </tr>
      </table>
      </form>
  </div><!--contactbox-->
 </div><!--text560-->
EOM;

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