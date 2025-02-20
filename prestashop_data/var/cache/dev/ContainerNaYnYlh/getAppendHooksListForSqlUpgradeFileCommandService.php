<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the public 'PrestaShopBundle\Command\AppendHooksListForSqlUpgradeFileCommand' shared service.

return $this->services['PrestaShopBundle\\Command\\AppendHooksListForSqlUpgradeFileCommand'] = new \PrestaShopBundle\Command\AppendHooksListForSqlUpgradeFileCommand('dev', ($this->services['PrestaShop\\PrestaShop\\Adapter\\LegacyContext'] ?? $this->getLegacyContextService()), ($this->services['prestashop.core.hook.provider.grid_definition_hook_by_service_ids_provider'] ?? ($this->services['prestashop.core.hook.provider.grid_definition_hook_by_service_ids_provider'] = new \PrestaShop\PrestaShop\Core\Hook\Provider\GridDefinitionHookByServiceIdsProvider($this))), ($this->services['prestashop.core.hook.provider.identifiable_object_hook_by_form_type_provider'] ?? $this->load('getPrestashop_Core_Hook_Provider_IdentifiableObjectHookByFormTypeProviderService.php')), ($this->services['prestashop.adapter.legacy.hook'] ?? ($this->services['prestashop.adapter.legacy.hook'] = new \PrestaShop\PrestaShop\Adapter\Hook\HookInformationProvider())), ($this->services['prestashop.core.hook.generator.hook_description_generator'] ?? $this->load('getPrestashop_Core_Hook_Generator_HookDescriptionGeneratorService.php')), $this->parameters['prestashop.core.grid.definition.service_ids'], $this->parameters['prestashop.hook.option_form_hook_names'], $this->parameters['prestashop.core.form.identifiable_object.form_types'], (\dirname(__DIR__, 4).'/app/../install-dev/upgrade/sql/'));
