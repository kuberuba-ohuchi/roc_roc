<?php
$company = htmlspecialchars($_POST['company'],ENT_QUOTES, 'UTF-8');
$name = htmlspecialchars($_POST['name'],ENT_QUOTES, 'UTF-8');
$phonetic = htmlspecialchars($_POST['phonetic'],ENT_QUOTES, 'UTF-8');
$url = htmlspecialchars($_POST['url'],ENT_QUOTES, 'UTF-8');
$tel = htmlspecialchars($_POST['tel'],ENT_QUOTES, 'UTF-8');
$mail = htmlspecialchars($_POST['mail'],ENT_QUOTES, 'UTF-8');
$comment = htmlspecialchars($_POST['comment'],ENT_QUOTES, 'UTF-8');

if($company ==''){
    $errorMsg['company'] = '入力してください。';
}

if($name ==''){
    $errorMsg['name'] = '入力してください。';
}

if($phonetic ==''){
    $errorMsg['phonetic'] = '入力してください。';
}

if (!preg_match("/^[0-9]{2,4}-[0-9]{2,4}-[0-9]{3,4}$/", $tel)) {
  $errorMsg['tel'] = '半角数字・ハイフンを使用して入力してください。';
}

if($mail ==''){
    $errorMsg['mail'] = 'メールアドレスを入力してください。';
}else{
    if(preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $mail)){
    }else{
        $errorMsg['mail'] = 'メールアドレスの書式が間違っています。';
    }
}

if($comment ==''){
    $errorMsg['comment'] = '入力してください。';
}

if(count($errorMsg) > 0) $state = 1;
else $state = 2;
?>


<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta charset="utf-8">
        <meta name="description" content="ルーツ・オブ・コミュニケーション株式会社の個人情報保護方針ページです。">
        <meta name="keywords" content="ルーツ・オブ・コミュニケーション,ルーツ オブ コミュニケーション,お問い合わせ">
        <meta name='viewport' content='width=device-width,user-scalable=no'>
        <meta name="format-detection" content="telephone=no">

        <title>Contact｜ルーツ・オブ・コミュニケーション株式会社</title>

        <link rel="stylesheet" href="//fonts.googleapis.com/earlyaccess/notosansjp.css">
        
        <link rel="stylesheet" href="../assets/css/style.css" media="all">

        <script src="../assets/js/vendor/jquery.js"></script>
        <script src="../assets/js/plugins.js"></script>
        
        <script src="../assets/js/script.js"></script>
        <style type="text/css">
            body.contact #textbody .form dl dd p.ermsg{
                color:#d7001d;
                font-size:12px;
            }
        </style>
    </head>
    <body class="contact child-index">
        <div id="wrapper">
            <a id="menu-btn"><span></span></a>
            <header class="1">
                <div class="table-cell">
                    <div class="cell">
                        <a id="header-logo" href="../index.html"><img class="js-switchimg" data-src="../assets/img/common/header_logo_pc.png" alt=""></a>
                    </div>
                    <div class="cell">
                        <img class="pcshow" src="../assets/img/common/header_copy.png" alt="私たちは、コミュニケーション戦略を成功へと導く「プランニング・エージェンシー」です。">
                    </div>
                </div>
            </header>


            <nav id="menu">
                <ul>
                    <li><a href="../index.html"><img src="../assets/img/common/btn_home.png" alt="HOME"></a></li>
                    <li><a href="../company/"><img src="../assets/img/common/btn_company.png" alt="Company"></a></li>
                    <li><a href="../works/"><img src="../assets/img/common/btn_works.png" alt="Works"></a></li>
                    <li><a href="../recruit/"><img src="../assets/img/common/btn_recruit.png" alt="Recruit"></a></li>
                </ul>
                <p class="ipLp"><a href="https://roots-c.com/influencers_lp/" target="_blank"><span><img src="../assets/img/common/btn_influencer.png" alt="Influencer Planning"></span></a></p>
            </nav>

            <div id="breadcrumb" class="pcshow">
                <div class="inner1080">
                    <ul class="flexbox">
                        <li><a href="../index.html">HOME</a></li>
                        <li>Contact</li>
                    </ul>
                </div>
            </div>



            <main>
                <article>
                    <section>
                        <h1>お問い合わせ</h1>


                        <div id="textbody">
<?php
if($state == 1){
?>
                            <form action="check.php" method="post">

                                <div class="form">
                                    <div class="inner710">

                                        <div class="lead">
                                            <p>
                                                お問い合わせには、2営業日以内にご返信致します。<br>
                                                ※土・日・祝日・年末年始他、弊社休業日、及び営業時間外にお問い合わせ頂いた場合、返信が遅くなる事もございますので、予めご了承ください。<br>
                                                お急ぎの方など、お電話または<a href="mailto:info@roots-c.com">メール</a>でも受け付けております。<br>
                                                TEL：03-3553-7878（平日：10:00～17:00）
                                            </p>
                                        </div>

                                        <dl class="dl-flex">
                                            <dt>
                                                <p>貴社名　<span class="must">※必須</span></p>
                                            </dt>
                                            <dd>
                                                <input type="text" name="company" id="company" placeholder="ルーツオブコミュニケーション株式会社" value="<?php echo $company; ?>">
                                                <p class="ermsg"><?php echo $errorMsg['company']; ?></p>
                                            </dd>

                                            <dt>
                                                <p>担当者名　<span class="must">※必須</span></p>
                                            </dt>
                                            <dd>
                                                <input type="text" name="name" id="name" placeholder="広告　太郎" value="<?php echo $name; ?>">
                                                <p class="ermsg"><?php echo $errorMsg['name']; ?></p>
                                            </dd>

                                            <dt>
                                                <p>フリガナ　<span class="must">※必須</span></p>
                                            </dt>
                                            <dd>
                                                <input type="text" name="phonetic" id="phonetic" placeholder="コウコク　タロウ" value="<?php echo $phonetic; ?>">
                                                <p class="ermsg"><?php echo $errorMsg['phonetic']; ?></p>
                                            </dd>

                                            <dt>
                                                <p>貴社ホームページ</p>
                                            </dt>
                                            <dd>
                                                <input type="text" name="url" id="url" placeholder="https://www.roots-c.com/" value="<?php echo $url; ?>">
                                                <p class="ermsg"><?php echo $errorMsg['url']; ?></p>
                                            </dd>

                                            <dt>
                                                <p>電話番号　<span class="must">※必須</span></p>
                                            </dt>
                                            <dd>
                                                <input type="text" name="tel" id="tel" placeholder="03-3553-7878" value="<?php echo $tel; ?>">
                                                <p class="ermsg"><?php echo $errorMsg['tel']; ?></p>
                                            </dd>

                                            <dt>
                                                <p>メール　<span class="must">※必須</span></p>
                                            </dt>
                                            <dd>
                                                <input type="email" name="mail" id="mail" placeholder="info@roots-c.com" value="<?php echo $mail; ?>">
                                                <p class="ermsg"><?php echo $errorMsg['mail']; ?></p>
                                            </dd>

                                            <dt>
                                                <p>お問い合わせ内容　<br><span class="must">※必須</span></p>
                                            </dt>
                                            <dd>
                                                <textarea name="comment" id="comment" placeholder="こちらにお問い合わせ内容を入力してください。"><?php echo $comment; ?></textarea>
                                                <p class="ermsg"><?php echo $errorMsg['comment']; ?></p>
                                            </dd>
                                        </dl>
                                    </div>
                                </div>


                                <div class="moreinfo">
                                    <div class="inner710">
                                        <h2>個人情報の取り扱いについて</h2>
                                        <div class="txt-set">
                                            <p>
                                                この入力フォームでご提供いただく個人情報のお取り扱いの方針について、以下の通り明示いたします。
                                            </p>
                                            <p>
                                                1. ご提供いただいた個人情報は、以下のお客様からのお問い合わせに対するご連絡のみに使用いたします。
                                            </p>
                                            <p>
                                                2. ご提供いただいた個人情報を第三者に提供することはありません。
                                            </p>
                                            <p>
                                                3. 個人情報の取扱いの一部、または全てを委託することがあります。
                                            </p>
                                            <p>
                                                4. ご提供いただいた個人情報の利用目的の通知、開示・訂正・追加・削除、利用停止・消去及び第三者提供の 停止をご希望される場合は、下記の個人情報相談窓口までご連絡ください。
                                            </p>
                                            <p>
                                                5. 個人情報の提供は必須ではありません。ただし、ご提供いただけなかった方は、いただきましたお問い合わ せへのご連絡が出来ない場合がございます。ご容赦下さいませ。
                                            </p>
                                            <p>
                                                6. 当社では、ご本人様が容易に知覚できない方法(Cookie等)で個人情報を取得することはいたしません。
                                            </p>

                                            <p class="txt-right">
                                                ルーツ・オブ・コミュニケーション株式会社<br>
                                                個人情報相談窓口責任者<br>
                                                TEL：03-3553-7878
                                            </p>
                                        </div>
                                    </div>
                                </div>


                                <div class="btn">
                                    <button type="submit">個人情報の取り扱いに同意して送信 <img src="../assets/img/common/icon_mail.png" alt="icon"></button>
                                </div>
                            </form>
<?php
}else{
?>
                            <form action="send.php" method="post">

                                <div class="form">
                                    <div class="inner710">
                                        <dl class="dl-flex">
                                            <dt>
                                                <p>貴社名　<span class="must">※必須</span></p>
                                            </dt>
                                            <dd>
                                                <?php echo $company; ?>
                                            </dd>

                                            <dt>
                                                <p>担当者名　<span class="must">※必須</span></p>
                                            </dt>
                                            <dd>
                                              <?php echo $name; ?>
                                            </dd>

                                            <dt>
                                                <p>フリガナ　<span class="must">※必須</span></p>
                                            </dt>
                                            <dd>
                                              <?php echo $phonetic; ?>
                                            </dd>

                                            <dt>
                                                <p>貴社ホームページ</p>
                                            </dt>
                                            <dd>
                                              <?php echo $url; ?>
                                            </dd>

                                            <dt>
                                                <p>電話番号　<span class="must">※必須</span></p>
                                            </dt>
                                            <dd>
                                                <?php echo $tel; ?>
                                            </dd>

                                            <dt>
                                                <p>メール　<span class="must">※必須</span></p>
                                            </dt>
                                            <dd>
                                                <?php echo $mail; ?>
                                            </dd>

                                            <dt>
                                                <p>お問い合わせ内容　<br><span class="must">※必須</span></p>
                                            </dt>
                                            <dd>
                                                <?php echo $comment; ?>
                                            </dd>
                                        </dl>
                                    </div>
                                </div>


                                <div class="moreinfo">
                                    <div class="inner710">
                                        <h2>個人情報の取り扱いについて</h2>
                                        <div class="txt-set">
                                            <p>
                                                この入力フォームでご提供いただく個人情報のお取り扱いの方針について、以下の通り明示いたします。
                                            </p>
                                            <p>
                                                １．ご提供いただいた個人情報は、以下の目的のみに使用いたします。<br>
                                                　　・お客様からのお問い合わせに対するご連絡として使用します。
                                            </p>
                                            <p>
                                                2. ご提供いただいた個人情報を第三者に提供することはありません。
                                            </p>
                                            <p>
                                                3. 個人情報の取扱いの一部、または全てを委託することがあります。
                                            </p>
                                            <p>
                                                4. ご提供いただいた個人情報の利用目的の通知、開示・訂正・追加・削除、利用停止・消去及び第三者提供の停止をご希望される場合は、下記の個人情報相談窓口までご連絡ください。
                                            </p>
                                            <p>
                                                5. 個人情報の提供は必須ではありません。ただし、ご提供いただけなかった方は、いただきましたお問い合わせへのご連絡ができない場合がございます。ご容赦下さいませ。
                                            </p>
                                            <p>
                                                6. 当社では、ご本人様が容易に知覚できない方法(Cookie等)で個人情報を取得することはいたしません。
                                            </p>
                                            <p class="txt-right">
                                                ルーツ・オブ・コミュニケーション株式会社<br>
                                                個人情報保護管理者の代理人：管理本部　個人情報相談窓口担当<br>
                                                TEL：03-3553-7878
                                            </p>
                                        </div>
                                    </div>
                                </div>


                                <div class="btn">
                                    <button type="submit">個人情報の取り扱いに同意して送信 <img src="../assets/img/common/icon_mail.png" alt="icon"></button>
                                </div>
                                <input type="hidden" name="company" value="<?php echo $company; ?>">
                                <input type="hidden" name="name" value="<?php echo $name; ?>">
                                <input type="hidden" name="phonetic" value="<?php echo $phonetic; ?>">
                                <input type="hidden" name="url" value="<?php echo $url; ?>">
                                <input type="hidden" name="tel" value="<?php echo $tel; ?>">
                                <input type="hidden" name="mail" value="<?php echo $mail; ?>">
                                <input type="hidden" name="comment" value="<?php echo $comment; ?>">
                            </form>

<?php
}
?>

                        </div>
                    </section>
                </article>
            </main>




            <footer class="footer ">
                <div class="upper">
                    <div class="inner1000">
                        <div class="left">
                            <p>
                                ルーツ・オブ・コミュニケーション株式会社<br>
                                <span class="sp-br">〒104-0033 東京都中央区</span>新川2丁目1-10 八重洲早川第2ビル5F
                            </p>
                            <p>
                                TEL : 03-3553-7878　FAX : 03-3553-7879
                            </p>
                        </div>
                        <div class="right">
                            <a href="../contact/"><img src="../assets/img/common/btn_contact.png" alt="Contact"></a>
                        </div>
                    </div>
                </div>
                <div class="lower">
                    <div class="float inner1000">
                        <div class="left">
                            <div class="table-cell">
                                <div class="cell"><img src="../assets/img/common/footer_logo.png" alt="ROOTS OF COMMUNICATION Co., Ltd."></div>
                                <div class="cell"><img src="../assets/img/common/icon_pmark.png" alt="Privacy"></div>
                                <div class="cell"><a href="../privacy/">Privacy Policy</a></div>
                            </div>
                        </div>
                        <div class="right">
                            <p>Copyright © 2019 ROOTS OF COMMUNICATION Co., Ltd. All rights reserved.</p>
                        </div>
                    </div>
                </div>
            </footer>
        </div>



        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-84830727-24"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', 'UA-84830727-24');
        </script>
    </body>
</html>
