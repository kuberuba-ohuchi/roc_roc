<?php include("header.html") ?>

 <div class="freecenter">
 <img src="images/lbl_title_contact.gif" width="560" height="45" alt="お問合せ contact" />
 </div>
 <div class="text560">お問合せには、2営業日以内にご返信致します。<br />
 ※土・日・祝日・年末年始他、弊社休業日、及び営業時間外にお問合せ頂いた場合、返信が遅くなる事もございますので、予めご了承ください。<br />
 お急ぎの方など、お電話または<a href="mailto:info@roots-c.com">メール</a>でも受け付けております。<br />
 TEL:03-3553-7878(平日：10:00～17:00)
<br clear="all" />
  <div id="contactbox">
	<form action="preview.php" method="post" id="frm">
	<table border="0" cellspacing="0" cellpadding="0">
          <tr>
            <th>貴社名<span class="must">(必須)</span></th>
            <td width="400"><input type="text" name="company" /><br /><small>例：ルーツオブコミュニケーション株式会社</small></td>
          </tr>
          <tr class="even">
            <th>担当者名<span class="must">(必須)</span></th>
            <td><input maxlength="60" size="40" name="name" id="name" /><br /><small>例：広告太郎</small></td>
          </tr>
          <tr>
            <th>フリガナ<span class="must">(必須)</span></th>
            <td><input maxlength="60" size="40" name="ruby" id="ruby" /><br /><small>例：コウコクタロウ</small></td>
          </tr>
          <tr class="even">
            <th>貴社ホームページ</th>
            <td><input maxlength="60" size="40" name="url" id="url" /><br /><small>例：http://www.roots-c.com/</small></td>
          </tr>
          <tr>
            <th>電話番号<span class="must">(必須)</span></th>
            <td><input maxlength="60" size="40" name="tel" id="tel" style="ime-mode: disabled;" /><br /><small>例：03-3553-7878（市外局番からご記入してください）</small></td>
          </tr>
          <tr class="even">
            <th>メールアドレス<span class="must">(必須)</span></th>

            <td><input maxlength="60" size="40" name="mail" style="ime-mode: disabled;" /><br /><small>例：information@roots-c.com</small></td>
          </tr>
          <tr>
            <th nowrap>お問合せ内容<span class="must">(必須)</span></th>
            <td><textarea name="comment" cols="40" rows="8" id="comment"></textarea></td>
          </tr>
     </table>
     <div class="handling">
	     	<div class="individual">
				<p class="b_19">個人情報の取り扱いについて</p>
					<div class="mt10">
					この入力フォームでご提供いただく個人情報のお取り扱いの方針について、以下の通り明示いたします。<br />
					<ol>
						<li>ご提供いただいた個人情報は、以下のお客様からのお問い合わせに対するご連絡のみに使用いたします。</li><br />
						<li>ご提供いただいた個人情報を第三者に提供することはありません。</li><br />
						<li>ご提供いただいた個人情報を他社に委託することはありません。</li><br />
						<li>ご提供いただいた個人情報の利用目的の通知、開示・訂正・追加・削除、利用停止・消去及び第三者提供の
							停止をご希望される場合は、下記の個人情報相談窓口までご連絡ください。</li><br />
						<li>個人情報の提供は必須ではありません。ただし、ご提供いただけなかった方は、いただきましたお問い合わ
							せへのご連絡が出来ない場合がございます。ご容赦下さいませ。</li>
					</ol>
					</div><!--mt10-->
					<div class="info">
					<span>
					ルーツ・オブ・コミュニケーション株式会社<br />
						個人情報保護管理者	金子 達也<br />
						ＴＥＬ: 03-3553-7878
					</span>
					</div>
				</div>
     		</div>
     		<div class="handling_btn">
           		<input type="image" name="Submit" value="個人情報の取り扱いに同意して問合せをする" src="images/btn_contact_off.gif" />
			</div>
	</form>

  </div><!--contactbox-->
 </div><!--text560-->

<?php include("footer.php") ?>