<?php extend('layouts/message_layout'); ?>

<?php section('content'); ?>

<div>
    <img style="height:64px" id="success-icon" class="mt-0 mb-5" src="<?= base_url('assets/img/success.png') ?>" alt="success" />
</div>

<div class="mb-5">
    <h3><?= lang('appointment_registered') ?></h3>
        <table class="styled-table">
            <thead>
                <tr>
                    <th class="th1">Datos Abono </th>
                    <th class="th2">Para Transferencia</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <td>RUT Empresa </td>
                <td>77.875.803-2</td>
                </tr>
                <tr>
                <td>Banco</td>
                <td>Banco Santander</td>
                </tr>
                <tr>
                <td>Tipo de cuenta</td>
                <td>Cuenta Corriente</td>
                </tr>
                <tr>
                <td>Número Cuenta</td>
                <td>93376927</td>
                </tr>
                <tr>
                <td>Correo</td>
                <td>salon@glamimperio.cl</td>
                </tr>
            </tbody>

        </table>
                <h3 class="h3-comprobante">Enviar comprobante a el
                    <a href="https://api.whatsapp.com/send/?phone=56947814410&text=Hola+�%2C%0AQuiero+comunicarme+con+ustedes+�&type=phone_number&app_absent=0">+569 4781 4410</a></td>
                </h3>
                            
                <!-- <p>
                    <?= lang('appointment_details_was_sent_to_you') ?>
                </p> -->

                <!-- <p>
                    <strong>
                        <?= lang('check_spam_folder') ?>
                    </strong>
                </p> -->

                <a href="<?= site_url() ?>" class="btn btn-success btn-large">
                    <i class="fas fa-calendar-alt"></i>
                    Volver Agendar
                    <!-- <?= lang('go_to_booking_page') ?> -->
                </a>

                <a href="<?= $add_to_google_url ?>" id="add-to-google-calendar" class="btn btn-primary" target="_blank">
                    <i class="fas fa-plus"></i>
                    <?= lang('add_to_google_calendar') ?>
                </a>
        </table>
</div>

<?php end_section('content'); ?>

<?php section('scripts'); ?>

<?php component('google_analytics_script', ['google_analytics_code' => vars('google_analytics_code')]); ?>
<?php component('matomo_analytics_script', [
    'matomo_analytics_url' => vars('matomo_analytics_url'),
    'matomo_analytics_site_id' => vars('matomo_analytics_site_id'),
]); ?>

<?php end_section('scripts'); ?>
