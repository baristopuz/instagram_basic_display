<?php
    $this->load->view($active_theme . 'components/instagram_defines');
    $this->load->view($active_theme . 'components/ig_basic_display');


    $params = array(
        'get_code' => isset($_GET['code']) ? $_GET['code'] : '',
        'access_token' => IG_ACCESS_TOKEN,
        'user_id' => IG_USER_ID
    );
    $ig = new instagram_basic_display_api($params);
    $user = $ig->getUser();
    $usersMedia = $ig->getUsersMedia();
    ?>
    <?php if (false === empty($_GET['instagram_get_long_token'])) : ?>
        <?php if ($ig->hasUserAccessToken) : ?>
            <h2>hasUserAccessToken true</h2>
            <p><?php echo $ig->getUserAccessToken(); ?></p>
            <p><?php echo $ig->getUserAccessTokenExpires(); ?></p>
        <?php else : ?>
            <p>
                Longlived token almak için pcden hesaba giriş yapmalısın,
                ardından buradan longlived token için oluşan auth urle girmelisin,
                yönlendirme olduğunda tokenla beraber geri dönüş olacak.
                Ardından gelen access token long lived olmalı, expiresdan görebilirsin.
                Gelen kodu instagram_defines.php dosyasına ekle.
            </p>
            <h2>hasUserAccessToken false</h2>
            <h2><a href="<?php echo $ig->authorizationUrl; ?>">AUTH INSTAGRAM</a></h2>
        <?php endif; ?>
    <?php endif; ?>