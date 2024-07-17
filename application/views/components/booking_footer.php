<?php
/**
 * Local variables.
 *
 * @var bool $display_login_button
 */
?>

<div id="frame-footer">
<small>
                    <span class="footer-powered-by">
                        !Visita nuestas redes!
                    </span>
                    <span class="footer-options">
                        <ul>
                            <li class="listars">
                                <a class="redes" href="https://www.instagram.com/glam.imperio/" target="_blank">
                                    <i class="fa-brands fa-instagram"></i>
                                </a>


                            </li>
                            <li class="listars">
                                <a class="redes" href="https://www.tiktok.com/@glamimperio" target="_blank">
                                    <i class="fa-brands fa-tiktok"></i>
                                </a>
                            </li>
                            <li class="listars">
                                <a class="redes" href="https://www.facebook.com/profile.php?id=100088414493685" target="_blank">
                                    <i class="fa-brands fa-facebook-f"></i>
                                </a>
                            </li>
                        </ul>
                        <ul class="redesociales">
                            <a class="backend-link badge badge-primary" href="<?= site_url('backend'); ?>">
                                <i class="fas fa-sign-in-alt mr-2"></i>
                                <?= $this->session->user_id ? lang('backend_section') : lang('login') ?>
                            </a>
                        </ul>
                    </span>
                </small>
    <small>

        <span class="footer-options">
            <span id="select-language" class="badge bg-secondary">
                <i class="fas fa-language me-2"></i>
                <?= ucfirst(config('language')) ?>
            </span>
    
            <?php if ($display_login_button): ?>
                <a class="backend-link badge bg-primary text-decoration-none px-2"
                   href="<?= session('user_id') ? site_url('calendar') : site_url('login') ?>">
                    <i class="fas fa-sign-in-alt me-2"></i>
                    <?= session('user_id') ? lang('backend_section') : lang('login') ?>
                </a>
            <?php endif; ?>
        </span>
    </small>
</div>
