<?php
/**
 * Local variables.
 *
 * @var array $available_services
 */
?>

<div id="wizard-frame-1" class="wizard-frame" style="visibility: hidden;">
    <div class="frame-container">
        <h2 class="frame-title mt-md-5">Seleccione Servicio y Estilista</h2>

        <div class="row frame-content">
            <div class="col col-md-8 offset-md-2">
            <div class="mb-3">
                <label for="select-category">
                    <strong><?= lang('category') ?></strong>
                </label>
                <select id="select-category" class="form-select">
                    <option value="">Seleccione Categoría</option>
                    <?php
                    $categories = [];
                    foreach ($available_services as $service) {
                        if ($service['service_category_id'] != NULL) {
                            $categories[$service['service_category_id']] = $service['service_category_name'];
                        }
                    }
                    foreach ($categories as $service_category_id => $service_category_name) {
                        echo '<option value="' . $service_category_id . '">' . $service_category_name . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="select-service">
                    <strong><?= lang('service') ?></strong>
                </label>
                <select id="select-service" class="form-select">
                    <option value="">Seleccione uno</option>
                    <?php
                    foreach ($available_services as $service) {
                        $category_id = $service['service_category_id'] ?? 'uncategorized';
                        echo '<option value="' . $service['id'] . '" data-category="' . $category_id . '">' . e($service['name']) . '</option>';
                    }
                    ?>
                </select>
            </div>
                
                <?php slot('after_select_service'); ?>

                <div class="mb-3">
                    <label for="select-provider">
                        <strong><?= lang('provider') ?></strong>
                    </label>

                    <select id="select-provider" class="form-select">
                        <option value="Seleccione uno">
                            Seleccione uno
                        </option>
                    </select>
                </div>

                <?php slot('after_select_provider'); ?>

                <div id="service-description" class="small">
                    <!-- JS -->
                </div>

                <?php slot('after_service_description'); ?>
                
            </div>
        </div>
    </div>

    <div class="command-buttons">
        <span>&nbsp;</span>

        <button type="button" id="button-next-1" class="btn button-next btn-dark"
                data-step_index="1">
            <?= lang('next') ?>
            <i class="fas fa-chevron-right ms-2"></i>
        </button>
    </div>
</div>
